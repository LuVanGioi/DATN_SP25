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
                        </div>
                    </div>
                    <div class="col-md-9">

                        <div class="tab-content" id="nav-tabContent">

                            <div class="tab-pane fade list-behaviors active show" id="thongTin" role="tabpanel">
                                <div class="row">
                                    <div class="col-md-12 mb-3">
                                        <label class="label-control">Tên Sản Phẩm:</label>
                                        <input type="text" class="form-control" value="{{ $sanPham->TenSanPham }}" readonly>
                                    </div>

                                    <div class="col-md-3 mb-3">
                                        <label class="label-control">Dịch Vụ:</label>
                                        <input type="text" class="form-control" value="{{ $dichVu->TenDichVuSanPham }}" readonly>
                                    </div>

                                    <div class="col-md-3 mb-3">
                                        <label class="label-control">Danh Mục:</label>
                                        <input type="text" class="form-control" value="{{ $danhMuc->TenDanhMucSanPham }}" readonly>
                                    </div>

                                    <div class="col-md-3 mb-3">
                                        <label class="label-control">Thương Hiệu:</label>
                                        <input type="text" class="form-control" value="{{ $thuongHieu->TenThuongHieu }}" readonly>
                                    </div>

                                    <div class="col-md-3 mb-3">
                                        <label class="label-control">Chất Liệu:</label>
                                        <input type="text" class="form-control" value="{{ $sanPham->ChatLieu }}" readonly>
                                    </div>

                                    @if($sanPham->TheLoai == "thuong")
                                    <div class="col-md-4 mb-3">
                                        <label class="label-control">Giá Gốc:</label>
                                        <input type="text" class="form-control" value="{{ ($sanPham->GiaKhuyenMai ? number_format($sanPham->GiaKhuyenMai) : "0") }}đ" readonly>
                                    </div>

                                    <div class="col-md-4 mb-3">
                                        <label class="label-control">Giá Bán:</label>
                                        <input type="text" class="form-control" value="{{ number_format($sanPham->GiaSanPham) }}đ" readonly>
                                    </div>

                                    <div class="col-md-4 mb-3">
                                        <label class="label-control">Số Lượng:</label>
                                        <input type="text" class="form-control" value="{{ number_format($sanPham->SoLuong) }}" readonly>
                                    </div>
                                    @endif

                                    <div class="col-md-4 mb-3">
                                        <label class="label-control">Nhãn:</label>
                                        <input type="text" class="form-control" value="{{ nhan($sanPham->Nhan) }}" readonly>
                                    </div>

                                    <div class="col-md-4 mb-3">
                                        <label class="label-control">Trạng Thái:</label>
                                        <input type="text" class="form-control" value="{{ ($sanPham->TrangThai == "hien" ? "Hiển Thị" : "Ẩn") }}" readonly>
                                    </div>

                                    <div class="col-md-4 mb-3">
                                        <label class="label-control">Loại Sản Phẩm:</label>
                                        <input type="text" class="form-control" value="{{ ($sanPham->TheLoai == "bienThe" ? "Biến Thể" : "Thường") }}" readonly>
                                    </div>

                                    <div class="col-md-6 mb-3">
                                        <label class="label-control">Thời Gian Tạo:</label>
                                        <input type="text" class="form-control" value="{{ $sanPham->created_at }}" readonly>
                                    </div>

                                    <div class="col-md-6 mb-3">
                                        <label class="label-control">Thời Gian Cập Nhật:</label>
                                        <input type="text" class="form-control" value="{{ ($sanPham->updated_at ?? "Chưa Có Thời Gian Chỉnh Sửa") }}" readonly>
                                    </div>
                                    @if ($sanPham->TheLoai == "bienThe")
                                    <div class="col-md-12 mb-3">
                                        <label class="label-control">Biến Thể:</label>
                                        @foreach ($danhSachKichCo as $kichCo)
                                        <div class="row">
                                            <div class="col-md-2">
                                                <b class="btn-size">Size {{ $kichCo->TenKichCo }}</b>
                                            </div>
                                            <div class="col-md-10">
                                                <div class="row">
                                                    @foreach ($danhSachBienThe as $bienThe)
                                                    @if ($bienThe->KichCo == $kichCo->TenKichCo)
                                                    @foreach ($danhSachMauSac as $mauSac)
                                                    @if ($mauSac->id == $bienThe->ID_MauSac)
                                                    <div class="col-md-12 mb-2">
                                                        <div class="row">
                                                            <div class="col-md-4">
                                                                <span class="btn-color">{{ $mauSac->TenMauSac }}</span>
                                                            </div>
                                                            <div class="col-md-4">
                                                                <span class="btn-amount">Số Lượng: <b>{{ number_format($bienThe->SoLuong) }}</b></span>
                                                            </div>
                                                            <div class="col-md-4">
                                                                <span class="btn-price">Giá Tiền: <b>{{ number_format($bienThe->Gia) }}đ</b></span>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    @endif
                                                    @endforeach
                                                    @endif
                                                    @endforeach
                                                </div>
                                            </div>
                                        </div>
                                        <hr>
                                        @endforeach
                                    </div>
                                    @endif

                                    <div class="col-md-12 pt-3 mb-3">
                                        <label class="label-control">Mô Tả Sản Phẩm:</label>
                                        <div class="border border-1 border-r-7 card-body">
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
                                    <div class="col-md-12 mb-3 mt-3">
                                        <label class="label-control d-block">Hình Ảnh Các Sản Phẩm:</label>
                                        <div class="owl-carousel owl-theme owl-loaded owl-drag" id="owl-carousel-13">
                                            <div class="owl-stage-outer">
                                                <div class="owl-stage">
                                                    @if ($sanPham->TheLoai == "bienThe")
                                                    @foreach ($bienTheGop as $btHinhAnh)
                                                    @foreach (DB::table('hinh_anh_san_pham')
                                                    ->where('ID_SanPham', $btHinhAnh->ID)
                                                    ->get() as $image)
                                                    <div class="owl-item active">
                                                        <div class="item">
                                                            <img src="{{ Storage::url($image->DuongDan) }}" alt="{{ $sanPham->TenSanPham }}">
                                                        </div>
                                                    </div>
                                                    @endforeach
                                                    @endforeach
                                                    @else
                                                    @foreach ($danhSachHinhAnh as $hinhAnh)
                                                    <div class="owl-item active">
                                                        <div class="item">
                                                            <img src="{{ Storage::url($hinhAnh->DuongDan) }}" alt="{{ $sanPham->TenSanPham }}">
                                                        </div>
                                                    </div>
                                                    @endforeach
                                                    @endif
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
    </div>
</div>
@endsection

@section("css")
<style type="text/css">
    .btn-size {
        border: 1px solid #016666;
        background: none;
        border-radius: 3px;
        padding: 5px 10px;
        color: #016666;
        display: block;
    }

    .btn-color {
        border: 1px solid rgb(1, 50, 102);
        background: none;
        border-radius: 3px;
        padding: 5px 10px;
        color: rgb(1, 50, 102);
        display: block;
    }

    .btn-amount {
        border: 1px solid rgb(180, 12, 226);
        background: none;
        border-radius: 3px;
        padding: 5px 10px;
        color: rgb(180, 12, 226);
        display: block;
        width: 100%;
    }

    .btn-price {
        border: 1px solid rgb(225, 47, 47);
        background: none;
        border-radius: 3px;
        padding: 5px 10px;
        color: rgb(225, 47, 47);
        display: block;
        width: 100%;
    }
</style>
@endsection