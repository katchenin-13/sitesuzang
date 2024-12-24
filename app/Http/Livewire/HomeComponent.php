<?php

namespace App\Http\Livewire;

use App\Models\Client;
use App\Models\Contenu;
use Livewire\Component;
use App\Models\Newletter;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\Validator;

class HomeComponent extends Component
{
    public $nom;
    public $adresse;
 
    public function render()
    {
        /*for ($i=11; $i < 13; $i++) { 

            $select ="SELECT * FROM user_role WHERE user_id=? AND role_id =?";
            
              $result= DB::select($select,array($i,$i));
            // dd(DB::select($select,array($i,$i)));
            if (count($result)==0) {

               $sql = "INSERT INTO user_role VALUES(?,?)";
               DB::insert($sql,array($i,$i));
            }
           
           };*/
        
        return view('livewire.font.home-component',[
            "contenues" => Contenu::all(),
            "clients" => Client::latest()->get()
          
        ])->layout("layouts.base");
    }
    public function index(Request $request){
        $validator = Validator::make($request->all(), [
            'nom' => 'required',
            'adresse' => 'required|email'
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
                $Newletter = new Newletter;
                $Newletter->nom = $request->input('nom');
                $Newletter->adresse = $request->input('adresse');
                $Newletter->save();
            
                return response()->json([
                    'status'=>200,
                    'message'=>'Votre souscription est prise en compte.'
                ]);
            }
        }


    public function lang()
    {
        return view('livewire.font.home-component');
    }

    // public function lang_change(Request $request)
    // {
    //     App::setLocale($request->lang);
    //     session()->put('lang_code', $request->lang);
    //     return redirect()->back();
    // }

}
