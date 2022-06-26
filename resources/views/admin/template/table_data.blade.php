@extends('admin.template.master_layout')
@section('link_private')
    <link rel="stylesheet" href="/dist/css/admin_pages/table_data.css">
@endsection
@section('page-title','Admin | Table')
@section('breadcrumb')
<div class="col-sm-6">
    <h1 class="m-0">Product</h1>
</div><!-- /.col -->
<div class="col-sm-6">
    <ol class="breadcrumb float-sm-right">
        <li class="breadcrumb-item"><a href="#">Home</a></li>
        <li class="breadcrumb-item active"> Table</li>
    </ol>
</div><!-- /.col -->
@endSection

@section('content')

<div class="row">
    <div class="col-md-12">
        <div class="card">
            <div class="card-header">
                <h3 class="card-title">Table</h3>
                <div class="card-tools">
                    <form action="" id="searchForm">
                        <div class="input-group input-group-sm" style="width: 150px;">
                            <input type="text" name="keyword" id="keyword" class="form-control float-right" placeholder="Search">
                            <div class="input-group-append">
                                <button type="submit" id="btnSearch" class="btn btn-default">
                                    <i class="fas fa-search"></i>
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
            <!-- /.card-header -->
            <div class="card-body" id="data_table">
                @include('admin.page.category.render_table')
            </div>
    </div>
</div>
@endSection
@section('script_private')
<script src="/dist/js/pages/table_data.js"></script>
@endSection
