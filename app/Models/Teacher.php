<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Subject;

class Teacher extends Model
{
    use HasFactory;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'name',
        'subject_id',
        'phone',
        'email',
        'address',
    ];

    /**
     * Relasi ke Subject (Many to One)
     * Satu guru mengajar satu mata pelajaran
     */
    public function subject()
    {
        return $this->belongsTo(Subject::class);
    }
}