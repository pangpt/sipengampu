<?php

namespace App\Exports;

use App\Putusan;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;

class PutusanExport implements FromCollection, WithHeadings
{
    /**
    * @return \Illuminate\Support\Collection
    */
    public function collection()
    {
        return Putusan::all();
    }

    public function headings(): array
    {
        return [
            'No',
            'Nama',
            'No. Akta Cerai',
            'Tgl Akta Cerai',
            'Amar Putusan',
            'Charge',
        ];
    }
}
