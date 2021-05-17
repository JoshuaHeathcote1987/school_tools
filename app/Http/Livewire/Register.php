<?php

namespace App\Http\Livewire;

use Livewire\Component;

use App\Models\Teacher;
use App\Models\Student;
use App\Models\Attendance;
use App\Models\Classroom;

use Carbon\Carbon;

use DB;

class Register extends Component
{

    public $students;
    public $teachers;
    public $attendances;

    public $teacherId;
    public $teacherName;
    public $teacherSurname;

    public $studentId;
    public $studentName;
    public $studentSurname;

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
        'Novermber',
        'December',
    );

    public $days;
    public $day;
    public $month;
    public $year;

    public $date;

    // EDIT USER FUNCTIONALITY
    public $arrowLeft = "<svg xmlns=\"http://www.w3.org/2000/svg\" viewBox=\"0 0 448 512\"><!-- Font Awesome Free 5.15.3 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license/free (Icons: CC BY 4.0, Fonts: SIL OFL 1.1, Code: MIT License) --><path d=\"M257.5 445.1l-22.2 22.2c-9.4 9.4-24.6 9.4-33.9 0L7 273c-9.4-9.4-9.4-24.6 0-33.9L201.4 44.7c9.4-9.4 24.6-9.4 33.9 0l22.2 22.2c9.5 9.5 9.3 25-.4 34.3L136.6 216H424c13.3 0 24 10.7 24 24v32c0 13.3-10.7 24-24 24H136.6l120.5 114.8c9.8 9.3 10 24.8.4 34.3z\"/></svg>";
    public $arrowRight = "<svg xmlns=\"http://www.w3.org/2000/svg\" viewBox=\"0 0 448 512\"><!-- Font Awesome Free 5.15.3 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license/free (Icons: CC BY 4.0, Fonts: SIL OFL 1.1, Code: MIT License) --><path d=\"M190.5 66.9l22.2-22.2c9.4-9.4 24.6-9.4 33.9 0L441 239c9.4 9.4 9.4 24.6 0 33.9L246.6 467.3c-9.4 9.4-24.6 9.4-33.9 0l-22.2-22.2c-9.5-9.5-9.3-25 .4-34.3L311.4 296H24c-13.3 0-24-10.7-24-24v-32c0-13.3 10.7-24 24-24h287.4L190.9 101.2c-9.8-9.3-10-24.8-.4-34.3z\"/></svg>";
    public $arrowPointing;
    public $userToolsFlipFlop = false;
    public $adminToolsFlipFlop = false;

    public $showUserTools = "hidden";
    public $showAdminEditToolsButton = "enabled";

    protected $rules = [
        'students.name' => 'required|string|max:50',
        'students.surname' => 'required|string|max:50',
    ];

    public function showUserEditTools()
    {
        if($this->userToolsFlipFlop == false)
        {
            $this->arrowPointing = $this->arrowRight;
            $this->userToolsFlipFlop = true;
            return;
        }
        if($this->userToolsFlipFlop == true)
        {
            $this->arrowPointing = $this->arrowLeft;
            $this->userToolsFlipFlop = false;
            return;
        }
    }

    public function showAdminEditTools()
    {
        if($this->adminToolsFlipFlop == false)
        {
            $this->adminToolsFlipFlop = true;
            $this->showAdminEditToolsButton = "disabled";
        }
    }

    public function setMonth($month) 
    {
        $this->month = $month;

        $this->attendances = DB::table('attendances')
        ->where('attendances.teacher_id', '=', 1)
        ->where('attendances.month', '=', $this->month)
        ->where('attendances.year', '=', 2021)
        ->get();
    }

    public function setYear($year)
    {
        $this->year = $year;

        $this->attendances = DB::table('attendances')
        ->where('attendances.teacher_id', '=', 1)
        ->where('attendances.month', '=', $this->month)
        ->where('attendances.year', '=', $this->year)
        ->get();
    }

    public function setTeacher($teacherId, $teacherName, $teacherSurname)
    {
        $this->teacherName = $teacherName;
        $this->teacherSurname = $teacherSurname;
        $this->teacherId = $teacherId;

        $this->attendances = DB::table('attendances')
        ->where('attendances.teacher_id', '=', $this->teacherId)
        ->where('attendances.month', '=', $this->month)
        ->where('attendances.year', '=', $this->year)
        ->get();

    }

    public function addTeacher()
    {
        $name = $this->teacherName;
        $surname = $this->teacherSurname;
        $teacher = new Teacher();
        $teacher->name = $name;
        $teacher->surname = $surname;
        $teacher->save();
        $this->teachers = DB::table('teachers')->orderBy('name', 'ASC')->get();

        $this->teacherName = null;
        $this->teacherSurname = null;
    }

    public function addStudent()
    {
        $student = Student::create([
            'name' => $this->studentName,
            'surname' => $this->studentSurname,
        ]);

        $attendance = Attendance::create([
            'teacher_id' => $this->teacherId,
            'student_id' => $student->id,
            'day' => date("d"),
            'month' => $this->month,
            'year' => $this->year,
        ]);

        $this->studentName = null;
        $this->studentSurname = null;
    }

    public function addAttendanceRecord($studentId, $day)
    {
        $teacherId = $this->teacherId;
        $studentId = $studentId;
        $day = $day;
        $month = $this->month;
        $year = $this->year;


        try {
            $attendance = Attendance::where('teacher_id', $teacherId)
                ->where('student_id', $studentId)
                ->where('day', $day)
                ->where('month', $month)
                ->where('year', $year)
                ->first();

            $attendance->delete();
        } catch (\Throwable $th) {
            $attendance = Attendance::create([
                'teacher_id' => $this->teacherId,
                'student_id' => $studentId,
                'day' => $day,
                'month' => $this->month,
                'year' => $this->year,
            ]);
        }

        $this->attendances = DB::table('attendances')
        ->where('attendances.teacher_id', '=', $this->teacherId)
        ->where('attendances.month', '=', $this->month)
        ->where('attendances.year', '=', $this->year)
        ->get();

    }

    public function getStudents()
    {
        $this->students = Student::with('attendance')->whereHas('attendance', function ($query) {
            $query->where('teacher_id', $this->teacherId);
        })->get();

        $this->attendances = DB::table('attendances')
            ->where('attendances.teacher_id', '=', $this->teacherId)
            ->where('attendances.month', '=', $this->month)
            ->where('attendances.year', '=', $this->year)
            ->get();
    }

    public function getAttendanceRecords()
    {
        $teacherId = $this->teacherId;
        $month = $this->month;
        $year = $this->year;

        $this->attendances = DB::table('attendances')
            ->where('teacher_id', '=', $teacherId)
            ->where('month'. '=', $month)
            ->where('year', '=', $year);
    }

    public function mount()
    {
        $this->teachers = Teacher::orderBy('name', 'ASC')->get();
        $this->date = Carbon::now()->format('l jS \of F Y');
        $this->days = date("t");
        $this->visible = "visible";
        $this->arrowPointing = $this->arrowLeft;
    }


    public function render()
    {
        return view('livewire.register');
    }
}
