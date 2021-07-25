<div>
    
    {{-- To attain knowledge, add things every day; To attain wisdom, subtract things every day. --}}
    <div class="row mt-3 mb-0 pb-0">
        @foreach($teachers as $teacher)
            <div class="col-lg-3">
                <div style="height: 245px; overflow: hidden;">
                    <img type="button" wire:click="getTeacher('{{$teacher->id}}')" class="img-thumbnail" src="{{asset('storage/'.$teacher->mascott)}}" alt="" srcset="">
                </div>
            </div>
        @endforeach
    </div>

    <hr class="pt-0 mt-0" style="background-color: black; height: 2px;">
    
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
                            @php
                                $student->image = substr($student->image, 7);
                            @endphp
                            <img style="width: 100%; height: auto;" type="button" class="img-thumbnail" src="{{asset('storage/'.$student->image)}}" alt="" srcset="" data-toggle="modal" data-target="#showStudentModal" wire:click="getStudent('{{$student->id}}')">
                            <p class="text-center">{{$student->name}} {{$student->surname}}</p>
                        </div>
                    @endforeach
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-lg-12 px-0 mx-0">
                <button wire:click="export" type="button" class="btn btn-lg mr-3 mb-2 float-right" style="width: 60px; height: auto; color: #ffffff; background-color: #7c63ab; font-family: 'Orelega One', cursive;">
                    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 448 512"><!-- Font Awesome Free 5.15.3 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license/free (Icons: CC BY 4.0, Fonts: SIL OFL 1.1, Code: MIT License) --><path d="M288 256H96v64h192v-64zm89-151L279.1 7c-4.5-4.5-10.6-7-17-7H256v128h128v-6.1c0-6.3-2.5-12.4-7-16.9zm-153 31V0H24C10.7 0 0 10.7 0 24v464c0 13.3 10.7 24 24 24h336c13.3 0 24-10.7 24-24V160H248c-13.2 0-24-10.8-24-24zM64 72c0-4.42 3.58-8 8-8h80c4.42 0 8 3.58 8 8v16c0 4.42-3.58 8-8 8H72c-4.42 0-8-3.58-8-8V72zm0 64c0-4.42 3.58-8 8-8h80c4.42 0 8 3.58 8 8v16c0 4.42-3.58 8-8 8H72c-4.42 0-8-3.58-8-8v-16zm256 304c0 4.42-3.58 8-8 8h-80c-4.42 0-8-3.58-8-8v-16c0-4.42 3.58-8 8-8h80c4.42 0 8 3.58 8 8v16zm0-200v96c0 8.84-7.16 16-16 16H80c-8.84 0-16-7.16-16-16v-96c0-8.84 7.16-16 16-16h224c8.84 0 16 7.16 16 16z"/></svg>
                </button>
                <button wire:click="addStudent()" type="button" class="btn btn-lg mr-2 mb-3 float-right" style="width: 60px; height: auto; color: #ffffff; background-color: green; font-family: 'Orelega One', cursive;" data-toggle="modal" data-target="#addStudent">
                    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 448 512"><!-- Font Awesome Free 5.15.3 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license/free (Icons: CC BY 4.0, Fonts: SIL OFL 1.1, Code: MIT License) --><path d="M224 256c70.7 0 128-57.3 128-128S294.7 0 224 0 96 57.3 96 128s57.3 128 128 128zm89.6 32h-16.7c-22.2 10.2-46.9 16-72.9 16s-50.6-5.8-72.9-16h-16.7C60.2 288 0 348.2 0 422.4V464c0 26.5 21.5 48 48 48h352c26.5 0 48-21.5 48-48v-41.6c0-74.2-60.2-134.4-134.4-134.4z"/></svg>
                </button>
                <table class="table table-hover">
                    <thead class="bg-dark text-light">
                        <tr>
                            <th scope="col">#</th>
                            <th scope="col">First</th>
                            <th scope="col">Last</th>
                            <th scope="col">Handle</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($studentsTeacher as $student)
                        <tr>
                            <th scope="row">{{$student->id}}</th>
                            <td>{{$student->name}}</td>
                            <td>{{$student->surname}}</td>
                            <td>
                                <button type="button" class="btn btn-warning" data-toggle="modal" data-target="#showStudentModal" wire:click="getStudent('{{$student->id}}')">
                                    <svg style="width: 25px;" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 640 512"><!-- Font Awesome Free 5.15.3 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license/free (Icons: CC BY 4.0, Fonts: SIL OFL 1.1, Code: MIT License) --><path d="M224 256c70.7 0 128-57.3 128-128S294.7 0 224 0 96 57.3 96 128s57.3 128 128 128zm89.6 32h-16.7c-22.2 10.2-46.9 16-72.9 16s-50.6-5.8-72.9-16h-16.7C60.2 288 0 348.2 0 422.4V464c0 26.5 21.5 48 48 48h274.9c-2.4-6.8-3.4-14-2.6-21.3l6.8-60.9 1.2-11.1 7.9-7.9 77.3-77.3c-24.5-27.7-60-45.5-99.9-45.5zm45.3 145.3l-6.8 61c-1.1 10.2 7.5 18.8 17.6 17.6l60.9-6.8 137.9-137.9-71.7-71.7-137.9 137.8zM633 268.9L595.1 231c-9.3-9.3-24.5-9.3-33.8 0l-37.8 37.8-4.1 4.1 71.8 71.7 41.8-41.8c9.3-9.4 9.3-24.5 0-33.9z"/></svg>
                                </button>
                                <button type="button" class="btn btn-danger" wire:click="destroyStudent('{{$student->id}}')">
                                    <svg style="width: 25px;" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 640 512"><!-- Font Awesome Free 5.15.3 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license/free (Icons: CC BY 4.0, Fonts: SIL OFL 1.1, Code: MIT License) --><path d="M624 208H432c-8.8 0-16 7.2-16 16v32c0 8.8 7.2 16 16 16h192c8.8 0 16-7.2 16-16v-32c0-8.8-7.2-16-16-16zm-400 48c70.7 0 128-57.3 128-128S294.7 0 224 0 96 57.3 96 128s57.3 128 128 128zm89.6 32h-16.7c-22.2 10.2-46.9 16-72.9 16s-50.6-5.8-72.9-16h-16.7C60.2 288 0 348.2 0 422.4V464c0 26.5 21.5 48 48 48h352c26.5 0 48-21.5 48-48v-41.6c0-74.2-60.2-134.4-134.4-134.4z"/></svg>
                                </button>
                                <button type="button" class="btn btn-primary" wire:click="destroyStudent('{{$student->id}}')">     
                                    <svg style="width: 25px;" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 640 512"><!-- Font Awesome Free 5.15.3 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license/free (Icons: CC BY 4.0, Fonts: SIL OFL 1.1, Code: MIT License) --><path d="M290.547 189.039c-20.295-10.149-44.147-11.199-64.739-3.89 42.606 0 71.208 20.475 85.578 50.576 8.576 17.899-5.148 38.071-23.617 38.071 18.429 0 32.211 20.136 23.617 38.071-14.725 30.846-46.123 50.854-80.298 50.854-.557 0-94.471-8.615-94.471-8.615l-66.406 33.347c-9.384 4.693-19.815.379-23.895-7.781L1.86 290.747c-4.167-8.615-1.111-18.897 6.946-23.621l58.072-33.069L108 159.861c6.39-57.245 34.731-109.767 79.743-146.726 11.391-9.448 28.341-7.781 37.51 3.613 9.446 11.394 7.78 28.067-3.612 37.516-12.503 10.559-23.618 22.509-32.509 35.57 21.672-14.729 46.679-24.732 74.186-28.067 14.725-1.945 28.063 8.336 29.73 23.065 1.945 14.728-8.336 28.067-23.062 29.734-16.116 1.945-31.12 7.503-44.178 15.284 26.114-5.713 58.712-3.138 88.079 11.115 13.336 6.669 18.893 22.509 12.224 35.848-6.389 13.06-22.504 18.617-35.564 12.226zm-27.229 69.472c-6.112-12.505-18.338-20.286-32.231-20.286a35.46 35.46 0 0 0-35.565 35.57c0 21.428 17.808 35.57 35.565 35.57 13.893 0 26.119-7.781 32.231-20.286 4.446-9.449 13.614-15.006 23.339-15.284-9.725-.277-18.893-5.835-23.339-15.284zm374.821-37.237c4.168 8.615 1.111 18.897-6.946 23.621l-58.071 33.069L532 352.16c-6.39 57.245-34.731 109.767-79.743 146.726-10.932 9.112-27.799 8.144-37.51-3.613-9.446-11.394-7.78-28.067 3.613-37.516 12.503-10.559 23.617-22.509 32.508-35.57-21.672 14.729-46.679 24.732-74.186 28.067-10.021 2.506-27.552-5.643-29.73-23.065-1.945-14.728 8.336-28.067 23.062-29.734 16.116-1.946 31.12-7.503 44.178-15.284-26.114 5.713-58.712 3.138-88.079-11.115-13.336-6.669-18.893-22.509-12.224-35.848 6.389-13.061 22.505-18.619 35.565-12.227 20.295 10.149 44.147 11.199 64.739 3.89-42.606 0-71.208-20.475-85.578-50.576-8.576-17.899 5.148-38.071 23.617-38.071-18.429 0-32.211-20.136-23.617-38.071 14.033-29.396 44.039-50.887 81.966-50.854l92.803 8.615 66.406-33.347c9.408-4.704 19.828-.354 23.894 7.781l44.455 88.926zm-229.227-18.618c-13.893 0-26.119 7.781-32.231 20.286-4.446 9.449-13.614 15.006-23.339 15.284 9.725.278 18.893 5.836 23.339 15.284 6.112 12.505 18.338 20.286 32.231 20.286a35.46 35.46 0 0 0 35.565-35.57c0-21.429-17.808-35.57-35.565-35.57z"/></svg>
                                </button>
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    @endif

    {{-- Modals --}}
    {{-- Show Teacher --}}
    <form autocomplete="off">
        <div class="modal fade" id="showTeacherModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true" wire:ignore.self>
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header" style="background-color: #bee5eb; border-bottom: 1px solid #404040;">
                        <h5 class="modal-title" id="exampleModalLabel">Teacher</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <div class="row">
                            <div class="col-lg-10 mx-auto">
                                <img class="img-thumbnail mx-auto" src="{{asset('storage/'.$teacherImage)}}" alt="" srcset="">
                                <div class="form-group mx-auto">
                                    <label for="exampleInputEmail1">Name</label>
                                    <input type="text" class="form-control" id="" aria-describedby="emailHelp" value="{{$teacherName}}">
                                </div>
                                <div class="form-group mx-auto">
                                    <label for="exampleInputEmail1">Name</label>
                                    <input type="text" class="form-control" id="" aria-describedby="emailHelp" value="{{$teacherSurname}}">
                                </div>
                            </div>
                        </div>     
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                        <button type="button" class="btn btn-primary" wire:click="updateTeacher()">Save</button>
                    </div>
                </div>
            </div>
        </div>                                                                                          
    </form>

    {{-- Show Student --}}
    <form autocomplete="off">
        <div class="modal fade" id="showStudentModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true" wire:ignore.self>
            <div class="modal-dialog modal-xl">
                <div class="modal-content">
                    <div class="modal-header" style="background-color: #bee5eb; border-bottom: 1px solid #404040;">
                        <h5 class="modal-title" id="exampleModalLabel">Details</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <div class="row">
                            <div class="col-lg-4 border-right">
                                <h4>Student</h4>
                                <img class="img-thumbnail d-block mx-auto" src="{{asset('storage/'.$studentPhotoHolder)}}" alt="" srcset="">
                                <div class="custom-file mt-3">
                                    <input type="file" class="custom-file-input" id="custom-file-input" wire:model.defer="studentPhoto">
                                    <label class="custom-file-label" for="customFile">Choose file</label>
                                </div>
                                <div class="form-group mt-3">
                                    <label for="exampleInputEmail1">Name</label>
                                    <input type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" wire:model="studentName">
                                </div>
                                <div class="form-group">
                                    <label for="exampleInputEmail1">Surname</label>
                                    <input type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" wire:model="studentSurname">
                                </div>    
                            </div>
                            
                            <div class="col-lg-4 border-right">
                                <h4>Mother</h4>
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

                            <div class="col-lg-4">
                                <h4>Father</h4>
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

                            <div class="row w-100">
                                <div class="col-lg-4">
                                    <button type="button" class="btn btn-primary ml-3" wire:click="saveStudent()">Save</button>
                                </div>

                                <div class="col-lg-4">
                                    <button type="button" class="btn btn-primary ml-3" wire:click="saveMother()">Save</button>
                                </div>
                                
                                <div class="col-lg-4">
                                    <button type="button" class="btn btn-primary ml-3" wire:click="saveFather()">Save</button>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    </div>
                </div>
            </div>
        </div>                                                                                          
    </form>

    {{-- Add Student --}}
    <form autocomplete="off">
        <div class="modal fade" id="addStudent" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true" wire:ignore.self>
            <div class="modal-dialog modal-dialog-centered">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">Add Student</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <div class="form-group row">
                            <div class="col-lg-3">
                                <label for="" class="col-sm-2 col-form-label text-right">Teacher</label>
                            </div>
                            <div class="col-lg-9">
                                <select wire:model.defer="teacher" class="form-control" id="exampleFormControlSelect1">
                                    <option selected value> -- select an option -- </option>
                                    @foreach($teachers as $teacher)
                                        <option value="{{$teacher}}">{{$teacher->name}}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                        <div class="form-group row">
                            <div class="col-lg-3">
                                <label for="" class="col-sm-2 col-form-label text-right">Photo</label>
                            </div>
                            <div class="col-lg-9">
                                <div class="custom-file">
                                    <input type="file" class="custom-file-input" id="custom-file-input" wire:model="photo">
                                    <label class="custom-file-label" for="customFile">Choose file</label>
                                </div>
                            </div>
                        </div>
                        <div class="form-group row">
                            <div class="col-lg-3">
                                <label for="" class="col-sm-2 col-form-label text-right">Forename</label>
                            </div>
                            <div class="col-lg-9">
                                <input type="text" class="form-control" id="" placeholder="" wire:model.defer="studentName">
                            </div>
                        </div>
                        <div class="form-group row">
                            <div class="col-lg-3">
                                <label for="" class="col-sm-2 col-form-label text-right">Surname</label>
                            </div>
                            <div class="col-lg-9">
                                <input type="text" class="form-control" id="" placeholder="" wire:model.defer="studentSurname">
                            </div>
                        </div>

                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                        <button type="button" class="btn btn-primary" data-dismiss="modal" wire:click="addStudent">Save changes</button>
                    </div>
                </div>
            </div>
        </div>
    </form>
</div>
