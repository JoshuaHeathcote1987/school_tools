<form autocomplete="off">
    <div class="modal fade" id="teacherAddModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true" wire:ignore.self>
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

                    <h4 class="text-center">Choose your class Mascott...</h4>
                    <div class="alert alert-dark mt-3 mx-2 overflow-auto" style="height: 300px;" role="">
                        <div class="row">
                            @foreach($imageArray as $image)
                                <div class="col-lg-4">
                                    <label>
                                        <input type="radio" name="product" class="card-input-element" />
                                        <img wire:click="setImageMascott('{{$image}}')" class="img-thumbnail card-input" src="{{asset('storage/'.$image)}}" alt="" srcset="">
                                    </label>
                                </div>
                            @endforeach
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