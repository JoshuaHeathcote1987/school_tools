<div>
    {{-- To attain knowledge, add things every day; To attain wisdom, subtract things every day. --}}
    <div class="row my-3">
        @foreach($teachers as $teacher)
            <div class="col-lg-3">
                <img type="button" wire:click="getTeacher('{{$teacher->id}}')" class="img-thumbnail" src="{{asset('storage/'.$teacher->mascott)}}" alt="" srcset="">
            </div>
        @endforeach
    </div>

    <hr style="background-color: black;">
    
    @if($teacherStudentFlipFlop)

        <div class="row my-4">
            <div class="col-lg-4">
                <img type="button" class="img-thumbnail d-block mx-auto" style="width: 100%; height: auto;" src="{{asset('storage/'.$teacherImage)}}" alt="" srcset="" data-toggle="modal" data-target="#showTeacherModal" wire:click="">
                <p class="text-center">{{$teacherName}} {{$teacherSurname}}</p>
            </div>
            <div class="col-lg-8">
                <div class="row">
                    @foreach($studentsTeacher as $student)
                        <div class="col-lg-3">
                            <img type="button" class="img-thumbnail" src="{{asset('storage/'.$student->image)}}" alt="" srcset="" data-toggle="modal" data-target="#showStudentModal" wire:click="getStudent('{{$student->id}}')">
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
                        <h5 class="modal-title" id="exampleModalLabel">Details</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <div class="row">
                            <div class="col-lg-6">
                                <h4>Student</h4>
                                <img class="img-thumbnail d-block mx-auto" src="{{asset('storage/'.$studentPhoto)}}" alt="" srcset="">
                            </div>
                            <div class="col-lg-6">
                                <div class="form-group mt-5">
                                    <label for="exampleInputEmail1">Name</label>
                                    <input type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" value="{{$this->studentName}}">
                                </div>
                                <div class="form-group">
                                    <label for="exampleInputEmail1">Surname</label>
                                    <input type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" value="{{$this->studentSurname}}">
                                </div>
                            </div>
                        </div>

                        <hr class="mx-1 shadow my-4" style="background-color: black;">

                        <div class="row mt-3">
                            <div class="col-lg-6">
                                <h4>Anne</h4>
                                <img class="img-thumbnail d-block mx-auto" src="{{asset('storage/'.$annePhotoHolder)}}" alt="">
                                <div class="custom-file mt-3">
                                    <input type="file" class="custom-file-input" id="custom-file-input" wire:model.defer="annePhoto">
                                    <label class="custom-file-label" for="customFile">Choose file</label>
                                </div>
                                <div class="form-group mt-3">
                                    <label for="exampleInputEmail1">Name</label>
                                    <input type="text" class="form-control" id="exampleInputEmail1" aria-describedby="" wire:model.defer="anneName">
                                </div>
                                <div class="form-group">
                                    <label for="exampleInputEmail1">Surname</label>
                                    <input type="text" class="form-control" id="exampleInputEmail1" aria-describedby="" wire:model.defer="anneSurname">
                                </div>
                                <div class="form-group">
                                    <label for="exampleInputEmail1">Telephone</label>
                                    <input type="text" class="form-control" id="exampleInputEmail1" aria-describedby="" wire:model.defer="anneTelephone">
                                </div>
                                <div class="form-group">
                                    <label for="exampleInputEmail1">Email</label>
                                    <input type="text" class="form-control" id="exampleInputEmail1" aria-describedby="" wire:model.defer="anneEmail">
                                </div>
                            </div>

                            <div class="col-lg-6">
                                <h4>Baba</h4>
                                <img class="img-thumbnail d-block mx-auto" src="{{asset('storage/'.$babaPhotoHolder)}}" alt="">
                                <div class="custom-file mt-3">
                                    <input type="file" class="custom-file-input" id="custom-file-input" wire:model.defer="babaPhoto">
                                    <label class="custom-file-label" for="customFile">Choose file</label>
                                </div>
                                <div class="form-group mt-3">
                                    <label for="exampleInputEmail1">Name</label>
                                    <input type="text" class="form-control" id="exampleInputEmail1" aria-describedby="" wire:model.defer="babaName">
                                </div>
                                <div class="form-group">
                                    <label for="exampleInputEmail1">Surname</label>
                                    <input type="text" class="form-control" id="exampleInputEmail1" aria-describedby="" wire:model.defer="babaSurname">
                                </div>
                                <div class="form-group">
                                    <label for="exampleInputEmail1">Telephone</label>
                                    <input type="text" class="form-control" id="exampleInputEmail1" aria-describedby="" wire:model.defer="babaTelephone">
                                </div>
                                <div class="form-group">
                                    <label for="exampleInputEmail1">Email</label>
                                    <input type="text" class="form-control" id="exampleInputEmail1" aria-describedby="" wire:model.defer="babaEmail">
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                        <button type="button" class="btn btn-primary" data-dismiss="modal" wire:click="setStudentAnneBabaModal()">Save changes</button>
                    </div>
                </div>
            </div>
        </div>                                                                                          
    </form>
</div>
