@extends("admins.themes")

@section("titleHead")
<title>Chi Tiết Sản Phẩm - ADMIN</title>
@endsection

@section("main")
<div class="page-body">
    <div class="container-fluid pt-3">

        <div class="card">
            <div class="card-header">
                <h5>THÔNG TIN SẢN PHẨM: <span class="VietHoa">{{ $sanPham->TenSanPham }}</span></h5>
            </div>
            <div class="card-body">
                <a href="{{ route("SanPham.index") }}" class="btn btn-dark mb-3">Quay Lại</a>
                <div class="row">
                    <div class="col-md-3">
                        <div class="list-group" id="list-tab" role="tablist">
                            <a class="list-group-item list-group-item-action active" data-bs-toggle="list" href="#thongTin" role="tab">Thông Tin</a>
                            <a class="list-group-item list-group-item-action" data-bs-toggle="list" href="#hinhAnh" role="tab">Hình Ảnh</a>
                            @if ($sanPham->TheLoai == "bienThe")
                            <a class="list-group-item list-group-item-action" data-bs-toggle="list" href="#bienThe" role="tab">Biển Thể</a>
                            @endif
                        </div>
                    </div>
                    <div class="col-md-9">

                        <div class="tab-content" id="nav-tabContent">

                            <div class="tab-pane fade list-behaviors active show" id="thongTin" role="tabpanel">
                                <div class="row">
                                    <div class="col-md-12 mb-2">
                                        <label class="label-control">Tên Sản Phẩm:</label>
                                        <input type="text" class="form-control" value="{{ $sanPham->TenSanPham }}" readonly>
                                    </div>

                                    <div class="col-md-4 mb-2">
                                        <label class="label-control">Danh Mục:</label>
                                        <input type="text" class="form-control" value="{{ $danhMuc->TenDanhMucSanPham }}" readonly>
                                    </div>

                                    <div class="col-md-4 mb-2">
                                        <label class="label-control">Chất Liệu:</label>
                                        <input type="text" class="form-control" value="{{ $sanPham->ID_ThuongHieu }}" readonly>
                                    </div>

                                    <div class="col-md-4 mb-2">
                                        <label class="label-control">Thương Hiệu:</label>
                                        <input type="text" class="form-control" value="{{ $thuongHieu->TenThuongHieu }}" readonly>
                                    </div>

                                    <div class="col-md-6 mb-2">
                                        <label class="label-control">Giá Sản Phẩm:</label>
                                        <input type="text" class="form-control" value="{{ number_format($sanPham->GiaSanPham) }}đ" readonly>
                                    </div>

                                    <div class="col-md-6 mb-2">
                                        <label class="label-control">Trạng Thái:</label>
                                        <input type="text" class="form-control" value="{{ ($sanPham->TrangThai == "hien" ? "Hiển Thị" : "Ẩn") }}" readonly>
                                    </div>

                                    <div class="col-md-12 mb-2">
                                        <label class="label-control">Loại Sản Phẩm:</label>
                                        <input type="text" class="form-control" value="{{ ($sanPham->TheLoai == "bienThe" ? "Biến Thể" : "Thường") }}" readonly>
                                    </div>

                                    <div class="col-md-6 mb-2">
                                        <label class="label-control">Thời Gian Tạo:</label>
                                        <input type="text" class="form-control" value="{{ $sanPham->created_at }}" readonly>
                                    </div>

                                    <div class="col-md-6 mb-3">
                                        <label class="label-control">Thời Gian Cập Nhật:</label>
                                        <input type="text" class="form-control" value="{{ ($sanPham->updated_at ?? "Chưa Có Thời Gian Chỉnh Sửa") }}" readonly>
                                    </div>
                                    <hr>

                                    <div class="col-md-12 mb-3">
                                        <label class="label-control">Mô Tả Sản Phẩm:</label>
                                        <div class="border border-1 border-r card-body">
                                            {!! $sanPham->Mota !!}
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="tab-pane fade list-behaviors" id="hinhAnh" role="tabpanel">
                                <div class="row">
                                    <div class="col-md-12 mb-3">
                                        <label class="label-control d-block">Ảnh Đại Diện Mặt Hàng:</label>
                                        <img src="{{ Storage::url($sanPham->HinhAnh) }}" alt="{{ $sanPham->TenSanPham }}" width="200px" class="img-fluid border-r-7">
                                    </div>

                                    <hr>
                                    <div class="col-md-12 mb-2 mt-3">
                                        <label class="label-control d-block">Hình Ảnh Các Sản Phẩm:</label>
                                        <div class="owl-carousel owl-theme owl-loaded owl-drag" id="owl-carousel-13">
                                            <div class="owl-stage-outer">
                                                <div class="owl-stage">
                                                    @foreach ($danhSachHinhAnh as $hinhAnh)
                                                    <div class="owl-item active">
                                                        <div class="item">
                                                            <img src="{{ Storage::url($hinhAnh->DuongDan) }}" alt="{{ $sanPham->TenSanPham }}">
                                                        </div>
                                                    </div>
                                                    @endforeach
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="tab-pane fade list-behaviors" id="bienThe" role="tabpanel">
                                <div class="disabled-container">
                                    <div class="treejs">
                                        <div class="treejs-nodes row">

                                            @foreach ($danhSachKichCo as $kichCo)
                                            <div class="col-md-3 mb-3 mt-3">
                                                <div class="treejs-node treejs-node__halfchecked treejs-node__disabled border border-1 border-r-7 p-2">
                                                    <i class="fa-solid fa-circle-radiation"></i>
                                                    <b class="treejs-label text-primary">Size {{ $kichCo->TenKichCo }}</b>
                                                    <ul class="treejs-nodes">
                                                        @foreach ($danhSachBienThe as $bienThe)
                                                        @if ($bienThe->KichCo == $kichCo->TenKichCo)
                                                        @foreach ($danhSachMauSac as $mauSac)
                                                        @if ($mauSac->id == $bienThe->ID_MauSac)
                                                        <li class="treejs-node treejs-node__halfchecked treejs-node__disabled">
                                                            <span class="treejs-label title">{{ $mauSac->TenMauSac }}</span>
                                                            <ul class="treejs-nodes">
                                                                <li class="treejs-node treejs-node__close treejs-node__halfchecked treejs-node__disabled text-dark">Số Lượng: <b>{{ number_format($bienThe->SoLuong) }}</b></li>
                                                                <li class="treejs-node treejs-node__close treejs-node__halfchecked treejs-node__disabled text-dark">Giá Tiền: <b class="text-primary">{{ number_format($bienThe->Gia) }}đ</b></li>
                                                            </ul>
                                                        </li>
                                                        @endif
                                                        @endforeach
                                                        @endif
                                                        @endforeach
                                                    </ul>
                                                </div>
                                            </div>
                                            @endforeach
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

