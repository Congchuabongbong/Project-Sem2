<?php

namespace App\Http\Controllers\ClientController;

use App\Http\Controllers\Controller;
use App\Models\Feedback;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Validator;
class FeedbackController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('client.page.contact');
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
        $validator = Validator::make(
            $request->all(),
            [
                'name' => 'required',
                'email' => 'required',
                'phone' => 'required',
                'comment' => 'required'
            ],
            [
                'name.required' => 'Quý khách cần điền họ tên',
                'email.required' => 'Quý khách cần điền email',
                'phone.required' => 'Quý khách cần điền số điện thoại',
                'comment.required' => 'Quý khách cần điền nhận xét'
            ]
        );
        if ($validator->fails()) {
            return response()->json(['status' => 400, 'errors' => $validator->errors()->toArray(), 'message' => 'Data not valid!']);
        } else {
            $feedback = new Feedback();
            $feedback->name = $request->get('name');
            $feedback->email = $request->get('email');
            $feedback->phone = $request->get('phone');
            $feedback->comment = $request->get('comment');
            $feedback->created_at = Carbon::now();
            $feedback->updated_at = Carbon::now();
            $result = $feedback->save();
            if ($result) {
                return response()->json(['status' => 200, 'message' => 'Cảm Ơn Quý Khách Đẫ Để Lại Phản Hồi!']);
            } else {
                return response()->json(['status' => 500, 'message' => 'Gửi Phản Hồi Không Thành']);
            }
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $result = DB::table('feedback')->where('id', '=', $id)->first();
        return view('admin.page.contact.detail_feedback', compact('result'));
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
