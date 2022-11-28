<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Level2 extends Model
{
    use HasFactory;
    protected $table = 'lvl2';

    public $timestamps = false;

    protected $fillable = [
        'nama_lvl2'
    ];
    protected $primaryKey = 'id_lvl2';
    

    public function kegiatan()
    {
        return $this->hasMany(Kegiatan::class);
    }
}
