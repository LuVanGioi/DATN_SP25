@extends("clients.themes")

@section("title")
<title>Giỏ Hàng - {{ $caiDatWebsite->TenCuaHang }}</title>
@endsection

@section('main')
<section class="page-section breadcrumbs">
    <div class="container">
        <div class="page-header">
            <h1>Giỏ Hàng</h1>
        </div>
        <ul class="breadcrumb">
            <li><a href="/">Trang Chủ</a></li>
            <li class="active">Giỏ Hàng</li>
        </ul>
    </div>
</section>

<section class="page-section color">
    <div class="container">
        <div class="row orders">
            <div class="col-md-8">
                <h3 class="block-title"><span>Danh Sách Giỏ Hàng</span></h3>
                <table class="table">
                    <thead>
                        <tr>
                            <th>Sản Phẩm</th>
                            <th>Số Lượng</th>
                            <th>Giá Tiền</th>
                            <th>Tổng Tiền</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($danhSachGioHangClient as $gioHangClient)
                        <tr>
                            <td class="image">
                                <a class="media-link" href="/san-pham/{{ $gioHangClient->DuongDan }}"><i class="fa fa-circle-info"></i>
                                    <img src="{{ Storage::url($gioHangClient->HinhAnh) }}" alt="" style="width: 100px; height: 100px" />
                                </a>
                                <h4><a href="/san-pham/{{ $gioHangClient->DuongDan }}">{{ $gioHangClient->TenSanPham }}</a></h4>
                                {{ $gioHangClient->TenKichCo }} - {{ $gioHangClient->TenMauSac }}
                            </td>
                            <td class="quantity">x{{ number_format($gioHangClient->SoLuong) }}</td>
                            <td class="quantity">{{ number_format($gioHangClient->GiaSanPham) }} đ</td>
                            <td class="total">{{ number_format($gioHangClient->ThanhTien) }} đ
                                <form action="{{ route("gio-hang.destroy", $gioHangClient->cart_id) }}" method="POST" class="d-inline">
                                    @csrf
                                    @method("DELETE")
                                    <button type="submit" class="btn btn-none"><i class="fa fa-close"></i></button>
                                </form>
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
            @php
            $giamGia = session('giamGia', 0);
            $tongTienSauGiam = $tongTienSanPhamGioHangClient - $giamGia;
            @endphp
            <div class="col-md-4">
                <h3 class="block-title"><span>Thống Kê Giỏ Hàng</span></h3>
                <div class="shopping-cart">
                    <table>
                        <tr>
                            <td style="text-align: start">Số Lượng:</td>
                            <td style="text-align: start; font-weight: bold">{{ number_format($soLuongGioHangClient) }}</td>
                        </tr>
                        <tr>
                            <td style="text-align: start">Tạm Tính:</td>
                            <td style="text-align: start; font-weight: bold">{{ number_format($tongTienSanPhamGioHangClient) }} đ</td>
                        </tr>
                        <tr>
                            <td style="text-align: start">Giảm Giá:</td>
                            <td style="text-align: start; font-weight: bold">{{ number_format($giamGia) }}</td>
                        </tr>
                        <tfoot>
                            <tr>
                                <td>Tổng Tiền:</td>
                                <td>{{ number_format($tongTienSauGiam) }} đ</td>
                            </tr>
                        </tfoot>
                    </table>
                    <form action="{{ route("pay") }}" method="POST">
                        @csrf

                        <div class="form-group">
                            <input class="form-control" type="text" name="discount" placeholder="Nhập mã giảm giá của bạn" value="{{ old("discount") }}" />
                            @error("discount")
                            <p class="text-danger">{{ $message }}</p>
                            @enderror
                            @if (session('error'))
                            <p class="text-danger">{{ session('error') }}</p>
                            @endif
                            @if (session('success'))
                            <p class="text-success">{{ session('success') }}</p>
                            @endif
                        </div>
                        <button type="submit" name="action" value="acept_voucher" class="btn btn-primary btn-block" @if ($soLuongGioHangClient <=0)
                            disabled
                            @endif>Áp Dụng Mã</button>
                        <button type="submit" name="action" value="payment" class="btn btn-success btn-block" @if ($soLuongGioHangClient <=0)
                            disabled
                            @endif>Tiếp Tục <i class="fas fa-arrow-right"></i></button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</section>

