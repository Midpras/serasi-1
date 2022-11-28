<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Level3 extends Model
{
    use HasFactory;
    protected $table = 'lvl3';

    public $timestamps = false;
    protected $primaryKey = 'id_lvl3';

    protected $fillable = [
        'nama_lvl3'
    ];
    

    public function kegiatan()
    {
        return $this->hasMany(Kegiatan::class);
    }
}
