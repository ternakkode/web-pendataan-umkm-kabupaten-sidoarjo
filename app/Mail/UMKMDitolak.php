<?php

namespace App\Mail;

use App\Model\Umkm;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class UMKMDitolak extends Mailable
{
    use Queueable, SerializesModels;

    public $umkm;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct(Umkm $umkm)
    {
        $this->umkm = $umkm;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->from('noreply.klinikumkmsidoarjo@gmail.com')->subject('Hasil Pengajuan KLINIK UMKM Sidoarjo')->view('email.umkm-ditolak');
    }
}
