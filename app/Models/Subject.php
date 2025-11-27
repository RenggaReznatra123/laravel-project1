<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Teacher;

class Subject extends Model
{
    use HasFactory;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
    'name',
    'description',
];


    /**
     * Relasi ke Teacher (One to One)
     * Satu mata pelajaran diajar oleh satu guru
     */
    public function teacher()
    {
        return $this->hasOne(Teacher::class);
    }
}