@extends("clients.themes")

@section("title")
    <title>Đơn Hàng Hủy - {{ $caiDatWebsite->TenCuaHang }}</title>
@endsection

@section('main')
    <section class="page-section breadcrumbs">
        <div class="container">
            <div class="page-header">
                <h1>HỦY HÀNG</h1>
            </div>
        </div>
    </section>

    <section class="page-section color">
        <div class="container">
            @if(session("error"))
                <div class="alert alert-danger mb-2">{{ session("error") }}</div>
            @endif

            @if(session("success"))
                <div class="alert alert-success mb-2">{{ session("success") }}</div>
            @endif
            <div class="row orders mt-3">
                <div class="col-md-8">
                    <h3 class="block-title"><span>Danh Sách Đơn Hàng</span></h3>
                    <table class="table">
                        <thead>
                            <tr>
                                <th>#</th>
                                <th>Sản Phẩm</th>
                                <th>Số Lượng</th>
                                <th>Giá Tiền</th>
                                <th>Tổng Tiền</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($lichSu as $item)
                             @foreach (DB::table('san_pham_don_hang')
                             ->join('san_pham', 'san_pham_don_hang.Id_SanPham', '=', 'san_pham.id')
                             ->where('MaDonHang', $item->MaDonHang)->get() as $sanPhamDonHang)
                                <tr>
                                    <td class="image">
                                            <img src="<?= Storage::url($sanPhamDonHang->HinhAnh); ?>" alt="" style="width: 100px; height: 100px" />
                                        <h4>{{ $sanPhamDonHang->TenSanPham  }}</h4>
                                        <span class="parameter-product-cart">{{ $sanPhamDonHang->KichCo }} - {{ $sanPhamDonHang->MauSac }}</span>
                                    </td>

                                    <td class="quantity money">
                                        <span>{{ $sanPhamDonHang->SoLuong }}</span>
                                    </td>

                                    <td class="quantity money">
                                        ₫{{ number_format($sanPhamDonHang->GiaSanPham) }}</td>
                                    <td class="total">
                                        ₫{{ number_format($item->TongTien) }}</td>
                                </tr>
                            @endforeach
                            @endforeach
                        </tbody>

                    </table>
                    <div class="text-right ">
                        <button type="submit" class="btn btn-danger btn-lg float-end">Hủy Hàng</button>
                    </div>
                </div>
                
                <div class="col-lg-3 col-md-3 col-sm-3">
                <div class="widget account-details">
                    <h2 class="widget-title">Tài Khoản</h2>
                    <ul>
                        <li class="active"><a href="/thong-tin-tai-khoan"> Thông Tin Tài Khoản </a></li>
                        <li><a href="/doi-mat-khau">Đổi Mật Khẩu</a></li>
                        <li><a href="/lich-su-don-hang">Lịch Sử Đơn Hàng</a></li>
                        <li><a href="/danh-gia-va-nhan-xet">Đánh Giá và Nhận Xét</a></li>
                        <li><a href="/yeu-cau-tra-hang">Yêu Cầu Trả Hàng</a></li>
                    </ul>
                </div>
            </div>
            </div>


           
        </div>
    </section>
@endsection