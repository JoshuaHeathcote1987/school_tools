<?php

namespace App\Http\Livewire;

use Livewire\Component;

class Inventory extends Component
{
    // Variables
    public $shelfNum = 0;
    
    // Methods
    public function setShelfNum($x)
    {
        $this->shelfNum = $x;
    }

    // Functions

    
    // Life Cycle
    public function hydrate()
    {
        
    }

    public function render()
    {
        return view('livewire.inventory');
    }
}
