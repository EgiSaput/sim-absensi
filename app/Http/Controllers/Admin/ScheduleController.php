<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\AcademicYear;
use App\Models\SchoolClass;
use App\Models\Subject;
use App\Models\TeachingSchedule;
use App\Models\User;
use Illuminate\Http\Request;

class ScheduleController extends Controller
{
    // "Kelola Jadwal Mengajar" (diagram 3, sisi Admin)

    public function index()
    {
        $schedules = TeachingSchedule::with(['teacher', 'schoolClass', 'subject', 'academicYear'])
            ->orderBy('day')
            ->orderBy('start_time')
            ->paginate(20);

        return view('admin.schedules.index', compact('schedules'));
    }

    public function create()
    {
        return $this->formData();
    }

    public function store(Request $request)
    {
        $validated = $this->validated($request);

        TeachingSchedule::create($validated);

        return redirect()->route('admin.schedules.index')->with('status', 'Jadwal mengajar berhasil ditambahkan.');
    }

    public function edit(TeachingSchedule $schedule)
    {
        return $this->formData(['schedule' => $schedule]);
    }

    public function update(Request $request, TeachingSchedule $schedule)
    {
        $validated = $this->validated($request);

        $schedule->update($validated);

        return redirect()->route('admin.schedules.index')->with('status', 'Jadwal mengajar berhasil diperbarui.');
    }

    public function destroy(TeachingSchedule $schedule)
    {
        $schedule->delete();

        return redirect()->route('admin.schedules.index')->with('status', 'Jadwal mengajar berhasil dihapus.');
    }

    private function validated(Request $request): array
    {
        return $request->validate([
            'teacher_id' => ['required', 'exists:users,id'],
            'class_id' => ['required', 'exists:classes,id'],
            'subject_id' => ['required', 'exists:subjects,id'],
            'academic_year_id' => ['required', 'exists:academic_years,id'],
            'day' => ['required', 'in:senin,selasa,rabu,kamis,jumat,sabtu'],
            'start_time' => ['required', 'date_format:H:i'],
            'end_time' => ['required', 'date_format:H:i', 'after:start_time'],
        ]);
    }

    private function formData(array $extra = [])
    {
        return view('admin.schedules.form', array_merge([
            'teachers' => User::where('role', 'guru')->orderBy('name')->get(),
            'classes' => SchoolClass::orderBy('name')->get(),
            'subjects' => Subject::orderBy('name')->get(),
            'academicYears' => AcademicYear::orderByDesc('name')->get(),
            'schedule' => null,
        ], $extra));
    }
}
