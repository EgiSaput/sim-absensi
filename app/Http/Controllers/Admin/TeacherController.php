<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rule;
use PhpOffice\PhpSpreadsheet\IOFactory;

class TeacherController extends Controller
{
    /**
     * Menampilkan data guru.
     */
    public function index()
    {
        $teachers = User::where(
            'role',
            'guru'
        )
            ->orderBy('name')
            ->paginate(15);

        return view(
            'admin.teachers.index',
            compact('teachers')
        );
    }

    /**
     * Form tambah guru.
     */
    public function create()
    {
        return view(
            'admin.teachers.create'
        );
    }

    /**
     * Simpan guru secara manual.
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'name' => [
                'required',
                'string',
                'max:255'
            ],

            'nip' => [
                'nullable',
                'string',
                'max:50',
                'unique:users,nip'
            ],

            'email' => [
                'required',
                'email',
                'unique:users,email'
            ],

            'phone' => [
                'nullable',
                'string',
                'max:30'
            ],

            'password' => [
                'required',
                'string',
                'min:8'
            ],
        ]);

        User::create([
            'name' =>
                $validated['name'],

            'nip' =>
                $validated['nip'] ?? null,

            'email' =>
                $validated['email'],

            'phone' =>
                $validated['phone'] ?? null,

            'password' =>
                Hash::make(
                    $validated['password']
                ),

            'role' =>
                'guru',

            'is_active' =>
                true,
        ]);

        return redirect()
            ->route('admin.teachers.index')
            ->with(
                'status',
                'Data guru berhasil ditambahkan.'
            );
    }

    /**
     * Form edit guru.
     */
    public function edit(User $teacher)
    {
        return view(
            'admin.teachers.edit',
            compact('teacher')
        );
    }

    /**
     * Update guru.
     */
    public function update(
        Request $request,
        User $teacher
    ) {

        $validated = $request->validate([
            'name' => [
                'required',
                'string',
                'max:255'
            ],

            'nip' => [
                'nullable',
                'string',
                'max:50',

                Rule::unique(
                    'users',
                    'nip'
                )->ignore($teacher->id)
            ],

            'email' => [
                'required',
                'email',

                Rule::unique(
                    'users',
                    'email'
                )->ignore($teacher->id)
            ],

            'phone' => [
                'nullable',
                'string',
                'max:30'
            ],

            'is_active' => [
                'sometimes',
                'boolean'
            ],
        ]);

        $teacher->update([
            ...$validated,

            'is_active' =>
                $request->boolean(
                    'is_active'
                ),
        ]);

        return redirect()
            ->route('admin.teachers.index')
            ->with(
                'status',
                'Data guru berhasil diperbarui.'
            );
    }

    /**
     * Hapus guru.
     */
    public function destroy(User $teacher)
    {
        $teacher->delete();

        return redirect()
            ->route('admin.teachers.index')
            ->with(
                'status',
                'Data guru berhasil dihapus.'
            );
    }

