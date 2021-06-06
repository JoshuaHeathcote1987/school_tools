<div>

    {{-- A good traveler has no fixed plans and is not intent upon arriving. --}}
    <div class="row mt-3 mr-1">
        <div class="col-lg-12 mr-0 pr-0 float-right">
            <button type="button" class="btn float-right" style="background-color: #c3e6cb;" data-toggle="modal" data-target="#addItemModal">
                <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 448 512" style="width: 25px;"><!-- Font Awesome Free 5.15.3 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license/free (Icons: CC BY 4.0, Fonts: SIL OFL 1.1, Code: MIT License) --><path d="M416 208H272V64c0-17.67-14.33-32-32-32h-32c-17.67 0-32 14.33-32 32v144H32c-17.67 0-32 14.33-32 32v32c0 17.67 14.33 32 32 32h144v144c0 17.67 14.33 32 32 32h32c17.67 0 32-14.33 32-32V304h144c17.67 0 32-14.33 32-32v-32c0-17.67-14.33-32-32-32z"/></svg>
            </button>
        </div>
    </div>

    <div class="row">
        <h2 class="ml-3">A</h2>
    </div>

    <div class="row px-3">
        <div class="col-lg-4 mb-4">
            <div class="row border border-bottom-0 border-right-0 border-danger shadow-sm">
                <button  type="button" onmouseover="mouseOver(this)" onmouseout="mouseOut(this)" class="col-lg-4 border-right border-danger" style="height: 101px; background-color: white;" data-toggle="modal" data-target="#showContentModal" wire:click="setShelfContents('A', 1)">1</button>
                <button  type="button" onmouseover="mouseOver(this)" onmouseout="mouseOut(this)" class="col-lg-4 border-right border-danger" style="height: 101px; background-color: white;" data-toggle="modal" data-target="#showContentModal" wire:click="setShelfContents('A', 2)">2</button>
                <button  type="button" onmouseover="mouseOver(this)" onmouseout="mouseOut(this)" class="col-lg-4 border-right border-danger" style="height: 101px; background-color: white;" data-toggle="modal" data-target="#showContentModal" wire:click="setShelfContents('A', 3)">3</button>
            </div>
            <div class="row border border-right-0 border-danger">
                <button  type="button" onmouseover="mouseOver(this)" onmouseout="mouseOut(this)" class="col-lg-6 border-right border-danger" style="height: 100px; background-color: white;" data-toggle="modal" data-target="#showContentModal" wire:click="setShelfContents('A', 4)">4</button>
                <button  type="button" onmouseover="mouseOver(this)" onmouseout="mouseOut(this)" class="col-lg-6 border-right border-danger" style="height: 100px; background-color: white;" data-toggle="modal" data-target="#showContentModal" wire:click="setShelfContents('A', 5)">5</button> 
            </div>
            <div class="row border border-top-0 border-right-0 border-danger shadow-sm">
                <button  type="button" onmouseover="mouseOver(this)" onmouseout="mouseOut(this)" class="col-lg-4 border-right border-danger" style="height: 100px; background-color: white;" data-toggle="modal" data-target="#showContentModal" wire:click="setShelfContents('A', 6)">6</button>
                <button  type="button" onmouseover="mouseOver(this)" onmouseout="mouseOut(this)" class="col-lg-4 border-right border-danger" style="height: 100px; background-color: white;" data-toggle="modal" data-target="#showContentModal" wire:click="setShelfContents('A', 7)">7</button>
                <button  type="button" onmouseover="mouseOver(this)" onmouseout="mouseOut(this)" class="col-lg-4 border-right border-danger" style="height: 100px; background-color: white;" data-toggle="modal" data-target="#showContentModal" wire:click="setShelfContents('A', 8)">8</button>
            </div>
        </div>
        <div class="col-lg-4 mx-auto mb-4">
            <div class="row border border-bottom-0 border-right-0 border-left-0 border-danger shadow-sm">
                <div class="col-lg-4">
                    <button class="row" onmouseover="mouseOver(this)" onmouseout="mouseOut(this)" style="height: 152px; width: 132%; border-bottom: 1px solid red; border-right: 1px solid red; background-color: white;" data-toggle="modal" data-target="#showContentModal" wire:click="setShelfContents('A', 9)">9</button>
                    <button class="row" onmouseover="mouseOver(this)" onmouseout="mouseOut(this)" style="height: 151px; width: 132%; border-bottom: 1px solid red; border-right: 1px solid red; background-color: white;" data-toggle="modal" data-target="#showContentModal" wire:click="setShelfContents('A', 10)">10</button>
                </div>
                <div class="col-lg-4">
                    <button class="row" onmouseover="mouseOver(this)" onmouseout="mouseOut(this)" style="height: 101px; width: 132%; border-bottom: 1px solid red; border-right: 1px solid red; background-color: white;" data-toggle="modal" data-target="#showContentModal" wire:click="setShelfContents('A', 11)">11</button>
                    <button class="row" onmouseover="mouseOver(this)" onmouseout="mouseOut(this)" style="height: 101px; width: 132%; border-bottom: 1px solid red; border-right: 1px solid red; background-color: white;" data-toggle="modal" data-target="#showContentModal" wire:click="setShelfContents('A', 12)">12</button>
                    <button class="row" onmouseover="mouseOver(this)" onmouseout="mouseOut(this)" style="height: 101px; width: 132%; border-bottom: 1px solid red; border-right: 1px solid red; background-color: white;" data-toggle="modal" data-target="#showContentModal" wire:click="setShelfContents('A', 13)">13</button>
                </div>
                <div class="col-lg-4">
                    <button class="row" onmouseover="mouseOver(this)" onmouseout="mouseOut(this)" style="height: 152px; width: 133%; border-bottom: 1px solid red; border-right: 1px solid red; background-color: white;" data-toggle="modal" data-target="#showContentModal" wire:click="setShelfContents('A', 14)">14</button>
                    <button class="row" onmouseover="mouseOver(this)" onmouseout="mouseOut(this)" style="height: 151px; width: 133%; border-bottom: 1px solid red; border-right: 1px solid red; background-color: white;" data-toggle="modal" data-target="#showContentModal" wire:click="setShelfContents('A', 15)">15</button>
                </div>
            </div>
        </div>
        <div class="col-lg-4 mx-auto mb-4">
            <div class="row border border-bottom-0 border-right-0 border-left-0 border-danger shadow-sm">
                <div class="col-lg-4">
                    <button class="row" onmouseover="mouseOver(this)" onmouseout="mouseOut(this)" style="height: 152px; width: 132%; border-bottom: 1px solid red; border-right: 1px solid red; background-color: white;" data-toggle="modal" data-target="#showContentModal(1)" data-toggle="modal" data-target="#showContentModal" wire:click="setShelfContents('A', 16)">16</button>
                    <button class="row" onmouseover="mouseOver(this)" onmouseout="mouseOut(this)" style="height: 151px; width: 132%; border-bottom: 1px solid red; border-right: 1px solid red; background-color: white;" data-toggle="modal" data-target="#showContentModal(17)">17</button>
                </div>
                <div class="col-lg-4">
                    <button class="row" onmouseover="mouseOver(this)" onmouseout="mouseOut(this)" style="height: 101px; width: 132%; border-bottom: 1px solid red; border-right: 1px solid red; background-color: white;" data-toggle="modal" data-target="#showContentModal" wire:click="setShelfContents('A', 18)">18</button>
                    <button class="row" onmouseover="mouseOver(this)" onmouseout="mouseOut(this)" style="height: 101px; width: 132%; border-bottom: 1px solid red; border-right: 1px solid red; background-color: white;" data-toggle="modal" data-target="#showContentModal" wire:click="setShelfContents('A', 19)">19</button>
                    <button class="row" onmouseover="mouseOver(this)" onmouseout="mouseOut(this)" style="height: 101px; width: 132%; border-bottom: 1px solid red; border-right: 1px solid red; background-color: white;" data-toggle="modal" data-target="#showContentModal" wire:click="setShelfContents('A', 20)">20</button>
                </div>
                <div class="col-lg-4">
                    <button class="row" onmouseover="mouseOver(this)" onmouseout="mouseOut(this)" style="height: 152px; width: 133%; border-bottom: 1px solid red; border-right: 1px solid red; background-color: white;" data-toggle="modal" data-target="#showContentModal" wire:click="setShelfContents('A', 21)">21</button>
                    <button class="row" onmouseover="mouseOver(this)" onmouseout="mouseOut(this)" style="height: 151px; width: 133%; border-bottom: 1px solid red; border-right: 1px solid red; background-color: white;" data-toggle="modal" data-target="#showContentModal" wire:click="setShelfContents('A', 22)">22</button>
                </div>
            </div>
        </div>
    </div>

    <div class="row">
        <table class="table table-hover border-right border-left border-bottom mx-3">
            <tr class="table-danger">
                <th scope="col">#</th>
                <th scope="col">Name</th>
                <th scope="col">Location</th>
                <th scope="col">Amount</th>
                <th scope="col">Image</th>
            </tr>
            </thead>
            <tbody>
              <tr>
                <th scope="row">1</th>
                <td>Mark</td>
                <td>Otto</td>
                <td>@mdo</td>
                <td>@mdo</td>
              </tr>
              <tr>
                <th scope="row">2</th>
                <td>Jacob</td>
                <td>Thornton</td>
                <td>@fat</td>
                <td>@mdo</td>
              </tr>
              <tr>
                <th scope="row">3</th>
                <td>Larry the Bird</td>
                <td>@twitter</td>
                <td>@mdo</td>
                <td>@mdo</td>
              </tr>
            </tbody>
        </table>
    </div>

    {{-- Modals --}}
    <form autocomplete="off">
        <div class="modal fade" id="showContentModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true" wire:ignore.self>
            <div class="modal-dialog modal-lg">
                <div class="modal-content">
                    <div class="modal-header" style="background-color: #bee5eb; border-bottom: 1px solid #404040;">
                        <h5 class="modal-title" id="exampleModalLabel">{{$shelfLetter}}{{$shelfNum}}</h5>
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

    <form autocomplete="off">
        <div class="modal fade" id="addItemModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog modal-dialog">
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
                                <label for="" class="col-sm-2 col-form-label text-right">Name</label>
                            </div>
                            <div class="col-lg-9">
                                <input type="text" class="form-control" wire:model.defer="itemName">
                            </div>
                        </div>
                        <div class="form-group row">
                            <div class="col-lg-3">
                                <label for="" class="col-sm-2 col-form-label text-right">Amount</label>
                            </div>
                            <div class="col-lg-9">
                                <input type="text" class="form-control" wire:model.defer="itemAmount">
                            </div>
                        </div>
                        <div class="form-group row">
                            <div class="col-lg-3">
                                <label for="" class="col-sm-2 col-form-label text-right">Letter</label>
                            </div>
                            <div class="col-lg-9">
                                <select class="form-control" id="exampleFormControlSelect2">
                                    <option>A</option>
                                    <option>B</option>
                                    <option>C</option>
                                </select>
                            </div>
                        </div>
                        <div class="form-group row">
                            <div class="col-lg-3">
                                <label for="" class="col-sm-2 col-form-label text-right">Number</label>
                            </div>
                            <div class="col-lg-9">
                                <select class="form-control" id="exampleFormControlSelect2">
                                    <option>1</option>
                                    <option>2</option>
                                    <option>3</option>
                                    <option>4</option>
                                    <option>5</option>
                                    <option>6</option>
                                    <option>7</option>
                                    <option>8</option>
                                    <option>9</option>
                                    <option>10</option>
                                    <option>11</option>
                                    <option>12</option>
                                    <option>13</option>
                                    <option>14</option>
                                    <option>15</option>
                                    <option>16</option>
                                    <option>17</option>
                                    <option>18</option>
                                </select>
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

</div>

<script>
    function mouseOver(x) {
        x.style.background  = "#f5c6cb";
    }
    function mouseOut(x) {
        x.style.background  = "white";
    }
</script>