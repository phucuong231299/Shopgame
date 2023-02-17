<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\sanpham;

class binhluan extends Model
{
    use HasFactory;
    protected $table='binhluan';
    public $timestamps =false;
    public $fillable= ['noidung','name','ngay','sanpham_id'];
    protected $primaryKey ='id';
    public function sanpham(){
        return $this->hasOne(sanpham::class, 'id', 'sanpham_id');
    }
}
