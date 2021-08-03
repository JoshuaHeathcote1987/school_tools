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

    public $teacherId, $teacherName, $teacherSurname, $teacherImage, $teacherSelection;

    public $studentId, $studentName, $studentSurname, $studentsTeacher, $studentPhoto, $studentPhotoHolder;

    public $babaId, $babaName, $babaSurname, $babaTelephone, $babaEmail, $babaPhoto, $babaPhotoHolder, $father;

    public $anneId, $anneName, $anneSurname, $anneTelephone, $anneEmail, $annePhoto, $annePhotoHolder, $mother;

    public $teacherStudentFlipFlop;

    public $photo;

    const NO_PARENTS_MSG = '-- not set --';

    const NO_PARENT_IMG = 'img/placeholder.png';

    public function saveStudent()
    {
        $name = $this->studentName;
        $surname = $this->studentSurname;
        $id = $this->studentId;

        // Get the student, check if there is or isn't a photo, and if there is, 
        // replace the orignal. Then continue to update the inputs.

        $student = DB::table('students')
        ->where('students.id', $this->studentId)
        ->get();

        if(!empty($this->studentPhoto))
        {

            Storage::delete(public_path($this->studentPhotoHolder));

            $this->validate([
                'studentPhoto' => 'nullable|image|max:10000',
            ]);
    
            $photo = $this->studentPhoto ?  $this->studentPhoto->store('public/img/students') : 'public/img/parents/no-photo-available.png';  


            $affected = DB::table('students')
            ->where('id', $id)
            ->update([
                'image' => $photo,
            ]);
        }

        $user = DB::table('students')
            ->where('id', '=', $id)
            ->update([
                'name' => $name,
                'surname' => $surname,
        ]);

        $this->getStudents();
    }

    public function saveMother()
    {
        $mother = true;
        $studentId = $this->studentId;
        $name = $this->anneName;
        $surname = $this->anneSurname;
        $telephone = $this->anneTelephone;
        $email = $this->anneEmail;

        $anne = DB::table('parents')
            ->join('student_parents', 'parents.id', '=', 'student_parents.parent_id')
            ->where('student_parents.student_id', $this->studentId)
            ->where('parents.mother', 1)
            ->select('parents.*')
            ->get();

        if(sizeof($anne) != 0)
        {
            // Checks if there is an image, if not no new image is not uploaded, but 
            // if there is an image, then the orignal file is delete and replaced 
            // with the new one.
            if(!empty($this->annePhoto))
            {
                Storage::delete($anne[0]->image);

                $this->validate([
                    'annePhoto' => 'nullable|image|max:10000',
                ]);
        
                $photo = $this->annePhoto ?  $this->annePhoto->store('public/img/parents') : 'public/img/parents/no-photo-available.png';  

                $affected = DB::table('parents')
                ->where('id', $anne[0]->id)
                ->update([
                    'image' => $photo,
                ]);
            }

            $affected = DB::table('parents')
            ->where('id', $anne[0]->id)
            ->update([
                'name' => $name,
                'surname' => $surname,
                'phone' => $telephone,
                'email' => $email,
            ]);
        }

        if(sizeof($anne) === 0)
        {
            $this->validate([
                'annePhoto' => 'nullable|image|max:10000',
            ]);
    
            $photo = $this->annePhoto ?  $this->annePhoto->store('public/img/parents') : 'public/img/parents/no-photo-available.png';      
    
            $anne = Genitor::updateOrCreate([
                'mother' => $mother,
                'name' => $name,
                'surname' => $surname,
                'image' => $photo,
                'phone' => $telephone,
                'email' => $email,
            ],['name', 'surname']);
    
            DB::table('student_parents')->upsert([
                'student_id' => $studentId,
                'parent_id' => $anne->id,
            ],[$anne->id]);

            return;
        }
    }

    public function saveFather()
    {
        $mother = false;
        $studentId = $this->studentId;
        $name = $this->babaName;
        $surname = $this->babaSurname;
        $telephone = $this->babaTelephone;
        $email = $this->babaEmail;
        $photo = $this->babaPhotoHolder;

        // Get the father that is linked to the student, if he exists.
        $father = DB::table('parents')
        ->join('student_parents', 'parents.id', '=', 'student_parents.parent_id')
        ->where('student_parents.student_id', $this->studentId)
        ->where('parents.mother', 0)
        ->select('parents.*')
        ->get();

        if(sizeof($father) != 0)
        {
            // Checks if there is an image, if not no new image is not uploaded, but 
            // if there is an image, then the orignal file is delete and replaced 
            // with the new one.
            if(!empty($this->babaPhoto))
            {
                Storage::delete($father[0]->image);

                $this->validate([
                    'babaPhoto' => 'nullable|image|max:10000',
                ]);
        
                $photo = $this->babaPhoto ?  $this->babaPhoto->store('public/img/parents') : 'public/img/parents/no-photo-available.png';  

                $affected = DB::table('parents')
                ->where('id', $father[0]->id)
                ->update([
                    'image' => $photo,
                ]);
            }

            $affected = DB::table('parents')
                ->where('id', $father[0]->id)
                ->update([
                    'name' => $name,
                    'surname' => $surname,
                    'phone' => $telephone,
                    'email' => $email,
                ]);
        }

        if(sizeof($father) === 0)
        {
            $this->validate([
                'babaPhoto' => 'nullable|image|max:10000',
            ]);
    
            $photo = $this->babaPhoto ?  $this->babaPhoto->store('public/img/parents') : 'public/img/parents/no-photo-available.png';      
    
            $father = Genitor::updateOrCreate([
                'mother' => $mother,
                'name' => $name,
                'surname' => $surname,
                'image' => $photo,
                'phone' => $telephone,
                'email' => $email,
            ],['name', 'surname']);
    
            $studentParents = DB::table('student_parents')->upsert([
                'student_id' => $studentId,
                'parent_id' => $father->id,
            ],[$father->id]);

            return;
        }
    }

    public function export()
    {
        $teacher = $this->teacher;
        $students = $this->students;

        $data = array([
            'teacher' => $teacher,
            'students' => $students,
        ]);

        return Excel::download(new StudentsExport($data), $this->teacherName.'_Students_'.$this->month.'_'.$this->year.'.xlsx');
    }

    public function getStudent($id)
    {
        $this->reset(['annePhotoHolder', 'babaPhotoHolder']);

        // Get student details
        $student = Student::where('id', $id)->first();
        $this->studentId = $student->id;
        $this->studentName = $student->name;
        $this->studentSurname = $student->surname;
        $this->studentPhotoHolder = substr($student->image, 7);

        // Get parent details
        $this->mother = DB::table('parents')
        ->join('student_parents', 'parents.id', '=', 'student_parents.parent_id')
        ->where('student_parents.student_id', $this->studentId)
        ->where('parents.mother', 1)
        ->select('parents.*')
        ->get();

        $this->father = DB::table('parents')
        ->join('student_parents', 'parents.id', '=', 'student_parents.parent_id')
        ->where('student_parents.student_id', $this->studentId)
        ->where('parents.mother', 0)
        ->select('parents.*')
        ->get();

        if(sizeof($this->mother) != 0)
        {
            $this->anneName = $this->mother[0]->name;
            $this->anneSurname = $this->mother[0]->surname;
            $this->annePhotoHolder = $this->mother[0]->image;
            $this->anneTelephone = $this->mother[0]->phone;
            $this->anneEmail = $this->mother[0]->email;
            $this->annePhotoHolder = substr($this->annePhotoHolder, 7);
        }
        else
        {
            $this->anneName = self::NO_PARENTS_MSG;
            $this->anneSurname = self::NO_PARENTS_MSG;
            $this->anneTelephone = self::NO_PARENTS_MSG;
            $this->anneEmail = self::NO_PARENTS_MSG;
            $this->annePhotoHolder = self::NO_PARENT_IMG;
        } 

        if(sizeof($this->father) != 0)
        {
            $this->babaName = $this->father[0]->name;
            $this->babaSurname = $this->father[0]->surname;
            $this->babaPhotoHolder = $this->father[0]->image;
            $this->babaTelephone = $this->father[0]->phone;
            $this->babaEmail = $this->father[0]->email;
            $this->babaPhotoHolder = substr($this->babaPhotoHolder, 7);
        }
        else
        {
            $this->babaName = self::NO_PARENTS_MSG;
            $this->babaSurname = self::NO_PARENTS_MSG;
            $this->babaTelephone = self::NO_PARENTS_MSG;
            $this->babaEmail = self::NO_PARENTS_MSG;
            $this->babaPhotoHolder = self::NO_PARENT_IMG;
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

    public function destroyStudent($id)
    {
        $studentPhoto;
        $motherPhoto;
        $fatherPhoto;
        $mother;
        $father;
        $student;

        // Get the student so you are able to delete the picture
        $student = DB::table('students')->where('id', $id)->first();  
        Storage::delete($student->image);
        DB::table('students')->where('id', '=', $id)->delete();
        
        // Delete Mothers Picture
        $mother = DB::table('parents')
            ->join('student_parents', 'parents.id', '=', 'student_parents.parent_id')
            ->where('student_parents.student_id', $id)
            ->where('parents.mother', 1)
            ->select('parents.*')
            ->get();

        // Check if mother exists
        if(sizeof($mother) != 0) {
            Storage::delete($mother[0]->image);
            DB::table('parents')->where('id', '=', $mother[0]->id)->delete();
        }
        
        // Delete Fathers Picture
        $father = DB::table('parents')
            ->join('student_parents', 'parents.id', '=', 'student_parents.parent_id')
            ->where('student_parents.student_id', $id)
            ->where('parents.mother', 0)
            ->select('parents.*')
            ->get();

        // Check if father exists
        if(sizeof($father) != 0) {
            Storage::delete($father[0]->image);
            DB::table('parents')->where('id', '=', $father[0]->id)->delete();
        }
        
        // Delete the student Teacher connection
        DB::table('teacher_students')->where('student_id', '=', $id)->delete();

        // Delete the parent student connection
        DB::table('student_parents')->where('student_id', '=', $id)->delete();

        $this->getStudents();
    }

    public function getStudents()
    {
        $this->studentsTeacher = DB::table('students')
            ->join('teacher_students', 'students.id', '=', 'teacher_students.student_id')
            ->where('teacher_students.teacher_id', $this->teacherId)
            ->select('students.*')
            ->get();
    }

    public function addStudent()
    {
        $teacher = json_decode($this->teacherSelection);

        $this->validate([
            'studentPhoto' => 'nullable|image|max:10000',
        ]);

        $student = new Student();
        $student->name = $this->studentName;
        $student->surname = $this->studentSurname;
        $imageLocation = $this->studentPhoto ?  $this->studentPhoto->store('public/img/students') : 'no-photo-available.png';
        // $imageLocation = substr($imageLocation, 7); // There is a problem where the teacher and student have differnet algo for saving images, it needs to be fixed.
        $student->image = $imageLocation;

        $student->save();

        $attendance = Attendance::create([
            'teacher_id' => $teacher->id,
            'student_id' => $student->id,
            'day' => date('d'),
            'month' => date('F'),
            'year' => date('Y'),
        ]);

        DB::table('teacher_students')->insert([
            'teacher_id' => $teacher->id,
            'student_id' => $student->id,
        ]);

        $this->getStudents();

        $this->photo = null;
    }

    public function updateTeacher()
    {
        
    }

    public function swapStudent()
    {
        $affected = DB::table('teacher_students')
            ->where('student_id', $this->studentId)
            ->where('teacher_id', $this->teacherId)
            ->update(['teacher_id' => $this->teacherSelection]);

        $this->getStudents();
    }

    public function setStudent($id)
    {
        $this->studentId = $id;
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
