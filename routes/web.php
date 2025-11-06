<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProfilController;
use App\Http\Controllers\StudentController;
use App\Http\Controllers\GuardianController;
use App\Http\Controllers\ClassroomController;
use App\Http\Controllers\SubjectController;
use App\Http\Controllers\TeacherController;
use App\Models\Student;
use App\Models\Guardian;
use App\Models\Classroom;
use App\Models\Subject;
use App\Models\Teacher;

// -----------------------------
// 🏠 Halaman Utama & Profil
// -----------------------------
Route::get('/', [ProfilController::class, 'index'])->name('index');
Route::get('/profil', [ProfilController::class, 'profil'])->name('profil');
Route::get('/kontak', [ProfilController::class, 'kontak'])->name('kontak');
Route::get('/home', [ProfilController::class, 'home'])->name('home');
Route::get('/dashboard', fn() => view('admin.dashboard'))->name('dashboard');

// -----------------------------
// 🧩 Bagian Admin
// -----------------------------
Route::prefix('admin')->name('admin.')->group(function () {

    // 🧑‍🎓 Data Siswa
    Route::get('/student', function () {
    $students = Student::with('classroom')->get();
    $classrooms = Classroom::all();       // <-- tambahkan ini
    return view('admin.student.index', compact('students', 'classrooms'));
})->name('students.index');

    // 👨‍👩‍🦱 Data Wali Murid
    Route::get('/guardian', function () {
        $guardians = Guardian::all();
        return view('admin.guardian.index', compact('guardians'));
    })->name('guardians.index');

    // 🏫 Data Kelas
    Route::get('/classroom', function () {
        $classrooms = Classroom::all();
        return view('admin.classroom.index', compact('classrooms'));
    })->name('classrooms.index');

    // 📚 Data Mata Pelajaran
    Route::get('/subject', function () {
        $subjects = Subject::all();
        return view('admin.subject.index', compact('subjects'));
    })->name('subjects.index');

    // 👨‍🏫 Data Guru
    Route::get('/teacher', function () {
        $teachers = Teacher::with('subject')->get();
        return view('admin.teacher.index', compact('teachers'));
    })->name('teachers.index');
});
