<?php

namespace App\Http\Livewire;

use Livewire\Component;


class Keypad extends Component
{
    public $pwd;
    public $msg;

    public function btnOne()
    {
        $this->pwd .= 1;
    }

    public function btnTwo()
    {
        $this->pwd .= 2;
    }

    public function btnThree()
    {
        $this->pwd .= 3;
    }

    public function btnFour()
    {
        $this->pwd .= 4;
    }

    public function btnFive()
    {
        $this->pwd .= 5;
    }

    public function btnSix()
    {
        $this->pwd .= 6;
    }

    public function btnSeven()
    {
        $this->pwd .= 7;
    }

    public function btnEight()
    {
        $this->pwd .= 8;
    }

    public function btnNine()
    {
        $this->pwd .= 9;
    }

    public function btnGo()
    {
        if($this->pwd != '4999')
        {
            $this->pwd = null;
            session()->flash('msg', '🙈');
        }
        else
        { 
            session(['pwd' => $this->pwd]);
            return redirect()->to('/attendance');
        }
    }

    public function render()
    {
        return view('livewire.keypad');
    }
}
