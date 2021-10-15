<?php

namespace App\Http\Livewire;

use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Livewire\Component;

class FindMyGiraffe extends Component
{
    const PASSWORD = 'serengeti';
    public $password;
    public $message;
    public $userHasWon;

    public function Mount()
    {
        $this->userHasWon = User::find(Auth::user()->id)->hasWon;
    }

    public function submit() {
        if(strtolower($this->password) === self::PASSWORD){
            $this->message = 'success';
            User::find(Auth::user()->id)->update(['hasWon' => true]);
            $this->userHasWon= true;
        } else {
            $this->message = 'Passwort falsch.';
        }
    }

    public function render()
    {
        return view('livewire.find-my-giraffe');
    }
}
