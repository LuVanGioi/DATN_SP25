@extends("clients.themes")

@section("title")
<title>{{ $thongTinSanPham->TenSanPham }} - {{ $caiDatWebsite->TenCuaHang }}</title>
@endsection

@section('main')
<section class="page-section">
    <div class="container">
        <div class="row product-single">
            <div class="col-md-6">
                <div class="badges">
                    <div class="{{ $thongTinSanPham->Nhan }}">{{ $thongTinSanPham->Nhan }}</div>
                </div>

                <div class="owl-carousel img-carousel">
                    <div class="item">
                        <a class="btn btn-theme btn-theme-transparent btn-zoom" href="{{ Storage::url($thongTinSanPham->HinhAnh) }}" data-gal="prettyPhoto">
                            <i class="fa fa-plus"></i>
                        </a>
                        <a href="{{ Storage::url($thongTinSanPham->HinhAnh) }}" data-gal="prettyPhoto">
                            <img class="img-responsive" src="{{ Storage::url($thongTinSanPham->HinhAnh) }}" alt="">
                        </a>
                    </div>

                    @foreach ($khoAnhSanPham as $khoAnh)
                    <div class="item">
                        <a class="btn btn-theme btn-theme-transparent btn-zoom"
                            href="{{ Storage::url($khoAnh->DuongDan) }}" data-gal="prettyPhoto"><i
                                class="fa fa-plus"></i></a>
                        <a href="{{ Storage::url($khoAnh->DuongDan) }}" data-gal="prettyPhoto"><img
                                class="img-responsive" src="{{ Storage::url($khoAnh->DuongDan) }}" alt="{{ $thongTinSanPham->TenSanPham }}"></a>
                    </div>
                    @endforeach
                </div>
                <div class="row product-thumbnails">
                    @foreach ($khoAnhSanPham as $index => $khoAnh1)
                    <div class="col-xs-2 col-sm-2 col-md-3">
                        <a href="#" onclick="jQuery('.img-carousel').trigger('to.owl.carousel', [<?=$index + 1?>, 300]);">
                            <img src="{{ Storage::url($khoAnh->DuongDan) }}" alt="{{ $thongTinSanPham->TenSanPham }}"></a></div>
                    @endforeach
                </div>
            </div>
            <div class="col-md-6">
                <h2 class="product-title">{{ $thongTinSanPham->TenSanPham }}</h2>
                <div class="product-rating clearfix">
                    <div class="rating">
                        <span class="fas fa-star text-warning"></span>
                        <span class="fas fa-star text-warning"></span>
                        <span class="fas fa-star text-warning"></span>
                        <span class="fas fa-star text-warning"></span>
                        <span class="fas fa-star text-warning"></span>
                    </div>
                    <a class="reviews">16 reviews</a>
                </div>
                <div class="product-availability">Danh Mục: <strong>{{ $danhMuc->TenDanhMucSanPham }}</strong></div>
                <div class="product-availability">Thương Hiệu: <strong>{{ $thuongHieu->TenThuongHieu }}</strong></div>
                <div class="product-availability">Chất Liệu: <strong>{{ $thongTinSanPham->ChatLieu }}</strong></div>
                <hr class="page-divider small">

                <div class="product-price">{{ number_format($thongTinSanPham->GiaSanPham) }} đ - <del style="color:rgb(115, 115, 115)">{{ number_format($thongTinSanPham->GiaKhuyenMai) }} đ</del></div>
                <hr class="page-divider">

                <form action="#" class="row variable">
                    <div class="col-sm-6">
                        <div class="form-group selectpicker-wrapper">
                            <label for="exampleSelect1">Kích Cỡ</label>
                            <select id="exampleSelect1" name="size" class="selectpicker input-price"
                                data-live-search="true" data-width="100%" data-toggle="tooltip"
                                title="Select">
                                <option>Chọn Kích Cỡ</option>

                                <option>Size 1</option>

                            </select>
                        </div>
                    </div>
                    <div class="col-sm-6">
                        <div class="form-group selectpicker-wrapper">
                            <label for="exampleSelect2">Màu Sắc</label>
                            <select id="exampleSelect2" class="selectpicker input-price"
                                data-live-search="true" data-width="100%" data-toggle="tooltip"
                                title="Select">
                                <option>Màu Sắc</option>
                                <option>Color 1</option>
                                <option>Color 2</option>
                            </select>
                        </div>
                    </div>
                </form>
                <hr class="page-divider small">


                <div class="buttons mb-3">
                    <div class="quantity">
                        <button class="btn" onclick="minusAmount()"><i class="fa fa-minus"></i></button>
                        <input class="form-control qty" type="number" step="1" min="1" name="quantity"
                            value="1" title="Qty">
                        <button class="btn" onclick="plusAmount()"><i class="fa fa-plus"></i></button>
                    </div>
                </div>

                <div class="buttons mt-3" style="margin-top: 10px;">
                    <button class="btn btn-theme btn-cart btn-icon-left" type="button"><i
                            class="fa fa-shopping-cart"></i> Thêm Vào Giỏ</button>
                    <button class="btn btn-theme btn-cart btn-icon-left" type="submit"><i
                            class="fa fa-shopping-cart"></i> Mua Ngay</button>
                </div>

                <hr class="page-divider small">

                <ul class="social-icons list-inline">
                    <li><a href="#" class="facebook"><i class="fab fa-facebook"></i></a></li>
                    <li><a href="#" class="twitter"><i class="fab fa-twitter"></i></a></li>
                    <li><a href="#" class="instagram"><i class="fab fa-instagram"></i></a></li>
                    <li><a href="#" class="pinterest"><i class="fab fa-pinterest"></i></a></li>
                </ul>

            </div>
        </div>

    </div>
