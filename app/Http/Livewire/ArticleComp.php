<?php

namespace App\Http\Livewire;

use App\Models\Article;
use App\Models\Role;
use Carbon\Carbon;
use Livewire\Component;
use Livewire\WithPagination;
use Illuminate\Validation\Rule;

class ArticleComp extends Component
{
    use WithPagination;

    protected $paginationTheme = "bootstrap";
    public $currentPage = PAGELIST;

    //public $newArticle = [];
    public $editArticle = [];
    public $titre;
    public $contenue;


    public function render()
    {
        Carbon::setLocale("fr");

        return view('livewire.articles.index',[
            "articles" => Article::latest()->paginate(3),
            "roles" => Role::all()
        ])
        ->extends("layouts.master")
        ->section("contenu"); 
    }


    public function rules(){
        if($this->currentPage == PAGEEDITFORM){

            // 'required|email|unique:users,email Rule::unique("users", "email")->ignore($this->editService['id'])
            return [
                'editArticle.nom' => 'required',
                'editArticle.description' => 'required',
            ];
        }

    }
    public function goToAddArticle(){
        $this->currentPage = PAGECREATEFORM;
    }

    public function goToEditArticle( $id){

        $this->editArticle = Article::find($id)->toarray();

        
        $this->currentPage = PAGEEDITFORM;
      

      
    }
    public function goToListArticle(){
        $this->currentPage = PAGELIST;
        $this->editArticle = [];
    }


    public function addArticle(){

        // Vérifier que les informations envoyées par le formulaire sont correctes
        // $validated = $this->validate();
      
        // //dump($validated);
        // // Ajouter un nouvel utilisateur
        $article = new Article;
        $article->titre = $this->titre;
        $article->contenue = $this->contenue;
        $article->save();
        $this->titre ="";
        $this->contenue ="";

        $this->dispatchBrowserEvent("showSuccessMessage", ["message"=>"Article créé avec succès!"]);
    }

    public function updateArticle(){
       
        // Vérifier que les informations envoyées par le formulaire sont correctes
    //    $validated = $this->validate();
       

    //    $i= Article::find($this->editArticle["id"])->update($validated["editArticle"]);
       
        $article = Article::find($this->editArticle["id"]);
        $article->titre = $this->titre;
        $article->contenue = $this->contenue;
        $article->update();
        $this->titre ="";
        $this->contenue ="";
        $this->editArticle = [];

        $this->dispatchBrowserEvent("showSuccessMessage", ["message"=>"Article mis à jour avec succès!"]);

    }



    public function confirmDelete($name, $id){
        $this->dispatchBrowserEvent("showConfirmMessage", ["message"=> [
            "text" => "Vous êtes sur le point de supprimer $name de la liste des articles. Voulez-vous continuer?",
            "title" => "Êtes-vous sûr de continuer?",
            "type" => "warning",
            "data" => [
                "article_id" => $id
            ]
        ]]);
    }

    public function deleteUser($id){
        Article::destroy($id);

        $this->dispatchBrowserEvent("showSuccessMessage", ["message"=>"Article supprimé avec succès!"]);
    }
}
