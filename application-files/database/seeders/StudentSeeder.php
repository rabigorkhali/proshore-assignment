<?php

namespace Database\Seeders;

use App\Model\Student;
use Illuminate\Database\Seeder;
use Faker\Factory as Faker;

class StudentSeeder extends Seeder
{
    public function run()
    {
        $faker = Faker::create();

        $students = [];

        foreach (range(1, 5) as $index) {
            $students[] = [
                'name' => $faker->name,
                'email' => $faker->unique()->safeEmail,
                'created_at' => now(),
                'updated_at' => now(),
            ];
        }

        // Add a separate entry for testing with a legit email
        $students[] = [
            'name' => 'Rabi Gorkhali',
            'email' => 'rabigorkhaly@gmail.com',
            'created_at' => now(),
            'updated_at' => now(),
        ];

        // Insert all students in bulk
        Student::insert($students);
    }
}
