<?php

namespace App\Http\Controllers\ClientController;

use App\Http\Controllers\Controller;
use App\Models\Order;
use App\Models\OrderDetail;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function redirect404()
    {
        return view('client.page.error.page_404');
    }

    public function index()
    {

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.page.user.create_user');
    }

    public function getViewCreate()
    {
        return view('client.page.register');
    }

    public function saveCreate(Request $request)
    {
        $user = new User();
        $user->email = $request->get('email');
        $check_exist = User::where('email', '=', $request->get('email'))->first();
        if ($check_exist !== null) {
            return response()->json(['status' => 400, 'message' => 'this email account already exist, please try again!!!']);
        }
        $user->password = Hash::make($request->get('password'));
        $user->fullName = $request->get('fullName');
        $user->phone = $request->get('phone');
        $user->address = $request->get('address');
        $user->avatar = $request->get('avatar');
        $user->description = $request->get('description');
        $user->role = 0;
        $user->status = 1;
        $user->created_at = Carbon::now();
        $user->updated_at = Carbon::now();
        $result = $user->save();
        if ($result) {
            return response()->json(['status' => 200, 'message' => 'save user info success']);
        } else {
            return response()->json(['status' => 500, 'message' => 'save user info false']);
        }
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $user = new User();
        $user->email = $request->get('email');
        $check_exist = User::where('email', '=', $request->get('email'))->first();
        if ($check_exist !== null) {
            return response()->json(['status' => 400, 'message' => 'this email account already exist, please try again!!!']);
        }
        $user->password = Hash::make($request->get('password'));
        $user->fullName = $request->get('fullName');
        $user->phone = $request->get('phone');
        $user->address = $request->get('address');
        $user->avatar = $request->get('avatar');
        $user->description = $request->get('description');
        $user->role = 0;
        $user->status = 1;
        $user->created_at = Carbon::now();
        $user->updated_at = Carbon::now();
        $result = $user->save();
        if ($result) {
            return response()->json(['status' => 200, 'message' => 'save user info success']);
        } else {
            return response()->json(['status' => 500, 'message' => 'save user info false']);
        }
    }

    /**
     * Display the specified resource.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function show($user_id)
    {
        $result = User::find($user_id);
        return view('client.page.profile', ['user' => $result]);
    }

    public function showOrderByID($user_id)
    {
        $orders = Order::where('userId', $user_id)->paginate(5);
        return view('client.page.order_by_id', ['orders' => $orders]);
    }

    public function showOrderByOrderID($order_id)
    {
        $order = Order::where('id', $order_id)->first();
        $orderDetails = OrderDetail::join('mobiles', 'mobiles.id', '=', 'order_details.mobileID')
            ->where('order_details.orderID', $order_id)
            ->get(['order_details.*', 'mobiles.name']);
        $count = count($orderDetails);
        if ($count > 0) {
            return response()->json(['status' => 200, 'message' => 'get order details done', 'order' => $order, 'orderDetails' => $orderDetails]);
        } else {
            return response()->json(['status' => 400, 'message' => 'cant find any orderdetail for this order']);
        }
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
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
//        $result = DB::table('users')
//            ->where('id', $request->get('id'))
//            ->update([
//                'fullName' => $request->get('fullName'),
//                'phone' => $request->get('phone'),
//                'address' => $request->get('address'),
//                'avatar' => $request->get('avatar'),
//                'description' => $request->get('description'),
//                'updated_at' => Carbon::now()
//            ]);
        $user = User::find($id);
        if ($user) {
            $user->fullName = $request->get('fullName');
            $user->phone = $request->get('phone');
            $user->address = $request->get('address');
            $user->avatar = $request->get('avatar');
            $user->description = $request->get('description');
            $user->updated_at = Carbon::now();
            if ($user->save()) {
                return response()->json(['status' => 200, 'message' => 'Update user info success', 'id' => $user->id]);
            } else {
                return response()->json(['status' => 500, 'message' => 'Update user info false']);
            }
        } else {
            return response()->json(['status' => 404, 'message' => 'User not found']);
        }
        return response()->json(['status' => 500, 'message' => 'Update user info false']);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
