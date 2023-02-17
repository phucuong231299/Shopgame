<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class hoadon extends Model
{
    use HasFactory;
    protected $table='hoadon';
    public $timestamps = false;
    protected $fillable=['id','nhanvien_id','khachhang_id','ngaydat','tinhtrang_id','tongcong'];
    public function khachhang(){
        return $this->hasOne(khachhang::class, 'id', 'khachhang_id');
    }
    public function tinhtrang(){
        return $this->hasOne(tinhtrang::class, 'id', 'tinhtrang_id');
    }
    public function nhanvien(){
        return $this->hasOne(nhanvien::class, 'id', 'nhanvien_id');
    }
}
