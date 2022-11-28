<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Ikiprov;
use App\Models\Kegiatan;
use App\Models\User;

class Ckpprov extends Model
{
    use HasFactory;

    protected $table = "ckp_prov";
    protected $primaryKey = 'id_ckp_prov';
    public $timestamps = false;

    protected $fillable = [
        'id_kegiatan',
        'target_ckp_prov',
        'satuan_ckp_prov',
        'bulan_prov',
        'tahun_prov',
        'id_iki_prov',
        'id_user',
        'penilai_ckp',
        'flag_ckp'
    ];

    public function ikiprov()
    {
        return $this->belongsTo(Ikiprov::class, 'id_iki_prov');
    }

    public function kegiatan()
    {
        return $this->belongsTo(Kegiatan::class, 'id_kegiatan');
    }

    public function user()
    {
        return $this->belongsTo(User::class, 'id_user');
    }
}
