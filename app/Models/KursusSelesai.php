<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class KursusSelesai extends Model
{
    use HasFactory;

    protected $table = 'kursus_selesai'; // ✅ tambahkan ini!

    protected $fillable = ['user_id', 'kursus_id'];
}