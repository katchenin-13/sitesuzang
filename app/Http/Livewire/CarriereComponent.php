<?php

namespace App\Http\Livewire;

use App\Mail\CandidatMail;
use App\Models\Candidat;
use App\Models\Categorie;
use App\Models\Contenu;
use App\Models\Post;
use Mail;
use Livewire\Component;
use Livewire\WithPagination;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
class CarriereComponent extends Component
{
    use WithPagination;
   

    protected $paginationTheme = "bootstrap";

   
   
       // public $addCandidate=[];
    public function render()
    {
      
        return view('livewire.font.carriere-component',[
            "posts" => Post::latest()->paginate(5),
            "categories"=> Categorie::all(),
            "postss" => Post::all(),
            "contenus" => Contenu::all()
        ])->layout("layouts.base");

       
     
    }
   
    public function index(Request $request)
    {
       
        $detail =[
            'nom' => $request->nom,
            'telephone' => $request->telephone,
            'post_id' =>  $request->post,
            'adresse' => $request->adresse
         ];
                        
        $validator = Validator::make($request->all(), [
                'nom' => 'required',
                'telephone' => 'required|numeric',
                'adresse' => 'required|email',
                'post' => 'required',
                'cv' => 'required|file|mimes:pdf,PDF'
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
           
            // dd( $request->input('post'));
            $candidat = new Candidat;
            $candidat->nom = $request->input('nom');
            $candidat->telephone = $request->input('telephone');
            $candidat->post_id = $request->input('post');
            $candidat->adresse = $request->input('adresse');
            if ($request->hasFile('cv')) {
                $file = $request->file('cv');
                $extension = $file->getClientOriginalExtension();
                $filename ='SU'.date('Ymdhis').'.'.$extension;
                // $filename =time().'.'.$extension;
                $file->move('Stockage/Canditatscv/CV',$filename);
                $candidat->cv = $filename;
            }
            $candidat->save();
            Mail::to('contactsite@suzang-group.com')->send(new CandidatMail($detail));

            return response()->json([
                'status'=>200,
                'message'=>'Candidature enregistrée avec succès.'
            ]);

        }
    }
}

