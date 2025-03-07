@extends("admins.themes")

@section("titleHead")
    <title>Thêm Danh Mục Bài Viết - ADMIN</title>
@endsection

@section("main")
<div class="page-body">
    <div class="container-fluid pt-3">
        <div class="row ">
            <div class="col-md-8">
                <div class="card shadow-sm">
                    <div class="card-header">
                        <h5>THÊM DANH MỤC BÀI VIẾT MỚI</h5>
                    </div>
                    <div class="card-body">
                        <form action="{{ route('DanhMucBaiViet.store') }}" method="POST" enctype="multipart/form-data">
                            @csrf
                            <div class="mb-3">
                                <label for="TenDanhMucBaiViet">Tên Danh Mục Bài Viết</label>
                                <input class="form-control @error("TenDanhMucBaiViet") is-invalid border-danger @enderror"
                                    type="text" name="TenDanhMucBaiViet" id="TenDanhMucBaiViet"
                                    placeholder="Tên Danh Mục Bài Viết" value="{{ old('TenDanhMucBaiViet') }}">
                                @error("TenDanhMucBaiViet")
                                    <p class="text-danger">{{ $message }}</p>
                                @enderror
                            </div>
                            <div class="text-end">
                                <button class="btn btn-primary me-3" type="submit">Thêm Ngay</button>
                                <button class="btn btn-secondary" type="reset">Đặt Lại</button>
                            </div>
                        </form>

                        <div class="row">
                            <div class="col">
                                <div class="mb-3">
                                    <a href="/admin/DanhMucBaiViet" class="btn btn-sm btn-light">Quay Lại</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    </div>
@endsection