@extends("admins.themes")

@section("titleHead")
<title>Thùng Rác - ADMIN</title>
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
                <h5>THÙNG RÁC</h5>
            </div>
            <div class="card-body">
                <div class="table-responsive dt-responsive">
                    <div class="dataTables_wrapper dt-bootstrap5">
                        <table class="table table-striped table-bordered nowrap dataTable">
                            <thead>
                                <tr>
                                    <th>#</th>
                                    <th>Thể Loại</th>
                                    <th>Tên</th>
                                    <th>Ngày Xóa</th>
                                    <th>Thao Tác</th>
                                </tr>
                            </thead>
                            <tbody>
                            @foreach ($danhSachDanhMucBaiViet as $index => $danhMucBaiViet)
                                <tr>
                                    <td class="text-center">
                                        
                                    </td>
                                    <td class="text-info">Danh Mục Bài Viết</td>
                                    <td>{{ $danhMucBaiViet->TenDanhMucBaiViet }}</td>
                                    <td>{{ $danhMucBaiViet->deleted_at }}</td>
                                    <td>
                                        <form action="{{ route("ThungRac.restore", $danhMucBaiViet->id) }}" class="d-inline" method="GET" onsubmit="return confirm('Bạn có muốn khôi phục không?'); ">
                                            @csrf
                                            <input type="hidden" name="table" value="danh_muc_bai_viet">
                                            <button type="submit" class="btn btn-success btn-sm">Khôi Phục</button>
                                        </form>
                                    </td>
                                </tr>
                                @endforeach

                                @foreach ($danhSachBaiViet as $index => $BaiViet)
                                <tr>
                                    <td class="text-center">

                                    </td>
                                    <td class="text-info">Bài Viết</td>
                                    <td>{{ $BaiViet->tieu_de }}</td>
                                    <td>{{ $BaiViet->deleted_at }}</td>
                                    <td>
                                        <form action="{{ route("ThungRac.restore", $BaiViet->id) }}" class="d-inline" method="GET" onsubmit="return confirm('Bạn có muốn khôi phục không?'); ">
                                            @csrf
                                            <input type="hidden" name="table" value="bai_viet">
                                            <button type="submit" class="btn btn-success btn-sm">Khôi Phục</button>
                                        </form>
                                    </td>
                                </tr>
                                @endforeach

                                @foreach ($danhSachThuongHieu as $index => $thuongHieu)
                                <tr>
                                    <td class="text-center">
                                        
                                    </td>
                                    <td class="text-danger">Thương Hiệu</td>
                                    <td>{{ $thuongHieu->TenThuongHieu }}</td>
                                    <td>{{ $thuongHieu->deleted_at }}</td>
                                    <td>
                                        <form action="{{ route("ThungRac.restore", $thuongHieu->id) }}" class="d-inline" method="GET" onsubmit="return confirm('Bạn có muốn khôi phục không?'); ">
                                            @csrf
                                            <input type="hidden" name="table" value="thuong_hieu">
                                            <button type="submit" class="btn btn-success btn-sm">Khôi Phục</button>
                                        </form>
                                    </td>
                                </tr>
                                @endforeach

                                @foreach ($danhSachDichVuSanPham as $index => $dichVuSanPham)
                                <tr>
                                    <td class="text-center">
                                        
                                    </td>
                                    <td class="text-dark">Dich Vụ Sản Phẩm</td>
                                    <td>{{ $dichVuSanPham->TenDichVuSanPham }}</td>
                                    <td>{{ $dichVuSanPham->deleted_at }}</td>
                                    <td>
                                        <form action="{{ route("ThungRac.restore", $dichVuSanPham->id) }}" class="d-inline" method="GET" onsubmit="return confirm('Bạn có muốn khôi phục không?'); ">
                                            @csrf
                                            <input type="hidden" name="table" value="dich_vu_san_pham">
                                            <button type="submit" class="btn btn-success btn-sm">Khôi Phục</button>
                                        </form>
                                    </td>
                                </tr>
                                @endforeach

                                @foreach ($danhSachDanhMucSanPham as $index => $danhMucSanPham)
                                <tr>
                                    <td class="text-center">
                                        
                                    </td>
                                    <td class="text-danger">Danh Mục Sản Phẩm</td>
                                    <td>{{ $danhMucSanPham->TenDanhMucSanPham }}</td>
                                    <td>{{ $danhMucSanPham->deleted_at }}</td>
                                    <td>
                                        <form action="{{ route("ThungRac.restore", $danhMucSanPham->id) }}" class="d-inline" method="GET" onsubmit="return confirm('Bạn có muốn khôi phục không?'); ">
                                            @csrf
                                            <input type="hidden" name="table" value="danh_muc_san_pham">
                                            <button type="submit" class="btn btn-success btn-sm">Khôi Phục</button>
                                        </form>
                                    </td>
                                </tr>
                                @endforeach

                                @foreach ($danhSachSanPhamTR as $sanPham)
                                <tr>
                                    <td class="text-center">
                                        
                                    </td>
                                    <td class="text-success">Sản Phẩm</td>
                                    <td>{{ $sanPham->TenSanPham }}</td>
                                    <td>{{ $sanPham->deleted_at }}</td>
                                    <td>
                                        <form action="{{ route("ThungRac.restore", $sanPham->id) }}" class="d-inline" method="GET" onsubmit="return confirm('Bạn có muốn khôi phục không?'); ">
                                            @csrf
                                            <input type="hidden" name="table" value="san_pham">
                                            <button type="submit" class="btn btn-success btn-sm">Khôi Phục</button>
                                        </form>
                                    </td>
                                </tr>
                                @endforeach

                                @foreach ($danhSachThongTinLienHe as $index => $phuongThuc)
                                <tr>
                                    <td class="text-center">
                                        
                                    </td>
                                    <td class="text-info">Thông Tin Liên Hệ</td>
                                    <td>{{ $phuongThuc->TenPhuongThuc }}</td>
                                    <td>{{ $phuongThuc->deleted_at }}</td>
                                    <td>
                                        <form action="{{ route("ThungRac.restore", $phuongThuc->id) }}" class="d-inline" method="GET" onsubmit="return confirm('Bạn có muốn khôi phục không?'); ">
                                            @csrf
                                            <input type="hidden" name="table" value="thong_tin_lien_he">
                                            <button type="submit" class="btn btn-success btn-sm">Khôi Phục</button>
                                        </form>
                                    </td>
                                </tr>
                                @endforeach


                                @foreach ($danhSachBanner as $index => $banner)
                                <tr>
                                    <td class="text-center">
                                        
                                    </td>
                                    <td class="text-info">Banner</td>
                                    <td><img src="{{ Storage::url($banner->HinhAnh) }}" alt="{{ $banner->TenBanner }}" width="100px" class="img-fluid"></td>
                                    <td>{{ $banner->deleted_at }}</td>
                                    <td>
                                        <form action="{{ route("ThungRac.restore", $banner->id) }}" class="d-inline" method="GET" onsubmit="return confirm('Bạn có muốn khôi phục không?'); ">
                                            @csrf
                                            <input type="hidden" name="table" value="banner">
                                            <button type="submit" class="btn btn-success btn-sm">Khôi Phục</button>
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
@endsection