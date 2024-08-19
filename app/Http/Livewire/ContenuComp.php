<?php

namespace App\Http\Livewire;

use Carbon\Carbon;
use App\Models\role;
use Illuminate\Auth;

use App\Models\Contenu;
use Livewire\Component;
use Livewire\WithPagination;
use Livewire\WithFileUploads;
use Illuminate\Validation\Rule;
use Illuminate\Support\Facades\File;
use Intervention\Image\Facades\Image;
use Illuminate\Support\Facades\Storage;
use Illuminate\Auth\AuthServiceProvider;
use Illuminate\Support\Facades\Auth as FacadesAuth;


class ContenuComp extends Component
{
    use WithPagination;
    use WithFileUploads;
    protected $paginationTheme = "bootstrap";
    public $currentPage = PAGELIST;
    
    public $search = "";
    public $titre;
    public $extrait;
    public $contenu;

    public $title;
    public $extraitang;
    public $contenus;
   

    public $imageUrl;
    public $type;
    public $pagef;
    public $user_id;
    
    public $filtreType = "", $filtreEtat = "";

    public $edit_id;
    public $edit_titre;
    public $edit_extrait;
    public $edit_contenu;

    public $edit_title;
    public $edit_extraitang;
    public $edit_contenus;
  

    public $old_imageUrl;
    public $new_imageUrl;
    public $edit_type;
    public $edit_page;
    // public $update_by;

    public function render()
    {
        Carbon::setLocale("fr");

        $contenuQuery = Contenu::query();
       


        if($this->search != ""){
            $this->resetPage();
            $contenuQuery->where("titre", "LIKE",  "%". $this->search ."%");
                        
        }


        if($this->filtreType != ""){
            $contenuQuery->where("page", $this->filtreType);
        }

        return view('livewire.contenus.index',[
            "contenuss" =>  $contenuQuery->latest()->paginate(5),
            "contenu" => Contenu::find("id"),
            "roles" => Role::all()
        ])
       
        ->extends("layouts.master")
        ->section("contenu"); 
       
    }

    /*
      $validatedData['created_by'] = Auth::user()->id;
        $validatedData['updated_by'] = Auth::user()->id;
    */
   

    public function goToAddContenu(){
        $this->currentPage = PAGECREATEFORM;
      
    }

    public function goToEditContenu($id){
       
        $contenus =Contenu::findOrFail($id);
       
        $this->edit_id = $contenus->id;
        $this->edit_titre = $contenus->titre;
        $this->edit_extrait = $contenus->extrait;
        $this->edit_contenu= $contenus->contenu;

        $this->edit_title = $contenus->title;
        $this->edit_extraitang = $contenus->extraitang;
        $this->edit_contenus = $contenus->contenus;
      
        $this->old_imageUrl= $contenus->imageUrl;
        $this->edit_type= $contenus->type;
        $this->edit_page= $contenus->page;
      
      
        $this->currentPage = PAGEEDITFORM;
      

     
    }
    public function goToListContenu(){
        $this->currentPage = PAGELIST;
      
    }
    public function resetField()
    {
        $this->titre = "";
        $this->extrait = "";
        $this->contenu = "";
        $this->imageUrl = "";

        $this->title ="";
        $this->extraitang = "";
        $this->contenus ="";
        
       
        $this->edit_titre = "";
        $this->edit_extrait = "";
        $this->edit_contenu = "";

       $this->edit_title ="";
       $this->edit_extraitang = "";
       $this->edit_contenus ="";
        

        $this->new_imageUrl = "";
        $this->old_imageUrl = "";
        $this->edit_id = "";
    }

