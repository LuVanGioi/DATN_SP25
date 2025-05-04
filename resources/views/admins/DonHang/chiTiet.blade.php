@extends("admins.themes")

@section("titleHead")
<title>Quản Lý Đơn Hàng - ADMIN</title>
@endsection

@section('main')
<div class="page-body">
    <div class="container-fluid pt-3">
        <div class="card">
            <div class="card-header bg-primary text-white d-flex justify-content-between align-items-center">
                <h5 class="mb-0 text-white">Chi Tiết Đơn Hàng</h5>
                <strong>Mã Đơn Hàng: #{{$donHang->MaDonHang}}</strong>
            </div>
            <div class="card-body">
                <div class="mb-4 p-3 border rounded">
                    <h5 class="text-primary">Thông Tin Khách Hàng</h5>
                    <p><strong>Họ Tên : </strong> {{$donHang->HoTen}}</p>
                    <p><strong>Số Điện Thoại : </strong> {{$donHang->SoDienThoai}} </p>
                    <p><strong>Địa Chỉ : </strong>
                        {{$donHang->DiaChi . ", " . $donHang->Xa . " - " . $donHang->TenHuyen . " - " . $donHang->TenThanhPho}}
                    </p>
                    <p><strong>Trạng Thái Đơn Hàng : </strong> {!!trangThaiDonHang($donHang->TrangThaiDonHang)!!} </p>
                    <p><strong>Trạng Thái Thanh Toán : </strong> {!! $donHang->TrangThaiThanhToan == "chuathanhtoan" ? "<span class='badge bg-danger'>Chưa Thanh Toán</span>" : "<span class='badge bg-success'>Đã Thanh Toán</span>" !!} </p>
                    <p><strong>Phương Thức Thanh Toán : </strong> {{$donHang->PhuongThucThanhToan}} </p>
                    <p><strong>Ghi Chú : </strong> {{$donHang->GhiChu}} </p>
                    @if ($donHang->TrangThaiDonHang == "huydon" || $donHang->TrangThaiDonHang == "hoanhang" || $donHang->TrangThaiDonHang == "xacnhanhoanhang")
                    <p><strong>Lý Do Hủy : </strong> {{ ($donHang->LyDoHuy ?? "") }} </p>
                    @if ($donHang->TrangThaiDonHang == "hoanhang" || $donHang->TrangThaiDonHang == "xacnhanhoanhang")
                    <div class="row">
                        @foreach (DB::table("hinh_anh_huy_don")->where("MaDonHang", $donHang->MaDonHang)->get() as $hinhAnhHoan)
                        <div class="col-2">
                            <img src="{{ Storage::url($hinhAnhHoan->DuongDan) }}" class="img-fluid" alt="">
                        </div>
                        @endforeach
                    </div>
                    @endif
                    @endif
                </div>
                <h5 class="text-primary">Danh Sách Sản Phẩm {{ $donHang->TrangThaiDonHang == "hoanhang" || $donHang->TrangThaiDonHang == "xacnhanhoanhang" ? "Hoàn Hàng" : "" }}</h5>
                <div class="row mt-3">
                    @php
                    if($donHang->TrangThaiDonHang == "hoanhang" || $donHang->TrangThaiDonHang == "xacnhanhoanhang") {
                    $listSPPPPP = DB::table('san_pham_don_hang')
                    ->join('san_pham', 'san_pham_don_hang.Id_SanPham', '=', 'san_pham.id')
                    ->where('san_pham_don_hang.MaDonHang', $id)
                    ->where('san_pham_don_hang.TrangThai', "hoanhang")
                    ->select(
                    'san_pham_don_hang.Id_SanPham',
                    'san_pham.TenSanPham',
                    'san_pham.DuongDan',
                    'san_pham.HinhAnh',
                    'san_pham_don_hang.KichCo',
                    'san_pham_don_hang.MauSac',
                    DB::raw('SUM(san_pham_don_hang.SoLuong) as SoLuong'),
                    DB::raw('SUM(san_pham_don_hang.GiaTien) as GiaTien')
                    )
                    ->groupBy(
                    'san_pham_don_hang.Id_SanPham',
                    'san_pham.TenSanPham',
                    'san_pham.DuongDan',
                    'san_pham.HinhAnh',
                    'san_pham_don_hang.KichCo',
                    'san_pham_don_hang.MauSac'
                    )
                    ->get();
                    } else {
                        $listSPPPPP = $sanPhamMua;
                    }
                    @endphp
                    @foreach ($listSPPPPP as $item)
                    <div class="col-xxl-4 col-md-6">
                        <div class="prooduct-details-box">
                            <div class="media">
                                <img class="align-self-center img-fluid img-60" src="{{ Storage::url($item->HinhAnh)}}"
                                    alt="#">
                                <div class="media-body ms-3">
                                    <div class="product-name">
                                        <h6><a href="/san-pham/{{ $item->DuongDan }}" target="_blank">{{ $item->TenSanPham }}</a></h6>
                                    </div>
                                    <div class="rating">{{ $item->KichCo }} - {{ $item->MauSac }}</div>
                                    <div class="price d-flex">
                                        <div class="text-muted me-2">Giá</div>:
                                        {{ number_format($item->GiaTien, 0, ',', '.') }}đ
                                    </div>
                                    <div class="avaiabilty">
                                        <div class="text-success">Số Lượng : {{ $item->SoLuong }}</div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    @endforeach
                </div>
            </div>
            @if ($donHang->TrangThaiDonHang !== 'huydon' && $donHang->TrangThaiDonHang !== 'danhan' && $donHang->TrangThaiDonHang !== 'xacnhanhoanhang')
            <div class="card-footer">
                <form action="{{route('DonHang.update', $donHang->MaDonHang)}}" method="POST">
                    @csrf
                    @method('PUT')
                    <input type="hidden" name="action" id="actionField" value="">

                    <div class="form-group">
                        <label class="form-label">Trạng Thái Đơn Hàng</label>
                        <select name="TrangThai" class="form-control">
                            @if ($donHang->TrangThaiDonHang == "choxacnhan")
                            <option value="choxacnhan" {{ $donHang->TrangThaiDonHang == "choxacnhan" ? "selected" : "" }}>Chờ Xác Nhận</option>
                            <option value="daxacnhan" {{ $donHang->TrangThaiDonHang == "daxacnhan" ? "selected" : "" }}>Đã Xác Nhận</option>
                            <option value="huydon" {{ $donHang->TrangThaiDonHang == "huydon" ? "selected" : "" }}>Đã Hủy</option>
                            @elseif ($donHang->TrangThaiDonHang == "daxacnhan")
                            <option value="daxacnhan" {{ $donHang->TrangThaiDonHang == "daxacnhan" ? "selected" : "" }}>Đã Xác Nhận</option>
                            <option value="danggiao" {{ $donHang->TrangThaiDonHang == "danggiao" ? "selected" : "" }}>Đang Giao</option>
                            <option value="huydon" {{ $donHang->TrangThaiDonHang == "huydon" ? "selected" : "" }}>Đã Hủy</option>
                            @elseif ($donHang->TrangThaiDonHang == "danggiao")
                            <option value="danggiao" {{ $donHang->TrangThaiDonHang == "danggiao" ? "selected" : "" }}>Đang Giao</option>
                            <option value="dagiao" {{ $donHang->TrangThaiDonHang == "dagiao" ? "selected" : "" }}>Đã Giao</option>
                            <option value="thatbai" {{ $donHang->TrangThaiDonHang == "thatbai" ? "selected" : "" }}>Giao Thất Bại</option>
                            @elseif ($donHang->TrangThaiDonHang == "dagiao")
                            <option value="dagiao" {{ $donHang->TrangThaiDonHang == "dagiao" ? "selected" : "" }}>Đã Giao</option>
                            @elseif ($donHang->TrangThaiDonHang == "thatbai")
                            <option value="thatbai" {{ $donHang->TrangThaiDonHang == "thatbai" ? "selected" : "" }}>Giao Thất Bại</option>
                            <option value="hoanhang" {{ $donHang->TrangThaiDonHang == "hoanhang" ? "selected" : "" }}>Hoàn Hàng</option>
                            <option value="huydon" {{ $donHang->TrangThaiDonHang == "huydon" ? "selected" : "" }}>Đã Hủy</option>
                            @elseif ($donHang->TrangThaiDonHang == "huydon")
                            <option value="huydon" {{ $donHang->TrangThaiDonHang == "huydon" ? "selected" : "" }}>Đã Hủy</option>
                            @elseif ($donHang->TrangThaiDonHang == "hoanhang")
                            <option value="hoanhang" {{ $donHang->TrangThaiDonHang == "hoanhang" ? "selected" : "" }}>Hoàn Hàng</option>
                            <option value="xacnhanhoanhang" {{ $donHang->TrangThaiDonHang == "xacnhanhoanhang" ? "selected" : "" }}>Xác Nhận Hoàn Hàng</option>
                            @endif
                        </select>
                    </div>


                    <button type="submit" data-action="capnhat" class="btn btn-primary">Cập Nhật</button>
                </form>
            </div>
            @endif
        </div>
    </div>
</div>
@endsection