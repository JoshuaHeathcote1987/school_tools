<?php

namespace App\Http\Livewire;

use Illuminate\Support\Facades\Storage;

use Livewire\Component;
use Livewire\WithFileUploads;
use Livewire\WithPagination;

use App\Exports\ItemExport;
use Maatwebsite\Excel\Facades\Excel;

use App\Models\Item;

use DB;

class Inventory extends Component
{
    use WithFileUploads;
    use WithPagination;

    protected $paginationTheme = 'bootstrap';

    // Table Flipflop
    public $flipFlopTable = false;

    // Search
    public $search = '';

    // Variables
    public $photo;
    public $photoLocation = '';

    //Shelf
    public $shelfLetter, $shelfNum;

    public $sectionAmount = 22;

    // Item
    public $itemId, $itemsA, $itemsB, $itemsC, $itemsSpecific,  $itemName, $itemAmount, $itemLetter, $itemNumber, $itemImg;
    
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

        $this->items = Item::all();
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

    public function setSectionAmount()
    {
        switch($this->itemLetter)
        {
            case 'A': 
                $this->sectionAmount = 22;
                break;
            case 'B':
                $this->sectionAmount = 22;
                break;
            case 'C':
                $this->sectionAmount = 19;
                break;
        }
    }

    public function addItem()
    {
        $this->validate([
            'photo' => 'nullable|image|max:10000',
        ]);
    
        $item = Item::create([
            'name' => $this->itemName,
            'amount' => $this->itemAmount,
            'shelf_sec' => $this->itemLetter,
            'shelf_num' => $this->itemNumber,
            'img' => $this->photo ?  $this->photo->store('public/img') : '/public/img/placeholder.png',
        ]);

        $this->itemName = null;
        $this->itemAmount = null;
        $this->photo = null;
    
        $this->items = Item::all();
    }

    public function getEditItem($id)
    {
        $this->itemId = $id;
        $item = Item::find($id);
        $this->itemName = $item->name;
        $this->itemAmount = $item->amount;
        $this->itemLetter = $item->shelf_sec;
        $this->itemNumber = $item->shelf_num;
    }

    public function setEditItem()
    {
        $item = Item::where('id', $this->itemId)
            ->update([
                'name' => $this->itemName,
                'amount' => $this->itemAmount,
                'shelf_sec' => $this->itemLetter,
                'shelf_num' => $this->itemNumber,
                'img' => $this->photo ?  $this->photo->store('public/img') : 'no-photo-available.png',
            ]);

        $this->items = Item::all();
    }

    public function deleteItem($id)
    {
        $item = Item::find($id);
        $item->delete();

        $this->items = Item::all();
    }

    public function getImage($id)
    {
        $image = Item::find($id);
        $this->photoLocation = $image->img;
        $this->photoLocation = substr($this->photoLocation, 11);
        $this->photoLocation = asset('/storage/img/'.$this->photoLocation);
    }   

    public function export()
    {
        $data = Item::orderBy('shelf_sec')->orderBy('shelf_num')->get();
        $month = date('F');
        $year = date('Y');

        return Excel::download(new ItemExport($data), 'Items_'.$month.'_'.$year.'.xlsx');
    }

    // Functions
    public function flipFlopDisplay($obj)
    {
        switch($obj)
        {
            case 'table':
                if($this->flipFlopTable) 
                {
                    $this->flipFlopTable = false;
                } else {
                    $this->flipFlopTable = true;
                }
                break;
        }
    }

    public function mount()
    {
        $this->shelfLetter = 'A';
        $this->shelfNum = 1;
        $this->itemLetter = $this->shelfLetter; 
        $this->itemNumber = 1; 

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
        sleep(0.5);

        return view('livewire.inventory', [
            'items' => Item::where('name', 'like', '%'.$this->search.'%')->paginate(10),
        ]);
    }
}
