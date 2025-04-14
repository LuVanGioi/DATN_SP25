@extends("clients.themes")

@section("title")
<title>Chi Tiết Thanh Toán - {{ $caiDatWebsite->TenCuaHang }}</title>
@endsection

@section('main')
<section class="page-section">
    <div class="wrap container">
        <div class="row">
            <div class="col-md-3"></div>
            <div class="col-md-6">
                <div class="card">
                    <div class="p-1 text-center">
                        <h2>{{ $donHang->TheLoai == "refund" ? "+" : "-" }}₫{{ number_format($donHang->SoTien) }}</h2>
                        @if ($donHang->TrangThai == "thanhcong")
                        <div class="text-success"><i class="fas fa-check-circle"></i> Thành Công</div>
                        @elseif ($donHang->TrangThai == "dangxuly")
                        <div class="text-warning"><i class="fas fa-triangle-exclamation"></i> Chờ Xử Lý</div>
                        @elseif ($donHang->TrangThai == "thatbai")
                        <div class="text-danger"><i class="fas fa-times"></i> Thất Bại</div>
                        @else
                        <div class="text-danger"><i class="fas fa-exclamation"></i> Khác</div>
                        @endif
                        @if ($donHang->TrangThai == "thanhcong")
                        <p>Thời Gian Hoàn Thành: {{ date("d-m-Y H:i", strtotime($donHang->created_at)) }}</p>
                        @endif
                    </div>
                </div>

                <div class="card">
                    <div class="card-body">
                        @if ($donHang->TheLoai == "refund")
                        <div>
                            <h5>Hoàn Tiền Từ</h5>
                            <span>Hoàn Đơn Hàng</span>
                        </div>
                        @elseif ($donHang->TheLoai == "payment")
                        <div>
                            <h5>Thanh Toán Cho</h5>
                            <span>Đơn Hàng</span>
                        </div>
                        @elseif ($donHang->TheLoai == "withdraw")
                        <div>
                            <h5>Rút Từ</h5>
                            <span>Số Dư Ví</span>
                        </div>
                        <hr style="margin: 3px 0px;">
                        <div>
                            <h5>Rút Tiền Về</h5>
                            <div>
                                <img src="{{ $nganHangRutTien->logo }}" style="margin: 0px; width: 100px"><br>
                                <span><b>Ngân Hàng :</b> {{ $nganHangRutTien->shortName }} - {{ $nganHangRutTien->name }}</span><br>
                                <span><b>Tên Tài Khoản :</b> {{ $donHang->namebank }}</span><br>
                                <span><b>Số Tài Khoản :</b> *{{ substr($donHang->numberBank, -4) }}</span>
                            </div>
                        </div>
                        @endif
                    </div>
                </div>

                @if ($donHang->TheLoai == "withdraw")
                <div class="card">
                    <div class="card-body">
                        <b class="text-danger">Lý Do: </b> {{ $donHang->LiDoThatBai }}
                    </div>
                </div>
                @endif

                <div class="card">
                    <div class="card-body">
                        <h4 class="text-dark">Thông Tin Đơn Hàng</h4>
                        <small>Mã Giao Dịch</small><br>
                        <span>#{{ $donHang->MaGiaoDich }}</span>
                        <hr style="margin: 3px 0px;">
                        <small>Mã Tham Chiếu</small><br>
                        <span>{{ hexdec(substr(hash('sha256', $donHang->MaGiaoDich), 0, 10)) }}</span>
                        <hr style="margin: 3px 0px;">
                        <small>Phương Thức Thanh Toán</small><br>
                        <span>Số Dư Ví</span>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-md-3"></div>
    </div>
    </div>
</section>
@endsection