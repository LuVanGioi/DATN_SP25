@extends("admins.themes")

@section("titleHead")
<title>Sửa Danh Mục - ADMIN</title>
@endsection

@section("main")
<div class="page-body">
    <div class="container-fluid pt-3">
        <div class="row">
            <div class="col-md-8">
                <div class="card shadow-sm">
                    <div class="card-header">
                        <h5>SỬA DANH MỤC</h5>
                    </div>
                    <div class="card-body">
                        <form action="{{ route('DanhMuc.update', $thongTin->id) }}" method="POST"
                            enctype="multipart/form-data">
                            @method("PUT")
                            @csrf
                            <div class="mb-3">
                                <label for="ID_DichVuSanPham">Dịch Vụ</label>
                                <select name="ID_DichVuSanPham" class="form-control" required>
                                    @foreach ($dichVu as $dv)
                                    <option value="{{ $dv->id }}" {{ ($dv->id == $thongTin->ID_DichVuSanPham ? "selected" : "") }}>{{ $dv->TenDichVuSanPham }}</option>
                                    @endforeach
                                </select>
                                @error("ID_DichVuSanPham")
                                <p class="text-danger">{{ $message }}</p>
                                @enderror
                            </div>

                            <div class="mb-3">
                                <label for="TenDanhMucSanPham">Tên Danh Mục</label>
                                <input
                                    class="form-control @error(" TenDanhMucSanPham") is-invalid border-danger @enderror"
                                    type="text" name="TenDanhMucSanPham" id="TenDanhMucSanPham"
                                    placeholder="Quần dài thể thao" value="{{ $thongTin->TenDanhMucSanPham }}" required>
                                @error("TenDanhMucSanPham")
                                <p class="text-danger">{{ $message }}</p>
                                @enderror
                            </div>
                            <div class="row">
                                <div class="col">
                                    <div class="mb-3">
                                        <a href="{{ route('DanhMuc.index') }}" class="btn btn-sm btn-light">Quay Lại</a>
                                    </div>
                                </div>
                                <div class="col">
                                    <div class="text-end">
                                        <button class="btn btn-primary me-3" type="submit">Cập Nhật</button>
                                    </div>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection