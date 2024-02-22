<?php

namespace App\Jobs;

use App\Mail\XacNhanDonHangMail;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldBeUnique;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;
use Illuminate\Support\Facades\Mail;

class XacNhanDonHangJob implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    protected $info;
    protected $gioHang;

    public function __construct($info, $gioHang)
    {
        $this->info     = $info;
        $this->gioHang  = $gioHang;
    }

    public function handle()
    {
        Mail::to($this->info['email'])->send(new XacNhanDonHangMail($this->info, $this->gioHang));
    }
}
