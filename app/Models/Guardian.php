<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Guardian extends Model
{
    use HasFactory;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
    'name',
    'job',
    'phone',
    'email',
    'address',
];


    /**
     * Relasi ke Student (One to Many)
     * Satu wali bisa punya banyak siswa
     */
    public function students()
    {
        return $this->hasMany(Student::class);
    }
}