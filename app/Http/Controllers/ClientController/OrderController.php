<?php

namespace App\Http\Controllers\ClientController;
use App\Models\Order;
use App\Models\Mobile;
use App\Models\OrderDetail;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use HoangPhi\VietnamMap\Models\Ward;
use HoangPhi\VietnamMap\Models\District;
use HoangPhi\VietnamMap\Models\Province;
use Illuminate\Support\Facades\Validator;

class OrderController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
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
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $shipName = $request->get('name');
        $shipEmail = $request->get('email');
        $shipProvince = $request->get('province');
        $shipDistrict = $request->get('district');
        $shipWard = $request->get('ward');
        $shipAddressDetail = $request->get('address_detail');
        $shipPhone = $request->get('phone');
        $shipNote = $request->get('comment');
        $paymentMethod = $request->get('paymentMethod');
        //tao order
        $order = new Order();
        if (count(\Cart::getContent()) == 0) {
            return response()->json(['status' => 400, 'message' => 'Không có sản phẩm nào trong giỏ hàng!']);
        } else {
            $user_id = 1;
            if(Auth::check()){
                $user_id = Auth::id();
            }
            $order->userId = $user_id;
            $order->name = $shipName;
            $order->email = $shipEmail;
            $order->phone = $shipPhone;
            $order->province = $shipProvince;
            $order->district = $shipDistrict;
            $order->ward = $shipWard;
            $order->address_detail = $shipAddressDetail;
            $order->comment = $shipNote;
            $order->created_at = Carbon::now();
            $order->updated_at = Carbon::now();
            // $order->status = 2;
            //tao order detail
            $hasError = false;
            //tao danh sach orderDetail de cho them orderID
            $arrayOderDetail = [];
            foreach (\Cart::getContent() as $cartItem) {
                $product = mobile::find($cartItem->id);
                if ($product == null) {
                    $hasError = true;
                    break;
                }
                $orderDetail = new Orderdetail();
                $orderDetail->mobileID = $product->id;
                $orderDetail->quantity = $cartItem->quantity;
                $orderDetail->unitPrice = $product->price;
                $orderDetail->discount = $product -> saleOff;
                $orderDetail->created_at = Carbon::now();
                $orderDetail->updated_at = Carbon::now();
                $order->totalPrice += $cartItem->quantity *  ($product->price - ($product->price * $product -> saleOff));
                array_push($arrayOderDetail, $orderDetail);
            }
            //save ca 2 vao qua transaction
            try {
                DB::beginTransaction();
                if ($paymentMethod == 1) {
                    $order->checkOut = true;
                    $order->status = 1;
                    $order->paymentMethod = $paymentMethod;
                };
                if ($paymentMethod == 0) {
                    $order->checkOut = false;
                    $order->status = 1;
                    $order->paymentMethod = $paymentMethod;
                };
                $order->save();
                $order_id = $order->id;
                foreach ($arrayOderDetail as $orderDetail) {
                    $orderDetail->orderID = $order_id;
                    if ($orderDetail->quantity > 0) {
                        if ($orderDetail->save()) {
                            $mobile = Mobile::find($orderDetail->mobileID);
                            DB::table('mobiles')
                                ->where('id', $mobile->id)
                                ->update(['quantity' => $mobile->quantity - $orderDetail->quantity]);
                            if ($mobile->quantity - $orderDetail->quantity == 0) {
                                DB::table('mobiles')
                                    ->where('id', $mobile->id)
                                    ->update(['status' => -1]);
                            }
                        }
                    }
                }
                DB::commit();
                \Cart::clear();
                return response()->json(['status' => 200, 'orderID' => $order_id]);
            } catch (\Exception $e) {
                DB::rollBack();
                return response()->json(['status' => 500, 'message' => 'Đã xảy ra lỗi!']);
            }
            if ($hasError) {
                return response()->json(['status' => 404, 'message' => 'Đã xảy ra lỗi!']);
            }
        }
    }
    public function validateOrder(Request $request)
    {
        $order = new Order();
        $validator = Validator::make($request->all(), [
            'name' => 'required',
            'email' => 'required| email',
            'province' => 'required',
            'district' => 'required',
            'ward' => 'required',
            'phone' => 'required',
        ],
        [
            'name.required' => 'Quý khách cần điền họ tên',
            'email.required' => 'Quý khách cần điền email',
            'province.required' => 'Quý khách cần điền tỉnh',
            'district.required' => 'Quý khách cần điền huyện',
            'ward.required' => 'Quý khách cần điền xã',
            'phone.required' => 'Quý khách cần điền số điện thoại'
        ]);
        if ($validator->fails()) {
            return response()->json(['status' => 400, 'errors' => $validator->errors()->toArray(), 'message' => 'Vui lòng nhập đủ thông tin!']);
        }
        return response()->json(['status' => 202]);
    }

    /**
     * Display the specified resource.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
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
    public function update(Request $request)
    {       
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
    public function show_thankyou($id)
    {
        $order = Order::find($id);
        if($order) {
            $order_details = $order->order_detail;
            $invoice = view('client.page.fetch_data.view_invoice_confirm_email')->with('order', $order)->with('order_details', $order_details)->render();
            return view('client.page.thankyou')->with('invoice', $invoice);
        }
        return view('client.page.error.page_404');       
    }
    public function get_district(Request $request)
    {
        $province = Province::query()->select('*')->where('name', 'LIKE', '%' . $request->get('province') . '%')->first();
        $districts = District::query()->select('*')->where('province_id', $province->id)->get();
        return response()->json(['status' => 200, 'districts' => $districts]);
    }
    public function get_province()
    {
        $provinces = Province::all();
        return response()->json(['status' => 200, 'provinces' => $provinces]);
    }
    public function get_ward(Request $request)
    {
        $district = District::query()->select('*')->where('name', 'LIKE', '%' . $request->get('district') . '%')->first();
        $wards = Ward::query()->select('*')->where('district_id', $district->id)->get();
        return response()->json(['status' => 200, 'wards' => $wards]);
    }
}
