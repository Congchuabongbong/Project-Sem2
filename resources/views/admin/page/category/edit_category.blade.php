@extends('admin.template.master_layout')
@section('page-title','Admin | Edit Category')
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
        <h1 class="m-0">Category</h1>
    </div><!-- /.col -->
    <div class="col-sm-6">
        <ol class="breadcrumb float-sm-right">
            <li class="breadcrumb-item"><a href="#">Home</a></li>
            <li class="breadcrumb-item active">Category / Edit</li>
        </ol>
    </div><!-- /.col -->
@endSection


@section('content')
    <div class="row">
        <div class="col-md-12">
            <!-- jquery validation -->
            <div class="card card-primary">
                <div class="card-header">
                    <h3 class="card-title">Edit category</h3>
                </div>
                <!-- /.card-header -->
                <!-- form start -->
                <form action="" method="">
                    <input type="text" name="id" class="form-control c" value="{{$result->id}}" style="display: none">
                    <div class="card-body">
                        <div class="form-group">
                            <label for="name">Category Name</label>
                            <input type="text" name="name" id = "name" class="form-control c" value="{{$result->name}}">
                            <span class="error name_error"></span>
                        </div>
                        <div class="form-group">
                            <label>Category Description</label>
                            <textarea name="description" class="form-control col-7" rows="3">{{$result->description}}
                            </textarea>
                            <span class="error description_error"></span>
                        </div>
                    </div>
                    <!-- /.card-body -->
                    <div class="card-footer">
                        <button type="submit" class="btn btn-primary" id="btn-submit">Submit</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endSection
@section('script_private')
    <script src="/dist/js/pages/category/edit_category.js"></script>
    <script src="/cdn.jsdelivr.net/npm/sweetalert2@11"></script>
@endSection
