<?php

namespace App\Http\Controllers\ClientController;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AuthCustomerController extends Controller
{
    public function customerGetLogin()
    {
        return view('client.page.login');
    }

    public function customerPostLogin(Request $request)
    {
        $email = $request->get('email');
        $password = $request->get('password');
        if (Auth::attempt(['email' => $email, 'password' => $password])) {
            $data = [
                'status' => 200,
                'message' => 'login success!!!'
            ];
        } else {
            $data = [
                'status' => 404,
                'message' => 'login failed!!!'
            ];
        }
        return response()->json($data);
    }

    public function logout()
    {
        Auth::logout();
        return redirect('/auth/adminlogin');
    }
}
