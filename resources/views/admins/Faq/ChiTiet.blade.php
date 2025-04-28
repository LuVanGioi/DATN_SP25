@extends("admins.themes")

@section("titleHead")
<title>FAQ - ADMIN</title>
@endsection

@section("main")
<div class="page-body">
    <div class="container-fluid pt-3">
        <div class="card">
            <div class="card-header">
                <h5>THÔNG TIN CHI TIẾT</h5>
            </div>
            <div class="card-body">
                    <div class="row">
                        <div class="col">
                            <div class="mb-3">
                                <label>Câu hỏi</label>
                                <input class="form-control" type="text" placeholder="Câu hỏi" value="{{ $thongTinLienKet->TieuDe }}" readonly>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col">
                            <div class="mb-3">
                                <label>Giải đáp</label>
                                <div class="form-control">{!! $thongTinLienKet->NoiDung !!}</div>
                            </div>
                        </div>
                    </div>
                    <a href="{{ route("FAQ.index") }}" class="btn btn-sm btn-danger">Quay Lại</a>
            </div>
        </div>
    </div>
</div>
@endsection