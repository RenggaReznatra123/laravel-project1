<?php

use App\Http\Controllers\ProfilController;
use App\Http\Controllers\StudentController;
use App\Http\Controllers\GuardianController;
use App\Http\Controllers\ClassroomController;
use Illuminate\Support\Facades\Route;

Route::get('/', [ProfilController::class, 'index'])->name('index');
Route::get('/profil', [ProfilController::class, 'profil'])->name('profil');
Route::get('/kontak', [ProfilController::class, 'kontak'])->name('kontak');
Route::get('/home', [ProfilController::class, 'home'])->name('home');
Route::get('/students', [StudentController::class, 'index'])->name('students');
Route::get('/guardians', [GuardianController::class, 'index'])->name('guardians');
Route::get('/classrooms', [ClassroomController::class, 'index'])->name('classrooms');
    