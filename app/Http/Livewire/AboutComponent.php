<?php

namespace App\Http\Livewire;

use App\Models\Competence;
use App\Models\Contenu;
use App\Models\Filiale;
use Livewire\Component;

class AboutComponent extends Component
{
    public function render()
    {
        return view('livewire.font.about-component',[
            "contenus" => Contenu::all(),
            "competences" => Competence::all(),
            "filiales" => Filiale::latest()->paginate(4)
        ])->layout("layouts.base");
    }
}
