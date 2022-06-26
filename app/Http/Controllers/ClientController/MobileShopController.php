<?php

namespace App\Http\Controllers\ClientController;

use App\Models\Article;
use App\Models\OrderDetail;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Brand as Brand_Model;
use App\Models\Mobile as Mobile_Model;
use Illuminate\Support\Facades\Session;
use App\Models\Category as Category_Model;

class MobileShopController extends Controller
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
            ->orderBy('price', 'DESC')
            ->paginate(9);
        if ($request->ajax()) {
            return view('client.page.fetch_data.pagination_shop_mobile_data', ['mobiles' => $mobiles])->render();
        }
        $mobiles_recent_view = [];
        if (Session::has('recent_view')) {
            $mobiles_recent_view = Mobile_Model::findMany(Session::get('recent_view'));
        }
        return view('client.page.shop', ['mobiles' => $mobiles, 'brands' => $brands, 'mobiles_recent_view' => $mobiles_recent_view]);
    }
    public function fetch_data(Request $request)
    {
        if ($request->ajax()) {
            $mobiles = Mobile_Model::query()
                ->select('*')
                ->sortBy($request)
                ->name($request)
                ->brandArr($request)
                ->priceClient($request)
                ->battery($request)
                ->screen($request)
                ->ram($request)
                ->pagination($request);
            $mobiles_suggest = Mobile_Model::query()
                ->select('*')              
                ->name($request)               
                ->take(5)
                ->get();
            $view =  view('client.page.fetch_data.pagination_shop_mobile_data')->with('mobiles', $mobiles)->render();
            return response()->json(['status' => 200, 'view' => $view, 'mobiles_suggest' => $mobiles_suggest]);
        }
    }
    public function search_mobile(Request $request)
    {        
        $mobiles_suggest = Mobile_Model::query()
            ->select('*')            
            ->name($request)                                                            
            ->take(5)
            ->get();
        return response()->json(['status' => 200, 'mobiles_suggest' => $mobiles_suggest]);
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
        if ($mobile = Mobile_Model::find($id)) {
            //related
            $mobiles_related = Mobile_Model::query()->select('*')->where('brandID', $mobile->brandID)->get()->take(10);
            $arr = [];
            //add and get recent view mobile into session
            if (Session::has('recent_view')) {
                $arr = Session::get('recent_view');
            }
            if (!in_array($id, $arr)) {
                array_push($arr, $id);
                if (sizeof($arr) > 6) {
                    array_shift($arr);
                }
            }
            //recent view article   
            $articles_related = Article::query()->select('*')->where('brandID', $mobile->brandID)->get()->take(5);
            //popular
            $mobiles_popular = OrderDetail::query()->selectRaw('mobiles.id, mobiles.name, mobiles.price,mobiles.thumbnail, SUM(order_details.quantity) AS sum_quantity')->join('mobiles', 'order_details.mobileID', '=', 'mobiles.id')
                ->groupBy('mobiles.name')->orderBy('sum_quantity', 'DESC')->take(5)->get();
            //recent
            $mobiles_recent_view = [];
            if (Session::has('recent_view')) {
                $mobiles_recent_view = Mobile_Model::findMany(Session::get('recent_view'));
            }
            Session::put('recent_view', $arr);
            return view('client.page.detail')->with('mobile', $mobile)->with('mobiles_related', $mobiles_related)->with('mobiles_popular', $mobiles_popular)->with('mobiles_recent_view', $mobiles_recent_view)->with('articles_related', $articles_related);
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
