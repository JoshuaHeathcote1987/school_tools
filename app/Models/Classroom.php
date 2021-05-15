<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Classroom extends Model
{
    use HasFactory;

    public function student()
    {
        return $this->hasMany(Student::class, 'student_id', 'id');
    }

    public function teacher()
    {
        return $this->hasMany(Teacher::class, 'teacher_id', 'id');
    }
}
