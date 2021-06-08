<?php

namespace App\Http\Livewire;

use Livewire\Component;
use Livewire\WithFileUploads;

class Inventory extends Component
{
    // Variables
    public $shelfLetter = 'A';
    public $shelfNum = 0;

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

    }

    public function render()
    {
        return view('livewire.inventory');
    }
}
