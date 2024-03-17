<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\System\Auth\LoginController;
use App\Http\Controllers\System\User\UserController;
use App\Http\Controllers\System\Profile\ProfileController;
use App\Http\Controllers\System\Profile\PasswordChangeController;
use App\Http\Controllers\System\Config\ConfigController;
use App\Http\Controllers\System\IndexController;
use App\Http\Controllers\System\Questionnaire\QuestionnairesController;

Route::get('/', function () {
    return redirect(route('login.form'));
});
Route::get(getSystemPrefix(), function () {
    return redirect(route('login.form'));
});
Route::group(['prefix' => getSystemPrefix()], function () {
    Route::get('/login', [LoginController::class, 'showLoginForm'])->name('login.form');
    Route::post('/login', [LoginController::class, 'login'])->name('login');

    Route::middleware(['auth'])->group(function () {
        Route::get('/logout', [LoginController::class, 'logout'])->name('logout');
        Route::get('/home', [IndexController::class, 'index'])->name('home');
        Route::resource('/users', UserController::class)->except(['show']);
        Route::post('/users/reset-password/{id}', [UserController::class, 'passwordReset'])->name('user.reset-password');

        /* Profile Routes*/
        Route::group(['prefix' => 'profile'], function () {
            Route::get('/', [ProfileController::class, 'index'])->name('profile');
            Route::put('/{id}', [ProfileController::class, 'update'])->name('profile.update');
            Route::get('/change-password', [PasswordChangeController::class, 'index'])->name('profile.change-password-form');
            Route::put('/change-password/{id}', [PasswordChangeController::class, 'update'])->name('profile.change-password');
        });
        /* End Profile Routes */

        Route::group(['prefix' => 'questionnaires'], function () {
            Route::resource('/questionnaires', QuestionnairesController::class)->except(['show']);
            Route::post('/mail-to-students/{questionnaireId}', [QuestionnairesController::class, 'sendExaminationLinkToStudents'])->name('questionnaires.mail.student');
        });

        Route::resource('/configs', ConfigController::class)->except(['show']);
    });
});
