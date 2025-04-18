@extends("admins.themes")

@section("titleHead")
<title>Danh Sách Sản Phẩm - ADMIN</title>
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
        <div class="card">
            <div class="card-header">
                <h5>DANH SÁCH SẢN PHẨM</h5>
            </div>
            <div class="card-body">
                <div class="text-end">
                    <a href="{{ route("SanPham.create") }}" class="btn btn-primary btn-sm">Thêm Sản Phẩm</a>
                    <a href="{{ route("ThungRac.index") }}" class="btn btn-dark btn-sm">Thùng Rác</a>
                </div>
                <div class="table-responsive dt-responsive">
                    <div id="dom-jqry_wrapper" class="dataTables_wrapper dt-bootstrap5">
                        <div class="row dt-row">
                            <div class="col-sm-12">
                                <table class="table table-striped table-bordered nowrap dataTable">
                                    <thead>
                                        <tr>
                                            <th>STT</th>
                                            <th>Dịch Vụ / Danh Mục / Thương Hiệu</th>
                                            <th>Hình Ảnh</th>
                                            <th>Thông Tin</th>
                                            <th>Thể Loại</th>
                                            <th class="text-center">Trạng Thái</th>
                                            <th>Thao Tác</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($danhSach as $index => $SanPham)
                                        <tr>
                                            <td>{{ $index + 1 }}</td>
                                            <td>
                                                <div>
                                                    <strong>Dịch Vụ: </strong> {{ DB::table("dich_vu_san_pham")->where("id", $SanPham->ID_DichVuSanPham)->where("Xoa", 0)->first()->TenDichVuSanPham }}
                                                </div>
                                                @foreach ($danhSachDanhMuc as $danhMuc)
                                                @if ($danhMuc->id == $SanPham->ID_DanhMuc)
                                                <div><strong>Danh Mục: </strong> {{ $danhMuc->TenDanhMucSanPham }}</div>
                                                @endif
                                                @endforeach
                                                <div>
                                                    <strong>Thương Hiệu: </strong> {{ DB::table("thuong_hieu")->find($SanPham->ID_ThuongHieu)->TenThuongHieu }}
                                                </div>
                                            </td>
                                            <td class="text-center"><img src="{{ Storage::url($SanPham->HinhAnh) }}" alt="{{ $SanPham->TenSanPham }}" width="100px" class="img-fluid"></td>
                                            <td>
                                                <div><strong>Tên:</strong> {{ Str::limit($SanPham->TenSanPham, 30) }}</div>
                                                <div><strong>Chất Liệu:</strong> {{ Str::limit($SanPham->ChatLieu, 30) }}</div>
                                                <div><strong>Giá: </strong> @if ($SanPham->TheLoai == "thuong")
                                                    {{ number_format($SanPham->GiaSanPham, 0, ',', '.') }}đ {{ ($SanPham->GiaKhuyenMai ? number_format($SanPham->GiaKhuyenMai, 0, ',', '.')."đ" : "") }}
                                                    @else
                                                    {{ number_format(DB::table("bien_the_san_pham")->where("ID_SanPham", $SanPham->id)->where("Xoa", 0)->min("Gia")) }}đ
                                                    @endif
                                                </div>
                                                @if ($SanPham->TheLoai == "thuong")
                                                <div><strong>Số Lượng:</strong> {{ number_format($SanPham->SoLuong, 0, ',', '.') }}</div>
                                                @endif
                                            </td>
                                            <td>
                                                @if ($SanPham->TheLoai == "thuong")
                                                <span class="badge bg-primary">Giản Thể</span>
                                                @else
                                                <span class="badge bg-info">Biến Thể</span>
                                                @endif
                                            </td>
                                            <td class="text-center">
                                                @if ($SanPham->TrangThai == "hien")
                                                <span class="badge bg-success">Hiển Thị</span>
                                                @else
                                                <span class="badge bg-danger">Ẩn</span>
                                                @endif
                                            </td>
                                            <td>
                                                <a href="{{ route("SanPham.edit", $SanPham->id) }}" class="btn btn-primary btn-sm">Sửa</a>

                                                <a href="{{ route("SanPham.show", $SanPham->id) }}" class="btn btn-info btn-sm">Chi Tiết</a>

                                                <form action="{{ route("SanPham.destroy", $SanPham->id) }}" class="d-inline" method="POST" onsubmit="return confirm('Bạn có muốn xóa không?'); ">
                                                    @csrf
                                                    @method("DELETE")
                                                    <button type="submit" class="btn btn-danger btn-sm">Xóa</button>
                                                </form>
                                            </td>
                                        </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection