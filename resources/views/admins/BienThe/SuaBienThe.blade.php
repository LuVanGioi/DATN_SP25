@extends("admins.themes")

@section("titleHead")
<title>Chỉnh Sửa Biến Thể - ADMIN</title>
@endsection

@section("main")
<div class="page-body">
    <div class="container-fluid pt-3">
        <div class="row">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">
                        <h5>CHỈNH SỬA BIẾN THỂ</h5>
                    </div>
                    <div class="card-body">
                        <form action="{{ route("BienThe.update", $thongTinBienThe->id) }}" class="form theme-form" method="POST">
                            @csrf
                            @method("PUT")
                            <div class="row">
                                <div class="col">
                                    <div class="mb-3">
                                        <label>Tên Biến Thể</label>
                                        <input class="form-control @error(" TenBienThe") is-invalid border-danger @enderror" type="text" name="TenBienThe" placeholder="Tên Biến Thể" value="{{ $thongTinBienThe->TenBienThe }}" required>
                                        @error("TenBienThe")
                                        <p class="text-danger">{{ $message }}</p>
                                        @enderror
                                    </div>
                                </div>

                                <div class="col">
                                    <div class="mb-3">
                                        <label>Giá Trị Biến Thể</label>
                                        @foreach($thongTinGiaTriBienThe as $GiaTriBienThe)
                                        <div class="mb-1">
                                            <input type="hidden" name="ID_GiaTri[]" value="{{ $GiaTriBienThe->id }}">
                                            <input class="form-control @error(" GiaTriBienThe[]") is-invalid border-danger @enderror" type="text" name="GiaTriBienThe[]" placeholder="Nhập Tên Giá Trị" value="{{ $GiaTriBienThe->TenGiaTri }}">
                                            <!-- <form action="{{ route("GiaTriBienThe.destroy", $GiaTriBienThe->id) }}" method="GET" onsubmit="return confirm('Bạn có muốn xóa giá trị này không?'); ">
                                                @csrf
                                                <input type="hidden" name="ID_GiaTri" value="{{ $GiaTriBienThe->id }}">
                                                <button class="btn btn-outline-danger" type="submit"><i class="fal fa-trash"></i></button>
                                            </form> -->
                                            @error("GiaTriBienThe[]")
                                            <p class="text-danger">{{ $message }}</p>
                                            @enderror
                                        </div>
                                        @endforeach
                                        <div id="danhSachNhapGiaTri"></div>

                                        <button type="button" onclick="themNhapGiaTriBienThe()" class="btn btn-sm btn-danger mt-2"><i class="fal fa-plus"></i> Thêm Giá Trị</button>
                                    </div>
                                </div>
                            </div>


                            <div class="row">
                                <div class="col">
                                    <div class="text-end">
                                        <button class="btn btn-primary me-3" type="submit">Cập Nhật</button>
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
        <input class="form-control mt-1 mb-1 @error(" GiaTriBienTheMoi[]") is-invalid border-danger @enderror" type="text" name="GiaTriBienTheMoi[]" placeholder="Giá Trị Biến Thể" value="{{ old("GiaTriBienTheMoi[]") }}">
        `;
    }
</script>
@endsection