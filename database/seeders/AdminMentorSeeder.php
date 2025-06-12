<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

class AdminMentorSeeder extends Seeder
{
    public function run(): void
    {
        // Mentor
        User::updateOrCreate(
            ['email' => 'mentor1@swift.com'], // search condition
            [
                'name' => 'Mentor One',
                'password' => Hash::make('12345678'),
                'role' => 'mentor',
            ]
        );

        // Admin
        User::updateOrCreate(
            ['email' => 'admin@swift.com'],
            [
                'name' => 'Admin User',
                'password' => Hash::make('12345678'),
                'role' => 'admin',
            ]
        );
    }
}
