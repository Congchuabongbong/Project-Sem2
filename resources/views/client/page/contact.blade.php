@extends('client.template.form')
@section('title_page','Liên Hệ Với Chúng Tôi')
@section('private_link')
    <meta name="csrf-token" content="{{ csrf_token() }}">
@endsection
@section('main_content_page')
    @php
        if (\Illuminate\Support\Facades\Auth::check()){
        $user = \Illuminate\Support\Facades\Auth::user();
        $fullname = $user->fullName;
        $email = $user->email;
        $phone = $user->phone;
            }else{
      $fullname = '';
        $email = '';
        $phone = '';
            }
    @endphp
    <main id="main" class="main-site left-sidebar">
        <div class="container">
            <div class="wrap-breadcrumb">
                <ul>
                    <li class="item-link"><a href="/" class="link">Trang Chủ</a></li>
                    <li class="item-link"><span>Liên Hệ Chúng Tôi</span></li>
                </ul>
            </div>
            <div class="row">
                <div class=" main-content-area">
                    <div class="wrap-contacts ">
                        <div class="col-lg-6 col-sm-6 col-md-6 col-xs-12">
                            <div class="contact-box contact-form">
                                <h2 class="box-title">Để Lại Phản Hồi</h2>
                                <form id="frmFeedBack" action="#" method="get" name="frm-contact">
                                    @csrf
                                    <label for="name">Họ Và Tên:</label>
                                    <input type="text" value="{{$fullname}}" id="name" name="name">
                                    <span class="error name_error"></span></br>
                                    </br>
                                    <label for="email">Email:</label><br>
                                    <input type="text" value="{{$email}}" id="email" name="email">
                                    <span class="error email_error"></span></br>
                                    </br>
                                    <label for="email">Số Điện Thoại:</label><br>
                                    <input type="text" value="{{$phone}}" id="phone" name="phone">
                                    <span class="error phone_error"></span></br>
                                    </br>
                                    <label for="comment">Nhận Xét</label>
                                    <textarea name="comment" id="comment"></textarea>
                                    <span class="error comment_error"></span></br>

                                    <input type="submit" name="send-feedback" value="Submit">
                                </form>
                            </div>
                        </div>
                        <div class="col-lg-6 col-sm-6 col-md-6 col-xs-12">
                            <div class="contact-box contact-info">
                                <div class="wrap-map">
                                    <div class="mercado-google-maps" id="az-google-maps57341d9e51968" data-hue=""
                                         data-lightness="1" data-map-style="2" data-saturation="-100"
                                         data-modify-coloring="false" data-title_maps="Kute themes"
                                         data-phone="088-465 9965 02" data-email="wiki.mobile.store@gmail.com"
                                         data-address="8A Tôn Thất Thuyết, Hà Nội" data-longitude="105.78226183128689"
                                         data-latitude="21.028547210187156" data-pin-icon="" data-zoom="16"
                                         data-map-type="ROADMAP"
                                         data-map-height="263">
                                    </div>
                                </div>
                                <h2 class="box-title">Thông Tin Liên Hệ</h2>
                                <div class="wrap-icon-box">

                                    <div class="icon-box-item">
                                        <i class="fa fa-envelope" aria-hidden="true"></i>
                                        <div class="right-info">
                                            <b>Email</b>
                                            <p>wiki.mobile.store@gmail.com</p>
                                        </div>
                                    </div>

                                    <div class="icon-box-item">
                                        <i class="fa fa-phone" aria-hidden="true"></i>
                                        <div class="right-info">
                                            <b>Đường Dây Nóng</b>
                                            <p>0123-465-789-111</p>
                                        </div>
                                    </div>

                                    <div class="icon-box-item">
                                        <i class="fa fa-map-marker" aria-hidden="true"></i>
                                        <div class="right-info">
                                            <b>Địa Chỉ Công Ty</b>
                                            <p>8A Tôn Thất Thuyết, Mỹ Đình, HÀ NỘI<br/></p>
                                        </div>
                                    </div>

                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <!--end main products area-->
            </div>
            <!--end row-->
        </div>
        <!--end container-->
    </main>
@endsection


@section('private_scripts')
    <script src="https://cdn.jsdelivr.net/jquery.validation/1.16.0/jquery.validate.min.js"></script>
    <script src="/dist/js/pages/client/contact.js"></script>
    <script src="/dist/js/pages/client/home.js"></script>
@endsection
