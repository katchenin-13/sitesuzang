<?php

namespace App\Exports;

use App\Models\Newletter;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;

class NewletterExport implements FromCollection,WithHeadings
{
    public function headings(): array
    {
            return[
            'id',
            'nom',
            'adresse'
            ];
    }
    /**
    * @return \Illuminate\Support\Collection
    */
    public function collection()
    {
        // return Newletter::all();
        return collect(Newletter::getNewlwetter());
    }
}
