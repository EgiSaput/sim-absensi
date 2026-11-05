<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\SchoolClass;
use App\Models\User;
use Illuminate\Http\Request;

class ClassController extends Controller
{
    // "Kelola Data Kelas" (diagram 3, sisi Admin)

    public function index()
    {
        return view('admin.classes.index', [
            'classes' => SchoolClass::withCount('students')->orderBy('name')->paginate(15),
        ]);
    }

    public function create()
    {
        return view('admin.classes.create', ['teachers' => User::where('role', 'guru')->orderBy('name')->get()]);
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'name' => ['required', 'string', 'max:255'],
            'grade_level' => ['required', 'string', 'max:10'],
            'homeroom_teacher_id' => ['nullable', 'exists:users,id'],
        ]);

        SchoolClass::create($validated);

        return redirect()->route('admin.classes.index')->with('status', 'Data kelas berhasil ditambahkan.');
    }

    public function edit(SchoolClass $class)
    {
        return view('admin.classes.edit', [
            'class' => $class,
            'teachers' => User::where('role', 'guru')->orderBy('name')->get(),
        ]);
    }

    public function update(Request $request, SchoolClass $class)
    {
        $validated = $request->validate([
            'name' => ['required', 'string', 'max:255'],
            'grade_level' => ['required', 'string', 'max:10'],
            'homeroom_teacher_id' => ['nullable', 'exists:users,id'],
        ]);

        $class->update($validated);

        return redirect()->route('admin.classes.index')->with('status', 'Data kelas berhasil diperbarui.');
    }

    public function destroy(SchoolClass $class)
    {
        $class->delete();

        return redirect()->route('admin.classes.index')->with('status', 'Data kelas berhasil dihapus.');
    }
}
