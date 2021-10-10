<?php

namespace App\View\Components;

use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\View\Component;

class CompleteRiddles extends Component
{
    public $riddles;
    /**
     * Create a new component instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->riddles = User::find(Auth::id())->riddles()->get();
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|\Closure|string
     */
    public function render()
    {
        return view('components.complete-riddles');
    }
}
