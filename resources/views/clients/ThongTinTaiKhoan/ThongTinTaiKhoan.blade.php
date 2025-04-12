@extends("clients.themes")


@section("title")
    <title>Thông tin tài khoản - {{ $caiDatWebsite->TenCuaHang }}</title>
@endsection

@section('main')
    <section class="page-section">
        <div class="wrap container">
            <div class="row">
                <div class="col-lg-9 col-md-9 col-sm-8">
                    <div class="information-title">Thông Tin Tài Khoản Của Bạn</div>
                    <div class="details-wrap">
                        <div class="block-title alt"> <i class="fa fa-angle-down"></i> Thay Đổi Thông Tin Cá Nhân Của Bạn
                        </div>
                        <div class="details-box">
                            <form class="form-delivery" action="{{route('thong-tin-tai-khoan.update', Auth::user()->id)}}"
                                method="POST">
                                @csrf
                                @method('PUT')

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

                                    <div class="col-md-6 col-sm-6">
                                        <span style="color:#111111; font-weight: bold;">Họ Và Tên :</span>
                                        <div class="form-group"><input required type="text" name="name" class="form-control"
                                                value="{{Auth::user()->name}}"></div>
                                    </div>

                                    <div class="col-md-6 col-sm-6">
                                        <span style="color:#111111; font-weight: bold;">Email :</span>
                                        <div class="form-group"><input required type="email" name="email"
                                                class="form-control" value="{{Auth::user()->email}}"></div>
                                    </div>

                                    <div class="col-md-6 col-sm-6">
                                        <span style="color:#111111; font-weight: bold;">Giới Tính :</span>
                                        <select name="sex" class="form-control">
                                            <option value="Nam" {{ Auth::user()->sex == 'Nam' ? 'selected' : '' }}>Nam
                                            </option>
                                            <option value="Nữ" {{ Auth::user()->sex == 'Nữ' ? 'selected' : '' }}>Nữ</option>
                                        </select>
                                    </div>

                                    <div class="col-md-6 col-sm-6">
                                        <span style="color:#111111; font-weight: bold;">Số Điện Thoại :</span>
                                        <div class="form-group"><input required type="number" name="phone"
                                                class="form-control" value="{{Auth::user()->phone}}"></div>
                                    </div>

                                    <div class="col-md-6 col-sm-6">
                                        <span style="color:#111111; font-weight: bold;">Ngày Sinh :</span>
                                        <div class="form-group"><input required type="date" name="birthday"
                                                class="form-control" value="{{Auth::user()->birthday}}"></div>
                                    </div>

                                    <div class="col-md-6 col-sm-6">
                                        <span style="color:#111111; font-weight: bold;">Ngày Tham Gia :</span>
                                        <div class="form-group"><input required class="form-control"
                                                value="{{Auth::user()->created_at}}"></div>
                                    </div>

                                    <div class="col-md-12 col-sm-12">
                                        <button class="btn btn-theme btn-theme-dark" type="submit"> Cập Nhật </button>
                                    </div>

                            </form>
                        </div>
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