<?php

namespace App\Http\Livewire;

use App\Models\Atout;
use App\Models\Competence;
use App\Models\role;
use Carbon\Carbon;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Storage;
use Livewire\Component;
use Livewire\WithPagination;
use Livewire\WithFileUploads;
use Image;

class CompetenceComp extends Component
{
    use WithPagination;
    use WithFileUploads;
    protected $paginationTheme = "bootstrap";
    public $currentPage = PAGELIST;

    public $titre;
    public $extrait;

    public $title;
   
   

    public $edit_id;
    public $edit_titre;
    public $edit_extrait;

    public $edit_title;
   
    

    public function render()
    {
        Carbon::setLocale("fr");
        return view('livewire.competences.index',[
            "competences" => Competence::latest()->paginate(5),
            "competence" => Competence::find("id"),
            "roles" => Role::all()
        ])

        ->extends("layouts.master")
        ->section("contenu");
    }

    public function goToAddCompetence(){
        $this->currentPage = PAGECREATEFORM;
    }

    public function goToEditCompetence($id){
       
        $competences = Competence::findOrFail($id);
        $this->edit_id = $competences->id;
        $this->edit_titre = $competences->titre;
        $this->edit_extrait = $competences->extrait;

        $this->edit_title = $competences->title;
       
        $this->currentPage = PAGEEDITFORM;
       
    }

    public function goToListCompetence(){
        $this->currentPage = PAGELIST;
    }


    public function resetField()
    {
        $this->titre = "";
        $this->extrait = "";

        $this->title ="";
        
        

        $this->edit_titre = "";
        $this->edit_extrait = "";

        $this->edit_title = "";
       
        $this->edit_id = "";
    }


    public function addCompetence(){

        $competences = new Competence();
        $this->validate([
            "titre" => "required",
            "extrait" =>"max:2",

            "title" => "required",
            
        ]);

     

        $competences->titre = $this->titre;
        $competences->extrait = $this->extrait;


        $competences->title = $this->title;
       
        $result = $competences->save();
        if ($result) {
            $this->resetField();
            $this->dispatchBrowserEvent("showSuccessMessage", ["message"=>"competences créé avec succès!"]);

        } else {
          ///////////
        }
        
    }
    public function updateCompetence($id)
    {
        
        $competences =Competence::findOrFail($id);
        $this->validate([
            "edit_titre" => "required",
            "edit_extrait" =>  "max:2",
            "edit_title" => "required",
        ]);
       

    
        $competences->titre = $this->edit_titre;
        $competences->extrait = $this->edit_extrait;

        $competences->title = $this->edit_title;
      
        
        $result = $competences->save();
    
        if ($result) {
            $this->resetField();
            $this->dispatchBrowserEvent("showSuccessMessage", ["message"=>"competences mis à jour avec succès!"]);
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
            "text" => "Vous êtes sur le point de supprimer $name de la liste des competences. Voulez-vous continuer?",
            "title" => "Êtes-vous sûr de continuer?",
            "type" => "warning",
            "data" => [
                "competence_id" => $id
            ]
        ]]);
    }

    public function deleteCompetence($id){
        Competence::destroy($id);

        $this->dispatchBrowserEvent("showSuccessMessage", ["message"=>"competence supprimé avec succès!"]);
    }

}

