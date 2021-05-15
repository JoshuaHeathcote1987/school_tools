<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Attendance extends Model
{
    use HasFactory;

    protected $fillable = [
        'teacher_id',
        'student_id',
        'day',
        'month',
        'year',
    ];

    public function student()
    {
        return $this->hasOne(Student::class, 'student_id', 'id');
    }

    public function teacher()
    {
        return $this->hasOne(Teacher::class, 'teacher_id', 'id');
    }
}
