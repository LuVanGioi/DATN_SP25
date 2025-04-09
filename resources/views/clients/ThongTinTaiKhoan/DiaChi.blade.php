@extends("clients.themes")

@section("title")
    <title>Địa chỉ - {{ $caiDatWebsite->TenCuaHang }}</title>
@endsection

@section('main')
    <section class="page-section">
        <div class="wrap container">
            <div class="row">
                <div class="col-lg-9 col-md-9 col-sm-8">
                    <div class="information-title">Thông Tin Địa Chỉ Của Bạn</div>
                    <div class="details-wrap">
                        <div class="block-title alt"> <i class="fa fa-angle-down"></i> Thay Đổi Địa Chỉ Của Bạn
                        </div>
                        <div class="details-box">
                            <form action="#" class="form-delivery">
                                <div class="row">
                                    <div class="col-md-6 col-sm-12">
                                        <div class="form-group"><input required class="form-control" type="text"
                                                placeholder="Địa Chỉ 1"></div>
                                    </div>
                                    <div class="col-md-6 col-sm-12">
                                        <div class="form-group"><input class="form-control" type="text"
                                                placeholder="Địa Chỉ 2"></div>
                                    </div>
                                    <div class="col-md-6 col-sm-6">
                                        <div class="form-group selectpicker-wrapper">
                                            <select class="selectpicker input-price" data-live-search="true"
                                                data-width="100%" data-toggle="tooltip" title="Chọn">
                                                <option>Quốc Gia</option>
                                                <option>Quốc Gia</option>
                                                <option>Quốc Gia</option>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="col-md-6 col-sm-6">
                                        <div class="form-group selectpicker-wrapper">
                                            <select class="selectpicker input-price" data-live-search="true"
                                                data-width="100%" data-toggle="tooltip" title="Chọn">
                                                <option>Thành Phố</option>
                                                <option>Thành Phố</option>
                                                <option>Thành Phố</option>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="col-md-4 col-sm-6">
                                        <div class="form-group"><input class="form-control" type="text"
                                                placeholder="Mã Bưu Điện"></div>
                                    </div>
                                    <div class="col-md-4 col-sm-6">
                                        <div class="form-group"><input class="form-control" type="text" placeholder="Email">
                                        </div>
                                    </div>
                                    <div class="col-md-4 col-sm-6">
                                        <div class="form-group"><input class="form-control" type="text"
                                                placeholder="Số Điện Thoại"></div>
                                    </div>
                                    <div class="col-md-12 col-sm-12">
                                        <div class="form-group"><textarea class="form-control"
                                                placeholder="Thông Tin Bổ Sung" name="name" id="id" cols="30"
                                                rows="10"></textarea></div>
                                    </div>
                                    <div class="col-md-12 col-sm-12">
                                        <button type="submit" class="btn btn-theme btn-theme-dark"> Cập Nhật </button>
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
                            <li><a href="/thong-tin-tai-khoan"> Thông Tin Tài Khoản </a></li>
                            <li><a href="/tai-khoan-cua-toi">Tài Khoản Của Tôi</a></li>
                            <li><a href="/doi-mat-khau">Đổi Mật Khẩu</a></li>
                            <li class="active"><a href="/so-dia-chi">Sổ Địa Chỉ</a></li>
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