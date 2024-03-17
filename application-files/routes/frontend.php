<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Frontend\ExamController;

Route::group(['namespace' => 'Frontend'], function () {
    Route::get('/exam/{questionnaireId}/{studentId}', [ExamController::class, 'showExamForm'])->name('show.exam.form');
    Route::post('/exam', [ExamController::class, 'saveExamForm'])->name('save.exam.form');
});
Route::get('/error', function () {
    dd('Oops!! You have error.');
})->name('error.page.frontend');
