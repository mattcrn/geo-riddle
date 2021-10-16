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
    public $solved = false;

    protected $listeners = ['setRiddleModal' => 'setRiddle', 'hideModal'];

    public function render()
    {

        return view('livewire.riddle-modal');
    }

    public function setRiddle(int $id, float $latitude, float $longitude): void
    {
        $currentRiddle = User::find(Auth::id())->riddles()->find($id);

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
        
        if ($distance < 20 || User::find(Auth::id())->riddles()->find($currentRiddle?->id)?->pivot?->solved) {
            $this->riddle = $currentRiddle;
            $this->visible = true;
            $this->emit('hideAlert');
        } else {
            $this->emit('alert', 'Du bist zu weit weg!');
            $this->visible = false;
        }
    }

    public function hideModal()
    {
        $this->visible = false;
        $this->userSolution = '';
        $this->message = null;
    }

    public function answer()
    {
        if ($this->riddle->solution === strtolower($this->userSolution)) {
            User::find(Auth::id())->riddles()->updateExistingPivot($this->riddle->id, ['solved' => true]);
            $this->refreshRiddle();
        } else {
            $this->message = "Error: Falscher Code probiere es erneut!";
        }
    }

    private function refreshRiddle() {
        $this->riddle = User::find(Auth::id())->riddles()->find($this->riddle->id);;
    }
}
