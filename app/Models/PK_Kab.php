<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PK_Kab extends Model
{
    use HasFactory;

 
    public $table = 'pk_kab';
	public $primaryKey = 'id_pk_kab';
    protected $guarded = [];
    public $timestamps = false;

    public function iku_kab()
    {
        return $this->hasMany(IkuKab::class,'id_pk_kab');
    }
}
