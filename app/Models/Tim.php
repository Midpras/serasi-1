<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Tim extends Model
{
    use HasFactory;

    protected $table = 'tim';
    protected $primaryKey = 'id_tim';


    public $timestamps = false;

    protected $fillable = [
        'nama_tim',
        'kode_satker'
    ];
}
