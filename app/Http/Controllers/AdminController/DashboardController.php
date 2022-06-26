<?php

namespace App\Http\Controllers\AdminController;

use App\Http\Controllers\Controller;
use App\Models\Feedback;
use App\Models\Mobile;
use App\Models\Order;
use App\Models\OrderDetail;
use App\Models\User;
use ArielMejiaDev\LarapexCharts\LarapexChart;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\View;

class DashboardController extends Controller
{
//    public function __construct()
//    {
//        $this->middleware(['auth','admin']);
//    }
    public function index()
    {
        $order = Order::selectRaw('COUNT(id) AS count_month')
            ->groupByRaw('MONTH(created_at)')
            ->get()
            ->pluck('count_month');
        $orderTotal = Order::selectRaw('SUM(totalPrice) AS sum_month')
            ->groupByRaw('MONTH(created_at)')
            ->get()
            ->pluck('sum_month');

        $top_sale_product = OrderDetail::selectRaw('order_details.mobileID, mobiles.name, SUM(order_details.quantity) AS sum_quantity') -> join('mobiles', 'order_details.mobileID', '=', 'mobiles.id')
            ->groupBy('mobiles.name') ->orderBy('sum_quantity', 'DESC')->take(5) -> get() ->pluck('name');
        $top_sale_quantity = OrderDetail::selectRaw('mobileID, SUM(quantity) AS sum_quantity')
            ->groupBy('mobileID') ->orderBy('sum_quantity', 'DESC')->take(5) -> get() ->pluck('sum_quantity');

        $chart = (new LarapexChart) -> areaChart()
            ->setTitle('Number of orders during 2021')
            ->addData('Order', $order -> toArray())
            ->setXAxis(['Jan', 'Feb', 'Mar', 'Apr','May', 'Jun', 'Jul', 'Aug', 'Sep','Oct', 'Nov', 'Dec'])
            ->setHeight(300);
        $chartTotal = (new LarapexChart) -> barChart()
            ->setTitle('Sales during 2021')
            ->addData('Sales', $orderTotal -> toArray())
            ->setXAxis(['Jan', 'Feb', 'Mar', 'Apr','May', 'Jun', 'Jul', 'Aug', 'Sep','Oct', 'Nov', 'Dec'])
            ->setHeight(300);
        $chartTopSale = (new LarapexChart) ->horizontalBarChart()
            ->setTitle('Top sale mobile during 2021')
            ->addData('Quantity', $top_sale_quantity -> toArray())
            ->setXAxis($top_sale_product -> toArray())
            ->setHeight(300);

        $new_order = Order::query()->where('created_at', '<', Carbon::now(), 'and', 'created_at', '>', Carbon::now()->addMonth(-1))->count();
        $user = User::query()->select('*')->where('role', '=', 0)->count();
        $product = Mobile::query()->select('*')->count();
        $feedback = Feedback::query()->select('*')->where('created_at', '<', Carbon::now(), 'and', 'created_at', '>', Carbon::now()->addMonth(-1))->count();
        return view('admin.template.dashboard', ['chart' =>$chart, 'chartTotal' => $chartTotal, 'chartTopSale' => $chartTopSale, 'new_order'=>$new_order, 'user'=>$user, 'product'=>$product, 'feedback'=>$feedback]);
    }
}
