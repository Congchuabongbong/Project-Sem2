<?php

namespace App\Http\Controllers\AdminController;

use App\Http\Controllers\Controller;
use App\Models\Article;
use App\Models\Brand;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Validator;

class ArticleController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $brands = Brand::all();
        $articles = Article::query()
            ->select('*')
            ->orderBy('created_at', 'DESC')
            ->paginate(9);
        if ($request->ajax()) {
            return view('admin.page.article.render_table', ['articles' => $articles, 'brands'=>$brands])->render();
        }
        return view('admin.page.article.table_data', ['articles' => $articles, 'brands'=>$brands]);
    }

    public function fetch_data(Request $request)
    {
        if ($request->ajax()) {
            $articles = Article::query()
                ->select('*')
                ->SortBy($request)
                ->title($request)
                ->author($request)
                ->brand($request)
                ->dateFilter($request)
                ->Pagination($request);
            return view('admin.page.article.render_table')->with('articles', $articles)->render();
        }
    }


    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $brands = Brand::all();
        return view('admin.page.article.create_article')->with('brands', $brands);
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
            'brandID' => 'required',
            'title' => 'required',
            'author' => 'required',
            'description' => 'required',
            'detail' => 'required',
            'thumbnail' => 'required'
        ]);
        if ($validator->fails()) {
            return response()->json(['status' => 400, 'errors' => $validator->errors()->toArray(), 'message' => 'Data not valid!']);
        } else {
            $article = new Article();
            $article->title = $request->get('title');
            $article->author = $request->get('author');
            $article->brandID = $request->get('brandID');
            $article->thumbnail = $request->get('thumbnail');
            $article->detail = $request->get('detail');
            $article->description = $request->get('description');
            $article->created_at = Carbon::now();
            $article->updated_at = Carbon::now();
            if ($article->save()) {
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
        $article = Article::find($id);

        if ($article) {
            return view('admin.page.article.detail_article')->with('article', $article);
        }
        return view('admin.page.error.page_404')->with('article', $article);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $brands = Brand::all();
        $result = DB::table('articles')->where('id', '=', $id)->first();
        if ($result){
            return view('admin.page.article.edit_article', compact('result', 'brands'));
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
            'title' => 'required',
            'author'=> 'required',
            'thumbnail'=> 'required',
            'description'=>'required',
            'detail'=>'required'
        ]);
        if ($validator->fails()) {
            return response()->json(['status' => 400, 'errors' => $validator->errors()->toArray(), 'message' => 'Data not valid!']);
        } else {
            $result = DB::table('articles')->where('id', '=', $id)->update($data);
            Article::where('id', $id)->update(array('updated_at' => Carbon::now()));
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
            $article = Article::find($id);
            if ($article) {
                if ($article->delete()) {
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
        if (Article::query()->whereIn('id', explode(",", $ids))->delete()) {
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
