<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Kegiatan extends Model
{
    use HasFactory;
    protected $table = 'kegiatan';

    protected $fillable = [
        'id_lvl1',
        'id_lvl2',
        'id_lvl3',
        'nama_kegiatan'
    ];

    public $timestamps = false;
    protected $primaryKey = 'id_kegiatan';

    public function lvl1()
    {
        return $this->belongsTo(Level1::class, 'id_lvl1');
    }

    public function lvl2()
    {
        return $this->belongsTo(Level2::class, 'id_lvl2');
    }

    public function lvl3()
    {
        return $this->belongsTo(Level3::class, 'id_lvl3');
    }
}
