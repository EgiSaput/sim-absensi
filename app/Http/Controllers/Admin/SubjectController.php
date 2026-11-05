<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Subject;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;

class SubjectController extends Controller
{
    // "Kelola Mata Pelajaran" (diagram 3, sisi Admin)

    public function index()
    {
        return view('admin.subjects.index', ['subjects' => Subject::orderBy('name')->paginate(15)]);
    }

    public function create()
    {
        return view('admin.subjects.create');
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'code' => ['required', 'string', 'max:20', 'unique:subjects,code'],
            'name' => ['required', 'string', 'max:255'],
        ]);

        Subject::create($validated);

        return redirect()->route('admin.subjects.index')->with('status', 'Mata pelajaran berhasil ditambahkan.');
    }

    public function edit(Subject $subject)
    {
        return view('admin.subjects.edit', compact('subject'));
    }

    public function update(Request $request, Subject $subject)
    {
        $validated = $request->validate([
            'code' => ['required', 'string', 'max:20', Rule::unique('subjects', 'code')->ignore($subject->id)],
            'name' => ['required', 'string', 'max:255'],
        ]);

        $subject->update($validated);

        return redirect()->route('admin.subjects.index')->with('status', 'Mata pelajaran berhasil diperbarui.');
    }

    public function destroy(Subject $subject)
    {
        $subject->delete();

        return redirect()->route('admin.subjects.index')->with('status', 'Mata pelajaran berhasil dihapus.');
    }
}
