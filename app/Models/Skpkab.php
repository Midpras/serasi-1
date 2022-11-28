<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Ikikab;
use App\Models\Ikukab;
use App\Models\Pkkab;

class Skpkab extends Model
{
    use HasFactory;

    protected $table = "skp_kab";
    protected $primaryKey = 'id_skp_kab';
    public $timestamps = false;

    protected $fillable = [
        'nama_skp_kab',
        'id_iki_kab',
        'id_kegiatan'
    ];

    public function ikukab()
    {
        return $this->belongsTo(Ikukab::class, 'id_iku_kab');
    }

    public function ikikab()
    {
        return $this->belongsTo(Ikikab::class, 'id_iki_kab');
    }
}
