<?php

namespace Database\Seeders;

use App\Models\Course;
use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    use WithoutModelEvents;

    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // User::factory(10)->create();

        User::firstOrCreate([
            'email' => 'admin@example.com',
        ], [
            'name' => 'Enrollment Admin',
            'password' => 'admin123',
            'role' => 'admin',
        ]);

        $courses = [
            ['course_code' => 'BSIT', 'course_name' => 'Bachelor of Science in Information Technology', 'units' => 12],
            ['course_code' => 'BEED', 'course_name' => 'Bachelor of Elementary Education', 'units' => 18],
            ['course_code' => 'BSHM', 'course_name' => 'Bachelor of Science in Hospitality Management', 'units' => 15],
            ['course_code' => 'BSED', 'course_name' => 'Bachelor of Secondary Education', 'units' => 18],
        ];


        foreach ($courses as $course) {
            Course::firstOrCreate(
                ['course_code' => $course['course_code']],
                ['course_name' => $course['course_name'], 'units' => $course['units']]
            );
        }
    }
}
