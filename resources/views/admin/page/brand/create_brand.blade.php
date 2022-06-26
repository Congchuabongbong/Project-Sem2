@extends('admin.template.master_layout')
@section('page-title','Admin | Create Brand')
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
        <h1 class="m-0">Brand</h1>
    </div><!-- /.col -->
    <div class="col-sm-6">
        <ol class="breadcrumb float-sm-right">
            <li class="breadcrumb-item"><a href="#">Home</a></li>
            <li class="breadcrumb-item active">Brand / Create</li>
        </ol>
    </div><!-- /.col -->
@endSection
@section('content')
    <div class="row">
        <div class="col-md-12">
            <!-- jquery validation -->
            <div class="card card-primary">
                <div class="card-header">
                    <h3 class="card-title">Create Brand</h3>
                </div>
                <!-- /.card-header -->
                <!-- form start -->
                <form action="" method="">
                    <div class="card-body">
                        <div class="form-group">
                            <label for="name">Brand Name</label>
                            <input type="text" name="name" class="form-control col-4" id="name"
                                   placeholder="Enter name brand...">
                            <span class="error name_error"></span>
                        </div>
                        <div class="form-group">
                            <label>Brand Description</label>
                            <textarea name="description" class="form-control col-7" rows="3"
                                      placeholder="Enter description brand ..."></textarea>
                            <span class="error description_error"></span>
                        </div>
                        <div class="form-group">
                            <button type="submit" class="btn btn-success" id="btn-submit">Submit</button>
                            <button type="reset" class="btn btn-secondary">Reset</button>
                        </div>
                </form>
            </div>
        </div>
    </div>
    </div>
@endSection
@section('script_private')
    <script src="/dist/js/pages/brand/create_brand.js"></script>
@endSection
