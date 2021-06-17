<?php

namespace App\Http\Livewire;

use Illuminate\Support\Facades\Storage;

use Livewire\Component;
use Livewire\WithFileUploads;

use App\Models\Item;

use DB;

class Inventory extends Component
{
    use WithFileUploads;

    // Variables
    public $photo;

    //Shelf
    public $shelfLetter, $shelfNum;

    // Item
    public $itemsA, $itemsB, $itemsC, $itemsSpecific, $items, $itemName, $itemAmount, $itemLetter, $itemNumber, $itemImg;
    
    public $modalItem = array();
    public $modalItems = array();

    public $displayAddItemFormImageText = "Hello world";
    
    // Methods
    public function increaseAmount($index)
    {
        $this->modalItems[$index][1] = $this->modalItems[$index][1] + 1;
    }

    public function decreaseAmount($index)
    {
        $this->modalItems[$index][1] = $this->modalItems[$index][1] - 1;
    }

    public function saveModal($shelfLetter, $shelfNum)
    {
        foreach($this->itemsSpecific as $index => $item)
        {
            $item = Item::find($item->id);
            $item->amount = $this->modalItems[$index][1];
            $item->save();
        }

        return redirect()->to('/inventory');
    }

    public function setShelfContents($letter, $num)
    {
        $this->shelfLetter = $letter;
        $this->shelfNum = $num;

        unset($this->itemsSpecific);
        $this->itemsSpecific = array();

        unset($this->modalItem);
        $this->modalItem = array();

        unset($this->modalItems);
        $this->modalItems = array();

        $this->itemsSpecific = Item::where('shelf_sec', $this->shelfLetter)->where('shelf_num', $this->shelfNum)->get();

        foreach ($this->itemsSpecific as $value) {
            $this->modalItem = [$value->id, $value->amount];
            array_push($this->modalItems, $this->modalItem);
        }
    }

    public function addItem()
    {
        $this->validate([
            'photo' => 'image|max:10000', 
            ]);
            
        $filename = $this->photo->store('photos');

        $item = Item::create([
            'name' => $this->itemName,
            'amount' => $this->itemAmount,
            'shelf_sec' => $this->itemLetter,
            'shelf_num' => $this->itemNumber,
            'img' => $filename, 
        ]);

        return redirect()->to('/inventory');
    }


    // Functions
    public function saveImage()
    {

    }
    
    // Life Cycle
    public function hydrate()
    {
        
    }

    public function mount()
    {
        $this->shelfLetter = 'A';
        $this->shelfNum = 1;
        $this->itemLetter = $this->shelfLetter; 
        $this->itemNumber = 1; 

        $this->items = Item::all();
        $this->itemsSpecific = Item::all();
        $this->itemsA = Item::where('shelf_sec', 'A')->get();
        $this->itemsB = Item::where('shelf_sec', 'B')->get();
        $this->itemsC = Item::where('shelf_sec', 'C')->get();

        foreach ($this->itemsSpecific as $value) {
            $this->modalItem = [$value->id, $value->amount];
            array_push($this->modalItems, $this->modalItem);
        }
    }

    public function render()
    {
        return view('livewire.inventory');
    }
}
