<?php

namespace App\Http\Livewire;

use App\Models\Riddle;
use Livewire\Component;

class SavePosition extends Component
{
    public $description;

    protected $listeners = ['savePositionData' => 'save'];

    public function render()
    {
        return view('livewire.save-position');
    }

    public function save(float $latitude, float $longitude) {
        Riddle::create([
            'lat' => $latitude,
            'lng' => $longitude,
            'copy' => $this->description,
            'solution' => 'ipsum',
        ]);

        $this->description = null;
    }
}
