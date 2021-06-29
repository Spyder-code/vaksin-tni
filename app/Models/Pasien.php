<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pasien extends Model
{
    use HasFactory;

    protected $table = 'pasien';
    protected $fillable = [
        'nik',
        'tgl_lahir',
        'no_hp',
        'nama',
        'alamat',
        'kelurahan',
        'kecamatan',
        'keluarga_besar_tni'
    ];
}
