@extends('admin.template.master_layout')
@section('page-title','Admin | Category Detail')
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
        <h1 class="m-0">Category</h1>
    </div><!-- /.col -->
    <div class="col-sm-6">
        <ol class="breadcrumb float-sm-right">
            <li class="breadcrumb-item"><a href="#">Home</a></li>
            <li class="breadcrumb-item active">Category / Detail</li>
        </ol>
    </div><!-- /.col -->
@endSection

@section('content')
    <!-- Default box -->
    <div class="card">
        <div class="card-header">
            <h3 class="card-title">Category Detail</h3>

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
                            <h4>{{$result->name}}</h4>
                            <div class="post">
                                <p>{{$result->description}}</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="card-footer">
            <a href="{{route('category.edit', $result->id)}}" class="btn btn-info">Edit</a>
            <a href="{{route('category.index')}}" class="btn btn-default float-right">Back to list</a>
        </div>
        <!-- /.card-body -->
    </div>
    <!-- /.card -->
@endsection('content')

@section('script_private')
    <script src="/dist/js/pages/category/edit_category.js"></script>
    <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
@endSection
