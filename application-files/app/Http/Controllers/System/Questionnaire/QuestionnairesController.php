<?php

namespace App\Http\Controllers\System\Questionnaire;

use App\Http\Controllers\System\ResourceController;
use App\Services\ConstantMessageService;
use App\Services\System\QuestionnaireService;
use Throwable;

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

    public function sendExaminationLinkToStudents($questionnaireId)
    {
        try {
            $this->service->sendExaminationLinkToStudents($questionnaireId);
            return redirect($this->getUrl())->withErrors(['success' => ConstantMessageService::EMAILSENT]);
        } catch (Throwable $throwableCatch) {
            return redirect()->back()->withErrors(['alert-danger' => ConstantMessageService::INVALIDEMAILCONFIG]);
        }
    }
}
