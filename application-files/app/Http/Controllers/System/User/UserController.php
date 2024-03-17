<?php

namespace App\Http\Controllers\System\User;

use App\Http\Controllers\System\ResourceController;
use App\Http\Requests\system\resetPassword;
use App\Services\System\UserService;

class UserController extends ResourceController
{
    public function __construct(private readonly UserService $userService)
    {
        parent::__construct($userService);
    }

    public function storeValidationRequest()
    {
        return 'App\Http\Requests\System\userRequest';
    }

    public function moduleName()
    {
        return 'users';
    }

    public function viewFolder()
    {
        return 'system.user';
    }

    public function changePassword()
    {
            $data['title'] = 'Please change your password for security reasons.';
            $data['email'] = authUser()->email;
            $data['buttonText'] = 'Change Password';
            return redirect(getSystemPrefix().'/home');
    }

    public function passwordReset(resetPassword $request)
    {
        $this->service->resetPassword($request);

        return redirect($this->getUrl())->withErrors(['success' => 'Password successfully updated.']);
    }
}

