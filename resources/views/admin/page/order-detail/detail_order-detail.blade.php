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
        <h1 class="m-0">Order Detail</h1>
    </div><!-- /.col -->
    <div class="col-sm-6">
        <ol class="breadcrumb float-sm-right">
            <li class="breadcrumb-item"><a href="#">Home</a></li>
            <li class="breadcrumb-item active">Order Detail/ Detail</li>
        </ol>
    </div><!-- /.col -->
@endSection

@section('content')
    <!-- Default box -->
    <div class="card">
        <div class="card-header">
            <h3 class="card-title">Order Detail</h3>

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
                <div class="col-12 col-sm-4">
                    <div class="col-12">
                        <img style="width: 100%" src="{{$result->mobile->mainThumbnail}}" class="product-image currentImage" id="currentImage">
                    </div>
                    <div class="col-12 product-image-thumbs" id='product-image-thumbs'>
                    </div>
                </div>
                <?php
                $price_before = $result->quantity * $result->unitPrice *(1-$result->discount);
                $price = number_format($price_before, 0, '', ',');
                ?>
                <div class="col-12 col-sm-8">
                    <h3 class="my-3">Order #{{$result->orderID}}</h3>
                    <h5 class="my-3"><b>Product:</b> {{$result->mobile->name}}</h5>
                    <h5 class="my-3"><b>Quantity:</b> {{$result->quantity}}</h5>
                    <h5 class="my-3"><b>Discount:</b> {{$result->discount *100}}%</h5>
                    <h5 class="my-3"><b>Total Price:</b> {{$price}} VND</h5>
                    <h5 class="my-3"><b>Created At:</b> {{$result->created_at}}</h5>
                </div>
            </div>
        </div>
        <div class="card-footer">
            <a href="{{route('order-detail.index')}}" class="btn btn-default float-right">Back to list</a>
        </div>
        <!-- /.card-body -->
    </div>
    <!-- /.card -->
@endsection('content')

@section('script_private')
    <script src="/dist/js/pages/category/edit_category.js"></script>
    <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
@endSection
