@extends('admin.template.master_layout')
@section('page-title','Admin | Form')
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
        <h1 class="m-0">Account</h1>
    </div><!-- /.col -->
    <div class="col-sm-6">
        <ol class="breadcrumb float-sm-right">
            <li class="breadcrumb-item"><a href="#">Home</a></li>
            <li class="breadcrumb-item active">Account / Detail</li>
        </ol>
    </div><!-- /.col -->
@endSection

@section('content')
    <!-- Main content -->
    <section class="content">
        <!-- Default box -->
        <div class="card card-solid">
            <div class="card-body">
                <div class="row">
                    <div class="col-12 col-sm-2">
                        <h3 class="d-inline-block d-sm-none">Full name: {{$user->fullName}}</h3>
                        <h3 class="d-inline-block d-sm-none">Full name: {{$user->fullName}}</h3>
                        <div class="col-12">
                            <img src="{{$user->avatar}}" class="product-image" alt="Product Image">
                        </div>
                    </div>
                    <div class="col-12 col-sm-10">
                        <h3 class="my-3"><b>Full name:</b> {{$user->fullName}}</h3>
                        <h3 class="my-3"><b>Email:</b> {{$user->email}}</h3>
                        <h4><b>Role:</b> {{$user->strRolllle}}</h4>
                        <h4><b>Account Status:</b> {{$user->strStatus}}</h4>
                        <h4><b>Phone number:</b> {{$user->phone}}</h4>
                        <h4><b>Address:</b> {{$user->address}}</h4>
                        @php
                            $veriAT = "";
                                if (isset($user->email_verified_at)){
                                    $veriAT = date('d-m-Y', strtotime($user->email_verified_at));
                                 }else{
                                    $veriAT = 'no information';
                                 }
                        @endphp
                        <h4><b>Email Verified At:</b> {{$veriAT}}</h4>
                        <h4><b>Account Updated At:</b> {{date('d-m-Y', strtotime($user->updated_at))}}</h4>
                        <h4><b>Account Created At:</b> {{date('d-m-Y', strtotime($user->created_at))}}</h4>
                        <div class="mt-4">
                            <a href="/admin/user_admin/{{$user->id}}/edit">
                                <div class="btn btn-primary btn-lg btn-flat">
                                    <i class="fas fa-edit fa-lg mr-2"></i>
                                    Edit
                                </div>
                            </a>
                            <a href="/admin/user_admin">
                                <div class="btn btn-default btn-lg btn-flat">
                                    View List Account
                                </div>
                            </a>
                        </div>

                        <div class="mt-4 product-share">
                            <a href="#" class="text-gray">
                                <i class="fab fa-facebook-square fa-2x"></i>
                            </a>
                            <a href="#" class="text-gray">
                                <i class="fab fa-twitter-square fa-2x"></i>
                            </a>
                            <a href="#" class="text-gray">
                                <i class="fas fa-envelope-square fa-2x"></i>
                            </a>
                            <a href="#" class="text-gray">
                                <i class="fas fa-rss-square fa-2x"></i>
                            </a>
                        </div>

                    </div>
                </div>
                <div class="mt-4">
                    <nav class="w-100">
                        <div class="nav nav-tabs" id="product-tab" role="tablist">
                            <a class="nav-item nav-link active" id="product-desc-tab" data-toggle="tab"
                               href="#product-desc" role="tab" aria-controls="product-desc" aria-selected="true">Description</a>
                            <a {{$user->role == 1 ? 'hidden' : ''}} class="nav-item nav-link" id="product-comments-tab"
                               data-toggle="tab"
                               href="#product-comments" role="tab" aria-controls="product-comments"
                               aria-selected="false">Purchase history</a>
                        </div>
                    </nav>
                    <div class="tab-content p-3" id="nav-tabContent">
                        <div class="tab-pane fade show active" id="product-desc" role="tabpanel"
                             aria-labelledby="product-desc-tab">{{$user->description}}
                        </div>
                        <div class="tab-pane fade" id="product-comments" role="tabpanel"
                             aria-labelledby="product-comments-tab">
                            {{--                            order history start here--}}
                            <div class="row">
                                @if (count($order) > 0 )
                                    <table class="table table-bordered">
                                        <thead>
                                        <tr>
                                            <th style="text-align: center;width: 2%;">Order ID</th>
                                            <th style="text-align: center;width: 12%;">Recipient's name</th>
                                            <th style="text-align: center;width: 4%;">Ship Phone</th>
                                            <th style="text-align: center;width: 8%;">Ship Email</th>
                                            <th style="text-align: center;width: 18%;">Total Price (VND)</th>
                                            <th style="text-align: center;width: 15%;">Created At</th>
                                        </tr>
                                        </thead>
                                        <tbody>
                                        @foreach($order as $ord)
                                            <tr>
                                                <td style="text-align:center; vertical-align: middle">{{$ord->id}}</td>
                                                <td style="text-align:center; vertical-align: middle">{{$ord->name}}</td>
                                                <td style="text-align:center; vertical-align: middle">{{$ord->phone}}</td>
                                                <td style="text-align:center; vertical-align: middle">{{$ord->email}}</td>
                                                <td style="text-align:center; vertical-align: middle">{{$ord->fPrice}}</td>
                                                <td style="text-align:center; vertical-align: middle">{{date('d-m-Y', strtotime($ord->created_at))}}</td>
                                            </tr>
                                        @endforeach
                                        </tbody>
                                        <thead>
                                        <tr>
                                            <th style="text-align: center;width: 2%;">Order ID</th>
                                            <th style="text-align: center;width: 12%;">Recipient's name</th>
                                            <th style="text-align: center;width: 4%;">Ship Phone</th>
                                            <th style="text-align: center;width: 8%;">Ship Email</th>
                                            <th style="text-align: center;width: 18%;">Total Price (VND)</th>
                                            <th style="text-align: center;width: 15%;">Created At</th>
                                        </tr>
                                        </thead>
                                    </table>
                                @endif
                            </div>
                            <div class="row">
                                @if(count($order) > 0)
                                    <div class="col-sm-12 col-md-5">
                                        <div>
                                            <i>Showing {{($order->currentpage()-1)*$order->perpage()+1}} to
                                                {{$order->currentpage()*$order->perpage()}} of {{$order->total()}}
                                                entries</i>
                                        </div>
                                    </div>
                                @endif
                                <div class="col-sm-12 col-md-7">
                                    <div>
                                        @php
                                            $link_limit = 7;
                                        @endphp
                                        @if ($order->lastPage() > 1)
                                            <ul class="pagination">
                                                <li class="page-item  {{($order->currentPage() == 1) ? 'disabled' : '' }}">
                                                    <a class="page-link" href="{{ $order->url(1) }}">First</a>
                                                </li>
                                                <li class="page-item">
                                                    <a class="page-link"
                                                       href="{{ $order->url($order->currentPage() - 1) }}">Previous</a>
                                                </li>
                                                @for ($i = 1; $i <= $order->lastPage(); $i++)
                                                    @php
                                                        $half_total_links = floor($link_limit / 2);
                                                        $from = $order->currentPage() - $half_total_links;
                                                        $to = $order->currentPage() + $half_total_links;
                                                        if ($order->currentPage() < $half_total_links) { $to +=$half_total_links - $order->
                                                            currentPage();
                                                        }
                                                        if ($order->lastPage() - $order->currentPage() < $half_total_links) { $from
                                                            -=$half_total_links - ($order->lastPage() - $order->currentPage()) - 1;
                                                        }
                                                    @endphp
                                                    @if ($from < $i && $i < $to)
                                                        <li class="page-item {{ ($order->currentPage() == $i) ? ' active' : '' }}">
                                                            <a class="page-link"
                                                               href="{{ $order->url($i) }}">{{ $i }}</a>
                                                        </li>
                                                    @endif
                                                @endfor
                                                @if($order->currentPage() < $order->lastPage())
                                                    <li class="page-item">
                                                        <a class="page-link"
                                                           href="{{ $order->url($order->currentPage() + 1) }}">Next</a>
                                                    </li>
                                                @endif
                                                <li
                                                    class="page-item {{ ($order->currentPage() == $order->lastPage()) ? ' disabled' : '' }}">
                                                    <a class="page-link"
                                                       href="{{ $order->url($order->lastPage()) }}">Last</a>
                                                </li>
                                            </ul>
                                        @endif
                                    </div>
                                </div>
                            </div>

                            {{--                            order history end here--}}
                        </div>
                    </div>
                </div>
            </div>
            <!-- /.card-body -->
        </div>
        <!-- /.card -->
    </section>
    <!-- /.content -->
@endsection()
@section('script_private')
    <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
@endSection
