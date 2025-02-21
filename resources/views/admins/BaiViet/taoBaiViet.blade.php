@extends("admins.themes")

@section("titleHead")
    <title>Thêm Bài Viết - ADMIN</title>
@endsection

@section("main")
    <div class="container-fluid pt-3">
        <div class="row justify-content-center">
            <div class="col-md-8 col-lg-6">
                <div class="card shadow-sm">
                    <div class="card-header text-center">
                        <h5>THÊM BÀI VIẾT MỚI</h5>
                    </div>
                    <div class="card-body">
                        <form action="" method="POST" enctype="multipart/form-data">
                            <div class="card-header text-center">
                                <h5>THÊM BÀI VIẾT MỚI</h5>
                            </div>
                            <div class="mb-3">
                                <label for="image">Hình Ảnh</label>
                                <input class="form-control" type="file" name="image" id="image" required>
                            </div>
                            <div class="mb-3">
                                <label for="title">Tiêu Đề</label>
                                <input class="form-control" type="text" name="title" id="title" placeholder="Tiêu Đề"
                                    required>
                            </div>
                            <div class="mb-3">
                                <label for="category">Danh Mục</label>
                                <select class="form-control" name="category" id="category" required>
                                    <option value="">Chọn danh mục</option>
                                    <option value="tin-tuc">Tin Tức</option>
                                    <option value="su-kien">Sự Kiện</option>
                                </select>
                            </div>
                            <div class="mb-3">
                                <label for="author">Tác Giả</label>
                                <input class="form-control" type="text" name="author" id="author" placeholder="Tác Giả"
                                    required>
                            </div>
                            <div class="mb-3">
                                <label for="publish_date">Ngày Đăng</label>
                                <input class="form-control" type="date" name="publish_date" id="publish_date" required>
                            </div>
                            <div class="text-end">
                                <button class="btn btn-primary me-3" type="submit">Thêm Ngay</button>
                                <button class="btn btn-secondary" type="reset">Đặt Lại</button>
                            </div>
                        </form>

                        <div class="row">
                            <div class="col">
                                <div class="mb-3">
                                    <a href="/admin/BaiViet" class="btn btn-sm btn-light">Quay Lại</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection