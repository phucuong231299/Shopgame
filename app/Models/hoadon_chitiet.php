<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class hoadon_chitiet extends Model
{
    use HasFactory;
    protected $table='hoadon_chitiet';
    public $timestamps = false;
    protected $fillable=['hoadon_id','sanpham_id','soluong','phi_khuyenmai','phi_vanchuyen','giatien'];
    public function sanpham(){
        return $this->hasOne(sanpham::class, 'id', 'sanpham_id');
    }
    public function hoadon(){
        return $this->hasOne(hoadon::class, 'id', 'hoadon_id');
    }
}
