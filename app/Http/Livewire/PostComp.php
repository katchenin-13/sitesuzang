<?php

namespace App\Http\Livewire;

use App\Models\Categorie;
use App\Models\Post;
use App\Models\role;
use Carbon\Carbon;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Storage;
use Livewire\Component;
use Livewire\WithPagination;
use Livewire\WithFileUploads;
use Intervention\Image\Facades\Image;
use PhpOffice\PhpSpreadsheet\Calculation\Category;

class PostComp extends Component
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


    public $categorie;
    public $imageUrl;

    public $edit_id;
    public $edit_titre;
    public $edit_extrait;
    public $edit_contenu;

    public $edit_title;
    public $edit_extraitang;
    public $edit_contenus;

    public $edit_categorie;
    public $old_imageUrl;
    public $new_imageUrl;

    public function render()
    {
        Carbon::setLocale("fr");

        $query = Post::query();
        $search = $this->search;

        if(isset($search))
            $this->resetPage();

        $query->when($search != "", function($query) use($search){
            $query->where("titre", "like", "%{$search}%");
        });
        return view('livewire.posts.index',[
            "posts" => $query->latest()->paginate(5),
            "post" => Post::find("id"),
            "categories"=>Categorie::all(),
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
                "extrait" =>"required|max:200",
                "contenu" => "required",

                "title" => "required",
                "extraitang" => "required|max:200",
                "contenus" => "required",

                "categorie"=>"required",
                "imageUrl" => "image|max:2040"
            ];
        }
   


    }

    public function goToAddPost(){
        $this->currentPage = PAGECREATEFORM;
    }

    public function goToEditPost($id){
       
        $posts = Post::findOrFail($id);
        $this->edit_id = $posts->id;
        $this->edit_titre = $posts->titre;
        $this->edit_extrait = $posts->extrait;
        $this->edit_contenu= $posts->contenu;

        $this->edit_title = $posts->title;
        $this->edit_extraitang = $posts->extraitang;
        $this->edit_contenus = $posts->contenus;

        $this->edit_categorie= $posts->categorie_id;
        $this->old_imageUrl= $posts->imageUrl;
      
        $this->currentPage = PAGEEDITFORM;
      

     
    }
    public function goToListPost(){
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

        $this->categorie="";
        $this->imageUrl = "";

        $this->edit_titre = "";
        $this->edit_extrait = "";
        $this->edit_contenu = "";


        $this->edit_title = "";
        $this->edit_extraitang = "";
        $this->edit_contenus = "";

        $this->edit_categorie ="";
        $this->new_imageUrl = "";
        $this->old_imageUrl = "";
        $this->edit_id = "";
    }

    public function addPost(){

        $posts = new Post();
        $this->validate([
            "titre" => "required",
            "extrait" => "required|max:200",
           "contenu" => "required",

            "title" => "required",
            "extraitang" => "required|max:200",
            "contenus" => "required",

           "categorie"=>"required",
           "imageUrl" => "image|max:2040"
        ]);

        $filename = "";
        if ($this->imageUrl) {
            $filename = $this->imageUrl->store('posts', 'public');
            // $image = Image::make(public_path($filename))->fit(200, 200);
            // $filename = "storage/".$path;
            // $image->save();
        } else {
            $filename = Null;
        }

        $posts->titre = $this->titre;
        $posts->extrait = $this->extrait;
        $posts->contenu = $this->contenu;

        $posts->title = $this->title;
        $posts->extraitang = $this->extraitang;
        $posts->contenus = $this->contenus;

        $posts->categorie_id = $this->categorie;
        $posts->imageUrl = $filename;
        $result = $posts->save();
        if ($result) {
            $this->resetField();
            $this->dispatchBrowserEvent("showSuccessMessage", ["message"=>"Post créé avec succès!"]);

        } else {
          ///////////
        }
        
    }
    public function updatePost($id)
    {
        $posts =Post::findOrFail($id);
        $this->validate([
            "edit_titre" => "required",
            "edit_extrait" => "required|max:200",
           "edit_contenu" => "required",
           "edit_categorie" => "required",
        //    "imageUrl" => "image|max:2040"
        ]);

        $filename = "";
        $destination=public_path('storage\\'.$posts->imageUrl);
        if ($this->new_imageUrl != null) {
            if(File::exists($destination)){
                File::delete($destination);
            }
            $filename = $this->new_imageUrl->store('posts', 'public');
        } else {
            $filename = $this->old_imageUrl;
        }

        $posts->titre = $this->edit_titre;
        $posts->extrait = $this->edit_extrait;
        $posts->contenu = $this->edit_contenu;

        $posts->title = $this->edit_title;
        $posts->extraitang = $this->edit_extraitang;
        $posts->contenus = $this->edit_contenus;

        $posts->categorie_id = $this->edit_categorie;
        $posts->imageUrl = $filename;
        $result = $posts->save();
        // dd( $clients);
        
        if ($result) {
            $this->resetField();
            $this->dispatchBrowserEvent("showSuccessMessage", ["message"=>"Post mis à jour avec succès!"]);
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
            "text" => "Vous êtes sur le point de supprimer $name de la liste des post. Voulez-vous continuer?",
            "title" => "Êtes-vous sûr de continuer?",
            "type" => "warning",
            "data" => [
                "post_id" => $id
            ]
        ]]);
    }

    public function deletePost($id){
        Post::destroy($id);

        $this->dispatchBrowserEvent("showSuccessMessage", ["message"=>"posts supprimé avec succès!"]);
    }

}

