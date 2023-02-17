<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use App\Models\hoadon;

class hoadon_email extends Model
{
    use Queueable, SerializesModels;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public $hoadon;
    public function __construct(hoadon $hd)
    {
        //
        $this->hoadon=$hd;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->view('hoadon_chitiet')
        ->subject('Đặt hàng thành công tại ' . config('app.name', 'Shop Game'));
    }
}
