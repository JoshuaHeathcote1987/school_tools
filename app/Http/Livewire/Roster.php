<?php

namespace App\Http\Livewire;

use Livewire\Component;

use App\Models\Teacher;
use App\Models\Student;
use App\Models\Attendance;
use App\Models\Genitor;

use DB;
use Illuminate\Support\Facades\Storage;
use Livewire\WithFileUploads;

class Roster extends Component
{
    use WithFileUploads;

    public $teachers, $students, $teacher, $student;

    public $teacherId, $teacherName, $teacherSurname, $teacherImage;

    public $studentId, $studentName, $studentSurname, $studentsTeacher, $studentPhoto;

    public $babaId, $babaName, $babaSurname, $babaTelephone, $babaEmail, $babaPhoto, $babaPhotoHolder;

    public $anneId, $anneName, $anneSurname, $anneTelephone, $anneEmail, $annePhoto, $annePhotoHolder;

    public $teacherStudentFlipFlop;

    const NO_PARENTS_MSG = 'Not set!';

    public function setStudentAnneBabaModal()
    {
        // Validation Check
        $this->validate([
            // 'studentPhoto' => 'nullable|image|max:10000',
            'annePhoto' => 'nullable|image|max:10000',
            'babaPhoto' => 'nullable|image|max:10000',
        ]);

        // Image Upload
        $this->annePhoto = $this->annePhoto ?  $this->annePhoto->store('public/img/parents') : 'public/img/parents/no-photo-available.png';
        $this->babaPhoto = $this->babaPhoto ?  $this->babaPhoto->store('public/img/parents') : 'public/img/parents/no-photo-available.png';
        
        // Insert Mother
        $mother = Genitor::updateOrCreate([
            'mother' => true,
            'name' => $this->anneName,
            'surname' => $this->anneSurname,
            'image' => $this->annePhoto,
            'phone' => $this->anneTelephone,
            'email' => $this->anneEmail,
        ],['name', 'surname']);

        // Insert Father
        $father = Genitor::updateOrCreate([
            'mother' => false,
            'name' => $this->babaName,
            'surname' => $this->babaSurname,
            'image' => $this->babaPhoto,
            'phone' => $this->babaTelephone,
            'email' => $this->babaEmail,
        ],['name', 'surname']);

        // Insert Student Parent connection
        DB::table('student_parents')->upsert([
            'student_id' => $this->studentId,
            'parent_id' => $mother->id,
        ],[$mother->id]);

        DB::table('student_parents')->upsert([
            'student_id' => $this->studentId,
            'parent_id' => $father->id,
        ],[$father->id]);

        // Update Student (doesn't matter if the infooration in Student hasn't changed)
        $student = Student::find($this->studentId);
        $student->name = $this->studentName;
        $student->surname = $this->studentSurname;
        $student->image = $this->studentPhoto;
        $student->save();

        $this->reset([
            'anneId', 'anneName', 'anneSurname', 'anneTelephone', 'anneEmail', 'annePhoto', 'annePhotoHolder',
            'babaId', 'babaName', 'babaSurname', 'babaTelephone', 'babaEmail', 'babaPhoto', 'babaPhotoHolder',
        ]);
    }

    public function getStudent($id)
    {
        $this->reset(['annePhotoHolder', 'babaPhotoHolder']);

        // Get student details
        $student = Student::where('id', $id)->first();
        $this->studentId = $student->id;
        $this->studentName = $student->name;
        $this->studentSurname = $student->surname;
        $this->studentPhoto = $student->image;

        // Get the students who are connected to a specific teacher
        $this->studentsTeacher = DB::table('students')
        ->join('teacher_students', 'students.id', '=', 'teacher_students.student_id')
        ->where('teacher_students.teacher_id', $this->teacherId)
        ->select('students.*')
        ->get();

        // Get parent details
        $this->parents = DB::table('parents')
        ->join('student_parents', 'parents.id', '=', 'student_parents.parent_id')
        ->where('student_parents.student_id', $this->studentId)
        ->select('parents.*')
        ->get();

        // Organise parent details
        if(sizeof($this->parents) != 0)
        {
            $this->anneName = $this->parents[0]->name;
            $this->anneSurname = $this->parents[0]->surname;
            $this->annePhotoHolder = $this->parents[0]->image;
            $this->anneTelephone = $this->parents[0]->phone;
            $this->anneEmail = $this->parents[0]->email;

            $this->babaName = $this->parents[1]->name;
            $this->babaSurname = $this->parents[1]->surname;
            $this->babaPhotoHolder = $this->parents[1]->image;
            $this->babaTelephone = $this->parents[1]->phone;
            $this->babaEmail = $this->parents[1]->email;

            $this->annePhotoHolder = substr($this->annePhotoHolder, 7);
            $this->babaPhotoHolder = substr($this->babaPhotoHolder, 7);
        }
        else
        {
            $this->anneName = self::NO_PARENTS_MSG;
            $this->anneSurname = self::NO_PARENTS_MSG;
            $this->annePhoto = self::NO_PARENTS_MSG;
            $this->anneTelephone = self::NO_PARENTS_MSG;
            $this->anneEmail = self::NO_PARENTS_MSG;

            $this->babaName = self::NO_PARENTS_MSG;
            $this->babaSurname = self::NO_PARENTS_MSG;
            $this->babaPhoto = self::NO_PARENTS_MSG;
            $this->babaTelephone = self::NO_PARENTS_MSG;
            $this->babaEmail = self::NO_PARENTS_MSG;

            $this->annePhoto = self::NO_PARENTS_MSG;
            $this->babaPhoto = self::NO_PARENTS_MSG;
        } 
    }

    public function getTeacher($id)
    {
        $teacher = Teacher::where('id', $id)->first();

        $this->teacher = $teacher;

        $this->teacherId = $id;
        $this->teacherName = $teacher->name;
        $this->teacherSurname = $teacher->surname;
        $this->teacherImage = $teacher->image;

        $this->getStudents();

        $this->teacherStudentFlipFlop = true;
    }

    public function setParent()
    {
        $parent = Parent::create([
            'name' => $this->parentName,
            'surname' => $this->parentSurname,
            'image' => $this->photo,
            'telephone' => $this->parentPhone,
            'email' => $this->parentEmail,
        ]);
    }

    public function getStudents()
    {
        $this->studentsTeacher = DB::table('students')
        ->join('teacher_students', 'students.id', '=', 'teacher_students.student_id')
        ->where('teacher_students.teacher_id', $this->teacherId)
        ->select('students.*')
        ->get();
    }

    public function hydrate()
    {
        $this->getStudents();
    }

    public function mount()
    {
        $this->teachers = Teacher::all();
        $this->students = Student::all();
        $this->parents = Genitor::all();
        $this->teacherStudentFlipFlop = false;
    }

    public function render()
    {
        return view('livewire.roster');
    }
}
