@extends("clients.themes")

@section("title")
<title>Chi Tiết Đơn Hàng</title>
@endsection

@section('main')
<section class="page-section">
    <div class="container">
        <div class="row mt-1">
            <div class="col-lg-9 col-md-9 col-sm-8">
                <div class="information-title">Chi Tiết Đơn Hàng Của Bạn </div>
                <div class="details-wrap">
                    <div class="block-title alt"><a href="{{ route("lich-su-don-hang.index") }}"><i
                                class="fa fa-angle-left"></i></a> Đơn Hàng
                        <strong class="pull-right">Mã Đơn Hàng: #{{$chiTietDonHang->MaDonHang}} |
                            <?= trangThaiDonHang($chiTietDonHang->TrangThaiDonHang); ?></strong>
                    </div>

                    <div class="card">
                        <div class="card-body">
                            <div class="deltail-order">
                                <span>Người Nhận: {{$chiTietDonHang->HoTen}}</span>
                                <span>Số Điện Thoại : {{$chiTietDonHang->SoDienThoai}}</span>
                                <span style="width: 100%">Địa Chỉ Nhận :
                                    {{$chiTietDonHang->DiaChi . ", " . $chiTietDonHang->Xa . " - " . $chiTietDonHang->TenHuyen . " - " . $chiTietDonHang->TenThanhPho}}</span>
                            </div>
                        </div>
                    </div>

                </div>

                <div class="card">
                    <div class="card-body">
                        <h4>SẢN PHẨM</h4>
                        <hr>
                        @foreach ($sanPhamMua as $item)
                        <div class="card card-body">
                            <div class="media"
                                style="display: flex; align-items: center; gap: 15px; width: 100%; padding: 10px 5px">
                                <img class="align-self-center img-fluid img-60" width="100" height="100"
                                    src="{{ Storage::url($item->HinhAnh)}}" alt="#"
                                    style="object-fit: cover; border-radius: 5px;">
                                <div class="media-body ms-3"
                                    style="display: flex; flex-direction: column; align-items: flex-start; width: 100%; color: black;">
                                    <div class="product-name" style="margin-bottom: 5px; color: black;">
                                        <h6 style="margin: 0; font-size: 16px; font-weight: bold; color: black;">
                                            <a href="/san-pham/{{ $item->DuongDan }}" target="_blank"
                                                style="color: black; text-decoration: none;">
                                                {{ $item->TenSanPham }}
                                            </a>
                                        </h6>
                                    </div>
                                    <div class="text" style="font-size: 13px; margin-bottom: 5px; color: #888;">
                                        {{ $item->KichCo }} - {{ $item->MauSac }}
                                    </div>
                                    <div class="price d-flex"
                                        style="font-size: 14px; margin-bottom: 5px; color: black;">
                                        <div class="text" style="color: black;">Giá : </div>
                                        {{ number_format($item->GiaTien, 0, ',', '.') }}đ
                                    </div>
                                    <div class="avaiabilty" style="font-size: 14px; color: black;">
                                        <div class="text" style="color: black;">Số Lượng : {{ $item->SoLuong }}</div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        @endforeach
                    </div>
                </div>

                <div class="card">
                    <div class="card-body">
                        <div class="deltail-total-order">
                            <div><span>Giảm Giá:</span> <span>₫{{ number_format($chiTietDonHang->GiamGia) }}</span>
                            </div>
                            <div><span>Thành Tiền : </span> <span
                                    style="color: #010660">₫{{ number_format($chiTietDonHang->TongTien) }}</span></div>
                            <div>
                                <span>Phương Thức Thanh Toán :</span> <span
                                    style="font-weight: 500; font-size: 15px">{{$chiTietDonHang->PhuongThucThanhToan}}</span>
                            </div>
                            @if ($chiTietDonHang->PhuongThucThanhToan == "Chuyển Khoản Ngân Hàng")
                            <div>
                                <span>Trạng Thái Thanh Toán :</span> <span
                                    style="font-weight: 500; font-size: 15px">{{TrangThaiThanhToan($chiTietDonHang->TrangThaiThanhToan)}}</span>
                            </div>
                            @endif
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