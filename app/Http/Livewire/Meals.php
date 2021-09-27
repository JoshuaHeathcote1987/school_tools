<?php

namespace App\Http\Livewire;

use Livewire\Component;

use App\Models\Teacher;
use App\Models\Student;
use App\Models\Meal;

use App\Exports\MealsExport;
use Maatwebsite\Excel\Facades\Excel;

use Carbon\Carbon;

use PDF;
use DB;

class Meals extends Component
{
    public $teacherId;
    public $teacher;
    public $teachers;

    public $student;
    public $students;

    public $aDay;
    public $day = [];
    public $days;
    public $month;
    public $display_month;
    public $year;
    public $date;

    public $showMealPlanDates = false;
    public $showStudentMealPlanLogger = false;

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

    public function setStudentMealPlanLogger($day)
    {
        $this->showStudentMealPlanLogger = true;
        $this->showMealPlanDates = false;
        $this->aDay = $day;
    }

    public function setTeacher()
    {
        $teacher = json_decode($this->teacher);
        $this->teacherId = $teacher->id;
    }

    public function getMealRecords()
    {
        $this->reset('day');

        $month = $this->convertMonth($this->month);

        $this->display_month = $month;
        $year = $this->year;

        $this->days = cal_days_in_month(CAL_GREGORIAN, $month, $year);

        for ($i=1; $i <= $this->days; $i++) { 
            $timestamp = strtotime($year.'-'.$month.'-'.$i);
            $day = date('l', $timestamp);
            array_push($this->day, $day);
        }

        $this->students = DB::table('students')
            ->join('teacher_students', 'students.id', '=', 'teacher_students.student_id')
            ->where('teacher_students.teacher_id', '=', $this->teacherId)
            ->orderBy('name', 'asc')
            ->get();


        if ($this->studentDisabled != 'enabled') {
            $this->studentDisabled = 'enabled';
            $this->showMealPlanDates = true;
        }   
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

    public function exportMeals($day)
    {
        $month = $this->convertMonth($this->month);
        $year = $this->year;
        $teacherId = $this->teacherId;
        $mealObj = [];
        $pass_to_export = [];

        $collection = collect([]);

        $this->students = DB::table('students')
            ->join('teacher_students', 'students.id', '=', 'teacher_students.student_id')
            ->join('meals', 'students.id', '=', 'meals.student_id')
            ->where('teacher_students.teacher_id', '=', $teacherId)
            ->orderBy('name', 'asc')
            ->get();

        array_push($pass_to_export, $day, $month, (int) $year, $this->students);

        return Excel::download(new MealsExport($pass_to_export), 'meals'.'_'.$day.'_'.$this->month.'_'.$this->year.'.xlsx');
    }

    public function hydrate()
    {
        $this->students = DB::table('students')
            ->join('teacher_students', 'students.id', '=', 'teacher_students.student_id')
            ->where('teacher_students.teacher_id', '=', $this->teacherId)
            ->orderBy('name', 'asc')
            ->get();
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

    public function convertMonthNumeric($month)
    {
        switch($month)
        {        
            case 1: 
                $month = 'January';
                break;
            case 2: 
                $month = 'February';
                break;
            case 3: 
                $month = 'March';
                break;
            case 4: 
                $month = 'April';
                break;            
            case 5: 
                $month = 'May';
                break;
            case 6: 
                $month = 'June';
                break;
            case 7: 
                $month = 'July';
                break;
            case 8: 
                $month = 'August';
                break;            
            case 9: 
                $month = 'September';
                break;
            case 10: 
                $month = 'October';
                break;
            case 11: 
                $month = 'November';
                break;
            case 12: 
                $month = 'December';
                break;         
        }

        return $month;
    }
}
