{{-- <form autocomplete="off">
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
                            <select wire:model.defer="studentSelected" class="form-control">
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
</form> --}}