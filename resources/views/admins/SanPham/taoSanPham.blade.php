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
                        <h5>THÔNG TIN SẢN PHẨM</h5>
                    </div>
                    <div class="card-body">
                        <form action="" class="form theme-form" method="POST">
                            <div class="row">
                                <div class="col">
                                    <div class="mb-3">
                                        <label>Tên Sản Phẩm</label>
                                        <input class="form-control" type="text" placeholder="Tên Sản Phẩm" required>
                                    </div>
                                </div>
                            </div>


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

            <div class="col-md-4">
                <div class="card">
                    <div class="card-header">
                        <h5>KÍCH CỠ</h5>
                    </div>
                    <div class="card-body">
                        <form action="" class="form theme-form" method="POST">
                            <div class="row">
                                <div class="col">
                                    <div class="mb-3">
                                        <label>Tên Sản Phẩm</label>
                                        <input class="form-control" type="text" placeholder="Tên Sản Phẩm" required>
                                    </div>
                                </div>
                            </div>


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