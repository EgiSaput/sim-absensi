<?php

namespace Database\Seeders;

use App\Models\Subject;
use Illuminate\Database\Seeder;

class SubjectSeeder extends Seeder
{
    public function run(): void
    {
        $subjects = [
            ['code' => 'MTK', 'name' => 'Matematika'],
            ['code' => 'BIND', 'name' => 'Bahasa Indonesia'],
            ['code' => 'BING', 'name' => 'Bahasa Inggris'],
            ['code' => 'FIQ', 'name' => 'Fiqih'],
            ['code' => 'TIK', 'name' => 'Teknologi Informasi dan Komunikasi'],
        ];

        foreach ($subjects as $subject) {
            Subject::create($subject);
        }
    }
}
