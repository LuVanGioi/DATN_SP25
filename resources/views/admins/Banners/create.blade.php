@extends("admins.themes")

@section("titleHead")
<title>Thêm Sản Phẩm - ADMIN</title>
@endsection

@section("main")
<div class="page-body">
    <div class="container-fluid pt-3">
        <div class="row">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">
                        <h5>THÔNG TIN Banner</h5>
                    </div>
                    <div class="card-body">
                        <form action="" class="form theme-form" method="POST">
                            <div class="row">
                                <div class="col">
                                    <div class="mb-3">
                                        <label>Tên Banner</label>
                                        <input class="form-control" type="text" placeholder="Tên Banner" required>
                                    </div>
                                </div>
                            </div>

                            <div class="row">
                                <div class="col">
                                    <div class="mb-3">
                                        <label>Hình ảnh</label>
                                        <input class="form-control" type="file" placeholder="Ảnh Banner" required>
                                    </div>
                                </div>
                            </div>

                            <div class="row">
                                <div class="col">
                                    <div class="mb-3">
                                        <label>Vị trí</label>
                                        <input class="form-control" type="text" placeholder="Vị trí Banner" required>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col">
                                    <div class="mb-3">
                                        <label>Trạng thái</label>
                                        <input class="form-control" type="text" placeholder="Trạng thái Banner" required>
                                    </div>
                                </div>
                            </div>





    {{-- nút              --}}
                            <div class="row">
                                <div class="col">
                                    <div class="text-end">
                                        <a class="btn btn-primary me-3" type="submit">Thêm Ngay</a>
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