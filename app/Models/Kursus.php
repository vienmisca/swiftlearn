<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Kursus extends Model
{
    protected $table = 'kursus'; // 👈 Set your actual table name

    protected $fillable = [
        'nama_kursus',
        'sampul_kursus',
        'deskripsi',
        'kategori',
        'mentor_id',
    ];
}
