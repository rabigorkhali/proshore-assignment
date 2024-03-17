<?php

namespace App\Services\System;

use App\Model\Question;
use App\Model\Student;
use App\Repositories\System\QuestionnaireRepository;
use App\Services\Service;
use Database\Seeders\QuestionSeeder;

class QuestionnaireService extends Service
{

    public function __construct(QuestionnaireRepository $questionnaireRepository, Question $questionModel, EmailService $emailService, Student $studentModel)
    {
        parent::__construct($questionnaireRepository);
        $this->questionModel = $questionModel;
        $this->emailService = $emailService;
        $this->studentModel = $studentModel;
    }

    public function store($request)
    {
        $data = $request->except('_token');
        $questionnaireCreateResponse = $this->repository->create($data);
        $randomPhysicsSubjectQuestionIds = $this->questionModel->where('subject', 'Physics')->inRandomOrder()->take(5)->pluck('id');
        $randomChemistrySubjectQuestionIds = $this->questionModel->where('subject', 'Chemistry')->inRandomOrder()->take(5)->pluck('id');
        $questionnaireCreateResponse->questions()->attach($randomPhysicsSubjectQuestionIds);
        $questionnaireCreateResponse->questions()->attach($randomChemistrySubjectQuestionIds);
        return $questionnaireCreateResponse;
    }

    public function sendExaminationLinkToStudents($questionnaireId)
    {
        $questionnaireData = $this->repository->query()->wheredate('expiry_date', '>', date('Y-m-d'))->findorfail($questionnaireId);
        $students = $this->studentModel->get();
        foreach ($students as $studentsKeys => $studentData) {
            $emailData = [];
            $emailData['email_subject'] = 'Examination Link';
            $emailData['email'] = $studentData->email;
            $emailData['studentName'] = $studentData->name;
            $emailData['examLink'] = route('show.exam.form',[$questionnaireId , $studentData->id]);
            $emailData['questionnaireTitle'] = $questionnaireData->title;
            $emailData['expiryDate'] = $questionnaireData->expiry_date;
            $this->emailService->sendEmail($emailData);
        }
    }
}
