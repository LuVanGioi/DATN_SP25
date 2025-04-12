@extends("admins.themes")

@section("titleHead")
    <title>Quản Lý Đơn Hàng - ADMIN</title>
@endsection

@section('main')
    <div class="page-body">
        <div class="container" style="margin-top: 50px;">
            <div class="card shadow-lg">
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
                        <p><strong>Trạng Thái Thanh Toán : </strong> {{$donHang->TrangThaiThanhToan}} </p>
                        <p><strong>Phương Thức Thanh Toán : </strong> {{$donHang->PhuongThucThanhToan}} </p>
                        <p><strong>Ghi Chú : </strong> {{$donHang->GhiChu}} </p>


                    </div>
                    <h5 class="text-primary">Danh Sách Sản Phẩm</h5>
                    <div class="row mt-3">
                        @foreach ($sanPhamMua as $item)
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
                <div class="card-footer">
                    <form class="row variable" action="{{route('DonHang.update', $donHang->MaDonHang)}}" method="POST" time_load="1500" swal_success="" type="POST">
                        <input type="hidden" name="_token" value="{{ csrf_token() }}">
                        <input type="hidden" name="action" id="actionField" value="">
                       @csrf
@method("PUT")
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
                                <option value="hoanhang" {{ $donHang->TrangThaiDonHang == "hoanhang" ? "selected" : "" }}>Hoàn Hàng</option>
                                @elseif ($donHang->TrangThaiDonHang == "thatbai")
                                <option value="thatbai" {{ $donHang->TrangThaiDonHang == "thatbai" ? "selected" : "" }}>Giao Thất Bại</option>
                                <option value="hoanhang" {{ $donHang->TrangThaiDonHang == "hoanhang" ? "selected" : "" }}>Hoàn Hàng</option>
                                <option value="huydon" {{ $donHang->TrangThaiDonHang == "huydon" ? "selected" : "" }}>Đã Hủy</option>
                                @elseif ($donHang->TrangThaiDonHang == "huydon")
                                <option value="huydon" {{ $donHang->TrangThaiDonHang == "huydon" ? "selected" : "" }}>Đã Hủy</option>
                                @elseif ($donHang->TrangThaiDonHang == "hoanhang")
                                <option value="hoanhang" {{ $donHang->TrangThaiDonHang == "hoanhang" ? "selected" : "" }}>Hoàn Hàng</option>
                                @endif       
                        </select>
                        </div>

                        
                        <button type="submit" data-action="capnhat" class="btn btn-primary">Cập Nhật</button>
                    </form>
                </div>
            </div>
        </div>
    </div>

@endsection