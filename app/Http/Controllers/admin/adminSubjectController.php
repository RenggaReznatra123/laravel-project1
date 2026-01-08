<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Subject;

class adminSubjectController extends Controller
{
    public function index()
    {
        $subjects = Subject::with('teacher')->get();

        return view('admin.subject.index', [
            'title' => 'Subject',
            'subjects' => $subjects,
        ]);
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'description' => 'nullable|string',
        ]);

        Subject::create($validated);

        return redirect()->route('admin.subject.index')
            ->with('success', 'Mata pelajaran berhasil ditambahkan');
    }

    public function destroy($id)
    {
        $subject = Subject::findOrFail($id);

        $subject->delete();

        return redirect()->route('admin.subject.index')
            ->with('success', 'Mata pelajaran berhasil dihapus');
    }
}
