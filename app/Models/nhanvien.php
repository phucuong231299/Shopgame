<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class nhanvien extends Model
{
    use HasFactory;
    protected $table='nhanvien';
    public $timestamps = false;
    public $fillable=['id', 'hoten', 'gioitinh', 'ngaysinh', 'diachi', 'sdt', 'cmnd', 'anh', 'chucvu_id', 'tendangnhap', 'password', 'email'];

    public function chucvu(){
        return $this->hasOne(chucvu::class,'id','chucvu_id');
    }
}
