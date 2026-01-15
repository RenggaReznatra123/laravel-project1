<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Student;
use App\Models\Classroom;
use App\Models\Guardian;

class adminStudentController extends Controller
{
    public function index()
    {
        // ✅ GUNAKAN PAGINATE
        $students = Student::with(['classroom', 'guardian'])->paginate(10);
        
        // Untuk dropdown tetap pakai all()
        $classrooms = Classroom::all();
        $guardians = Guardian::all();

        return view('admin.student.index', [
            'title' => 'Student',
            'students' => $students,
            'classrooms' => $classrooms,
            'guardians' => $guardians,
        ]);
    }

    public function create()
    {
        $classrooms = Classroom::all();
        $guardians = Guardian::all();
        return view('admin.student.form', compact('classrooms', 'guardians'));
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'name'          => 'required|string|max:255',
            'email'         => 'required|email|unique:students,email',
            'classroom_id'  => 'required|exists:classrooms,id',
            'guardian_id'   => 'nullable|exists:guardians,id',
            'address'       => 'nullable|string',
            'gender'        => 'required|in:Laki-laki,Perempuan',
            'date_of_birth' => 'required|date',
        ]);

        Student::create($validated);

        return redirect()
            ->route('admin.students.index')
            ->with('success', 'Siswa berhasil ditambahkan');
    }

    public function edit($id)
    {
        $student    = Student::findOrFail($id);
        $classrooms = Classroom::all();
        $guardians  = Guardian::all();

        return view('admin.student.form', compact('student', 'classrooms', 'guardians'));
    }

    public function update(Request $request, $id)
    {
        $validated = $request->validate([
            'name'          => 'required|string|max:255',
            'email'         => 'required|email|unique:students,email,' . $id,
            'classroom_id'  => 'required|exists:classrooms,id',
            'guardian_id'   => 'nullable|exists:guardians,id',
            'address'       => 'nullable|string',
            'gender'        => 'required|in:Laki-laki,Perempuan',
            'date_of_birth' => 'required|date',
        ]);

        Student::findOrFail($id)->update($validated);

        return redirect()
            ->route('admin.students.index')
            ->with('success', 'Siswa berhasil diupdate');
    }

    public function destroy($id)
    {
        Student::findOrFail($id)->delete();

        return redirect()
            ->route('admin.students.index')
            ->with('success', 'Siswa berhasil dihapus');
    }
}
