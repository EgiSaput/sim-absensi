<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\AttendanceSession;
use App\Models\PasswordResetRequest;
use App\Models\SchoolClass;
use App\Models\Student;
use App\Models\User;

class DashboardController extends Controller
{
    public function index()
    {
        return view('admin.dashboard', [
            'totalGuru' => User::where('role', 'guru')->count(),
            'totalSiswa' => Student::count(),
            'totalKelas' => SchoolClass::count(),
            'absensiHariIni' => AttendanceSession::whereDate('date', today())->count(),
            'pendingResetRequests' => PasswordResetRequest::where('status', 'pending')->count(),
        ]);
    }
}
