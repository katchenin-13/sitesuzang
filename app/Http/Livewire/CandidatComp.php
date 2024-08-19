<?php

namespace App\Http\Livewire;
use App\Exports\CandidatExport;
use App\Models\Candidat;
use App\Models\Role;
use Carbon\Carbon;
use Livewire\Component;
use Livewire\WithPagination;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Excel;
use Illuminate\Support\Composer;

class CandidatComp extends Component
{
    use WithPagination;
    protected $paginationTheme = "bootstrap";
    public $currentPage = PAGELIST;
    public $search = "";
    public function render()
    {
        Carbon::setLocale("fr");

        $query = Candidat::query();
        $search = $this->search;

        if(isset($search))
            $this->resetPage();

        $query->when($search != "", function($query) use($search){
            $query->where("nom", "like", "%{$search}%");
            $query->orWhere("telephone", "like", "%{$search}%");
        });

        return view('livewire.candidats.index',[
            "candidats"=> $query->latest()->paginate(4),
            "candidatss"=> Candidat::all(),
            "roles" => Role::all() 
        ])
        ->extends("layouts.master")
        ->section("contenu"); 
    }

    public function downloadFile(Request $request, $file)
    {      
        return response()->download(public_path('Stockage/Canditatscv/CV/'.$file));
    }
    
    // public function view( $id){
    //     $this->currentPage = PAGEVOIR;
    //     $fichier = Candidat::find('$id');
    //     return view('livewire.candidats.show',compact('fichier'));
    // }


    public function ExportIntoExcel(){
        return Excel::download(new CandidatExport,'listcandidat.xlsx');
    }
    
    public function confirmDelete($name, $id){
        $this->dispatchBrowserEvent("showConfirmMessage", ["message"=> [
            "text" => "Vous êtes sur le point de supprimer $name de la liste des candidats. Voulez-vous continuer?",
            "title" => "Êtes-vous sûr de continuer?",
            "type" => "warning",
            "data" => [
                "candidat_id" => $id
            ]
        ]]);
    }

    public function deleteCandidat($id){
        Candidat::destroy($id);

        $this->dispatchBrowserEvent("showSuccessMessage", ["message"=>"candidat supprimé avec succès!"]);
    }
}
