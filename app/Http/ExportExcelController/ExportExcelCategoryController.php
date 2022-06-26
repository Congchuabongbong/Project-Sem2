<?php

namespace App\Http\ExportExcelController;

use App\Exports\CategoryExport;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;
use Maatwebsite\Excel\Facades\Excel;

class ExportExcelCategoryController extends Controller
{
    function index(){
        $category_data = DB::table('categories')->get();
        return view('admin.page.category.export_excel')->with('category_data',$category_data);
    }
    function excel(){
        return Excel::download(new CategoryExport, 'category.xlsx');
    }
}
