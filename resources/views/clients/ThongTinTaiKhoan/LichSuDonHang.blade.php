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
                <div class="list-order-client" id="list-order-client">
                    @foreach ($lichSu as $item)
                    <div class="item-order-client" >
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
                                <span><del>₫{{ number_format($sanPhamDonHang->GiaKhuyenMai) }}</del></span>
                                <span>₫{{ number_format($sanPhamDonHang->GiaSanPham) }}</span>
                            </div>
                        </div>
                        @endforeach
                        <div class="item-footer">
                            <div class="total-item">Thành Tiền: <span>₫{{ number_format($item->TongTien) }}</span></div>
                            <div class="item-header">
                                <span>
                                    @if ($item->TrangThaiDonHang == "choxacnhan")
                                        <span><i class="fa-solid fa-hourglass-start"></i> Chờ Xác Nhận</span>
                                    @elseif ($item->TrangThaiDonHang == "danggiao")
                                        <span><i class="fa-solid fa-truck-fast"></i> Đang Giao</span>
                                    @elseif ($item->TrangThaiDonHang == "dagiao")
                                        <span><i class="fa-solid fa-circle-check"></i> Đã Giao</span>
                                    @elseif ($item->TrangThaiDonHang == "hoanhang")
                                        <span><i class="fa-solid fa-right-left"></i> Hoàn Hàng</span>
                                    @elseif($item->TrangThaiDonHang == "thatbai")
                                        <span><i class="fa-solid fa-circle-exclamation"></i> Giao Thất Bại</span>    
                                    @elseif($item->TrangThaiDonHang == "huydon")
                                        <span><i class="fa-solid fa-xmark"></i> Đã Hủy Bởi Bạn</span>
                                    @endif
                                </span>
                            </div>
                            <div class="list-button">
                            @if ($item->TrangThaiDonHang == "choxacnhan")
                            <a href="{{route('huy-don.edit',$item->MaDonHang)}}" class="btn btn-theme btn-donHang">Hủy Đơn</a>
                            
                            @elseif ($item->TrangThaiDonHang == "dagiao")
                               <button class="btn btn-theme btn-vip">Mua Lại</button>
                               <a class="btn btn-theme btn-donHang">Hoàn Hàng</a>
                            @if (1)
                               <a class="btn btn-theme btn-donHang">Đánh Giá</a>
                            @else
                               <a class="btn btn-theme btn-donHang">Xem Đánh Giá</a>
                            @endif

                            @elseif ($item->TrangThaiDonHang == "hoanhang")
                            <button class="btn btn-theme btn-vip">Mua Lại</button>
                            <button class="btn btn-theme btn-donHang">Chi Tiết Hoàn Hàng</button>

                            @elseif($item->TrangThaiDonHang == "thatbai")
                               <button class="btn btn-theme btn-vip">Mua Lại</button>

                            @elseif($item->TrangThaiDonHang == "huydon")
                               <button class="btn btn-theme btn-vip">Mua Lại</button>
                               <a href="" class="btn btn-theme btn-donHang">Chi Tiết Hủy Đơn</a>

                               
                            @endif
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

@section('js')
<script>
    document.addEventListener("DOMContentLoaded", function() {
        setInterval(function() {
            fetch(location.href)
                .then(response => response.text())
                .then(data => {
                    const parser = new DOMParser();
                    const doc = parser.parseFromString(data, "text/html");

                    const newCartCount = doc.querySelector("#list-order-client");
                    if (newCartCount) {
                        document.getElementById("list-order-client").innerHTML = newCartCount.innerHTML;
                    }
                })
                .catch(error => console.log("Lỗi: ", error));
        }, 2000);
    });

</script>
@endsection