@extends('admin.template.master_layout')
@section('link_private')
    <link rel="stylesheet" href="/dist/css/admin_pages/mobile_table_data.css">
    <meta name="csrf-token" content="{{ csrf_token() }}"/>
@endsection
@section('page-title','Admin | Feedback')
@section('breadcrumb')
    <div class="col-sm-6">
        <h1 class="m-0">Feedback</h1>
    </div><!-- /.col -->
    <div class="col-sm-6">
        <ol class="breadcrumb float-sm-right">
            <li class="breadcrumb-item"><a href="#">Home</a></li>
            <li class="breadcrumb-item active">Feedback / List</li>
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
                            <div class="col-md-3 m-3">
                                <label for="pagination_limit">Show</label>
                                <select class="form-control" name="pagination_limit" id="pagination_limit">
                                    <option value="limit_9" selected>Litmit 9</option>
                                    <option value="limit_18">Litmit 18</option>
                                    <option value="limit_32">Litmit 32</option>
                                </select>
                            </div>
                            <div class="col-md-3 m-3">
                                <label for="fullName">Search by Name</label>
                                <input type="text" class="form-control" id="name" placeholder="Name"
                                       name="name">
                            </div>
                            <div class="col-md-3 m-3">
                                <label for="sortBy">Sort by </label>
                                <select class="form-control" name="sortBy">
                                    <option value="created_at_desc" >Created At (DESC)</option>
                                    <option value="created_at_asc">Created At (ASC)</option>
                                    <option value="name_desc">Name (DESC)</option>
                                    <option value="name_asc">Name (ASC)</option>
                                    <option value="id_desc" >ID (DESC)</option>
                                    <option value="id_asc" selected>ID (ASC)</option>
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
                    @include('admin.page.contact.render_table')
                </div>
            </div>
        </div>
        @endSection
        @section('script_private')
            <script src="/dist/js/pages/contact/contact_table.js"></script>
@endSection
