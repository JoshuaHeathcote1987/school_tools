<div>

    {{-- A good traveler has no fixed plans and is not intent upon arriving. --}}
    <div class="row mt-3 mr-1">
        <div class="col-lg-12 mr-0 pr-0 float-right">
            <button type="button" class="btn btn-primary float-right"><i class='far fa-plus-square'></i></button>
        </div>
    </div>

    <div class="row">
        <h2 class="ml-3">A</h2>
    </div>

    <div class="row px-3">
        <div class="col-lg-6 mx-auto mb-4">
            <div class="row border border-bottom-0 border-right-0 border-danger shadow-sm">
                <button type="button" onmouseover="mouseOver(this)" onmouseout="mouseOut(this)" class="col-lg-4 border-right border-danger text-center" style="height: 100px;" data-toggle="modal" data-target="#showContentModal">1</button>
                <button onmouseover="mouseOver(this)" onmouseout="mouseOut(this)" class="col-lg-4 border-right border-danger text-center" style="height: 100px;">2</button>
                <button onmouseover="mouseOver(this)" onmouseout="mouseOut(this)" class="col-lg-4 text-center" style="height: 100px;">3</button>
            </div>
            <div class="row border border-right-0 border-danger">
                <button onmouseover="mouseOver(this)" onmouseout="mouseOut(this)" class="col-lg-6 border-right border-danger text-center" style="height: 100px;"><span>4</span></button>
                <button onmouseover="mouseOver(this)" onmouseout="mouseOut(this)" class="col-lg-6 text-center" style="height: 100px;">5</button> 
            </div>
            <div class="row border border-top-0 border-right-0 border-danger shadow-sm">
                <button onmouseover="mouseOver(this)" onmouseout="mouseOut(this)" class="col-lg-4 border-right border-danger text-center" style="height: 100px; ">7</button>
                <button onmouseover="mouseOver(this)" onmouseout="mouseOut(this)" class="col-lg-4 border-right border-danger text-center" style="height: 100px;">8</button>
                <button onmouseover="mouseOver(this)" onmouseout="mouseOut(this)" class="col-lg-4 text-center" style="height: 100px;">9</button>
            </div>
        </div>

        <div class="col-lg-6 mx-auto mb-4">
            <div class="row border border-bottom-0 border-right-0 border-danger shadow-sm">
                <button onmouseover="mouseOver(this)" onmouseout="mouseOut(this)" class="col-lg-4 border-right border-danger text-center" style="height: 100px;">10</button>
                <button onmouseover="mouseOver(this)" onmouseout="mouseOut(this)" class="col-lg-4 border-right border-danger text-center" style="height: 100px;">11</button>
                <button onmouseover="mouseOver(this)" onmouseout="mouseOut(this)" class="col-lg-4 border-right border-danger text-center" style="height: 100px;">12</button>
            </div>
            <div class="row border border-right-0 border-danger">
                <button onmouseover="mouseOver(this)" onmouseout="mouseOut(this)" class="col-lg-6 border-right border-danger text-center" style="height: 100px;">13</button>
                <button onmouseover="mouseOver(this)" onmouseout="mouseOut(this)" class="col-lg-6 border-right border-danger text-center" style="height: 100px;">14</button> 
            </div>
            <div class="row border border-top-0 border-right-0 border-danger shadow-sm">
                <button onmouseover="mouseOver(this)" onmouseout="mouseOut(this)" class="col-lg-4 border-right border-danger text-center align-middle" style="height: 100px;">15</button>
                <button onmouseover="mouseOver(this)" onmouseout="mouseOut(this)" class="col-lg-4 border-right border-danger text-center align-middle" style="height: 100px;">16</button>
                <button onmouseover="mouseOver(this)" onmouseout="mouseOut(this)" class="col-lg-4 border-right border-danger text-center align-middle" style="height: 100px;">17</button>
            </div>
        </div>
    </div>

    <div class="row">
        <table class="table table-hover border-right border-left border-bottom mx-3">
            <thead>
              <tr class="table-primary">
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

    <form autocomplete="off">
        <div class="modal fade" id="showContentModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog modal-lg">
                <div class="modal-content">
                    <div class="modal-header" style="background-color: #bee5eb; border-bottom: 1px solid #404040;">
                        <h5 class="modal-title" id="exampleModalLabel">A1</h5>
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
                                <td>+ -</td>
                                <td>+</td>
                              </tr>
                              <tr>
                                <th scope="row">2</th>
                                <td>Paint - Blue</td>
                                <td>3</td>
                                <td>+ -</td>
                                <td>+</td>
                              </tr>
                              <tr>
                                <th scope="row">3</th>
                                <td>Paint - Yellow</td>
                                <td>6</td>
                                <td>+ -</td>
                                <td>+</td>
                              </tr>
                            </tbody>
                        </table>
              
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                        <button type="button" class="btn btn-primary" data-dismiss="modal" wire:click="">Save changes</button>
                    </div>
                </div>
            </div>
        </div>                                                                                          
    </form>

</div>

<script>
    function mouseOver(x) {
        x.style.background  = "#f5c6cb";
    }
    function mouseOut(x) {
        x.style.background  = "white";
    }
</script>