<?php

use Illuminate\Support\Facades\Storage;
?>
@extends("clients.themes")

@section("title")
<title>Lịch sử đơn hàng - {{ $caiDatWebsite->TenCuaHang }}</title>
@endsection

@section('main')
<section class="page-section">
    <div class="wrap container">
        <div class="row">
            <div class="col-md-9">
                <div class="information-title">Lịch Sử Đơn Hàng Của Bạn</div>
                <div class="list-order-client" id="list-order-client">

                    @foreach ($lichSu as $item)
                    <div class="item-order-client">
                        <div class="item-header">
                            <span>#{{ $item->MaDonHang }}</span>
                            <span><?= trangThaiDonHang($item->TrangThai); ?></span>
                        </div>
                        @foreach (DB::table('san_pham_don_hang')
                        ->join('san_pham', 'san_pham_don_hang.Id_SanPham', '=', 'san_pham.id')
                        ->where('MaDonHang', $item->MaDonHang)
                        ->selectRaw('san_pham.id as idSP, san_pham.*, san_pham_don_hang.*')->get() as $sanPhamDonHang)
                        @php
                        $bienthe = DB::table('bien_the_san_pham')
                        ->where('ID_SanPham', $sanPhamDonHang->idSP)
                        ->where('ID_MauSac', DB::table('mau_sac')->where('TenMauSac', $sanPhamDonHang->MauSac)->first()->id)
                        ->where('KichCo', $sanPhamDonHang->KichCo)
                        ->where('Xoa', 0)
                        ->first();
                        @endphp
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
                                @if ($sanPhamDonHang->TheLoai == "thuong")
                                <span><del>{{ ($sanPhamDonHang->GiaKhuyenMai ? "₫". number_format($sanPhamDonHang->GiaKhuyenMai) : "") }}</del></span>
                                <span>₫{{ number_format($sanPhamDonHang->GiaSanPham) }}</span>
                                @else
                                <span><del>{{ ($sanPhamDonHang->GiaKhuyenMai ? "₫". number_format($sanPhamDonHang->GiaKhuyenMai) : "") }}</del></span>
                                <span>₫{{ number_format($bienthe->Gia) }}</span>
                                @endif
                            </div>
                        </div>
                        @endforeach
                        <div class="item-footer">
                            <div class="total-item">Thành Tiền: <span>₫{{ number_format($item->TongTien) }}</span></div>
                            <div class="item-header">
                                <span>
                                    @if ($item->TrangThai == "choxacnhan")
                                    <span><i class="fa-solid fa-hourglass-start text-primary"></i> Chờ Xác Nhận</span>
                                    @elseif ($item->TrangThai == "daxacnhan")
                                    <span><i class="fa-solid fa-truck-fast text-info"></i> Chờ Đơn Vị Vận Chuyển</span>
                                    @elseif ($item->TrangThai == "danggiao")
                                    <span><i class="fa-solid fa-truck-fast text-warning"></i> Đang Giao</span>
                                    @elseif ($item->TrangThai == "danhan")
                                    <span><i class="fa-solid fa-truck-fast text-primary"></i> Hoàn Thành</span>
                                    @elseif ($item->TrangThai == "dagiao")
                                    <span><i class="fa-solid fa-circle-check text-success"></i> Đã Giao</span>
                                    @elseif ($item->TrangThai == "hoanhang")
                                    <span><i class="fa-solid fa-right-left text-danger"></i> Hoàn Hàng</span>
                                    @elseif($item->TrangThai == "thatbai")
                                    <span><i class="fa-solid fa-circle-exclamation text-danger"></i> Thất Bại</span>
                                    @elseif($item->TrangThai == "huydon")
                                    <span><i class="fa-solid fa-xmark text-danger"></i> Đã Hủy Bởi Bạn</span>
                                    @elseif($item->TrangThai == "xacnhanhoanhang")
                                    <span><i class="fa-solid fa-check text-primary"></i> Đã Hoàn Tiền Vào Ví</span>
                                    @endif
                                </span>
                            </div>
                            <div class="list-button">
                                @if ($item->TrangThai == "choxacnhan")
                                <a href="{{route('huy-don.edit', $item->MaDonHang)}}" class="btn btn-theme btn-donHang">Hủy Đơn</a>
                                <a href="{{ route("lich-su-don-hang.show", $item->MaDonHang) }}" class="btn btn-theme btn-donHang">Chi Tiết</a>
                                @elseif ($item->TrangThai == "daxacnhan")
                                <a href="{{ route("lich-su-don-hang.show", $item->MaDonHang) }}" class="btn btn-theme btn-donHang">Chi Tiết</a>
                                @elseif ($item->TrangThai == "danggiao")
                                <a href="{{ route("lich-su-don-hang.show", $item->MaDonHang) }}" class="btn btn-theme btn-donHang">Chi Tiết</a>
                                @elseif ($item->TrangThai == "dagiao")
                                <button class="btn btn-theme btn-vip" onclick="buy_again('{{ $item->MaDonHang }}')">Mua Lại</button>
                                <button class="btn btn-theme btn-donHang" onclick="xacNhanDon('{{ $item->MaDonHang }}')">Đã Nhận</button>
                                <a class="btn btn-theme btn-donHang" onclick="refund_order('{{ $item->MaDonHang }}')">Trả Hàng / Hoàn Tiền</a>
                                <a href="{{ route("lich-su-don-hang.show", $item->MaDonHang) }}" class="btn btn-theme btn-donHang">Chi Tiết</a>
                                @elseif ($item->TrangThai == "danhan")
                                <button class="btn btn-theme btn-vip" onclick="buy_again('{{ $item->MaDonHang }}')">Mua Lại</button>
                                <a class="btn btn-theme btn-donHang" onclick="refund_order('{{ $item->MaDonHang }}')">Trả Hàng / Hoàn Tiền</a>
                                <a href="{{ route('danh-gia', ['id' => $item->MaDonHang]) }}" class="btn btn-theme btn-donHang">Đánh Giá</a>
                                <a href="{{ route("lich-su-don-hang.show", $item->MaDonHang) }}" class="btn btn-theme btn-donHang">Chi Tiết</a>
                                @elseif ($item->TrangThai == "hoanhang" || $item->TrangThai == "xacnhanhoanhang")
                                <button class="btn btn-theme btn-vip" onclick="buy_again('{{ $item->MaDonHang }}')">Mua Lại</button>
                                <a class="btn btn-theme btn-donHang" href="{{ route("hoan-hang.edit", $item->MaDonHang) }}">Chi Tiết Hoàn Hàng</a>
                                @elseif($item->TrangThai == "thatbai")
                                <button class="btn btn-theme btn-vip" onclick="buy_again('{{ $item->MaDonHang }}')">Mua Lại</button>
                                <a href="{{ route("lich-su-don-hang.show", $item->MaDonHang) }}" class="btn btn-theme btn-donHang">Chi Tiết</a>
                                @elseif($item->TrangThai == "huydon")
                                <button class="btn btn-theme btn-vip" onclick="buy_again('{{ $item->MaDonHang }}')">Mua Lại</button>
                                <a href="{{ route("lich-su-don-hang.show", $item->MaDonHang) }}" class="btn btn-theme btn-donHang">Chi Tiết</a>
                                @endif
                            </div>
                        </div>
                    </div>
                    @endforeach
                </div>
            </div>

            <div class="col-lg-3 col-md-3 order-lg-last">
                <div class="widget account-details">
                    <h2 class="widget-title">Tài Khoản</h2>
                    <ul>
                        <li><a href="/thong-tin-tai-khoan"> Thông Tin Tài Khoản </a></li>
                        <li><a href="/vi"> Ví Của Tôi </a></li>
                        <li><a href="/doi-mat-khau">Đổi Mật Khẩu</a></li>
                        <li><a href="/dia-chi-nhan-hang">Địa Chỉ Nhận Hàng</a></li>
                        <li class="active"><a href="/lich-su-don-hang">Lịch Sử Đơn Hàng</a></li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
