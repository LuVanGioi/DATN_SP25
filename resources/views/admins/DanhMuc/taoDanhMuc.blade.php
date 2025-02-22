@extends("admins.themes")

@section("titleHead")
    <title>Thêm Danh Mục Sản Phẩm - ADMIN</title>
@endsection

@section("main")
 <div class="page-body">
    <div class="container-fluid pt-3">
        <div class="row">
            <div class="col-md-8 col-lg-6">
                <div class="card shadow-sm">
                    <div class="card-header">
                        <h5>THÊM DANH MỤC MỚI</h5>
                    </div>
                    <div class="card-body">
                        <form action="{{ route('DanhMuc.store') }}" method="POST" enctype="multipart/form-data">
                            @csrf
                            <div class="mb-3">
                                <label for="TenDanhMucSanPham">Tên Danh Mục Sản Phẩm </label>
                                <input class="form-control" type="text" name="TenDanhMucSanPham" id="TenDanhMucSanPham"
                                    placeholder="Tên Danh Mục Sản Phẩm" required>
                            </div>
                            <div class="text-end">
                                <button class="btn btn-primary me-3" type="submit">Thêm Ngay</button>
                                <button class="btn btn-secondary" type="reset">Đặt Lại</button>
                            </div>
                        </form>

                        <div class="row">
                            <div class="col">
                                <div class="mb-3">
                                    <a href="/admin/DanhMuc" class="btn btn-sm btn-light">Quay Lại</a>
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