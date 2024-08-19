<?php

namespace App\Http\Livewire;

use Carbon\Carbon;
use Livewire\Component;
use App\Models\Categorie;
use Livewire\WithPagination;
use Illuminate\Validation\Rule;
use App\Models\ProprieteArticle;
use Illuminate\Support\Facades\DB;

class CategorieComp extends Component
{
    use WithPagination;

    public $search = "";
    public $isAddCategorie = false;
    public $newCategorieName = "";
    // public $newPropModel = [];
    // public $editPropModel = [];
    public $newValue = "";
    public $selectedCategorie;

    protected $paginationTheme = "bootstrap";

    public function render()
    {

        Carbon::setLocale("fr");

        $searchCriteria = "%".$this->search."%";

        $data = [
            "categories" => Categorie::where("titre", "like", $searchCriteria)->latest()->paginate(5),
            // "proprietesTypeArticles" => ProprieteArticle::where("type_article_id", optional($this->selectedTypeArticle)->id)->get()
        ];
        return view('livewire.categories.index', $data)
        ->extends("layouts.master")
        ->section("contenu"); 
    }

    public function toggleShowAddCategorieForm(){
         if($this->isAddCategorie){
            $this->isAddCategorie = false;
            $this->newCategorieName = "";
            $this->resetErrorBag(["newCategorieName"]);
         }else{
            $this->isAddCategorie = true;
         }
    }

    public function addNewCategorie(){
        $validated = $this->validate([
            "newCategorieName" => "required|max:50|unique:categories,titre"
        ]);

        Categorie::create(["titre"=> $validated["newCategorieName"]]);

        $this->toggleShowAddCategorieForm();
        $this->dispatchBrowserEvent("showSuccessMessage", ["message"=>"Type d'article ajouté à jour avec succès!"]);

    }

    public function editCategorie(Categorie $categorie){
        $this->dispatchBrowserEvent("showEditForm", ["categorie" => $categorie]);
    }

    public function updateCategorie(Categorie $categorie, $valueFromJS){
        $this->newValue = $valueFromJS;
        $validated = $this->validate([
            "newValue" => ["required", "max:50", Rule::unique("categories", "titre")->ignore($categorie->id)]
        ]);

        $categorie->update(["titre"=> $validated["newValue"]]);

        $this->dispatchBrowserEvent("showSuccessMessage", ["message"=>"Categorie mis à jour avec succès!"]);

    }

    public function confirmDelete($name, $id){
        $this->dispatchBrowserEvent("showConfirmMessage", ["message"=> [
            "text" => "Vous êtes sur le point de supprimer $name de la liste des catégories. Voulez-vous continuer?",
            "title" => "Êtes-vous sûr de continuer?",
            "type" => "warning",
            "data" => [
                "categorie_id" => $id
            ]
        ]]);
    }

    public function deleteCategorie($id){
        $sql = "DELETE FROM posts WHERE categorie_id=?";
        DB::delete($sql,array($id));
        
       Categorie::destroy($id);
        $this->dispatchBrowserEvent("showSuccessMessage", ["message"=>"Categorie supprimé avec succès!"]);
    }

    // public function showProp(Categorie $categorie){

    //     $this->selectedCategorie = $categorie;

    //     $this->dispatchBrowserEvent("showModal", []);


    // }

    // public function addProp(){
    //     $validated = $this->validate([
    //         "newPropModel.nom" => [
    //             "required",
    //             Rule::unique("propriete_articles", "nom")->where("categorieid", $this->selectedCategorie->id)
    //         ],
    //         "newPropModel.estObligatoire" => "required"
    //     ]);

    //     ProprieteArticle::create([
    //         "nom" => $this->newPropModel["nom"],
    //         "estObligatoire" => $this->newPropModel["estObligatoire"],
    //         "type_article_id" => $this->selectedTypeArticle->id,
    //     ]);

    //     $this->newPropModel = [];
    //     $this->resetErrorBag();

    //     $this->dispatchBrowserEvent("showSuccessMessage", ["message"=>"Propriété ajoutée avec succès!"]);
    // }

    function showDeletePrompt($name , $id){
        $this->dispatchBrowserEvent("showConfirmMessage", ["message"=> [
            "text" => "Vous êtes sur le point de supprimer '$name' de la liste des propriétés d'articles. Voulez-vous continuer?",
            "title" => "Êtes-vous sûr de continuer?",
            "type" => "warning",
            "data" => [
                "propriete_id" => $id
            ]
        ]]);
    }

    // public function deleteProp(ProprieteArticle $proprieteArticle){

    //     $proprieteArticle->delete();
    //     $this->dispatchBrowserEvent("showSuccessMessage", ["message"=>"Propriété supprimée avec succès!"]);
    // }

    // public function editProp(ProprieteArticle $proprieteArticle){

    //     $this->editPropModel["nom"] = $proprieteArticle->nom;
    //     $this->editPropModel["estObligatoire"] = $proprieteArticle->estObligatoire;
    //     $this->editPropModel["id"] = $proprieteArticle->id;

    //     $this->dispatchBrowserEvent("showEditModal", []);
    // }

    // public function updateProp(){
    //     $this->validate([
    //         "editPropModel.nom" => [
    //             "required",
    //             Rule::unique("propriete_articles", "nom")->ignore($this->editPropModel["id"])
    //         ],
    //         "editPropModel.estObligatoire" => "required"
    //     ]);

    //     ProprieteArticle::find($this->editPropModel["id"])->update([
    //         "nom" => $this->editPropModel["nom"],
    //         "estObligatoire" => $this->editPropModel["estObligatoire"]
    //     ]);

    //     $this->dispatchBrowserEvent("showSuccessMessage", ["message"=>"Propriété mise à jour avec succès!"]);
    //     $this->closeEditModal();
    // }

    // public function closeModal(){
    //     $this->dispatchBrowserEvent("closeModal", []);
    // }

    // public function closeEditModal(){
    //     $this->editPropModel = [];
    //     $this->resetErrorBag();
    //     $this->dispatchBrowserEvent("closeEditModal", []);
    // }



}
