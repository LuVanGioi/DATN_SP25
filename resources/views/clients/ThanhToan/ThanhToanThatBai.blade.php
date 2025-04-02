@extends("clients.themes")

@section("title")
<title>Thanh Toán Thất Bại - {{ $caiDatWebsite->TenCuaHang }}</title>
@endsection

@section('main')
<section class="page-section">
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="invoice">
                    <div class="icon"><i class="fas fa-times text-danger"></i></div>
                    <div class="title">Thanh Toán Thất Bại</div>
                    <div class="d-block mt-3">
                        <a href="{{ route("home.client") }}" class="btn btn-theme btn-theme-dark">Quay Về Trang Chủ</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
@endsection