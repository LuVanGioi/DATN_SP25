@extends("clients.themes")


@section("title")
<title>Đăng Nhập - WD-14</title>
@endsection

@section('main')
@php
if (Auth::check()) {
die('<script>location.href="/"</script>');
}
@endphp
<section class="page-section color">
    <div class="container">
        <div class="row">
            <div class="col-sm-6 col-sm-offset-3">
                <h3 class="block-title" style="margin-top: 30px; margin-bottom: 30px;"><span>Đổi Mật Khẩu</span></h3>
                <form action="{{route('reset-password')}}" method="POST" class="form-login">
                    @csrf
                    <input type="hidden" name="email" value="{{$user->email}}">
                    <div class="row">
                        <div class="col-md-12">
                            <div class="form-group">
                                <input class="form-control" type="password" name="password_new"
                                    placeholder="Mật Khẩu Mới" value="{{old('password')}}" autocomplete="password">

                                @error('password_new')
                                <p class="text-danger">{{ $message}}</p>
                                @enderror
                            </div>
                        </div>
                        <div class="col-md-12">
                            <div class="form-group"><input class="form-control" type="password" name="password_confirm"
                                    placeholder="Xác Nhận Mật Khẩu">
                                
                                    @error('password_confirm')
                                    <p class="text-danger">{{ $message}}</p>
                                    @enderror
                            </div>
                        </div>
                       
                        <div class="col-md-6">
                            <button class="btn btn-theme btn-block btn-theme-dark">Cập Nhật</button>
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