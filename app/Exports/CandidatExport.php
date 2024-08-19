<?php

namespace App\Exports;

use App\Models\Candidat;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;


class CandidatExport implements FromCollection,WithHeadings
{
    public function headings():array{
        return[
            'id',
            'nom', 
            'telephone',
            'adresse',           
        ];
    }
    /**
    * @return \Illuminate\Support\Collection
    */
    public function collection()
    {
        // return Candidat::all();
        return collect(Candidat::getCandidat());
    }
}
