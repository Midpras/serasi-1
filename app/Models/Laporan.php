<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Laporan extends Model
{
    use HasFactory;

    protected $connection = 'mysql2';
    protected $table = 'kegiatan';
    protected $primaryKey = 'id';


    public $timestamps = false;

    protected $fillable = [
        'namakegiatan',
        'satuankegiatan',
        'volume',
        'durasi',
        'satuandurasi',
        'pemberitugas',
        'keterangan',
        'statuskegiatan'
    ];
    protected $guarded = [
        'pegawai',
        'id'
    ];
}
