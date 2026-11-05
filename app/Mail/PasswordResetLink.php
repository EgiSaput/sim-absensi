<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class PasswordResetLink extends Mailable
{
    use Queueable, SerializesModels;

    public string $resetLink;
    public string $userName;

    public function __construct(string $resetLink, string $userName)
    {
        $this->resetLink = $resetLink;
        $this->userName = $userName;
    }

    public function build()
    {
        return $this->subject('Link Reset Password - Sistem Informasi MA Az-Zahra')
            ->view('emails.reset-password-link');
    }
}