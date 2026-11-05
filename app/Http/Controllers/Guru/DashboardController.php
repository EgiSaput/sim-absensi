<?php

namespace App\Http\Controllers\Guru;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    // "Tampilkan Dashboard Guru" -> "Melihat Jadwal Mengajar Hari Ini" (diagram 3)

    public function index(Request $request)
    {
        $dayMap = [1 => 'senin', 2 => 'selasa', 3 => 'rabu', 4 => 'kamis', 5 => 'jumat', 6 => 'sabtu', 7 => 'minggu'];
        $today = $dayMap[now()->dayOfWeekIso] ?? null;

        $todaySchedules = $request->user()
            ->teachingSchedules()
            ->with(['schoolClass', 'subject'])
            ->where('day', $today)
            ->orderBy('start_time')
            ->get()
            ->map(function ($schedule) {
                $schedule->has_attendance_today = $schedule->attendanceSessions()
                    ->whereDate('date', today())
                    ->exists();

                return $schedule;
            });

        return view('guru.dashboard', compact('todaySchedules', 'today'));
    }
}
