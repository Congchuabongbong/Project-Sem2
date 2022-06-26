<?php

namespace App\Http\ExportExcelController;

use App\Exports\BrandExport;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;
use Maatwebsite\Excel\Facades\Excel;

class ExportExcelBrandController extends Controller
{
    function excel(){
        return Excel::download(new BrandExport(), 'Brands.xlsx');
    }
}
