<?php


namespace App\Http\Controllers\System\Auth;

use App\Exceptions\CustomGenericException;
use App\Http\Controllers\Controller;
use App\Traits\CustomThrottleRequest;
use Auth;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Http\Request;
use Config;

class LoginController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Login Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles authenticating users for the application and
    | redirecting them to your home screen. The controller uses a trait
    | to conveniently provide its functionality to your applications.
    |
    */

    use AuthenticatesUsers, CustomThrottleRequest;

    /**
     * Where to redirect users after login.
     *
     * @var string
     */
    // protected $redirectTo = RouteServiceProvider::HOME;
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
    }

    /**
     * Handle a login request to the application.
     *
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\Http\Response|\Illuminate\Http\JsonResponse
     *
     * @throws \Illuminate\Validation\ValidationException
     */
    public function showLoginForm(Request $request)
    {
        if (Auth::check()) {
            return redirect('/' . getSystemPrefix() . '/home');
        } else {
            if ($request->has('redirect')) {
                $redirectUrl = $request->redirect;
                return view('system.auth.login', compact('redirectUrl'));
            }
            return view('system.auth.login');
        }
    }

    public function login(Request $request)
    {
        $this->validateLogin($request);

        try {
            if (
                method_exists($this, 'hasTooManyAttempts') &&
                $this->hasTooManyAttempts($request, Config::get('constants.DEFAULT_LOGIN_ATTEMPT_LIMIT')) // maximum attempts
            ) {
                $this->customFireLockoutEvent($request);

                return $this->customLockoutResponse($request);
            }
            $userLoginData['email'] = $request->get('email');
            $userLoginData['password'] = $request->get('password');

            if (Auth::attempt($userLoginData)) {
                return $this->sendLoginResponse($request);
            }
            $this->incrementAttempts($request, Config::get('constants.DEFAULT_LOGIN_ATTEMPT_EXPIRATION')); // decay minutes

            return $this->sendFailedLoginResponse($request);
        } catch (\Exception $e) {
            if (authUser() != null) {
                $this->guard()->logout();
            }
            throw new CustomGenericException('Internal server error.');
        }
    }



    /**
     * Send the response after the user was authenticated.
     *
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    protected function sendLoginResponse(Request $request)
    {
        $request->session()->regenerate();

        $this->clearAttempts($request);

        if ($response = $this->authenticated($request, $this->guard()->user())) {
            return $response;
        }
        return redirect('/' . getSystemPrefix() . '/home');
    }

    public function logout(Request $request)
    {
        $this->guard()->logout();
        $request->session()->invalidate();

        return redirect(getSystemPrefix() . '/login')->withErrors(['alert-success' => 'Successfully logged out!']);
    }

}