</section>
@endsection

@section('js')
<script>
    function refund_order(MADONHANG) {
        const formData = new FormData();
        formData.append('_token', "{{ csrf_token() }}");
        formData.append('type', 'refund_order');
        formData.append('trading', MADONHANG);
        $.ajax({
            url: "<?= route('api.client'); ?>",
            type: "POST",
            data: formData,
            processData: false,
            contentType: false,
            success: function(data) {
                if (data.status === "success") {
                    location.href = data.redirect;
                } else {
                    if (data.message) {
                        AlertDATN("error", data.message);
                    }
                }

            },
            error: function(error) {
                let errorMessage = "Có lỗi xảy ra!";
                if (error.responseJSON && error.responseJSON.message) {
                    errorMessage = error.responseJSON.message;
                }
                AlertDATN(errorMessage);
            }
        });
    }

    function buy_again(MADONHANG) {
        const formData = new FormData();
        formData.append('_token', "{{ csrf_token() }}");
        formData.append('type', 'buy_again');
        formData.append('trading', MADONHANG);
        $.ajax({
            url: "<?= route('api.client'); ?>",
            type: "POST",
            data: formData,
            processData: false,
            contentType: false,
            success: function(data) {
                if (data.status === "success") {
                    location.href = data.redirect;
                } else {
                    if (data.message) {
                        AlertDATN("error", data.message);
                    }
                }

            },
            error: function(error) {
                let errorMessage = "Có lỗi xảy ra!";
                if (error.responseJSON && error.responseJSON.message) {
                    errorMessage = error.responseJSON.message;
                }
                AlertDATN(errorMessage);
            }
        });
    }

    function xacNhanDon(MADONHANG) {
        const formData = new FormData();
        formData.append('_token', "{{ csrf_token() }}");
        formData.append('type', 'xacNhanDon');
        formData.append('trading', MADONHANG);
        $.ajax({
            url: "{{route('api.client')}}",
            type: "POST",
            data: formData,
            processData: false,
            contentType: false,
            success: function(data) {
                if (data.status === "success") {
                    AlertDATN("success", data.message);
                } else {
                    if (data.message) {
                        AlertDATN("error", data.message);
                    }
                }

            },
            error: function(error) {
                let errorMessage = "Có lỗi xảy ra!";
                if (error.responseJSON && error.responseJSON.message) {
                    errorMessage = error.responseJSON.message;
                }
                AlertDATN(errorMessage);
            }
        });
    }

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