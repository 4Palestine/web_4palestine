<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Mail\Mailables\Content;
use Illuminate\Mail\Mailables\Envelope;
use Illuminate\Queue\SerializesModels;

class ResetPasswordMail extends Mailable
{
    use Queueable, SerializesModels;


    protected $user, $otp;
    /**
     * Create a new message instance.
     */
    public function __construct($user, $otp)
    {
        $this->user = $user;
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
            ->subject('Forgot Password Verification '. config('app_name'))
            ->markdown('mail.forgot-verification')
            ->with([
                // 'user_name' => $this->user->name,
                'otp' => $this->otp,
            ]);
    }
}
