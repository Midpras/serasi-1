<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Foundation\Auth\User;

class Tim extends Model
{
    use HasFactory;
    
    protected $connection = 'mysql';
    protected $table = 'tim';
    protected $primaryKey = 'id_tim';


    public $timestamps = false;

    protected $fillable = [
        'nama_tim',
        'kode_satker',
        'id_user'
    ];

    public function user()
    {
        return $this->belongsTo(User::class, 'id_user', 'id');
    }

}
