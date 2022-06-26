@extends('client.template.form')
@section('title_page','Thank You')
@section('private_link')
<style>
    
</style>
@endsection
@section('main_content_page')
<main id="main" class="main-site">

    <div class="container">

        <div class="wrap-breadcrumb">
            <ul>
                <li class="item-link"><a href="#" class="link">Trang Chủ</a></li>
                <li class="item-link"><span>Hoá ĐƠn</span></li>
            </ul>
        </div>
    </div>

    <div class="container pb-60">
        <div class="row">
            <div class="col-md-12 text-center">
                @if(isset($invoice))
                {!!$invoice!!}
                @endif
                <h2>Thank you</h2>
                <p>Một email xác nhận đã được gửi.</p>
                <a href="{{route('mobile_client.index')}}" class="btn btn-submit btn-submitx">Quay Lại Cửa Hàng</a>
            </div>
        </div>
    </div>
    <!--end container-->

</main>
@endsection
@section('private_scripts')
</script>
<script src="/dist/js/pages/client/confirm_email.js"></script>
<script src="/dist/js/pages/client/home.js"></script>
@endsection