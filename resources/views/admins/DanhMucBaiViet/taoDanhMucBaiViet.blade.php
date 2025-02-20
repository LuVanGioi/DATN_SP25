@extends("admins.themes")

@section("titleHead")
    <title>Thêm Danh Mục Bài Viết - ADMIN</title>
@endsection

@section("main")
    <div class="container-fluid pt-3">
        <div class="row justify-content-center">
            <div class="col-md-8 col-lg-6">
                <div class="card shadow-sm">
                    <div class="card-header text-center">
                        <h5>THÊM DANH MỤC BÀI VIẾT MỚI</h5>
                    </div>
                    <div class="card-body">
                        <form action="" method="POST" enctype="multipart/form-data">
                            <div class="card-header text-center">
                                <h5>THÊM DANH MỤC BÀI VIẾT MỚI</h5>
                            </div>
                            <div class="mb-3">
                                <label for="title">Tên Danh Mục Bài Viết</label>
                                <input class="form-control" type="text" name="title" id="title"
                                    placeholder="Tên Danh Mục Bài Viết" required>
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
@endsection