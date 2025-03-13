@extends("admins.themes")

@section("titleHead")
<title>Chi Tiết Liên Kết Website - ADMIN</title>
@endsection

@section("main")
<div class="page-body">
    <div class="container-fluid pt-3">
        <div class="card">
            <div class="card-header">
                <h5>THÔNG TIN LIÊN KẾT WEBSITE</h5>
            </div>
            <div class="card-body">
                    <div class="row">
                        <div class="col">
                            <div class="mb-3">
                                <label>Tiêu Đề</label>
                                <input class="form-control" type="text" placeholder="Tiêu Đề Liên Kết" value="{{ $thongTinLienKet->TieuDe }}" readonly>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col">
                            <div class="mb-3">
                                <label>Nội Dung</label>
                                <div class="form-control">{!! $thongTinLienKet->NoiDung !!}</div>
                            </div>
                        </div>
                    </div>
                    <a href="{{ route("LienKetWebsite.index") }}" class="btn btn-sm btn-danger">Quay Lại</a>
            </div>
        </div>
    </div>
</div>
@endsection