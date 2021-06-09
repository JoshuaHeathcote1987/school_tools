<?php

namespace App\Http\Livewire;

use Livewire\Component;
use Livewire\WithFileUploads;

class Inventory extends Component
{
    // Variables
    //Shelf
    public $shelfLetter, $shelfNum;

    // Item
    public $itemName, $itemAmount, $itemLetter, $itemNumber, $itemImg;

    public $displayAddItemFormImageText = "Hello world";
    
    // Methods
    public function setShelfContents($letter, $num)
    {
        $this->shelfLetter = $letter;
        $this->shelfNum = $num;
    }

    public function addItem()
    {
        $item = array(
            'name' => $this->itemName,
            'amount' => $this->itemAmount,
            'letter' => $this->itemLetter,
            'number' => $this->itemNumber,
            'img' => $this->itemImg, 
        );

        dd($item);
    }

    // Functions

    
    // Life Cycle
    public function hydrate()
    {
        
    }

    public function mount()
    {
        $this->shelfLetter = 'A';
        $this->shelfNum = 1;
        $this->itemName;
        $this->itemAmount; 
        $this->itemLetter = $this->shelfLetter; 
        $this->itemNumber = 1; 
        $this->itemImg;
    }

    public function render()
    {
        return view('livewire.inventory');
    }
}
