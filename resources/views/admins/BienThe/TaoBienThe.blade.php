@extends("admins.themes")

@section("titleHead")
<title>Thêm Biến Thể Sản Phẩm - ADMIN</title>
@endsection

@section("main")
<div class="page-body">
    <div class="container-fluid pt-3">
        <div class="row">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">
                        <h5>THÊM BIẾN THỂ</h5>
                    </div>
                    <div class="card-body">
                        <form action="{{ route("BienThe.store") }}" class="form theme-form" method="POST">
                            @csrf
                            <div class="row">
                                <div class="col">
                                    <div class="mb-3">
                                        <label>Tên Biến Thể</label>
                                        <input class="form-control @error("TenBienThe") is-invalid border-danger @enderror" type="text" name="TenBienThe" placeholder="Tên Biến Thể" value="{{ old("TenBienThe") }}" required>
                                        @error("TenBienThe")
                                        <p class="text-danger">{{ $message }}</p>
                                        @enderror
                                    </div>
                                </div>

                                <div class="col">
                                    <div class="mb-3">
                                        <label>Giá Trị Biến Thể</label>

                                        <input class="form-control @error("GiaTriBienThe[]") is-invalid border-danger @enderror" type="text" name="GiaTriBienThe[]" placeholder="Giá Trị Biến Thể" value="{{ old("GiaTriBienThe[]") }}" required>
                                        @error("GiaTriBienThe[]")
                                        <p class="text-danger">{{ $message }}</p>
                                        @enderror
                                        <div id="danhSachNhapGiaTri"></div>

                                        <button type="button" onclick="themNhapGiaTriBienThe()" class="btn btn-sm btn-danger mt-2"><i class="fal fa-plus"></i> Thêm Giá Trị</button>
                                    </div>
                                </div>
                            </div>


                            <div class="row">
                                <div class="col">
                                    <div class="text-end">
                                        <button class="btn btn-primary me-3" type="submit">Thêm Ngay</button>
                                        <a class="btn btn-secondary" href="{{ route("BienThe.index") }}">Quay Lại</a>
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

@section("js")
<script>
    function themNhapGiaTriBienThe() {
        var form = document.getElementById("danhSachNhapGiaTri");
        form.innerHTML += `
        <input class="form-control mt-1 mb-1 @error(" GiaTriBienThe[]") is-invalid border-danger @enderror" type="text" name="GiaTriBienThe[]" placeholder="Giá Trị Biến Thể" value="{{ old("GiaTriBienThe[]") }}">
        `;
    }
</script>
@endsection