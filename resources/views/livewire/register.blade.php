<div class="container mt-4 mb-4 bg-white shadow-sm rounded-lg" style="border: 1px solid grey;">

    <div wire:offline>
        <div style="display:flex; justify-content:center; align-items:center; background-color:black; position:fixed; left:0px; top:0px; z-index:9999; width: 100%; height: 100%; opacity: 0.90">
            <p class="text-white">Offline...</p>
        </div>
    </div>

    <div wire:loading wire:target="addTeacher">
        <div style="display:flex; justify-content:center; align-items:center; background-color:black; position:fixed; left:0px; top:0px; z-index:9999; width: 100%; height: 100%; opacity: 0.75">
            <div class="spinner-border text-danger" role="status">
            </div>
        </div>
    </div>
    
    @if($message)
    <div class="row mt-3">
        <div class="col-12">
            
                <div class="alert alert-warning alert-dismissible fade show" role="alert">
                    <strong>Holy guacamole!</strong> {{$message}}.
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

    @if($showTable)
        
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
            <button type="button" class="btn btn-lg shadow" style="width: 5%; height: auto; background-color:#65ab63; border: 1px solid black; height: 100%;" data-toggle="modal" data-target="#teacherAddModal">
                <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 640 512"><!-- Font Awesome Free 5.15.3 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license/free (Icons: CC BY 4.0, Fonts: SIL OFL 1.1, Code: MIT License) --><path d="M208 352c-2.39 0-4.78.35-7.06 1.09C187.98 357.3 174.35 360 160 360c-14.35 0-27.98-2.7-40.95-6.91-2.28-.74-4.66-1.09-7.05-1.09C49.94 352-.33 402.48 0 464.62.14 490.88 21.73 512 48 512h224c26.27 0 47.86-21.12 48-47.38.33-62.14-49.94-112.62-112-112.62zm-48-32c53.02 0 96-42.98 96-96s-42.98-96-96-96-96 42.98-96 96 42.98 96 96 96zM592 0H208c-26.47 0-48 22.25-48 49.59V96c23.42 0 45.1 6.78 64 17.8V64h352v288h-64v-64H384v64h-76.24c19.1 16.69 33.12 38.73 39.69 64H592c26.47 0 48-22.25 48-49.59V49.59C640 22.25 618.47 0 592 0z"/></svg>
            </button>
        
            <button wire:click="export" type="button" class="btn btn-lg shadow float-right" style="width: 5%; height: auto; color: #ffffff; background-color: #7c63ab; border: 1px solid black;font-family: 'Orelega One', cursive;" {{$optionButtons}}>
                <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 448 512"><!-- Font Awesome Free 5.15.3 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license/free (Icons: CC BY 4.0, Fonts: SIL OFL 1.1, Code: MIT License) --><path d="M288 256H96v64h192v-64zm89-151L279.1 7c-4.5-4.5-10.6-7-17-7H256v128h128v-6.1c0-6.3-2.5-12.4-7-16.9zm-153 31V0H24C10.7 0 0 10.7 0 24v464c0 13.3 10.7 24 24 24h336c13.3 0 24-10.7 24-24V160H248c-13.2 0-24-10.8-24-24zM64 72c0-4.42 3.58-8 8-8h80c4.42 0 8 3.58 8 8v16c0 4.42-3.58 8-8 8H72c-4.42 0-8-3.58-8-8V72zm0 64c0-4.42 3.58-8 8-8h80c4.42 0 8 3.58 8 8v16c0 4.42-3.58 8-8 8H72c-4.42 0-8-3.58-8-8v-16zm256 304c0 4.42-3.58 8-8 8h-80c-4.42 0-8-3.58-8-8v-16c0-4.42 3.58-8 8-8h80c4.42 0 8 3.58 8 8v16zm0-200v96c0 8.84-7.16 16-16 16H80c-8.84 0-16-7.16-16-16v-96c0-8.84 7.16-16 16-16h224c8.84 0 16 7.16 16 16z"/></svg>
            </button>
        </div>   
    </div>

    {{-- MODALS --}}
    {{-- ADD TEACHER --}}
    @include('include.livewire-modal.add-teacher')

    {{-- ADD STUDENT --}}
    @include('include.livewire-modal.add-student')

    @if(!$students == null)
        {{-- EDIT STUDENT --}}
        @include('include.livewire-modal.edit-student')

        {{-- DELETE STUDENT --}}
        @include('include.livewire-modal.delete-student')
    @endif

    {{-- ADMIN PASSWORD --}}
    @include('include.livewire-modal.admin-password')
</div>

