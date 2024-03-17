<?php

namespace App\Services\System;

use Illuminate\Support\Facades\Mail;
use App\Mail\SendExaminationLinkToStudent;

class EmailService 
{
    /* QUEUE CAN BE USED FOR EMAILING FEATURES FOR BETTER RESPONSE TIME*/
    public function sendEmail($emailData)
    {
        Mail::to($emailData['email'])->send(new SendExaminationLinkToStudent($emailData));
    }
}
