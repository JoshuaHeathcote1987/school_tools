<?php

namespace App\Http\Livewire;

use Livewire\Component;

class Inventory extends Component
{
    // Variables
    public $numberOfShelfs = 17;
    public $shelfLetter = 'A';
    public $shelfNum = 0;

    
    // Methods

    
    public function setShelfContents($letter, $num)
    {
        $this->shelfLetter = $letter;
        $this->shelfNum = $num;

       
    }

    // Functions
    
    // Life Cycle
    public function hydrate()
    {
        
    }

    public function mount()
    {
        if($this->shelfNum != 0)
        {
            $this->shelfNum = 4;
        }
    }

    public function render()
    {
        return view('livewire.inventory');
    }
}
