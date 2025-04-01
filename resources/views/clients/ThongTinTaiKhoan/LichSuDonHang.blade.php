<?php

use Illuminate\Support\Facades\Storage;
?>
@extends("clients.themes")

@section("title")
<title>Lịch sử đơn hàng - WD-14</title>
@endsection

@section('main')
<section class="page-section">
    <div class="wrap container">
        <div class="row">
            <div class="col-md-9">
                <div class="information-title">Lịch Sử Đơn Hàng Của Bạn</div>
                <div class="list-order-client">
                    @foreach ($lichSu as $item)
                    <div class="item-order-client">
                        <div class="item-header">
                            <span>WanderWeave</span>
                            <span><?= trangThaiDonHang($item->TrangThaiDonHang); ?></span>
                        </div>
                        @foreach (DB::table('san_pham_don_hang')
                        ->join('san_pham', 'san_pham_don_hang.Id_SanPham', '=', 'san_pham.id')
                        ->where('MaDonHang', $item->MaDonHang)->get() as $sanPhamDonHang)
                        <div class="item-product">
                            <div class="img-product">
                                <img src="<?= Storage::url($sanPhamDonHang->HinhAnh); ?>" alt="">
                            </div>
                            <div class="info-product">
                                <span class="name-product">{{ $sanPhamDonHang->TenSanPham }}</span>
                                <span class="classify-product">Phân Loại Hàng: {{ $sanPhamDonHang->KichCo }} - {{ $sanPhamDonHang->MauSac }}</span>
                                <span class="amount-product">x{{ $sanPhamDonHang->SoLuong }}</span>
                            </div>
                            <div class="prices-product">
                                <span><del>₫{{ number_format($sanPhamDonHang->GiaTien) }}</del></span>
                                <span>₫{{ number_format($sanPhamDonHang->GiaSanPham) }}</span>
                            </div>
                        </div>
                        @endforeach
                        <div class="item-footer">
                            <div class="total-item">Thành Tiền: <span>₫{{ number_format($item->TongTien) }}</span></div>
                            <div class="note">
                                <span>Đã Hủy Bởi Bạn</span>
                            </div>
                            <div class="list-button">
                                <button class="btn btn-theme btn-vip">Mua Lại</button>
                                <a class="btn btn-theme btn-donHang">Xem Chi Tiết Hủy Đơn</a>
                                <a class="btn btn-theme btn-donHang">Đánh Giá</a>
                                <a class="btn btn-theme btn-donHang">Xem Đánh Giá</a>
                                <a href="{{ route("lich-su-don-hang.show", $item->MaDonHang) }}" class="btn btn-theme btn-donHang">Chi Tiết</a>
                            </div>
                        </div>
                    </div>
                    @endforeach
                </div>
            </div>

            <div class="col-lg-3 col-md-3 col-sm-4">
                <div class="widget account-details">
                    <h2 class="widget-title">Tài Khoản</h2>
                    <ul>
                        <li><a href="/thong-tin-tai-khoan"> Thông Tin Tài Khoản </a></li>
                        <li class="active"><a href="/doi-mat-khau">Đổi Mật Khẩu</a></li>
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