<?php

namespace App\Http\Livewire;

use App\Models\Candidat;
use App\Models\Contact;
use App\Models\Newletter;
use App\Models\User;
use Livewire\Component;

class DashbaodComp extends Component
{
    public function render()
    {
        return view('livewire.home.index',[
            "users" => User::all(),
            "newletters" => Newletter::all(),
            "contacts" => Contact::all(),
            "candidats"=> Candidat::all()    
                ]) 
        ->extends("layouts.master")
        ->section("contenu"); 
    }
}
