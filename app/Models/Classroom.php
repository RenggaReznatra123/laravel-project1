<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Classroom extends Model
{
    use HasFactory;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'name', // Sesuaikan dengan nama kolom di database
    ];

    /**
     * Relasi ke Student (One to Many)
     * Satu kelas memiliki banyak siswa
     */
    public function students()
    {
        return $this->hasMany(Student::class, 'classroom_id');
    }

    /**
     * Relasi ke Teacher melalui Subject (Many to Many)
     * Jika ada tabel pivot teacher_classroom atau subject yang menghubungkan
     */
    public function teachers()
    {
        return $this->belongsToMany(Teacher::class, 'teacher_classroom');
    }

    /**
     * Relasi ke Subject (One to Many atau Many to Many)
     * Tergantung struktur database Anda
     */
    public function subjects()
    {
        return $this->hasMany(Subject::class, 'classroom_id');
    }
}