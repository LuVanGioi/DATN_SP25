@extends("admins.themes")

@section("titleHead")
<title>Thêm Danh Mục Sản Phẩm - ADMIN</title>
@endsection

@section("main")
<div class="page-body">
    <div class="container-fluid pt-3">
        <div class="row">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">
                        <h5>THÊM DANH MỤC MỚI</h5>
                    </div>
                    <div class="card-body">
                        <form action="{{ route('DanhMuc.store') }}" method="POST" enctype="multipart/form-data">
                            @csrf
                            <div class="mb-3">
                                <label for="ID_DichVuSanPham">Dịch Vụ</label>
                                <select name="ID_DichVuSanPham" class="form-control">
                                    @foreach ($dichVu as $dv)
                                    <option value="{{ $dv->id }}">{{ $dv->TenDichVuSanPham }}</option>
                                    @endforeach
                                </select>
                                @error("ID_DichVuSanPham")
                                <p class="text-danger">{{ $message }}</p>
                                @enderror
                            </div>

                            <div class="mb-3">
                                <label for="TenDanhMucSanPham">Tên Danh Mục Sản Phẩm </label>
                                <input
                                    class="form-control @error(" TenDanhMucSanPham") is-invalid border-danger @enderror"
                                    type="text" name="TenDanhMucSanPham" id="TenDanhMucSanPham"
                                    placeholder="Tên Danh Mục Sản Phẩm" value="{{ old("TenDanhMucSanPham")}}">
                                @error("TenDanhMucSanPham")
                                <p class="text-danger">{{ $message }}</p>
                                @enderror
                            </div>

                            <div class="row">
                                <div class="col">
                                    <div class="mb-3">
                                        <a href="/admin/DanhMuc" class="btn btn-sm btn-light">Quay Lại</a>
                                    </div>
                                </div>
                                <div class="col">
                                    <div class="text-end">
                                        <button class="btn btn-primary me-3" type="submit">Thêm Ngay</button>
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