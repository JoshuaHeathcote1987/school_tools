<div>
    {{-- In work, do what you enjoy. --}}
    {{-- Modals --}}
    <form autocomplete="off">
        <div class="modal fade" id="showContentModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog modal-lg">
                <div class="modal-content">
                    <div class="modal-header" style="background-color: #bee5eb; border-bottom: 1px solid #404040;">
                        <h5 class="modal-title" id="exampleModalLabel">A{{$shelfNum}}</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>

                    <table class="modal-body table table-hover">
                        <thead>
                        <tr>
                            <th scope="col">#</th>
                            <th scope="col">Name</th>
                            <th scope="col">Amount</th>
                            <th scope="col">Controls</th>
                            <th scope="col">Image</th>
                        </tr>
                        </thead>
                        <tbody>
                        <tr>
                            <th scope="row">1</th>
                            <td>Paint - Red</td>
                            <td>2</td>
                            <td>
                                <button type="button" class="btn btn-outline-danger">-</button>
                                <button type="button" class="btn btn-outline-success">+</button> 
                            </td>
                            <td>
                                <button type="button" class="btn btn-outline-info">?</button>
                            </td>
                        </tr>
                        <tr>
                            <th scope="row">2</th>
                            <td>Paint - Blue</td>
                            <td>3</td>
                            <td>
                                <button type="button" class="btn btn-outline-danger">-</button>
                                <button type="button" class="btn btn-outline-success">+</button> 
                            </td>
                            <td>
                                <button type="button" class="btn btn-outline-info">?</button>
                            </td>
                        </tr>
                        <tr>
                            <th scope="row">3</th>
                            <td>Paint - Yellow</td>
                            <td>6</td>
                            <td>
                                <button type="button" class="btn btn-outline-danger">-</button>
                                <button type="button" class="btn btn-outline-success">+</button> 
                            </td>
                            <td>
                                <button type="button" class="btn btn-outline-info">?</button>
                            </td>
                        </tr>
                        </tbody>
                    </table>
            
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                        <button type="button" class="btn btn-primary" wire:click="">Save changes</button>
                    </div>
                </div>
            </div>
        </div>                                                                                          
    </form>
</div>
