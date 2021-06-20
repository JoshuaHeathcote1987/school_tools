<div>
    {{-- The whole world belongs to you. --}}
    @if($message)
    <div class="row mt-3">
        <div class="col-12">
            
                <div class="alert alert-warning alert-dismissible fade show" role="alert">
                    <strong>Holy guacamole!</strong> You should check in on some of those fields below.
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                    </button>
                </div>
            
        </div>
    </div>
    @endif

    <div class="row mt-4 mb-3">
        <div class="col-lg-12">
            <h2 class="font-weight-bold">{{$date}}</h2>
        </div>
    </div>

    <hr style="background-color: black;">
    
    <div class="row mt-4">
        <div class="col-lg-4">
            <div class="w-100">
                <div class="form-group">
                    <label for="exampleFormControlSelect1"><h3>Month</h3></label>
                    <select wire:model.lazy="month" class="form-control">
                        <option selected value> -- select an option -- </option>
                        @foreach($months as $month)
                            <option>{{$month}}</option>
                        @endforeach
                    </select>
                </div>
                <div class="form-group">
                    <label for="exampleFormControlSelect1"><h3>Year</h3></label>
                    <select wire:model.lazy="year" class="form-control">
                        <option selected value> -- select an option -- </option>
                        @for($i=2021; $i<=2030; $i++)
                            <option>{{$i}}</option>
                        @endfor
                    </select>
                </div>
            </div>
        </div>
        <div class="col-lg-4">
            <div style="width: 100%;">
                <div class="form-group w-100">
                    <label for="exampleFormControlSelect1"><h3>Teacher</h3></label>
                    <select wire:model.lazy="teacher" class="form-control" id="exampleFormControlSelect1">
                        <option selected value> -- select an option -- </option>
                        @foreach($teachers as $teacher)
                            <option value="{{$teacher}}">{{$teacher->name}}</option>
                        @endforeach
                    </select>
                </div>
                <button onmouseover="mouseOver(this)" onmouseout="mouseOut(this)" type="button" class="w-100 btn btn-success mt-5" wire:click="getAttendanceRecords">Go</button>
            </div>

        </div>
        <div class="col-lg-4">
            <svg class="mx-auto" style="width: 40%;" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 384 512"><!-- Font Awesome Free 5.15.3 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license/free (Icons: CC BY 4.0, Fonts: SIL OFL 1.1, Code: MIT License) --><path d="M336 64h-80c0-35.3-28.7-64-64-64s-64 28.7-64 64H48C21.5 64 0 85.5 0 112v352c0 26.5 21.5 48 48 48h288c26.5 0 48-21.5 48-48V112c0-26.5-21.5-48-48-48zM96 424c-13.3 0-24-10.7-24-24s10.7-24 24-24 24 10.7 24 24-10.7 24-24 24zm0-96c-13.3 0-24-10.7-24-24s10.7-24 24-24 24 10.7 24 24-10.7 24-24 24zm0-96c-13.3 0-24-10.7-24-24s10.7-24 24-24 24 10.7 24 24-10.7 24-24 24zm96-192c13.3 0 24 10.7 24 24s-10.7 24-24 24-24-10.7-24-24 10.7-24 24-24zm128 368c0 4.4-3.6 8-8 8H168c-4.4 0-8-3.6-8-8v-16c0-4.4 3.6-8 8-8h144c4.4 0 8 3.6 8 8v16zm0-96c0 4.4-3.6 8-8 8H168c-4.4 0-8-3.6-8-8v-16c0-4.4 3.6-8 8-8h144c4.4 0 8 3.6 8 8v16zm0-96c0 4.4-3.6 8-8 8H168c-4.4 0-8-3.6-8-8v-16c0-4.4 3.6-8 8-8h144c4.4 0 8 3.6 8 8v16z"/></svg>
        </div>
    </div>

    <hr style="background-color: black;">

    @if(!$students == null)
        
        <table class="table table-hover table-sm mb-4" style="border-left: 0px solid black; border-right: 0px solid black; border-bottom: 0px solid black; border-top: 0px solid black;">
            
            <thead>
                <tr>
                    <th style="border-color: black; background-color: #ab6369; color:white;" scope="col">Students</th>
                    @for($i=1;$i<=$days;$i++)
                        <th scope="col" style="background-color: #c3babe; border-color:black;">{{substr('00' . $i, -2, 2)}}</th>
                    @endfor
                </tr>
            </thead>
            <tbody>
                @foreach($students as $student)
                    <tr>
                        <th scope="row">{{$student->name}}</th>
                        @for($i=1;$i<=$days;$i++)
                            <td>
                                <div class="form-check">
                                    <input class="form-check-input" type="checkbox" wire:click="addAttendanceRecord('{{$student->id}}', '{{$i}}')" 
                                        @foreach($attendances as $attendance)
                                            @if($student->id == $attendance->student_id && $attendance->day == $i)
                                                checked
                                            @endif
                                        @endforeach
                                    >
                                <div>
                            </td>
                        @endfor
                    </tr>  
                @endforeach
            </tbody>
        </table>
        <hr style="background-color: black;">
    @endif

    <div class="row mb-4">
        <div class="col-lg-12">
            <button onmouseover="mouseOver(this)" onmouseout="mouseOut(this)" type="button" class="btn btn-lg shadow" style="width: 5%; height: auto; background-color:#65ab63; border: 1px solid black; height: 100%;" data-toggle="modal" data-target="#teacherAddModal">
                <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 640 512"><!-- Font Awesome Free 5.15.3 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license/free (Icons: CC BY 4.0, Fonts: SIL OFL 1.1, Code: MIT License) --><path d="M208 352c-2.39 0-4.78.35-7.06 1.09C187.98 357.3 174.35 360 160 360c-14.35 0-27.98-2.7-40.95-6.91-2.28-.74-4.66-1.09-7.05-1.09C49.94 352-.33 402.48 0 464.62.14 490.88 21.73 512 48 512h224c26.27 0 47.86-21.12 48-47.38.33-62.14-49.94-112.62-112-112.62zm-48-32c53.02 0 96-42.98 96-96s-42.98-96-96-96-96 42.98-96 96 42.98 96 96 96zM592 0H208c-26.47 0-48 22.25-48 49.59V96c23.42 0 45.1 6.78 64 17.8V64h352v288h-64v-64H384v64h-76.24c19.1 16.69 33.12 38.73 39.69 64H592c26.47 0 48-22.25 48-49.59V49.59C640 22.25 618.47 0 592 0z"/></svg>
            </button>
        
            <button onmouseover="mouseOver(this)" onmouseout="mouseOut(this)" wire:click="export" type="button" class="btn btn-lg shadow float-right" style="width: 5%; height: auto; color: #ffffff; background-color: #7c63ab; border: 1px solid black;font-family: 'Orelega One', cursive;">
                <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 448 512"><!-- Font Awesome Free 5.15.3 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license/free (Icons: CC BY 4.0, Fonts: SIL OFL 1.1, Code: MIT License) --><path d="M288 256H96v64h192v-64zm89-151L279.1 7c-4.5-4.5-10.6-7-17-7H256v128h128v-6.1c0-6.3-2.5-12.4-7-16.9zm-153 31V0H24C10.7 0 0 10.7 0 24v464c0 13.3 10.7 24 24 24h336c13.3 0 24-10.7 24-24V160H248c-13.2 0-24-10.8-24-24zM64 72c0-4.42 3.58-8 8-8h80c4.42 0 8 3.58 8 8v16c0 4.42-3.58 8-8 8H72c-4.42 0-8-3.58-8-8V72zm0 64c0-4.42 3.58-8 8-8h80c4.42 0 8 3.58 8 8v16c0 4.42-3.58 8-8 8H72c-4.42 0-8-3.58-8-8v-16zm256 304c0 4.42-3.58 8-8 8h-80c-4.42 0-8-3.58-8-8v-16c0-4.42 3.58-8 8-8h80c4.42 0 8 3.58 8 8v16zm0-200v96c0 8.84-7.16 16-16 16H80c-8.84 0-16-7.16-16-16v-96c0-8.84 7.16-16 16-16h224c8.84 0 16 7.16 16 16z"/></svg>
            </button>

            <button onmouseover="mouseOver(this)" onmouseout="mouseOut(this)" type="button" class="btn btn-lg shadow float-right mr-1" style="width: 5%; height: auto; background-color:#ab6363; border: 1px solid black;  height: 100%;"  height: 100%; wire:click="" data-toggle="modal" data-target="#studentDeleteModal">
                <svg  xmlns="http://www.w3.org/2000/svg" viewBox="0 0 640 512"><!-- Font Awesome Free 5.15.3 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license/free (Icons: CC BY 4.0, Fonts: SIL OFL 1.1, Code: MIT License) --><path d="M624 208H432c-8.8 0-16 7.2-16 16v32c0 8.8 7.2 16 16 16h192c8.8 0 16-7.2 16-16v-32c0-8.8-7.2-16-16-16zm-400 48c70.7 0 128-57.3 128-128S294.7 0 224 0 96 57.3 96 128s57.3 128 128 128zm89.6 32h-16.7c-22.2 10.2-46.9 16-72.9 16s-50.6-5.8-72.9-16h-16.7C60.2 288 0 348.2 0 422.4V464c0 26.5 21.5 48 48 48h352c26.5 0 48-21.5 48-48v-41.6c0-74.2-60.2-134.4-134.4-134.4z"/></svg>
            </button>
