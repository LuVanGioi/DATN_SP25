@extends("admins.themes")

@section("titleHead")
<title>Sửa Thương Hiệu Sản Phẩm - ADMIN</title>
@endsection

@section("main")
<div class="page-body">
    <div class="container-fluid pt-3">
        <div class="row">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">
                        <h5>SỬA THƯƠNG HIỆU</h5>
                    </div>
                    <div class="card-body">
                        <form action="{{ route("ThuongHieu.update", $thongTin->id) }}" class="form theme-form" method="POST">
                            @csrf
                            @method("PUT")
                            <div class="row">
                                <div class="col">
                                    <div class="mb-3">
                                        <label>Tên Thương Hiệu</label>
                                        <input class="form-control @error("TenThuongHieu") is-invalid border-danger @enderror" type="text" name="TenThuongHieu" placeholder="Tên Chất Liệu" value="{{ $thongTin->TenThuongHieu }}" required>
                                        @error("TenThuongHieu")
                                        <p class="text-danger">{{ $message }}</p>
                                        @enderror
                                    </div>
                                </div>
                            </div>


                            <div class="row">
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