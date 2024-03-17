<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Model\Student;
use App\Repositories\System\QuestionnaireRepository;
use Throwable;

class ExamController extends Controller
{
    public function __construct(QuestionnaireRepository $questionnaireRepository, Student $studentModel)
    {
        $this->questionnaireRepository = $questionnaireRepository;
        $this->studentModel = $studentModel;
    }

    public function showExamForm($questionnaireId, $studentId)
    {
        try {
            $data['questionnaires'] = $this->questionnaireRepository->query()->wheredate('expiry_date', '>', date('Y-m-d'))->find($questionnaireId);
            $data['student'] = $this->studentModel->find($studentId);
            return view('frontend.examForm', $data);
        } catch (Throwable $th) {
            dd($th->getMessage());
            return redirect()->route('error.page.frontend')->withErrors(['alert-danger' => 'Something went wrong. Please contact support team.']);
        }
    }
}
