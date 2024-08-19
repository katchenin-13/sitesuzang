<?php

namespace App\Http\Livewire;

use App\Models\Atout;
use App\Models\role;
use App\Models\Service;
use Carbon\Carbon;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Storage;
use Livewire\Component;
use Livewire\WithPagination;
use Livewire\WithFileUploads;
use Image;

class ServiceComp extends Component
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

    public $edit_id;
    public $edit_titre;
    public $edit_extrait;
    public $edit_contenu;

    public $edit_title;
    public $edit_extraitang;
    public $edit_contenus;

    public $old_imageUrl;
    public $new_imageUrl;

    public function render()
    {
        Carbon::setLocale("fr");

        $query = Service::query();
        $search = $this->search;

        if(isset($search))
            $this->resetPage();

        $query->when($search != "", function($query) use($search){
            $query->where("titre", "like", "%{$search}%");
        });
        return view('livewire.services.index',[
            "services" => $query->latest()->paginate(5),
            "service" => Service::find("id"),
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
                "extrait" => "required|max:140|min:120",
                "contenu" => "required",
                "imageUrl" => "image|max:2040"
            ];
        }
   


    }

    public function goToAddService(){
        $this->currentPage = PAGECREATEFORM;
    }

    public function goToEditService($id){
       
        $services = Service::findOrFail($id);
        $this->edit_id = $services->id;
        $this->edit_titre = $services->titre;
        $this->edit_extrait = $services->extrait;
        $this->edit_contenu= $services->contenu;

        $this->edit_title = $services->title;
        $this->edit_extraitang = $services->extraitanedit_extraitang;
        $this->edit_contenus = $services->contenusedit_contenus;

        $this->old_imageUrl= $services->imageUrl;
      
        $this->currentPage = PAGEEDITFORM;
      

     
    }
    public function goToListService(){
        $this->currentPage = PAGELIST;
      
    }
    public function resetField()
    {
        $this->titre = "";
        $this->extrait = "";
        $this->contenu = "";

        $this->title = "";
        $this->extraitang = "";
        $this->contenus = "";

        $this->imageUrl = "";

        $this->edit_titre = "";
        $this->edit_extrait = "";
        $this->edit_contenu = "";

        $this->edit_title;
        $this->edit_extraitang;
        $this->edit_contenus;
        
        $this->new_imageUrl = "";
        $this->old_imageUrl = "";
        $this->edit_id = "";
    }

    public function addService(){

        $services = new Service();
        $this->validate([
            "titre" => "required",
            "extrait" => "required|max:140|min:120",
           "contenu" => "required",

            "title" => "required",
            "extraitang" => "required|max:140|min:120",
            "contenus" => "required",
        //    "imageUrl" => "image|max:2040"
        ]);

        $filename = "";
        if ($this->imageUrl) {
            $filename = $this->imageUrl->store('services', 'public');
            // $image = Image::make(public_path($filename))->fit(200, 200);
            // $filename = "storage/".$path;
            // $image->save();
        } else {
            $filename = Null;
        }

        $services->titre = $this->titre;
        $services->extrait = $this->extrait;
        $services->contenu = $this->contenu;

        $services->title = $this->title;
        $services->extraitang = $this->extraitang;
        $services->contenus = $this->contenus;
        // $services->imageUrl = $filename;
        $result = $services->save();
        if ($result) {
            $this->resetField();
            $this->dispatchBrowserEvent("showSuccessMessage", ["message"=>"Atout créé avec succès!"]);

        } else {
          ///////////
        }
        
    }
    public function updateService($id)
    {
        $services =Service::findOrFail($id);
        $this->validate([
            "edit_titre" => "required",
            "edit_extrait" => "required|max:140|min:120",
           "edit_contenu" => "required",

            "edit_title" => "required",
            "edit_extraitang" => "required|max:140|min:120",
            "edit_contenus" => "required",
        //    "imageUrl" => "image|max:2040"
        ]);

        $filename = "";
        $destination=public_path('storage\\'.$services->imageUrl);
        if ($this->new_imageUrl != null) {
            if(File::exists($destination)){
                File::delete($destination);
            }
            $filename = $this->new_imageUrl->store('services', 'public');
        } else {
            $filename = $this->old_imageUrl;
        }

        $services->titre = $this->edit_titre;
        $services->extrait = $this->edit_extrait;
        $services->contenu = $this->edit_contenu;

        $services->title = $this->edit_title;
        $services->extraitang = $this->edit_extraitang;
        $services->contenus = $this->edit_contenus;
        // $services->imageUrl = $filename;
        $result = $services->save();
        // dd( $clients);
        
        if ($result) {
            $this->resetField();
            $this->dispatchBrowserEvent("showSuccessMessage", ["message"=>"Service mis à jour avec succès!"]);
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
                "service_id" => $id
            ]
        ]]);
    }

    public function deleteService($id){
        Service::destroy($id);

        $this->dispatchBrowserEvent("showSuccessMessage", ["message"=>"Atout supprimé avec succès!"]);
    }

}

