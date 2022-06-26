<?php

namespace App\Http\ExportExcelController;

use App\Exports\OrderExport;
use Maatwebsite\Excel\Facades\Excel;

class ExportExcelOrderController extends \App\Http\Controllers\Controller
{
    function excel(){
        return Excel::download(new OrderExport(), 'Orders.xlsx');
    }
}
