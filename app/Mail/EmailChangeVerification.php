<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class EmailChangeVerification extends Mailable
{
    use Queueable, SerializesModels;

    public string $verificationCode;
    public string $userName;

    public function __construct(string $verificationCode, string $userName)
    {
        $this->verificationCode = $verificationCode;
        $this->userName = $userName;
    }

    public function build()
    {
        return $this->subject('Kode Verifikasi Ganti Email - Sistem Informasi MA Az-Zahra')
            ->view('emails.verifikasi-ganti-email');
    }
}