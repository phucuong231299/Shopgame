<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class about extends Model
{
    use HasFactory;
    protected $table='about';
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
