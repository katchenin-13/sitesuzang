<?php

namespace App\Http\Livewire;

use App\Exports\ContactExport;
use App\Models\Contact;
use App\Models\Role;
use Carbon\Carbon;
use Livewire\Component;
use Livewire\WithPagination;
use Excel;
class ContactComp extends Component
{
    use WithPagination;
    protected $paginationTheme = "bootstrap";
    public $currentPage = PAGELIST;
    public $search = "";
    
    public function render()
    {
        Carbon::setLocale("fr");

        $query = Contact::query();
        $search = $this->search;

        if(isset($search))
            $this->resetPage();

        $query->when($search != "", function($query) use($search){
            $query->where("nom", "like", "%{$search}%");
            $query->orWhere("telephone", "like", "%{$search}%");
        });

        return view('livewire.contacts.index',[
            "contacts" =>  $query->latest()->paginate(10),
            "roles" => Role::all()
        ])
        ->extends("layouts.master")
        ->section("contenu"); 
    }

    public function ExportIntoExcel(){
        return Excel::download(new ContactExport,'listcontact.xlsx');
    }


    public function confirmDelete($name, $id){
        $this->dispatchBrowserEvent("showConfirmMessage", ["message"=> [
            "text" => "Vous êtes sur le point de supprimer $name de la liste des Services. Voulez-vous continuer?",
            "title" => "Êtes-vous sûr de continuer?",
            "type" => "warning",
            "data" => [
                "contact_id" => $id
            ]
        ]]);
    }

    public function deleteContact($id){
        Contact::destroy($id);

        $this->dispatchBrowserEvent("showSuccessMessage", ["message"=>"Servie supprimé avec succès!"]);
    }
}
