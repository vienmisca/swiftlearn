<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\Materi;
use App\Models\User;

class Kursus extends Model
{
    protected $table = 'kursus'; // Nama tabel di database

    protected $fillable = [
        'nama_kursus',
        'sampul_kursus',
        'deskripsi',
        'kategori',
        'mentor_id',
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
