@extends("clients.themes")

@section("title")
<title>Đăng Ký - WD-14</title>
@endsection

@section('main')
@php
if (Auth::check()) {
die('<script>
    location.href = "/"
</script>');
}
@endphp
<section class="page-section color">
    <div class="container">
        <div class="row">
            <div class="col-sm-6">
                <h2 class="block-title"><span>Đăng Ký</span></h2>
                <form class="form-login" submit-ajax="true" action="{{route('register')}}" method="POST" time_load="0" swal_success="" type="POST">
                    <input type="hidden" name="_token" value="{{ csrf_token() }}">
                    <input type="hidden" name="action" id="actionField" value="">
                    @csrf
                    <div class="row">
                        <div class="col-md-12">
                            <div class="form-group"><input class="form-control @error('name') is-invalid @enderror" type="text" name="name"
                                    placeholder="Họ Và Tên" required="required" value="{{old('name')}}"></div>

                            @error('name')
                            <p class="text-danger">{{ $message}}</p>
                            @enderror
                        </div>

                        <div class="col-md-12">
                            <div class="form-group">
                                <input class="form-control @error('email') is-invalid @enderror" type="email" name="email"
                                    placeholder="Email đăng ký" required="required" value="{{old('email')}}">
                            </div>

                            @error('email')
                            <p class="text-danger">{{ $message}}</p>
                            @enderror
                        </div>
                        <div class="col-md-12">
                            <div class="form-group"><input class="form-control @error('password') is-invalid @enderror" type="password" name="password"
                                    placeholder="Mật khẩu của bạn" required="required" value="{{old('password')}}"></div>

                            @error('password')
                            <p class="text-danger">{{ $message}}</p>
                            @enderror
                        </div>

                        <div class="col-md-6">
                            <button type="submit" class="btn btn-theme btn-block btn-theme-dark" data-action="register">Đăng Ký</button>
                        </div>
                        <div class="col-md-6">
                            <a class="btn btn-block btn-theme btn-theme-dark btn-create" href="{{route('login')}}">Đăng nhập</a>
                        </div>
                    </div>
                </form>
            </div>
            <div class="col-sm-6">
                <form action="#" class="create-account">
                    <div class="row">
                        <div class="col-md-12">
                            <h3 class="block-title">Đăng ký hôm nay và bạn sẽ có thể</h3>
                            <ul class="list-check">
                                <li>Trạng thái đơn hàng trực tuyến</li>
                                <li>Xem các ưu đãi nóng</li>
                                <li>Danh sách yêu thích</li>
                                <li>Đăng ký nhận tin tức độc quyền và b án hàng riêng</li>
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