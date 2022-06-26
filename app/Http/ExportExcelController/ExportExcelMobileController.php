<?php

namespace App\Http\ExportExcelController;

use App\Exports\MobileExport;
use App\Models\Mobile;
use Maatwebsite\Excel\Facades\Excel;

class ExportExcelMobileController extends \App\Http\Controllers\Controller
{
    function excel(){
        return Excel::download(new MobileExport(), 'Mobiles.xlsx');
    }
}
