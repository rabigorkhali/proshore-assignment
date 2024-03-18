<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Model\PivotQuestionnaireStudentQuestions;
use App\Model\Student;
use App\Repositories\System\QuestionnaireRepository;
use Throwable;
use Illuminate\Http\Request;

class ErrorController extends Controller
{
    public function __construct()
    {
    }

    public function showErrorPage()
    {
        $data = [];
        return view('frontend.error', $data);
    }
}
