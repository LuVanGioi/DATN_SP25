@extends("clients.themes")

@section("title")
<title>Thông Tin Ví - {{ $caiDatWebsite->TenCuaHang }}</title>
@endsection

@section('main')
<section class="page-section">
    <div class="wrap container">
        <div class="row">
            <div class="col-md-12">
                <div class="row m-0">
                    <div class="col-md-12" style="margin-top: 0px !important;">
                        <div class="card">
                            <div class="card-body text-center">
                                <h1 class="text-success" id="soDuVi">₫{{ number_format(Auth::user()->price) }}</h1>
                                <h5>Số Dư Ví</h5>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-4" style="margin-top: 0px !important;">
                        <a href="{{ route("vi.NapTien") }}">
                            <div class="wallet-DATN add">
                                <div class="img"><img src="/clients/images/icon/wallet-add.png" alt=""></div>
                                <span>Nạp Tiền</span>
                            </div>
                        </a>
                    </div>
                    <div class="col-md-4" style="margin-top: 0px !important;">
                        <a href="{{ route("vi.RutTien") }}">
                            <div class="wallet-DATN withdraw">
                                <div class="img"><img src="/clients/images/icon/wallet-withdraw.png" alt=""></div>
                                <span>Rút Tiền</span>
                            </div>
                        </a>
                    </div>

                    <div class="col-md-4" style="margin-top: 0px !important;">
                        <a href="{{ route("vi.LichSu") }}">
                            <div class="wallet-DATN withdraw">
                                <div class="img"><img src="/clients/images/icon/wallet-history.png" alt=""></div>
                                <span>Lịch Sử Giao Dịch</span>
                            </div>
                        </a>
                    </div>

                    <div class="col-md-12">
                        <span onclick="history.back();" class="btn btn-theme-dark">Quay Lại</span>
                    </div>
                </div>
            </div>
        </div>
    </div>
    </div>
</section>
@endsection