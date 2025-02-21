@extends("admins.themes")

@section("titleHead")
<title>Sửa Sản Phẩm - ADMIN</title>
@endsection

@section("main")
<div class="page-body">
    <div class="container-fluid pt-3">
        <div class="row">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">
                        <h5>THÔNG TIN SẢN PHẨM: <b>{{ $id }}</b></h5>
                    </div>
                    <div class="card-body">
                        <div class="row">
                            <div class="col">
                                <div class="mb-3">
                                    <label>Danh Mục</label>
                                    <input class="form-control" type="text" value="Text" readonly>
                                </div>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col">
                                <div class="mb-3">
                                    <label>Chất Liệu</label>
                                    <input class="form-control" type="text" value="Text" readonly>
                                </div>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col">
                                <div class="mb-3">
                                    <label>Thương Hiệu</label>
                                    <input class="form-control" type="text" value="Text" readonly>
                                </div>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col">
                                <div class="mb-3">
                                    <label>Tên Sản Phẩm</label>
                                    <input class="form-control" type="text" value="Text" required>
                                </div>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col">
                                <div class="mb-3">
                                    <label>Trạng Thái</label>
                                    <input class="form-control" type="text" value="Text" required>
                                </div>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col">
                                <div class="mb-3">
                                    <label>Mô Tả</label>
                                    <div>Đây Là Mô Tả</div>
                                </div>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col">
                                <div class="mb-3">
                                    <a href="/admin/sanPham" class="btn btn-sm btn-light">Quay Lại</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="col-md-4">
                <div class="card">
                    <div class="card-header">
                        <h5>KÍCH CỠ</h5>
                    </div>
                    <div class="card-body">
                        <ul class="list-group">
                            <li class="list-group-item"> <i class="icofont icofont-arrow-right"></i> Size S</li>
                            <li class="list-group-item"> <i class="icofont icofont-arrow-right"></i> Size M</li>
                            <li class="list-group-item"> <i class="icofont icofont-arrow-right"></i> Size L</li>
                            <li class="list-group-item"> <i class="icofont icofont-arrow-right"></i> Size XL</li>
                        </ul>
                    </div>
                </div>

                <div class="card">
                    <div class="card-header">
                        <h5>MÀU SẮC</h5>
                    </div>
                    <div class="card-body">
                        <ul class="list-group">
                            <a class="list-group-item list-group-item-action" href="javascript:void(0)">
                                <img class="rounded-circle" src="https://banaobongda.com/wp-content/uploads/2020/06/LM09-%C4%91%E1%BB%8F.jpg" alt="user"> Màu Đỏ - <b class="text-danger">12.000đ</b></a>
                            <a class="list-group-item list-group-item-action" href="javascript:void(0)">
                                <img class="rounded-circle" src="https://dothethao247.net/wp-content/uploads/2019/07/ao-bong-da-doi-tuyen-viet-nam-xanh-v.jpg" alt="user"> Màu Xanh Biển - <b class="text-danger">15.000đ</b></a>
                            <a class="list-group-item list-group-item-action" href="javascript:void(0)">
                                <img class="rounded-circle" src="https://banaobongda.com/wp-content/uploads/2020/07/LM14-v%C3%A0ng.jpg" alt="user"> Màu Vàng - <b class="text-danger">10.000đ</b></a>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection