<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\AttendanceDetail;
use App\Models\SchoolClass;
use App\Models\Student;
use App\Models\Subject;
use Illuminate\Http\Request;

class AttendanceMonitorController extends Controller
{
    // "Monitoring Data Absensi" -> "Filter Data Absensi" (Tanggal, Kelas, Siswa,
    // Mata Pelajaran, Status Kehadiran) -> "Melihat Rekap Absensi" (diagram 3, sisi Admin)

    public function index(Request $request)
    {
        $query = AttendanceDetail::query()
            ->with(['student.schoolClass', 'session.teachingSchedule.subject', 'session.teachingSchedule.teacher']);

        $query->when($request->filled('date_from'), fn ($q) => $q->whereHas(
            'session',
            fn ($s) => $s->whereDate('date', '>=', $request->date_from)
        ));

        $query->when($request->filled('date_to'), fn ($q) => $q->whereHas(
            'session',
            fn ($s) => $s->whereDate('date', '<=', $request->date_to)
        ));

        $query->when($request->filled('class_id'), fn ($q) => $q->whereHas(
            'student',
            fn ($s) => $s->where('class_id', $request->class_id)
        ));

        $query->when($request->filled('student_id'), fn ($q) => $q->where('student_id', $request->student_id));

        $query->when($request->filled('subject_id'), fn ($q) => $q->whereHas(
            'session.teachingSchedule',
            fn ($s) => $s->where('subject_id', $request->subject_id)
        ));

        $query->when($request->filled('status'), fn ($q) => $q->where('status', $request->status));

        $details = $query->latest('id')->paginate(25)->withQueryString();

        // Rekap ringkas sesuai filter yang sedang aktif.
        $recap = (clone $query)->selectRaw('status, count(*) as total')->groupBy('status')->pluck('total', 'status');

        return view('admin.monitoring.index', [
            'details' => $details,
            'recap' => $recap,
            'classes' => SchoolClass::orderBy('name')->get(),
            'students' => Student::orderBy('name')->get(),
            'subjects' => Subject::orderBy('name')->get(),
        ]);
    }
}
