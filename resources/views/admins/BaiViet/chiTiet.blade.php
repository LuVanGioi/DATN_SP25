@extends("admins.themes")

@section("titleHead")
    <title>Chi Tiết Bài Viết - ADMIN</title>
@endsection

@section("main")
    <div class="page-body">
        <div class="container-fluid pt-3">
            <div class="row">
                <div class="col-md-8">
                    <div class="card">
                        <div class="card-header">
                            <h5>THÔNG TIN BÀI VIẾT: <b>{{ $baiViet->id }}</b></h5>
                        </div>
                        <div class="card-body">
                            <div class="row">
                                <div class="col">
                                    <div class="mb-3">
                                        <img src="{{ asset('storage/' . $baiViet->hinh_anh) }}" class="img-fluid rounded"
                                            alt="">
                                    </div>
                                </div>
                            </div>

                            <div class="row">
                                <div class="col">
                                    <div class="mb-3">
                                        <label>Tiêu Đề</label>
                                        <input class="form-control" type="text" value="{{ $baiViet->tieu_de }}" readonly>
                                    </div>
                                </div>
                            </div>

                            <div class="row">
                                <div class="col">
                                    <div class="mb-3">
                                        <label>Danh Mục</label>
                                        <input class="form-control" type="text" value="{{ $baiViet->danh_muc_id }}"
                                            readonly>
                                    </div>
                                </div>
                            </div>

                            <div class="row">
                                <div class="col">
                                    <div class="mb-3">
                                        <label>Tác Giả</label>
                                        <input class="form-control" type="text" value="{{ $baiViet->tac_gia }}" readonly>
                                    </div>
                                </div>
                            </div>

                            <div class="row">
                                <div class="col">
                                    <div class="mb-3">
                                        <label>Ngày Đăng</label>
                                        <input class="form-control" type="text"
                                            value="{{ \Carbon\Carbon::parse($baiViet->ngay_dang)->format('d/m/Y') }}"
                                            readonly>
                                    </div>
                                </div>
                            </div>

                            <div class="row">
                                <div class="col">
                                    <div class="mb-3">
                                        <label>Nội Dung</label>
                                        <textarea class="form-control" rows="5" readonly>{{ $baiViet->noi_dung }}</textarea>
                                    </div>
                                </div>
                            </div>

                            <div class="row">
                                <div class="col">
                                    <div class="mb-3">
                                        <a href="{{ route('BaiViet.index') }}" class="btn btn-sm btn-light">Quay Lại</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="col-md-4">
                    <div class="card">
                        <div class="card-header">
                            <h5>BÀI VIẾT LIÊN QUAN</h5>
                        </div>
                        <div class="card-body">
                            <ul class="list-group">
                                @foreach($baiVietLienQuan as $bai)
                                    <a class="list-group-item list-group-item-action"
                                        href="{{ route('baiViet.show', $bai->id) }}">
                                        <img class="rounded-circle" src="{{ asset('storage/' . $bai->hinh_anh) }}" alt=""
                                            style="width: 30px; height: 30px;"> {{ $bai->tieu_de }}
                                    </a>
                                @endforeach
                            </ul>
                        </div>
                    </div>

                    <div class="card">
                        <div class="card-header">
                            <h5>THẺ TAG</h5>
                        </div>
                        <div class="card-body">
                            <span class="badge bg-primary">Tin tức</span>
                            <span class="badge bg-secondary">Bóng đá</span>
                            <span class="badge bg-success">Công nghệ</span>
                            <span class="badge bg-danger">Thể thao</span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection