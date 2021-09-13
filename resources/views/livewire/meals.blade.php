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

    <div class="row mt-4 mb-3">
        <div class="col-lg-12">
            <h2 class="font-weight-bold ml-3">Meal Chronicle</h2>
        </div>
    </div>

    <hr style="background-color: black;">
    
    <div class="row mt-4">
        <div class="col-lg-4">
            <div class="w-100">
                <div class="form-group">
                    <label for="exampleFormControlSelect1"><h3>Month</h3></label>
                    <select wire:model.defer="month" class="form-control">
                        <option selected value> -- select an option -- </option>
                        @foreach($months as $month)
                            <option>{{$month}}</option>
                        @endforeach
                    </select>
                </div>
                <div class="form-group">
                    <label for="exampleFormControlSelect1"><h3>Year</h3></label>
                    <select wire:model.defer="year" class="form-control">
                        <option selected value> -- select an option -- </option>
                        @for($i=2021; $i<=2030; $i++)
                            <option>{{$i}}</option>
                        @endfor
                    </select>
                </div>
            </div>
            <button onmouseover="mouseOver(this)" onmouseout="mouseOut(this)" type="button" class="w-100 btn btn-success mt-5" wire:click="getMealRecords">Go</button>
        </div>
        <div class="col-lg-4">
            <div style="width: 100%;">
                <div class="form-group w-100">
                    <label for="exampleFormControlSelect1"><h3>Teacher</h3></label>
                    <select wire:model.defer="teacher" class="form-control" id="exampleFormControlSelect1">
                        <option selected value> -- select an option -- </option>
                        @foreach($teachers as $teacher)
                            <option value="{{$teacher}}" wire:click="getStudents({{$teacher->id}})">{{substr($teacher->name, 0, 1)}}. {{$teacher->surname}}</option>
                        @endforeach
                    </select>
                </div>
                <div class="form-group w-100">
                    <label for="exampleFormControlSelect1"><h3>Student</h3></label>
                    <select wire:model.defer="student" class="form-control" id="exampleFormControlSelect1" {{$studentDisabled}}>
                        <option selected value> -- select an option -- </option>
                        @foreach($students as $student)
                            <option value="">{{$student->name}}</option>
                        @endforeach
                    </select>
                </div>
            </div>
        </div>
        <div class="col-lg-4 mt-5">    
            <svg class="mx-auto" style="width: 40%;" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512"><!-- Font Awesome Free 5.15.3 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license/free (Icons: CC BY 4.0, Fonts: SIL OFL 1.1, Code: MIT License) --><path d="M510.52 255.82c-69.97-.85-126.47-57.69-126.47-127.86-70.17 0-127-56.49-127.86-126.45-27.26-4.14-55.13.3-79.72 12.82l-69.13 35.22a132.221 132.221 0 0 0-57.79 57.81l-35.1 68.88a132.645 132.645 0 0 0-12.82 80.95l12.08 76.27a132.521 132.521 0 0 0 37.16 72.96l54.77 54.76a132.036 132.036 0 0 0 72.71 37.06l76.71 12.15c27.51 4.36 55.7-.11 80.53-12.76l69.13-35.21a132.273 132.273 0 0 0 57.79-57.81l35.1-68.88c12.56-24.64 17.01-52.58 12.91-79.91zM176 368c-17.67 0-32-14.33-32-32s14.33-32 32-32 32 14.33 32 32-14.33 32-32 32zm32-160c-17.67 0-32-14.33-32-32s14.33-32 32-32 32 14.33 32 32-14.33 32-32 32zm160 128c-17.67 0-32-14.33-32-32s14.33-32 32-32 32 14.33 32 32-14.33 32-32 32z"/></svg>
        </div>
    </div>

    <hr style="background-color: black;">

    @if($showMealPlans)
        <div class="col-lg-12">
            <table class="table table-bordered border-primary">
                <thead>
                    <tr>
                      <th scope="col">#</th>
                      <th scope="col">First</th>
                      <th scope="col">Last</th>
                      <th scope="col">Handle</th>
                    </tr>
                  </thead>
                  <tbody>
                    <tr>
                      <th scope="row">1</th>
                      <td>Mark</td>
                      <td>Otto</td>
                      <td>@mdo</td>
                    </tr>
                    <tr>
                      <th scope="row">2</th>
                      <td>Jacob</td>
                      <td>Thornton</td>
                      <td>@fat</td>
                    </tr>
                    <tr>
                      <th scope="row">3</th>
                      <td colspan="2">Larry the Bird</td>
                      <td>@twitter</td>
                    </tr>
                </tbody>
            </table>
        </div>
    @endif

</div>
