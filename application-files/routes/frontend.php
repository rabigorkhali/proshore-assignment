<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Frontend\ExamController;
use App\Http\Controllers\Frontend\ErrorController;

Route::group(['namespace' => 'Frontend'], function () {
    Route::get('/exam/{questionnaireId}/{studentId}', [ExamController::class, 'showExamForm'])->name('show.exam.form');
    Route::post('/exam', [ExamController::class, 'saveExamForm'])->name('save.exam.form');
});
Route::get('/error',[ErrorController::class, 'showErrorPage'])->name('error.page.frontend');
