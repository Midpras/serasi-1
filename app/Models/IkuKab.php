<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class IkuKab extends Model
{
    use HasFactory;
    public $table = 'iku_kab';
	public $primaryKey = 'id_iku_kab';
    protected $guarded = [];
    public $timestamps = false;

    public function pk_kab()
    {
        return $this->belongsTo(PK_Kab::class,'id_pk_kab');
    }

    public function ikikab()
    {
        return $this->hasMany(Ikikab::class, 'id_iku_kab');
    }

}
