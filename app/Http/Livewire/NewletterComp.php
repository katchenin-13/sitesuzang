<?php

namespace App\Http\Livewire;

use App\Exports\NewletterExport;
use App\Models\Newletter;
use Carbon\Carbon;
use Livewire\Component;
use Livewire\WithPagination;
use Excel;

class NewletterComp extends Component
{
    use WithPagination;

    protected $paginationTheme = "bootstrap";

    public $currentPage = PAGELIST;
    
    public $search = "";
    public function render()
    {
        Carbon::setLocale("fr");
        $query = Newletter::query();
        $search = $this->search;

        if(isset($search))
            $this->resetPage();

        $query->when($search != "", function($query) use($search){
            $query->where("nom", "like", "%{$search}%");
        });
        return view('livewire.newletter.index',[
            "newletters" => $query->latest()->paginate(5)
        ])->extends("layouts.master")
        ->section("contenu");
    }

    public function ExportIntoExcel(){
        return Excel::download(new NewletterExport,'listNewletter.xlsx');
    }
    



    public function confirmDelete($name, $id){
        $this->dispatchBrowserEvent("showConfirmMessage", ["message"=> [
            "text" => "Vous êtes sur le point de supprimer $name de la liste des articles. Voulez-vous continuer?",
            "title" => "Êtes-vous sûr de continuer?",
            "type" => "warning",
            "data" => [
                "newletter_id" => $id
            ]
        ]]);
    }

    public function deleteNewletter($id){
        Newletter::destroy($id);

        $this->dispatchBrowserEvent("showSuccessMessage", ["message"=>"Article supprimé avec succès!"]);
    }

  
}
