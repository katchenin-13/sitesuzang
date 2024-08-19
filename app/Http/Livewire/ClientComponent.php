<?php

namespace App\Http\Livewire;

use App\Models\Client;
use App\Models\Contenu;
use App\Models\Filiale;
use Livewire\Component;
use Livewire\WithFileUploads;
use Livewire\WithPagination;

class ClientComponent extends Component
{
    use WithPagination;
    use WithFileUploads;
    protected $paginationTheme = "bootstrap";
    public function render()
    {
        return view('livewire.font.client-component',[
            "contenus" => Contenu::all(),
            "clients" => Client::latest()->get()
        ])->layout("layouts.base");
    }
}
