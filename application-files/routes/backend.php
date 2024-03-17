<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\System\Auth\LoginController;
use App\Http\Controllers\System\User\UserController;
use App\Http\Controllers\System\Profile\ProfileController;
use App\Http\Controllers\System\Profile\PasswordChangeController;
use App\Http\Controllers\System\Config\ConfigController;
use App\Http\Controllers\System\IndexController;


Route::get('/', function () {
    return redirect(route('login.form'));
});
Route::get(getSystemPrefix(), function () {
    return redirect(route('login.form'));
});Route::group(['prefix' => getSystemPrefix()], function () {
    Route::get('/login', [LoginController::class, 'showLoginForm'])->name('login.form');
    Route::post('/login', [LoginController::class, 'login'])->name('login');

    Route::middleware(['auth'])->group(function () {
        Route::get('/home', [IndexController::class, 'index'])->name('home');
        Route::resource('/users', UserController::class)->except(['show']);

        // Profile Routes
        Route::group(['prefix' => 'profile'], function () {
            Route::get('/', [ProfileController::class, 'index'])->name('profile');
            Route::put('/{id}', [ProfileController::class, 'update']);
            Route::get('/change-password', [PasswordChangeController::class, 'index'])->name('profile.change-password-form');
            Route::put('/change-password/{id}', [PasswordChangeController::class, 'update'])->name('profile.change-password');
        });

        Route::post('/users/reset-password/{id}', [UserController::class, 'passwordReset'])->name('user.reset-password');
        Route::resource('/configs', ConfigController::class);
        Route::get('/logout', [LoginController::class, 'logout'])->name('logout');
    });
});

