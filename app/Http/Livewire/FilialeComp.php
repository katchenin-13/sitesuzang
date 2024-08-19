<?php

namespace App\Http\Livewire;

use App\Models\Filiale;
use App\Models\role;
use Carbon\Carbon;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Storage;
use Livewire\Component;
use Livewire\WithPagination;
use Livewire\WithFileUploads;
use Image;

class FilialeComp extends Component
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

    public $twit;
    public $instag; 
    public $faceb; 
    public $detail;
    public $lin;
    public $imageUrl;

    public $edit_id;
    public $edit_titre;
    public $edit_extrait;
    public $edit_contenu;

    public $edit_title;
    public $edit_extraitang;
    public $edit_contenus;

    public $edit_twit;
    public $edit_instag; 
    public $edit_faceb; 
    public $edit_detail;
    public $edit_lin;
    public $old_imageUrl;
    public $new_imageUrl;

    public function render()
    {
        Carbon::setLocale("fr");

        $query = Filiale::query();
        $search = $this->search;

        if(isset($search))
            $this->resetPage();

        $query->when($search != "", function($query) use($search){
            $query->where("titre", "like", "%{$search}%");
        });

        return view('livewire.filiales.index',[
            "filiales" => $query->latest()->paginate(5),
            "filiale" => Filiale::find("id"),
            "roles" => Role::all()
        ])

        ->extends("layouts.master")
        ->section("contenu");
    }

   

    public function goToAddFiliale(){
        $this->currentPage = PAGECREATEFORM;
    }

    public function goToEditFiliale($id){
       
        $filiales = Filiale::findOrFail($id);
        $this->edit_id = $filiales->id;
        $this->edit_titre = $filiales->titre;
        $this->edit_extrait = $filiales->extrait;
        $this->edit_contenu = $filiales->contenu;

        $this->edit_title = $filiales->title;
        $this->edit_extraitang = $filiales->extraitang;
        $this->edit_contenus = $filiales->contenus;

        $this->edit_twit= $filiales->links1;
        $this->edit_faceb= $filiales->links2;
        $this->edit_instag= $filiales->links3;
        $this->edit_lin= $filiales->links4;
        $this->old_imageUrl= $filiales->imageUrl;
      
        $this->currentPage = PAGEEDITFORM;
      

     
    }
    public function goToListFiliale(){
        $this->currentPage = PAGELIST;
        // $this->editClient = [];
    }
    public function resetField()
    {
        
        $this->titre = "";
        $this->extrait = "";
        $this->contenu = "";

        $this->title = "";
        $this->extraitang = "";
        $this->contenus = "";


        $this->twit = "";
        $this->faceb = "";
        $this->instag = "";
        $this->lin = "";
        $this->imageUrl = "";

        $this->edit_titre = "";
        $this->edit_extrait = "";
        $this->edit_contenu = "";

        $this->edit_title = "";
        $this->edit_extraitang = "";
        $this->edit_contenus = "";

        $this->edit_twit = "";
        $this->edit_faceb = "";
        $this->edit_instag = "";
        $this->edit_lin = "";
        $this->new_imageUrl = "";
        $this->old_imageUrl = "";
        $this->edit_id = "";
    }

    public function addFiliale(){

        $filiales = new Filiale();
        $this->validate([
            "titre" => "required",
            "extrait" => "string|max:150|min:10|required|",
           "contenu" => "required",

            "title" => "required",
            "extraitang" => "string|max:150|min:10|required|",
            "contenus" => "required",

           "twit" => "max:100",
           "faceb" => "max:100",
           "instag" => "max:100",
           "lin" => "max:100",
           "imageUrl" => "image|max:2040"
        ]);

        $filename = "";
        if ($this->imageUrl) {
            $filename = $this->imageUrl->store('filiales', 'public');
            // $image = Image::make(public_path($filename))->fit(200, 200);
            // $filename = "storage/".$path;
            // $image->save();
        } else {
            $filename = Null;
        }

        $filiales->titre = $this->titre;
        $filiales->extrait = $this->extrait;
        $filiales->contenu = $this->contenu;

        $filiales->title = $this->title;
        $filiales->extraitang = $this->extraitang;
        $filiales->contenus = $this->contenus;

        $filiales->links1 = $this->twit;
        $filiales->links2 = $this->faceb;
        $filiales->links3 = $this->instag;
        $filiales->links4 = $this->lin;
        $filiales->imageUrl = $filename;
        $result = $filiales->save();
        if ($result) {
            $this->resetField();
            $this->dispatchBrowserEvent("showSuccessMessage", ["message"=>"filiales créé avec succès!"]);

        } else {
          ///////////
        }
        
    }
    public function updateFiliale($id)
    {
        $filiales =Filiale::findOrFail($id);
        $this->validate([
            "edit_titre" => "required",
            "edit_extrait" => "string|max:150|min:10|required|",
            "edit_contenu" => "required",

            "edit_title" => "required",
            "edit_extraitang" => "string|max:150|min:10|required|",
            "edit_contenus" => "required",

            "edit_twit" => "max:100",
            "edit_faceb" => "max:100",
            "edit_instag" => "max:100",
            "edit_lin" => "max:100",
           
        //    "imageUrl" => "image|max:2040"
        ]);

        $filename = "";
        $destination=public_path('storage\\'.$filiales->imageUrl);
        if ($this->new_imageUrl != null) {
            if(File::exists($destination)){
                File::delete($destination);
            }
            $filename = $this->new_imageUrl->store('filiales', 'public');
        } else {
            $filename = $this->old_imageUrl;
        }

        $filiales->titre = $this->edit_titre;
        $filiales->extrait = $this->edit_extrait;
        $filiales->contenu = $this->edit_contenu;

        $filiales->title = $this->edit_title;
        $filiales->extraitang = $this->edit_extraitang;
        $filiales->contenus = $this->edit_contenus;

        $filiales->links1 = $this->edit_twit;
        $filiales->links2 = $this->edit_faceb;
        $filiales->links3 = $this->edit_instag;
        $filiales->links4 = $this->edit_lin;
        $filiales->imageUrl = $filename;
        $result = $filiales->save();
        // dd( $filiales);
        
        if ($result) {
            $this->resetField();
            $this->dispatchBrowserEvent("showSuccessMessage", ["message"=>"filiale mis à jour avec succès!"]);
        } else {
            // session()->flash('error', 'Not Update Successfully');
        }
    }
    protected function cleanupOldUploads(){

        $storage = Storage::disk("local");

        foreach($storage->allFiles("livewire-tmp") as $pathFileName){

            if(! $storage->exists($pathFileName)) continue;

            $fiveSecondsDelete = now()->subSeconds(5)->timestamp;

            if($fiveSecondsDelete > $storage->lastModified($pathFileName)){
                $storage->delete($pathFileName);
            }
        }
    }



    public function confirmDelete($name, $id){
        $this->dispatchBrowserEvent("showConfirmMessage", ["message"=> [
            "text" => "Vous êtes sur le point de supprimer $name de la liste des filiales. Voulez-vous continuer?",
            "title" => "Êtes-vous sûr de continuer?",
            "type" => "warning",
            "data" => [
                "filiale_id" => $id
            ]
        ]]);
    }

    public function deleteFiliale($id){
        Filiale::destroy($id);

        $this->dispatchBrowserEvent("showSuccessMessage", ["message"=>"filiales supprimé avec succès!"]);
    }

}