</section>

<section class="page-section md-padding">
    <div class="container">
        <div class="row blocks shop-info-banners">
            <div class="col-md-4">
                <div class="block">
                    <div class="media">
                        <div class="pull-right"><i class="fa fa-credit-card"></i></div>
                        <div class="media-body">
                            <h4 class="media-heading">Thanh toán</h4>
                            Thanh toán qua các cổng online và COD 1 cách nhanh chóng.
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md-4">
                <div class="block">
                    <div class="media">
                        <div class="pull-right"><i class="fa fa-headset"></i></div>
                        <div class="media-body">
                            <h4 class="media-heading">Hỗ trợ</h4>
                            Đội ngũ hỗ trợ 24/7. Sẵn sàng giúp bạn tư vấn và giải đáp thắc mắc.
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md-4">
                <div class="block">
                    <div class="media">
                        <div class="pull-right"><i class="fa fa-rotate-left"></i></div>
                        <div class="media-body">
                            <h4 class="media-heading">Hoàn trả</h4>
                            Có hỗ trợ đổi trả hàng, bạn nhận lại 100% giá trị đơn hàng.
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<section class="page-section">
    <div class="container">
        <div class="tabs-wrapper content-tabs">
            <ul class="nav nav-tabs">
                <li class="active"><a href="#item-description" data-toggle="tab">Thông Tin Sản Phẩm</a></li>
                <li><a href="#reviews" data-toggle="tab">Đánh Giá (2)</a></li>
            </ul>
            <div class="tab-content">
                <div class="tab-pane fade in active" id="item-description">
                    <p>{!! $thongTinSanPham->Mota !!}</p>
                </div>
                <div class="tab-pane fade" id="reviews">
                    <div class="comments">

                        <div class="media comment">
                            <a href="#" class="pull-left comment-avatar">
                                <img alt="" src="/images/avatar-1.jpg" class="media-object">
                            </a>
                            <div class="media-body">
                                <p class="comment-meta">
                                    <span class="comment-author">
                                        <a>MạnhDev</a>
                                        <span class="comment-date"> 4 Ngày Trước <i class="fa fa-flag"></i></span>
                                    </span>
                                </p>
                                <p class="comment-text">Xin Chào</p>
                            </div>
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<section class="page-section">
    <div class="container">
        <h2 class="section-title" style="font-size: 25px;padding: 20px 0px;"><span>Sản Phẩm Liên Quan</span></h2>
        <div class="featured-products-carousel">
            <div class="owl-carousel" id="featured-products-carousel">
                @foreach ($danhSachSanPham as $i => $sanPhamKhac)
                @if ($sanPhamKhac->DuongDan !== $thongTinSanPham->DuongDan && $i++ <= 10)
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

<section class="page-section">
    <div class="container">
        <h2 class="section-title"><span>THƯƠNG HIỆU</span></h2>
        <div class="partners-carousel">
            <div class="owl-carousel" id="partners">
                @foreach ($allThuongHieu as $danhSachThuongHieu)
                <div>
                    <a href="/thuong-hieu/{{ xoadau($danhSachThuongHieu->TenThuongHieu) }}">
                        <img src="{{ Storage::url($danhSachThuongHieu->HinhAnh) }}" alt="" height="90px">
                    </a>
                </div>
                @endforeach
            </div>
        </div>
    </div>
</section>
@endsection