<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\SchoolClass;
use App\Models\Student;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Validation\Rule;
use PhpOffice\PhpSpreadsheet\IOFactory;

class StudentController extends Controller
{
    /**
     * Menampilkan data siswa.
     */
    public function index(Request $request)
    {
        $students = Student::with('schoolClass')

            // ==========================================
            // FILTER KELAS
            // ==========================================
            ->when(
                $request->filled('class_id'),
                function ($q) use ($request) {
                    $q->where('class_id', $request->class_id);
                }
            )

            // ==========================================
            // PENCARIAN NAMA / NIS
            // ==========================================
            ->when(
                $request->filled('search'),
                function ($q) use ($request) {
                    $search = $request->search;

                    $q->where(function ($query) use ($search) {
                        $query->where(
                            'name',
                            'like',
                            '%' . $search . '%'
                        )
                        ->orWhere(
                            'nis',
                            'like',
                            '%' . $search . '%'
                        );
                    });
                }
            )

            // ==========================================
            // FILTER STATUS AKTIF / NONAKTIF
            // ==========================================
            ->when(
                $request->filled('status'),
                function ($q) use ($request) {

                    if ($request->status === 'active') {
                        $q->where('is_active', true);
                    }

                    if ($request->status === 'inactive') {
                        $q->where('is_active', false);
                    }
                }
            )

            // ==========================================
            // URUTKAN BERDASARKAN NAMA
            // ==========================================
            ->orderBy('name')

            // ==========================================
            // PAGINATION
            // ==========================================
            ->paginate(15)

            // Agar search/filter tetap terbawa
            // ketika pindah halaman
            ->withQueryString();

        return view('admin.students.index', [
            'students' => $students,

            'classes' => SchoolClass::orderBy('name')->get(),
        ]);
    }

    /**
     * Form tambah siswa.
     */
    public function create()
    {
        return view('admin.students.create', [
            'classes' => SchoolClass::orderBy('name')->get(),
        ]);
    }

    /**
     * Menyimpan siswa secara manual.
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'nis' => [
                'required',
                'string',
                'max:30',
                'unique:students,nis',
            ],

            'name' => [
                'required',
                'string',
                'max:255',
            ],

            'class_id' => [
                'required',
                'exists:classes,id',
            ],

            'gender' => [
                'required',
                'in:L,P',
            ],

            'parent_name' => [
                'nullable',
                'string',
                'max:255',
            ],

            'parent_phone' => [
                'nullable',
                'string',
                'max:30',
            ],
        ]);

        Student::create($validated);

        return redirect()
            ->route('admin.students.index')
            ->with(
                'status',
                'Data siswa berhasil ditambahkan.'
            );
    }

    /**
     * Form edit siswa.
     */
    public function edit(Student $student)
    {
        return view('admin.students.edit', [
            'student' => $student,

            'classes' => SchoolClass::orderBy('name')->get(),
        ]);
    }

    /**
     * Update siswa.
     */
    public function update(
        Request $request,
        Student $student
    ) {
        $validated = $request->validate([
            'nis' => [
                'required',
                'string',
                'max:30',

                Rule::unique(
                    'students',
                    'nis'
                )->ignore($student->id),
            ],

            'name' => [
                'required',
                'string',
                'max:255',
            ],

            'class_id' => [
                'required',
                'exists:classes,id',
            ],

            'gender' => [
                'required',
                'in:L,P',
            ],

            'parent_name' => [
                'nullable',
                'string',
                'max:255',
            ],

            'parent_phone' => [
                'nullable',
                'string',
                'max:30',
            ],

            'is_active' => [
                'sometimes',
                'boolean',
            ],
        ]);

        $student->update([
            ...$validated,

            // Jika checkbox aktif dicentang
            // maka true, jika tidak maka false
            'is_active' => $request->boolean('is_active'),
        ]);

        return redirect()
            ->route('admin.students.index')
            ->with(
                'status',
                'Data siswa berhasil diperbarui.'
            );
    }

    /**
     * Hapus siswa.
     */
    public function destroy(Student $student)
    {
        $student->delete();

        return redirect()
            ->route('admin.students.index')
            ->with(
                'status',
                'Data siswa berhasil dihapus.'
            );
    }

