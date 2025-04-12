@extends("clients.themes")

@section("title")
    <title>Tài khoản của tôi - {{ $caiDatWebsite->TenCuaHang }}</title>
@endsection

@section('main')
    <div class="content-area">
        <section class="page-section">
            <div class="wrap container">
                <div class="row">
                    <div class="col-lg-9 col-md-9 col-sm-8">
                        <div class="information-title">Tài Khoản Của Tôi</div>
                        <div class="details-wrap">
                            <div class="block-title alt"> <i class="fa fa-angle-down"></i> Tài Khoản Của Tôi</div>
                            <div class="details-box">
                                <ul>
                                    <li>
                                        <a href="/thong-tin-tai-khoan">Chỉnh sửa thông tin tài khoản của bạn</a>
                                    </li>
                                    <li>
                                        <a href="/doi-mat-khau">Đổi mật khẩu của bạn</a>
                                    </li>
                                    <li>
                                        <a href="/so-dia-chi">Chỉnh sửa sổ địa chỉ của bạn</a>
                                    </li>
                                </ul>
                            </div>

                            <div class="block-title alt"> <i class="fa fa-angle-down"></i> Tài Khoản Của Tôi</div>
                            <div class="details-box">
                                <ul>
                                    <li>
                                        <a href="/lich-su-don-hang">Xem lịch sử đơn hàng của bạn</a>
                                    </li>
                                    <li>
                                        <a href="/danh-gia-va-nhan-xet">Đánh giá và nhận xét của bạn</a>
                                    </li>
                                    <li>
                                        <a href="/yeu-cau-tra-hang">Xem yêu cầu trả hàng của bạn</a>
                                    </li>
                                </ul>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-3 col-md-3 col-sm-4">
                        <div class="widget account-details">
                            <h2 class="widget-title">Tài Khoản</h2>
                            <ul>
                                <li><a href="/thong-tin-tai-khoan"> Thông Tin Tài Khoản </a></li>
                                <li class="active"><a href="/tai-khoan-cua-toi">Tài Khoản Của Tôi</a></li>
                                <li><a href="/doi-mat-khau">Đổi Mật Khẩu</a></li>
                                <li><a href="/so-dia-chi">Sổ Địa Chỉ</a></li>
                                <li><a href="/lich-su-don-hang">Lịch Sử Đơn Hàng</a></li>
                                <li><a href="/danh-gia-va-nhan-xet">Đánh Giá và Nhận Xét</a></li>
                                <li><a href="/yeu-cau-tra-hang">Yêu Cầu Trả Hàng</a></li>
                            </ul>
                        </div>
                    </div>
                    <!--end sidebar-->
                </div>

            </div>
        </section>
    </div>
@endsection