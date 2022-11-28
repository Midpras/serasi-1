<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Level1 extends Model
{
    use HasFactory;

    protected $table = "lvl1";
    protected $primaryKey = 'id_lvl1';

    public function kegiatan()
    {
        return $this->hasMany(kegiatan::class, 'id_lvl1');
    }
}
