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

}
