<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class PivotQuestionnaireStudentQuestions extends Model
{
    protected $fillable = ['questionnaire_id', 'question_id', 'student_id', 'answer'];

    protected $guarded = [
        'id',
    ];
}
