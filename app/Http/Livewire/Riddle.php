<?php

namespace App\Http\Livewire;

use Livewire\Component;

class Riddle extends Component
{
    public $riddle;
    public $userSolution;
    public $message;

    public function render()
    {

        return view('livewire.riddle');
    }

    public function answer() {
        if($this->riddle->solution === $this->userSolution) {
            $this->message = "RIGHT!!";
        } else {
            $this->message = "WROOONG!";
        }
    }
}
