@extends("admins.themes")

@section("titleHead")
<title>Thêm Phương Thức Liên Hệ - ADMIN</title>
@endsection

@section("main")
<div class="page-body">
    <div class="container-fluid pt-3">
        <div class="row">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">
                        <h5>THÊM PHƯƠNG THỨC</h5>
                    </div>
                    <div class="card-body">
                        <form action="{{ route("ThongTinLienHe.store") }}" class="form theme-form" method="POST">
                            @csrf
                            <div class="row">
                                <div class="col">
                                    <div class="mb-3">
                                        <label>Tên Phương Thức</label>
                                        <input class="form-control @error("TenPhuongThuc") is-invalid border-danger @enderror" type="text" name="TenPhuongThuc" placeholder="Tên Phương Thức" value="{{ old("TenPhuongThuc") }}" >
                                        @error("TenPhuongThuc")
                                        <p class="text-danger">{{ $message }}</p>
                                        @enderror
                                    </div>
                                </div>

                                <div class="col">
                                    <div class="mb-3">
                                        <label>Đường Dẫn</label>
                                        <input class="form-control @error("DuongDan") is-invalid border-danger @enderror" type="text" name="DuongDan" placeholder="Liên Kết Đường Dẫn" value="{{ old("DuongDan") }}" required>
                                        @error("DuongDan")
                                        <p class="text-danger">{{ $message }}</p>
                                        @enderror
                                    </div>
                                </div>
                            </div>


                            <div class="row">
                                <div class="col">
                                    <div class="text-end">
                                        <button class="btn btn-primary me-3" type="submit">Thêm Ngay</button>
                                        <button class="btn btn-secondary" type="reset">Đặt Lại</button>
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