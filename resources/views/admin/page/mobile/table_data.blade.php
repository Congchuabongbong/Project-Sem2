@extends('admin.template.master_layout')
@section('link_private')
    <link rel="stylesheet" href="/dist/css/admin_pages/mobile_table_data.css">
    <meta name="csrf-token" content="{{ csrf_token() }}"/>
@endsection
@section('page-title','Admin | Mobile')
@section('breadcrumb')
    <div class="col-sm-6">
        <h1 class="m-0">Mobile</h1>
    </div><!-- /.col -->
    <div class="col-sm-6">
        <ol class="breadcrumb float-sm-right">
            <li class="breadcrumb-item"><a href="#">Home</a></li>
            <li class="breadcrumb-item active">Mobile / List</li>
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
                                <label for="name">Search by Name</label>
                                <input type="text" class="form-control" id="name" placeholder="Name category..."
                                       name="name">
                            </div>
                            <div class="col-md-2 m-3">
                                <label for="sortBy">Sort by </label>
                                <select class="form-control" name="sortBy">
                                    <option value="created_at_desc" selected>Created At (DESC)</option>
                                    <option value="created_at_asc">Created At (ASC)</option>
                                    <option value="price_desc">Price(DESC)</option>
                                    <option value="price_asc">Price(ASC)</option>
                                    <option value="name_desc">Name (DESC)</option>
                                    <option value="name_asc">Name (ASC)</option>
                                    <option value="id_desc">ID (DESC)</option>
                                    <option value="id_asc">ID (ASC)</option>
                                </select>
                            </div>
                            <div class="col-md-2 m-3">
                                <label for="status">Filter by status</label>
                                <select class="form-control" name="status" id="status">
                                    <option value="99" selected>---select---</option>
                                    <option value="-1">Out of stock</option>
                                    <option value="0">stop selling</option>
                                    <option value="1">on sale</option>
                                    <option value="2">sale off</option>
                                    <option value="3">top sale</option>
                                </select>
                            </div>
                            <div class="col-md-2 m-3">
                                <label for="brandID">Filter by Brand</label>
                                <select class="form-control" name="brandID" id="brandID">
                                    <option value="99" selected>---select---</option>
                                    @foreach($brands as $brand)
                                        <option value="{{$brand->id}}">{{$brand->name}}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>

                         <div class="row">
                            <div class="col-md-2 m-3">
                                <label for="from_price">Min by Price</label>
                                <input type="number" class="form-control" id="from_price" placeholder="Min price..."
                                    name="from_price">
                            </div>
                            <div class="col-md-2 m-3">
                                <label for="to_price">Max by Price</label>
                                <input type="number" class="form-control" id="to_price" placeholder="Max price..."
                                    name="to_price">
                            </div>
                            <div class="col-md-2 m-3">
                                <label for="start_date">Start date</label>
                                <input type="date" class="form-control" id="start_date" name="start_date">
                            </div>
                            <div class="col-md-2 m-3">
                                <label for="end_date">End date</label>
                                <input type="date" class="form-control" id="end_date" name="end_date">
                            </div>
                             <div class="col-md-2 m-3">
                                 <label for="ram">Filter by RAM</label>
                                 <select class="form-control" name="ram" id="ram">
                                     <option value="99" selected>---select---</option>
                                     <option value="4">4 GB</option>
                                     <option value="8">8 GB</option>
                                     <option value="16">16 GB</option>
                                     <option value="32">32 GB</option>
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
                            <div class="col-md-2 m-3">
                                <button type="button" class="btn btn-block btn-secondary btn-lg" id="btn-delete-selected" style="background: red">Delete All Select</button>
                            </div>
                        </div>
                    </form>
                </div>
                <!-- /.card-header -->
                <div class="card-body" id="data_table">
                    @include('admin.page.mobile.render_table')
                </div>
            </div>
        </div>
        @endSection
        @section('script_private')
            <script src="/dist/js/pages/mobile/table_data.js"></script>
@endSection