    public function addContenu(){
       
        $contenus = new Contenu();
        $filename = "images/imageplaceholder.png";
       
        if ($this->imageUrl!= null) {
            // $filename = $this->imageUrl->store('contenus', 'public');
            // // $image = Image::make(public_path($filename))->fit(200, 200);
            // $filename = "storage/".$filename;
            // $$filename->save();
            // $filename = "images/imageplaceholder.png";

            $filename = $this->imageUrl->store('contenus', 'public');
            //  $filename = "storage/".$path;
    
            // $image = Image::make(public_path($filename))->fit(200, 200);
            // $image->save();
    
        } else {
            $filename = Null;
        }

        $this->validate([
            "titre" => "required",
            "extrait" => "required|max:1000|min:10",
           "contenu" => "required",
           
            // "title" => "required",
            // "extraitang" => "required|max:1000|min:10",
            // "contenus" => "required",

           "imageUrl" => "image|max:2040",
           'type' => 'required|unique:contenus,type',
           'pagef' => 'required',
        ]);

        $this->user_id = auth()->user()->id;
       
        $contenus->titre = $this->titre;
        $contenus->extrait = $this->extrait;
        $contenus->contenu = $this->contenu;

        $contenus->title = $this->title;
        $contenus->extraitang = $this->extraitang;
        $contenus->contenus = $this->contenus;
        
        $contenus->type =  $this->type;
        $contenus->page =  $this->pagef;
        $contenus->user_id = $this->user_id ;
        $contenus->imageUrl = $filename;
        $result = $contenus->save();
        if ($result) {
            $this->resetField();
            $this->dispatchBrowserEvent("showSuccessMessage", ["message" => "Contenu créé avec succès!"]);

        } else {
          ///////////
        }
        
    }
    public function updateContenu($id)
    {
        
        $contenus =Contenu::findOrFail($id);
      
        $filename = "";
        $destination=public_path('storage\\'.$contenus->imageUrl);
        if ($this->new_imageUrl != null) {
            if(File::exists($destination)){
                File::delete($destination);
            }
            $filename = $this->new_imageUrl->store('contenus', 'public');
        } else {
            $filename = $this->old_imageUrl;
        }
        $this->user_id = auth()->user()->id;
       
        $this->validate([
            'edit_titre' => 'required',
            'edit_extrait' => 'required|max:1000|min:10',
           'edit_contenu' => 'required',

            // 'edit_title' => 'required',
            // 'edit_extraitang' => 'required|max:1000|min:10',
            // 'edit_contenus' => 'required',
        //    "new_imageUrl" => "image|max:2040",
        //    'edit_type' => 'required|unique:contenus,type',
        ]);
       
        $typeupdate = $contenus['type'];
        // $pageupdate = $contenus['page'];
        $contenus->titre = $this->edit_titre;
        $contenus->extrait = $this->edit_extrait;
        $contenus->contenu = $this->edit_contenu;

        $contenus->title = $this->edit_title;
        $contenus->extraitang = $this->edit_extraitang;
        $contenus->contenus = $this->edit_contenus;

        $contenus->title = $this->edit_titre;
        $contenus->extraitang = $this->edit_extraitang;
        $contenus->contenus = $this->edit_contenus;
       

        $contenus->type =   $typeupdate;
        $contenus->page =   $this->edit_page;
        $contenus->user_id = $this->user_id ;
        $contenus->imageUrl = $filename;
        $result = $contenus->save();
        if ($result) {
            $this->resetField();
            $this->dispatchBrowserEvent("showSuccessMessage", ["message"=>"Contenu créé avec succès!"]);

        } else {
          ///////////
        }

    }
   



    public function confirmDelete($name, $id){
        $this->dispatchBrowserEvent("showConfirmMessage", ["message" => [
            "text" => "Vous êtes sur le point de supprimer $name de la liste des contenus. Voulez-vous continuer?",
            "title" => "Êtes-vous sûr de continuer?",
            "type" => "warning",
            "data" => [
                "contenu_id" => $id
            ]
        ]]);
    }

    public function deleteContenu($id){
        Contenu::destroy($id);

        $this->dispatchBrowserEvent("showSuccessMessage", ["message" => "contenu supprimé avec succès!"]);
    }

}

