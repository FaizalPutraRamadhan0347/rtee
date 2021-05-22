<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Contracts\Queue\ShouldQueue;

class PartnerRegisterEmail extends Mailable
{
    use Queueable, SerializesModels;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct($nama)
    {
        $this->nama = $nama;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->subject('[SedekahituMudah] Request Pendaftaran Akun Partner Anda sedang direview')->view('emails.partner_register')->with(
            [
                'nama' => $this->nama,
                'app_url' => env('APP_URL'),
            ]
        );
    }
}
