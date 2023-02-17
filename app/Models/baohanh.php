<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class baohanh extends Model
{
    use HasFactory;
    protected $table='baohanh';
    public $timestamps =false;
    public $fillable= ['id','thoigianbaohanh'];
    
    public function sanpham(){
        return $this->hasMany(sanpham::class,'baohanh_id','id');
    }
}
