<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Classroom;

class adminClassroomController extends Controller
{
    public function index()
    {
        $classrooms = Classroom::all();
        return view('admin.classroom.index', [
            'title' => 'Classroom',
            'classrooms' => $classrooms,
        ]);
    }

    public function create()
    {
        return view('admin.classroom.form');
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'classroom_name' => 'required|string|max:255',
        ]);

        // Mapping nama field form ke nama kolom database
        Classroom::create([
            'name' => $validated['classroom_name']
        ]);
        
        return redirect()->route('admin.classrooms.index')->with('success', 'Kelas berhasil ditambahkan');
    }

    // Edit dan Delete dihapus karena data berelasi dengan tabel lain
}