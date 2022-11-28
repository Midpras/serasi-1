<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pk extends Model
{
    use HasFactory;
    public $table = 'pk_prov';
	public $primaryKey = 'id_pk_prov';
    protected $guarded = [];
    public $timestamps = false;

    public function iku_prov()
    {
        return $this->hasMany(IkuProv::class,'id_pk_prov');
    }
}
