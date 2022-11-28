<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Ikuprov;

class Pkprov extends Model
{
    use HasFactory;

    protected $table = "pk_prov";
    protected $primaryKey = 'id_pk_prov';


    protected $fillable = [
        'renstra',
        'nama_pk_prov'
    ];

    public function ikuprov()
    {
        return $this->hasMany(Ikuprov::class, 'id_pk_prov');
    }
}
