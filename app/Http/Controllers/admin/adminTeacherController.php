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
        $subjects = Subject::all();

        return view('admin.teacher.index', [
            'title' => 'Teachers',
            'teachers' => $teachers,
            'subjects' => $subjects,
        ]);
    }

    public function create()
    {
        $subjects = Subject::all();
        return view('admin.teacher.form', [
            'subjects' => $subjects
        ]);
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'name'       => 'required|string|max:255',
            'subject_id' => 'required|exists:subjects,id|unique:teachers,subject_id', // unique validation
            'phone'      => 'nullable|string|max:20',
            'email'      => 'required|email|unique:teachers,email',
            'address'    => 'nullable|string|max:255',
        ], [
            'subject_id.unique' => 'Mata pelajaran ini sudah memiliki guru. Silakan pilih mata pelajaran lain.',
        ]);

        Teacher::create($validated);

        return redirect()->back()->with('success', 'Guru berhasil ditambahkan!');
    }

    public function edit($id)
    {
        $teacher = Teacher::findOrFail($id);
        $subjects = Subject::all();

        return view('admin.teacher.form', [
            'teacher' => $teacher,
            'subjects' => $subjects
        ]);
    }

    public function update(Request $request, $id)
    {
        $validated = $request->validate([
            'name'       => 'required|string|max:255',
            'subject_id' => 'required|exists:subjects,id|unique:teachers,subject_id,' . $id,
            'phone'      => 'nullable|string|max:20',
            'email'      => 'required|email|unique:teachers,email,' . $id,
            'address'    => 'nullable|string|max:255',
        ], [
            'subject_id.unique' => 'Mata pelajaran ini sudah memiliki guru lain.',
        ]);

        Teacher::findOrFail($id)->update($validated);

        return redirect()->route('admin.teachers.index')->with('success', 'Guru berhasil diupdate!');
    }

    public function destroy($id)
    {
        $teacher = Teacher::findOrFail($id);
        $teacher->delete();

        return redirect()->route('admin.teachers.index')->with('success', 'Guru berhasil dihapus!');
    }
}