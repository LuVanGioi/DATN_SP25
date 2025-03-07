@extends("admins.themes")

@section("titleHead")
    <title>Chỉnh Sửa Bình Luận Bài Viết - ADMIN</title>
@endsection

@section('main')
    <div class="page-body">
        <div class="container-fluid pt-3">
            <div class="card">
                <div class="card-header d-flex justify-content-between align-items-center">
                    <h5>CHI TIẾT BÌNH LUẬN</h5>
                </div>
                <div class="card-body">
                    <form action="#" method="POST">
                        <div class="mb-3">
                            <label class="form-label">ID Bài Viết</label>
                            <input type="text" class="form-control" value="101">
                        </div>

                        <div class="mb-3">
                            <label class="form-label">ID Tài Khoản</label>
                            <input type="text" class="form-control" value="202">
                        </div>

                        <div class="mb-3">
                            <label class="form-label">Nội Dung Bình Luận</label>
                            <textarea class="form-control" rows="4">Bình luận mẫu 1</textarea>
                        </div>

                        <div class="mb-3">
                            <label class="form-label">Ngày Bình Luận</label>
                            <input type="text" class="form-control" value="07/03/2025">
                        </div>

                        <div class="d-flex justify-content-end">
                            <a href="{{ route("BinhLuanBaiViet.index") }}" class="btn btn-danger">Quay Lại</a>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection