@extends("clients.themes")


@section("title")
    <title>Thông tin tài khoản - WD-14</title>
@endsection

@section('main')
    <section class="page-section">
        <div class="wrap container">
            <div class="row">
                <div class="col-lg-9 col-md-9 col-sm-8">
                    <div class="information-title">Thông Tin Tài Khoản Của Bạn</div>
                    <div class="details-wrap">
                        <div class="block-title alt"> <i class="fa fa-angle-down"></i> Thay Đổi Thông Tin Cá Nhân Của Bạn</div>
                        <div class="details-box">
                            <form class="form-delivery" action="#">
                                <div class="row">
                                    <div class="col-md-6 col-sm-6">
                                        <div class="form-group"><input required type="text" placeholder="Tên"
                                                class="form-control"></div>
                                    </div>
                                    <div class="col-md-6 col-sm-6">
                                        <div class="form-group"><input required type="text" placeholder="Họ"
                                                class="form-control"></div>
                                    </div>
                                    <div class="col-md-6 col-sm-6">
                                        <div class="form-group"><input required type="text" placeholder="Email"
                                                class="form-control"></div>
                                    </div>
                                    <div class="col-md-6 col-sm-6">
                                        <div class="form-group"><input required type="text" placeholder="Số Điện Thoại"
                                                class="form-control"></div>
                                    </div>
                                    <div class="col-md-6 col-sm-6">
                                        <div class="form-group"><input type="text" placeholder="Fax" class="form-control">
                                        </div>
                                    </div>
                                    <div class="col-md-12 col-sm-12">
                                        <button class="btn btn-theme btn-theme-dark" type="submit"> Cập Nhật </button>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
                <div class="col-lg-3 col-md-3 col-sm-4">
                    <div class="widget account-details">
                        <h2 class="widget-title">Tài Khoản</h2>
                        <ul>
                            <li class="active"><a href="/thong-tin-tai-khoan"> Thông Tin Tài Khoản </a></li>
                            <li><a href="/tai-khoan-cua-toi">Tài Khoản Của Tôi</a></li>
                            <li><a href="/doi-mat-khau">Đổi Mật Khẩu</a></li>
                            <li><a href="/so-dia-chi">Sổ Địa Chỉ</a></li>
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