<?php

namespace App\Http\Livewire;

use App\Models\Contenu;
use App\Models\Service;
use Livewire\Component;
use Livewire\WithPagination;

class ServicesComponent extends Component
{
   use WithPagination;
    protected $paginationTheme = "bootstrap";
 
    public function render()
    {
        return view('livewire.font.services-component',[
            "contenus" => Contenu::all(),
            "services" => Service::latest()->paginate(9)
        ])->layout("layouts.base");
    }
}