@section("css")
<style type="text/css">
    .treejs {
        -webkit-box-sizing: border-box;
        box-sizing: border-box;
        font-size: 14px;
    }

    .treejs *:after,
    .treejs *:before {
        -webkit-box-sizing: border-box;
        box-sizing: border-box;
    }

    .treejs>.treejs-node {
        padding-left: 0;
    }

    .treejs .treejs-nodes {
        list-style: none;
        padding-left: 20px;
        overflow: hidden;
        -webkit-transition: height 150ms ease-out, opacity 150ms ease-out;
        -o-transition: height 150ms ease-out, opacity 150ms ease-out;
        transition: height 150ms ease-out, opacity 150ms ease-out;
    }

    .treejs .treejs-node {
        cursor: pointer;
        overflow: hidden;
    }

    .treejs .treejs-node.treejs-placeholder {
        padding-left: 20px;
    }

    .treejs i {
        font-size: 12px;
        color: #1890ff;
    }

    .treejs .treejs-node__close>.treejs-switcher {
        -webkit-transform: rotate(-90deg);
        -ms-transform: rotate(-90deg);
        transform: rotate(-90deg);
    }

    .treejs .treejs-node__close>.treejs-nodes {
        height: 0;
    }

    .treejs .treejs-checkbox {
        display: inline-block;
        vertical-align: middle;
        width: 20px;
        height: 20px;
        cursor: pointer;
        position: relative;
    }

    .treejs .treejs-label {
        vertical-align: middle;
    }

    .treejs .treejs-label.title {
        font-weight: bold;
        margin-left: 10px;
        color: #006666;
    }
</style>
@endsection