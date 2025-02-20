@extends("admins.themes")

@section("titleHead")
    <title>Danh Mục Bài viết - ADMIN</title>
@endsection

@section('main')
    <div class="page-body">
        <div class="container-fluid pt-3">
            <div class="card">
                <div class="card-header d-flex justify-content-between align-items-center">
                    <h5>DANH MỤC BÀI VIẾT</h5>
                    <div class="d-flex">
                        <input type="text" class="form-control me-2" placeholder="Tìm kiếm danh mục bài viết... 🔎"
                            style="max-width: 300px;">
                        <a href="/admin/DanhMucBaiViet/create" class="btn btn-success btn-sm">Thêm Danh Mục Bài Viết</a>
                    </div>
                </div>
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table table-hover table-striped">
                            <thead class="table-dark">
                                <tr>
                                    <th>#</th>
                                    <th>Danh Mục Bài Viết</th>
                                    <th>Thao Tác</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td>1</td>
                                    <td>Tin Thể Thao</td>
                                    <td>
                                        <a href="/admin/DanhMucBaiViet/{{ "1234" }}/edit" class="btn btn-primary btn-sm">Sửa</a>
                                        <form action="/admin/DanhMucBaiViet/{{ "1234" }}" method="POST" class="d-inline"
                                            onsubmit="return confirm('Bạn có muốn xóa không?');">
                                            @csrf
                                            @method("DELETE")
                                            <button type="submit" class="btn btn-danger btn-sm">Xóa</button>
                                        </form>
                                    </td>
                                </tr>
                                <tr>
                                    <td>2</td>
                                    <td>Tin trong nước và quốc tế</td>
                                    <td>
                                        <a href="/admin/DanhMucBaiViet/{{ "1234" }}/edit" class="btn btn-primary btn-sm">Sửa</a>
                                        <form action="/admin/DanhMucBaiViet/{{ "1234" }}" method="POST" class="d-inline"
                                            onsubmit="return confirm('Bạn có muốn xóa không?');">
                                            @csrf
                                            @method("DELETE")
                                            <button type="submit" class="btn btn-danger btn-sm">Xóa</button>
                                        </form>
                                    </td>
                                </tr>
                                <tr>
                                    <td>3</td>
                                    <td>Tin công nghệ</td>
                                    <td>
                                        <a href="/admin/DanhMucBaiViet/{{ "1234" }}/edit" class="btn btn-primary btn-sm">Sửa</a>
                                        <form action="/admin/DanhMucBaiViet/{{ "1234" }}" method="POST" class="d-inline"
                                            onsubmit="return confirm('Bạn có muốn xóa không?');">
                                            @csrf
                                            @method("DELETE")
                                            <button type="submit" class="btn btn-danger btn-sm">Xóa</button>
                                        </form>
                                    </td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                    <div class="d-flex justify-content-end mt-3">
                        <nav>
                            <ul class="pagination">
                                <li class="page-item disabled"><a class="page-link" href="#">Trước</a></li>
                                <li class="page-item active"><a class="page-link" href="#">1</a></li>
                                <li class="page-item"><a class="page-link" href="#">2</a></li>
                                <li class="page-item"><a class="page-link" href="#">3</a></li>
                                <li class="page-item"><a class="page-link" href="#">Sau</a></li>
                            </ul>
                        </nav>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection