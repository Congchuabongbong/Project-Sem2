<?php

namespace App\Http\Controllers\ClientController;

use App\Models\Mobile;
use App\Models\OrderDetail;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class ShoppingCartController extends Controller
{
    #LIST
    public function cartList()
    {
        $cartItems = \Cart::getContent();
        $mobiles_popular = OrderDetail::query()->selectRaw('mobiles.id, mobiles.name, mobiles.price,mobiles.thumbnail ,mobiles.status,mobiles.saleOff, SUM(order_details.quantity) AS sum_quantity')->join('mobiles', 'order_details.mobileID', '=', 'mobiles.id')
        ->groupBy('mobiles.name')->orderBy('sum_quantity', 'DESC')->get();
        return view('client.page.cart')->with('cartItems', $cartItems)->with('mobiles_popular', $mobiles_popular);
    }
    #SAVE
    public function addToCart(Request $request)
    {
        $mobile = Mobile::find($request->id);
        $item_current = \Cart::getContent()->get($mobile->id);       
        if ($mobile) {           
            if ($mobile->status != -1 && $mobile->status != 0 && $mobile->quantity > 0 && $request->quantity <= $mobile->quantity) {
                if($item_current){
                    if ($item_current->quantity < $mobile->quantity) {
                        \Cart::add([
                            'id' => $request->id,
                            'name' => $request->name,
                            'price' => $request->price,
                            'quantity' => $request->quantity,
                            'attributes' => array(
                                'image' => $request->image,
                                'saleOff' => $request->saleOff,
                                'current_quantity' => $request->current_quantity
                            )
                        ]);  
                        $total_quantity = \Cart::getTotalQuantity();                  
                        return response()->json(['status' => 200, 'message' => 'Thêm thành công!!', 'total_quantity' => $total_quantity]);
                    }         
                    $total_quantity = \Cart::getTotalQuantity();           
                    return response()->json(['status' => 400, 'message' => 'Sản phẩm trong giỏ hàng đã quá số lượng!', 'total_quantity' => $total_quantity]);
                }else {
                    \Cart::add([
                        'id' => $request->id,
                        'name' => $request->name,
                        'price' => $request->price,
                        'quantity' => $request->quantity,
                        'attributes' => array(
                            'image' => $request->image,
                            'saleOff' => $request->saleOff,
                            'current_quantity' => $request->current_quantity
                        )
                    ]);        
                    $total_quantity = \Cart::getTotalQuantity();        
                    return response()->json(['status' => 200, 'message' => 'Thêm thành công!!', 'total_quantity' => $total_quantity]);
                }                            
            } else {    
                $total_quantity = \Cart::getTotalQuantity();        
                return response()->json(['status' => 400, 'message' => 'Sản phẩm đã hết hàng hoặc ngừng bán!!', 'total_quantity' => $total_quantity]);
            }
        }
    }
    #UPDATE
    public function updateCart(Request $request)
    {
        \Cart::update(
            $request->id,
            [
                'quantity' => [
                    'relative' => false,
                    'value' => $request->quantity
                ],
            ]
        );
        $quantity = \Cart::getTotalQuantity();
        $total = \Cart::getTotal();
        return response()->json(['status' => 200, 'message' => 'Add to cart successfully!!', 'quantity' => $quantity, 'total' => $total]);
    }
    //REMOVE ITEM INTO CART
    public function removeCart(Request $request)
    {
        \Cart::remove($request->id);
        $quantity = \Cart::getTotalQuantity();
        $total = \Cart::getTotal();
        if ($quantity == 0) {
            $cartItems = \Cart::getContent();
            $list_cart = view('client.page.fetch_data.list_cart')->with('cartItems', $cartItems)->render();
            return response()->json(['status' => 200, 'message' => 'Xoá sản phẩm trong giỏ hàng thành công!', 'quantity' => $quantity, 'total' => $total, 'list_cart' => $list_cart]);
        }
        return response()->json(['status' => 500, 'message' => 'Xoá sản phẩm trong giỏ hàng không thành công!', 'quantity' => $quantity, 'total' => $total]);
    }
    #CLEAR
    public function clearAllCart()
    {
        \Cart::clear();
        $quantity = \Cart::getTotalQuantity();
        $total = \Cart::getTotal();
        $cartItems = \Cart::getContent();
        $list_cart = view('client.page.fetch_data.list_cart')->with('cartItems', $cartItems)->render();
        return response()->json(['status' => 200, 'message' => 'Xoá giỏ hàng thành công!', 'quantity' => $quantity, 'total' => $total, 'list_cart' => $list_cart]);
    }
}
