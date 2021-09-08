<form autocomplete="off">
    <div class="modal fade" id="studentAddModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true" wire:ignore.self>
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
                                <label class="custom-file-label" for="customFile" wire:ignore>Choose file</label>
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