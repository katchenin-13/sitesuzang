<?php

namespace App\Http\Livewire;
use App\Mail\ContactMail;
use App\Models\Contact;
use App\Models\Contenu;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Mail;
use Livewire\Component;
// use Illuminate\Validation\Rule;
class ContactComponent extends Component
{
    // public $nom;
    // public $telephone;
    // public $objet;
    // public $adresse; 
    // public $msg;
    public function render()
    {
        return view('livewire.font.contact-component',[
            "contenus" => Contenu::all()
        ])->layout("layouts.base");
    }
   
    public function addContacts( Request $request){
        $detail =[
            'nom' =>$request->nom,
            'telephone' => $request->telephone,
            'objet' => $request->objet,
            'adresse' =>$request->adresse,
            'msg' => $request->msg
         ];
        
        $validator = Validator::make($request->all(), [
            'nom' => 'required',
            'telephone' =>  'required|numeric',
            'objet' => 'required|max:100',
            'adresse' => 'required|email',
            'msg' => 'required'
        ]);
      
        if($validator->fails())
        {
            return response()->json([
                'status'=>400,
                'errors'=>$validator->messages()
            ]);
        }
        else
        {
            
            $contact = new Contact;
            $contact->nom = $request->input('nom');
            $contact->telephone = $request->input('telephone');
            $contact->objet = $request->input('objet');
            $contact->adresse = $request->input('adresse');
            $contact->msg = $request->input('msg');
            $contact->save();
            Mail::to('contactsite@suzang-group.com')->send(new ContactMail($detail)); 
            return response()->json([
                'status'=>200,
                'message'=>'message envoyé avec succès.'
            ]);
            
        }
    }
 }
