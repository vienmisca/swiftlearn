<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Materi extends Model
{
    use HasFactory;

    protected $table = 'materi'; // ✅ necessary if your table is NOT plural

    protected $fillable = [
        'judul',
        'deskripsi',
        'google_form_link',
        'kursus_id',
        'video',
        'pdf',
    ];
    public function kursus()
{
    return $this->belongsTo(Kursus::class); // this is fine
}

}
