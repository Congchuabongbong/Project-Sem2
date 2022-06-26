@extends('client.template.form')
@section('title_page')
    {{$mobile -> name}}
@endsection
@section('private_link')
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/rateYo/2.3.2/jquery.rateyo.min.css">
@endsection
@section('main_content_page')
    @php
     $check_login = \Illuminate\Support\Facades\Auth::check()
    @endphp
    <main id="main" class="main-site">
        <div class="container">

            <div class="wrap-breadcrumb">
                <ul>
                    <li class="item-link"><a href="/" class="link">Trang Chủ</a></li>
                    <li class="item-link"><a href="/client/page/shop/mobile" class="link">Điện Thoại</a></li>
                    <li class="item-link"><span>Thông Tin Chi Tiết</span></li>
                </ul>
            </div>
            <div class="row">

                <div class="col-lg-9 col-md-8 col-sm-8 col-xs-12 main-content-area">
                    <div class="wrap-product-detail">
                        <div class="detail-media">
                            <div class="product-gallery">
                                <ul class="slides">
                                    @foreach($mobile -> arrayThumbnail as $thumbnail)
                                        <li data-thumb="{{$thumbnail}}">
                                            <img src="{{$thumbnail}}" alt="product thumbnail" />
                                        </li>
                                    @endforeach
                                </ul>
                            </div>
                        </div>
                        <div class="detail-info">                           
                            <div class="product-rating">
                                <i class="fa fa-star" aria-hidden="true"></i>
                                <i class="fa fa-star" aria-hidden="true"></i>
                                <i class="fa fa-star" aria-hidden="true"></i>
                                <i class="fa fa-star" aria-hidden="true"></i>
                                <i class="fa fa-star" aria-hidden="true"></i>
                                <a href="#" class="count-review">(05 review)</a>
                            </div>                            
                            <h2 class="product-name">{{$mobile -> name}}</h2>
                            <div class="short-desc">
                                <ul>
                                    <li>Kích thước màn hình: {{$mobile -> screenSize}} inch</li>
                                    <li>Pin: {{$mobile -> pin}} mah</li>
                                    <li>Camera: {{$mobile -> camera}} MP</li>
                                    <li>Màu: {{$mobile -> color}}</li>
                                    <li>Bộ nhớ: {{$mobile -> memory}} Gb</li>
                                    <li>Ram: {{$mobile -> ram}} Gb</li>
                                </ul>
                            </div>
                            <?php
                            $price = number_format($mobile -> price, 0, '', ',');
                            $price_current = number_format($mobile -> price - ($mobile -> price * $mobile -> saleOff), 0, '', ',');
                            ?>
                            @if ($mobile-> saleOff > 0)
                                <div class="wrap-price"><span class="product-price discount">Giảm ({{$mobile-> saleOff *
                                100}}%)</span> </div>
                                <div class="wrap-price"><strike class="product-price" style="font-size: 15px">{{$price}}
                                        (VND)</strike></div>
                                <div class="wrap-price"><span class="product-price">{{$price_current}} (VND)</span></div>
                            @else
                                <div class="wrap-price"><span class="product-price" style="font-size: 15px">{{$price}}
                                (VND)</span></div>
                            @endif
                            <div class="stock-info in-stock">
                                <p class="availability">Status:
                                    <b>{{$mobile->strStatus}}</b>
                                </p>
                            </div>
                            <div class="wrap-butons">
                                <form id="formCart">
                                    @csrf
                                    <input type="hidden" value="{{$mobile -> id}}" name="id" />
                                    <input type="hidden"
                                           value="{{$mobile -> price - ($mobile -> price * $mobile -> saleOff)}}"
                                           name="price" />
                                    <input type="hidden" value="{{$mobile -> name}}" name="name">
                                    <input type="hidden" value="{{$mobile -> mainThumbnail}}" name="image">
                                    <input type="hidden" value="{{$mobile -> saleOff}}" name="saleOff">
                                    <input type="hidden" value="{{$mobile -> quantity}}" name="current_quantity">
                                    <input type="hidden" value="1" name="quantity">
                                    <a href="#" class="btn add-to-cart" id="btnAddToCart">Thêm Vào Giỏ Hàng</a>
                                </form>
                            </div>
                        </div>
                        <div class="advance-info">
                            <div class="tab-control normal">
                                <a href="#description" class="tab-control-item active">Thông Tin Chi Tiết</a>
                                <a href="#add_infomation" class="tab-control-item">Thông Tin Kĩ Thuật</a>
                                <a style="{{$check_login ? ' ' : 'display:none'}}" href="#review" class="tab-control-item">Đánh Giá</a>
                            </div>
                            <div class="tab-contents">
                                <div class="tab-content-item active" id="description">
                                    {!! $mobile -> detail !!}
                                </div>
                                <div class="tab-content-item " id="add_infomation">
                                    <table class="shop_attributes">
                                        <tbody>
                                        <tr>
                                            <th>Ram</th>
                                            <td class="product_weight">{{$mobile -> ram}} Gb</td>
                                        </tr>
                                        <tr>
                                            <th>Màn Hình</th>
                                            <td class="product_weight">{{$mobile -> screenSize}} Inch</td>
                                        </tr>
                                        <tr>
                                            <th>Bộ Nhớ</th>
                                            <td class="product_dimensions">{{$mobile -> memory}} Gb</td>
                                        </tr>
                                        <tr>
                                            <th>Pin</th>
                                            <td>{{$mobile -> pin}} mAh</td>
                                        </tr>
                                        <tr>
                                            <th>Camera</th>
                                            <td>{{$mobile -> camera}} MP</td>
                                        </tr>
                                        <tr>
                                            <th>Màu</th>
                                            <td>{{$mobile -> color}}</td>
                                        </tr>
                                        </tbody>
                                    </table>
                                </div>
                                <div class="tab-content-item " id="review">
                                    {{--facebook comment here--}}                                   
                                    <div class="fb-comments"
                                         data-href="http://wiki-mobile.com/client/page/shop/mobile/{{$mobile -> id}}"
                                         data-order-by="reverse_time" data-width="780" data-numposts="10">
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <!--end main products area-->

                <div class="col-lg-3 col-md-4 col-sm-4 col-xs-12 sitebar">
                    <div class="widget widget-our-services ">
                        <div class="widget-content">
                            <ul class="our-services">

                                <li class="service">
                                    <a class="link-to-service" href="#">
                                        <i class="fa fa-truck" aria-hidden="true"></i>
                                        <div class="right-content">
                                            <b class="title">Miễn Phí Vận Chuyển</b>
                                            <span class="subtitle">Khi Mua Sản Phẩm Khi Mua Trực Tuyến</span>
                                        </div>
                                    </a>
                                </li>

                                <li class="service">
                                    <a class="link-to-service" href="#">
                                        <i class="fa fa-gift" aria-hidden="true"></i>
                                        <div class="right-content">
                                            <b class="title">Ưu Đãi Đặc Biệt</b>
                                            <span class="subtitle">Nhận Nhiều Ưu Đãi</span>
                                        </div>
                                    </a>
                                </li>

                                <li class="service">
                                    <a class="link-to-service" href="#">
                                        <i class="fa fa-reply" aria-hidden="true"></i>
                                        <div class="right-content">
                                            <b class="title">Hoàn Trả Đơn Hàng</b>
                                            <span class="subtitle">Hoàn Trả Trong 7 Ngày</span>
                                        </div>
                                    </a>
                                </li>
                            </ul>
                        </div>
                    </div><!-- Categories widget-->

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
                    </div><br><br>
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
                        </div><br><!-- recent view widget-->
                    @endIf
                    @if(count($articles_related) > 0)
                        <div class="widget mercado-widget widget-product">
                            <h2 class="widget-title">Bài viết liên quan</h2>
                            <div class="widget-content">
                                <ul class="products">
                                    @foreach ($articles_related as $item)
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
                    @endIf
                    <br>
                </div>
                <!--end sitebar-->

                <div class="single-advance-box col-lg-12 col-md-12 col-sm-12 col-xs-12">
                    <div class="wrap-show-advance-info-box style-1 box-in-site">
                        <h3 class="title-box">Sản Phẩm Liên Quan</h3>
                        <div class="wrap-products">
                            <div class="products slide-carousel owl-carousel style-nav-1 equal-container" data-items="5"
                                 data-loop="false" data-nav="true" data-dots="false"
                                 data-responsive='{"0":{"items":"1"},"480":{"items":"2"},"768":{"items":"3"},"992":{"items":"3"},"1200":{"items":"5"}}'>
                                @foreach ($mobiles_related as $item)
                                    @php
                                        $price = number_format($item -> price, 0, '', ','); // 1,000,000
                                    @endphp
                                    <div class="product product-style-2 equal-elem ">
                                        <div class="product-thumnail">
                                            <a href="{{route('mobile_client.show', $item -> id)}}" title="{{$item -> name}}">
                                                <figure><img src="{{$item -> mainThumbnail}}" width="214" height="214"
                                                             alt="{{$item -> name}}"></figure>
                                            </a>

                                            <div class="group-flash">
                                                <span class="flash-item new-label">Related</span>
                                            </div>
                                            <div class="wrap-btn">
                                                <a href="{{route('mobile_client.show', $item -> id)}}"
                                                   class="function-link">quick view</a>
                                            </div>
                                        </div>
                                        <div class="product-info">
                                            <a href="#" class="product-name"><span>{{$item -> name}}</span></a>
                                            <div class="wrap-price"><span class="product-price">{{$price}} (VND)</span></div>
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
    <script src="/dist/js/pages/client/mobile_detail.js"></script>
    <script src="/dist/js/pages/client/home.js"></script>
@endsection
