<?php

namespace Database\Seeders;

use App\Models\SchoolClass;
use App\Models\User;
use Illuminate\Database\Seeder;

class ClassSeeder extends Seeder
{
    public function run(): void
    {
        $teacherIds = User::where('role', 'guru')->pluck('id')->all();

        $classes = [
            ['name' => 'X IPA 1', 'grade_level' => 'X'],
            ['name' => 'XI IPA 1', 'grade_level' => 'XI'],
            ['name' => 'XII IPA 1', 'grade_level' => 'XII'],
        ];

        foreach ($classes as $index => $class) {
            SchoolClass::create([
                ...$class,
                'homeroom_teacher_id' => $teacherIds[$index % count($teacherIds)] ?? null,
            ]);
        }
    }
}
