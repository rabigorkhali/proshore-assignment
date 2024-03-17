<?php

namespace App\Services\System;

use App\Model\Question;
use App\Repositories\System\QuestionnaireRepository;
use App\Services\Service;
use Database\Seeders\QuestionSeeder;

class QuestionnaireService extends Service
{

    public function __construct(QuestionnaireRepository $questionnaireRepository,Question $questionModel)
    {
        parent::__construct($questionnaireRepository);
        $this->questionModel= $questionModel;
    }

    public function store($request)
    {
        $data = $request->except('_token');
        $questionnaireCreateResponse= $this->repository->create($data);
        $randomPhysicsSubjectQuestionIds = $this->questionModel->where('subject','Physics')->inRandomOrder()->take(5)->pluck('id');
        $randomChemistrySubjectQuestionIds = $this->questionModel->where('subject','Chemistry')->inRandomOrder()->take(5)->pluck('id');
        $questionnaireCreateResponse->questions()->attach($randomPhysicsSubjectQuestionIds);
        $questionnaireCreateResponse->questions()->attach($randomChemistrySubjectQuestionIds);
    }

}
