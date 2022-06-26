<?php

namespace App\Http\Controllers\AdminController;


use Carbon\Carbon;
use App\Models\Brand;
use App\Models\Mobile;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use App\Models\Brand as Brand_Model;
use App\Models\Mobile as Mobile_Model;
use Illuminate\Support\Facades\Validator;
use App\Models\Category as Category_Model;

class MobileController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $brands = Brand_Model::all();
        $mobiles = Mobile_Model::query()
            ->select('*')
            ->orderBy('created_at', 'DESC')
            ->paginate(9);
        if ($request->ajax()) {
            return view('admin.page.mobile.render_table', ['mobiles' => $mobiles, 'brands' => $brands])->render();
        }
        return view('admin.page.mobile.table_data', ['mobiles' => $mobiles, 'brands' => $brands]);
    }

    public function fetch_data(Request $request)
    {
        if ($request->ajax()) {
            $mobiles = Mobile::query()
                ->select('*')
                ->sortBy($request)
                ->name($request)
                ->ram($request)
                ->brand($request)
                ->dateFilter($request)
                ->status($request)
                ->priceFilter($request)
                ->toPrice($request)
                ->fromPrice($request)
                ->Pagination($request);
            return view('admin.page.mobile.render_table')->with('mobiles', $mobiles)->render();
        }
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $categories = Category_Model::all();
        $brands = Brand_Model::all();
        return view('admin.page.mobile.create_mobile')->with('categories', $categories)->with('brands', $brands);
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
            'brandID' => 'required',
            'quantity' => 'required',
            'status' => 'required',
            'saleOff' => 'required',
            'price' => 'required',
            'thumbnail' => 'required',
            'description' => 'required',
            'detail' => 'required',
            'color' => 'required',
            'ram' => 'required',
            'memory' => 'required',
            'pin' => 'required',
            'camera' => 'required',
            'screenSize' => 'required',
        ]);
        if ($validator->fails()) {
            return response()->json(['status' => 400, 'errors' => $validator->errors()->toArray(), 'message' => 'Data not valid!']);
        } else {
            $mobile = new Mobile_Model();
            $mobile->name = $request->get('name');
            $mobile->categoryID = $request->get('categoryID');
            $mobile->brandID = $request->get('brandID');
            $mobile->quantity = $request->get('quantity');
            $mobile->status = $request->get('status');
            $mobile->saleOff = $request->get('saleOff');
            $mobile->price = $request->get('price');
            $mobile->thumbnail = $request->get('thumbnail');
            $mobile->color = $request->get('color');
            $mobile->ram = $request->get('ram');
            $mobile->pin = $request->get('pin');
            $mobile->camera = $request->get('camera');
            $mobile->screenSize = $request->get('screenSize');
            $mobile->memory = $request->get('memory');
            $mobile->detail = $request->get('detail');
            $mobile->description = $request->get('description');
            $mobile->created_at = Carbon::now();
            $mobile->updated_at = Carbon::now();
            if ($mobile->save()) {
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
        $mobile = Mobile_Model::find($id);

        if ($mobile) {
            return view('admin.page.mobile.detail_mobile')->with('mobile', $mobile);
        }
        return view('admin.page.error.page_404')->with('mobile', $mobile);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $mobile = Mobile_Model::find($id);
        $brands = Brand_Model::all();
        if ($mobile) {
            return view('admin.page.mobile.edit_mobile')->with('mobile', $mobile)->with('brands', $brands);
        }
        return view('admin.page.error.page_404');
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
        if ($request->ajax()) {
            $validator = Validator::make($request->all(), [
                'name' => 'required',
                'brandID' => 'required',
                'quantity' => 'required',
                'status' => 'required',
                'saleOff' => 'required',
                'price' => 'required',
                'thumbnail' => 'required',
                'description' => 'required',
                'detail' => 'required',
                'color' => 'required',
                'ram' => 'required',
                'memory' => 'required',
                'pin' => 'required',
                'camera' => 'required',
                'screenSize' => 'required',
            ]);
            if ($validator->fails()) {
                return response()->json(['status' => 400, 'errors' => $validator->errors()->toArray(), 'message' => 'Data not valid!']);
            } else {
                $mobile = Mobile_Model::find($id);
                if ($mobile) {
                    $mobile->name = $request->get('name');
                    $mobile->categoryID = $request->get('categoryID');
                    $mobile->brandID = $request->get('brandID');
                    $mobile->quantity = $request->get('quantity');
                    $mobile->status = $request->get('status');
                    $mobile->saleOff = $request->get('saleOff');
                    $mobile->price = $request->get('price');
                    $mobile->thumbnail = $request->get('thumbnail');
                    $mobile->color = $request->get('color');
                    $mobile->ram = $request->get('ram');
                    $mobile->pin = $request->get('pin');
                    $mobile->camera = $request->get('camera');
                    $mobile->screenSize = $request->get('screenSize');
                    $mobile->memory = $request->get('memory');
                    $mobile->detail = $request->get('detail');
                    $mobile->description = $request->get('description');
                    $mobile->created_at = Carbon::now();
                    $mobile->updated_at = Carbon::now();
                    if ($mobile->update()) {
                        return response()->json(['status' => 200, 'message' => 'Update success!']);
                    } else {
                        return response()->json(['status' => 500, 'message' => 'Something went wrong!']);
                    };
                } else {
                    return response()->json(['status' => 404, 'message' => "Object not exist!"]);
                }
            }
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
            $mobile = Mobile_Model::find($id);
            if ($mobile) {
                if ($mobile->delete()) {
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
        if (Mobile_Model::query()->whereIn('id', explode(",", $ids))->delete()) {
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
