<?php

namespace App\Http\Livewire;

use App\Models\Riddle as ModelsRiddle;
use Livewire\Component;

class RiddleModal extends Component
{
    public $riddleId;
    public $riddle;
    public $userSolution;
    public $message;
    public $visible = false;

    protected $listeners = ['setRiddleModal' => 'setRiddle', 'hideModal'];

    public function render()
    {

        return view('livewire.riddle-modal');
    }

    public function mount() {
        //$this->setRiddle(1);
    }

    public function setRiddle(int $id): void {
        $this->riddle = ModelsRiddle::find($id);
        $this->visible = true;
    }

    public function hideModal() {
        $this->visible = false;
    }

    public function answer() {
        if($this->riddle->solution === $this->userSolution) {
            $this->message = "RIGHT!!";
        } else {
            $this->message = "WROOONG!";
        }
    }
}
