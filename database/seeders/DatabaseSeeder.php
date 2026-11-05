<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    public function run(): void
    {
        $this->call([
            UserSeeder::class,
            AcademicYearSeeder::class,
            SubjectSeeder::class,
            ClassSeeder::class,
            StudentSeeder::class,
            TeachingScheduleSeeder::class,
        ]);
    }
}
