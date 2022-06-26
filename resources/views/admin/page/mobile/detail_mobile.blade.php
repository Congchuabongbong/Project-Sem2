@extends('admin.template.master_layout')
@section('page-title','Admin | Mobile Detail')
@section('link_private')
<link href="https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote.min.css" rel="stylesheet">
<meta name="csrf-token" content="{{ csrf_token() }}" />
@endSection
@section('breadcrumb')
<div class="col-sm-6">
    <h1 class="m-0">Mobile</h1>
</div><!-- /.col -->
<div class="col-sm-6">
    <ol class="breadcrumb float-sm-right">
        <li class="breadcrumb-item"><a href="#">Home</a></li>
        <li class="breadcrumb-item active">Mobile / Detail</li>
    </ol>
</div><!-- /.col -->
@endSection

@section('content')
<div class="card-body">
    <div class="row">
        <input type="hidden" value="{{$mobile-> thumbnail}}" id = "arr_thumbnail">
        <div class="col-12 col-sm-6">
            <div class="col-12">
                <img src="{{$mobile->mainThumbnail}}" class="product-image currentImage" id="currentImage">
            </div>
            <div class="col-12 product-image-thumbs" id='product-image-thumbs'>              
            </div>
        </div>
        <div class="col-12 col-sm-6">
            <h2 class="my-3">{{$mobile->name}}</h2>
            <h4 class="my-3"><b>Brand:</b> {{$mobile->brand->name}}</h4>
            <h4 class="my-3"><b>Description:</b></h4>
            <p style="max-height:200px;overflow:auto;"><i>{{$mobile->description}}</i></p>
            <hr>
            <h4><b>Status: </b>{{strtoupper($mobile->strStatus)}}</h4>
            <hr>

            <h4><b>Color: </b> <span
                    style="width:15px;height:15px;border-radius: 100%;background:{{$mobile->color}};display:inline-block;"></span>
                {{strtoupper($mobile->color)}}</h4>
            <hr>

            <div class="btn-group btn-group-toggle" data-toggle="buttons">
                <label class="btn btn-default text-center">
                    <h4 class="mt-3"><b>Screen</b></h4>
                    <input type="radio" name="color_option" id="color_option_b1" autocomplete="off">
                    <span class="text-xl">{{$mobile->screenSize}}</span>
                    <br>(Inch)
                </label>
                <label class="btn btn-default text-center">
                    <h4 class="mt-3"><b>Pin</b></h4>
                    <input type="radio" name="color_option" id="color_option_b1" autocomplete="off">
                    <span class="text-xl">{{$mobile->pin}}</span>
                    <br>(mha)
                </label>
                <label class="btn btn-default text-center">
                    <h4 class="mt-3"><b>Memory</b></h4>
                    <input type="radio" name="color_option" id="color_option_b1" autocomplete="off">
                    <span class="text-xl">{{$mobile->memory}}</span>
                    <br>(GB)
                </label>
                <label class="btn btn-default text-center">
                    <h4 class="mt-3"><b>Camera</b></h4>
                    <input type="radio" name="color_option" id="color_option_b1" autocomplete="off">
                    <span class="text-xl">{{$mobile->camera}}</span>
                    <br>(Pixel)
                </label>
                <label class="btn btn-default text-center">
                    <h4 class="mt-3"><b>Ram</b></h4>
                    <input type="radio" name="color_option" id="color_option_b1" autocomplete="off">
                    <span class="text-xl">{{$mobile->ram}}</span>
                    <br>(GB)
                </label>
            </div>
            <hr>
            <?php
            $price = number_format($mobile -> price, 0, '', ',');
            $price_current = number_format($mobile -> price - ($mobile -> price * $mobile -> saleOff), 0, '', ',');
            ?>
            <h4><b>Quantity: </b>{{strtoupper($mobile->quantity)}} (items)</h4>
            <hr>
            <h4 class="mt-3"><b>Price</b></h4>
            @if ($mobile -> saleOff > 0)
            <div class="bg-gray py-2 px-3 mt-4">
                (Discount: {{$mobile -> saleOff * 100}}%)
                <strike>
                    <h2 class="mb-0">{{$price}} (VND)</h2>
                </strike>
                <h4 class="mt-0">
                    <small>Current price: {{$price_current}} (VND) </small>
                </h4>
            </div>
            <hr>
            @else
            <div class="bg-gray py-2 px-3 mt-4">
                (Discount: {{$mobile -> saleOff * 100}}%)
                <h2 class="mb-0">{{$price}} (VND)</h2>               
            </div>
            @endif
            <hr>
            <h6><b>Created at: </b>{{strtoupper($mobile->created_at)}}</h6>
            <hr>
            <h6><b>Updated at: </b>{{strtoupper($mobile->updated_at)}}</h6>
            <hr>
            <div class="mt-4">
                <a class="btn btn-info btn-sm" href="/admin/mobile/{{$mobile->id}}/edit"">
                    <i class="fas fa-pencil-alt">Edit</i>
                </a>
                <a class="btn btn-danger btn-sm delete" id="btn-delete" href="#" mobile_id= "{{$mobile->id}}">
                    <i class="fas fa-trash">Delete</i>
                </a>
                <a class="btn btn-info btn-sm " href="{{route('mobile.index')}}">
                    <i class="fas fa-undo-alt">Back list products</i>
                </a>
            </div>
            <hr>
        </div>
        <div class="row mt-4">
            <nav class="w-100">
                <div class="nav nav-tabs" id="product-tab" role="tablist">
                    <h4 class="nav-item nav-link active" id="product-desc-tab"><b>Content detail</b></h4>
                </div>
            </nav>
            <div class="tab-content p-3" id="nav-tabContent">
                <div class="tab-pane fade show active" id="product-desc" role="tabpanel"
                    aria-labelledby="product-desc-tab">
                    {!! $mobile-> detail !!}
                </div>
            </div>
        </div>
    </div>
    @endsection()

    @section('script_private')
    <script src="/dist/js/pages/mobile/detail_mobile.js"></script>
    <script src="//cdn.jsdelivr.net/npm/sweetalert2@11">
    </script>
    @endSection