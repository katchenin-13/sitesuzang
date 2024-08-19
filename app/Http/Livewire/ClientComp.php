<?php

namespace App\Http\Livewire;

use App\Models\Client;

use App\Models\role;
use Carbon\Carbon;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Storage;
use Livewire\Component;
use Livewire\WithPagination;
use Livewire\WithFileUploads;
use Intervention\Image\Facades\Image;
use phpDocumentor\Reflection\Types\This;

class ClientComp extends Component
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

    public $detail;
    public $imageUrl;

    public $edit_id;
    public $edit_titre;
    public $edit_extrait;
    public $edit_contenu;

    public $edit_title;
    public $edit_extraitang;

    public $edit_detail;
    public $old_imageUrl;
    public $new_imageUrl;

    public function render()
    {
        Carbon::setLocale("fr");

        $query = Client::query();
        $search = $this->search;

        if(isset($search))
            $this->resetPage();

        $query->when($search != "", function($query) use($search){
            $query->where("titre", "like", "%{$search}%");
        });

        return view('livewire.clients.index',[
            "clients" =>$query->latest()->paginate(5),
            "client" => Client::find("id"),
            "roles" => Role::all()
        ])

        ->extends("layouts.master")
        ->section("contenu");
    }



    public function goToAddClient(){
        $this->currentPage = PAGECREATEFORM;
    }

    public function goToEditClient($id){
       
        $clients = Client::findOrFail($id);
        $this->edit_id = $clients->id;
        $this->edit_titre = $clients->titre;
        $this->edit_extrait = $clients->extrait;

        $this->edit_title = $clients->title;
        $this->edit_extraitang = $clients->extraitang;

        $this->edit_detail = $clients->links1;
        // $this->edit_contenu= $clients->contenu;
        $this->old_imageUrl= $clients->imageUrl;
      
        $this->currentPage = PAGEEDITFORM;
      

     
    }
    public function goToListClient(){
        $this->currentPage = PAGELIST;
       // $this->editClient = [];
    }
    public function resetField()
    {
        $this->titre = "";
        $this->extrait = "";

        $this->title = "";
        $this->extraitang = "";

        $this->detail = "";
        // $this->contenu = "";
        $this->imageUrl = "";

        $this->edit_titre = "";
        $this->edit_extrait = "";

        $this->edit_title = "";
        $this->edit_extraitang = "";
        $this->edit_detail= "";
        // $this->edit_contenu = "";
        $this->new_imageUrl = "";
        $this->old_imageUrl = "";
        $this->edit_id = "";
    }

    public function addClient(){

        $clients = new Client();
        $this->validate([
            "titre" => "required",
            "extrait" =>"required|max:50",

            "title" => "required",
            "extraitang" => "required|max:50",
            "detail" => "max:100",
        //    "contenu" => "required",
           "imageUrl" => "image|max:2040"
        ]);

        $filename = "";
        if ($this->imageUrl) {
            $filename = $this->imageUrl->store('clients', 'public');
            // $image = Image::make(public_path($filename))->fit(200, 200);
            // $filename = "storage/".$path;
            // $image->save();

        } else {
            $filename = Null;
        }

        $clients->titre = $this->titre;
        $clients->extrait = $this->extrait;

        $clients->title = $this->title;
        $clients->extrait = $this->extrait;
        $clients->links1 = $this->detail;
        // $clients->contenu = $this->contenu;
        $clients->imageUrl = $filename;
        $result = $clients->save();
        if ($result) {
            $this->resetField();
            $this->dispatchBrowserEvent("showSuccessMessage", ["message"=>"client créé avec succès!"]);

        } else {
          ///////////
        }
        
    }
    public function updateClient($id)
    {
        $clients = Client::findOrFail($id);
        $this->validate([
            "edit_titre" => "required",
            "edit_extrait" => "required|max:50",

            "edit_title" => "required",
            "edit_extraitang" => "required|max:50",
            
            "edit_detail" => "max:100",
        //    "edit_contenu" => "required",
           "imageUrl" => "image|max:2040"
        ]);
 
        $filename = "";
        $destination=public_path('storage\\'.$clients->imageUrl);
        if ($this->new_imageUrl != null) {
            if(File::exists($destination)){
                File::delete($destination);
            }
            $filename = $this->new_imageUrl->store('clients', 'public');
        } else {
            $filename = $this->old_imageUrl;
        }
       
        $clients->titre = $this->edit_titre;
        $clients->extrait = $this->edit_extrait;

        $clients->title = $this->edit_title;
        $clients->extraitang = $this->edit_extraitang;
        
        $clients->links1 = $this->edit_detail;
        // $clients->contenu = $this->edit_contenu;
        $clients->imageUrl = $filename;
        $result = $clients->save();
        
        
        if ($result) {
            $this->resetField();
            $this->dispatchBrowserEvent("showSuccessMessage", ["message"=>"Client mis à jour avec succès!"]);
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
            "text" => "Vous êtes sur le point de supprimer $name de la liste des Clients. Voulez-vous continuer?",
            "title" => "Êtes-vous sûr de continuer?",
            "type" => "warning",
            "data" => [
                "client_id" => $id
            ]
        ]]);
    }

    public function deleteClient($id){
        Client::destroy($id);

        $this->dispatchBrowserEvent("showSuccessMessage", ["message"=>"Client supprimé avec succès!"]);
    }

}