<section class="page-section">
    <div class="container">
        <div class="row blocks shop-info-banners">
            <div class="col-md-4">
                <div class="block">
                    <div class="media">
                        <div class="pull-right"><i class="fa fa-gift"></i></div>
                        <div class="media-body">
                            <h4 class="media-heading">Mua 1 Tặng 1</h4>
                            Nhận ưu đãi đặc biệt khi mua sắm tại cửa hàng của chúng tôi.
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md-4">
                <div class="block">
                    <div class="media">
                        <div class="pull-right"><i class="fa fa-comments"></i></div>
                        <div class="media-body">
                            <h4 class="media-heading">Gọi Miễn Phí</h4>
                            Liên hệ với chúng tôi để được tư vấn miễn phí về sản phẩm.
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md-4">
                <div class="block">
                    <div class="media">
                        <div class="pull-right"><i class="fa fa-trophy"></i></div>
                        <div class="media-body">
                            <h4 class="media-heading">Hoàn Tiền!</h4>
                            Đảm bảo hoàn tiền nếu bạn không hài lòng với sản phẩm.
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<section class="page-section">
    <div class="container">
        <h2 class="section-title" style="font-size: 25px;padding: 20px 0px;"><span>Sản Phẩm Khác</span></h2>
        <div class="featured-products-carousel">
            <div class="owl-carousel" id="featured-products-carousel">
                @foreach ($danhSachSanPham as $i => $sanPhamKhac)
                @if ($i++ <= 10)
                    <div class="thumbnail no-border no-padding">
                    <div class="media">
                        <a class="media-link" href="{{ route("san-pham.show", xoadau($sanPhamKhac->TenSanPham)) }}">
                            <img src="{{ Storage::url($sanPhamKhac->HinhAnh) }}" alt="">
                        </a>
                        @if ($sanPhamKhac->Nhan)
                        <span class="ribbons {{ $sanPhamKhac->Nhan }}">{{ nhan($sanPhamKhac->Nhan) }}</span>
                        @endif
                    </div>
                    <div class="caption text-center">
                        <h4 class="caption-title">
                            <a href="{{ route("san-pham.show", xoadau($sanPhamKhac->TenSanPham)) }}">{{ $sanPhamKhac->TenSanPham }}</a>
                        </h4>
                        <div class="categoris-product">
                            <a href="">Quần áo nam</a>
                            <a href="">Adidas</a>
                            <a href="">{{ $sanPhamKhac->ChatLieu }}</a>
                        </div>
                        <div class="price">
                            <ins>{{ number_format($sanPhamKhac->GiaSanPham) }}đ</ins>
                            @if ($sanPhamKhac->GiaKhuyenMai)
                            <del>{{ number_format($sanPhamKhac->GiaKhuyenMai) }}đ</del>
                            @endif
                        </div>
                        <div class="buttons">
                            <a class="btn btn-theme btn-theme-transparent btn-wish-list" href="https://www.facebook.com/sharer/sharer.php?u={{ route("san-pham.show", xoadau($sanPhamKhac->TenSanPham)) }}" target="_blank">
                                <i class="fa fa-share"></i>
                            </a>

                            <a class="btn btn-theme btn-theme-transparent btn-icon-left">
                                <form action="{{ route("gio-hang.store") }}" method="POST">
                                    @csrf
                                    <input type="hidden" name="id_product" value="{{ $sanPhamKhac->id }}">
                                    <button type="submit" class="btn-none"><i class="fa fa-shopping-cart"></i> Thêm vào giỏ</button>
                                </form>
                            </a>
                            <a class="btn btn-theme btn-theme-transparent btn-compare"
                                href="{{ route("san-pham.show", xoadau($sanPhamKhac->TenSanPham)) }}">
                                <i class="fa fa-circle-info"></i>
                            </a>
                        </div>
                    </div>
            </div>
            @endif
            @endforeach
        </div>
    </div>
    <hr class="page-divider half">
    <a class="btn btn-theme btn-view-more-block" href="/" style="max-width: 100%;">Xem Thêm</a>
    </div>
</section>
@endsection