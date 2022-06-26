@extends('client.template.form')
@section('title_page','Trang Chủ')
@section('private_link')
<meta name="csrf-token" content="{{ csrf_token() }}" />
@endsection
@section('main_content_page')
<main id="main">

    <div class="container">
        <!--MAIN SLIDE-->
        <div class="wrap-main-slide">
            <div class="slide-carousel owl-carousel style-nav-1" data-items="1" data-loop="1" data-nav="true"
                data-dots="false">
                <div class="item-slide">
                    <img src="https://res.cloudinary.com/binht2012e/image/upload/c_fill,h_439,w_1170/v1639304234/CC_20S21_20Website_20Banner-02_0_hztmmp.jpg"
                        alt="" class="img-slide">
                </div>
                <div class="item-slide">
                    <img src="https://res.cloudinary.com/tanvnth2012002/image/upload/v1639062406/637738655803121919_F-H1_800x300_yrhuye.jpg"
                        alt="" class="img-slide">
                </div>
                <div class="item-slide">
                    <img src="https://res.cloudinary.com/tanvnth2012002/image/upload/c_scale,h_600,w_1600/v1639063017/BANNER1-copy_yyjkj0.jpg"
                        alt="" class="img-slide">
                </div>
            </div>
        </div>
        <!--BANNER-->
        <div class="wrap-banner style-twin-default">
            <div class="banner-item">
                <a href="#" class="link-banner banner-effect-1">
                    <figure><img
                            src="https://res.cloudinary.com/tanvnth2012002/image/upload/v1639063927/637739032723404994_F-H1_800x300_qlvmmc.jpg"
                            alt="" width="580" height="190">
                    </figure>
                </a>
            </div>
            <div class="banner-item">
                <a href="#" class="link-banner banner-effect-1">
                    <figure><img
                            src="https://res.cloudinary.com/tanvnth2012002/image/upload/v1639063851/637738892957586711_F_H1_800x300_uwn3x9.jpg"
                            alt="" width="580" height="190">
                    </figure>
                </a>
            </div>
        </div>
        <!--Category-->
        <div class="wrap-show-advance-info-box style-1">
            <h3 class="title-box"><i class="fas fa-mobile"></i> Sản Phẩm Theo Nhãn Hiệu</h3>
            <div class="wrap-products">
                <div class="wrap-product-tab tab-style-1">
                    <div class="tab-control">
                        <a href="#fashion_1a" class="tab-control-item active">Samsung</a>
                        <a href="#fashion_1b" class="tab-control-item">Apple</a>
                        <a href="#fashion_1c" class="tab-control-item">Xiaomi</a>
                        <a href="#fashion_1d" class="tab-control-item">Nokia</a>
                        <a href="#fashion_1e" class="tab-control-item">Realme</a>
                        <a href="#fashion_1f" class="tab-control-item">Vivo</a>
                        <a href="#fashion_1g" class="tab-control-item">OPPO</a>
                        <a href="#fashion_1h" class="tab-control-item">Asus</a>
                    </div>
                    <div class="tab-contents">
                        {{-- samsung --}}
                        <div class="tab-content-item active" id="fashion_1a">
                            <div class="wrap-products slide-carousel owl-carousel style-nav-1 equal-container"
                                data-items="5" data-loop="false" data-nav="true" data-dots="false"
                                data-responsive='{"0":{"items":"1"},"480":{"items":"2"},"768":{"items":"3"},"992":{"items":"4"},"1200":{"items":"5"}}'>
                                @foreach ($mobiles_ss as $mobile)
                                <div class="product product-style-2 equal-elem ">
                                    <div class="product-thumnail">
                                        <a href="{{route('mobile_client.show', $mobile -> id)}}"
                                            title="{{$mobile-> name}}">
                                            <figure><img src="{{$mobile-> mainThumbnail}}" width="800" height="800"
                                                    alt="{{$mobile-> name}}"></figure>
                                        </a>
                                        <div class="group-flash">
                                            <span class="flash-item new-label new">new</span>
                                            @if($mobile->status == 2)
                                            <span class="flash-item sale-label discount">sale</span>
                                            @endif
                                        </div>
                                        <div class="wrap-btn">
                                            <a href="{{route('mobile_client.show', $mobile -> id)}}"
                                                class="function-link">quick view</a>
                                        </div>
                                    </div>
                                    <div class="product-info">
                                        <a href="#" class="product-name"><span>{{$mobile -> name}}</span></a>
                                        @php
                                        $before_sale_price = number_format($mobile -> price, 0, '', ',');
                                        $after_sale_price = number_format($mobile -> price * (1-$mobile->saleOff), 0,
                                        '', ',');
                                        @endphp
                                        <div class="wrap-price">
                                            @if($mobile->status == 2)
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
                        {{-- Apple --}}
                        <div class="tab-content-item" id="fashion_1b">
                            <div class="wrap-products slide-carousel owl-carousel style-nav-1 equal-container"
                                data-items="5" data-loop="false" data-nav="true" data-dots="false"
                                data-responsive='{"0":{"items":"1"},"480":{"items":"2"},"768":{"items":"3"},"992":{"items":"4"},"1200":{"items":"5"}}'>
                                @foreach ($mobiles_apple as $mobile)
                                <div class="product product-style-2 equal-elem ">
                                    <div class="product-thumnail">
                                        <a href="{{route('mobile_client.show', $mobile -> id)}}"
                                            title="{{$mobile-> name}}">
                                            <figure><img src="{{$mobile-> mainThumbnail}}" width="800" height="800"
                                                    alt="{{$mobile-> name}}"></figure>
                                        </a>
                                        <div class="group-flash">
                                            <span class="flash-item new-label new">new</span>
                                            @if($mobile->status == 2)
                                            <span class="flash-item sale-label discount">sale</span>
                                            @endif
                                        </div>
                                        <div class="wrap-btn">
                                            <a href="{{route('mobile_client.show', $mobile -> id)}}"
                                                class="function-link">quick view</a>
                                        </div>
                                    </div>
                                    <div class="product-info">
                                        <a href="#" class="product-name"><span>{{$mobile -> name}}</span></a>
                                        @php
                                        $before_sale_price = number_format($mobile -> price, 0, '', ',');
                                        $after_sale_price = number_format($mobile -> price * (1-$mobile->saleOff), 0,
                                        '', ',');
                                        @endphp
                                        <div class="wrap-price">
                                            @if($mobile->status == 2)
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
                        {{-- Xiaomi --}}
                        <div class="tab-content-item" id="fashion_1c">
                            <div class="wrap-products slide-carousel owl-carousel style-nav-1 equal-container"
                                data-items="5" data-loop="false" data-nav="true" data-dots="false"
                                data-responsive='{"0":{"items":"1"},"480":{"items":"2"},"768":{"items":"3"},"992":{"items":"4"},"1200":{"items":"5"}}'>
                                @foreach ($mobiles_xiaomi as $mobile)
                                <div class="product product-style-2 equal-elem ">
                                    <div class="product-thumnail">
                                        <a href="{{route('mobile_client.show', $mobile -> id)}}"
                                            title="{{$mobile-> name}}">
                                            <figure><img src="{{$mobile-> mainThumbnail}}" width="800" height="800"
                                                    alt="{{$mobile-> name}}"></figure>
                                        </a>
                                        <div class="group-flash">
                                            <span class="flash-item new-label new">new</span>
                                            @if($mobile->status == 2)
                                            <span class="flash-item sale-label discount">sale</span>
                                            @endif
                                        </div>
                                        <div class="wrap-btn">
                                            <a href="{{route('mobile_client.show', $mobile -> id)}}"
                                                class="function-link">quick view</a>
                                        </div>
                                    </div>
                                    <div class="product-info">
                                        <a href="#" class="product-name"><span>{{$mobile -> name}}</span></a>
                                        @php
                                        $before_sale_price = number_format($mobile -> price, 0, '', ',');
                                        $after_sale_price = number_format($mobile -> price * (1-$mobile->saleOff), 0,
                                        '', ',');
                                        @endphp
                                        <div class="wrap-price">
                                            @if($mobile->status == 2)
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
                        {{-- nokia --}}
                        <div class="tab-content-item" id="fashion_1d">
                            <div class="wrap-products slide-carousel owl-carousel style-nav-1 equal-container"
                                data-items="5" data-loop="false" data-nav="true" data-dots="false"
                                data-responsive='{"0":{"items":"1"},"480":{"items":"2"},"768":{"items":"3"},"992":{"items":"4"},"1200":{"items":"5"}}'>
                                @foreach ($mobiles_nokia as $mobile)
                                <div class="product product-style-2 equal-elem ">
                                    <div class="product-thumnail">
                                        <a href="{{route('mobile_client.show', $mobile -> id)}}"
                                            title="{{$mobile-> name}}">
                                            <figure><img src="{{$mobile-> mainThumbnail}}" width="800" height="800"
                                                    alt="{{$mobile-> name}}"></figure>
                                        </a>
                                        <div class="group-flash">
                                            <span class="flash-item new-label new">new</span>
                                            @if($mobile->status == 2)
                                            <span class="flash-item sale-label discount">sale</span>
                                            @endif
                                        </div>
                                        <div class="wrap-btn">
                                            <a href="{{route('mobile_client.show', $mobile -> id)}}"
                                                class="function-link">quick view</a>
                                        </div>
                                    </div>
                                    <div class="product-info">
                                        <a href="#" class="product-name"><span>{{$mobile -> name}}</span></a>
                                        @php
                                        $before_sale_price = number_format($mobile -> price, 0, '', ',');
                                        $after_sale_price = number_format($mobile -> price * (1-$mobile->saleOff), 0,
                                        '', ',');
                                        @endphp
                                        <div class="wrap-price">
                                            @if($mobile->status == 2)
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
                        {{-- Realme --}}
                        <div class="tab-content-item" id="fashion_1e">
                            <div class="wrap-products slide-carousel owl-carousel style-nav-1 equal-container"
                                data-items="5" data-loop="false" data-nav="true" data-dots="false"
                                data-responsive='{"0":{"items":"1"},"480":{"items":"2"},"768":{"items":"3"},"992":{"items":"4"},"1200":{"items":"5"}}'>
                                @foreach ($mobiles_realme as $mobile)
                                <div class="product product-style-2 equal-elem ">
                                    <div class="product-thumnail">
                                        <a href="{{route('mobile_client.show', $mobile -> id)}}"
                                            title="{{$mobile-> name}}">
                                            <figure><img src="{{$mobile-> mainThumbnail}}" width="800" height="800"
                                                    alt="{{$mobile-> name}}"></figure>
                                        </a>
                                        <div class="group-flash">
                                            <span class="flash-item new-label new">new</span>
                                            @if($mobile->status == 2)
                                            <span class="flash-item sale-label discount">sale</span>
                                            @endif
                                        </div>
                                        <div class="wrap-btn">
                                            <a href="{{route('mobile_client.show', $mobile -> id)}}"
                                                class="function-link">quick view</a>
                                        </div>
                                    </div>
                                    <div class="product-info">
                                        <a href="#" class="product-name"><span>{{$mobile -> name}}</span></a></br>
                                        @php
                                        $before_sale_price = number_format($mobile -> price, 0, '', ',');
                                        $after_sale_price = number_format($mobile -> price * (1-$mobile->saleOff), 0,
                                        '', ',');
                                        @endphp
                                        <div class="wrap-price">
                                            @if($mobile->status == 2)
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
                        {{-- Vivo --}}
                        <div class="tab-content-item" id="fashion_1f">
                            <div class="wrap-products slide-carousel owl-carousel style-nav-1 equal-container"
                                data-items="5" data-loop="false" data-nav="true" data-dots="false"
                                data-responsive='{"0":{"items":"1"},"480":{"items":"2"},"768":{"items":"3"},"992":{"items":"4"},"1200":{"items":"5"}}'>
                                @foreach ($mobiles_vivo as $mobile)
                                <div class="product product-style-2 equal-elem ">
                                    <div class="product-thumnail">
                                        <a href="{{route('mobile_client.show', $mobile -> id)}}"
                                            title="{{$mobile-> name}}">
                                            <figure><img src="{{$mobile-> mainThumbnail}}" width="800" height="800"
                                                    alt="{{$mobile-> name}}"></figure>
                                        </a>
                                        <div class="group-flash">
                                            <span class="flash-item new-label new">new</span>
                                            @if($mobile->status == 2)
                                            <span class="flash-item sale-label discount">sale</span>
                                            @endif
                                        </div>
                                        <div class="wrap-btn">
                                            <a href="{{route('mobile_client.show', $mobile -> id)}}"
                                                class="function-link">quick view</a>
                                        </div>
                                    </div>
                                    <div class="product-info">
                                        <a href="#" class="product-name"><span>{{$mobile -> name}}</span></a>
                                        @php
                                        $before_sale_price = number_format($mobile -> price, 0, '', ',');
                                        $after_sale_price = number_format($mobile -> price * (1-$mobile->saleOff), 0,
                                        '', ',');
                                        @endphp
                                        <div class="wrap-price">
                                            @if($mobile->status == 2)
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
                        {{-- OPPO --}}
                        <div class="tab-content-item" id="fashion_1g">
                            <div class="wrap-products slide-carousel owl-carousel style-nav-1 equal-container"
                                data-items="5" data-loop="false" data-nav="true" data-dots="false"
                                data-responsive='{"0":{"items":"1"},"480":{"items":"2"},"768":{"items":"3"},"992":{"items":"4"},"1200":{"items":"5"}}'>
                                @foreach ($mobiles_oppo as $mobile)
                                <div class="product product-style-2 equal-elem ">
                                    <div class="product-thumnail">
                                        <a href="{{route('mobile_client.show', $mobile -> id)}}"
                                            title="{{$mobile-> name}}">
                                            <figure><img src="{{$mobile-> mainThumbnail}}" width="800" height="800"
                                                    alt="{{$mobile-> name}}"></figure>
                                        </a>
                                        <div class="group-flash">
                                            <span class="flash-item new-label new">new</span>
                                            @if($mobile->status == 2)
                                            <span class="flash-item sale-label discount">sale</span>
                                            @endif
                                        </div>
                                        <div class="wrap-btn">
                                            <a href="{{route('mobile_client.show', $mobile -> id)}}"
                                                class="function-link">quick view</a>
                                        </div>
                                    </div>
                                    <div class="product-info">
                                        <a href="#" class="product-name"><span>{{$mobile -> name}}</span></a></br>
                                        @php
                                        $before_sale_price = number_format($mobile -> price, 0, '', ',');
                                        $after_sale_price = number_format($mobile -> price * (1-$mobile->saleOff), 0,
                                        '', ',');
                                        @endphp
                                        <div class="wrap-price">
                                            @if($mobile->status == 2)
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
                        {{-- Asus --}}
                        <div class="tab-content-item" id="fashion_1h">
                            <div class="wrap-products slide-carousel owl-carousel style-nav-1 equal-container"
                                data-items="5" data-loop="false" data-nav="true" data-dots="false"
                                data-responsive='{"0":{"items":"1"},"480":{"items":"2"},"768":{"items":"3"},"992":{"items":"4"},"1200":{"items":"5"}}'>
                                @foreach ($mobiles_asus as $mobile)
                                <div class="product product-style-2 equal-elem ">
                                    <div class="product-thumnail">
                                        <a href="{{route('mobile_client.show', $mobile -> id)}}"
                                            title="{{$mobile-> name}}">
                                            <figure><img src="{{$mobile-> mainThumbnail}}" width="800" height="800"
                                                    alt="{{$mobile-> name}}"></figure>
                                        </a>
                                        <div class="group-flash">
                                            <span class="flash-item new-label new">new</span>
                                            @if($mobile->status == 2)
                                            <span class="flash-item sale-label discount">sale</span>
                                            @endif
                                        </div>
                                        <div class="wrap-btn">
                                            <a href="{{route('mobile_client.show', $mobile -> id)}}"
                                                class="function-link">quick view</a>
                                        </div>
                                    </div>
                                    <div class="product-info">
                                        <a href="#" class="product-name"><span>{{$mobile -> name}}</span></a>
                                        @php
                                        $before_sale_price = number_format($mobile -> price, 0, '', ',');
                                        $after_sale_price = number_format($mobile -> price * (1-$mobile->saleOff), 0,
                                        '', ',');
                                        @endphp
                                        <div class="wrap-price">
                                            @if($mobile->status == 2)
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
                    </div>
                </div>
            </div>
        </div>
        <!--On Sale-->
        <div class="wrap-show-advance-info-box style-1 has-countdown">
            <h3 class="title-box"><i class="fas fa-mobile"></i> Sản Phẩm Đang Giảm Giá</h3>
            <div class="wrap-top-banner">
                <a href="#" class="link-banner banner-effect-2">
                    <figure><img
                            src="https://res.cloudinary.com/binht2012e/image/upload/c_fill,h_240,w_1170/v1639305492/OPPO-Banner_1176x364-1_awab8k.png"
                            width="1170" height="240" alt=""></figure>
                </a>
            </div>
            <div class="wrap-products slide-carousel owl-carousel style-nav-1 equal-container " data-items="5"
                data-loop="false" data-nav="true" data-dots="false"
                data-responsive='{"0":{"items":"1"},"480":{"items":"2"},"768":{"items":"3"},"992":{"items":"4"},"1200":{"items":"5"}}'>
                @foreach($mobile_on_sale as $mobile)
                <div class="product product-style-2 equal-elem ">
                    <div class="product-thumnail">
                        <a href="{{route('mobile_client.show', $mobile -> id)}}" title="{{$mobile -> name}}">
                            <figure><img src="{{$mobile -> mainThumbnail}}" width="800" height="800"
                                    alt="{{$mobile -> name}}"></figure>
                        </a>
                        <div class="group-flash">
                            <span class="flash-item sale-label discount">sale</span>
                        </div>
                        <div class="wrap-btn">
                            <a href="{{route('mobile_client.show', $mobile -> id)}}" class="function-link">quick view</a>
                        </div>
                    </div>
                    <div class="product-info">
                        @php
                        $before_sale_price = number_format($mobile -> price, 0, '', ',');
                        $after_sale_price = number_format($mobile -> price * (1-$mobile->saleOff), 0, '', ',');
                        @endphp
                        <div class="wrap-price">
                            <ins>
                                <p class="product-price">{{$after_sale_price}} (VND)</p>
                            </ins><br>
                            <del>
                                <p class="product-price">{{$before_sale_price}} (VND)</p>
                            </del>
                        </div>
                    </div>
                </div>
                @endforeach

            </div>
        </div>

        <!--Latest Products-->
        <div class="wrap-show-advance-info-box style-1">
            <h3 class="title-box"><i class="fas fa-mobile"></i> SẢN PHẨM MỚI NHẤT</h3>
            <div class="wrap-top-banner">
                <a href="#" class="link-banner banner-effect-2">
                    <figure><img
                            src="https://res.cloudinary.com/binht2012e/image/upload/c_fill,h_240,w_1170/v1639304438/557720_JXtJbaEYDN_iphone_taakoh.jpg"
                            width="1170" height="240" alt=""></figure>
                </a>
            </div>
            <div class="wrap-products">
                <div class="wrap-product-tab tab-style-1">
                    <div class="tab-contents">
                        <div class="tab-content-item active" id="digital_1a">
                            <div class="wrap-products slide-carousel owl-carousel style-nav-1 equal-container"
                                data-items="5" data-loop="false" data-nav="true" data-dots="false"
                                data-responsive='{"0":{"items":"1"},"480":{"items":"2"},"768":{"items":"3"},"992":{"items":"4"},"1200":{"items":"5"}}'>

                                @foreach($mobile_latest as $mobile)
                                <div class="product product-style-2 equal-elem ">
                                    <div class="product-thumnail">
                                        <a href="{{route('mobile_client.show', $mobile -> id)}}"
                                            title="{{$mobile -> name}}">
                                            <figure><img src="{{$mobile -> mainThumbnail}}" width="800" height="800"
                                                    alt="{{$mobile -> name}}"></figure>
                                        </a>
                                        <div class="group-flash">
                                            <span class="flash-item new-label new">HOT</span>
                                            @if($mobile->status == 2)
                                            <span class="flash-item sale-label discount">sale</span>
                                            @endif
                                        </div>
                                        <div class="wrap-btn">
                                            <a href="{{route('mobile_client.show', $mobile -> id)}}" class="function-link">quick view</a>
                                        </div>
                                    </div>
                                    <div class="product-info">
                                        <a href="#" class="product-name"><span>{{$mobile -> name}}</span></a>
                                        @php
                                        $before_sale_price = number_format($mobile -> price, 0, '', ',');
                                        $after_sale_price = number_format($mobile -> price * (1-$mobile->saleOff), 0,
                                        '', ',');
                                        @endphp
                                        <div class="wrap-price">
                                            @if($mobile->status == 2)
                                            <ins>
                                                <p class="product-price">{{$after_sale_price}} (VND)</p>
                                            </ins><br>
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
                    </div>
                </div>
            </div>
        </div>
        <!--Article-->
        <div class="wrap-show-advance-info-box style-1 has-countdown">

            <h3 class="title-box"><i class="fas fa-newspaper"></i> Tin Tức Về Sản Phẩm</h3>

            <div class="wrap-products slide-carousel owl-carousel style-nav-1 equal-container " data-items="5"
                data-loop="false" data-nav="true" data-dots="false"
                data-responsive='{"0":{"items":"1"},"480":{"items":"2"},"768":{"items":"3"},"992":{"items":"4"},"1200":{"items":"5"}}'>
                @foreach($article as $article)
                <div class="product product-style-2 equal-elem ">
                    <div class="product-thumnail">
                        <a href="{{route('article_client.show', $article -> id)}}" title="{{$article -> title}}">
                            <figure><img src="{{$article -> thumbnail}}" width="800" height="800"
                                    alt="{{$article -> title}}"></figure>
                        </a>
                        <div class="group-flash">
                            <span class="flash-item new-label new">Hot</span>
                        </div>
                        <div class="wrap-btn">
                            <a href="{{route('article_client.show', $article -> id)}}" class="function-link">quick view</a>
                        </div>
                    </div>
                    <div class="product-info">
                        <a href="#" class="product-name"><span>{{$article -> title}}</span></a>
                    </div>
                </div>
                @endforeach

            </div>
        </div>

    </div>
</main>
@endsection
@section('private_scripts')
<script>
    $(document).ready(function(){
        $("body").addClass("home-page home-01");
    } )
</script>
<script src="/dist/js/pages/client/home.js"></script>
@endsection
