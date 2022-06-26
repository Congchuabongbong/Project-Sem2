@extends('admin.template.master_layout')
@section('page-title','Admin | Article Detail')
@section('link_private')
    <link href="https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote.min.css" rel="stylesheet">
    <meta name="csrf-token" content="{{ csrf_token() }}" />
@endSection
@section('breadcrumb')
    <div class="col-sm-6">
        <h1 class="m-0">Article</h1>
    </div><!-- /.col -->
    <div class="col-sm-6">
        <ol class="breadcrumb float-sm-right">
            <li class="breadcrumb-item"><a href="#">Home</a></li>
            <li class="breadcrumb-item active">Article / Detail</li>
        </ol>
    </div><!-- /.col -->
@endSection

@section('content')
    <div class="card-body">
        <div class="row">
            <div class="col-12 col-sm-6">
                <div class="col-12">
                    <img src="{{$article->thumbnail}}" class="product-image currentImage" id="currentImage">
                </div>
                <div class="col-12 product-image-thumbs" id='product-image-thumbs'>
                </div>
            </div>
            <div class="col-12 col-sm-6">
                <h2 class="my-3">{{$article->title}}</h2>
                <h4 class="my-3"><b>Article about:</b> {{$article->brand->name}}</h4>
                <h4 class="my-3"><b>Description:</b></h4>
                <p style="max-height:200px;overflow:auto;"><i>{{$article->description}}</i></p>
                <hr>
                <h6><b>Created at: </b>{{strtoupper($article->created_at)}}</h6>
                <hr>
                <h6><b>Updated at: </b>{{strtoupper($article->updated_at)}}</h6>
                <hr>
                <div class="mt-4">
                    <a class="btn btn-info btn-sm" href="/admin/article/{{$article->id}}/edit">
                    <i class="fas fa-pencil-alt">Edit</i>
                    </a>
                    <a class="btn btn-info btn-sm " href="{{route('article.index')}}">
                        <i class="fas fa-undo-alt">Back list articles</i>
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
                        {!! $article-> detail !!}
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
