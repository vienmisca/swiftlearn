<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\Materi;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\HasFactory; // ✅ Correct!

    class Kursus extends Model
{

    protected $table = 'kursus'; // ✅ required if table name is singular
    protected $fillable = [
        'nama_kursus',
        'kategori_id',
        'deskripsi',
        'thumbnail',
        'user_id',
    ];

    /**
     * Relasi: Kursus memiliki banyak Materi
     */
    public function materis()
    {
        return $this->hasMany(Materi::class, 'kursus_id');
    }

    /**
     * Relasi: Kursus dimiliki oleh satu Mentor
     */
    public function mentor()
    {
        return $this->belongsTo(User::class, 'mentor_id');
    }
}
