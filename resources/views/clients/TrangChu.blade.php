@extends("clients.themes")


@section("title")
<title>Trang Chủ - WD-14</title>
@endsection

@section("main")
<section class="page-section no-padding slider">
    <div class="container full-width">

        <div class="main-slider">
            <div class="owl-carousel" id="main-slider">
                @foreach ($tatCaBanner as $Banner)
                <div class="item slide1">
                    <a href="<?= $Banner->TenBanner; ?>"><img class="slide-img" src="{{ Storage::url($Banner->HinhAnh) }}" alt=""></a>
                </div>
                @endforeach
            </div>
        </div>

    </div>
</section>

<section class="page-section">
    <div class="container">
        <div class="row">
            <div class="col-md-6">
                <div class="thumbnail no-border no-padding thumbnail-banner size-1x3">
                    <div class="media">
                        <a class="media-link" href="/hang-moi-ve">
                            <div class="img-bg"
                                style="background-image: url('/clients/images/item/banner_item_1.png')"></div>
                            <div class="caption">
                                <div class="caption-wrapper div-table">
                                    <div class="caption-inner div-cell">
                                        <h2 class="caption-title"><span>Tất cả</span></h2>
                                        <h3 class="caption-sub-title"><span>Sản phẩm mới</span>
                                        </h3>
                                        <span class="btn btn-theme btn-theme-sm">Xem ngay</span>
                                    </div>
                                </div>
                            </div>
                        </a>
                    </div>
                </div>
            </div>
            <div class="col-md-6">
                <div class="thumbnail no-border no-padding thumbnail-banner size-1x3">
                    <div class="media">
                        <a class="media-link" href="/hang-giam-gia">
                            <div class="img-bg"
                                style="background-image: url('/clients/images/item/banner_item_2.png')"></div>
                            <div class="caption text-right">
                                <div class="caption-wrapper div-table">
                                    <div class="caption-inner div-cell">
                                        <h2 class="caption-title"><span>Tất cả</span></h2>
                                        <h3 class="caption-sub-title"><span>Sản phẩm giảm giá</span>
                                        </h3>
                                        <span class="btn btn-theme btn-theme-sm">Xem ngay</span>
                                    </div>
                                </div>
                            </div>
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<section class="page-section">
    <div class="container">
        <div class="tabs">
            <ul id="tabs" class="nav nav-justified-off">
                <li class="active"><a href="#tat-ca" data-toggle="tab">Danh Sách Sản Phẩm</a></li>
            </ul>
        </div>

        <div class="tab-content">
            <div class="tab-pane fade active in" id="tat-ca">
                <div class="row">
                    @foreach ($tatCaSanPham as $sanPham)
                    @php
                    $luotMua = DB::table("san_pham_don_hang")->where("Id_SanPham", $sanPham->id)->count();
                    @endphp
                    <div class="col-md-3 col-sm-3">
                        <div class="thumbnail product-item">
                            <div class="media">
                                <a class="media-link" href="{{ route("san-pham.show", xoadau($sanPham->TenSanPham)) }}">
                                    <img src="{{ Storage::url($sanPham->HinhAnh) }}" alt="">
                                </a>
                                @if ($sanPham->Nhan)
                                <span class="ribbons {{ $sanPham->Nhan }}">{{ nhan($sanPham->Nhan) }}</span>
                                @endif
                                <div class="title-time">
                                    {{ $sanPham->ChatLieu }}
                                </div>
                            </div>
                            <div class="caption text-center">
                                <h4 class="caption-title">
                                    <a href="{{ route("san-pham.show", xoadau($sanPham->TenSanPham)) }}">{{ $sanPham->TenSanPham }}</a>
                                </h4>
                                <div class="price" style="align-items: center; margin-top: 10px">
                                    <ins>{{ number_format($sanPham->GiaSanPham) }}đ</ins>
                                    <span>Đã bán {{ soGon($luotMua) }}</span>
                                </div>
                            </div>
                        </div>
                    </div>
                    @endforeach
                </div>
            </div>
        </div>

    </div>
</section>

<section class="page-section">
    <div class="container">
        <div class="message-box">
            <div class="message-box-inner">
                <h2>Miễn phí ship cho đơn hàng từ 500.000đ</h2>
            </div>
        </div>
    </div>
</section>

<section class="page-section">
    <div class="container">
        <a class="btn btn-theme btn-title-more btn-icon-left" href="/danh-sach-bai-viet"><i class="fas fa-file-lines me-2"></i> Xem tất cả</a>
        <h2 class="block-title"><span>Bài Viết</span></h2>
        <div class="row">
            @foreach ($tatCaBaiViet as $baiViet)
            <div class="col-md-6">
                <div class="recent-post">
                    <div class="media">
                        <a class="pull-left" href="/bai-viet/{{ ($baiViet->id) }}">
                            <img class="media-object" src="{{ Storage::url($baiViet->hinh_anh) }}" width="150px" height="100px" alt="">
                        </a>
                        <div class="media-body">
                            <h5 class="card-title media-category" style="text-transform: uppercase;">{{ $baiViet->tieu_de }}</h5>
                            <p class="media-content">{{ Str::limit(strip_tags(html_entity_decode($baiViet->noi_dung)), 100, '...') }}</p>
                            <div class="media-meta">
                                {{ $baiViet->ngay_dang }}
                                <span class="divider">/</span><i class="fas fa-comment"></i> {{ rand(1, 100) }}
                                <span class="divider">/</span><i class="fas fa-eye"></i> {{ rand(1, 1000) }}
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            @endforeach
            <!-- Nút chuyển trang -->
            <div class="d-flex justify-content-center mt-4">
                {{ $tatCaBaiViet->links() }}
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
@endsection