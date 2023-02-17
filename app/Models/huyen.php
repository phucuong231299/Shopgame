<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\tinh;
use App\Models\xa;
class huyen extends Model
{
    use HasFactory;
    protected $table='huyen';
    public $timestamps =false;
    protected $fillable= ['mahuyen','tenhuyen','matinh'];
    protected $primaryKey ='mahuyen';
    public function tinh(){
        return $this->hasOne(tinh::class, 'matinh', 'matinh');
    }
    public function xa(){
      return $this->hasMany(xa::class, 'mahuyen', 'mahuyen');
  }
    public function scopeSearch($query){
        if($tukhoa=request()->tukhoa){
          $query=$query->where('tenhuyen','like','%'.$tukhoa.'%');
        }
        return $query;
  
      }
}