    /**
     * IMPORT DATA SISWA DARI EXCEL / CSV
     */
    public function import(Request $request)
    {
        // ==========================================
        // VALIDASI FILE
        // ==========================================
        $request->validate(
            [
                'file' => [
                    'required',
                    'file',
                    'mimes:xlsx,xls,csv,txt',
                    'max:5120',
                ],
            ],
            [
                'file.required' =>
                    'File import wajib dipilih.',

                'file.file' =>
                    'File yang dikirim tidak valid.',

                'file.mimes' =>
                    'Format file harus XLSX, XLS, atau CSV.',

                'file.max' =>
                    'Ukuran file maksimal 5 MB.',
            ]
        );

        try {

            // ==========================================
            // LOAD FILE EXCEL / CSV
            // ==========================================
            $spreadsheet = IOFactory::load(
                $request->file('file')->getRealPath()
            );

            $worksheet = $spreadsheet->getActiveSheet();

            $rows = $worksheet->toArray(
                null,
                true,
                true,
                false
            );

            // ==========================================
            // CEK DATA
            // ==========================================
            if (count($rows) < 2) {
                return back()
                    ->withErrors([
                        'file' =>
                            'File tidak memiliki data siswa.',
                    ]);
            }

            // ==========================================
            // HEADER
            // ==========================================
            $header = array_shift($rows);

            $header = array_map(
                function ($value) {

                    return strtolower(
                        trim(
                            str_replace(
                                ' ',
                                '_',
                                $value ?? ''
                            )
                        )
                    );
                },
                $header
            );

            $header = array_values($header);

            // ==========================================
            // HEADER YANG DIPERBOLEHKAN
            // ==========================================
            $requiredHeaders = [
                'nis',
                'name',
                'class',
                'gender',
            ];

            foreach ($requiredHeaders as $required) {

                if (!in_array($required, $header)) {

                    return back()
                        ->withErrors([
                            'file' =>
                                "Kolom '{$required}' tidak ditemukan pada file.",
                        ]);
                }
            }

            // ==========================================
            // INDEX HEADER
            // ==========================================
            $headerIndex = array_flip($header);

            $success = 0;
            $failed = 0;
            $errors = [];

            // ==========================================
            // MULAI TRANSAKSI
            // ==========================================
            DB::beginTransaction();

            // ==========================================
            // PROSES SETIAP BARIS
            // ==========================================
            foreach ($rows as $rowNumber => $row) {

                $excelRow = $rowNumber + 2;

                // --------------------------------------
                // NIS
                // --------------------------------------
                $nis = trim(
                    $row[
                        $headerIndex['nis']
                    ] ?? ''
                );

                // --------------------------------------
                // NAMA
                // --------------------------------------
                $name = trim(
                    $row[
                        $headerIndex['name']
                    ] ?? ''
                );

                // --------------------------------------
                // KELAS
                // --------------------------------------
                $className = trim(
                    $row[
                        $headerIndex['class']
                    ] ?? ''
                );

                // --------------------------------------
                // GENDER
                // --------------------------------------
                $gender = strtoupper(
                    trim(
                        $row[
                            $headerIndex['gender']
                        ] ?? ''
                    )
                );

                // --------------------------------------
                // NAMA ORANG TUA
                // --------------------------------------
                $parentName = isset(
                    $headerIndex['parent_name']
                )
                    ? trim(
                        $row[
                            $headerIndex['parent_name']
                        ] ?? ''
                    )
                    : null;

                // --------------------------------------
                // NOMOR TELEPON ORANG TUA
                // --------------------------------------
                $parentPhone = isset(
                    $headerIndex['parent_phone']
                )
                    ? trim(
                        $row[
                            $headerIndex['parent_phone']
                        ] ?? ''
                    )
                    : null;

                // ======================================
                // VALIDASI DATA DASAR
                // ======================================
                if (
                    $nis === '' ||
                    $name === '' ||
                    $className === '' ||
                    $gender === ''
                ) {

                    $failed++;

                    $errors[] =
                        "Baris {$excelRow}: NIS, nama, kelas, dan gender wajib diisi.";

                    continue;
                }

                // ======================================
                // VALIDASI GENDER
                // ======================================
                if (!in_array($gender, ['L', 'P'])) {

                    $failed++;

                    $errors[] =
                        "Baris {$excelRow}: gender harus L atau P.";

                    continue;
                }

                // ======================================
                // CARI KELAS
                // ======================================
                $schoolClass = SchoolClass::whereRaw(
                    'LOWER(name) = ?',
                    [
                        strtolower($className),
                    ]
                )->first();

                if (!$schoolClass) {

                    $failed++;

                    $errors[] =
                        "Baris {$excelRow}: kelas '{$className}' tidak ditemukan.";

                    continue;
                }

                // ======================================
                // CEK NIS
                // ======================================
                if (
                    Student::where(
                        'nis',
                        $nis
                    )->exists()
                ) {

                    $failed++;

                    $errors[] =
                        "Baris {$excelRow}: NIS '{$nis}' sudah terdaftar.";

                    continue;
                }

                // ======================================
                // SIMPAN SISWA
                // ======================================
                Student::create([
                    'nis' => $nis,

                    'name' => $name,

                    'class_id' => $schoolClass->id,

                    'gender' => $gender,

                    'parent_name' =>
                        $parentName ?: null,

                    'parent_phone' =>
                        $parentPhone ?: null,

                    // Siswa hasil import
                    // otomatis aktif
                    'is_active' => true,
                ]);

                $success++;
            }

            // ==========================================
            // COMMIT TRANSAKSI
            // ==========================================
            DB::commit();

            // ==========================================
            // HASIL IMPORT
            // ==========================================
            return redirect()
                ->route('admin.students.index')
                ->with(
                    'import_result',
                    [
                        'success' => $success,

                        'failed' => $failed,

                        'errors' => $errors,
                    ]
                );

        } catch (\Throwable $e) {

            // ==========================================
            // ROLLBACK JIKA ERROR
            // ==========================================
            DB::rollBack();

            return back()
                ->withErrors([
                    'file' =>
                        'Import gagal: ' .
                        $e->getMessage(),
                ]);
        }
    }
}