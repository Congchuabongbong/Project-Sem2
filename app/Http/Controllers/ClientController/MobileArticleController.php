<?php

namespace App\Http\Controllers\ClientController;

use App\Http\Controllers\Controller;
use App\Models\Article;
use App\Models\Brand as Brand_Model;
use App\Models\OrderDetail;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class MobileArticleController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $brands = Brand_Model::all();
        $articles = Article::query()
            ->select('*')
            ->orderBy('created_at', 'DESC')
            ->paginate(5);
        if ($request->ajax()) {
            return view('client.page.fetch_data.pagination_article', ['articles' => $articles])->render();
        }
        $articles_recent_view = [];
        if (Session::has('recent_view')) {
            $articles_recent_view = Article::findMany(Session::get('recent_view'));
        }
        $mobiles_popular = OrderDetail::query()->selectRaw('mobiles.id, mobiles.name, mobiles.price,mobiles.thumbnail, SUM(order_details.quantity) AS sum_quantity')->join('mobiles', 'order_details.mobileID', '=', 'mobiles.id')
            ->groupBy('mobiles.name')->orderBy('sum_quantity', 'DESC')->take(5)->get();

        return view('client.page.article', ['articles' => $articles, 'brands' => $brands, 'articles_recent_view' => $articles_recent_view, 'mobiles_popular'=>$mobiles_popular]);
    }

    public function fetch_data(Request $request)
    {
        if ($request->ajax()) {
            $articles = Article::query()
                ->select('*')
                ->orderBy('created_at', 'DESC')
                ->brand($request)
                ->pagination($request);
            $articles_suggest = Article::query()
                ->select('*')
                ->orderBy('created_at', 'DESC')
                ->brand($request)
                ->take(5)
                ->get();
            $view =  view('client.page.fetch_data.pagination_article')->with('articles', $articles)->render();
            return response()->json(['status' => 200, 'view' => $view,'articles_suggest' => $articles_suggest]);
        }
    }
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        if ($article = Article::find($id)) {
            //related
            $articles_related = Article::query()->select('*')->where('brandID', $article->brandID)->get()->take(10);
            $arrArticle = [];
            //add and get recent view mobile into session
            if (Session::has('recent_view')) {
                $arrArticle = Session::get('recent_view');
            }
            if (!in_array($id, $arrArticle)) {
                array_push($arrArticle, $id);
                if (sizeof($arrArticle) > 6) {
                    array_shift($arrArticle);
                }
            }
            $mobiles_popular = OrderDetail::query()->selectRaw('mobiles.id, mobiles.name, mobiles.price,mobiles.thumbnail, SUM(order_details.quantity) AS sum_quantity')->join('mobiles', 'order_details.mobileID', '=', 'mobiles.id')
                ->groupBy('mobiles.name')->orderBy('sum_quantity', 'DESC')->take(5)->get();
            //recent
            $articles_recent_view = [];
            if (Session::has('recent_view')) {
                $articles_recent_view = Article::findMany(Session::get('recent_view'));
            }
            Session::put('recent_view', $arrArticle);
            return view('client.page.article_detail')->with('article', $article)->with('articles_related', $articles_related)->with('articles_recent_view', $articles_recent_view)->with('mobiles_popular', $mobiles_popular);
        }
        return view('client.page.error.page_404');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
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
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
