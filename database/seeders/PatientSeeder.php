<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Patient;
use Illuminate\Support\Str;

class PatientSeeder extends Seeder
{
    public function run(): void
    {
        $names = [
            'Kristin Watson', 'Marvin McKinney', 'Jane Cooper', 'Cody Fisher', 'Theresa Webb',
            'Darrell Steward', 'Annette Black', 'Bessie Cooper', 'Jerome Bell', 'Kathryn Murphy',
            'Courtney Henry', 'Leslie Alexander', 'Albert Flores', 'Jenny Wilson', 'Dianne Russell',
            'Guy Hawkins', 'Eleanor Pena', 'Wade Warren', 'Arlene McCoy', 'Jacob Jones',
            'Esther Howard', 'Robert Fox', 'Savannah Nguyen', 'Devon Lane', 'Brooklyn Simmons',
            'Ralph Edwards', 'Cameron Williamson', 'Darlene Robertson', 'Floyd Miles', 'Kristopher Webb',
        ];

        foreach ($names as $index => $name) {
            $isHigh = rand(0, 1);
            $score = $isHigh ? rand(46, 120) : rand(20, 45);

            Patient::create([
                'name' => $name,
                'email' => Str::slug($name, '.') . '@example.com',
                'gender' => rand(0, 1) ? 'male' : 'female',
                'score' => $score,
                'status' => $isHigh ? 'High' : 'Normal',
                'created_at' => now()->subDays(rand(0, 30)),
            ]);
        }
    }
}
