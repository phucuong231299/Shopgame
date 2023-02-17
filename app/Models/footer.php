<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class footer extends Model
{
    use HasFactory;
    protected $table='footer';
    public $timestamps=false;
    protected $primaryKey ='id';
    protected $fillable=[
        'id',
        'gioithieu',
        'diachi',
        'muahangtragop',
        'thoigianlamviec',
    ];
}
