<?php

use App\Http\Controllers\Admin\AcademicYearController;
use App\Http\Controllers\Admin\AttendanceMonitorController;
use App\Http\Controllers\Admin\ClassController;
use App\Http\Controllers\Admin\DashboardController as AdminDashboardController;
use App\Http\Controllers\Admin\PasswordResetRequestController;
use App\Http\Controllers\Admin\ReportController;
use App\Http\Controllers\Admin\ScheduleController;
use App\Http\Controllers\Admin\StudentController;
use App\Http\Controllers\Admin\SubjectController;
use App\Http\Controllers\Admin\TeacherController;
use App\Http\Controllers\Auth\ForgotPasswordController;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\Guru\AccountController;
use App\Http\Controllers\Guru\AttendanceController;
use App\Http\Controllers\Guru\DashboardController as GuruDashboardController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Rute Publik / Autentikasi
|--------------------------------------------------------------------------
| Mengikuti diagram "Login ke Sistem" dan "Lupa Password Guru".
*/

Route::middleware('guest')->group(function () {
    Route::get('/', fn () => redirect()->route('login'));

    Route::get('/login', [LoginController::class, 'create'])->name('login');
    Route::post('/login', [LoginController::class, 'store'])->name('login.store');

    Route::get('/lupa-password', [ForgotPasswordController::class, 'create'])->name('password.request');
    Route::post('/lupa-password', [ForgotPasswordController::class, 'store'])->name('password.email');
});

// Link reset password dari email harus tetap bisa dibuka meskipun ada sesi
// login lain yang aktif di browser (mis. guru buka link saat masih login,
// atau admin mencoba link saat sedang login sebagai admin). Karena itu
// rute ini TIDAK dimasukkan ke grup middleware 'guest'.
Route::get('/reset-password/{token}', [ForgotPasswordController::class, 'edit'])->name('password.reset.edit');
Route::post('/reset-password/{token}', [ForgotPasswordController::class, 'update'])->name('password.reset.update');

Route::post('/logout', [LoginController::class, 'destroy'])
    ->middleware('auth')
    ->name('logout');

/*
|--------------------------------------------------------------------------
| Rute Admin
|--------------------------------------------------------------------------
*/

Route::middleware(['auth', 'role:admin'])->prefix('admin')->name('admin.')->group(function () {
    Route::get('/dashboard', [AdminDashboardController::class, 'index'])->name('dashboard');

    Route::resource('teachers', TeacherController::class)->except('show');
    Route::post(
    '/teachers/import',
    [TeacherController::class, 'import']
)->name('teachers.import');
    Route::resource('students', StudentController::class)->except('show');
    Route::post(
    '/students/import',
    [StudentController::class, 'import']
)->name('students.import');
    Route::resource('classes', ClassController::class)->except('show');
    Route::resource('subjects', SubjectController::class)->except('show');
    Route::resource('academic-years', AcademicYearController::class)->except('show');
    Route::resource('schedules', ScheduleController::class)->except('show');

    Route::get('/password-requests', [PasswordResetRequestController::class, 'index'])->name('password-requests.index');
    Route::post('/password-requests/{passwordRequest}/approve', [PasswordResetRequestController::class, 'approve'])
        ->name('password-requests.approve');
    Route::post('/password-requests/{passwordRequest}/reject', [PasswordResetRequestController::class, 'reject'])
        ->name('password-requests.reject');

    Route::get('/monitoring', [AttendanceMonitorController::class, 'index'])->name('monitoring.index');

    Route::get('/laporan', [ReportController::class, 'index'])->name('reports.index');
    Route::post('/laporan', [ReportController::class, 'generate'])->name('reports.generate');
});

/*
|--------------------------------------------------------------------------
| Rute Guru
|--------------------------------------------------------------------------
*/

Route::middleware(['auth', 'role:guru'])->prefix('guru')->name('guru.')->group(function () {
    Route::get('/dashboard', [GuruDashboardController::class, 'index'])->name('dashboard');

    Route::get('/jadwal', [AttendanceController::class, 'jadwal'])->name('jadwal.index');

    Route::get('/absensi/{schedule}', [AttendanceController::class, 'show'])->name('absensi.show');
    Route::post('/absensi/{schedule}', [AttendanceController::class, 'store'])->name('absensi.store');
    Route::put('/absensi/session/{session}', [AttendanceController::class, 'update'])->name('absensi.update');

    Route::get('/akun', [AccountController::class, 'edit'])->name('account.edit');
    Route::post('/akun/ganti-email', [AccountController::class, 'requestEmailChange'])->name('account.email.request');
    Route::post('/akun/verifikasi-email', [AccountController::class, 'verifyEmailChange'])->name('account.email.verify');
    Route::post('/akun/ganti-password', [AccountController::class, 'updatePassword'])->name('account.password.update');
});