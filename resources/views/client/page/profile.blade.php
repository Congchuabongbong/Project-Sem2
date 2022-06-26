@extends('client.template.form')
@section('title_page','Thông Tin Cá Nhân')
@section('private_link')
    <meta name="csrf-token" content="{{ csrf_token() }}"/>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
@endsection
@section('main_content_page')
    <main id="main" class="main-site" style="min-height: 50vh;align-items: center;justify-content: center">
        <div class="container bootstrap snippet">
            <div class="row">
                <div class="col-sm-10"><h1><b>{{$user->fullName}}</b></h1></div>
            </div>
            <div class="row">
                <div class="col-sm-3"><!--left col-->
                    <div id="list-preview-image">
                        <img src="{{$user->avatar}}" alt="avatar">
                        <br><br>
                    </div>
                </div><!--/col-3-->
                <div class="col-sm-9">
                    <ul class="nav nav-tabs">
                        <li class="active"><a data-toggle="tab" href="#home">Thông Tin Cá Nhân</a></li>
                        <li><a data-toggle="tab" href="#messages">Sửa Thông Tin</a></li>
                    </ul>
                    <div class="tab-content">
                        <div class="tab-pane active" id="home">
                            <hr>
                            <form class="form" action="##" method="post" id="registrationForm">
                                <div class="form-group">
                                    <div class="col-xs-6">
                                        <label for="first_name"><h4><b>Tên đầy đủ:</b> {{$user->fullName}}</h4></label>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <div class="col-xs-6">
                                        <label for="last_name"><h4><b>Email:</b> {{$user->email}}</h4></label>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <div class="col-xs-6">
                                        <label for="phone"><h4><b>Số Điện Thoại:</b> {{$user->phone}}</h4></label>
                                    </div>
                                </div>

                                <div class="form-group">
                                    <div class="col-xs-6">
                                        <label for="mobile"><h4><b>Địa Chỉ:</b> {{$user->address}}</h4></label>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <div class="col-xs-6">
                                        <label for="email"><h4><b>Mô Tả:</b> {{$user->description}}</h4></label>
                                    </div>
                                </div>
                               
                                <div class="form-group">
                                    <div class="col-xs-6">
                                        <label for="password"><h4>Trạng Thái Tài Khoản: {{$user->strStatus}}</h4></label>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <div class="col-xs-6">
                                        <label for=""><h4><a href="/client/page/orders/{{$user->id}}">Lịch Sử Mua Hàng</a></h4></label>
                                    </div>
                                </div>
                            </form>

                            <hr>

                        </div><!--/tab-pane-->
                        <div class="tab-pane" id="messages">

                            <h2></h2>

                            <hr>
                            <form class="form" id="registrationForm" name="registrationForm">
                                <div class="form-group">
                                    <div class="col-xs-6">
                                        <label for="first_name"><h4><b>Email:</b> {{$user->email}}</h4></label>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <div class="col-xs-6">
                                        <label for="first_name"><h4><b>Status:</b> {{$user->strStatus}}</h4></label>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <div class="col-xs-6">
                                        <label for="last_name"><h4><b>Tên đầy đủ:</b></h4></label>
                                        <input type="text" class="form-control" name="fullName" id="fullName"
                                               value="{{$user->fullName}}" title="enter your last name if any.">
                                    </div>
                                </div>

                                <div class="form-group">
                                    <div class="col-xs-6">
                                        <label for="last_name"><h4><b>Số điện thoại:</b></h4></label>
                                        <input type="text" class="form-control" name="phone"
                                               value="{{$user->phone}}" title="enter your last name if any.">
                                    </div>
                                </div>

                                <div class="form-group">

                                    <div class="col-xs-6">

                                        <label for="phone"><h4><b>Địa chỉ:</b></h4></label>

                                        <input type="text" class="form-control" name="address"
                                               value="{{$user->address}}" title="enter your phone number if any.">
                                    </div>
                                </div>

                                <div class="form-group">
                                    <div class="col-xs-6">

                                        <label for="mobile"><h4><b>Mô tả:</b></h4></label>
                                        <input type="text" class="form-control" name="description"
                                               value="{{$user->description}}"
                                               title="enter your mobile number if any.">
                                    </div>
                                </div>
                                <input id="avatar" type="text" value="{{$user->avatar}}" name="avatar" style="display: none">
                                <input type="text" value="{{$user->id}}" name="id" style="display: none">
                                <div class="form-group">
                                    <div class="col-xs-12">
                                        <br>
                                        <button type="button" id="btnThumbnailLink" class="btn btn-xs btn-danger mt-1 mb-3"
                                                value="">Thay Đổi Avatar</button>
                                        <br><br>
                                        <button class="btn btn-lg btn-danger" type="submit" id="btnSaveEdit"><i
                                                class="glyphicon glyphicon-ok-sign" ></i> Lưu Thay Đổi
                                        </button>
                                        <button class="btn btn-lg btn-danger" type="reset"><i
                                                class="glyphicon glyphicon-repeat"></i> Reset
                                        </button>
                                    </div>
                                </div>
                            </form>

                        </div><!--/tab-pane-->
                    </div><!--/tab-pane-->
                </div><!--/tab-content-->

            </div><!--/col-9-->
        </div><!--/row-->

    </main>

@endsection


@section('private_scripts')
    <script>
        $(document).ready(function () {
            $('body').addClass('inner-page about-us');
        });
    </script>
    <script src="https://upload-widget.cloudinary.com/global/all.js" type="text/javascript"></script>
    <script src="/dist/js/pages/client/profile.js"></script>
    <script src="/dist/js/pages/client/home.js"></script>
@endsection
