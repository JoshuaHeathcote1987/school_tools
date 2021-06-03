<?php

namespace App\Http\Livewire;

use Livewire\Component;

class Inventory extends Component
{
    // Variables
    public $shelfNum = 0;
    
    // Methods
    public function changeShelfNum($num)
    {
        $this->shelfNum = $num;
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
