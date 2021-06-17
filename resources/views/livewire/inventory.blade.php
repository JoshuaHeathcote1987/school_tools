<div>

    {{-- A good traveler has no fixed plans and is not intent upon arriving. --}}
    <div class="row mt-3 mr-1 mb-3">
        <div class="col-lg-12 mb-3">
            <div class="row">
                <div class="form-inline col-lg-4">
                    <input class="form-control mr-sm-2" type="search" placeholder="Search" aria-label="Search">
                    <button class="btn btn-outline-success my-2 my-sm-0" type="submit">Search</button>
                </div>
            </div>
        </div>
        <div class="col-lg-12 mr-0 pr-0">
            <button type="button" class="btn" style="width: 5%; height: auto; background-color:#ab6363; border: 1px solid black;  height: 100%;">A</button>
            <button type="button" class="btn" style="width: 5%; height: auto; background-color:#aba463; border: 1px solid black;  height: 100%;">B</button>
            <button type="button" class="btn" style="width: 5%; height: auto; background-color:#ab63ab; border: 1px solid black;  height: 100%;">C</button>
            <button type="button" class="btn float-right" style="background-color:#63ab87; border: 1px solid black;" data-toggle="modal" data-target="#addItemModal">
                <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 448 512" class="mx-auto" style="width: 25px;"><!-- Font Awesome Free 5.15.3 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license/free (Icons: CC BY 4.0, Fonts: SIL OFL 1.1, Code: MIT License) --><path d="M416 208H272V64c0-17.67-14.33-32-32-32h-32c-17.67 0-32 14.33-32 32v144H32c-17.67 0-32 14.33-32 32v32c0 17.67 14.33 32 32 32h144v144c0 17.67 14.33 32 32 32h32c17.67 0 32-14.33 32-32V304h144c17.67 0 32-14.33 32-32v-32c0-17.67-14.33-32-32-32z"/></svg>
            </button>

        </div>
    </div>

    <div class="row px-3">
        <h1>A</h1>
    </div>
    
    <div class="row px-3">
        <div class="col-lg-4 mb-4">
            <div class="row border border-bottom-0 border-right-0 border-danger shadow-sm">
                <button  type="button" onmouseover="mouseOver(this)" onmouseout="mouseOut(this)" class="col-lg-4 border-right border-danger" style="height: 100px; background-color: white;" data-toggle="modal" data-target="#showContentModal" wire:click="setShelfContents('A', 1)">1</button>
                <button  type="button" onmouseover="mouseOver(this)" onmouseout="mouseOut(this)" class="col-lg-4 border-right border-danger" style="height: 100px; background-color: white;" data-toggle="modal" data-target="#showContentModal" wire:click="setShelfContents('A', 2)">2</button>
                <button  type="button" onmouseover="mouseOver(this)" onmouseout="mouseOut(this)" class="col-lg-4 border-right border-danger" style="height: 100px; background-color: white;" data-toggle="modal" data-target="#showContentModal" wire:click="setShelfContents('A', 3)">3</button>
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
                <div class="col-lg-4 px-0">
                    <button onmouseover="mouseOver(this)" onmouseout="mouseOut(this)" style="height: 152px; width: 100%; border-bottom: 1px solid red; border-right: 1px solid red; background-color: white;" data-toggle="modal" data-target="#showContentModal" wire:click="setShelfContents('A', 9)">9</button>
                    <button onmouseover="mouseOver(this)" onmouseout="mouseOut(this)" style="height: 151px; width: 100%; border-bottom: 1px solid red; border-right: 1px solid red; background-color: white;" data-toggle="modal" data-target="#showContentModal" wire:click="setShelfContents('A', 10)">10</button>
                </div>
                <div class="col-lg-4 px-0">
                    <button onmouseover="mouseOver(this)" onmouseout="mouseOut(this)" style="height: 101px; width: 100%; border-bottom: 1px solid red; border-right: 1px solid red; background-color: white;" data-toggle="modal" data-target="#showContentModal" wire:click="setShelfContents('A', 11)">11</button>
                    <button onmouseover="mouseOver(this)" onmouseout="mouseOut(this)" style="height: 101px; width: 100%; border-bottom: 1px solid red; border-right: 1px solid red; background-color: white;" data-toggle="modal" data-target="#showContentModal" wire:click="setShelfContents('A', 12)">12</button>
                    <button onmouseover="mouseOver(this)" onmouseout="mouseOut(this)" style="height: 101px; width: 100%; border-bottom: 1px solid red; border-right: 1px solid red; background-color: white;" data-toggle="modal" data-target="#showContentModal" wire:click="setShelfContents('A', 13)">13</button>
                </div>
                <div class="col-lg-4 px-0">
                    <button onmouseover="mouseOver(this)" onmouseout="mouseOut(this)" style="height: 152px; width: 100%; border-bottom: 1px solid red; border-right: 1px solid red; background-color: white;" data-toggle="modal" data-target="#showContentModal" wire:click="setShelfContents('A', 14)">14</button>
                    <button onmouseover="mouseOver(this)" onmouseout="mouseOut(this)" style="height: 151px; width: 100%; border-bottom: 1px solid red; border-right: 1px solid red; background-color: white;" data-toggle="modal" data-target="#showContentModal" wire:click="setShelfContents('A', 15)">15</button>
                </div>
            </div>
        </div>
        <div class="col-lg-4 mx-auto mb-4">
            <div class="row border border-bottom-0 border-right-0 border-left-0 border-danger shadow-sm">
                <div class="col-lg-4 px-0">
                    <button onmouseover="mouseOver(this)" onmouseout="mouseOut(this)" style="height: 152px; width: 100%; border-bottom: 1px solid red; border-right: 1px solid red; background-color: white;" data-toggle="modal" data-target="#showContentModal" wire:click="setShelfContents('A', 16)">16</button>
                    <button onmouseover="mouseOver(this)" onmouseout="mouseOut(this)" style="height: 151px; width: 100%; border-bottom: 1px solid red; border-right: 1px solid red; background-color: white;" data-toggle="modal" data-target="#showContentModal" wire:click="setShelfContents('A', 17)">17</button>
                </div>
                <div class="col-lg-4 px-0">
                    <button onmouseover="mouseOver(this)" onmouseout="mouseOut(this)" style="height: 101px; width: 100%; border-bottom: 1px solid red; border-right: 1px solid red; background-color: white;" data-toggle="modal" data-target="#showContentModal" wire:click="setShelfContents('A', 18)">18</button>
                    <button onmouseover="mouseOver(this)" onmouseout="mouseOut(this)" style="height: 101px; width: 100%; border-bottom: 1px solid red; border-right: 1px solid red; background-color: white;" data-toggle="modal" data-target="#showContentModal" wire:click="setShelfContents('A', 19)">19</button>
                    <button onmouseover="mouseOver(this)" onmouseout="mouseOut(this)" style="height: 101px; width: 100%; border-bottom: 1px solid red; border-right: 1px solid red; background-color: white;" data-toggle="modal" data-target="#showContentModal" wire:click="setShelfContents('A', 20)">20</button>
                </div>
                <div class="col-lg-4 px-0">
                    <button onmouseover="mouseOver(this)" onmouseout="mouseOut(this)" style="height: 152px; width: 100%; border-bottom: 1px solid red; border-right: 1px solid red; background-color: white;" data-toggle="modal" data-target="#showContentModal" wire:click="setShelfContents('A', 21)">21</button>
                    <button onmouseover="mouseOver(this)" onmouseout="mouseOut(this)" style="height: 151px; width: 100%; border-bottom: 1px solid red; border-right: 1px solid red; background-color: white;" data-toggle="modal" data-target="#showContentModal" wire:click="setShelfContents('A', 22)">22</button>
                </div>
            </div>
        </div>
    </div>

    <div class="row px-3">
        <h1>B</h1>
    </div>

    <div class="row px-3">
        <div class="col-lg-4 mx-auto mb-4">
            <div class="row border border-danger shadow-sm">
                <div class="col-lg-6 px-0">
                    <button onmouseover="mouseOver(this)" onmouseout="mouseOut(this)" style="height: 152px; width: 100%; border-bottom: 1px solid red; border-right: 1px solid red; background-color: white;" data-toggle="modal" data-target="#showContentModal" wire:click="setShelfContents('A', 1)">1</button>
                    <button onmouseover="mouseOver(this)" onmouseout="mouseOut(this)" style="height: 151px; width: 100%; border-right: 1px solid red; background-color: white;" data-toggle="modal" data-target="#showContentModal" wire:click="setShelfContents('A', 2)">2</button>
                </div>
                <div class="col-lg-6 px-0">
                    <button onmouseover="mouseOver(this)" onmouseout="mouseOut(this)" style="height: 152px; width: 100%; border-bottom: 1px solid red;  background-color: white;" data-toggle="modal" data-target="#showContentModal" wire:click="setShelfContents('A', 3)">3</button>
                    <button onmouseover="mouseOver(this)" onmouseout="mouseOut(this)" style="height: 151px; width: 100%; background-color: white;" data-toggle="modal" data-target="#showContentModal" wire:click="setShelfContents('A', 4)">4</button>
                </div>
            </div>
        </div>
        <div class="col-lg-4 mb-4">
            <div class="row border border-bottom-0 border-right-0 border-left-0 border-danger shadow-sm">
                <button  type="button" onmouseover="mouseOver(this)" onmouseout="mouseOut(this)" class="col-lg-6 border-right border-danger" style="height: 100px; background-color: white;" data-toggle="modal" data-target="#showContentModal" wire:click="setShelfContents('A', 5)">5</button>
                <button  type="button" onmouseover="mouseOver(this)" onmouseout="mouseOut(this)" class="col-lg-6 border-right border-danger" style="height: 100px; background-color: white;" data-toggle="modal" data-target="#showContentModal" wire:click="setShelfContents('A', 6)">6</button> 
            </div>
            <div class="row border border-right-0 border-left-0 border-danger">
                <button  type="button" onmouseover="mouseOver(this)" onmouseout="mouseOut(this)" class="col-lg-4 border-right border-danger" style="height: 100px; background-color: white;" data-toggle="modal" data-target="#showContentModal" wire:click="setShelfContents('A', 7)">7</button>
                <button  type="button" onmouseover="mouseOver(this)" onmouseout="mouseOut(this)" class="col-lg-4 border-right border-danger" style="height: 100px; background-color: white;" data-toggle="modal" data-target="#showContentModal" wire:click="setShelfContents('A', 8)">8</button>
                <button  type="button" onmouseover="mouseOver(this)" onmouseout="mouseOut(this)" class="col-lg-4 border-right border-danger" style="height: 100px; background-color: white;" data-toggle="modal" data-target="#showContentModal" wire:click="setShelfContents('A', 9)">9</button>
            </div>
            <div class="row border border-top-0 border-right-0 border-left-0 border-danger shadow-sm">
                <button  type="button" onmouseover="mouseOver(this)" onmouseout="mouseOut(this)" class="col-lg-6 border-right border-danger" style="height: 100px; background-color: white;" data-toggle="modal" data-target="#showContentModal" wire:click="setShelfContents('A', 10)">10</button>
                <button  type="button" onmouseover="mouseOver(this)" onmouseout="mouseOut(this)" class="col-lg-6 border-right border-danger" style="height: 100px; background-color: white;" data-toggle="modal" data-target="#showContentModal" wire:click="setShelfContents('A', 11)">11</button> 
            </div>
        </div>
        <div class="col-lg-4 mb-4">
            <div class="row border border-bottom-0 border-right-0 border-left-0 border-danger shadow-sm">
                <button  type="button" onmouseover="mouseOver(this)" onmouseout="mouseOut(this)" class="col-lg-4 border-right border-danger" style="height: 100px; background-color: white;" data-toggle="modal" data-target="#showContentModal" wire:click="setShelfContents('A', 12)">12</button>
                <button  type="button" onmouseover="mouseOver(this)" onmouseout="mouseOut(this)" class="col-lg-4 border-right border-danger" style="height: 100px; background-color: white;" data-toggle="modal" data-target="#showContentModal" wire:click="setShelfContents('A', 13)">13</button>
                <button  type="button" onmouseover="mouseOver(this)" onmouseout="mouseOut(this)" class="col-lg-4 border-right border-danger" style="height: 100px; background-color: white;" data-toggle="modal" data-target="#showContentModal" wire:click="setShelfContents('A', 14)">14</button>
            </div>
            <div class="row border border-right-0 border-left-0 border-danger">
                <button  type="button" onmouseover="mouseOver(this)" onmouseout="mouseOut(this)" class="col-lg-6 border-right border-danger" style="height: 100px; background-color: white;" data-toggle="modal" data-target="#showContentModal" wire:click="setShelfContents('A', 15)">15</button>
                <button  type="button" onmouseover="mouseOver(this)" onmouseout="mouseOut(this)" class="col-lg-6 border-right border-danger" style="height: 100px; background-color: white;" data-toggle="modal" data-target="#showContentModal" wire:click="setShelfContents('A', 16)">16</button> 
            </div>
            <div class="row border border-top-0 border-right-0 border-left-0 border-danger shadow-sm">
                <button  type="button" onmouseover="mouseOver(this)" onmouseout="mouseOut(this)" class="col-lg-4 border-right border-danger" style="height: 100px; background-color: white;" data-toggle="modal" data-target="#showContentModal" wire:click="setShelfContents('A', 17)">17</button>
                <button  type="button" onmouseover="mouseOver(this)" onmouseout="mouseOut(this)" class="col-lg-4 border-right border-danger" style="height: 100px; background-color: white;" data-toggle="modal" data-target="#showContentModal" wire:click="setShelfContents('A', 18)">18</button>
                <button  type="button" onmouseover="mouseOver(this)" onmouseout="mouseOut(this)" class="col-lg-4 border-right border-danger" style="height: 100px; background-color: white;" data-toggle="modal" data-target="#showContentModal" wire:click="setShelfContents('A', 19)">19</button>
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
                @foreach($itemsA as $item)
                    <tr>
                        <th scope="row">{{$item->id}}</th>
                        <td>{{$item->name}}</td>
                        <td>{{$item->shelf_sec}}{{$item->shelf_num}}</td>
                        <td>{{$item->amount}}</td>
                        <td>{{$item->img}}</td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>

    {{-- Modals --}}
    {{-- Shelf Contents --}}
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
                            <th scope="col">Control</th>
                            <th scope="col">Image</th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($itemsSpecific as $index => $item)
                            <tr>
                                <th scope="row">{{$item->id}}</th>
                                <td>{{$item->name}}</td>
                                <td>{{$modalItems[$index][1]}}</td>
                                <td>
                                    <button type="button" class="btn btn-outline-danger" wire:click="decreaseAmount('{{$index}}')">-</button>
                                    <button type="button" class="btn btn-outline-success" wire:click="increaseAmount('{{$index}}')">+</button>
                                </td>
                                <td>
                                    <button type="button" class="btn btn-outline-info">?</button>
                                </td>
                            </tr>
                        @endforeach
                        </tbody>
                    </table>
            
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                        <button type="button" class="btn btn-primary" data-dismiss="modal" wire:click="saveModal('{{$shelfLetter}}', '{{$shelfNum}}')">Save changes</button>
                    </div>
                </div>
            </div>
        </div>                                                                                          
    </form>

    {{-- Add Item --}}
    <form autocomplete="off" enctype="multipart/form-data">
        <div class="modal fade" id="addItemModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true" wire:ignore.self>
            <div class="modal-dialog modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">Add Item</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <div class="form-group row">
                            <div class="col-lg-4">
                                <label for="" class="col-sm-2 col-form-label text-right">Name</label>
                            </div>
                            <div class="col-lg-8">
                                <input type="text" class="form-control" wire:model.defer="itemName">
                            </div>
                        </div>
                        <div class="form-group row">
                            <div class="col-lg-4">
                                <label for="" class="col-sm-2 col-form-label text-right">Amount</label>
                            </div>
                            <div class="col-lg-8">
                                <input type="number" class="form-control" wire:model.defer="itemAmount">
                            </div>
                        </div>
                        <div class="form-group row">
                            <div class="col-lg-4">
                                <label for="" class="col-sm-2 col-form-label text-right">Section</label>
                            </div>
                            <div class="col-lg-4">
                                <select class="form-control" id="exampleFormControlSelect2" wire:model.defer="itemLetter">
                                    <option value="A">A</option>
                                    <option value="B">B</option>
                                    <option value="C">C</option>
                                </select>
                            </div>
                            <div class="col-lg-4">
                                <select class="form-control" id="exampleFormControlSelect2" wire:model.defer="itemNumber">
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
                        <div class="form-group row">
                            <div class="col-lg-4">
                                <label for="" class="col-sm-2 col-form-label text-right">Image</label>
                            </div>
                            <div class="col-lg-8">
                                <div class="custom-file">
                                    <input type="file" class="custom-file-input" id="custom-file-input" wire:model="photo">
                                    <label class="custom-file-label" for="customFile">Choose file</label>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-primary" data-dismiss="modal" wire:click="addItem">Save changes</button>
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