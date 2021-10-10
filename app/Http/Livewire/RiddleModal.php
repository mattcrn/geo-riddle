<?php

namespace App\Http\Livewire;

use App\Models\Riddle as ModelsRiddle;
use App\Models\User;
use Livewire\Component;
use Ballen\Distical\Calculator as DistanceCalculator;
use Ballen\Distical\Entities\LatLong;
use Illuminate\Support\Facades\Auth;

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

    public function mount()
    {
        //$this->setRiddle(1);
    }

    public function setRiddle(int $id, float $latitude, float $longitude): void
    {
        $currentRiddle = ModelsRiddle::find($id);

        $riddlePosition = new LatLong($currentRiddle->lat, $currentRiddle->lng);
        $userPosition = new LatLong($latitude, $longitude);

        // calculate the distance
        $distanceCalculator = new DistanceCalculator($riddlePosition, $userPosition);

        // convert them it to meters
        try {
            $distance = $distanceCalculator->get()->asKilometres() * 1000;
        } catch (\InvalidArgumentException $e) {
            $distance = 0;
        }
        
        if ($distance < 20) {
            $this->riddle = $currentRiddle;
            $this->visible = true;$this->emit('hideAlert');
        } else {
            $this->emit('alert', 'Du bist zu weit weg für dieses Rätsel');
            $this->visible = false;
        }
    }

    public function hideModal()
    {
        $this->visible = false;
    }

    public function answer()
    {
        if ($this->riddle->solution === $this->userSolution) {
            User::find(Auth::user()->id)->riddles()->attach($this->riddle->id);
            $this->message = "RIGHT!!";
        } else {
            $this->message = "WROOONG!";
        }
    }
}
