@extends('client.template.form')
@section('title_page','Thanh Toán')
@section('private_link')
<meta name="csrf-token" content="{{ csrf_token() }}" />
@endsection
@section('main_content_page')
@php
if(\Illuminate\Support\Facades\Auth::check()){
$name = \Illuminate\Support\Facades\Auth::user()->fullName;
$address = \Illuminate\Support\Facades\Auth::user()->address;
$phone = \Illuminate\Support\Facades\Auth::user()->phone;
$email = \Illuminate\Support\Facades\Auth::user()->email ;
}else{
$name = '';
$address = '';
$phone = '';
$email = '';
}
@endphp
<main id="main" class="main-site">
    <div class="container">
        <div class="wrap-breadcrumb">
            <ul>
                <li class="item-link"><a href="/" class="link">Trang Chủ</a></li>
                <li class="item-link"><span>Thanh Toán</span></li>
            </ul>
        </div>
        <div class=" main-content-area">
            <div class="wrap-address-billing">
                <h3 class="box-title">Địa Chỉ Thanh Toán</h3>
                <form action="#" method="get" name="formOrder" id="formOrder">
                    <p class="row-in-form">
                        <label for="fname">Họ Và Tên<span>*</span></label>
                        <input id="name" type="text" name="name" value="{{$name}}" placeholder="Họ và tên">
                        <span class="error name_error"></span>
                    </p>
                    <p class="row-in-form">
                        <label for="email">Địa Chỉ Email:<span>*</span></label>
                        <input id="email" type="email" name="email" value="{{$email}}" placeholder="Email">
                        <span class="error email_error"></span>
                    </p>
                    <p class="row-in-form">
                        <label for="phone">Số Điện Thoại<span>*</span></label>
                        <input id="phone" type="text" name="phone" value="{{$phone}}"
                            placeholder="Số điện thoại">
                        <span class="error phone_error"></span>
                    <p class="row-in-form">
                        <label for="add">Tỉnh:<span>*</span></label>
                        <input type="text" list="listProvinces" id="province" type="text" name="province"
                            placeholder="Tỉnh/Thành Phố" />
                        <datalist id="listProvinces">
                        </datalist>
                        <span class="error province_error"></span>
                    </p>
                    <p class="row-in-form">
                        <label for="add">Huyện:<span>*</span></label>
                        <input type="text" list="districts" id="district" type="text" name="district"
                            placeholder="Quận/Huyện" />
                        <datalist id="districts">
                        </datalist>
                        <span class="error district_error"></span>
                    </p>
                    <p class="row-in-form">
                        <label for="add">Xã:<span>*</span></label>
                        <input type="text" list="wards" id="ward" type="text" name="ward"
                            placeholder="Xã/Phường" />
                        <datalist id="wards">
                        </datalist>
                        <span class="error ward_error"></span>
                    </p>
                    <p class="row-in-form">
                        <label for="address_detail">Địa Chỉ Chi Tiết: </label>
                        <input id="address_detail" type="text" name="address_detail" value="{{$address}}"
                            placeholder="Địa chỉ chi tiết">
                    </p>
                    <p class="row-in-form">
                        <label for="comment">Ghi Chú:</label>
                        <input id="comment" type="text" name="comment" value="" placeholder="Ghi chú">
                    </p>
                    <p class="row-in-form fill-wife">
                        <label class="checkbox-field">
                            <input name="create-account" id="create-account" value="forever" type="checkbox">
                            <span>Tạo Tài Khoản?</span>
                        </label>
                        <label class="checkbox-field">
                            <input name="different-add" id="different-add" value="forever" type="checkbox">
                            <span>Gửi đến một địa chỉ khác?</span>
                        </label>
                    </p>
            </div>
            <div class="summary summary-checkout">
                <div class="summary-item payment-method">
                    <h4 class="title-box">PHƯƠNG THỨC THANH TOÁN</h4>
                    <p class="summary-info"><span class="title">Chọn phương thức thanh toán của quý khách</span></p>
                    <p class="summary-info"><span class="title">COD / Paypal</span></p>
                    <div class="choose-payment-methods">
                        <label class="payment-method">
                            <input name="payment-method" id="payment-method-paypal" value="paypal" type="radio">
                            <span>Paypal</span>
                            <span class="payment-desc">quý khách có thể thanh toán bằng tài khoản paypal của
                                mình!</span>
                        </label>
                        <label class="payment-method">
                            <input name="payment-method" id="payment-method-paypal" value="cod" type="radio"
                                checked="checked">
                            <span>COD</span>
                            <span class="payment-desc">quý khách có thể thanh toán khi nhận hàng!</span>
                        </label>
                    </div>
                    <p class="summary-info grand-total"><span>Tổng Cộng: </span> <span id="grand-total-price"></span>
                    </p>
                    <a href="" class="btn btn-medium" id='btnCod'>Đặt Hàng Ngay Bây giờ</a>
                    <a href="" class="btn btn-medium" id="btnPlaceOrder" style="display: none"></a>
                </div>
                <div class="summary-item shipping-method">
                    <h4 class="title-box">MÃ GIẢM GIÁ</h4>
                    <p class="row-in-form">
                        <input id="coupon-code" type="text" name="coupon-code" value="" placeholder="Nhập mã giảm giá">
                    </p>
                    <a href="#" class="btn btn-small">Áp Dụng</a>
                </div>
            </div>

            <div class="wrap-show-advance-info-box style-1 box-in-site">
                <h3 class="title-box">SẢN PHẨM BÁN CHẠY</h3>
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
                                <a href="{{route('mobile_client.show', $item -> id)}}" title="alt=" {{$item -> name}}">
                                    <figure><img src="{{$thumbnail}}" width="214" height="214" alt="{{$item -> name}}">
                                    </figure>
                                </a>
                                <div class="group-flash">
                                    <span class="flash-item sale-label discount">Top Sale</span>
                                </div>

                                <div class="wrap-btn">
                                    <a href="{{route('mobile_client.show', $item -> id)}}" class="function-link">quick
                                        view</a>
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
<script src="/dist/js/pages/client/address.js"></script>
<script src="https://www.paypalobjects.com/api/checkout.js"></script>
<script src="https://cdn.jsdelivr.net/jquery.validation/1.16.0/jquery.validate.min.js"></script>
<script src="https://cdn.jsdelivr.net/jquery.validation/1.16.0/jquery.validate.min.js"></script>
<script src="/dist/js/pages/client/checkout.js"></script>
<script src="/dist/js/pages/client/home.js"></script>
@endsection
