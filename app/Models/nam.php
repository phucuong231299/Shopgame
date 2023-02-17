<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class nam extends Model
{
    use HasFactory;
    protected $table='nam';
    public $timestamps =false;
    public $fillable= ['id','nam'];
    
    public function thang(){
        return $this->hasMany(thang::class,'nam_id','id');
    }
}
