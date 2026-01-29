<?php

namespace Database\Seeders;

use App\Models\User;
use App\Models\Student;
use App\Models\Guardian;
use App\Models\Subject;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // Create Admin User
        User::create([
            'name' => 'Admin',
            'email' => 'admin@admin.com',
            'password' => Hash::make('password'), // password: password
        ]);

        // Create Test User
        User::create([
            'name' => 'Test User',
            'email' => 'test@test.com',
            'password' => Hash::make('password123'),
        ]);

        // Create other users
        User::factory(8)->create();

        // Create Guardians
        Guardian::factory(10)->create();

        // Call other seeders
        $this->call([
            SubjectSeeder::class,
            TeacherSeeder::class,
        ]);
    }
}