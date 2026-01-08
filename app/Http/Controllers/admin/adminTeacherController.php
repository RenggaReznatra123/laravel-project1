<?php

namespace App\Http\Controllers\admin;

use App\Models\Teacher;
use App\Models\Subject;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class AdminTeacherController extends Controller
{
    public function index()
    {
        $teachers = Teacher::with('subject')->get();

        // Filter subject: hanya yang belum punya guru
        $subjects = Subject::whereDoesntHave('teacher')->get();

        return view('admin.teacher.index', [
            'title' => 'Teachers',
            'teachers' => $teachers,
            'subjects' => $subjects,
        ]);
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'name'       => 'required|string|max:255',
            'subject_id' => 'required|unique:teachers,subject_id',
            'phone'      => 'nullable|string|max:20',
            'email'      => 'required|email|unique:teachers,email',
            'address'    => 'nullable|string|max:255',
        ], [
            'subject_id.unique' => 'Mata pelajaran ini sudah memiliki guru.',
        ]);

        Teacher::create($validated);

        return redirect()->back()->with('success', 'Guru berhasil ditambahkan!');
    }

    public function edit($id)
    {
        $teacher = Teacher::findOrFail($id);

        // Ambil subject yang belum dipakai guru lain + subject yang sedang digunakan guru ini
        $subjects = Subject::whereDoesntHave('teacher', function ($q) use ($id) {
            $q->where('id', '!=', $id);
        })
        ->orWhere('id', $teacher->subject_id)
        ->get();

        return response()->json([
            'teacher' => $teacher,
            'subjects' => $subjects
        ]);
    }

    public function update(Request $request, $id)
    {
        $validated = $request->validate([
            'name'       => 'required|string|max:255',
            'subject_id' => 'required|unique:teachers,subject_id,' . $id,
            'phone'      => 'nullable|string|max:20',
            'email'      => 'required|email|unique:teachers,email,' . $id,
            'address'    => 'nullable|string|max:255',
        ]);

        Teacher::findOrFail($id)->update($validated);

        return redirect()->back()->with('success', 'Guru berhasil diperbarui!');
    }

    public function destroy($id)
    {
        Teacher::findOrFail($id)->delete();

        return redirect()->back()->with('success', 'Guru berhasil dihapus!');
    }
}