`
            <button onmouseover="mouseOver(this)" onmouseout="mouseOut(this)" type="button" class="btn btn-lg shadow float-right mr-1" style="width: 5%; height: auto; background-color:#aaab63; border: 1px solid black;  height: 100%;" wire:click="" data-toggle="modal" data-target="#studentEditModal">
                <svg  xmlns="http://www.w3.org/2000/svg" viewBox="0 0 640 512"><!-- Font Awesome Free 5.15.3 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license/free (Icons: CC BY 4.0, Fonts: SIL OFL 1.1, Code: MIT License) --><path d="M224 256c70.7 0 128-57.3 128-128S294.7 0 224 0 96 57.3 96 128s57.3 128 128 128zm89.6 32h-16.7c-22.2 10.2-46.9 16-72.9 16s-50.6-5.8-72.9-16h-16.7C60.2 288 0 348.2 0 422.4V464c0 26.5 21.5 48 48 48h274.9c-2.4-6.8-3.4-14-2.6-21.3l6.8-60.9 1.2-11.1 7.9-7.9 77.3-77.3c-24.5-27.7-60-45.5-99.9-45.5zm45.3 145.3l-6.8 61c-1.1 10.2 7.5 18.8 17.6 17.6l60.9-6.8 137.9-137.9-71.7-71.7-137.9 137.8zM633 268.9L595.1 231c-9.3-9.3-24.5-9.3-33.8 0l-37.8 37.8-4.1 4.1 71.8 71.7 41.8-41.8c9.3-9.4 9.3-24.5 0-33.9z"/></svg>
            </button>

            <button onmouseover="mouseOver(this)" onmouseout="mouseOut(this)" type="button" class="btn btn-lg shadow float-right mr-1" style="width: 5%; height: auto; background-color:#63ab87; border: 1px solid black;  height: 100%;" wire:click="" data-toggle="modal" data-target="#studentAddModal">
                <svg  xmlns="http://www.w3.org/2000/svg" viewBox="0 0 640 512"><!-- Font Awesome Free 5.15.3 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license/free (Icons: CC BY 4.0, Fonts: SIL OFL 1.1, Code: MIT License) --><path d="M319.4 320.6L224 416l-95.4-95.4C57.1 323.7 0 382.2 0 454.4v9.6c0 26.5 21.5 48 48 48h352c26.5 0 48-21.5 48-48v-9.6c0-72.2-57.1-130.7-128.6-133.8zM13.6 79.8l6.4 1.5v58.4c-7 4.2-12 11.5-12 20.3 0 8.4 4.6 15.4 11.1 19.7L3.5 242c-1.7 6.9 2.1 14 7.6 14h41.8c5.5 0 9.3-7.1 7.6-14l-15.6-62.3C51.4 175.4 56 168.4 56 160c0-8.8-5-16.1-12-20.3V87.1l66 15.9c-8.6 17.2-14 36.4-14 57 0 70.7 57.3 128 128 128s128-57.3 128-128c0-20.6-5.3-39.8-14-57l96.3-23.2c18.2-4.4 18.2-27.1 0-31.5l-190.4-46c-13-3.1-26.7-3.1-39.7 0L13.6 48.2c-18.1 4.4-18.1 27.2 0 31.6z"/></svg>
            </button>
        </div>   
    </div>

    {{-- MODALS --}}
    {{-- ADD TEACHER --}}
    <form autocomplete="off">
        <div class="modal fade" id="teacherAddModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">Add Teacher</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <div class="form-group row">
                            <div class="col-lg-3">
                                <label for="" class="col-sm-2 col-form-label text-right">Forename</label>
                            </div>
                            <div class="col-lg-9">
                                <input type="text" class="form-control" wire:model.defer="teacherName">
                            </div>
                        </div>
                        <div class="form-group row">
                            <div class="col-lg-3">
                                <label for="" class="col-sm-2 col-form-label text-right">Surname</label>
                            </div>
                            <div class="col-lg-9">
                                <input type="text" class="form-control" wire:model.defer="teacherSurname">
                            </div>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                        <button type="button" class="btn btn-primary" data-dismiss="modal" wire:click="addTeacher">Save changes</button>
                    </div>
                </div>
            </div>
        </div>
    </form>


    {{-- ADD STUDENT --}}
    <form autocomplete="off">
        <div class="modal fade" id="studentAddModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
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

    {{-- EDIT STUDENT --}}
    @if(!$students == null)
        <form autocomplete="off">
            <div class="modal fade" id="studentEditModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                <div class="modal-dialog modal-dialog-centered">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="exampleModalLabel">Edit Student</h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <div class="modal-body">
                            <div class="form-group row">
                                <div class="col-lg-3">
                                    <label for="" class="col-sm-2 col-form-label text-right">Students</label>
                                </div>
                                <div class="col-lg-9">
                                    <select wire:model.defer="studentSelected" multiple class="form-control" size="8">
                                        @foreach ($students as $student)
                                            <option value="{{$student}}">{{$student->name}} {{$student->surname}}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                            <div class="form-group row">
                                <div class="col-lg-3">
                                    <label for="" class="col-sm-2 col-form-label text-right">Forename</label>
                                </div>
                                <div class="col-lg-9">
                                    <input wire:model.defer="studentName" type="text" class="form-control" id="" placeholder="" autocomplete="false" value="">
                                </div>
                            </div>
                            <div class="form-group row">
                                <div class="col-lg-3">
                                    <label for="" class="col-sm-2 col-form-label text-right">Surname</label>
                                </div>
                                <div class="col-lg-9">
                                    <input wire:model.defer="studentSurname" type="text" class="form-control" id="" placeholder="" autocomplete="false" value="">
                                </div>
                            </div>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                            <button type="button" class="btn btn-primary" data-dismiss="modal" wire:click="editStudent">Save changes</button>
                        </div>
                    </div>
                </div>
            </div>
        </form>

        {{-- DELETE STUDENT --}}
        <div class="modal fade" id="studentDeleteModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">Delete Student</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <div class="form-group row">
                            <div class="col-lg-3">
                                <label for="" class="col-sm-2 col-form-label text-right">Students</label>
                            </div>
                            <div class="col-lg-9">
                                <select wire:model.defer="studentSelected" multiple class="form-control" size="8">
                                    @foreach ($students as $student)
                                        <option value="{{$student}}">{{$student->name}} {{$student->surname}}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                        <button type="button" class="btn btn-primary" data-dismiss="modal" wire:click="deleteStudent">Save changes</button>
                    </div>
                </div>
            </div>
        </div>
    @endif

    {{-- ADMIN PASSWORD --}}
    <form autocomplete="off">
        <div class="modal fade" id="adminPasswordModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">Enter Password!</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <div class="form-group">
                            <label for="exampleInputPassword1">Password</label>
                            <input type="password" class="form-control" id="exampleInputPassword1">
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                        <button type="button" class="btn btn-primary" data-dismiss="modal" wire:click="showAdminEditTools">Save changes</button>
                    </div>
                </div>
            </div>
        </div>                                                                                          
    </form>
</div>

