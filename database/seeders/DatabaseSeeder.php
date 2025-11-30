<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // 🩺 Seed dummy patients
        $this->call([
            UserSeeder::class,
            PatientSeeder::class
        ]);
    }
}
