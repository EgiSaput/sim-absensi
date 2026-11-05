<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\AcademicYear;
use Illuminate\Http\Request;

class AcademicYearController extends Controller
{
    // "Kelola Tahun Ajaran" (diagram 3, sisi Admin)

    public function index()
    {
        return view('admin.academic-years.index', ['years' => AcademicYear::orderByDesc('name')->get()]);
    }

    public function create()
    {
        return view('admin.academic-years.create');
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'name' => ['required', 'string', 'max:20'],
            'semester' => ['required', 'in:ganjil,genap'],
            'is_active' => ['sometimes', 'boolean'],
        ]);

        $validated['is_active'] = $request->boolean('is_active');

        if ($validated['is_active']) {
            AcademicYear::query()->update(['is_active' => false]);
        }

        AcademicYear::create($validated);

        return redirect()->route('admin.academic-years.index')->with('status', 'Tahun ajaran berhasil ditambahkan.');
    }

    public function edit(AcademicYear $academicYear)
    {
        return view('admin.academic-years.edit', ['year' => $academicYear]);
    }

    public function update(Request $request, AcademicYear $academicYear)
    {
        $validated = $request->validate([
            'name' => ['required', 'string', 'max:20'],
            'semester' => ['required', 'in:ganjil,genap'],
            'is_active' => ['sometimes', 'boolean'],
        ]);

        $validated['is_active'] = $request->boolean('is_active');

        if ($validated['is_active']) {
            AcademicYear::where('id', '!=', $academicYear->id)->update(['is_active' => false]);
        }

        $academicYear->update($validated);

        return redirect()->route('admin.academic-years.index')->with('status', 'Tahun ajaran berhasil diperbarui.');
    }

    public function destroy(AcademicYear $academicYear)
    {
        $academicYear->delete();

        return redirect()->route('admin.academic-years.index')->with('status', 'Tahun ajaran berhasil dihapus.');
    }
}
