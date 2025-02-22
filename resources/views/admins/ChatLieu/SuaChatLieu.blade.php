@extends("admins.themes")

@section("titleHead")
<title>Sửa Chất Liệu Sản Phẩm - ADMIN</title>
@endsection

@section("main")
<div class="page-body">
    <div class="container-fluid pt-3">
        <div class="row">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">
                        <h5>SỬA CHẤT LIỆU</h5>
                    </div>
                    <div class="card-body">
                        <form action="{{ route("ChatLieu.update", $thongTin->id) }}" class="form theme-form" method="POST">
                            @csrf
                            @method("PUT")
                            <div class="row">
                                <div class="col">
                                    <div class="mb-3">
                                        <label>Tên Chất Liệu</label>
                                        <input class="form-control @error("TenChatLieu") is-invalid border-danger @enderror" type="text" name="TenChatLieu" placeholder="Tên Chất Liệu" value="{{ $thongTin->TenChatLieu }}" required>
                                        @error("TenChatLieu")
                                        <p class="text-danger">{{ $message }}</p>
                                        @enderror
                                    </div>
                                </div>
                            </div>


                            <div class="row">
                                <div class="col">
                                    <div class="text-end">
                                        <button class="btn btn-primary" type="submit">Cập Nhật</button>
                                        <button class="btn btn-dark" type="reset">Đặt Lại</button>
                                        <a class="btn btn-secondary" href="/admin/ChatLieu">Danh Sách</a>
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