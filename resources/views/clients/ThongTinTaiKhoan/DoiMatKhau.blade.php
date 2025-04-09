@extends("clients.themes")

@section("title")
    <title>Đổi mật khẩu - {{ $caiDatWebsite->TenCuaHang }}</title>
@endsection

@section('main')
    <section class="page-section">
        <div class="wrap container">
            <div class="row">
                <div class="col-lg-9 col-md-9 col-sm-8">
                    <div class="information-title">Mật Khẩu Của Bạn</div>
                    <div class="details-wrap">
                        <div class="block-title alt"> <i class="fa fa-angle-down"></i> Đổi mật khẩu của bạn </div>
                        <div class="details-box">
                            <form class="form-delivery" action="{{route('doi-mat-khau.update', Auth::user()->id)}}" method="POST">
                                @method('PUT')
                                @csrf
                                
                                @if(session('success'))
                                    <script>
                                        alert("{{ session('success') }}");
                                    </script>
                                @endif
                                
                                @if(session('error'))
                                    <div class="alert alert-danger">
                                        {{ session('error') }}
                                    </div>
                                @endif
                            
                                <div class="row">
                                    <div class="col-md-12 col-sm-6">
                                        <div class="form-group">
                                            <input required type="password" name="password" placeholder="Mật Khẩu Hiện Tại" class="form-control">
                                        </div>
                                    </div>
                            
                                    <div class="col-md-12 col-sm-6">
                                        <div class="form-group">
                                            <input required type="password" name="new_password" placeholder="Mật Khẩu Mới" class="form-control">
                                        </div>
                                    </div>
                                    
                                    <div class="col-md-12 col-sm-12">
                                        <button class="btn btn-theme btn-theme-dark" type="submit">Cập Nhật</button>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
                <div class="col-lg-3 col-md-3 order-lg-last">
                    <div class="widget account-details">
                        <h2 class="widget-title">Tài Khoản</h2>
                        <ul>
                            <li><a href="/thong-tin-tai-khoan"> Thông Tin Tài Khoản </a></li>
                            <li><a href="/doi-mat-khau">Đổi Mật Khẩu</a></li>
                            <li class="active"><a href="/dia-chi-nhan-hang">Địa Chỉ Nhận Hàng</a></li>
                            <li><a href="/lich-su-don-hang">Lịch Sử Đơn Hàng</a></li>
                            <li><a href="/danh-gia-va-nhan-xet">Đánh Giá và Nhận Xét</a></li>
                            <li><a href="/yeu-cau-tra-hang">Yêu Cầu Trả Hàng</a></li>
                        </ul>
                    </div>
                </div>
            </div>

        </div>
    </section>
@endsection