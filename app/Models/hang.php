<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class hang extends Model
{
    use HasFactory;
    protected $table='hang';
    public $timestamps = false;
    public $fillable= ['id','hang'];

    public function sanpham(){
        return $this->hasMany(sanpham::class,'hang_id', 'id');
    }
}
