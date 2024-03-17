<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class Question extends Model
{
    protected $fillable = ['subject','question','options','correct_answer'];

    protected $guarded = [
        'id',
    ];

    public function questionnaires()
    {
        return $this->belongsToMany(Questionnaire::class, 'pivot_questionnaire_questions', 'question_id', 'questionnaire_id');
    }
}
