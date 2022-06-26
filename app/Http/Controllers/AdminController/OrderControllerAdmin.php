<?php

namespace App\Http\Controllers\AdminController;

use App\Http\Controllers\Controller;
use App\Models\Order;
use App\Models\OrderDetail;
use Carbon\Carbon;
use Illuminate\Http\Request;
use App\Models\Order as Order_Model;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Validator;


class OrderControllerAdmin extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $order = Order_Model::query()
            ->select('*')
            ->orderBy('created_at', 'DESC')
            ->paginate(9);
        if ($request->ajax()) {
            return view('admin.page.order.render_table', ['order' => $order])->render();
        }
        return view('admin.page.order.table_data', ['order' => $order]);
    }

    public function fetch_data(Request $request)
    {
        if ($request->ajax()) {
            $order = Order_Model::query()
                ->select('*')
                ->sortBy($request)
                ->name($request)
                ->province($request)
                ->phone($request)
                ->email($request)
                ->checkOut($request)
                ->dateFilter($request)
                ->fromDate($request)
                ->toDate($request)
                ->Pagination($request);
            return view('admin.page.order.render_table')->with('order', $order)->render();
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
        $result = DB::table('orders')->where('id', '=', $id)->first();
        $order_detail = OrderDetail::query()->where('orderID', '=', $id)->get();
        if ($result){
            return view('admin.page.order.detail_order', compact('result', 'order_detail'));
        }
        return view('admin.page.error.page_404')->with('result', $result);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $result = DB::table('orders')->where('id', '=', $id)->first();
        if ($result){
            return view('admin.page.order.detail_order', compact('result'));
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
            'phone' => 'required',
            'email' => 'required',
            'address_detail' => 'required',
            'totalPrice' => 'required',
            'checkOut' => 'required',
            'comment' => 'required'
        ]);
        if ($validator->fails()) {
            return response()->json(['status' => 400, 'errors' => $validator->errors()->toArray(), 'message' => 'Data not valid!']);
        } else {
            $result = DB::table('orders')->where('id', '=', $id)->update($data);
            Order::where('id', $id)->update(array('updated_at' => Carbon::now()));
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
            $order = Order_Model::find($id);
            if ($order) {
                if ($order->delete()) {
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
        if (Order::query()->whereIn('id', explode(",", $ids))->delete()) {
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
