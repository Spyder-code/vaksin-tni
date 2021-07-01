<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class KeluargaTNI extends Model
{
    use HasFactory;

    protected $table = 'keluargaTNI';
    protected $fillable = [
        'nama'
    ];
}
