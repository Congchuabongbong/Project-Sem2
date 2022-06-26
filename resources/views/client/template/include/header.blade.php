@php
use Illuminate\Support\Facades\Auth;
$checklogin =Auth::check();
if ($checklogin){
$admin_user_name = Auth::user()->fullName;
$admin_user_role = Auth::user()->strRolllle;
$admin_user_role2 = Auth::user()->role;
$admin_user_id = Auth::user()->id;
}else{
$admin_user_name = " ";
$admin_user_role = " ";
$admin_user_role2 = " ";
$admin_user_id = " ";
}
@endphp
<div class="container-fluid">
    <div class="row">
        <div class="topbar-menu-area">
            <div class="container">
                <div class="topbar-menu left-menu">
                    <ul>
                        <li class="menu-item">
                            <a title="Hotline: (+123) 456 789" href="#"><span
                                    class="icon label-before fa fa-mobile"></span>Đường Dây Nóng: 0123-465-789-111</a>
                        </li>
                    </ul>
                </div>
                <div class="topbar-menu right-menu">
                    <ul>
                        <li {{$checklogin ? 'hidden' : ' ' }} class="menu-item"><a title="Register or Login"
                                href="/client/page/login/get">Đăng Nhập</a></li>
                        <li {{$checklogin ? 'hidden' : ' ' }} class="menu-item"><a title="Register or Login"
                                href="/client/page/register/get">Đăng Kí</a>
                        </li>
                        <li {{$checklogin ? ' ' : 'hidden' }} class="menu-item lang-menu menu-item-has-children parent">
                            <a>{{$admin_user_name}} ({{$admin_user_role}})<i class="fa fa-angle-down"
                                    aria-hidden="true"></i></a>
                            <ul class="submenu lang">
                                <li {{$checklogin ? ' ' : 'hidden'}} class="menu-item"><a title="profile" href="/client/page/user/{{$admin_user_id}}" id="btn-profile">Thông Tin Cá Nhân</a></li>

                                <li style="{{$admin_user_role2 == 1 ? 'display:none' : ' ' }}" class="menu-item"><a title="history" href="/client/page/orders/{{$admin_user_id}}" id="btn-history">Lịch Sử Mua Hàng</a></li>

                                <li {{$checklogin ? ' ' : 'hidden'}} class="menu-item"><a title="logout" href="#" id="btn-logout">Đăng Xuất</a></li>
                            </ul>
                        </li>
                    </ul>
                </div>
            </div>
        </div>

        <div class="container">
            <div class="mid-section main-info-area">                
                <div class="wrap-logo-top left-section">
                    <a href="{{route('client.home')}}" class="link-to-home"><img style="height:10vh"
                            src="https://res.cloudinary.com/quynv300192/image/upload/v1638941504/Screenshot_2-removebg-preview_sg2vht.png"
                            alt="mercado"></a>
                </div>

                <div class="wrap-search center-section">
                    <div class="wrap-search-form">
                        <form action="#" id="form-search-top" name="form-search-top">

                            <input type="text" list="listSearch" name="search" value="" placeholder="Bạn cần tìm gì ?" id="search">
                            <datalist id="listSearch">
                            </datalist>
                            <button form="form-search-top" type="button" id="btn-search"><i class="fa fa-search" aria-hidden="true"></i></button>
                        </form>
                    </div>
                </div>

                <div class="wrap-icon right-section">
                    <div class="wrap-icon-section wishlist">
                        <a href="#" class="link-direction">
                            <i class="fa fa-heart" aria-hidden="true"></i>
                            <div class="left-info">
                                <span class="index">0 items</span>
                                <span class="title">Wishlist</span>
                            </div>
                        </a>
                    </div>
                    <div class="wrap-icon-section minicart">
                        <a href="{{route('cart.list')}}" class="link-direction">
                            <i class="fa fa-shopping-basket" aria-hidden="true"></i>
                            <div class="left-info">
                                <span class="index" id="total_cart">{{ Cart::getTotalQuantity()}} items</span>
                                <span class="title">Giỏ Hàng</span>
                            </div>
                        </a>
                    </div>
                    <div class="wrap-icon-section show-up-after-1024">
                        <a href="#" class="mobile-navigation">
                            <span></span>
                            <span></span>
                            <span></span>
                        </a>
                    </div>
                </div>
            </div>
        </div>

        <div class="nav-section header-sticky">
            <div class="primary-nav-section">
                <div class="container">
                    <ul class="nav primary clone-main-menu" id="mercado_main" data-menuname="Main menu">
                        <li class="menu-item home-icon">
                            <a href="/" class="link-term mercado-item-title"><i class="fa fa-home"
                                    aria-hidden="true"></i></a>
                        </li>
                        <li class="menu-item">
                            <a href="/client/page/shop/mobile" class="link-term mercado-item-title">Cửa Hàng</a>
                        </li>
                        <li class="menu-item">
                            <a href="/client/page/article" class="link-term mercado-item-title">Bài Viết</a>
                        </li>
                        <li class="menu-item">
                            <a href="{{route('client.about')}}" class="link-term mercado-item-title">Về Chúng Tôi</a>
                        </li>
                        <li class="menu-item">
                            <a href="/client/page/feedback " class="link-term mercado-item-title">Liên Hệ Chúng Tôi</a>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
</div>
