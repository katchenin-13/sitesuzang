<?php

namespace App\Http\Controllers;

use App\Models\Newletter;
use Livewire\Component;

use Illuminate\Http\Request;

class AddNewletterControlller extends Controller
{
     public $add =[];
     
    public function index(Request $request){
        $this->add =['nom' => $request->nom,
        'adresse' => $request->adresse];

        Newletter::create($this->add);
        $this->add =[];
      session()->flash('sentmessage','Votre souscription est prise en compte, nous vous demandons de continuer à exploirer le site');
      return view('livewire.font.home-component');
       
    }
}
