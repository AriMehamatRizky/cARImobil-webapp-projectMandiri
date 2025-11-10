<?php

namespace App\View\Components;

use App\Models\Car;
use Illuminate\View\Component;

class CarCard extends Component
{
    /**
     * Objek data mobil.
     */
    public $car;

    /**
     * Create a new component instance.
     *
     * @return void
     */
    public function __construct(Car $car)
    {
        $this->car = $car;
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|\Closure|string
     */
    public function render()
    {
        return view('components.car-card');
    }
}