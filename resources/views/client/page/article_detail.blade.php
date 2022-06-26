@extends('client.template.form')
@section('title_page')
    {{$article -> title}}
@endsection
@section('private_link')      
@endsection
@section('main_content_page')
    <main id="main" class="main-site">

        <div class="container">

            <div class="wrap-breadcrumb">
                <ul>
                    <li class="item-link"><a href="/" class="link">Trang Chủ</a></li>
                    <li class="item-link"><a href="/client/page/article">Bài Viết</a></li>
                    <li class="item-link"><span>Bài Viết Chi Tiết</span></li>
                </ul>
            </div>
            <div class="row">

                <div class="col-lg-9 col-md-8 col-sm-8 col-xs-12 main-content-area">
                    <h1 style="font-weight: bold">{{$article->title}}</h1>
                    @php
                        $date_format = date("d/m/Y", strtotime($article->created_at));
                    @endphp
                    <p style="font-size: medium"><i class="far fa-user-circle"></i> {{$article->author}}
                        - {{$date_format}}</p>
                    <hr>
                    <h4 style="font-weight: bold">{{$article->description}}</h4>
                    <div class ="main-content">
                        {!!$article->detail  !!}
                    </div>
                    <a class="btn btn-primary" href="/client/page/article" role="button">Quay trở lại trang tin tức</a>
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
                    <br><br>


                </div>
                <!--end sitebar-->

                <div class="single-advance-box col-lg-12 col-md-12 col-sm-12 col-xs-12">
                    <div class="wrap-show-advance-info-box style-1 box-in-site">
                        <h3 class="title-box">Bài Viết Liên Quan</h3>
                        <div class="wrap-products">
                            <div class="products slide-carousel owl-carousel style-nav-1 equal-container" data-items="5"
                                 data-loop="false" data-nav="true" data-dots="false"
                                 data-responsive='{"0":{"items":"1"},"480":{"items":"2"},"768":{"items":"3"},"992":{"items":"3"},"1200":{"items":"5"}}'>
                                @foreach ($articles_related as $item)
                                    <div class="product product-style-2 equal-elem ">
                                        <div class="product-thumnail">
                                            <a href="{{route('article_client.show', $item -> id)}}"
                                               title="{{$item -> title}}">
                                                <figure><img src="{{$item -> thumbnail}}" width="214" height="214"
                                                             alt="{{$item -> name}}"></figure>
                                            </a>
                                            <div class="group-flash">
                                                <span class="flash-item new-label">Related</span>
                                            </div>
                                            <div class="wrap-btn">
                                                <a href="{{route('article_client.show', $item -> id)}}"
                                                   class="function-link">quick view</a>
                                            </div>
                                        </div>
                                        <div class="product-info">
                                            <a href="#" class="product-name"><span>{{$item -> title}}</span></a>
                                        </div>
                                    </div>


                                @endforeach
                            </div>
                        </div>
                        <!--End wrap-products-->

                    </div>
                </div>


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

