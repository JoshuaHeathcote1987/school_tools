<?php

namespace App\Http\Livewire;

use Livewire\Component;

use App\Models\Teacher;
use App\Models\Student;
use App\Models\Attendance;

use DB;

class Roster extends Component
{
    public $teachers, $students, $teacher, $student;

    public $teacherId, $teacherName, $teacherSurname, $teacherImage;

    public $studentId, $studentName, $studentSurname, $studentImage, $studentsTeacher;

    public $teacherStudentFlipFlop;

    public function getStudent($id)
    {
        $student = Student::where('id', $id)->first();
        $this->studentId = $student->id;
        $this->studentName = $student->name;
        $this->studentSurname = $student->surname;
        $this->studentImage = $student->image;
    }

    public function getTeacher($id)
    {
        $teacher = Teacher::where('id', $id)->first();

        $this->teacher = $teacher;

        $this->teacherId = $id;
        $this->teacherName = $teacher->name;
        $this->teacherSurname = $teacher->surname;
        $this->teacherImage = $teacher->image;

        $this->studentsTeacher = DB::table('students')
            ->join('attendances', 'students.id', '=', 'attendances.student_id')
            ->where('attendances.teacher_id', $teacher->id)
            ->select('students.*')
            ->get();

        $this->teacherStudentFlipFlop = true;
    }

    public function hydrate()
    {
        $this->studentsTeacher = DB::table('students')
        ->join('attendances', 'students.id', '=', 'attendances.student_id')
        ->where('attendances.teacher_id', $this->teacherId)
        ->select('students.*')
        ->get();
    }

    public function mount()
    {
        $this->teachers = Teacher::all();
        $this->students = Student::all();
        $this->teacherStudentFlipFlop = false;
    }

    public function render()
    {
        return view('livewire.roster');
    }
}
