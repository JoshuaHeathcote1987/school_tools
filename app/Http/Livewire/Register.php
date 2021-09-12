<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\Teacher;
use App\Models\Student;
use App\Models\Attendance;
use App\Models\Classroom;
use App\Exports\AttendanceExport;
use Maatwebsite\Excel\Facades\Excel;
use Carbon\Carbon;
use DB;
use Illuminate\Support\Facades\Storage;
use Livewire\WithFileUploads;

class Register extends Component
{
    use WithFileUploads;

    public $message = false;
    public $name;
    public $photo;
    public $students;
    public $teachers;
    public $attendances;
    public $teacher;
    public $teacherId;
    public $teacherName;
    public $teacherSurname;
    public $studentId;
    public $studentName;
    public $studentSurname;
    public $studentSelected;
    public $showTable = false;

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

    public $days;
    public $day;
    public $month;
    public $year;

    public $date;

    public $arrowLeft = "<svg xmlns=\"http://www.w3.org/2000/svg\" viewBox=\"0 0 448 512\"><!-- Font Awesome Free 5.15.3 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license/free (Icons: CC BY 4.0, Fonts: SIL OFL 1.1, Code: MIT License) --><path d=\"M257.5 445.1l-22.2 22.2c-9.4 9.4-24.6 9.4-33.9 0L7 273c-9.4-9.4-9.4-24.6 0-33.9L201.4 44.7c9.4-9.4 24.6-9.4 33.9 0l22.2 22.2c9.5 9.5 9.3 25-.4 34.3L136.6 216H424c13.3 0 24 10.7 24 24v32c0 13.3-10.7 24-24 24H136.6l120.5 114.8c9.8 9.3 10 24.8.4 34.3z\"/></svg>";
    public $arrowRight = "<svg xmlns=\"http://www.w3.org/2000/svg\" viewBox=\"0 0 448 512\"><!-- Font Awesome Free 5.15.3 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license/free (Icons: CC BY 4.0, Fonts: SIL OFL 1.1, Code: MIT License) --><path d=\"M190.5 66.9l22.2-22.2c9.4-9.4 24.6-9.4 33.9 0L441 239c9.4 9.4 9.4 24.6 0 33.9L246.6 467.3c-9.4 9.4-24.6 9.4-33.9 0l-22.2-22.2c-9.5-9.5-9.3-25 .4-34.3L311.4 296H24c-13.3 0-24-10.7-24-24v-32c0-13.3 10.7-24 24-24h287.4L190.9 101.2c-9.8-9.3-10-24.8-.4-34.3z\"/></svg>";
    public $arrowPointing;
    public $userToolsFlipFlop = false;
    public $adminToolsFlipFlop = false;

    public $showUserTools = "hidden";
    public $showAdminEditToolsButton = "enabled";

    public $imageArray = array();

    public $imageMascott;

    public $optionButtons = "disabled";

    protected $rules = [
        'students.name' => 'required|string|max:50',
        'students.surname' => 'required|string|max:50',
    ];

    // ============== Methods ==============

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

    public function addTeacher()
    {
        $this->validate([
            'photo' => 'nullable|image|max:10000',
            'teacherName' => 'required|string|max:20',
            'teacherSurname' => 'required|string|max:20',
            'imageMascott' => 'required|string',
        ]);

        $teacher = new Teacher();
        $teacher->name = $this->teacherName;
        $teacher->surname = $this->teacherSurname;
        $imageLocation = $this->photo ?  $this->photo->store('public/img/teachers') : '/public/img/placeholder.png';
        $imageLocation = substr($imageLocation, 7);
        $teacher->image = $imageLocation;
        $teacher->mascott = $this->imageMascott;
        $teacher->save();
        $this->teachers = Teacher::orderBy('name', 'ASC')->get(); 
        $this->reset(['teacherName', 'teacherSurname', 'imageMascott']);
    }

    public function addStudent()
    {
        $this->validate([
            'photo' => 'image|max:10000',
        ]);

        $teacher = json_decode($this->teacher);

        $student = new Student();
        $student->name = $this->studentName;
        $student->surname = $this->studentSurname;
        $imageLocation = $this->photo ?  $this->photo->store('public/img/students') : '/public/img/placeholder.png';
        $imageLocation = substr($imageLocation, 7);
        $student->image = $imageLocation;

        $student->save();

        $attendance = Attendance::create([
            'teacher_id' => $teacher->id,
            'student_id' => $student->id,
            'day' => date('d'),
            'month' => $this->month,
            'year' => $this->year,
        ]);

        DB::table('teacher_students')->insert([
            'teacher_id' => $teacher->id,
            'student_id' => $student->id,
        ]);

        $this->getAttendanceRecords();

        $this->reset(['studentName', 'studentSurname', 'photo']);
    }

