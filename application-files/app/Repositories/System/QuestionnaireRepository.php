<?php

namespace App\Repositories\System;

use App\Model\Questionnaire;
use App\Repositories\Repository;

class QuestionnaireRepository extends Repository 
{
    public function __construct(private readonly Questionnaire $questionnaire)
    {
        parent::__construct($questionnaire);
    }

}
