@extends('client.template.form')
@section('title_page','Cửa Hàng')
@section('private_link')
<meta name="csrf-token" content="{{ csrf_token() }}" />
<link rel="stylesheet" type="text/css" href="/client-assets/assets/css/style.css">
@endsection
@section('main_content_page')
<main id="main" class="main-site left-sidebar">
    <div class="container">
        <div class="wrap-breadcrumb">
            <ul>
                <li class="item-link"><a href="/" class="link">Trang chủ</a></li>
                <li class="item-link"><span>Điện Thoại</span></li>
            </ul>
        </div>
        <div class="row">
            <div class="col-lg-9 col-md-8 col-sm-8 col-xs-12 main-content-area">
                <div class="banner-shop">
                    <a href="#" class="banner-link">
                        <figure><img
                                src="https://res.cloudinary.com/tanvnth2012002/image/upload/c_scale,h_272,w_870/v1639064578/830-300-830x300-24_rq7xcc.png"
                                alt=""></figure>
                    </a>
                </div>
                <div class="wrap-shop-control">
                    <div class="wrap-right">
                        <div class="sort-item orderby ">
                            <select name="orderby" class="use-chosen" id="sortBy">
                                <option value="price_desc">Giá giảm dần</option>
                                <option value="price_asc">Giá tăng dần</option>
                            </select>
                        </div>
                        <div class="sort-item product-per-page">
                            <select name="post-per-page" class="use-chosen" id="pagination_limit">
                                <option value="limit_9" selected>Giới hạn 9</option>
                                <option value="limit_18">Giới hạn 18</option>
                                <option value="limit_32">Giới hạn 32</option>
                            </select>
                        </div>
                    </div>
                </div>
                <!--end wrap shop control-->
                <!--pagination and fetch_data-->
                <div id="data_table">
                    @include('client.page.fetch_data.pagination_shop_mobile_data')
                </div>
            </div>
            <!--end main products area-->
            <div class="col-lg-3 col-md-4 col-sm-4 col-xs-12 sitebar">
                <div class="widget mercado-widget filter-widget brand-widget">
                    <h2 class="widget-title">Nhãn Hiệu</h2>
                    <div class="widget-content">
                        <ul class="list-style vertical-list list-limited" data-show="6">
                            <li class="list-item"><a value='-1' class="filter-link filter-brand active" href="#">Tất
                                    cả</a></li>
                            @foreach ($brands as $item)
                            <li class="list-item"><a value='{{$item -> id}}' class="filter-link filter-brand"
                                    href="#">{{$item -> name}}</a></li>
                            @endforeach
                        </ul>
                    </div>
                </div><!-- brand widget-->
                <div class="widget mercado-widget filter-widget brand-widget">
                    <h2 class="widget-title">Giá</h2>
                    <div class="widget-content">
                        <ul class="list-style vertical-list list-limited">
                            <li class="list-item"><a value="-1" class="filter-link filter-price active" href="#">Tất
                                    cả</a></li>
                            <li class="list-item"><a value="1" class="filter-link filter-price" href="#">Dưới 2
                                    triệu</a></li>
                            <li class="list-item"><a value="2" class="filter-link filter-price" href="#">Từ 2 đến 4
                                    triệu</a></li>
                            <li class="list-item"><a value="3" class="filter-link filter-price" href="#">Từ 4 đến 7
                                    triệu</a></li>
                            <li class="list-item"><a value="4" class="filter-link filter-price" href="#">Từ 7 đến 13
                                    triệu</a></li>
                            <li class="list-item"><a value="5" class="filter-link filter-price" href="#">Trên 13
                                    triệu</a></li>
                        </ul>
                    </div>
                </div><!-- price widget-->
                <div class="widget mercado-widget filter-widget brand-widget">
                    <h2 class="widget-title">Dung lượng pin</h2>
                    <div class="widget-content">
                        <ul class="list-style vertical-list list-limited">
                            <li class="list-item"><a value="-1" class="filter-link filter-battery active" href="#">Tất
                                    cả</a></li>
                            <li class="list-item"><a value="1" class="filter-link filter-battery" href="#">Dưới 3000
                                    mah</a></li>
                            <li class="list-item"><a value="2" class="filter-link filter-battery" href="#">Từ 3000 -
                                    4000mah</a></li>
                            <li class="list-item"><a value="3" class="filter-link filter-battery" href="#">Trên
                                    4000mah</a></li>
                        </ul>
                    </div>
                </div><!-- pin widget-->
                <div class="widget mercado-widget filter-widget brand-widget">
                    <h2 class="widget-title">Màn hình</h2>
                    <div class="widget-content">
                        <ul class="list-style vertical-list list-limited">
                            <li class="list-item"><a value='-1' class="filter-link filter-screen active" href="#">Tất
                                    cả</a></li>
                            <li class="list-item"><a value='1' class="filter-link filter-screen" href="#">Dưới 5.0
                                    inch</a></li>
                            <li class="list-item"><a value='2' class="filter-link filter-screen" href="#">Dưới 6.0
                                    inch</a></li>
                            <li class="list-item"><a value='3' class="filter-link filter-screen" href="#">Trên 6.0
                                    inch</a></li>
                        </ul>
                    </div>
                </div><!-- screen widget-->
                <div class="widget mercado-widget filter-widget brand-widget">
                    <h2 class="widget-title">Ram</h2>
                    <div class="widget-content">
                        <ul class="list-style vertical-list list-limited">
                            <li class="list-item"><a value='-1' class="filter-link filter-ram active" href="#">Tất
                                    cả</a></li>
                            <li class="list-item"><a value='3' class="filter-link filter-ram" href="#">3 gb</a></li>
                            <li class="list-item"><a value='4' class="filter-link filter-ram" href="#">4 gb</a></li>
                            <li class="list-item"><a value='8' class="filter-link filter-ram" href="#">8 gb</a></li>
                            <li class="list-item"><a value='16' class="filter-link filter-ram" href="#">16 gb</a>
                            </li>
                            <li class="list-item"><a value='32' class="filter-link filter-ram" href="#">32 gb</a>
                            </li>
                        </ul>
                    </div>
                </div><!-- ram widget-->
                @if(isset($mobiles_recent_view) && count($mobiles_recent_view) > 0)
                <div class="widget mercado-widget widget-product">
                    <h2 class="widget-title">Sản phẩm xem gần đây</h2>
                    <div class="widget-content">
                        <ul class="products">
                            @foreach ($mobiles_recent_view as $item)
                            @php
                            $price_recent_item = number_format($item -> price, 0, '', ','); // 1,000,000
                            @endphp
                            <li class="product-item">
                                <div class="product product-widget-style">
                                    <div class="thumbnnail">
                                        <a href="{{route('mobile_client.show', $item -> id)}}"
                                            title="{{$item -> name}}">
                                            <figure><img src="{{$item -> mainThumbnail}}" alt=""></figure>
                                        </a>
                                    </div>
                                    <div class="product-info">
                                        <a href="{{route('mobile_client.show', $item -> id)}}"
                                            class="product-name"><span>{{$item -> name}}</span></a>
                                        <div class="wrap-price"><span
                                                class="product-price">{{$price_recent_item}}(VND)</span>
                                        </div>
                                    </div>
                                </div>
                            </li>
                            @endforeach
                        </ul>
                    </div>
                </div><!-- recent view widget-->
                @endIf
            </div>
            <!--end sitebar-->
        </div>
        <!--end row-->
    </div>
    <!--end container-->
</main>
@endsection
@section('private_scripts')
<script>
    $(document).ready(function () {
            $('body').addClass('home-page home-01');
        });
</script>
<script src="/dist/js/pages/client/shopMobile.js"></script>
@endsection
