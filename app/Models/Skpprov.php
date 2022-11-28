<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Ikiprov;
use App\Models\Ikuprov;

class Skpprov extends Model
{
    use HasFactory;

    protected $table = "skp_prov";
    protected $primaryKey = 'id_skp_prov';
    public $timestamps = false;

    protected $fillable = [
        'nama_skp_prov',
        'jenis_skp_prov',
        'id_iki_prov',
        'id_skp_prov_atasan'
    ];

    public function ikuprov()
    {
        return $this->belongsTo(Ikuprov::class, 'id_iku_prov');
    }

    public function ikiprov()
    {
        return $this->belongsTo(Ikiprov::class, 'id_iki_prov');
    }
}
