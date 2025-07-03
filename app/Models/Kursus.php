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
        'deskripsi',
        'kategori',
        'sampul_kursus',
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
    // public function category()
    // {
    //     return $this->belongsTo(Category::class, 'kategori', 'id'); // adjust foreign key if needed
    // }
    public function viewers()
{
    return $this->belongsToMany(User::class, 'history_kursus', 'kursus_id', 'user_id')
                ->withTimestamps();
}
}
