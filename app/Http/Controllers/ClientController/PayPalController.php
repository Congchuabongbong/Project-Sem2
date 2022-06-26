<?php

namespace App\Http\Controllers\ClientController;

use App\Models\OrderDetail;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class PayPalController extends Controller
{
    function getTotal(Request $request) {
        if($request -> ajax()) {
            $total = \Cart::getTotal();
            $vnd_to_usd = $total/22695;
            $paypal_format = round($vnd_to_usd, 2);
            return  response() -> json(['paypal_format' => $paypal_format, 'total' => $total]);
        }
    }
    function index(Request $request) {
        $mobiles_popular = OrderDetail::query()->selectRaw('mobiles.id, mobiles.name, mobiles.price,mobiles.thumbnail ,mobiles.status,mobiles.saleOff, SUM(order_details.quantity) AS sum_quantity')->join('mobiles', 'order_details.mobileID', '=', 'mobiles.id')
        ->groupBy('mobiles.name')->orderBy('sum_quantity', 'DESC')->get();       
        return view('client.page.checkout')->with('mobiles_popular', $mobiles_popular);
    }
}
