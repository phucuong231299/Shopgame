<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class noisanxuat extends Model
{
    use HasFactory;
    protected $table='noisanxuat';
    public $timestamps = false;
    public $fillable=['id', 'noisanxuat'];

    public function sanpham(){
        return $this->hasMany(sanpham::class,  'noisanxuat_id', 'id');
    }
}
