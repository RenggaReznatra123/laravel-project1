<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Teacher;
use App\Models\Subject; // ✅ tambahkan ini

class TeacherController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $teachers = Teacher::all();

        return view('admin.teacher.index', [
            'title' => "Teacher",
            'teachers' => $teachers
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $subjects = Subject::all(); // ✅ ambil semua mata pelajaran
        return view('admin.teacher.form', compact('subjects'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $teacher = Teacher::findOrFail($id);
        $subjects = Subject::all(); // ✅ juga perlu di edit
        return view('admin.teacher.form', compact('teacher', 'subjects'));
    }

    // fungsi lainnya bisa menyusul
}
