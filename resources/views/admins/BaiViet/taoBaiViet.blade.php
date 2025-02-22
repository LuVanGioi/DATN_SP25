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
                        <form action="{{ route('BaiViet.store') }}" method="POST" enctype="multipart/form-data">
                            @csrf
                            <div class="mb-3">
                                <label for="hinh_anh">Hình Ảnh</label>
                                <input class="form-control" type="file" name="hinh_anh" id="hinh_anh" required>
                            </div>
                            <div class="mb-3">
                                <label for="tieu_de">Tiêu Đề</label>
                                <input class="form-control" type="text" name="tieu_de" id="tieu_de" placeholder="Tiêu Đề" required>
                            </div>
                            <div class="mb-3">
                                <label for="danh_muc_id">Danh Mục</label>
                                <select class="form-control" name="danh_muc_id" id="danh_muc_id" required>
                                    <option value="">Chọn danh mục</option>
                                    @foreach($danhMuc as $dm)
                                        <option value="{{ $dm->id }}">{{ $dm->TenDanhMucBaiViet }}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="mb-3">
                                <label for="tac_gia">Tác Giả</label>
                                <input class="form-control" type="text" name="tac_gia" id="tac_gia" placeholder="Tác Giả" required>
                            </div>
                            <div class="mb-3">
                                <label for="noi_dung">Nội Dung</label>
                                <textarea class="form-control" name="noi_dung" id="noi_dung" rows="5" required></textarea>
                            </div>
                            <div class="mb-3">
                                <label for="ngay_dang">Ngày Đăng</label>
                                <input class="form-control" type="date" name="ngay_dang" id="ngay_dang" required>
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