<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Classroom;
use App\Models\Guardian;

class Student extends Model
{
    use HasFactory;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'name',
        'email',
        'classroom_id',
        'guardian_id',
        'phone',
        'address',
        'gender',
        'date_of_birth',
    ];

    /**
     * Relasi ke Classroom (Many to One)
     */
    public function classroom()
    {
        return $this->belongsTo(Classroom::class);
    }

    /**
     * Relasi ke Guardian (Many to One)
     */
    public function guardian()
    {
        return $this->belongsTo(Guardian::class);
    }
}