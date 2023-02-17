<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class loai extends Model
{
    use HasFactory;
    protected $table='loai';
    public $timestamps = false;
    protected $fillable=['id','trangthai','loai','slug'];
    protected $primaryKey ='id';
    public function sanpham(){
        return $this->hasMany(sanpham::class,'loai_id', 'id');
    }
    public function scopeSearch($query){
        if($tukhoa=request()->tukhoa){
          $query=$query->where('loai','like','%'.$tukhoa.'%');
        }
        return $query;
  
      }
}
