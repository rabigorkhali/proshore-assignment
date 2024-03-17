<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use Throwable;

class ExamController extends Controller
{
    public function showExamForm($questionnaireId, $studentId)
    {
        try {
            return view('frontend.examForm');
        } catch (Throwable $th) {
            dd($th->getMessage());
        }
    }
}
