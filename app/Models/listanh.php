<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\sanpham;
class listanh extends Model
{
    use HasFactory;
    protected $table='listanh';
    public $timestamps =false;
    protected $fillable= ['id','tenanh','anh','sanpham_id'];
    protected $primaryKey ='id';

    public function sanpham(){
        return $this->hasOne(sanpham::class, 'id', 'sanpham_id');
    }
}
