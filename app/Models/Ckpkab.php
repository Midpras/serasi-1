<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Ikikab;
use App\Models\Kegiatan;
use App\Models\User;

class Ckpkab extends Model
{
    use HasFactory;

    protected $table = "ckp_kab";
    protected $primaryKey = 'id_ckp_kab';
    public $timestamps = false;

    protected $fillable = [
        'id_kegiatan',
        'target_ckp_kab',
        'satuan_ckp_kab',
        'bulan_kab',
        'tahun_kab',
        'id_iki_kab',
        'id_user',
        'penilai_ckp',
        'flag_ckp'
    ];

    public function ikikab()
    {
        return $this->belongsTo(Ikikab::class, 'id_iki_kab');
    }

    public function kegiatan()
    {
        return $this->belongsTo(Kegiatan::class, 'id_kegiatan');
    }

    public function user()
    {
        return $this->belongsTo(User::class, 'id_user');
    }

    public function ikukab()
    {
        return $this->belongsTo(Ikukab::class, 'id_iku_kab');
    }
}
