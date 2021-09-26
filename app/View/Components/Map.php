<?php

namespace App\View\Components;

use Illuminate\Http\Resources\Json\ResourceCollection;
use Illuminate\View\Component;

class Map extends Component
{
    public $riddles;
    /**
     * Create a new component instance.
     *
     * @return void
     */
    public function __construct(ResourceCollection $riddles)
    {
        $this->riddles = $riddles->toJson();
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
