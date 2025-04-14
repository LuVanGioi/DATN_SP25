@extends("admins.themes")

@section("titleHead")
<title>Chỉnh Sửa Biến Thể - ADMIN</title>
@endsection

@section("main")
<div class="page-body">
    <div class="container-fluid pt-3">
        @if (session('success'))
        <div class="alert alert-success fade show" role="alert">
            <p>{{ session('success') }}</p>
        </div>
        @endif

        @if (session('error'))
        <div class="alert alert-danger fade show" role="alert">
            <p>{{ session('error') }}</p>
        </div>
        @endif
        <div class="row">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">
                        <h5>CHỈNH SỬA BIẾN THỂ <b class="text-primary">{{ $thongTinBienThe->TenBienThe }}</b></h5>
                    </div>
                    <div class="card-body">
                        <form action="{{ route("BienThe.update", $thongTinBienThe->id) }}" class="form theme-form" method="POST">
                            @csrf
                            @method("PUT")
                            <div class="row">

                                <div class="col">
                                    <div class="mb-3">
                                        <label>Giá Trị Biến Thể</label>
                                        @if ($thongTinBienThe->id == 1)
                                        @foreach($thongTinKichCo as $kichCo)
                                        <div class="mb-1">
                                            <input type="hidden" name="ID_GiaTri[]" value="{{ $kichCo->id }}">
                                            <input class="form-control @error(" GiaTriBienThe[]") is-invalid border-danger @enderror" type="text" name="GiaTriBienThe[]" placeholder="Nhập Tên Giá Trị" value="{{ $kichCo->TenKichCo }}">
                                            @error("GiaTriBienThe[]")
                                            <p class="text-danger">{{ $message }}</p>
                                            @enderror
                                        </div>
                                        @endforeach
                                        @else
                                        @foreach($thongTinMauSac as $MauSac)
                                        <div class="mb-1">
                                            <input type="hidden" name="ID_GiaTri[]" value="{{ $MauSac->id }}">
                                            <input class="form-control @error(" GiaTriBienThe[]") is-invalid border-danger @enderror" type="text" name="GiaTriBienThe[]" placeholder="Nhập Tên Giá Trị" value="{{ $MauSac->TenMauSac }}">
                                            @error("GiaTriBienThe[]")
                                            <p class="text-danger">{{ $message }}</p>
                                            @enderror
                                        </div>
                                        @endforeach
                                        @endif
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
        form.insertAdjacentHTML('beforeend', `
        <input class="form-control mt-1 mb-1 @error(" GiaTriBienTheMoi[]") is-invalid border-danger @enderror" type="text" name="GiaTriBienTheMoi[]" placeholder="Giá Trị Biến Thể" value="{{ old("GiaTriBienTheMoi[]") }}">
        @error("GiaTriBienTheMoi[]")
        <p class="text-danger">{{ $message }}</p>
        @enderror
        `);
    }
</script>
@endsection