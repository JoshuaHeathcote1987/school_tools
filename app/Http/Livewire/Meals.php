<?php

namespace App\Http\Livewire;

use Livewire\Component;

use App\Models\Teacher;
use App\Models\Student;
use App\Models\Meal;

use Carbon\Carbon;

use DB;

class Meals extends Component
{
    public $teacherId;
    public $teacher;
    public $teachers;

    public $student;
    public $students;

    public $day = [];
    public $days;
    public $month;
    public $year;
    public $date;

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
        $this->reset('day');

        $teacher = json_decode($this->teacher);
        $this->teacherId = $teacher->id;

        $month = $this->convertMonth($this->month);
        $year = $this->year;

        $this->days = cal_days_in_month(CAL_GREGORIAN, $month, $year);

        for ($i=1; $i <= $this->days; $i++) { 
            $timestamp = strtotime($year.'-'.$month.'-'.$i);
            $day = date('l', $timestamp);
            array_push($this->day, $day);
        }

        $this->students = DB::table('students')
            ->join('teacher_students', 'students.id', '=', 'teacher_students.student_id')
            ->where('teacher_students.teacher_id', '=', $teacher->id)
            ->orderBy('name', 'asc')
            ->get();

        $this->studentDisabled = 'enabled';
        $this->showMealPlans = true;
    }

    public function addMeal($selection, $day, $student_id, $meal)
    {
        $month = $this->convertMonth($this->month);
        $year = $this->year;
        $student = Student::where('id', '=', $student_id)->first();

        $entry_check = Meal::where('student_id', '=', $student_id)
            ->where('day', '=', $day)
            ->where('month', '=', $month)
            ->where('year', '=', $year)
            ->first();

        if ($entry_check == null) {
            $entry = Meal::create([
                'student_id' => $student->id,
                $meal => $selection,
                'day' => $day,
                'month' => $month,
                'year' => $year,
            ]);
            return;
        }

        if ($entry_check != null) {
            $entry = Meal::where('student_id', '=', $student_id)
                ->where('day', '=', $day)
                ->where('month', '=', $month)
                ->where('year', '=', $year)
                ->update([$meal => $selection]);
            return;
        }

        return;
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
        $this->date = Carbon::now()->format('l jS \of F Y');
        $this->teacherId = 1;
        $this->students = Student::all();
        $this->teachers = Teacher::all(); 
    }

    public function render()
    {
        return view('livewire.meals');
    }
}
