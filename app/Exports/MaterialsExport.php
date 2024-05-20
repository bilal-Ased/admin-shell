<?php

namespace App\Exports;

use App\Models\Material;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;

class MaterialsExport implements FromCollection, WithHeadings
{
    /**
     * @return \Illuminate\Support\Collection
     */
    public function collection()
    {
        return Material::select('id', 'name', 'quantity_on_hand')->get();
    }

    public function headings(): array
    {
        return ['ID', 'Name', 'Quantity'];
    }
}
