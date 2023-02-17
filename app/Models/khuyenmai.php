<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class khuyenmai extends Model
{
    public $timestamps = false;
    use HasFactory;
    protected $table='khuyenmai';
    protected $primaryKey ='id';
    protected $fillable=['id','tenkhuyenmai','makhuyenmai','tiengiam','nsx','hsd','status'];
}
