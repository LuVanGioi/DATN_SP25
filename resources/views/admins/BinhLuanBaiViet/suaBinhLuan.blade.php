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
                    <form action="{{ route('binhluan.update', $binhLuan->id) }}" method="POST">
                        @csrf
                        @method('PUT')
                        <div class="mb-3">
                            <label class="form-label">ID Bài Viết</label>
                            <input type="text" class="form-control" value="{{ $binhLuan->id_baiviet }}" readonly>
                        </div>

                        <div class="mb-3">
                            <label class="form-label">ID Tài Khoản</label>
                            <input type="text" class="form-control" value="{{ $binhLuan->id_users }}" readonly>
                        </div>

                        <div class="mb-3">
                            <label class="form-label">Nội Dung Bình Luận</label>
                            <textarea class="form-control" name="noi_dung" rows="4">{{ $binhLuan->noi_dung }}</textarea>
                        </div>

                        <div class="mb-3">
                            <label class="form-label">Ngày Bình Luận</label>
                            <input type="text" class="form-control" value="{{ date('d/m/Y', strtotime($binhLuan->ngay_binh_luan)) }}" readonly>
                        </div>

                        <div class="d-flex justify-content-end">
                            <a href="{{ route('binhluan.index') }}" class="btn btn-danger">Quay Lại</a>
                            <button type="submit" class="btn btn-primary ms-2">Lưu Thay Đổi</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection