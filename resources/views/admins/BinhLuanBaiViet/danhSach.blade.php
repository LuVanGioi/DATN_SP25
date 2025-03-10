@extends("admins.themes")

@section("titleHead")
    <title>Danh Sách Bình Luận Bài Viết - ADMIN</title>
@endsection

@section('main')
    <div class="page-body">
        <div class="container-fluid pt-3">
            <div class="card">
                <div class="card-header d-flex justify-content-between align-items-center">
                    <h5>QUẢN LÝ BÌNH LUẬN</h5>
                    <div class="text-end">
                        <a href="#" class="btn btn-dark btn-sm">Thùng Rác</a>
                    </div>
                </div>
                <div class="card-body">
                    <div class="table-responsive dt-responsive">
                        <div id="dom-jqry_wrapper" class="dataTables_wrapper dt-bootstrap5">
                            <table class="table table-striped table-bordered nowrap dataTable">
                                <thead>
                                    <tr>
                                        <th>#</th>
                                        <th>ID Bài Viết</th>
                                        <th>ID Tài Khoản</th>
                                        <th>Nội Dung</th>
                                        <th>Ngày Bình Luận</th>
                                        <th>Thao Tác</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr>
                                        <td>1</td>
                                        <td>101</td>
                                        <td>202</td>
                                        <td>Bình luận mẫu 1</td>
                                        <td>07/03/2025</td>
                                        <td>
                                            <a href="{{ route('BinhLuanBaiViet.edit', 1234) }}"
                                                class="btn btn-primary btn-sm">Sửa</a>
                                            <button class="btn btn-danger btn-sm">Xóa</button>
                                            <button class="btn btn-warning btn-sm">Chặn</button>
                                            <button class="btn btn-secondary btn-sm">Cảnh Báo</button>
                                            <a href="{{ route('BinhLuanBaiViet.show', 1234) }}"
                                                class="btn btn-info btn-sm">Xem Chi Tiết</a>
                                            <button class="btn btn-success btn-sm">Phê Duyệt</button>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>2</td>
                                        <td>102</td>
                                        <td>203</td>
                                        <td>Bình luận mẫu 2</td>
                                        <td>08/03/2025</td>
                                        <td>
                                            <a href="{{ route('BinhLuanBaiViet.edit', 1234) }}"
                                                class="btn btn-primary btn-sm">Sửa</a>
                                            <button class="btn btn-danger btn-sm">Xóa</button>
                                            <button class="btn btn-warning btn-sm">Chặn</button>
                                            <button class="btn btn-secondary btn-sm">Cảnh Báo</button>
                                            <a href="{{ route('BinhLuanBaiViet.show', 1234) }}"
                                                class="btn btn-info btn-sm">Xem Chi Tiết</a>
                                            <button class="btn btn-success btn-sm">Phê Duyệt</button>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>3</td>
                                        <td>103</td>
                                        <td>204</td>
                                        <td>Bình luận mẫu 3</td>
                                        <td>09/03/2025</td>
                                        <td>
                                            <a href="{{ route('BinhLuanBaiViet.edit', 1234) }}"
                                                class="btn btn-primary btn-sm">Sửa</a>
                                            <button class="btn btn-danger btn-sm">Xóa</button>
                                            <button class="btn btn-warning btn-sm">Chặn</button>
                                            <button class="btn btn-secondary btn-sm">Cảnh Báo</button>
                                            <a href="{{ route('BinhLuanBaiViet.show', 1234) }}"
                                                class="btn btn-info btn-sm">Xem Chi Tiết</a>
                                            <button class="btn btn-success btn-sm">Phê Duyệt</button>
                                        </td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection