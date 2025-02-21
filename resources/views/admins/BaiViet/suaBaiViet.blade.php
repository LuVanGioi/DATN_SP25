@extends("admins.themes")

@section("titleHead")
    <title>Sửa Bài Viết - ADMIN</title>
@endsection

@section("main")
    <div class="container-fluid pt-3">
        <div class="row justify-content-center">
            <div class="col-md-8 col-lg-6">
                <div class="card shadow-sm">
                    <div class="card-header text-center">
                        <h5>SỬA BÀI VIẾT</h5>
                    </div>
                    <div class="card-body">
                        <form action="" method="POST" enctype="multipart/form-data">
                            <div class="card-header text-center">
                                <h5>SỬA BÀI VIẾT</h5>
                            </div>
                            <div class="mb-3">
                                <label>Hình Ảnh</label>
                                <div>
                                    <img class="img-fluid"
                                        src="https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcSMzusCp2hUNtwjDEwynboK6kw2GyJejpeTgg&s"
                                        alt="Hình ảnh bài viết">
                                </div>
                            </div>
                            <div class="mb-3">
                                <label for="title">Tiêu Đề</label>
                                <input class="form-control" type="text" name="title" id="title" placeholder="Bài viết mẫu"
                                    required>
                            </div>
                            <div class="mb-3">
                                <label for="category">Danh Mục</label>
                                <select class="form-control" name="category" id="category" required>
                                    <option value="">Chọn danh mục</option>
                                    <option value="tin-tuc">Tin Tức</option>
                                    <option value="su-kien">Sự Kiện</option>
                                    <option value="cong-nghe">Công Nghệ</option>
                                    <option value="giao-duc">Giáo Dục</option>
                                    <option value="giao-duc">Kinh Tế</option>
                                    <option value="giao-duc">Giao Thông</option>
                                </select>
                            </div>
                            <div class="mb-3">
                                <label for="author">Tác Giả</label>
                                <input class="form-control" type="text" name="author" id="author" placeholder="Nguyễn Văn A"
                                    required>
                            </div>
                            <div class="mb-3">
                                <label for="publish_date">Ngày Đăng</label>
                                <input class="form-control" type="date" name="publish_date" id="publish_date" required>
                            </div>
                            <div class="text-end">
                                <button class="btn btn-primary me-3" type="submit">Cập Nhật</button>
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