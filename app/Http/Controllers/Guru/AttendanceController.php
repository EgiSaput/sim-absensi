<?php

namespace App\Http\Controllers\Guru;

use App\Http\Controllers\Controller;
use App\Models\AttendanceDetail;
use App\Models\AttendanceSession;
use App\Models\ParentNotification;
use App\Models\TeachingSchedule;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Validation\Rule;

class AttendanceController extends Controller
{
    /**
     * Menampilkan jadwal mengajar guru.
     */
    public function jadwal(Request $request)
    {
        $schedules = $request->user()
            ->teachingSchedules()
            ->with([
                'schoolClass',
                'subject',
                'academicYear'
            ])
            ->orderBy('day')
            ->orderBy('start_time')
            ->get();

        return view('guru.jadwal', compact('schedules'));
    }

    /**
     * Menampilkan halaman absensi.
     *
     * Jika absensi tanggal tersebut sudah ada:
     * - tampilkan data absensi
     * - guru dapat mengedit
     *
     * Jika belum ada:
     * - tampilkan daftar siswa
     * - status belum dipilih
     */
    public function show(Request $request, TeachingSchedule $schedule)
    {
        $this->authorizeSchedule($request, $schedule);

        /*
         * Ambil tanggal dari URL:
         *
         * /guru/absensi/1?tanggal=2026-08-29
         *
         * Jika tidak ada tanggal, gunakan tanggal hari ini.
         */
        $date = $request->input(
            'tanggal',
            today()->toDateString()
        );

        /*
         * Pastikan format tanggal benar.
         */
        if (!preg_match('/^\d{4}-\d{2}-\d{2}$/', $date)) {
            $date = today()->toDateString();
        }

        /*
         * Cari apakah absensi untuk jadwal + tanggal tersebut
         * sudah pernah dibuat.
         */
        $session = $schedule
            ->attendanceSessions()
            ->with('details.student')
            ->whereDate('date', $date)
            ->first();

        /*
         * Ambil siswa aktif dari kelas tersebut.
         */
        $students = $schedule
            ->schoolClass
            ->students()
            ->where('is_active', true)
            ->orderBy('name')
            ->get();

        return view(
            'guru.absensi.form',
            compact(
                'schedule',
                'date',
                'session',
                'students'
            )
        );
    }

