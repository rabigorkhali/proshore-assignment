<?php

namespace App\Http\Controllers\System\Questionnaire;

use App\Http\Controllers\System\ResourceController;
use App\Services\System\QuestionnaireService;

class QuestionnairesController extends ResourceController
{
     public function __construct(QuestionnaireService $questionnaireService)
    {
        parent::__construct($questionnaireService);
    }

    public function storeValidationRequest()
    {
        return 'App\Http\Requests\system\questionnaireRequest';
    }

    public function moduleName()
    {
        return 'questionnaires';
    }

    public function viewFolder()
    {
        return 'system.questionnaire';
    }
}
