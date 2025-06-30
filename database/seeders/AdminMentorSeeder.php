<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

class AdminMentorSeeder extends Seeder
{
    public function run(): void
    {
        // Admin
        User::updateOrCreate(
            ['email' => 'admin@swift.com'],
            [
                'name' => 'Admin User',
                'password' => Hash::make('12345678'),
                'role' => 'admin',
            ]
        );

        // Mentors
        $mentors = [
            ['name' => 'Mentor One', 'email' => 'mentor1@swift.com'],
            ['name' => 'Mentor Two', 'email' => 'mentor2@swift.com'],
            ['name' => 'Mentor Three', 'email' => 'mentor3@swift.com'],
            ['name' => 'Mentor Four', 'email' => 'mentor4@swift.com'],
        ];

        foreach ($mentors as $mentor) {
            User::updateOrCreate(
                ['email' => $mentor['email']],
                [
                    'name' => $mentor['name'],
                    'password' => Hash::make('12345678'),
                    'role' => 'mentor',
                ]
            );
        }
    }
}