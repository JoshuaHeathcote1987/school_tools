<div>

    {{-- A good traveler has no fixed plans and is not intent upon arriving. --}}

    {{-- Code into it so that when a letter is selection on the modal screen of add item, that the selection will change the shelf number IMPORTANT --}}
    <div class="row mr-1 mt-3 px-0"> 
        <button wire:click="flipFlopDisplay('table')" onmouseover="mouseOver(this)" onmouseout="mouseOut(this)" style="background-color:white;">
            <svg class="ml-3" style="width: 5%;" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 640 512"><!-- Font Awesome Free 5.15.3 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license/free (Icons: CC BY 4.0, Fonts: SIL OFL 1.1, Code: MIT License) --><path d="M149.333 56v80c0 13.255-10.745 24-24 24H24c-13.255 0-24-10.745-24-24V56c0-13.255 10.745-24 24-24h101.333c13.255 0 24 10.745 24 24zm181.334 240v-80c0-13.255-10.745-24-24-24H205.333c-13.255 0-24 10.745-24 24v80c0 13.255 10.745 24 24 24h101.333c13.256 0 24.001-10.745 24.001-24zm32-240v80c0 13.255 10.745 24 24 24H488c13.255 0 24-10.745 24-24V56c0-13.255-10.745-24-24-24H386.667c-13.255 0-24 10.745-24 24zm-32 80V56c0-13.255-10.745-24-24-24H205.333c-13.255 0-24 10.745-24 24v80c0 13.255 10.745 24 24 24h101.333c13.256 0 24.001-10.745 24.001-24zm-205.334 56H24c-13.255 0-24 10.745-24 24v80c0 13.255 10.745 24 24 24h101.333c13.255 0 24-10.745 24-24v-80c0-13.255-10.745-24-24-24zM0 376v80c0 13.255 10.745 24 24 24h101.333c13.255 0 24-10.745 24-24v-80c0-13.255-10.745-24-24-24H24c-13.255 0-24 10.745-24 24zm386.667-56H488c13.255 0 24-10.745 24-24v-80c0-13.255-10.745-24-24-24H386.667c-13.255 0-24 10.745-24 24v80c0 13.255 10.745 24 24 24zm0 160H488c13.255 0 24-10.745 24-24v-80c0-13.255-10.745-24-24-24H386.667c-13.255 0-24 10.745-24 24v80c0 13.255 10.745 24 24 24zM181.333 376v80c0 13.255 10.745 24 24 24h101.333c13.255 0 24-10.745 24-24v-80c0-13.255-10.745-24-24-24H205.333c-13.255 0-24 10.745-24 24z"/></svg>
        </button>
    </div>

    <hr style="background-color: black;">

    @if($flipFlopTable)

    <div class="row px-3">
        <h1>A</h1>
    </div>

    <div class="row px-3">
        <div class="col-lg-4 mb-4">
            <div class="row border border-bottom-0 border-right-0 border-left border-primary shadow">
                <button  type="button" onmouseover="mouseOverInv(this)" onmouseout="mouseOutInv(this)" class="col-lg-6 border-right border-primary" style="height: 100px; background-color: white;" data-toggle="modal" data-target="#showContentModal" wire:click="setShelfContents('A', 1)">1</button>
                <button  type="button" onmouseover="mouseOverInv(this)" onmouseout="mouseOutInv(this)" class="col-lg-6 border-right border-primary" style="height: 100px; background-color: white;" data-toggle="modal" data-target="#showContentModal" wire:click="setShelfContents('A', 2)">2</button> 
            </div>
            <div class="row border border-right-0 border-left border-primary">
                <button  type="button" onmouseover="mouseOverInv(this)" onmouseout="mouseOutInv(this)" class="col-lg-4 border-right border-primary" style="height: 100px; background-color: white;" data-toggle="modal" data-target="#showContentModal" wire:click="setShelfContents('A', 3)">3</button>
                <button  type="button" onmouseover="mouseOverInv(this)" onmouseout="mouseOutInv(this)" class="col-lg-4 border-right border-primary" style="height: 100px; background-color: white;" data-toggle="modal" data-target="#showContentModal" wire:click="setShelfContents('A', 4)">4</button>
                <button  type="button" onmouseover="mouseOverInv(this)" onmouseout="mouseOutInv(this)" class="col-lg-4 border-right border-primary" style="height: 100px; background-color: white;" data-toggle="modal" data-target="#showContentModal" wire:click="setShelfContents('A', 5)">5</button>
            </div>
            <div class="row border border-top-0 border-right-0 border-left border-primary shadow">
                <button  type="button" onmouseover="mouseOverInv(this)" onmouseout="mouseOutInv(this)" class="col-lg-6 border-right border-primary" style="height: 100px; background-color: white;" data-toggle="modal" data-target="#showContentModal" wire:click="setShelfContents('A', 6)">6</button>
                <button  type="button" onmouseover="mouseOverInv(this)" onmouseout="mouseOutInv(this)" class="col-lg-6 border-right border-primary" style="height: 100px; background-color: white;" data-toggle="modal" data-target="#showContentModal" wire:click="setShelfContents('A', 7)">7</button> 
            </div>
        </div>
        <div class="col-lg-4 mb-4">
            <div class="row border border-bottom-0 border-right-0 border-left-0 border-primary shadow">
                <button  type="button" onmouseover="mouseOverInv(this)" onmouseout="mouseOutInv(this)" class="col-lg-6 border-right border-primary" style="height: 100px; background-color: white;" data-toggle="modal" data-target="#showContentModal" wire:click="setShelfContents('A', 8)">8</button>
                <button  type="button" onmouseover="mouseOverInv(this)" onmouseout="mouseOutInv(this)" class="col-lg-6 border-right border-primary" style="height: 100px; background-color: white;" data-toggle="modal" data-target="#showContentModal" wire:click="setShelfContents('A', 9)">9</button> 
            </div>
            <div class="row border border-right-0 border-left-0 border-primary">
                <button  type="button" onmouseover="mouseOverInv(this)" onmouseout="mouseOutInv(this)" class="col-lg-4 border-right border-primary" style="height: 100px; background-color: white;" data-toggle="modal" data-target="#showContentModal" wire:click="setShelfContents('A', 10)">10</button>
                <button  type="button" onmouseover="mouseOverInv(this)" onmouseout="mouseOutInv(this)" class="col-lg-4 border-right border-primary" style="height: 100px; background-color: white;" data-toggle="modal" data-target="#showContentModal" wire:click="setShelfContents('A', 11)">11</button>
                <button  type="button" onmouseover="mouseOverInv(this)" onmouseout="mouseOutInv(this)" class="col-lg-4 border-right border-primary" style="height: 100px; background-color: white;" data-toggle="modal" data-target="#showContentModal" wire:click="setShelfContents('A', 12)">12</button>
            </div>
            <div class="row border border-top-0 border-right-0 border-left-0 border-primary shadow">
                <button  type="button" onmouseover="mouseOverInv(this)" onmouseout="mouseOutInv(this)" class="col-lg-6 border-right border-primary" style="height: 100px; background-color: white;" data-toggle="modal" data-target="#showContentModal" wire:click="setShelfContents('A', 13)">13</button>
                <button  type="button" onmouseover="mouseOverInv(this)" onmouseout="mouseOutInv(this)" class="col-lg-6 border-right border-primary" style="height: 100px; background-color: white;" data-toggle="modal" data-target="#showContentModal" wire:click="setShelfContents('A', 14)">14</button> 
            </div>
        </div>
        <div class="col-lg-4 mb-4">
            <div class="row border border-bottom-0 border-right-0 border-left-0 border-primary shadow">
                <button  type="button" onmouseover="mouseOverInv(this)" onmouseout="mouseOutInv(this)" class="col-lg-4 border-right border-primary" style="height: 100px; background-color: white;" data-toggle="modal" data-target="#showContentModal" wire:click="setShelfContents('A', 15)">15</button>
                <button  type="button" onmouseover="mouseOverInv(this)" onmouseout="mouseOutInv(this)" class="col-lg-4 border-right border-primary" style="height: 100px; background-color: white;" data-toggle="modal" data-target="#showContentModal" wire:click="setShelfContents('A', 16)">16</button>
                <button  type="button" onmouseover="mouseOverInv(this)" onmouseout="mouseOutInv(this)" class="col-lg-4 border-right border-primary" style="height: 100px; background-color: white;" data-toggle="modal" data-target="#showContentModal" wire:click="setShelfContents('A', 17)">17</button>
            </div>
            <div class="row border border-right-0 border-left-0 border-primary">
                <button  type="button" onmouseover="mouseOverInv(this)" onmouseout="mouseOutInv(this)" class="col-lg-6 border-right border-primary" style="height: 100px; background-color: white;" data-toggle="modal" data-target="#showContentModal" wire:click="setShelfContents('A', 18)">18</button>
                <button  type="button" onmouseover="mouseOverInv(this)" onmouseout="mouseOutInv(this)" class="col-lg-6 border-right border-primary" style="height: 100px; background-color: white;" data-toggle="modal" data-target="#showContentModal" wire:click="setShelfContents('A', 19)">19</button> 
            </div>
            <div class="row border border-top-0 border-right-0 border-left-0 border-primary shadow">
                <button  type="button" onmouseover="mouseOverInv(this)" onmouseout="mouseOutInv(this)" class="col-lg-4 border-right border-primary" style="height: 100px; background-color: white;" data-toggle="modal" data-target="#showContentModal" wire:click="setShelfContents('A', 20)">20</button>
                <button  type="button" onmouseover="mouseOverInv(this)" onmouseout="mouseOutInv(this)" class="col-lg-4 border-right border-primary" style="height: 100px; background-color: white;" data-toggle="modal" data-target="#showContentModal" wire:click="setShelfContents('A', 21)">21</button>
                <button  type="button" onmouseover="mouseOverInv(this)" onmouseout="mouseOutInv(this)" class="col-lg-4 border-right border-primary" style="height: 100px; background-color: white;" data-toggle="modal" data-target="#showContentModal" wire:click="setShelfContents('A', 22)">22</button>
            </div>
        </div>
    </div>

    <div class="row px-3">
        <h1>B</h1>
    </div>
    
    <div class="row px-3">
        <div class="col-lg-4 mb-4">
            <div class="row border border-bottom-0 border-right-0 border-primary shadow">
                <button  type="button" onmouseover="mouseOverInv(this)" onmouseout="mouseOutInv(this)" class="col-lg-4 border-right border-primary" style="height: 100.5px; background-color: white;" data-toggle="modal" data-target="#showContentModal" wire:click="setShelfContents('B', 1)">1</button>
                <button  type="button" onmouseover="mouseOverInv(this)" onmouseout="mouseOutInv(this)" class="col-lg-4 border-right border-primary" style="height: 100.5px; background-color: white;" data-toggle="modal" data-target="#showContentModal" wire:click="setShelfContents('B', 2)">2</button>
                <button  type="button" onmouseover="mouseOverInv(this)" onmouseout="mouseOutInv(this)" class="col-lg-4 border-right border-primary" style="height: 100.5px; background-color: white;" data-toggle="modal" data-target="#showContentModal" wire:click="setShelfContents('B', 3)">3</button>
            </div>
            <div class="row border border-right-0 border-primary">
                <button  type="button" onmouseover="mouseOverInv(this)" onmouseout="mouseOutInv(this)" class="col-lg-6 border-right border-primary" style="height: 100px; background-color: white;" data-toggle="modal" data-target="#showContentModal" wire:click="setShelfContents('B', 4)">4</button>
                <button  type="button" onmouseover="mouseOverInv(this)" onmouseout="mouseOutInv(this)" class="col-lg-6 border-right border-primary" style="height: 100px; background-color: white;" data-toggle="modal" data-target="#showContentModal" wire:click="setShelfContents('B', 5)">5</button> 
            </div>
            <div class="row border border-top-0 border-right-0 border-primary shadow">
                <button  type="button" onmouseover="mouseOverInv(this)" onmouseout="mouseOutInv(this)" class="col-lg-4 border-right border-primary" style="height: 100px; background-color: white;" data-toggle="modal" data-target="#showContentModal" wire:click="setShelfContents('B', 6)">6</button>
                <button  type="button" onmouseover="mouseOverInv(this)" onmouseout="mouseOutInv(this)" class="col-lg-4 border-right border-primary" style="height: 100px; background-color: white;" data-toggle="modal" data-target="#showContentModal" wire:click="setShelfContents('B', 7)">7</button>
                <button  type="button" onmouseover="mouseOverInv(this)" onmouseout="mouseOutInv(this)" class="col-lg-4 border-right border-primary" style="height: 100px; background-color: white;" data-toggle="modal" data-target="#showContentModal" wire:click="setShelfContents('B', 8)">8</button>
            </div>
        </div>
        <div class="col-lg-4 mx-auto mb-4">
            <div class="row border border-bottom-0 border-right-0 border-left-0 border-primary shadow">
                <div class="col-lg-4 px-0">
                    <button onmouseover="mouseOverInv(this)" onmouseout="mouseOutInv(this)" style="height: 152px; width: 100%; border-bottom: 1px solid #338eda; border-right: 1px solid #338eda; background-color: white;" data-toggle="modal" data-target="#showContentModal" wire:click="setShelfContents('B', 9)">9</button>
                    <button onmouseover="mouseOverInv(this)" onmouseout="mouseOutInv(this)" style="height: 151px; width: 100%; border-bottom: 1px solid #338eda; border-right: 1px solid #338eda; background-color: white;" data-toggle="modal" data-target="#showContentModal" wire:click="setShelfContents('B', 10)">10</button>
                </div>
                <div class="col-lg-4 px-0">
                    <button onmouseover="mouseOverInv(this)" onmouseout="mouseOutInv(this)" style="height: 101px; width: 100%; border-bottom: 1px solid #338eda; border-right: 1px solid #338eda; background-color: white;" data-toggle="modal" data-target="#showContentModal" wire:click="setShelfContents('B', 11)">11</button>
                    <button onmouseover="mouseOverInv(this)" onmouseout="mouseOutInv(this)" style="height: 101px; width: 100%; border-bottom: 1px solid #338eda; border-right: 1px solid #338eda; background-color: white;" data-toggle="modal" data-target="#showContentModal" wire:click="setShelfContents('B', 12)">12</button>
                    <button onmouseover="mouseOverInv(this)" onmouseout="mouseOutInv(this)" style="height: 101px; width: 100%; border-bottom: 1px solid #338eda; border-right: 1px solid #338eda; background-color: white;" data-toggle="modal" data-target="#showContentModal" wire:click="setShelfContents('B', 13)">13</button>
                </div>
                <div class="col-lg-4 px-0">
                    <button onmouseover="mouseOverInv(this)" onmouseout="mouseOutInv(this)" style="height: 152px; width: 100%; border-bottom: 1px solid #338eda; border-right: 1px solid #338eda; background-color: white;" data-toggle="modal" data-target="#showContentModal" wire:click="setShelfContents('B', 14)">14</button>
                    <button onmouseover="mouseOverInv(this)" onmouseout="mouseOutInv(this)" style="height: 151px; width: 100%; border-bottom: 1px solid #338eda; border-right: 1px solid #338eda; background-color: white;" data-toggle="modal" data-target="#showContentModal" wire:click="setShelfContents('B', 15)">15</button>
                </div>
            </div>
        </div>
        <div class="col-lg-4 mx-auto mb-4">
            <div class="row border border-bottom-0 border-right-0 border-left-0 border-primary shadow">
                <div class="col-lg-4 px-0">
                    <button onmouseover="mouseOverInv(this)" onmouseout="mouseOutInv(this)" style="height: 152px; width: 100%; border-bottom: 1px solid #338eda; border-right: 1px solid #338eda; background-color: white;" data-toggle="modal" data-target="#showContentModal" wire:click="setShelfContents('B', 16)">16</button>
                    <button onmouseover="mouseOverInv(this)" onmouseout="mouseOutInv(this)" style="height: 151px; width: 100%; border-bottom: 1px solid #338eda; border-right: 1px solid #338eda; background-color: white;" data-toggle="modal" data-target="#showContentModal" wire:click="setShelfContents('B', 17)">17</button>
                </div>
                <div class="col-lg-4 px-0">
                    <button onmouseover="mouseOverInv(this)" onmouseout="mouseOutInv(this)" style="height: 101px; width: 100%; border-bottom: 1px solid #338eda; border-right: 1px solid #338eda; background-color: white;" data-toggle="modal" data-target="#showContentModal" wire:click="setShelfContents('B', 18)">18</button>
                    <button onmouseover="mouseOverInv(this)" onmouseout="mouseOutInv(this)" style="height: 101px; width: 100%; border-bottom: 1px solid #338eda; border-right: 1px solid #338eda; background-color: white;" data-toggle="modal" data-target="#showContentModal" wire:click="setShelfContents('B', 19)">19</button>
                    <button onmouseover="mouseOverInv(this)" onmouseout="mouseOutInv(this)" style="height: 101px; width: 100%; border-bottom: 1px solid #338eda; border-right: 1px solid #338eda; background-color: white;" data-toggle="modal" data-target="#showContentModal" wire:click="setShelfContents('B', 20)">20</button>
                </div>
                <div class="col-lg-4 px-0">
                    <button onmouseover="mouseOverInv(this)" onmouseout="mouseOutInv(this)" style="height: 152px; width: 100%; border-bottom: 1px solid #338eda; border-right: 1px solid #338eda; background-color: white;" data-toggle="modal" data-target="#showContentModal" wire:click="setShelfContents('B', 21)">21</button>
                    <button onmouseover="mouseOverInv(this)" onmouseout="mouseOutInv(this)" style="height: 151px; width: 100%; border-bottom: 1px solid #338eda; border-right: 1px solid #338eda; background-color: white;" data-toggle="modal" data-target="#showContentModal" wire:click="setShelfContents('B', 22)">22</button>
                </div>
            </div>
        </div>
    </div>

    <div class="row px-3">
        <h1>C</h1>
    </div>

    <div class="row px-3">
        <div class="col-lg-4 mx-auto mb-4">
            <div class="row border border-primary shadow">
                <div class="col-lg-6 px-0">
                    <button onmouseover="mouseOverInv(this)" onmouseout="mouseOutInv(this)" style="height: 150.5px; width: 100%; border-bottom: 1px solid #338eda; border-right: 1px solid #338eda; background-color: white;" data-toggle="modal" data-target="#showContentModal" wire:click="setShelfContents('C', 1)">1</button>
                    <button onmouseover="mouseOverInv(this)" onmouseout="mouseOutInv(this)" style="height: 150.5px; width: 100%; border-right: 1px solid #338eda; background-color: white;" data-toggle="modal" data-target="#showContentModal" wire:click="setShelfContents('C', 2)">2</button>
                </div>
                <div class="col-lg-6 px-0">
                    <button onmouseover="mouseOverInv(this)" onmouseout="mouseOutInv(this)" style="height: 150.5px; width: 100%; border-bottom: 1px solid #338eda;  background-color: white;" data-toggle="modal" data-target="#showContentModal" wire:click="setShelfContents('C', 3)">3</button>
                    <button onmouseover="mouseOverInv(this)" onmouseout="mouseOutInv(this)" style="height: 150.5px; width: 100%; background-color: white;" data-toggle="modal" data-target="#showContentModal" wire:click="setShelfContents('C', 4)">4</button>
                </div>
            </div>
        </div>
        <div class="col-lg-4 mb-4">
            <div class="row border border-bottom-0 border-right-0 border-left-0 border-primary shadow-">
                <button  type="button" onmouseover="mouseOverInv(this)" onmouseout="mouseOutInv(this)" class="col-lg-6 border-right border-primary" style="height: 100px; background-color: white;" data-toggle="modal" data-target="#showContentModal" wire:click="setShelfContents('C', 5)">5</button>
                <button  type="button" onmouseover="mouseOverInv(this)" onmouseout="mouseOutInv(this)" class="col-lg-6 border-right border-primary" style="height: 100px; background-color: white;" data-toggle="modal" data-target="#showContentModal" wire:click="setShelfContents('C', 6)">6</button> 
            </div>
            <div class="row border border-right-0 border-left-0 border-primary">
                <button  type="button" onmouseover="mouseOverInv(this)" onmouseout="mouseOutInv(this)" class="col-lg-4 border-right border-primary" style="height: 100px; background-color: white;" data-toggle="modal" data-target="#showContentModal" wire:click="setShelfContents('C', 7)">7</button>
                <button  type="button" onmouseover="mouseOverInv(this)" onmouseout="mouseOutInv(this)" class="col-lg-4 border-right border-primary" style="height: 100px; background-color: white;" data-toggle="modal" data-target="#showContentModal" wire:click="setShelfContents('C', 8)">8</button>
                <button  type="button" onmouseover="mouseOverInv(this)" onmouseout="mouseOutInv(this)" class="col-lg-4 border-right border-primary" style="height: 100px; background-color: white;" data-toggle="modal" data-target="#showContentModal" wire:click="setShelfContents('C', 9)">9</button>
            </div>
            <div class="row border border-top-0 border-right-0 border-left-0 border-primary shadow">
                <button  type="button" onmouseover="mouseOverInv(this)" onmouseout="mouseOutInv(this)" class="col-lg-6 border-right border-primary" style="height: 100px; background-color: white;" data-toggle="modal" data-target="#showContentModal" wire:click="setShelfContents('C', 10)">10</button>
                <button  type="button" onmouseover="mouseOverInv(this)" onmouseout="mouseOutInv(this)" class="col-lg-6 border-right border-primary" style="height: 100px; background-color: white;" data-toggle="modal" data-target="#showContentModal" wire:click="setShelfContents('C', 11)">11</button> 
            </div>
        </div>
        <div class="col-lg-4 mb-4">
            <div class="row border border-bottom-0 border-right-0 border-left-0 border-primary shadow">
                <button  type="button" onmouseover="mouseOverInv(this)" onmouseout="mouseOutInv(this)" class="col-lg-4 border-right border-primary" style="height: 100px; background-color: white;" data-toggle="modal" data-target="#showContentModal" wire:click="setShelfContents('C', 12)">12</button>
                <button  type="button" onmouseover="mouseOverInv(this)" onmouseout="mouseOutInv(this)" class="col-lg-4 border-right border-primary" style="height: 100px; background-color: white;" data-toggle="modal" data-target="#showContentModal" wire:click="setShelfContents('C', 13)">13</button>
                <button  type="button" onmouseover="mouseOverInv(this)" onmouseout="mouseOutInv(this)" class="col-lg-4 border-right border-primary" style="height: 100px; background-color: white;" data-toggle="modal" data-target="#showContentModal" wire:click="setShelfContents('C', 14)">14</button>
            </div>
            <div class="row border border-right-0 border-left-0 border-primary">
                <button  type="button" onmouseover="mouseOverInv(this)" onmouseout="mouseOutInv(this)" class="col-lg-6 border-right border-primary" style="height: 100px; background-color: white;" data-toggle="modal" data-target="#showContentModal" wire:click="setShelfContents('C', 15)">15</button>
                <button  type="button" onmouseover="mouseOverInv(this)" onmouseout="mouseOutInv(this)" class="col-lg-6 border-right border-primary" style="height: 100px; background-color: white;" data-toggle="modal" data-target="#showContentModal" wire:click="setShelfContents('C', 16)">16</button> 
            </div>
            <div class="row border border-top-0 border-right-0 border-left-0 border-primary shadow">
                <button  type="button" onmouseover="mouseOverInv(this)" onmouseout="mouseOutInv(this)" class="col-lg-4 border-right border-primary" style="height: 100px; background-color: white;" data-toggle="modal" data-target="#showContentModal" wire:click="setShelfContents('C', 17)">17</button>
                <button  type="button" onmouseover="mouseOverInv(this)" onmouseout="mouseOutInv(this)" class="col-lg-4 border-right border-primary" style="height: 100px; background-color: white;" data-toggle="modal" data-target="#showContentModal" wire:click="setShelfContents('C', 18)">18</button>
                <button  type="button" onmouseover="mouseOverInv(this)" onmouseout="mouseOutInv(this)" class="col-lg-4 border-right border-primary" style="height: 100px; background-color: white;" data-toggle="modal" data-target="#showContentModal" wire:click="setShelfContents('C', 19)">19</button>
            </div>
        </div>
    </div>

    <hr style="background-color: black;">
    
    @endif

    <div class="row px-0">
        <div class="col-lg-4">
            <div class="form-inline">
                <input wire:model="search" class="form-control mr-sm-2" type="search" placeholder="Search" aria-label="Search">
                <svg class="ml-1" style="width:8%;" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512"><!-- Font Awesome Free 5.15.3 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license/free (Icons: CC BY 4.0, Fonts: SIL OFL 1.1, Code: MIT License) --><path d="M505 442.7L405.3 343c-4.5-4.5-10.6-7-17-7H372c27.6-35.3 44-79.7 44-128C416 93.1 322.9 0 208 0S0 93.1 0 208s93.1 208 208 208c48.3 0 92.7-16.4 128-44v16.3c0 6.4 2.5 12.5 7 17l99.7 99.7c9.4 9.4 24.6 9.4 33.9 0l28.3-28.3c9.4-9.4 9.4-24.6.1-34zM208 336c-70.7 0-128-57.2-128-128 0-70.7 57.2-128 128-128 70.7 0 128 57.2 128 128 0 70.7-57.2 128-128 128z"/></svg>
            </div>
        </div>
            
        <div class="col-lg-8">
            <button onmouseover="mouseOverInv(this)" onmouseout="mouseOutInv(this)" type="button" class="btn float-right" style="background-color:#63ab87; border: 1px solid black;" data-toggle="modal" data-target="#addItemModal">
                <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 448 512" class="mx-auto" style="width: 25px;"><!-- Font Awesome Free 5.15.3 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license/free (Icons: CC BY 4.0, Fonts: SIL OFL 1.1, Code: MIT License) --><path d="M416 208H272V64c0-17.67-14.33-32-32-32h-32c-17.67 0-32 14.33-32 32v144H32c-17.67 0-32 14.33-32 32v32c0 17.67 14.33 32 32 32h144v144c0 17.67 14.33 32 32 32h32c17.67 0 32-14.33 32-32V304h144c17.67 0 32-14.33 32-32v-32c0-17.67-14.33-32-32-32z"/></svg>
            </button>
        </div>
    </div>

    <div class="row mt-3">
        <table class="table table-hover border-right border-left border-bottom mx-3">
            <tr class="table-primary">
                <th scope="col">Name</th>
                <th scope="col">Location</th>
                <th scope="col">Amount</th>
                <th scope="col">Image</th>
                <th scope="col"></th>
            </tr>
            </thead>
            <tbody>
                @forelse($items as $item)
                    <tr wire:loading.class="text-secondary">
                        <td>{{$item->name}}</td>
                        <td>{{$item->shelf_sec}}{{$item->shelf_num}}</td>
                        <td>{{$item->amount}}</td>
                        <td><a href="" wire:click="getImage({{$item->id}})"  data-toggle="modal" data-target="#showImageModal">View</a></td>
                        <td>
                            <button wire:click="deleteItem({{$item->id}})" type="button" class="btn btn-danger float-right" style="border: 1px solid black;">
                                <svg style="width:15px;" class="mx-auto" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 576 512"><!-- Font Awesome Free 5.15.3 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license/free (Icons: CC BY 4.0, Fonts: SIL OFL 1.1, Code: MIT License) --><path d="M432 32H312l-9.4-18.7A24 24 0 0 0 281.1 0H166.8a23.72 23.72 0 0 0-21.4 13.3L136 32H16A16 16 0 0 0 0 48v32a16 16 0 0 0 16 16h416a16 16 0 0 0 16-16V48a16 16 0 0 0-16-16zM53.2 467a48 48 0 0 0 47.9 45h245.8a48 48 0 0 0 47.9-45L416 128H32z"/></svg>
                            </button>

                            <button wire:click="getEditItem({{$item->id}})" type="button" class="btn btn-warning float-right mr-1" style="border: 1px solid black;" data-toggle="modal" data-target="#editItemModal">                             
                                <svg style="width:15px;" class="mx-auto" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 576 512"><!-- Font Awesome Free 5.15.3 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license/free (Icons: CC BY 4.0, Fonts: SIL OFL 1.1, Code: MIT License) --><path d="M402.6 83.2l90.2 90.2c3.8 3.8 3.8 10 0 13.8L274.4 405.6l-92.8 10.3c-12.4 1.4-22.9-9.1-21.5-21.5l10.3-92.8L388.8 83.2c3.8-3.8 10-3.8 13.8 0zm162-22.9l-48.8-48.8c-15.2-15.2-39.9-15.2-55.2 0l-35.4 35.4c-3.8 3.8-3.8 10 0 13.8l90.2 90.2c3.8 3.8 10 3.8 13.8 0l35.4-35.4c15.2-15.3 15.2-40 0-55.2zM384 346.2V448H64V128h229.8c3.2 0 6.2-1.3 8.5-3.5l40-40c7.6-7.6 2.2-20.5-8.5-20.5H48C21.5 64 0 85.5 0 112v352c0 26.5 21.5 48 48 48h352c26.5 0 48-21.5 48-48V306.2c0-10.7-12.9-16-20.5-8.5l-40 40c-2.2 2.3-3.5 5.3-3.5 8.5z"/></svg>
                            </button>
                        </td>
                    </tr>
                @empty
                    <tr>
                        <td colspan="4" class="text-secondary text-center h4">No entry found...</td>
                    </tr>
                @endforelse
            </tbody>
        </table>
        <div class="ml-3">
            {{ $items->links() }}
        </div>
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
                                    <button type="button" class="btn btn-outline-primary" wire:click="decreaseAmount('{{$index}}')">-</button>
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
    <form autocomplete="off">
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
                                <select class="form-control" id="exampleFormControlSelect2" wire:click="setSectionAmount" wire:model.defer="itemLetter">
                                    <option value="A">A</option>
                                    <option value="B">B</option>
                                    <option value="C">C</option>
                                </select>
                            </div>
                            <div class="col-lg-4">
                                <select class="form-control" id="exampleFormControlSelect2" wire:model.defer="itemNumber">
                                    @for($i=1;$i<=$sectionAmount;$i++)
                                    <option>{{$i}}</option>
                                    @endfor
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

    {{-- Show Image --}}
    <form autocomplete="off">
        <div class="modal fade" id="showImageModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true" wire:ignore.self>
            <div class="modal-dialog modal-lg">
                <div class="modal-content">
                    <div class="modal-header" style="background-color: #bee5eb; border-bottom: 1px solid #404040;">
                        <h5 class="modal-title" id="exampleModalLabel">Image View</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <div class="modal-body">
                            <img style="width:100%;" src="{{$photoLocation}}" alt="" srcset="">
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    </div>
                </div>
            </div>
        </div>                                                                                          
    </form>

    {{-- Edit Item --}}
    <form autocomplete="off">
        <div class="modal fade" id="editItemModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true" wire:ignore.self>
            <div class="modal-dialog modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">Edit Item</h5>
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
                                <select class="form-control" id="exampleFormControlSelect2" wire:click="setSectionAmount" wire:model.defer="itemLetter">
                                    <option value="A">A</option>
                                    <option value="B">B</option>
                                    <option value="C">C</option>
                                </select>
                            </div>
                            <div class="col-lg-4">
                                <select class="form-control" id="exampleFormControlSelect2" wire:model.defer="itemNumber">
                                    @for($i=1;$i<=$sectionAmount;$i++)
                                    <option>{{$i}}</option>
                                    @endfor
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
                        <button type="submit" class="btn btn-primary" data-dismiss="modal" wire:click="setEditItem">Save changes</button>
                    </div>
                </div>
            </div>
        </div>
    </form>
</div>