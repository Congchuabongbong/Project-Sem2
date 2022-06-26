<?php

namespace App\Http\Controllers\ClientController;

use App\Models\Order;
use App\Mail\SendMail;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Mail;

class SendMailController extends Controller
{
    public function send_email(Request $request)
    {
        $id = $request->get('id');
        $order = Order::find($id);
        if ($order) {
            Mail::send(
                'client.page.fetch_data.view_invoice_confirm_email',
                ['order' => $order],
                function ($message) use ($order) {
                    $message->to($order->email, $order->name)
                        ->subject("Invoice #" . $order->id);
                    $message->from('wiki.mobile.store@gmail.com', 'Wiki Mobile');
                }
            );
            return response()->json(['status' => 200,'message' => 'Invoice confirmed']);
        }
        return response()->json(['status' => 404 ,'message' => 'Something went wrong!']);
    }
}