    /**
     * IMPORT DATA GURU
     */
    public function import(Request $request)
    {
        $request->validate([
            'file' => [
                'required',
                'file',
                'mimes:xlsx,xls,csv,txt',
                'max:5120'
            ],
        ], [
            'file.required' =>
                'File import wajib dipilih.',

            'file.file' =>
                'File yang dikirim tidak valid.',

            'file.mimes' =>
                'Format file harus XLSX, XLS, atau CSV.',

            'file.max' =>
                'Ukuran file maksimal 5 MB.',
        ]);

        try {

            $spreadsheet =
                IOFactory::load(
                    $request
                        ->file('file')
                        ->getRealPath()
                );

            $worksheet =
                $spreadsheet
                    ->getActiveSheet();

            $rows =
                $worksheet->toArray(
                    null,
                    true,
                    true,
                    false
                );

            if (count($rows) < 2) {

                return back()
                    ->withErrors([
                        'file' =>
                            'File tidak memiliki data guru.'
                    ]);
            }

            /*
            |--------------------------------------------------------------------------
            | HEADER
            |--------------------------------------------------------------------------
            */

            $header =
                array_shift($rows);

            $header =
                array_map(
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

            $header =
                array_values($header);

            /*
            |--------------------------------------------------------------------------
            | HEADER WAJIB
            |--------------------------------------------------------------------------
            */

            $requiredHeaders = [
                'name',
                'email'
            ];

            foreach (
                $requiredHeaders
                as $required
            ) {

                if (
                    !in_array(
                        $required,
                        $header
                    )
                ) {

                    return back()
                        ->withErrors([
                            'file' =>
                                "Kolom '{$required}' tidak ditemukan pada file."
                        ]);
                }
            }

            $headerIndex =
                array_flip($header);

            $success = 0;
            $failed = 0;

            $errors = [];

            DB::beginTransaction();

            foreach (
                $rows
                as $rowNumber => $row
            ) {

                $excelRow =
                    $rowNumber + 2;

                $name =
                    trim(
                        $row[
                            $headerIndex['name']
                        ] ?? ''
                    );

                $email =
                    trim(
                        $row[
                            $headerIndex['email']
                        ] ?? ''
                    );

                $nip =
                    isset(
                        $headerIndex['nip']
                    )
                        ? trim(
                            $row[
                                $headerIndex['nip']
                            ] ?? ''
                        )
                        : null;

                $phone =
                    isset(
                        $headerIndex['phone']
                    )
                        ? trim(
                            $row[
                                $headerIndex['phone']
                            ] ?? ''
                        )
                        : null;

                $password =
                    isset(
                        $headerIndex['password']
                    )
                        ? trim(
                            $row[
                                $headerIndex['password']
                            ] ?? ''
                        )
                        : '';

                /*
                |--------------------------------------------------------------------------
                | VALIDASI
                |--------------------------------------------------------------------------
                */

                if (
                    $name === '' ||
                    $email === ''
                ) {

                    $failed++;

                    $errors[] =
                        "Baris {$excelRow}: nama dan email wajib diisi.";

                    continue;
                }

                if (
                    !filter_var(
                        $email,
                        FILTER_VALIDATE_EMAIL
                    )
                ) {

                    $failed++;

                    $errors[] =
                        "Baris {$excelRow}: email '{$email}' tidak valid.";

                    continue;
                }

                /*
                |--------------------------------------------------------------------------
                | CEK EMAIL
                |--------------------------------------------------------------------------
                */

                if (
                    User::where(
                        'email',
                        $email
                    )->exists()
                ) {

                    $failed++;

                    $errors[] =
                        "Baris {$excelRow}: email '{$email}' sudah terdaftar.";

                    continue;
                }

                /*
                |--------------------------------------------------------------------------
                | CEK NIP
                |--------------------------------------------------------------------------
                */

                if (
                    $nip !== null &&
                    $nip !== '' &&
                    User::where(
                        'nip',
                        $nip
                    )->exists()
                ) {

                    $failed++;

                    $errors[] =
                        "Baris {$excelRow}: NIP '{$nip}' sudah terdaftar.";

                    continue;
                }

                /*
                |--------------------------------------------------------------------------
                | PASSWORD DEFAULT
                |--------------------------------------------------------------------------
                */

                if (
                    $password === ''
                ) {

                    $password =
                        '12345678';

                }

                if (
                    strlen($password) < 8
                ) {

                    $failed++;

                    $errors[] =
                        "Baris {$excelRow}: password minimal 8 karakter.";

                    continue;
                }

                /*
                |--------------------------------------------------------------------------
                | SIMPAN
                |--------------------------------------------------------------------------
                */

                User::create([
                    'name' =>
                        $name,

                    'nip' =>
                        $nip ?: null,

                    'email' =>
                        $email,

                    'phone' =>
                        $phone ?: null,

                    'password' =>
                        Hash::make(
                            $password
                        ),

                    'role' =>
                        'guru',

                    'is_active' =>
                        true,
                ]);

                $success++;
            }

            DB::commit();

            return redirect()
                ->route('admin.teachers.index')
                ->with(
                    'import_result',
                    [
                        'success' =>
                            $success,

                        'failed' =>
                            $failed,

                        'errors' =>
                            $errors,
                    ]
                );

        } catch (\Throwable $e) {

            DB::rollBack();

            return back()
                ->withErrors([
                    'file' =>
                        'Import gagal: ' .
                        $e->getMessage()
                ]);
        }
    }
}