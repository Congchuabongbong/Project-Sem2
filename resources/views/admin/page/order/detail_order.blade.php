@extends('admin.template.master_layout')
@section('page-title','Admin | Order Detail')
@section('link_private')
    <link href="https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote.min.css" rel="stylesheet">
    <meta name="csrf-token" content="{{ csrf_token() }}"/>
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
            <li class="breadcrumb-item active">Order/ Detail</li>
        </ol>
    </div><!-- /.col -->
@endSection

@section('content')
    <!-- Default box -->
    <div class="card">
        <div class="card-header">
            <h3 class="card-title">Order #{{$result->id}}</h3>

            <div class="card-tools">
                <button type="button" class="btn btn-tool" data-card-widget="collapse" title="Collapse">
                    <i class="fas fa-minus"></i>
                </button>
                <button type="button" class="btn btn-tool" data-card-widget="remove" title="Remove">
                    <i class="fas fa-times"></i>
                </button>
            </div>
        </div>
        <div class="card-body">
            <div class="row">
                <div class="col-12 col-md-12">
                    <div class="row">
                        <div class="col-12">
                            <p><b>Customer Name:</b> {{$result->name}}</p>
                            <p><b>Phone:</b> {{$result->phone}}</p>
                            <p><b>Email:</b> {{$result->email}}</p>
                            <p><b>Total Price:</b> {{$result->totalPrice}}</p>
                            <p><b>Created At:</b> {{$result->created_at}}</p>
                        </div>
                        <table class="table">
                            <thead class="thead-light">
                            <tr>
                                <th style="text-align: center; ">#</th>
                                <th style="text-align: center;  " scope="col">Sản phẩm</th>
                                <th style="text-align: center; " scope="col">Số lượng</th>
                                <th style="text-align: center; " scope="col">Discount</th>
                                <th style="text-align: center; " scope="col">Tổng tiền (VND)</th>
                            </tr>
                            </thead>
                            <tbody>
                            @php
                            $i = 1;
                            @endphp
                            @foreach($order_detail as $order )
                                @php
                                    $price_before = $order->quantity * $order->unitPrice *(1-$order->discount);
                                    $price = number_format($price_before, 0, '', ',');
                                @endphp
                                <tr>
                                    <td style="text-align: center">{{$i++}}</td>
                                    <td style="text-align: center">{{$order->mobile->name}}</td>
                                    <td style="text-align: center">{{$order->quantity}}</td>
                                    <td style="text-align: center">{{$order->discount *100}}%</td>
                                    <td style="text-align: center">{{$price}}</td>
                                </tr>
                            @endforeach
                            </tbody>
                            <thead class="thead-light">
                            <tr>
                                <th style="text-align: center; ">#</th>
                                <th style="text-align: center;  " scope="col">Sản phẩm</th>
                                <th style="text-align: center; " scope="col">Số lượng</th>
                                <th style="text-align: center; " scope="col">Discount</th>
                                <th style="text-align: center; " scope="col">Tổng tiền (VND)</th>
                            </tr>
                            </thead>
                        </table>
                    </div>
                </div>
            </div>
        </div>
        <div class="card-footer">
            <a href="{{route('orders.index')}}" class="btn btn-default float-right">Back to list</a>
        </div>
        <!-- /.card-body -->
    </div>
    <!-- /.card -->
@endsection('content')

@section('script_private')
    <script src="/dist/js/pages/category/edit_category.js"></script>
    <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
@endSection
