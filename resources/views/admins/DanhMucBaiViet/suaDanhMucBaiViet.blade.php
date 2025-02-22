@extends("admins.themes")

@section("titleHead")
<title>Sửa Danh Mục Bài Viết - ADMIN</title>
@endsection

@section("main")
<div class="container-fluid pt-3">
    <div class="row justify-content-center">
        <div class="col-md-8 col-lg-6">
            <div class="card shadow-sm">
                <div class="card-header text-center">
                    <h5>SỬA DANH MỤC BÀI VIẾT</h5>
                </div>
                <div class="card-body">
                    <form action="{{ route('DanhMucBaiViet.update', $danhMuc->id) }}" method="POST"
                        enctype="multipart/form-data">
                        @csrf
                        @method('PUT')
                        <div class="mb-3">
                            <label for="TenDanhMucBaiViet">Tên Danh Mục Bài Viết</label>
                            <input class="form-control" type="text" name="TenDanhMucBaiViet" id="TenDanhMucBaiViet"
                                value="{{ $danhMuc->TenDanhMucBaiViet }}" required>
                        </div>

                        <div class="row">
                            <div class="col">
                                <div class="mb-3">
                                    <a href="/admin/DanhMucBaiViet" class="btn btn-sm btn-dark">Quay Lại</a>
                                </div>
                            </div>

                            <div class="col">
                                <div class="text-end">
                                    <button class="btn btn-primary me-3" type="submit">Cập Nhật</button>
                                </div>
                            </div>
                        </div>

                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection