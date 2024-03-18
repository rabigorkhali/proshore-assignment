<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Model\PivotQuestionnaireStudentQuestions;
use App\Model\Student;
use App\Repositories\System\QuestionnaireRepository;
use Throwable;
use Illuminate\Http\Request;

class ExamController extends Controller
{
    public function __construct(QuestionnaireRepository $questionnaireRepository, Student $studentModel, PivotQuestionnaireStudentQuestions $pivotQuestionnaireStudentQuestionsModel)
    {
        $this->questionnaireRepository = $questionnaireRepository;
        $this->studentModel = $studentModel;
        $this->pivotQuestionnaireStudentQuestionsModel = $pivotQuestionnaireStudentQuestionsModel;
    }

    public function showExamForm($questionnaireId, $studentId)
    {
        try {
            $data['questionnaires'] = $this->questionnaireRepository->query()->wheredate('expiry_date', '>', date('Y-m-d'))->find($questionnaireId);
            if (!$data['questionnaires']) {
                return redirect()->route('error.page.frontend')->withErrors(['alert-danger' => 'Questionnaire not found.']);
            }
            $data['student'] = $this->studentModel->find($studentId);
            if (!$data['student']) {
                return redirect()->route('error.page.frontend')->withErrors(['alert-danger' => 'Student not found.']);
            }
            return view('frontend.examForm', $data);
        } catch (Throwable $th) {
            return redirect()->route('error.page.frontend')->withErrors(['alert-danger' => 'Something went wrong. Please contact support team.']);
        }
    }

    public function saveExamForm()
    {
        try {
            $questionnaireId = request()->get('questionnaire');
            $studentId = request()->get('student');
            $ifAlreadySubmitted = $this->pivotQuestionnaireStudentQuestionsModel->where('questionnaire_id', $questionnaireId)->where('student_id', $studentId)->first();
            if ($ifAlreadySubmitted) {
                return redirect()->route('error.page.frontend')->withErrors(['alert-success' => 'Exam already submitted.']);
            }
            $formattedExamData = $this->parseDataForExamDataSave(request()->except('_token', 'questionnaire', 'student'));
            $this->pivotQuestionnaireStudentQuestionsModel->insert($formattedExamData);
            return redirect()->route('error.page.frontend')->withErrors(['alert-success' => 'Your answer sheet have been submitted successfully.']);
        } catch (Throwable $th) {
            return redirect()->route('error.page.frontend')->withErrors(['alert-danger' => 'Something went wrong. Please contact support team.']);
        }
    }

    public function parseDataForExamDataSave($examData)
    {
        $formattedExamData = [];
        foreach ($examData as $examDataKey => $examDataDatum) {
            $formattedExamData[$examDataKey]['questionnaire_id'] = request()->get('questionnaire');
            $formattedExamData[$examDataKey]['question_id'] = $examDataKey;
            $formattedExamData[$examDataKey]['answer'] = $examDataDatum;
            $formattedExamData[$examDataKey]['student_id'] = request()->get('student');
            $formattedExamData[$examDataKey]['created_at'] = date('Y-m-d H:i:s');
            $formattedExamData[$examDataKey]['updated_at'] = date('Y-m-d H:i:s');
        }
        return $formattedExamData;
    }
}
