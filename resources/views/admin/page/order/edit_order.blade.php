@extends('admin.template.master_layout')
@section('page-title','Admin | Edit Order')
@section('link_private')
    <link href="https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote.min.css" rel="stylesheet">
    <meta name="csrf-token" content="{{ csrf_token() }}" />
    <style>
        .error {
            color: red;
        }
    </style>
@endSection
@section('breadcrumb')
    <div class="col-sm-6">
        <h1 class="m-0">Order</h1>
    </div><!-- /.col -->
    <div class="col-sm-6">
        <ol class="breadcrumb float-sm-right">
            <li class="breadcrumb-item"><a href="#">Home</a></li>
            <li class="breadcrumb-item active">Order / Edit</li>
        </ol>
    </div><!-- /.col -->
@endSection

@section('content')
    <div class="row">
        <div class="col-md-12">
            <!-- jquery validation -->
            <div class="card card-primary">
                <div class="card-header">
                    <h3 class="card-title">Edit Order</h3>
                </div>
                <!-- /.card-header -->
                <!-- form start -->
                <form action="" method="">
                    <input type="text" name="id" class="form-control c" value="{{$result->id}}" style="display: none">
                    <div class="card-body">
                        <div class="form-group">
                            <label for="name">Name</label>
                            <input type="text" name="name" class="form-control c" value="{{$result->name}}">
                            <span class="error name_error"></span>
                        </div>
                        <div class="form-group">
                            <label for="phone">Phone</label>
                            <input type="text" name="phone"  class="form-control c" value="{{$result->phone}}">
                            <span class="error phone_error"></span>
                        </div>
                        <div class="form-group">
                            <label for="email">Email</label>
                            <input type="text" name="email"  class="form-control c" value="{{$result->email}}">
                            <span class="error email_error"></span>
                        </div>
                        <div class="form-group">
                            <label for="address_detail">Address</label>
                            <input type="text" name="address_detail"  class="form-control c" value="{{$result->address_detail}}">
                            <span class="error address_error"></span>
                        </div>
                        <div class="form-group">
                            <label for="totalPrice">Total Price</label>
                            <input type="number" name="totalPrice"  class="form-control c" value="{{$result->totalPrice}}">
                            <span class="error totalPrice_error"></span>
                        </div>
                        <div class="form-group">
                            <label for="checkOut">Check Out</label>
                            <input type="text" name="checkOut"  class="form-control c" value="{{$result->checkOut}}">
                            <span class="error checkOut_error"></span>
                        </div>
                        <div class="form-group">
                            <label>Comment</label>
                            <textarea name="comment" class="form-control col-7" rows="3">{{$result->comment}}</textarea>
                            <span class="error comment_error"></span>
                        </div>
                    </div>
                    <!-- /.card-body -->
                    <div class="card-footer">
                        <button type="submit" class="btn btn-primary" id="btn-submit">Submit</button>
                        <button class="btn btn-default float-right"><a style="color: #44474b" href="/admin/orders">Back to list</a></button>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endSection
@section('script_private')
    <script src="/dist/js/pages/order/edit_order.js"></script>
    <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
@endSection
