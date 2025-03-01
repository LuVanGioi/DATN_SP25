@extends("clients.themes")


@section("title")
<title>Trang Chủ - WD-14</title>
@endsection

@section("main")
<section class="page-section no-padding slider">
    <div class="container full-width">

        <div class="main-slider">
            <div class="owl-carousel" id="main-slider">

                <div class="item slide1">
                    <img class="slide-img" src="/clients/images/item/banner_item_1.png" alt="">
                </div>

                <div class="item slide2">
                    <img class="slide-img" src="/clients/images/item/banner_item_2.png" alt="">
                </div>

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
                <li class=""><a href="#ban-chay" data-toggle="tab">Bán chạy</a></li>
                <li class="active"><a href="#tat-ca" data-toggle="tab">Tất cả</a></li>
                <li class=""><a href="#giam-gia" data-toggle="tab">Giảm giá</a></li>
            </ul>
        </div>

        <div class="tab-content">

            <div class="tab-pane fade" id="ban-chay">
                <div class="row">
                    <div class="col-md-3 col-sm-6">
                        <div class="thumbnail no-border no-padding">
                            <div class="media">
                                <a class="media-link" href="/san-pham/">
                                    <img src="https://www.sport9.vn/images/thumbs/002/0021481_bo-quan-ao-bong-da-doi-tuyen-quoc-gia-duc-mau-xam.jpeg?preset=large&watermark=default" alt="">
                                </a>
                                <span class="ribbons hot-sale">Flash Sale</span>
                            </div>
                            <div class="caption text-center">

                                <h4 class="caption-title">
                                    <a href="/san-pham/">Áo Bóng Đá Nam Thương Hiệu Adidas, Chất Liệu Da Cá
                                        Sấu Siêu Vip, Hết Từ Để Tả</a>
                                </h4>
                                <div class="categoris-product">
                                    <a href="">Quần áo nam</a>
                                    <a href="">Adidas</a>
                                    <a href="">Da Cá Sấu</a>
                                </div>
                                <div class="price"><ins>550.000đ</ins> <del>610.000đ</del></div>

                                <div class="buttons">
                                    <a class="btn btn-theme btn-theme-transparent btn-wish-list" href="https://www.facebook.com/sharer/sharer.php?u=" target="_blank">
                                        <i class="fa fa-share"></i>
                                    </a>

                                    <a class="btn btn-theme btn-theme-transparent btn-icon-left">
                                        <form action="" method="POST">
                                            <input type="hidden" name="id_product" value="1">
                                            <button type="submit" class="btn-none"><i class="fa fa-shopping-cart"></i> Thêm vào giỏ</button>
                                        </form>
                                    </a>
                                    <a class="btn btn-theme btn-theme-transparent btn-compare"
                                        href="/san-pham/">
                                        <i class="fa fa-circle-info"></i>
                                    </a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="tab-pane fade active in" id="tat-ca">
                <div class="row">
                    <div class="col-md-3 col-sm-6">
                        <div class="thumbnail no-border no-padding">
                            <div class="media">
                                <a class="media-link" href="/san-pham/">
                                    <img src="https://www.sport9.vn/images/thumbs/002/0021481_bo-quan-ao-bong-da-doi-tuyen-quoc-gia-duc-mau-xam.jpeg?preset=large&watermark=default" alt="">
                                </a>
                                <span class="ribbons hot-sale">Flash Sale</span>
                            </div>
                            <div class="caption text-center">

                                <h4 class="caption-title">
                                    <a href="/san-pham/">Áo Bóng Đá Nam Thương Hiệu Adidas, Chất Liệu Da Cá
                                        Sấu Siêu Vip, Hết Từ Để Tả</a>
                                </h4>
                                <div class="categoris-product">
                                    <a href="">Quần áo nam</a>
                                    <a href="">Adidas</a>
                                    <a href="">Da Cá Sấu</a>
                                </div>
                                <div class="price"><ins>550.000đ</ins> <del>610.000đ</del></div>

                                <div class="buttons">
                                    <a class="btn btn-theme btn-theme-transparent btn-wish-list" href="https://www.facebook.com/sharer/sharer.php?u=" target="_blank">
                                        <i class="fa fa-share"></i>
                                    </a>

                                    <a class="btn btn-theme btn-theme-transparent btn-icon-left">
                                        <form action="" method="POST">
                                            @csrf
                                            <input type="hidden" name="id_product" value="1">
                                            <button type="submit" class="btn-none"><i class="fa fa-shopping-cart"></i> Thêm vào giỏ</button>
                                        </form>
                                    </a>
                                    <a class="btn btn-theme btn-theme-transparent btn-compare"
                                        href="/san-pham/">
                                        <i class="fa fa-circle-info"></i>
                                    </a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="tab-pane fade" id="giam-gia">
                <div class="row">
                    <div class="col-md-3 col-sm-6">
                        <div class="thumbnail no-border no-padding">
                            <div class="media">
                                <a class="media-link" href="/san-pham/">
                                    <img src="https://www.sport9.vn/images/thumbs/002/0021481_bo-quan-ao-bong-da-doi-tuyen-quoc-gia-duc-mau-xam.jpeg?preset=large&watermark=default" alt="">
                                </a>
                                <span class="ribbons hot-sale">Flash Sale</span>
                            </div>
                            <div class="caption text-center">

                                <h4 class="caption-title">
                                    <a href="/san-pham/">Áo Bóng Đá Nam Thương Hiệu Adidas, Chất Liệu Da Cá
                                        Sấu Siêu Vip, Hết Từ Để Tả</a>
                                </h4>
                                <div class="categoris-product">
                                    <a href="">Quần áo nam</a>
                                    <a href="">Adidas</a>
                                    <a href="">Da Cá Sấu</a>
                                </div>
                                <div class="price"><ins>550.000đ</ins> <del>610.000đ</del></div>

                                <div class="buttons">
                                    <a class="btn btn-theme btn-theme-transparent btn-wish-list" href="https://www.facebook.com/sharer/sharer.php?u=" target="_blank">
                                        <i class="fa fa-share"></i>
                                    </a>

                                    <a class="btn btn-theme btn-theme-transparent btn-icon-left">
                                        <form action="" method="POST">
                                            <input type="hidden" name="id_product" value="1">
                                            <button type="submit" class="btn-none"><i class="fa fa-shopping-cart"></i> Thêm vào giỏ</button>
                                        </form>
                                    </a>
                                    <a class="btn btn-theme btn-theme-transparent btn-compare"
                                        href="/san-pham/">
                                        <i class="fa fa-circle-info"></i>
                                    </a>
                                </div>
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
        <div class="message-box">
            <div class="message-box-inner">
                <h2>Miễn phí ship cho đơn hàng từ 500.000đ</h2>
            </div>
        </div>
    </div>
</section>

<section class="page-section">
    <div class="container">
        <a class="btn btn-theme btn-title-more btn-icon-left" href="/danh-sach-bai-viet"><i
                class="fas fa-file-lines me-2"></i> Xem tất cả</a>
        <h2 class="block-title"><span>Bài viết gần đây</span></h2>
        <div class="row">

            <div class="col-md-6">
                <div class="recent-post">
                    <div class="media">
                        <a class="pull-left media-link" href="#">
                            <img class="media-object" src="/clients/images/recent-post-1.jpg" alt="">
                            <i class="fa fa-plus"></i>
                        </a>
                        <div class="media-body">
                            <p class="media-category"><a href="#">Tác Giả</a></p>
                            <h4 class="media-heading"><a href="#">Tiêu Đề Bài Viết Nè</a></h4>
                            Nội dung bài viết ngắn...
                            <div class="media-meta">
                                26/02/2025
                                <span class="divider">/</span><a href="#"><i class="fas fa-comment"></i>
                                    27</a>
                                <span class="divider">/</span><a href="#"><i class="fas fa-eye"></i> 18</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

        </div>
    </div>
</section>

<section class="page-section no-padding-top">
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