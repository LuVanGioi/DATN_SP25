@extends("admins.themes")

@section("titleHead")
<title>Sửa Môn Thể Thao - ADMIN</title>
@endsection

@section("main")
<div class="page-body">
    <div class="container-fluid pt-3">
        <div class="row">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">
                        <h5>SỬA MÔN THỂ THAO</h5>
                    </div>
                    <div class="card-body">
                        <form action="{{ route('DichVu.update', $thongTinDichVu->id) }}" method="POST" enctype="multipart/form-data">
                            @csrf
                            @method("PUT")
                            <div class="mb-3">
                                <label for="TenDichVuSanPham">Tên Môn Thể Thao</label>
                                <input
                                    class="form-control @error(" TenDichVuSanPham") is-invalid border-danger @enderror"
                                    type="text" name="TenDichVuSanPham" id="TenDichVuSanPham"
                                    placeholder="Tên Dịch Vụ Sản Phẩm" value="{{ $thongTinDichVu->TenDichVuSanPham }}" required>
                                @error("TenDichVuSanPham")
                                <p class="text-danger">{{ $message }}</p>
                                @enderror
                            </div>

                            <div class="row">
                                <div class="col">
                                    <div class="mb-3">
                                        <a href="{{ route("DichVu.index") }}" class="btn btn-sm btn-light">Quay Lại</a>
                                    </div>
                                </div>
                                <div class="col">
                                    <div class="text-end">
                                        <button class="btn btn-primary me-3" type="submit">Cập Nhật</button>
                                    </div>
                                </div>
                            </div>
                        </form>

                        <div class="row">

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection