<?php

namespace Database\Seeders;

use App\Models\SchoolClass;
use App\Models\Student;
use Illuminate\Database\Seeder;

class StudentSeeder extends Seeder
{
    public function run(): void
    {
        $names = [
            'Ahmad Rizki', 'Muhammad Fadhil', 'Siti Aminah', 'Nur Halimah', 'Fatimah Azzahra',
            'Abdul Malik', 'Khadijah Putri', 'Yusuf Ibrahim', 'Zainab Salsabila', 'Umar Hakim',
        ];

        $classes = SchoolClass::all();
        $nisCounter = 1;

        foreach ($classes as $class) {
            foreach ($names as $i => $name) {
                Student::create([
                    'nis' => '2025'.str_pad((string) $nisCounter++, 4, '0', STR_PAD_LEFT),
                    'name' => $name.' '.$class->grade_level,
                    'class_id' => $class->id,
                    'gender' => $i % 2 === 0 ? 'L' : 'P',
                    'parent_name' => 'Wali dari '.$name,
                    'parent_phone' => '0813'.rand(10000000, 99999999),
                ]);
            }
        }
    }
}
