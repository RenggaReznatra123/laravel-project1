<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Guardian;

class adminGuardianController extends Controller
{
    // LIST DATA
    public function index()
    {
        $guardians = Guardian::latest()->get();
        return view('admin.guardian.index', compact('guardians'));
    }

    // STORE DATA (TAMBAH)
    public function store(Request $request)
{
    $validated = $request->validate([
        'name' => 'required|string|max:255',
        'job' => 'nullable|string|max:255',
        'phone' => 'nullable|string|max:20',
        'email' => 'nullable|email|unique:guardians,email',
        'address' => 'nullable|string',
    ]);

    Guardian::create($validated);

    return redirect()
        ->route('admin.guardians.index')
        ->with('success', 'Data wali berhasil ditambahkan');
}


    // UPDATE DATA
    public function update(Request $request, $id)
{
    $guardian = Guardian::findOrFail($id);

    $validated = $request->validate([
        'name' => 'required|string|max:255',
        'job' => 'nullable|string|max:255',
        'phone' => 'nullable|string|max:20',
        'email' => 'nullable|email|unique:guardians,email,' . $id,
        'address' => 'nullable|string',
    ]);

    $guardian->update($validated);

    return redirect()
        ->route('admin.guardians.index')
        ->with('success', 'Data wali berhasil diperbarui');
}


    // DELETE DATA
    public function destroy($id)
    {
        Guardian::findOrFail($id)->delete();

        return redirect()
            ->route('admin.guardians.index')
            ->with('success', 'Data wali berhasil dihapus');
    }
}
