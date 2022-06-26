@extends('client.template.form')
@section('title_page','Giỏ Hàng')
@section('private_link')
@endsection
@section('main_content_page')
<main id="main" class="main-site">
    <div class="container">
        <div class="wrap-breadcrumb">
            <ul>
                <li class="item-link"><a href="/" class="link">Trang Chủ</a></li>
                <li class="item-link"><span>Giỏ Hàng</span></li>
            </ul>
        </div>
        <div class=" main-content-area">
            @include('client.page.fetch_data.list_cart')
            <div class="wrap-show-advance-info-box style-1 box-in-site">
                <h3 class="title-box">Sản Phẩm Bán Chạy</h3>
                <div class="wrap-products">
                    <div class="products slide-carousel owl-carousel style-nav-1 equal-container" data-items="5"
                        data-loop="false" data-nav="true" data-dots="false"
                        data-responsive='{"0":{"items":"1"},"480":{"items":"2"},"768":{"items":"3"},"992":{"items":"3"},"1200":{"items":"5"}}'>
                        @foreach ($mobiles_popular as $item)
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
                        <div class="product product-style-2 equal-elem ">
                            <div class="product-thumnail">
                                <a href="{{route('mobile_client.show', $item -> id)}}" title="alt="{{$item -> name}}">
                                    <figure><img src="{{$thumbnail}}" width="214" height="214"
                                            alt="{{$item -> name}}">
                                    </figure>
                                </a>
                                <div class="group-flash">
                                    <span class="flash-item sale-label discount">Top Sale</span>
                                </div>

                                <div class="wrap-btn">
                                    <a href="{{route('mobile_client.show', $item -> id)}}" class="function-link">quick view</a>
                                </div>
                            </div>
                            <div class="product-info">
                                <a href="#" class="product-name"><span>{{$item -> name}}</span></a>
                                @php
                                $before_sale_price = number_format($item -> price, 0, '', ',');
                                $after_sale_price = number_format($item -> price * (1- $item->saleOff), 0,
                                '', ',');
                                @endphp
                                <div class="wrap-price">
                                    @if($item->status == 2)
                                    <ins>
                                        <p class="product-price">{{$after_sale_price}} (VND)</p>
                                    </ins></br>
                                    <del>
                                        <p class="product-price">{{$before_sale_price}} (VND)</p>
                                    </del>
                                    @else
                                    <ins>
                                        <p class="product-price">{{$before_sale_price}} (VND)</p>
                                    </ins>
                                    @endif
                                </div>
                            </div>
                        </div>
                        @endforeach
                    </div>
                </div>
                <!--End wrap-products-->
            </div>

        </div>
        <!--end main content area-->
    </div>
    <!--end container-->

</main>
@endsection
@section('private_scripts')
<script>
   
</script>
<script src="/dist/js/pages/client/cart.js"></script>
<script src="/dist/js/pages/client/home.js"></script>
@endsection
