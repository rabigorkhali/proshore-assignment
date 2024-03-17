<?php

namespace App\Services\System;

use App\Repositories\System\QuestionnaireRepository;
use App\Services\Service;

class QuestionnaireService extends Service
{

    public function __construct(QuestionnaireRepository $questionnaireRepository)
    {
        parent::__construct($questionnaireRepository);
    }

}
