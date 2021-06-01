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
    public $alasanPenolakan;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct(Umkm $umkm, $alasanPenolakan)
    {
        $this->umkm = $umkm;
        $this->alasanPenolakan = $alasanPenolakan;
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
