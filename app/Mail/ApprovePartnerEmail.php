<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Contracts\Queue\ShouldQueue;

class ApprovePartnerEmail extends Mailable
{
    use Queueable, SerializesModels;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct($nama, $email)
    {
        $this->nama = $nama;
        $this->email = $email;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->subject('[SedekahituMudah] Akun Partner Anda telah aktif')->view('emails.partner_approve')->with(
            [
                'nama' => $this->nama,
                'email' => $this->email,
                'app_url' => env('APP_URL'),
            ]
        );
    }
}
