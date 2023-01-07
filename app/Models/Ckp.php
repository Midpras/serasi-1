<?php

namespace App\Models;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Ckp extends Model {

    use HasFactory;
    public $timestamps = false;
    protected $table = 'ckp_prov';
    protected $guarded = [];
	
    public function ckp()
    {
        return $this->belongsTo(Ckp::class, 'id_ckp_prov');
    }

    public function kegiatan()
    {
        return $this->belongsTo(Kegiatan::class, 'id_kegiatan');
    }
	
}
