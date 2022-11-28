<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Ikukab;

class Pkkab extends Model
{
    use HasFactory;

    protected $table = "pk_kab";
    protected $primaryKey = 'id_pk_kab';


    protected $fillable = [
        'renstra',
        'nama_pk_kab'
    ];

    public function ikukab()
    {
        return $this->hasMany(Ikukab::class, 'id_pk_kab');
    }
}
