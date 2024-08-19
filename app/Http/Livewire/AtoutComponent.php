<?php

namespace App\Http\Livewire;

use App\Models\Atout;
use App\Models\Contenu;
use Livewire\Component;
use Livewire\WithFileUploads;
use Livewire\WithPagination;

class AtoutComponent extends Component
{
    use WithPagination;
    use WithFileUploads;
    protected $paginationTheme = "bootstrap";
    public function render()
    {
        return view('livewire.font.atout-component',[
            "contenus" => Contenu::all(),
            "atouts" => Atout::latest()->paginate(4)
        ])->layout("layouts.base");
    }
}
