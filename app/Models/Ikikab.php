<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Skpkab;
use App\Models\Ikukab;
use App\Models\Pkkab;
use App\Models\Ckpkab;

class Ikikab extends Model
{
    use HasFactory;

    protected $table = "iki_kab";
    protected $primaryKey = 'id_iki_kab';
    public $timestamps = false;

    protected $fillable = [
        'nama_iki_kab',
        'satuan_iki_kab',
        'target_iki_kab',
        'id_iku_kab',
        'id_user'
    ];

    public function skpkab()
    {
        return $this->hasOne(Skpkab::class, 'id_iki_kab');
    }

    public function ikukab()
    {
        return $this->belongsTo(Ikukab::class, 'id_iku_kab');
    }

    public function pkkab()
    {
        return $this->belongsTo(Pkkab::class, 'id_pk_kab');
    }

    public function ckpkab()
    {
        return $this->hasMany(Ckpkab::class, 'id_iki_kab');
    }
}
