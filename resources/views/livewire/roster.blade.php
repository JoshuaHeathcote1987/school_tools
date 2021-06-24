<div>
    {{-- To attain knowledge, add things every day; To attain wisdom, subtract things every day. --}}
    <div class="row mt-3">
        @foreach($teachers as $teacher)
            <div class="col-lg-3">
                <img wire:click="getTeacher('{{$teacher->id}}')" class="img-thumbnail" src="{{asset('storage/'.$teacher->mascott)}}" alt="" srcset="">
            </div>
        @endforeach
    </div>

    <hr style="background-color: black;">
    
    @if($teacherStudentFlipFlop)

        <div class="row my-4">
            <div class="col-lg-4">
                <img class="img-thumbnail d-block mx-auto" style="width: 100%; height: auto;" src="{{asset('storage/'.$teacherImage)}}" alt="" srcset="" data-toggle="modal" data-target="#showTeacherModal" wire:click="">
                <p class="text-center">{{$teacherName}} {{$teacherSurname}}</p>
            </div>
            <div class="col-lg-8">
                <div class="row">
                    @foreach($studentsTeacher as $student)
                        <div class="col-lg-3">
                            <img class="img-thumbnail" src="{{asset('storage/'.$student->image)}}" alt="" srcset="" data-toggle="modal" data-target="#showStudentModal" wire:click="getStudent('{{$student->id}}')">
                            <p class="text-center">{{$student->name}} {{$student->surname}}</p>
                        </div>
                    @endforeach
                </div>
            </div>
        </div>

    @endif

    {{-- Modals --}}
    {{-- Show Teacher --}}
    <form autocomplete="off">
        <div class="modal fade" id="showTeacherModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true" wire:ignore.self>
            <div class="modal-dialog modal-lg">
                <div class="modal-content">
                    <div class="modal-header" style="background-color: #bee5eb; border-bottom: 1px solid #404040;">
                        <h5 class="modal-title" id="exampleModalLabel">Teacher</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        {{$teacherName}} {{$teacherSurname}}
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    </div>
                </div>
            </div>
        </div>                                                                                          
    </form>

    {{-- Show Student --}}
    <form autocomplete="off">
        <div class="modal fade" id="showStudentModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true" wire:ignore.self>
            <div class="modal-dialog modal-lg">
                <div class="modal-content">
                    <div class="modal-header" style="background-color: #bee5eb; border-bottom: 1px solid #404040;">
                        <h5 class="modal-title" id="exampleModalLabel">Student</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        {{$studentName}} {{$studentSurname}}
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    </div>
                </div>
            </div>
        </div>                                                                                          
    </form>
</div>
