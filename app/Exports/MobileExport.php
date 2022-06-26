<?php

namespace App\Exports;

use App\Models\Mobile;
use Maatwebsite\Excel\Concerns\FromCollection;

class MobileExport implements FromCollection
{
    /**
    * @return \Illuminate\Support\Collection
    */
    public function collection()
    {
        return Mobile::all();
    }
}
