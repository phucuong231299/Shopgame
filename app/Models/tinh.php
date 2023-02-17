<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\huyen;
class tinh extends Model
{
    use HasFactory;
    protected $table='tinh';
    public $timestamps =false;
    protected $fillable= ['matinh','tentinh'];
    protected $primaryKey ='matinh';

    public function huyen(){
      return $this->hasMany(huyen::class, 'matinh', 'matinh');
  }
    public function scopeSearch($query){
        if($tukhoa=request()->tukhoa){
          $query=$query->where('tentinh','like','%'.$tukhoa.'%');
        }
        return $query;
  
      }
}
