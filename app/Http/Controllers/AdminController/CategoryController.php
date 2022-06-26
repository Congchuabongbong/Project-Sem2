<?php

namespace App\Http\Controllers\AdminController;

use App\Http\Controllers\Controller;
use App\Models\Category;
use Carbon\Carbon;
use App\Models\Category as Category_Model;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\DB;


class CategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    public function index(Request $request)
    {
        $categories = Category_Model::query()
            ->select('*')
            ->orderBy('created_at', 'DESC')
            ->paginate(5);
        if ($request->ajax()) {
            return view('admin.page.category.render_table')->with('categories', $categories)->render();
        }
        return view('admin.page.category.table_data', ['categories' => $categories]);
    }




    public function fetch_data(Request $request)
    {
        if ($request->ajax()) {
            $categories = Category_Model::query()
                ->select('*')
                ->sortBy($request)
                ->name($request)
                ->pagination($request);
            return view('admin.page.category.render_table')->with('categories', $categories)->render();
        }
    }

    /**
     * Show the form for creating a new resource.https://www.youtube.com/watch?v=FjHGZj2IjBk
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.page.category.create_category');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param \Illuminate\Http\Request $request
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
            $category = new Category();
            $category->name = $request->get('name');
            $category->description = $request->get('description');
            $category->created_at = Carbon::now();
            $category->updated_at = Carbon::now();
            if ($category->save()) {
                return response()->json(['status' => 200, 'message' => 'Data have been successfully insert']);
            }
            return response()->json(['status' => 500, 'message' => 'Something went wrong!']);
        }
    }
    /**
     * Display the specified resource.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $result = DB::table('categories')->where('id', '=', $id)->first();
        if ($result){
            return view('admin.page.category.detail_category', compact('result'));
        }
        return view('admin.page.error.page_404')->with('result', $result);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $result = DB::table('categories')->where('id', '=', $id)->first();
        if ($result){
            return view('admin.page.category.edit_category', compact('result'));
        }
        return view('admin.page.error.page_404')->with('result', $result);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @param int $id
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
            $result = DB::table('categories')->where('id', '=', $id)->update($data);
            Category_Model::where('id', $id)->update(array('updated_at' => Carbon::now()));
            if ($result) {
                return response()->json(['status' => 200, 'message' => 'Data have been successfully update']);
            }
            return response()->json(['status' => 500, 'message' => 'You do not change anything!']);
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request, $id)
    {
        if ($request->ajax()) {
            $category = Category_Model::find($id);
            if ($category) {
                if ($category->delete()) {
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
        if (Category::query()->whereIn('id', explode(",", $ids))->delete()) {
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
