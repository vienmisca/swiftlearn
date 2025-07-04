<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use App\Models\Kursus;


class User extends Authenticatable
{
    /** @use HasFactory<\Database\Factories\UserFactory> */
    use HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var list<string>
     */
   protected $fillable = [
    'name',
    'email',
    'password',
    'role', // Add this
    ];
// In your User.php (or Siswa.php) model
protected $casts = [
    'interests' => 'array',
];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var list<string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];
public function isSiswa(): bool
{
    return $this->role === 'siswa';
}

    /**
     * Get the attributes that should be cast.
     *
     * @return array<string, string>
     */
    protected function casts(): array
    {
        return [
            'email_verified_at' => 'datetime',
            'password' => 'hashed',
        ];
    }
    public function getPhotoUrlAttribute()
{
    return $this->photo 
        ? asset('storage/' . $this->photo) 
        : asset('images/avatar.png');
}
public function viewedKursus()
{
    return $this->belongsToMany(Kursus::class, 'history_kursus', 'user_id', 'kursus_id')
                ->withTimestamps()
                ->orderBy('history_kursus.created_at', 'desc');
}

}
