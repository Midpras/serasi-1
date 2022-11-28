<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Pkprov;


class IkuProv extends Model
{
    use HasFactory;
    public $table = 'iku_prov';
	public $primaryKey = 'id_iku_prov';
    protected $guarded = [];
    public $timestamps = false;

    public function pk_prov()
    {
        return $this->belongsTo(Pkprov::class, 'id_pk_prov');
    }

    public function ikiprov()
    {
        return $this->hasMany(Ikiprov::class, 'id_iku_prov');
    }
}
