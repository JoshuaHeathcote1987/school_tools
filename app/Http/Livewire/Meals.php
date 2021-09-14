<?php

namespace App\Http\Livewire;

use Livewire\Component;

use App\Models\Teacher;
use App\Models\Student;

use DB;

class Meals extends Component
{
    public $teacherId;
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
        $month = $this->convertMonth($this->month);
        $year = $this->year;
        $student = $this->student;
        // Grab student meal records 

        // student meal record
        // id, student_id, month, year, breakfast, lunch, dinner
        $this->showMealPlans = true;
    }

    public function getStudents()
    {
        $teacher = json_decode($this->teacher);
        $this->teacherId = $teacher->id;

        $this->students = DB::table('students')
            ->join('teacher_students', 'students.id', '=', 'teacher_students.student_id')
            ->where('teacher_students.teacher_id', '=', $teacher->id)
            ->get();

        $this->studentDisabled = 'enabled';
    }

    public function hydrate()
    {
        $this->students = DB::table('students')
            ->join('teacher_students', 'students.id', '=', 'teacher_students.student_id')
            ->where('teacher_students.teacher_id', '=', $this->teacherId)
            ->get();
    }

    public function convertMonth($month)
    {
        switch($month)
        {        
            case 'January': 
                $month = 1;
                break;
            case 'February': 
                $month = 2;
                break;
            case 'March': 
                $month = 3;
                break;
            case 'April': 
                $month = 4;
                break;            
            case 'May': 
                $month = 5;
                break;
            case 'June': 
                $month = 6;
                break;
            case 'July': 
                $month = 7;
                break;
            case 'August': 
                $month = 8;
                break;            
            case 'September': 
                $month = 9;
                break;
            case 'October': 
                $month = 10;
                break;
            case 'November': 
                $month = 11;
                break;
            case 'December': 
                $month = 12;
                break;         
        }

        return $month;
    }

    public function mount()
    {
        $this->teacherId = 1;
        $this->students = Student::all();
        $this->teachers = Teacher::all(); 
    }

    public function render()
    {
        return view('livewire.meals');
    }
}
