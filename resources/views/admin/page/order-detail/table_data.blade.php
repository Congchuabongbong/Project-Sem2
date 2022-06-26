@extends('admin.template.master_layout')
@section('link_private')
    <link rel="stylesheet" href="/dist/css/admin_pages/mobile_table_data.css">
    <meta name="csrf-token" content="{{ csrf_token() }}"/>
@endsection
@section('page-title','Admin | Order Detail')
@section('breadcrumb')
    <div class="col-sm-6">
        <h1 class="m-0">Order Detail</h1>
    </div><!-- /.col -->
    <div class="col-sm-6">
        <ol class="breadcrumb float-sm-right">
            <li class="breadcrumb-item"><a href="#">Home</a></li>
            <li class="breadcrumb-item active">Order Detail / List</li>
        </ol>
    </div><!-- /.col -->
@endSection


@section('content')

    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    <h3 class="card-title">Table</h3>
                </div>

                <div class="card-header">
                    <form action="" name="formFilter" id="formFilter" method="POST">
                        {{csrf_field ()}}
                        <div class="row">
                            <div class="col-md-2 m-3">
                                <label for="pagination_limit">Show</label>
                                <select class="form-control" name="pagination_limit" id="pagination_limit">
                                    <option value="limit_9" selected>Litmit 9</option>
                                    <option value="limit_18">Litmit 18</option>
                                    <option value="limit_32">Litmit 32</option>
                                </select>
                            </div>
                            <div class="col-md-2 m-3">
                                <label for="sortBy">Sort by </label>
                                <select class="form-control" name="sortBy">
                                    <option value="created_at_desc" selected>Created At (DESC)</option>
                                    <option value="created_at_asc">Created At (ASC)</option>
                                </select>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-2 m-3">
                                <button type="submit" class="btn btn-block btn-primary btn-lg"
                                        id="filterSubmit">Filter
                                </button>
                            </div>
                            <div class="col-md-2 m-3">
                                <button type="reset" class="btn btn-block btn-secondary btn-lg"
                                        id="resetFilter">Refresh
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
                <!-- /.card-header -->
                <div class="card-body" id="data_table">
                    @include('admin.page.order-detail.render_table')
                </div>
            </div>
        </div>
        @endSection
        @section('script_private')
            <script src="/dist/js/pages/order-detail/table_data.js"></script>
@endSection
