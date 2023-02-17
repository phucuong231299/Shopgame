<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class thongke extends Model
{
    use HasFactory;
    protected $table='thongke';
    public $timestamps =false;
    protected $primaryKey ='id';
    public $fillable= ['id','ngay','banhang','loinhuan','dinhluong','toanbo'];
    
    
}
