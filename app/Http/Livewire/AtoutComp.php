<?php

namespace App\Http\Livewire;

use App\Models\Atout;
use App\Models\role;
use Carbon\Carbon;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Storage;
use Livewire\Component;
use Livewire\WithPagination;
use Livewire\WithFileUploads;
use Image;

class AtoutComp extends Component
{
    use WithPagination;
    use WithFileUploads;
    protected $paginationTheme = "bootstrap";
    public $currentPage = PAGELIST;

    public $titre;
    public $extrait;
    public $contenu;
    public $imageUrl;

    public $title;
    public $extraitang;
    public $contenus;

    public $edit_id;
    public $edit_titre;
    public $edit_extrait;
    public $edit_contenu;

    public $edit_title;
    public $edit_extraitang;
    public $edit_contenus;

    public $old_imageUrl;
    public $new_imageUrl;

    public $search = "";

    public function render()
    {
        Carbon::setLocale("fr");
        $query = Atout::query();
        $search = $this->search;

        if(isset($search))
            $this->resetPage();

        $query->when($search != "", function($query) use($search){
            $query->where("titre", "like", "%{$search}%");
           
        });
        return view('livewire.atouts.index',[
            "atouts" =>  $query->latest()->paginate(5),
            "atout" => Atout::find("id"),
            "roles" => Role::all()
        ])

        ->extends("layouts.master")
        ->section("contenu");
    }

    public function rules(){
        if($this->currentPage == PAGEEDITFORM){

            // 'required|email|unique:users,email Rule::unique("users", "email")->ignore($this->editService['id'])
            return [
                "titre" => "required",
                "extrait" => "required|max:300|min:10|required|",
                "contenu" => "required",
                "title" => "required",
                "extraitang" => "required|max:300|min:10|required|",
                "contenus" => "required",
                // "imageUrl" => "image|max:2040"
            ];
        }
   


    }

    public function goToAddAtout(){
        $this->currentPage = PAGECREATEFORM;
    }

    public function goToEditAtout($id){
       
        $atouts = Atout::findOrFail($id);
        $this->edit_id = $atouts->id;
        $this->edit_titre = $atouts->titre;
        $this->edit_extrait = $atouts->extrait;
        $this->edit_contenu= $atouts->contenu;

        $this->edit_title = $atouts->title;
        $this->edit_extraitang = $atouts->extraitang;
        $this->edit_contenus = $atouts->contenus;
        
        // $this->old_imageUrl= $atouts->imageUrl;
      
        $this->currentPage = PAGEEDITFORM;
      

     
    }
    public function goToListAtout(){
        $this->currentPage = PAGELIST;
      
    }
    public function resetField()
    {
        $this->titre = "";
        $this->extrait = "";
        $this->contenu = "";

        $this->title ="";
        $this->extraitang = "";
        $this->contenus ="";
        // $this->imageUrl = "";

        $this->edit_titre = "";
        $this->edit_extrait = "";
        $this->edit_contenu = "";
        
        $this->edit_title = "";
        $this->edit_extraitang = "";
        $this->edit_contenus = "";
        // $this->new_imageUrl = "";
        // $this->old_imageUrl = "";
        $this->edit_id = "";
    }

    public function addAtout(){

        $atouts = new Atout();
        $this->validate([
            "titre" => "required",
            "extrait" => "required|max:150",
           "contenu" => "required",

            "title" => "required",
            "extraitang" => "required|max:150",
            "contenus" => "required",
        //    "imageUrl" => "image|max:2040"
        ]);

        $filename = "";
        if ($this->imageUrl) {
            $filename = $this->imageUrl->store('atouts', 'public');
            // $image = Image::make(public_path($filename))->fit(200, 200);
            // $filename = "storage/".$path;
            // $image->save();
        } else {
            $filename = Null;
        }

        $atouts->titre = $this->titre;
        $atouts->extrait = $this->extrait;
        $atouts->contenu = $this->contenu;

        $atouts->title = $this->title;
        $atouts->extraitang = $this->extraitang;
        $atouts->contenus= $this->contenus;
        // $atouts->imageUrl = $filename;
        $result = $atouts->save();
        if ($result) {
            $this->resetField();
            $this->dispatchBrowserEvent("showSuccessMessage", ["message"=>"Atout créé avec succès!"]);

        } else {
          ///////////
        }
        
    }
    public function updateAtout($id)
    {
        $atouts =Atout::findOrFail($id);
        $this->validate([
            "edit_titre" => "required",
            "edit_extrait" =>  "required|max:150",
           "edit_contenu" => "required",
        //    "imageUrl" => "image|max:2040"
        ]);

        $filename = "";
        $destination=public_path('storage\\'.$atouts->imageUrl);
        if ($this->new_imageUrl != null) {
            if(File::exists($destination)){
                File::delete($destination);
            }
            $filename = $this->new_imageUrl->store('atouts', 'public');
        } else {
            $filename = $this->old_imageUrl;
        }

        $atouts->titre = $this->edit_titre;
        $atouts->extrait = $this->edit_extrait;
        $atouts->contenu = $this->edit_contenu;

        $atouts->title = $this->edit_title;
        $atouts->extraitang = $this->edit_extraitang;
        $atouts->contenus = $this->edit_contenus;
        // $atouts->imageUrl = $filename;
        $result = $atouts->save();
        // dd( $clients);
        
        if ($result) {
            $this->resetField();
            $this->dispatchBrowserEvent("showSuccessMessage", ["message"=>"atout mis à jour avec succès!"]);
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
            "text" => "Vous êtes sur le point de supprimer $name de la liste des atout. Voulez-vous continuer?",
            "title" => "Êtes-vous sûr de continuer?",
            "type" => "warning",
            "data" => [
                "atout_id" => $id
            ]
        ]]);
    }

    public function deleteAtout($id){
        Atout::destroy($id);

        $this->dispatchBrowserEvent("showSuccessMessage", ["message"=>"atout supprimé avec succès!"]);
    }

}

