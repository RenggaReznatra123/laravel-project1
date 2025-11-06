<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Teacher;

class Subject extends Model
{
    use HasFactory;

    // Tambahkan ini biar field bisa dikenali dan aman diisi
    protected $with = ['teacher'];

    public function teacher()
    {
        return $this->hasOne(Teacher::class);
    }
}
