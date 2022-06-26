@extends('client.template.form')
@section('title_page','Bài Viết')
@section('private_link')
<link rel="stylesheet" href="/dist/css/client_pages/article.css">
@endsection
@section('main_content_page')
<main id="main" class="main-site">

    <div class="container">

        <div class="wrap-breadcrumb">
            <ul>
                <li class="item-link"><a href="/" class="link">Trang Chủ</a></li>
                <li class="item-link"><span>Bài Viết</span></li>
            </ul>
        </div>
        <div class="row">

            <div class="col-lg-9 col-md-8 col-sm-8 col-xs-12 main-content-area">
                @include('client.page.fetch_data.pagination_article')
            </div>
            <!--end main products area-->

            <div class="col-lg-3 col-md-4 col-sm-4 col-xs-12 sitebar">
                @if(isset($articles_recent_view) && count($articles_recent_view) > 0)
                <div class="widget mercado-widget widget-product">
                    <h2 class="widget-title">Bài viết xem gần đây</h2>
                    <div class="widget-content">
                        <ul class="products">
                            @foreach ($articles_recent_view as $item)
                            <li class="product-item">
                                <div class="product product-widget-style">
                                    <div class="thumbnnail">
                                        <a href="{{route('article_client.show', $item -> id)}}"
                                            title="{{$item -> name}}">
                                            <figure><img src="{{$item -> thumbnail}}" alt=""></figure>
                                        </a>
                                    </div>
                                    <div class="product-info">
                                        <a href="{{route('article_client.show', $item -> id)}}"
                                            class="product-name"><span>{{$item -> title}}</span></a>
                                    </div>
                                </div>
                            </li>
                            @endforeach
                        </ul>
                    </div>
                </div><!-- recent view widget-->
                <br>
                @endIf
                <div class="widget mercado-widget widget-product">
                    <h2 class="widget-title">Sản phẩm bán chạy nhất</h2>
                    <div class="widget-content">
                        <ul class="products">
                            @foreach($mobiles_popular as $item)
                            @php
                            $arrayThumbnail = [];
                            $price_popular = number_format($item -> price, 0, '', ',');
                            $defaultThumbnail =
                            'https://res.cloudinary.com/quynv300192/image/upload/v1634800182/ixdpahcfqqmee12obutt.png';
                            if ($item -> thumbnail != null && strlen($item -> thumbnail) > 0) {
                            $item -> thumbnail = substr($item -> thumbnail, 0, -1);
                            $arrayThumbnail = explode(',', $item -> thumbnail);
                            if (sizeof($arrayThumbnail) > 0) {
                            $thumbnail = $arrayThumbnail[0];
                            }else{
                            $thumbnail = $defaultThumbnail;
                            }
                            }
                            @endphp
                            <li class="product-item">
                                <div class="product product-widget-style">
                                    <div class="thumbnnail">
                                        <a href="{{route('mobile_client.show', $item -> id)}}"
                                            title="{{$item -> name}}">
                                            <figure><img src="{{$thumbnail}}" alt=""></figure>
                                        </a>
                                    </div>
                                    <div class="product-info">
                                        <a href="{{route('mobile_client.show', $item -> id)}}"
                                            class="product-name"><span>{{$item -> name}}</span></a>
                                        <div class="wrap-price"><span class="product-price">{{$price_popular}}
                                                (VND)</span></div>
                                    </div>
                                </div>
                            </li>
                            @endforeach
                        </ul>
                    </div>
                </div>
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
            $('body').addClass('detail page');
        });
</script>
<script src="/dist/js/pages/client/mobile_detail.js"></script>
<script src="/dist/js/pages/client/home.js"></script>
@endsection
