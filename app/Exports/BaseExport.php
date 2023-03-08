<?php

namespace App\Exports;

use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;

class BaseExport implements FromCollection, WithHeadings
{
    public function __construct(public $headings, public $collection = null)
    {
    }
    public function headings(): array
    {
        return $this->headings;
    }

    /**
     * @return \Illuminate\Support\Collection
     */
    public function collection()
    {
        return $this->collection;
    }
}



// class BaseExport implements ++FromQuery, WithHeadings
// {
//     ++ public function query()
//     {
//         return Invoice::query()->whereYear('created_at', $this->year);
//     }
// }
