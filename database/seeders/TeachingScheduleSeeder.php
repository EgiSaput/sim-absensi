<?php

namespace Database\Seeders;

use App\Models\AcademicYear;
use App\Models\SchoolClass;
use App\Models\Subject;
use App\Models\TeachingSchedule;
use App\Models\User;
use Illuminate\Database\Seeder;

class TeachingScheduleSeeder extends Seeder
{
    public function run(): void
    {
        $academicYear = AcademicYear::where('is_active', true)->first();
        $teachers = User::where('role', 'guru')->get();
        $classes = SchoolClass::all();
        $subjects = Subject::all();

        $days = ['senin', 'selasa', 'rabu', 'kamis', 'jumat'];
        $startHour = 7;

        foreach ($classes as $classIndex => $class) {
            foreach ($subjects->take(3) as $subjectIndex => $subject) {
                $teacher = $teachers[($classIndex + $subjectIndex) % $teachers->count()];

                TeachingSchedule::create([
                    'teacher_id' => $teacher->id,
                    'class_id' => $class->id,
                    'subject_id' => $subject->id,
                    'academic_year_id' => $academicYear->id,
                    'day' => $days[($classIndex + $subjectIndex) % count($days)],
                    'start_time' => sprintf('%02d:00', $startHour + $subjectIndex),
                    'end_time' => sprintf('%02d:30', $startHour + $subjectIndex + 1),
                ]);
            }
        }
    }
}
