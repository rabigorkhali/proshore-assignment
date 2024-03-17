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

    public function getAllData($data, $selectedColumns = [], $pagination = true)
    {
        $query = $this->query();
        if (count($selectedColumns) > 0) {
            $query->select($selectedColumns);
        }

        if (isset($data->keyword) && $data->keyword !== null) {
            $query->where('title', 'LIKE', '%' . $data->keyword . '%');
        }
        $query->wheredate('expiry_date', '>', date('Y-m-d'));
        if ($pagination) {
            return $query->orderBy('id', 'DESC')->paginate(paginate());
        } else {
            return $query->orderBy('id', 'DESC')->get();
        }
    }

    public function createPageData($request): array
    {
        return [
            'submitButtonLabelCustom'=>'Generate'
        ];
    }
}
