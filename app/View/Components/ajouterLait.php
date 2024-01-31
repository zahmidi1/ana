<?php

namespace App\View\Components;

use Illuminate\View\Component;
use App\Models\Clients;
use Illuminate\Support\Carbon;

class ajouterLait extends Component
{
    public $clients;
    /**
     * Create a new component instance.
     *
     * @return void
     */



    public function __construct($clients)
    {
       


        $this->clients = $clients->whereIn('status', [1])->whereIn('statusJour', [0]);
    }



    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|\Closure|string
     */

    public function render()
    {


        // return view('components.ajouter-lait');
         return View::make('components.ajouter-lait')->with('clients', $clients);

    }
}
