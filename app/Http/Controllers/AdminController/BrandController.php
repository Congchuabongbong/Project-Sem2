<?php

namespace App\Http\Controllers\AdminController;

use App\Http\Controllers\Controller;
use App\Models\Brand;
use Carbon\Carbon;
use Illuminate\Http\Request;
use App\Models\Brand as Brand_Model;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\DB;

class BrandController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $brands = Brand_Model::query()
            ->select('*')
            ->orderBy('created_at', 'DESC')
            ->paginate(12);
        if ($request->ajax()) {
            return view('admin.page.brand.render_table')->with('brands', $brands)->render();
        }
        return view('admin.page.brand.table_data', ['brands' => $brands]);
    }

    public function fetch_data(Request $request)
    {
        if ($request->ajax()) {
            $brands = Brand_Model::query()
                ->select('*')
                ->sortBy($request)
                ->name($request)
                ->pagination($request);
            return view('admin.page.brand.render_table')->with('brands', $brands)->render();
        }
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.page.brand.create_brand');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'name' => 'required',
            'description' => 'required'
        ]);
        if ($validator->fails()) {
            return response()->json(['status' => 400, 'errors' => $validator->errors()->toArray(), 'message' => 'Data not valid!']);
        } else {
            $brand = new Brand_Model();
            $brand->name = $request->get('name');
            $brand->description = $request->get('description');
            $brand->created_at = Carbon::now();
            $brand->updated_at = Carbon::now();
            if ($brand->save()) {
                return response()->json(['status' => 200, 'message' => 'Data have been successfully insert']);
            }
            return response()->json(['status' => 500, 'message' => 'Something went wrong!']);
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $result = DB::table('brands')->where('id', '=', $id)->first();
        if ($result){
            return view('admin.page.brand.detail_brand', compact('result'));
        }
        return view('admin.page.error.page_404', compact('result'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $result = DB::table('brands')->where('id', '=', $id)->first();
        if ($result){
            return view('admin.page.brand.edit_brand', compact('result'));
        }
        return view('admin.page.error.page_404')->with('result', $result);

    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $data = $request->except(['_token']);
        $validator = Validator::make($request->all(), [
            'name' => 'required',
            'description' => 'required'
        ]);
        if ($validator->fails()) {
            return response()->json(['status' => 400, 'errors' => $validator->errors()->toArray(), 'message' => 'Data not valid!']);
        } else {
            $result = DB::table('brands')->where('id', '=', $id)->update($data);
            Brand_Model::where('id', $id)->update(array('updated_at' => Carbon::now()));
            if ($result) {
                return response()->json(['status' => 200, 'message' => 'Data have been successfully update']);
            }
            return response()->json(['status' => 500, 'message' => 'You do not change anything!']);
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request, $id)
    {
        if ($request->ajax()) {
            $brand = Brand_Model::find($id);
            if ($brand) {
                if ($brand->delete()) {
                    return response()->json([
                        'status' => 200,
                        'message' => 'Data have been successfully deleted!'
                    ]);
                } else {
                    return response()->json([
                        'status' => 500,
                        'message' => 'Something went wrong!'
                    ]);
                }
            } else {
                return response()->json([
                    'status' => 404,
                    'message' => 'Object not exist!'
                ]);
            }
        }
    }

    public function deleteAll(Request $request)
    {
        $ids = $request->ids;
        if (Brand::query()->whereIn('id', explode(",", $ids))->delete()) {
            return response()->json([
                'status' => 200,
                'message' => 'Data have been successfully deleted!'
            ]);
        }
        return response()->json([
            'status' => 500,
            'message' => 'Something went wrong!'
        ]);
    }
}
