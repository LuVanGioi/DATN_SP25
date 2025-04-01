@extends("clients.themes")

@section("title")
<title>Thanh Toán Thành Công - {{ $caiDatWebsite->TenCuaHang }}</title>
@endsection

@section('main')
<section class="page-section">
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="invoice">
                    <div class="icon"><i class="fas fa-check"></i></div>
                    <div class="title">Thành Công</div>
                    <div class="note">Vui lòng chú ý Email và Số điện thoại để nhận thông báo về đơn hàng</div>
                    <div class="d-block mt-3"><a href="{{ route("home.client") }}" class="btn btn-theme btn-theme-dark">Quay Về Trang Chủ</a></div>
                </div>
            </div>
        </div>
    </div>
</section>
@endsection