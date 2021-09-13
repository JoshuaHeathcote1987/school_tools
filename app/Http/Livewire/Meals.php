<?php

namespace App\Http\Livewire;

use Livewire\Component;

use App\Models\Teacher;
use App\Models\Student;

use DB;

class Meals extends Component
{
    public $teacher;
    public $teachers;

    public $student;
    public $students;

    public $month;
    public $year;

    public $showMealPlans = false;

    public $studentDisabled = 'disabled';

    public $months = array(
        'January',
        'February',
        'March',
        'April',
        'May',
        'June',
        'July',
        'August',
        'September',
        'October',
        'November',
        'December',
    );

    public function getMealRecords()
    {
        $showMealPlans = true;
    }

    public function getStudents($id)
    {
        $this->students = DB::table('students')
            ->join('teacher_students', 'students.id', '=', 'teacher_students.student_id')
            ->where('teacher_students.teacher_id', '=', $id)
            ->get();

        $this->studentDisabled = 'enabled';
    }

    public function hydrate()
    {
        $this->students = DB::table('students')
            ->join('teacher_students', 'students.id', '=', 'teacher_students.student_id')
            ->where('teacher_students.teacher_id', '=', $id)
            ->get();
    }

    public function mount()
    {
        $this->students = Student::all();
        $this->teachers = Teacher::all(); 
    }

    public function render()
    {
        return view('livewire.meals');
    }
}
