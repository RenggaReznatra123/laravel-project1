<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Classroom;

class adminClassroomController extends Controller
{
    public function index()
    {
        // Ubah dari all() ke paginate(10)
        $classrooms = Classroom::paginate(10);

        return view('admin.classroom.index', [
            'title' => 'Classroom',
            'classrooms' => $classrooms,
        ]);
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'classroom_name' => 'required|string|max:255',
        ]);

        Classroom::create([
            'name' => $validated['classroom_name']
        ]);

        return redirect()->route('admin.classrooms.index')
            ->with('success', 'Kelas berhasil ditambahkan');
    }

    public function destroy($id)
    {
        $classroom = Classroom::findOrFail($id);
        $classroom->delete();

        return redirect()->route('admin.classrooms.index')
            ->with('success', 'Kelas berhasil dihapus');
    }
}