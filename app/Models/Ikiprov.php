<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Skpprov;
use App\Models\Ikuprov;

class Ikiprov extends Model
{
    use HasFactory;

    protected $table = "iki_prov";
    protected $primaryKey = 'id_iki_prov';
    public $timestamps = false;

    protected $fillable = [
        'nama_iki_prov',
        'satuan_iki_prov',
        'target_iki_prov',
        'perhitungan_prov',
        'id_iku_prov',
        'id_user',
        'id_skp_atasan'
    ];

    public function skpprov()
    {
        return $this->hasOne(Skpprov::class, 'id_iki_prov');
    }

    public function ikuprov()
    {
        return $this->belongsTo(Ikuprov::class, 'id_iku_prov');
    }

    public function pkprov()
    {
        return $this->belongsTo(Pkprov::class, 'id_pk_prov');
    }

    public function ckpprov()
    {
        return $this->hasMany(Ckpprov::class, 'id_iki_prov');
    }
}
