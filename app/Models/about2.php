<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class about2 extends Model
{
    use HasFactory;
    protected $table='about2';
    public $timestamps=false;
    protected $primaryKey ='id';
    protected $fillable=[
        'id',
        'anh',
        'tuade',
        'noidung',
        'status',
    ];
}
