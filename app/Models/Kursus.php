<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory; // ✅ Correct!

    class Kursus extends Model
{
    use HasFactory;

    protected $table = 'kursus'; // ✅ required if table name is singular

    protected $fillable = [
        'nama_kursus',
        'kategori_id',
        'deskripsi',
        'thumbnail',
        'user_id',
    ];
}
