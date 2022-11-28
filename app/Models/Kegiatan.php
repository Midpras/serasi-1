<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Ckpprov;

class Kegiatan extends Model
{
    use HasFactory;

    protected $table = "kegiatan";
    protected $primaryKey = 'id_kegiatan';

    protected $fillable = [
        'id_lvl1',
        'id_lvl2',
        'id_lvl3',
        'nama_kegiatan'
    ];

    public $timestamps = false;


    public function level1()
    {
        return $this->belongsTo(level1::class, 'id_lvl1');
    }

    public function level2()
    {
        return $this->belongsTo(Level2::class, 'id_lvl2');
    }

    public function level3()
    {
        return $this->belongsTo(Level3::class, 'id_lvl3');
    }

    public function ckpprov()
    {
        return $this->hasMany(Ckpprov::class, 'id_kegiatan');
    }
}
