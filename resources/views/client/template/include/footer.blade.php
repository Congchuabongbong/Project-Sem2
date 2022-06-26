@php
    if (\Illuminate\Support\Facades\Auth::check()){
    $url_acc = '/client/page/user/'.\Illuminate\Support\Facades\Auth::id();
        }else{
            $url_acc = '/client/page/login/get';
        }
@endphp
<div class="wrap-footer-content footer-style-1">
    <div class="wrap-function-info">
        <div class="container">
            <ul>
                <li class="fc-info-item">
                    <i class="fa fa-truck" aria-hidden="true"></i>
                    <div class="wrap-left-info">
                        <h4 class="fc-name">Miễn Phí Vận Chuyển</h4>
                        <p class="fc-desc">Khi Mua Sản Phẩm </p>
                    </div>

                </li>
                <li class="fc-info-item">
                    <i class="fa fa-recycle" aria-hidden="true"></i>
                    <div class="wrap-left-info">
                        <h4 class="fc-name">Bảo Hành</h4>
                        <p class="fc-desc">Hoàn Tiền Rrong 30 Ngày</p>
                    </div>

                </li>
                <li class="fc-info-item">
                    <i class="fa fa-credit-card-alt" aria-hidden="true"></i>
                    <div class="wrap-left-info">
                        <h4 class="fc-name">Thanh Toán An Toàn</h4>
                        <p class="fc-desc">An Toàn Khi Thanh Toán Trực Tuyến</p>
                    </div>

                </li>
                <li class="fc-info-item">
                    <i class="fa fa-life-ring" aria-hidden="true"></i>
                    <div class="wrap-left-info">
                        <h4 class="fc-name">Hỗ Trợ Trực Tuyến</h4>
                        <p class="fc-desc">Hỗ Trợ 24/7</p>
                    </div>
                </li>
            </ul>
        </div>
    </div>
    <!--End function info-->

    <div class="main-footer-content">

        <div class="container">

            <div class="row">

                <div class="col-lg-4 col-sm-4 col-md-4 col-xs-12">
                    <div class="wrap-footer-item">
                        <h3 class="item-header">Liên Hệ Chi Tiết</h3>
                        <div class="item-content">
                            <div class="wrap-contact-detail">
                                <ul>
                                    <li>
                                        <i class="fa fa-map-marker" aria-hidden="true"></i>
                                        <p class="contact-txt">8A Tôn Thất Thuyết, Mỹ Đình, HÀ NỘI</p>
                                    </li>
                                    <li>
                                        <i class="fa fa-phone" aria-hidden="true"></i>
                                        <p class="contact-txt">0123-465-789-111</p>
                                    </li>
                                    <li>
                                        <i class="fa fa-envelope" aria-hidden="true"></i>
                                        <p class="contact-txt">wiki.mobile.store@gmail.com</p>
                                    </li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="col-lg-4 col-sm-4 col-md-4 col-xs-12">

                    <div class="wrap-footer-item">
                        <h3 class="item-header">Đường Dây Nóng</h3>
                        <div class="item-content">
                            <div class="wrap-hotline-footer">
                                <span class="desc">Liên Hệ Miễn Phí</span>
                                <b class="phone-number">0123-465-789-111</b>
                            </div>
                        </div>
                    </div>

                    <div class="wrap-footer-item footer-item-second">
                        <h3 class="item-header">ĐĂNG KÝ ĐỂ NHẬN BẢN TIN</h3>
                        <div class="item-content">
                            <div class="wrap-newletter-footer">
                                <form action="#" class="frm-newletter" id="frm-newletter">
                                    <input type="email" class="input-email" name="email" value=""
                                        placeholder="Địa chỉ email của bạn...">
                                    <button class="btn-submit">Subscribe</button>
                                </form>
                            </div>
                        </div>
                    </div>

                </div>

                <div class="col-lg-4 col-sm-4 col-md-4 col-xs-12 box-twin-content ">
                    <div class="row">
                        <div class="wrap-footer-item twin-item">
                            <h3 class="item-header">TÀI KHOẢN CỦA TÔI</h3>
                            <div class="item-content">
                                <div class="wrap-vertical-nav">
                                    <ul>
                                        <li class="menu-item"><a href={{$url_acc}} class="link-term">Tài Khoản Của Tôi</a></li>
                                        <li class="menu-item"><a href="#" class="link-term">Phiếu Quà Tặng</a></li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                        <div class="wrap-footer-item twin-item">
                            <h3 class="item-header">Thông Tin</h3>
                            <div class="item-content">
                                <div class="wrap-vertical-nav">
                                    <ul>
                                        <li class="menu-item"><a href="/client/page/feedback" class="link-term">Liên Hệ Chúng Tôi</a></li>
                                        <li class="menu-item"><a href="/client/page/feedback" class="link-term">Bản Đồ</a></li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

            </div>

            <div class="row">

                <div class="col-lg-4 col-sm-4 col-md-4 col-xs-12">
                    <div class="wrap-footer-item">
                        <h3 class="item-header">SỬ DỤNG CÁC HÌNH THỨC THANH TOÁN AN TOÀN:</h3>
                        <div class="item-content">
                            <div class="wrap-list-item wrap-gallery">
                                <img src="/client-assets/assets/images/payment.png" style="max-width: 260px;">
                            </div>
                        </div>
                    </div>
                </div>

                <div class="col-lg-4 col-sm-4 col-md-4 col-xs-12">
                    <div class="wrap-footer-item">
                        <h3 class="item-header">MẠNG XÃ HỘI</h3>
                        <div class="item-content">
                            <div class="wrap-list-item social-network">
                                <ul>
                                    <li><a href="#" class="link-to-item" title="twitter"><i class="fa fa-twitter"
                                                aria-hidden="true"></i></a></li>
                                    <li><a href="#" class="link-to-item" title="facebook"><i class="fa fa-facebook"
                                                aria-hidden="true"></i></a></li>
                                    <li><a href="#" class="link-to-item" title="pinterest"><i class="fa fa-pinterest"
                                                aria-hidden="true"></i></a></li>
                                    <li><a href="#" class="link-to-item" title="instagram"><i class="fa fa-instagram"
                                                aria-hidden="true"></i></a></li>
                                    <li><a href="#" class="link-to-item" title="vimeo"><i class="fa fa-vimeo"
                                                aria-hidden="true"></i></a></li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="col-lg-4 col-sm-4 col-md-4 col-xs-12">
                    <div class="wrap-footer-item">
                        <h3 class="item-header">Tải Ứng Dụng</h3>
                        <div class="item-content">
                            <div class="wrap-list-item apps-list">
                                <ul>
                                    <li><a href="#" class="link-to-item" title="our application on apple store">
                                            <figure><img src="/client-assets/assets/images/brands/apple-store.png"
                                                    alt="apple store" width="128" height="36"></figure>
                                        </a></li>
                                    <li><a href="#" class="link-to-item" title="our application on google play store">
                                            <figure><img src="/client-assets/assets/images/brands/google-play-store.png"
                                                    alt="google play store" width="128" height="36"></figure>
                                        </a></li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>

            </div>
        </div>
    </div>

    <div class="coppy-right-box">
        <div class="container">

            <div class="coppy-right-item item-right">
                <div class="wrap-nav horizontal-nav">
                    <ul>
                        <li class="menu-item"><a href="/client/page/about" class="link-term">Về Chúng Tôi</a></li>
                        <li class="menu-item"><a href="/client/page/privacy" class="link-term">Chính Sách Bảo Mật</a>
                        </li>
                        <li class="menu-item"><a href="/client/page/terms-conditions" class="link-term">Điều Khoản Và Điều Kiện</a></li>
                        <li class="menu-item"><a href="/client/page/return-policy" class="link-term">Chính Sách Hoàn Trả</a></li>
                    </ul>
                </div>
            </div>
            <div class="clearfix"></div>
        </div>
    </div>
</div>
