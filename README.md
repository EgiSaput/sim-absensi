# Absensi MA Az-Zahra — Backend (Laravel 12)

Backend untuk 3 activity diagram yang kamu berikan:
1. Lupa Password Guru (guru ajukan reset -> admin approve/reject -> guru set password baru)
2. Pengelolaan Akun Guru (ganti email dengan kode verifikasi, ganti password)
3. Sistem Informasi Absensi & Monitoring Kehadiran Siswa (login role admin/guru,
   CRUD data master, jadwal mengajar, input & edit absensi, monitoring + filter,
   generate laporan)

## Catatan penting

Sandbox tempat file ini dibuat **tidak punya PHP/Composer**, jadi semua file di sini
adalah *file aplikasi Laravel* (migration, model, controller, route, view, seeder)
yang perlu kamu taruh di atas project Laravel 12 kosong — bukan project yang sudah
langsung bisa `php artisan serve`. Ikuti langkah setup di bawah, hanya makan waktu
~5 menit.

## Struktur yang disertakan

```
app/Http/Controllers/Auth/      -> LoginController, ForgotPasswordController
app/Http/Controllers/Admin/     -> Dashboard, Teacher, Student, Class, Subject,
                                    AcademicYear, Schedule, PasswordResetRequest,
                                    AttendanceMonitor, Report
app/Http/Controllers/Guru/      -> Dashboard, Attendance, Account
app/Http/Middleware/            -> EnsureUserHasRole.php (alias: role)
app/Models/                     -> User, PasswordResetRequest, EmailChangeRequest,
                                    AcademicYear, Subject, SchoolClass, Student,
                                    TeachingSchedule, AttendanceSession,
                                    AttendanceDetail, ParentNotification
database/migrations/            -> 11 migration, urut sesuai skema di bawah
database/seeders/                -> data dummy: 1 admin, 3 guru, 2 tahun ajaran,
                                    5 mapel, 3 kelas, 30 siswa, jadwal mengajar
resources/views/                -> view Blade sederhana (belum didesain, fungsional)
routes/web.php                  -> semua route
bootstrap/app.php               -> contoh registrasi middleware alias 'role'
```

## Skema Database

- **users** — admin & guru jadi satu tabel, dibedakan kolom `role`
- **password_reset_requests** — alur approval reset password oleh admin
- **email_change_requests** — kode verifikasi 6 digit untuk ganti email
- **academic_years** — tahun ajaran + semester
- **subjects** — mata pelajaran
- **classes** — kelas + wali kelas (relasi ke users)
- **students** — siswa, terhubung ke classes, ada data orang tua untuk notifikasi
- **teaching_schedules** — jadwal mengajar (guru + kelas + mapel + tahun ajaran + hari/jam)
- **attendance_sessions** — 1 baris = 1 jadwal pada 1 tanggal (unique per jadwal+tanggal)
- **attendance_details** — status HADIR/IZIN/SAKIT/ALFA per siswa per sesi
- **parent_notifications** — log notifikasi ke orang tua (disimulasikan, belum kirim WA/SMS asli)

## Langkah Setup

1. Buat project Laravel 12 baru (di komputer kamu yang sudah ada PHP & Composer):
   ```
   composer create-project laravel/laravel absensi-azzahra
   cd absensi-azzahra
   ```

2. Timpa/tambahkan file dari folder ini ke project barumu (folder `app`, `database`,
   `resources`, `routes`, dan `bootstrap/app.php`), overwrite yang sudah ada.

3. Salin `.env.example` di folder ini jadi `.env` di project Laravel-mu (atau gabungkan
   isinya), lalu:
   ```
   php artisan key:generate
   ```
   Sesuaikan `DB_*` dengan MySQL/MariaDB kamu (buat database `absensi_azzahra` dulu).

4. Migrasi + seed data dummy:
   ```
   php artisan migrate --seed
   ```

5. Jalankan:
   ```
   php artisan serve
   ```

## Akun default (dari seeder)

| Role  | Email                          | Password    |
|-------|---------------------------------|-------------|
| Admin | admin@mazahra.sch.id            | password123 |
| Guru  | ahmad.fauzi@mazahra.sch.id      | password123 |
| Guru  | siti.nurhaliza@mazahra.sch.id   | password123 |
| Guru  | dedi.kurniawan@mazahra.sch.id   | password123 |

## Yang disederhanakan (untuk kamu tindak lanjuti nanti)

- **Email & notifikasi WA/SMS**: belum dikonfigurasi kirim sungguhan. Kode verifikasi
  ganti email dan link reset password ditampilkan langsung lewat flash message
  (mode dev) — mudah nanti diganti pakai `Mail::send(...)` / Notification.
- **Laporan PDF**: diekspor sebagai halaman print (`window.print()`), bukan file PDF
  asli, supaya tidak butuh package composer tambahan (bisa upgrade ke
  `barryvdh/laravel-dompdf` kapan saja).
- **Laporan Excel**: diekspor sebagai CSV (bisa dibuka Excel langsung), belum pakai
  `maatwebsite/excel`.
- **Tampilan/Front-end**: sengaja dibuat polos (inline CSS seadanya) sesuai
  permintaanmu — desain final menyusul.

## Ringkasan Route

- `/login`, `/lupa-password`, `/reset-password/{token}`
- `/admin/*` (middleware `role:admin`) — dashboard, teachers, students, classes,
  subjects, academic-years, schedules, password-requests, monitoring, laporan
- `/guru/*` (middleware `role:guru`) — dashboard, jadwal, absensi/{schedule},
  akun (ganti email/password)
