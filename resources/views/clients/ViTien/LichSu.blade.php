@extends("clients.themes")

@section("title")
<title>Lịch Sử Giao Dịch Ví - {{ $caiDatWebsite->TenCuaHang }}</title>
@endsection

@section('main')
<section class="page-section">
    <div class="wrap container">
        <div class="row">
            <div class="col-md-12">
                <div class="block-title alt">
                    <i class="fa fa-angle-left" onclick="history.back();"></i>
                    <ul id="tabs" class="list-tab-hisory-wallet">
                        <li class="active">
                            <a href="#tat-ca" data-toggle="tab">Tất Cả</a>
                        </li>
                        <li>
                            <a href="#hoa-don" data-toggle="tab">Hóa Đơn</a>
                        </li>
                        <li>
                            <a href="#hoan-tien" data-toggle="tab">Hoàn Tiền</a>
                        </li>
                        <li>
                            <a href="#nap-tien" data-toggle="tab">Nạp Tiền</a>
                        </li>
                        <li>
                            <a href="#rut-tien" data-toggle="tab">Rút Tiền</a>
                        </li>
                        <li>
                            <a href="#thanh-cong" data-toggle="tab">Thành Công</a>
                        </li>
                        <li>
                            <a href="#dang-xu-ly" data-toggle="tab">Đang Xử Lý</a>
                        </li>
                        <li>
                            <a href="#that-bai" data-toggle="tab">Thất Bại</a>
                        </li>
                    </ul>
                </div>

                <div class="tab-content">
                    <div class="tab-pane fade active in" id="tat-ca">
                        @foreach ($lichSu as $thang => $giaoDichThang)
                        <h4>Tháng {{ explode("-", $thang)[1] }}</h4>
                        @foreach ($giaoDichThang as $ls)
                        <div class="card cusor-pointer" onclick="href('/vi/chi-tiet-giao-dich/{{ $ls->MaGiaoDich }}')">
                            <div class="card-body info-hisoty-wallet">
                                <div class="img {{ ($ls->TheLoai == "recharge" ? "wallet" : $ls->TheLoai) }}">
                                    <img src="/clients/images/icon/{{ $ls->TheLoai == "withdraw" ? "banking" : ($ls->TheLoai == "refund" ? "withdraw" : "wallet") }}.png"
                                        alt="">
                                </div>
                                <div class="info">
                                    <span class="title">{{ $ls->TieuDe }}</span>
                                    <span class="time">{{ $ls->created_at }}</span>
                                </div>
                                <div class="price">
                                    <span class="{{ $ls->TheLoai == "refund" ? "text-success" : ($ls->TheLoai == "recharge" ? "text-success" : "text-danger") }}">{{ $ls->TheLoai == "refund" ? "+" : ($ls->TheLoai == "recharge" ? "+" : "-" )}}₫{{ number_format($ls->SoTien) }}</span>
                                </div>
                            </div>
                        </div>
                        @endforeach
                        @endforeach
                    </div>

                    <div class="tab-pane fade" id="hoa-don">
                        @foreach ($lichSu as $thang => $giaoDichThang)
                        @php
                        $giaoDichHoaDon = $giaoDichThang->filter(fn($gd) => $gd->TheLoai == "payment");
                        @endphp
                        @if ($giaoDichHoaDon->isNotEmpty())
                        <h4>Tháng {{ $thang }}</h4>
                        @foreach ($giaoDichHoaDon as $ls)
                        <div class="card cusor-pointer" onclick="href('/vi/chi-tiet-giao-dich/{{ $ls->MaGiaoDich }}')">
                            <div class="card-body info-hisoty-wallet">
                                <div class="img {{ $ls->TheLoai }}">
                                    <img src="/clients/images/icon/{{ $ls->TheLoai == "withdraw" ? "banking" : ($ls->TheLoai == "refund" ? "withdraw" : "wallet") }}.png"
                                        alt="">
                                </div>
                                <div class="info">
                                    <span class="title">{{ $ls->TieuDe }}</span>
                                    <span class="time">{{ $ls->created_at }}</span>
                                </div>
                                <div class="price">
                                    <span
                                        class="{{ $ls->TheLoai == "refund" ? "text-success" : "text-danger" }}">{{ $ls->TheLoai == "refund" ? "+" : "-" }}₫{{ number_format($ls->SoTien) }}</span>
                                </div>
                            </div>
                        </div>
                        @endforeach
                        @endif
                        @endforeach
                    </div>

                    <div class="tab-pane fade" id="hoan-tien">
                        @foreach ($lichSu as $thang => $giaoDichThang)
                        @php
                        $giaoDichHoanTien = $giaoDichThang->filter(fn($gd) => $gd->TheLoai == "refund");
                        @endphp
                        @if ($giaoDichHoanTien->isNotEmpty())
                        <h4>Tháng {{ $thang }}</h4>
                        @foreach ($giaoDichHoanTien as $ls)
                        <div class="card cusor-pointer" onclick="href('/vi/chi-tiet-giao-dich/{{ $ls->MaGiaoDich }}')">
                            <div class="card-body info-hisoty-wallet">
                                <div class="img {{ $ls->TheLoai }}">
                                    <img src="/clients/images/icon/{{ $ls->TheLoai == "withdraw" ? "banking" : ($ls->TheLoai == "refund" ? "withdraw" : "wallet") }}.png"
                                        alt="">
                                </div>
                                <div class="info">
                                    <span class="title">{{ $ls->TieuDe }}</span>
                                    <span class="time">{{ $ls->created_at }}</span>
                                </div>
                                <div class="price">
                                    <span
                                        class="{{ $ls->TheLoai == "refund" ? "text-success" : "text-danger" }}">{{ $ls->TheLoai == "refund" ? "+" : "-" }}₫{{ number_format($ls->SoTien) }}</span>
                                </div>
                            </div>
                        </div>
                        @endforeach
                        @endif
                        @endforeach
                    </div>

                    <div class="tab-pane fade" id="nap-tien">
                        @foreach ($lichSu as $thang => $giaoDichThang)
                        @php
                        $giaoDichNapTien = $giaoDichThang->filter(fn($gd) => $gd->TheLoai == "recharge");
                        @endphp
                        @if ($giaoDichNapTien->isNotEmpty())
                        <h4>Tháng {{ $thang }}</h4>
                        @foreach ($giaoDichNapTien as $ls)
                        <div class="card cusor-pointer" onclick="href('/vi/chi-tiet-giao-dich/{{ $ls->MaGiaoDich }}')">
                            <div class="card-body info-hisoty-wallet">
                                <div class="img {{ ($ls->TheLoai == "recharge" ? "wallet" : $ls->TheLoai) }}">
                                    <img src="/clients/images/icon/{{ $ls->TheLoai == "withdraw" ? "banking" : ($ls->TheLoai == "refund" ? "withdraw" : "wallet") }}.png"
                                        alt="">
                                </div>
                                <div class="info">
                                    <span class="title">{{ $ls->TieuDe }}</span>
                                    <span class="time">{{ $ls->created_at }}</span>
                                </div>
                                <div class="price">
                                <span class="{{ $ls->TheLoai == "refund" ? "text-success" : ($ls->TheLoai == "recharge" ? "text-success" : "text-danger") }}">{{ $ls->TheLoai == "refund" ? "+" : ($ls->TheLoai == "recharge" ? "+" : "-" )}}₫{{ number_format($ls->SoTien) }}</span>
                                </div>
                            </div>
                        </div>
                        @endforeach
                        @endif
                        @endforeach
                    </div>

                    <div class="tab-pane fade" id="rut-tien">
                        @foreach ($lichSu as $thang => $giaoDichThang)
                        @php
                        $giaoDichRutTien = $giaoDichThang->filter(fn($gd) => $gd->TheLoai == "withdraw");
                        @endphp
                        @if ($giaoDichRutTien->isNotEmpty())
                        <h4>Tháng {{ $thang }}</h4>
                        @foreach ($giaoDichRutTien as $ls)
                        <div class="card cusor-pointer" onclick="href('/vi/chi-tiet-giao-dich/{{ $ls->MaGiaoDich }}')">
                            <div class="card-body info-hisoty-wallet">
                                <div class="img {{ $ls->TheLoai }}">
                                    <img src="/clients/images/icon/{{ $ls->TheLoai == "withdraw" ? "banking" : ($ls->TheLoai == "refund" ? "withdraw" : "wallet") }}.png"
                                        alt="">
                                </div>
                                <div class="info">
                                    <span class="title">{{ $ls->TieuDe }}</span>
                                    <span class="time">{{ $ls->created_at }}</span>
                                </div>
                                <div class="price">
                                    <span
                                        class="{{ $ls->TheLoai == "refund" ? "text-success" : "text-danger" }}">{{ $ls->TheLoai == "refund" ? "+" : "-" }}₫{{ number_format($ls->SoTien) }}</span>
                                </div>
                            </div>
                        </div>
                        @endforeach
                        @endif
                        @endforeach
                    </div>

                    <div class="tab-pane fade" id="thanh-cong">
                        @foreach ($lichSu as $thang => $giaoDichThang)
                        @php
                        $giaoDichThanhCong = $giaoDichThang->filter(fn($gd) => $gd->TrangThai == "thanhcong");
                        @endphp
                        @if ($giaoDichThanhCong->isNotEmpty())
                        <h4>Tháng {{ $thang }}</h4>
                        @foreach ($giaoDichThanhCong as $ls)
                        <div class="card cusor-pointer" onclick="href('/vi/chi-tiet-giao-dich/{{ $ls->MaGiaoDich }}')">
                            <div class="card-body info-hisoty-wallet">
                                <div class="img {{ $ls->TheLoai }}">
                                    <img src="/clients/images/icon/{{ $ls->TheLoai == "withdraw" ? "banking" : ($ls->TheLoai == "refund" ? "withdraw" : "wallet") }}.png"
                                        alt="">
                                </div>
                                <div class="info">
                                    <span class="title">{{ $ls->TieuDe }}</span>
                                    <span class="time">{{ $ls->created_at }}</span>
                                </div>
                                <div class="price">
                                    <span
                                        class="{{ $ls->TheLoai == "refund" ? "text-success" : "text-danger" }}">{{ $ls->TheLoai == "refund" ? "+" : "-" }}₫{{ number_format($ls->SoTien) }}</span>
                                </div>
                            </div>
                        </div>
                        @endforeach
                        @endif
                        @endforeach
                    </div>

                    <div class="tab-pane fade" id="dang-xu-ly">
                        @foreach ($lichSu as $thang => $giaoDichThang)
                        @php
                        $giaoDichDangXuLy = $giaoDichThang->filter(fn($gd) => $gd->TrangThai == "dangxuly");
                        @endphp
                        @if ($giaoDichDangXuLy->isNotEmpty())
                        <h4>Tháng {{ $thang }}</h4>
                        @foreach ($giaoDichDangXuLy as $ls)
                        <div class="card cusor-pointer" onclick="href('/vi/chi-tiet-giao-dich/{{ $ls->MaGiaoDich }}')">
                            <div class="card-body info-hisoty-wallet">
                                <div class="img {{ $ls->TheLoai }}">
                                    <img src="/clients/images/icon/{{ $ls->TheLoai == "withdraw" ? "banking" : ($ls->TheLoai == "refund" ? "withdraw" : "wallet") }}.png"
                                        alt="">
                                </div>
                                <div class="info">
                                    <span class="title">{{ $ls->TieuDe }}</span>
                                    <span class="time">{{ $ls->created_at }}</span>
                                </div>
                                <div class="price">
                                    <span
                                        class="{{ $ls->TheLoai == "refund" ? "text-success" : "text-danger" }}">{{ $ls->TheLoai == "refund" ? "+" : "-" }}₫{{ number_format($ls->SoTien) }}</span>
                                </div>
                            </div>
                        </div>
                        @endforeach
                        @endif
                        @endforeach
                    </div>

                    <div class="tab-pane fade" id="that-bai">
                        @foreach ($lichSu as $thang => $giaoDichThang)
                        @php
                        $giaoDichThatBai = $giaoDichThang->filter(fn($gd) => $gd->TrangThai == "thatbai");
                        @endphp
                        @if ($giaoDichThatBai->isNotEmpty())
                        <h4>Tháng {{ $thang }}</h4>
                        @foreach ($giaoDichThatBai as $ls)
                        <div class="card cusor-pointer" onclick="href('/vi/chi-tiet-giao-dich/{{ $ls->MaGiaoDich }}')">
                            <div class="card-body info-hisoty-wallet">
                                <div class="img {{ $ls->TheLoai }}">
                                    <img src="/clients/images/icon/{{ $ls->TheLoai == "withdraw" ? "banking" : ($ls->TheLoai == "refund" ? "withdraw" : "wallet") }}.png"
                                        alt="">
                                </div>
                                <div class="info">
                                    <span class="title">{{ $ls->TieuDe }}</span>
                                    <span class="time">{{ $ls->created_at }}</span>
                                </div>
                                <div class="price">
                                    <span
                                        class="{{ $ls->TheLoai == "refund" ? "text-success" : "text-danger" }}">{{ $ls->TheLoai == "refund" ? "+" : "-" }}₫{{ number_format($ls->SoTien) }}</span>
                                </div>
                            </div>
                        </div>
                        @endforeach
                        @endif
                        @endforeach
                    </div>
                </div>
            </div>
        </div>
    </div>
    </div>
</section>
@endsection

@section("js")
<script>
    function href(link) {
        location.href = link;
    }
</script>
@endsection