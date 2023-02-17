<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class bia extends Model
{
    use HasFactory;
    protected $table='bia';
    public $timestamps=false;
    protected $primaryKey ='id';
    protected $fillable=[
        'id',
        'anh',
        'tuade',
        'tomtat',
        'noidung',
        'status',
    ];
}