    public function editStudent()
    {
        try
        {
            $student = json_decode($this->studentSelected[0]);
            $student = Student::find($student->id);
            $student->name = $this->studentName;
            $student->surname = $this->studentSurname;
            $student->save();

            $this->students = Student::with('attendance')->whereHas('attendance', function ($query) {
                $query->where('teacher_id', $this->teacherId);
            })->get();

            $this->studentName = null;
            $this->studentSurname = null; 
        } 
        catch (\Throwable $th) 
        {
            $this->message = true;
        }
    }

    public function deleteStudent()
    {
        try
        {
            $student = json_decode($this->studentSelected[0]);
            $student = Student::find($student->id);
            $student->delete();

            $this->students = Student::with('attendance')->whereHas('attendance', function ($query) {
                $query->where('teacher_id', $this->teacherId);
            })->get();

            $this->attendances = DB::table('attendances')
                ->where('attendances.teacher_id', '=', $this->teacherId)
                ->where('attendances.month', '=', $this->month)
                ->where('attendances.year', '=', $this->year)
                ->get();
        } 
        catch (\Throwable $th) 
        {
            $this->message = true;
        }
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

    }

    public function getAttendanceRecords()
    {
        $this->validate([
            'month' => 'required',
            'year' => 'required',
            'teacher' => 'required',
        ]);

        $teacher = json_decode($this->teacher);
        $this->teacherId = $teacher->id;
        $month = $this->convertMonth($this->month);
        $year = $this->year;

        $this->days = cal_days_in_month(CAL_GREGORIAN, $month, $year);

        $this->students = Student::with('attendance')->whereHas('attendance', function ($query) {
            $query->where('teacher_id', $this->teacherId);
        })->get();

        // $this->students = DB::table('students')
        //     ->where('teacher_students.teacher_id', '=', $this->teacherId)
        //     ->get();

        // $users = DB::table('users')
        //     ->join('contacts', 'users.id', '=', 'contacts.user_id')
        //     ->join('orders', 'users.id', '=', 'orders.user_id')
        //     ->select('users.*', 'contacts.phone', 'orders.price')
        //     ->get();
            
        $this->students = DB::table('students')
            ->join('teacher_students', 'students.id', '=', 'teacher_students.student_id')
            ->where('teacher_students.teacher_id', '=', $this->teacherId)
            ->get();

        $this->attendances = DB::table('attendances')
            ->where('attendances.teacher_id', '=', $this->teacherId)
            ->where('attendances.month', '=', $this->month)
            ->where('attendances.year', '=', $this->year)
            ->get();

        $this->optionButtons = "";

        $this->showTable = true;
    }

    public function export()
    {
        $teacher = json_decode($this->teacher);
        $this->teacherId = $teacher->id;
        $this->name = $teacher->name;
        $month = $this->convertMonth($this->month);

        $this->days = cal_days_in_month(CAL_GREGORIAN, $month, $this->year);

        $this->students = Student::with('attendance')->whereHas('attendance', function ($query) {
            $query->where('teacher_id', $this->teacherId);
        })->get();

        $this->attendances = DB::table('attendances')
            ->where('attendances.teacher_id', '=', $this->teacherId)
            ->where('attendances.month', '=', $this->month)
            ->where('attendances.year', '=', $this->year)
            ->get();

        $data = array(
            'days' => $this->days,
            'students' => $this->students,
            'attendances' => $this->attendances,
            'name' => $this->name,
            'month' => $this->month
        );

        return Excel::download(new AttendanceExport($data), $this->name.'_'.$this->month.'_'.$this->year.'.xlsx');
    }

    public function setImageMascott($image)
    {
        $this->imageMascott = $image;
    }

    // ============== Functions ==============


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



// ============== Livewire Event Cycle ==============



    public function mount()
    {
        $this->teachers = Teacher::orderBy('name', 'ASC')->get();
        $this->date = Carbon::now()->format('l jS \of F Y');
        $this->days = date("t");
        $this->visible = "visible";
        $this->arrowPointing = $this->arrowLeft;

        $this->imageArray = Storage::disk('public')->files('img/animals');
    }

    public function hydrate()
    {
        try
        {
            $this->attendances = DB::table('attendances')
            ->where('attendances.teacher_id', '=', $this->teacherId)
            ->where('attendances.month', '=', $this->month)
            ->where('attendances.year', '=', $this->year)
            ->get();

            $this->students = Student::with('attendance')->whereHas('attendance', function ($query) {
                $query->where('teacher_id', $this->teacherId);
            })->get();
        }
        catch (\Throwable $th)
        {
            $this->message = true;
        }
    }

    public function render()
    {
        return view('livewire.register');
    }
}