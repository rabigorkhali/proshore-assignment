<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class Questionnaire extends Model
{
    protected $fillable = [
        'title', 'expiry_date'
    ];

    protected $guarded = [
        'id',
    ];

    protected $dates = ['expiry_date'];

    public function questions()
    {
        return $this->belongsToMany(Question::class, 'pivot_questionnaire_questions', 'questionnaire_id', 'question_id');
    }

    public function physicsQuestions()
    {
        return $this->belongsToMany(Question::class, 'pivot_questionnaire_questions', 'questionnaire_id', 'question_id')
            ->where('subject', 'Physics');
    }
    public function chemistryQuestions()
    {
        return $this->belongsToMany(Question::class, 'pivot_questionnaire_questions', 'questionnaire_id', 'question_id')
            ->where('subject', 'Chemistry');
    }
}