    /**
     * Menyimpan absensi baru.
     */
    public function store(Request $request, TeachingSchedule $schedule)
    {
        $this->authorizeSchedule($request, $schedule);

        /*
         * Validasi dasar.
         */
        $validated = $request->validate([
            'tanggal' => [
                'required',
                'date',
                'date_format:Y-m-d'
            ],

            'gunakan_semua_hadir' => [
                'nullable',
                'boolean'
            ],

            'notify_parents' => [
                'nullable',
                'boolean'
            ],

            'statuses' => [
                'nullable',
                'array'
            ],

            'statuses.*' => [
                'nullable',
                Rule::in([
                    'HADIR',
                    'IZIN',
                    'SAKIT',
                    'ALFA'
                ])
            ],

            'keterangan' => [
                'nullable',
                'array'
            ],

            'keterangan.*' => [
                'nullable',
                'string',
                'max:255'
            ],
        ]);

        /*
         * Apakah guru memilih "Hadir Semua"?
         */
        $useAllPresent = $request->boolean('gunakan_semua_hadir');

        /*
         * Jika TIDAK menggunakan Hadir Semua,
         * maka guru wajib mengisi status setiap siswa.
         */
        if (!$useAllPresent) {

            $students = $schedule
                ->schoolClass
                ->students()
                ->where('is_active', true)
                ->orderBy('name')
                ->get();

            $statuses = $validated['statuses'] ?? [];

            $missingStudents = [];

            foreach ($students as $student) {

                if (
                    !isset($statuses[$student->id]) ||
                    empty($statuses[$student->id])
                ) {
                    $missingStudents[] = $student->name;
                }
            }

            if (!empty($missingStudents)) {

                return back()
                    ->withInput()
                    ->withErrors([
                        'statuses' =>
                            'Status absensi belum lengkap. Silakan isi semua siswa terlebih dahulu.'
                    ]);
            }
        }

        /*
         * Cek apakah absensi sudah pernah dibuat.
         */
        $alreadyExists = AttendanceSession::where(
            'teaching_schedule_id',
            $schedule->id
        )
            ->whereDate(
                'date',
                $validated['tanggal']
            )
            ->exists();

        if ($alreadyExists) {

            return back()
                ->withErrors([
                    'tanggal' =>
                        'Absensi untuk tanggal ini sudah pernah disimpan. Silakan gunakan mode edit.'
                ]);
        }

        /*
         * Ambil siswa aktif.
         */
        $students = $schedule
            ->schoolClass
            ->students()
            ->where('is_active', true)
            ->orderBy('name')
            ->get();

        $notifyParents = $request->boolean('notify_parents');

        /*
         * Simpan menggunakan database transaction.
         */
        $session = DB::transaction(function () use (
            $schedule,
            $validated,
            $students,
            $useAllPresent,
            $notifyParents,
            $request
        ) {

            /*
             * Buat sesi absensi.
             */
            $session = AttendanceSession::create([
                'teaching_schedule_id' => $schedule->id,
                'date' => $validated['tanggal'],
                'status' => 'submitted',
                'created_by' => $request->user()->id,
                'confirmed_at' => now(),
            ]);

            /*
             * Simpan status setiap siswa.
             */
            foreach ($students as $student) {

                /*
                 * Jika Hadir Semua dipilih:
                 * semua otomatis HADIR.
                 *
                 * Jika tidak:
                 * ambil status yang dipilih guru.
                 */
                $status = $useAllPresent
                    ? 'HADIR'
                    : ($validated['statuses'][$student->id] ?? null);

                /*
                 * Jangan simpan status kosong.
                 * Seharusnya sudah dicegah oleh validasi di atas.
                 */
                if (!$status) {
                    continue;
                }

                $keterangan =
                    $validated['keterangan'][$student->id] ?? null;

                /*
                 * Simpan detail absensi.
                 */
                $detail = AttendanceDetail::create([
                    'attendance_session_id' => $session->id,
                    'student_id' => $student->id,
                    'status' => $status,
                    'keterangan' => $keterangan,
                ]);

                /*
                 * Jika siswa tidak hadir dan fitur notifikasi
                 * orang tua diaktifkan.
                 */
                if (
                    $notifyParents &&
                    $status !== 'HADIR' &&
                    !empty($student->parent_phone)
                ) {

                    ParentNotification::create([
                        'attendance_detail_id' => $detail->id,
                        'sent' => true,
                        'sent_at' => now(),
                        'message' =>
                            "Ananda {$student->name} tercatat {$status} pada "
                            . $validated['tanggal']
                            . '.',
                    ]);
                }
            }

            return $session;
        });

        /*
         * Kembali ke halaman absensi.
         */
        return redirect()
            ->route(
                'guru.absensi.show',
                [
                    'schedule' => $schedule->id,
                    'tanggal' => $session->date->toDateString(),
                ]
            )
            ->with(
                'status',
                'Absensi berhasil disimpan.'
            );
    }

    /**
     * Update absensi yang sudah tersimpan.
     */
    public function update(
        Request $request,
        AttendanceSession $session
    ) {
        $this->authorizeSession(
            $request,
            $session
        );

        $validated = $request->validate([
            'statuses' => [
                'required',
                'array'
            ],

            'statuses.*' => [
                'required',
                Rule::in([
                    'HADIR',
                    'IZIN',
                    'SAKIT',
                    'ALFA'
                ])
            ],

            'keterangan' => [
                'nullable',
                'array'
            ],

            'keterangan.*' => [
                'nullable',
                'string',
                'max:255'
            ],
        ]);

        /*
         * Update setiap siswa.
         */
        DB::transaction(function () use (
            $session,
            $validated
        ) {

            foreach (
                $validated['statuses']
                as $studentId => $status
            ) {

                AttendanceDetail::updateOrCreate(
                    [
                        'attendance_session_id' =>
                            $session->id,

                        'student_id' =>
                            $studentId,
                    ],
                    [
                        'status' => $status,

                        'keterangan' =>
                            $validated['keterangan'][$studentId]
                            ?? null,

                        'edited_at' => now(),
                    ]
                );
            }
        });

        return redirect()
            ->route(
                'guru.absensi.show',
                [
                    'schedule' =>
                        $session->teaching_schedule_id,

                    'tanggal' =>
                        $session->date->toDateString(),
                ]
            )
            ->with(
                'status',
                'Perubahan absensi berhasil disimpan.'
            );
    }

    /**
     * Memastikan jadwal memang milik guru yang login.
     */
    private function authorizeSchedule(
        Request $request,
        TeachingSchedule $schedule
    ): void {

        abort_unless(
            $schedule->teacher_id === $request->user()->id,
            403
        );
    }

    /**
     * Memastikan session absensi milik jadwal guru tersebut.
     */
    private function authorizeSession(
        Request $request,
        AttendanceSession $session
    ): void {

        abort_unless(
            $session->teachingSchedule->teacher_id ===
                $request->user()->id,
            403
        );
    }
}