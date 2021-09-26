<div class="container mt-4 mb-4 bg-white shadow-sm rounded-lg" style="border: 1px solid grey;">

    <div wire:offline>
        <div
            style="display:flex; justify-content:center; align-items:center; background-color:black; position:fixed; left:0px; top:0px; z-index:9999; width: 100%; height: 100%; opacity: 0.90">
            <p class="text-white">Offline...</p>
        </div>
    </div>

    <div wire:loading wire:target="addTeacher">
        <div
            style="display:flex; justify-content:center; align-items:center; background-color:black; position:fixed; left:0px; top:0px; z-index:9999; width: 100%; height: 100%; opacity: 0.75">
            <div class="spinner-border text-danger" role="status">
            </div>
        </div>
    </div>

    <div class="row mt-4 mb-3">
        <div class="col-lg-12">
            <h2 class="font-weight-bold ml-3">Meal Journal</h2>
            <h4 class="font-weight-bold ml-3">{{$date}}</h4>
        </div>
    </div>

    <hr style="background-color: black;">

    <div class="row mt-4">
        <div class="col-lg-4">
            <div class="w-100">
                <div class="form-group">
                    <label for="exampleFormControlSelect1">
                        <h3>Month</h3>
                    </label>
                    <select wire:model.defer="month" class="form-control">
                        <option selected value> -- select an option -- </option>
                        @foreach ($months as $month)
                            <option>{{ $month }}</option>
                        @endforeach
                    </select>
                </div>
                <div class="form-group">
                    <label for="exampleFormControlSelect1">
                        <h3>Year</h3>
                    </label>
                    <select wire:model.defer="year" class="form-control">
                        <option selected value> -- select an option -- </option>
                        @for ($i = 2021; $i <= 2030; $i++)
                            <option>{{ $i }}</option>
                        @endfor
                    </select>
                </div>
            </div>

        </div>
        <div class="col-lg-4">
            <div style="width: 100%;">
                <div class="form-group w-100">
                    <label for="exampleFormControlSelect1">
                        <h3>Teacher</h3>
                    </label>
                    <select wire:model.defer="teacher" class="form-control" id="exampleFormControlSelect1">
                        <option selected value> -- select an option -- </option>
                        @foreach ($teachers as $teacher)
                            <option value="{{ $teacher }}">
                                {{ substr($teacher->name, 0, 1) }}. {{ $teacher->surname }}</option>
                        @endforeach
                    </select>
                </div>
                <button onmouseover="mouseOver(this)" onmouseout="mouseOut(this)" type="button"
                    class="w-100 btn btn-success mt-5" wire:click="getMealRecords">Go</button>
            </div>
        </div>
        <div class="col-lg-4 mt-5">
            <svg class="mx-auto" style="width: 40%;" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512">
                <!-- Font Awesome Free 5.15.3 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license/free (Icons: CC BY 4.0, Fonts: SIL OFL 1.1, Code: MIT License) -->
                <path
                    d="M510.52 255.82c-69.97-.85-126.47-57.69-126.47-127.86-70.17 0-127-56.49-127.86-126.45-27.26-4.14-55.13.3-79.72 12.82l-69.13 35.22a132.221 132.221 0 0 0-57.79 57.81l-35.1 68.88a132.645 132.645 0 0 0-12.82 80.95l12.08 76.27a132.521 132.521 0 0 0 37.16 72.96l54.77 54.76a132.036 132.036 0 0 0 72.71 37.06l76.71 12.15c27.51 4.36 55.7-.11 80.53-12.76l69.13-35.21a132.273 132.273 0 0 0 57.79-57.81l35.1-68.88c12.56-24.64 17.01-52.58 12.91-79.91zM176 368c-17.67 0-32-14.33-32-32s14.33-32 32-32 32 14.33 32 32-14.33 32-32 32zm32-160c-17.67 0-32-14.33-32-32s14.33-32 32-32 32 14.33 32 32-14.33 32-32 32zm160 128c-17.67 0-32-14.33-32-32s14.33-32 32-32 32 14.33 32 32-14.33 32-32 32z" />
            </svg>
        </div>
    </div>

    <hr style="background-color: black;">

    @if ($showMealPlanDates)
        <div class="col-lg-12">
            <div class="row pb-4">
                @foreach ($day as $index => $aDay)
                    <div onmouseover="mouseOverInv(this)" onmouseout="mouseOutInv(this)" class="col-lg-3 p-3 border"
                        data-toggle="modal" data-target="#staticBackdrop{{$index}}">
                        <h1>{{ $index + 1 }}</h1>
                        {{ $aDay }}
                    </div>
                @endforeach
            </div>
        </div>
    @endif

    {{-- Modals --}}
    @foreach ($day as $index => $aDay)
        <div class="modal fade" id="staticBackdrop{{$index}}" data-backdrop="static" data-keyboard="false" tabindex="-1"
            aria-labelledby="staticBackdropLabel" aria-hidden="true"  wire:ignore>
            <div class="modal-dialog modal-dialog-centered modal-xl">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="staticBackdropLabel">Meal Journal</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <div class="col-lg-12">
                            <div class="row">
                                @foreach ($students as $student)
                                    <div class="col-lg-4">
                                        <table class="table table-bordered border-primary">
                                            <thead>
                                                <tr>
                                                    <th colspan="4">{{$aDay}} {{$index + 1}} {{$month}} {{$year}}</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <tr>
                                                    <td>Name: </td>
                                                    <td colspan="3">{{$student->name}}</td>
                                                </tr>
                                                <tr>
                                                    <td></td>
                                                    <td>
                                                        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 496 512"
                                                            class="mx-auto" style="width: 25px; height: auto;">
                                                            <path
                                                                d="M248 8C111 8 0 119 0 256s111 248 248 248 248-111 248-248S385 8 248 8zM112 223.4c3.3-42.1 32.2-71.4 56-71.4s52.7 29.3 56 71.4c.7 8.6-10.8 11.9-14.9 4.5l-9.5-17c-7.7-13.7-19.2-21.6-31.5-21.6s-23.8 7.9-31.5 21.6l-9.5 17c-4.3 7.4-15.8 4-15.1-4.5zm250.8 122.8C334.3 380.4 292.5 400 248 400s-86.3-19.6-114.8-53.8c-13.5-16.3 11-36.7 24.6-20.5 22.4 26.9 55.2 42.2 90.2 42.2s67.8-15.4 90.2-42.2c13.6-16.2 38.1 4.3 24.6 20.5zm6.2-118.3l-9.5-17c-7.7-13.7-19.2-21.6-31.5-21.6s-23.8 7.9-31.5 21.6l-9.5 17c-4.1 7.3-15.6 4-14.9-4.5 3.3-42.1 32.2-71.4 56-71.4s52.7 29.3 56 71.4c.6 8.6-11 11.9-15.1 4.5z" />
                                                        </svg>
                                                    </td>
                                                    <td>
                                                        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 496 512"
                                                            class="mx-auto" style="width: 25px; height: auto;">
                                                            <path
                                                                d="M248 8C111 8 0 119 0 256s111 248 248 248 248-111 248-248S385 8 248 8zm-80 168c17.7 0 32 14.3 32 32s-14.3 32-32 32-32-14.3-32-32 14.3-32 32-32zm176 192H152c-21.2 0-21.2-32 0-32h192c21.2 0 21.2 32 0 32zm-16-128c-17.7 0-32-14.3-32-32s14.3-32 32-32 32 14.3 32 32-14.3 32-32 32z" />
                                                        </svg>
                                                    </td>
                                                    <td>
                                                        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 496 512"
                                                            class="mx-auto" style="width: 25px; height: auto;">
                                                            <path
                                                                d="M248 8C111 8 0 119 0 256s111 248 248 248 248-111 248-248S385 8 248 8zm80 168c17.7 0 32 14.3 32 32s-14.3 32-32 32-32-14.3-32-32 14.3-32 32-32zM152 416c-26.5 0-48-21-48-47 0-20 28.5-60.4 41.6-77.8 3.2-4.3 9.6-4.3 12.8 0C171.5 308.6 200 349 200 369c0 26-21.5 47-48 47zm16-176c-17.7 0-32-14.3-32-32s14.3-32 32-32 32 14.3 32 32-14.3 32-32 32zm170.2 154.2C315.8 367.4 282.9 352 248 352c-21.2 0-21.2-32 0-32 44.4 0 86.3 19.6 114.7 53.8 13.8 16.4-11.2 36.5-24.5 20.4z" />
                                                        </svg>
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td>Breakfast</td>
                                                    <td>
                                                        <div class="row">
                                                            <input class="mx-auto" type="radio" name="{{$student->id}}" wire:click="addMeal(2, {{$index + 1}}, {{$student->id}}, 'breakfast')">
                                                        </div>
                                                    </td>
                                                    <td>
                                                        <div class="row">
                                                            <input class="mx-auto" type="radio" name="{{$student->id}}" wire:click="addMeal(2, {{$index + 1}}, {{$student->id}}, 'breakfast')">
                                                        </div>
                                                    </td>
                                                    <td>
                                                        <div class="row">
                                                            <input class="mx-auto" type="radio" name="" wire:click="addMeal(3, {{$index + 1}}, {{$student->id}}, 'breakfast')">
                                                        </div>
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td>Water</td>
                                                    <td>
                                                        <div class="row">
                                                            <input class="mx-auto" type="radio" name="{{$student->id.'1'}}" wire:click="addMeal(1, {{$index + 1}}, {{$student->id}}, 'water')">
                                                        </div>
                                                    </td>
                                                    <td>
                                                        <div class="row">
                                                            <input class="mx-auto" type="radio" name="{{$student->id.'1'}}"  wire:click="addMeal(2, {{$index + 1}}, {{$student->id}}, 'water')">
                                                        </div>
                                                    </td>
                                                    <td>
                                                        <div class="row">
                                                            <input class="mx-auto" type="radio" name="{{$student->id.'1'}}" wire:click="addMeal(3, {{$index + 1}}, {{$student->id}}, 'water')">
                                                        </div>
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td>Vegetables</td>
                                                    <td>
                                                        <div class="row">
                                                            <input class="mx-auto" type="radio" name="{{$student->id.'2'}}" wire:click="addMeal(1, {{$index + 1}}, {{$student->id}}, 'vegetables')">
                                                        </div>
                                                    </td>
                                                    <td>
                                                        <div class="row">
                                                            <input class="mx-auto" type="radio" name="{{$student->id.'2'}}" wire:click="addMeal(2, {{$index + 1}}, {{$student->id}}, 'vegetables')">
                                                        </div>
                                                    </td>
                                                    <td>
                                                        <div class="row">
                                                            <input class="mx-auto" type="radio" name="{{$student->id.'2'}}" wire:click="addMeal(3, {{$index + 1}}, {{$student->id}}, 'vegetables')">
                                                        </div>
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td>Protein</td>
                                                    <td>
                                                        <div class="row">
                                                            <input class="mx-auto" type="radio" name="{{$student->id.'3'}}" wire:click="addMeal(1, {{$index + 1}}, {{$student->id}}, 'protein')">
                                                        </div>
                                                    </td>
                                                    <td>
                                                        <div class="row">
                                                            <input class="mx-auto" type="radio" name="{{$student->id.'3'}}" wire:click="addMeal(2, {{$index + 1}}, {{$student->id}}, 'protein')">
                                                        </div>
                                                    </td>
                                                    <td>
                                                        <div class="row">
                                                            <input class="mx-auto" type="radio" name="{{$student->id.'3'}}" wire:click="addMeal(3, {{$index + 1}}, {{$student->id}}, 'protein')">
                                                        </div>
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td>Carbohydrate</td>
                                                    <td>
                                                        <div class="row">
                                                            <input class="mx-auto" type="radio" name="{{$student->id.'4'}}" wire:click="addMeal(1, {{$index + 1}}, {{$student->id}}, 'carbohydrate')">
                                                        </div>
                                                    </td>
                                                    <td>
                                                        <div class="row">
                                                            <input class="mx-auto" type="radio" name="{{$student->id.'4'}}" wire:click="addMeal(2, {{$index + 1}}, {{$student->id}}, 'carbohydrate')">
                                                        </div>
                                                    </td>
                                                    <td>
                                                        <div class="row">
                                                            <input class="mx-auto" type="radio" name="{{$student->id.'4'}}" wire:click="addMeal(3, {{$index + 1}}, {{$student->id}}, 'carbohydrate')">
                                                        </div>
                                                    </td>
                                                </tr>
                                            </tbody>
                                        </table>
                                    </div>
                                @endforeach
                            </div>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                        <a class="btn btn-primary" wire:click="exportMeals({{$index + 1}})">Print</a>
                    </div>
                </div>
            </div>
        </div>
    @endforeach

</div>
