<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\tinh;
use App\Models\xa;
use App\Models\huyen;
class vanchuyen extends Model
{
    use HasFactory;
    protected $table = 'vanchuyen';
    public $timestamps = false;
    protected $primaryKey ='id';
    protected $fillable = [
        'id',
        'tinh_id',
        'huyen_id',
        'xa_id',
        'sotien_id'
    ];
    public function tinh(){
        return $this->hasOne(tinh::class, 'matinh', 'tinh_id');
    }
    public function huyen(){
        return $this->hasOne(huyen::class, 'mahuyen', 'huyen_id');
    }
    public function xa(){
        return $this->hasOne(xa::class, 'maxa', 'xa_id');
    }
}
