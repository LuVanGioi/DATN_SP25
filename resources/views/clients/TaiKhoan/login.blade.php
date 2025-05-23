@extends("clients.themes")


@section("title")
<title>Đăng Nhập - WD-14</title>
@endsection

@section('main')
@php
if (Auth::check()) {
die('<script>
    location.href = "/"
</script>');
}
@endphp
<section class="page-section mt-3">
    <div class="container">
        <div class="row">
            <div class="col-sm-6">
                <h3 class="block-title"><span>Đăng Nhập</span></h3>
                <form class="form-login" submit-ajax="true" action="{{route('login')}}" method="POST" time_load="0" swal_success="none" type="POST">
                    <input type="hidden" name="_token" value="{{ csrf_token() }}">
                    <input type="hidden" name="action" id="actionField" value="">
                    <div class="row">
                        <div class="col-md-12 hello-text-wrap">
                            <span class="hello-text text-thin" style="font-size: 16px">Xin chào, chào mừng bạn đến với tài khoản của bạn</span>
                        </div>

                        <div class="col-md-12">
                            <div class="form-group">
                                <input class="form-control" type="email" name="email"
                                    placeholder="Nhập email" value="{{old('email')}}" autocomplete="email">

                                @error('email')
                                <p class="text-danger">{{ $message}}</p>
                                @enderror
                            </div>
                        </div>
                        <div class="col-md-12">
                            <div class="form-group"><input class="form-control" type="password" name="password"
                                    placeholder="Mật khẩu của bạn"></div>
                        </div>

                        <div class="col-md-12 col-lg-12 text-right-lg">
                            <a class="forgot-password" href="{{ route("forgot-password") }}">Quên mật khẩu?</a>
                        </div>
                        <div class="col-md-6">
                            <button type="submit" class="btn btn-theme btn-block btn-theme-dark" data-action="login">Đăng Nhập</button>
                        </div>
                        <div class="col-md-6">
                            <a class="btn btn-block btn-theme btn-theme-dark btn-create" href="{{route('register')}}">Tạo Tài
                                Khoản</a>
                        </div>
                    </div>
                </form>
            </div>
            <div class="col-sm-6">
                <h3 class="block-title"><span>Tạo Tài Khoản Mới</span></h3>
                <form action="#" class="create-account">
                    <div class="row">

                        <div class="col-md-12">
                            <h3 class="block-title">Đăng nhập hôm nay và bạn sẽ có thể</h3>
                            <ul class="list-check">
                                <li>Trạng thái đơn hàng trực tuyến</li>
                                <li>Xem các ưu đãi nóng</li>
                                <li>Danh sách yêu thích</li>
                                <li>Đăng ký nhận tin tức độc quyền và bán hàng riêng</li>
                                <li>Mua hàng nhanh chóng</li>
                            </ul>
                        </div>

                    </div>
                </form>
            </div>
        </div>
    </div>
</section>

<section class="page-section">
    <div class="container">
        <div class="row blocks shop-info-banners">
            <div class="col-md-4">
                <div class="block">
                    <div class="media">
                        <div class="pull-right"><i class="fa fa-credit-card"></i></div>
                        <div class="media-body">
                            <h4 class="media-heading">Thanh toán</h4>
                            Thanh toán qua các cổng online và COD 1 cách nhanh chóng.
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md-4">
                <div class="block">
                    <div class="media">
                        <div class="pull-right"><i class="fa fa-headset"></i></div>
                        <div class="media-body">
                            <h4 class="media-heading">Hỗ trợ</h4>
                            Đội ngũ hỗ trợ 24/7. Sẵn sàng giúp bạn tư vấn và giải đáp thắc mắc.
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md-4">
                <div class="block">
                    <div class="media">
                        <div class="pull-right"><i class="fa fa-rotate-left"></i></div>
                        <div class="media-body">
                            <h4 class="media-heading">Hoàn trả</h4>
                            Có hỗ trợ đổi trả hàng, bạn nhận lại 100% giá trị đơn hàng.
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
@endsection