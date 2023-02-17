<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class thang extends Model
{
    use HasFactory;
    protected $table='thang';
    public $timestamps =false;
    public $fillable= ['id','thang','nam_id'];
    
    public function nam(){
        return $this->hasOne(nam::class,'id','nam_id');
    }
}
