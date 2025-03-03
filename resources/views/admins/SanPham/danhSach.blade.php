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
                                            <th>Danh Mục</th>
                                            <th class="text-center">Hình Ảnh</th>
                                            <th>Tên</th>
                                            <th>Chất Liệu</th>
                                            <th>Thương Hiệu</th>
                                            <th>Giá</th>
                                            <th class="text-center">Trạng Thái</th>
                                            <th>Thao Tác</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($danhSach as $index => $SanPham)
                                        <tr>
                                            <td>{{ $index + 1 }}</td>
                                            <td>
                                                @foreach ($danhSachDanhMuc as $danhMuc)
                                                @if ($danhMuc->id == $SanPham->ID_DanhMuc)
                                                {{ $danhMuc->TenDanhMucSanPham }}
                                                @endif
                                                @endforeach
                                            </td>
                                            <td class="text-center"><img src="{{ Storage::url($SanPham->HinhAnh) }}" alt="{{ $SanPham->TenSanPham }}" width="100px" class="img-fluid"></td>
                                            <td>{{ $SanPham->TenSanPham }}</td>
                                            <td>{{ $SanPham->ID_ChatLieu }}</td>
                                            <td>
                                                @foreach ($danhSachThuongHieu as $thuongHieu)
                                                @if ($thuongHieu->id == $SanPham->ID_ThuongHieu)
                                                {{ $thuongHieu->TenThuongHieu }}
                                                @endif
                                                @endforeach
                                            </td>
                                            <td>{{ number_format($SanPham->GiaSanPham, 0, ',', '.') }}đ</td>
                                            <td class="text-center">
                                                @if ($SanPham->TrangThai == "hien")
                                                <span class="badge bg-success">Hiển Thị</span>
                                                @else
                                                <span class="badge bg-danger">Ẩn</span>
                                                @endif
                                            </td>
                                            <td>
                                                <a href="/admin/SanPham/{{ $SanPham->id }}/edit" class="btn btn-primary btn-sm">Sửa</a>

                                                <a href="/admin/SanPham/{{ $SanPham->id }}" class="btn btn-info btn-sm">Chi Tiết</a>

                                                <form action="/admin/SanPham/{{ $SanPham->id }}" class="d-inline" method="POST" onsubmit="return confirm('Bạn có muốn xóa không?'); ">
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