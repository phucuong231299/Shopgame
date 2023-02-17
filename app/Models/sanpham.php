<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\hang;
use App\Models\baohanh;
use App\Models\loai;
use App\Models\binhluan;
use App\Models\noisanxuat;
use App\Models\listanh;
use App\Models\hoadon_chitiet;
class sanpham extends Model
{
    use HasFactory;
    protected $table='sanpham';
    public $timestamps = false;
    protected $fillable=['id', 'tensp', 'anh', 'anh1', 'anh2', 'anh3', 'soluong', 'gianhap', 'giaxuat', 'loai_id', 'noisanxuat_id', 'baohanh_id', 'hang_id', 'chitiet', 'video'];
    protected $primaryKey ='id';
    public function hang(){
        return $this->hasOne(hang::class, 'id', 'hang_id');
    }
    public function baohanh(){
        return $this->hasOne(baohanh::class, 'id', 'baohanh_id');
    }
    public function loai(){
        return $this->hasOne(loai::class, 'id', 'loai_id');
    }
    public function noisanxuat(){
        return $this->hasOne(noisanxuat::class, 'id', 'noisanxuat_id');
    }
    public function listanh(){
        return $this->hasMany(listanh::class, 'sanpham_id', 'id');
    }
    public function binhluan(){
        return $this->hasMany(binhluan::class, 'sanpham_id', 'id');
    }
    public function hoadon_chitiet(){
        return $this->hasMany(hoadon_chitiet::class, 'sanpham_id', 'id');
    }
    public function scopeSearch($query){
        if($tukhoa=request()->tukhoa){
          $query=$query->where('tensp','like','%'.$tukhoa.'%');
        }
        return $query;
  
      }
}
