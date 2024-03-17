<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use Cookie;

class SendExaminationLinkToStudent extends Mailable
{
    use Queueable, SerializesModels;

    public $emailData;
    public $subject;

    /**
     * Create a new message instance.
     *
     * @param array $emailData
     * @param string $subject
     * @return void
     */
    public function __construct($emailData)
    {
        $this->emailData = $emailData;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->subject($this->emailData['email_subject'])
            ->view('system.mail.index', $this->emailData);
    }
}
