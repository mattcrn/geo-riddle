<?php

namespace App\View\Components;

use App\Models\User;
use Illuminate\Http\Resources\Json\ResourceCollection;
use Illuminate\Support\Facades\Auth;
use Illuminate\View\Component;

class Map extends Component
{
    public $riddles;
    public $userHasWon;

    /**
     * Create a new component instance.
     *
     * @return void
     */
    public function __construct(ResourceCollection $riddles)
    {
        $this->riddles = User::find(Auth::id())->riddles()->get()->toJson();
        $this->userHasWon = User::find(Auth::id())->hasWon;
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|\Closure|string
     */
    public function render()
    {
        return view('components.map');
    }
}
