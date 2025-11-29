<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\User;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // 🧍 Create a test user for login
        User::factory()->create([
            'name' => 'Test Dietitian',
            'email' => 'test@example.com',
        ]);

        // 🩺 Seed dummy patients
        $this->call(PatientSeeder::class);
    }
}
