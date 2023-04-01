<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Mail\Mailables\Content;
use Illuminate\Mail\Mailables\Envelope;
use Illuminate\Queue\SerializesModels;

class VerifyEmail extends Mailable
{
    use Queueable, SerializesModels;


    protected $otp;
    /**
     * Create a new message instance.
     */
    public function __construct($otp)
    {
        $this->otp = $otp;
    }


    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {

        return $this->from(config('MAIL_FROM_ADDRESS'), config('app_name'))
            ->subject('Email Verification '. config('app_name'))
            ->markdown('mail.verify-email')
            ->with([
                'otp' => $this->otp,
            ]);
    }
}
