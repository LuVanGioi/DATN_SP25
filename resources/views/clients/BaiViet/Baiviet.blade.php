@extends("clients.themes")

@section("title")
    <title>Bài Viết - WD-14</title>
@endsection

@section('main')
    <section class="page-section breadcrumbs">
        <div class="container">
            <div class="page-header">
                <h1>Trang Bài Viết</h1>
            </div>
            <ul class="breadcrumb">
                <li><a href="#">Trang Chủ</a></li>
                <li><a href="#">Cửa Hàng</a></li>
                <li class="active">Blog Với Sidebar Bên Trái</li>
            </ul>
        </div>
    </section>

    <section class="page-section with-sidebar">
        <div class="container">
            <div class="row">
                <aside class="col-md-3 sidebar" id="sidebar">
                    <div class="widget">
                        <div class="widget-search">
                            <input class="form-control" type="text" placeholder="Search">
                            <button><i class="fa fa-search"></i></button>
                        </div>
                    </div>
                    <div class="widget shop-categories">
                        <h4 class="widget-title">Danh Mục</h4>
                        <div class="widget-content">
                            <ul>
                                <li>
                                    <span class="arrow"><i class="fa fa-angle-down"></i></span>
                                    <a href="#">Nữ</a>
                                    <ul class="children">
                                        <li>
                                            <a href="#">Áo Len & Đan
                                                <span class="count">12</span>
                                            </a>
                                        </li>
                                        <li>
                                            <a href="#">Áo Khoác & Áo Choàng
                                                <span class="count">12</span>
                                            </a>
                                        </li>
                                        <li>
                                            <a href="#">Denim
                                                <span class="count">12</span>
                                            </a>
                                        </li>
                                        <li>
                                            <a href="#">Quần
                                                <span class="count">12</span>
                                            </a>
                                        </li>
                                        <li>
                                            <a href="#">Quần Short
                                                <span class="count">12</span>
                                            </a>
                                        </li>
                                    </ul>
                                </li>
                                <li>
                                    <span class="arrow"><i class="fa fa-angle-down"></i></span>
                                    <a href="#">Nam</a>
                                    <ul class="children">
                                        <li>
                                            <a href="#">Áo Len & Đan
                                                <span class="count">12</span>
                                            </a>
                                        </li>
                                        <li>
                                            <a href="#">Áo Khoác & Áo Choàng
                                                <span class="count">12</span>
                                            </a>
                                        </li>
                                        <li>
                                            <a href="#">Denim
                                                <span class="count">12</span>
                                            </a>
                                        </li>
                                        <li>
                                            <a href="#">Quần
                                                <span class="count">12</span>
                                            </a>
                                        </li>
                                        <li>
                                            <a href="#">Quần Short
                                                <span class="count">12</span>
                                            </a>
                                        </li>
                                    </ul>
                                </li>
                                <li>
                                    <span class="arrow"><i class="fa fa-angle-down"></i></span>
                                    <a href="#">Váy</a>
                                    <ul class="children">
                                        <li>
                                            <a href="#">Áo Len & Đan
                                                <span class="count">12</span>
                                            </a>
                                        </li>
                                        <li>
                                            <a href="#">Áo Khoác & Áo Choàng
                                                <span class="count">12</span>
                                            </a>
                                        </li>
                                        <li>
                                            <a href="#">Denim
                                                <span class="count">12</span>
                                            </a>
                                        </li>
                                        <li>
                                            <a href="#">Quần
                                                <span class="count">12</span>
                                            </a>
                                        </li>
                                        <li>
                                            <a href="#">Quần Short
                                                <span class="count">12</span>
                                            </a>
                                        </li>
                                    </ul>
                                </li>
                                <li>
                                    <span class="arrow"><i class="fa fa-angle-down"></i></span>
                                    <a href="#">Bán Chạy</a>
                                    <ul class="children">
                                        <li>
                                            <a href="#">Áo Len & Đan
                                                <span class="count">12</span>
                                            </a>
                                        </li>
                                        <li>
                                            <a href="#">Áo Khoác & Áo Choàng
                                                <span class="count">12</span>
                                            </a>
                                        </li>
                                        <li>
                                            <a href="#">Denim
                                                <span class="count">12</span>
                                            </a>
                                        </li>
                                        <li>
                                            <a href="#">Quần
                                                <span class="count">12</span>
                                            </a>
                                        </li>
                                        <li>
                                            <a href="#">Quần Short
                                                <span class="count">12</span>
                                            </a>
                                        </li>
                                    </ul>
                                </li>
                                <li>
                                    <span class="arrow"><i class="fa fa-angle-up"></i></span>
                                    <a href="#">Phụ Kiện</a>
                                    <ul class="children active">
                                        <li>
                                            <a href="#">Áo Len & Đan
                                                <span class="count">12</span>
                                            </a>
                                        </li>
                                        <li>
                                            <a href="#">Áo Khoác & Áo Choàng
                                                <span class="count">12</span>
                                            </a>
                                        </li>
                                        <li>
                                            <a href="#">Denim
                                                <span class="count">12</span>
                                            </a>
                                        </li>
                                        <li>
                                            <a href="#">Quần
                                                <span class="count">12</span>
                                            </a>
                                        </li>
                                        <li>
                                            <a href="#">Quần Short
                                                <span class="count">12</span>
                                            </a>
                                        </li>
                                    </ul>
                                </li>
                                <li><a href="#">Giảm Giá</a></li>
                            </ul>
                        </div>
                    </div>
                    <div class="widget widget-tabs alt">
                        <div class="widget-content">
                            <ul id="tabs" class="nav nav-justified">
                                <li><a href="#tab-s1" data-toggle="tab">Bài viết gần đây</a></li>
                                <li class="active"><a href="#tab-s2" data-toggle="tab">Bài viết phổ biến</a></li>
                            </ul>
                            <div class="tab-content">
                                <div class="tab-pane fade" id="tab-s1">
                                    <div class="recent-post">
                                        <div class="media">
                                            <a class="pull-left media-link" href="#">
                                                <img class="media-object" src="clients/images/recent-post-1.jpg" alt="">
                                                <i class="fa fa-plus"></i>
                                            </a>
                                            <div class="media-body">
                                                <div class="media-meta">
                                                    6 tháng 6, 2014
                                                    <span class="divider">/</span><a href="#"><i
                                                            class="fa fa-comment"></i>27</a>
                                                </div>
                                                <h4 class="media-heading"><a href="#">Tiêu đề bài viết chuẩn</a></h4>
                                            </div>
                                        </div>
                                        <div class="media">
                                            <a class="pull-left media-link" href="#">
                                                <img class="media-object" src="clients/images/recent-post-3.jpg" alt="">
                                                <i class="fa fa-plus"></i>
                                            </a>
                                            <div class="media-body">
                                                <div class="media-meta">
                                                    6 tháng 6, 2014
                                                    <span class="divider">/</span><a href="#"><i
                                                            class="fa fa-comment"></i>27</a>
                                                </div>
                                                <h4 class="media-heading"><a href="#">Tiêu đề bài viết chuẩn</a></h4>
                                            </div>
                                        </div>
                                        <div class="media">
                                            <a class="pull-left media-link" href="#">
                                                <img class="media-object" src="clients/images/recent-post-2.jpg"
                                                    alt="">
                                                <i class="fa fa-plus"></i>
                                            </a>
                                            <div class="media-body">
                                                <div class="media-meta">
                                                    6 tháng 6, 2014
                                                    <span class="divider">/</span><a href="#"><i
                                                            class="fa fa-comment"></i>27</a>
                                                </div>
                                                <h4 class="media-heading"><a href="#">Tiêu đề bài viết chuẩn</a></h4>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="tab-pane fade in active" id="tab-s2">
                                    <div class="recent-post">
                                        <div class="media">
                                            <a class="pull-left media-link" href="#">
                                                <img class="media-object" src="clients/images/recent-post-1.jpg"
                                                    alt="">
                                                <i class="fa fa-plus"></i>
                                            </a>
                                            <div class="media-body">
                                                <div class="media-meta">
                                                    6 tháng 6, 2014
                                                    <span class="divider">/</span><a href="#"><i
                                                            class="fa fa-comment"></i>27</a>
                                                </div>
                                                <h4 class="media-heading"><a href="#">Tiêu đề bài viết chuẩn</a></h4>
                                            </div>
                                        </div>
                                        <div class="media">
                                            <a class="pull-left media-link" href="#">
                                                <img class="media-object" src="clients/images/recent-post-2.jpg"
                                                    alt="">
                                                <i class="fa fa-plus"></i>
                                            </a>
                                            <div class="media-body">
                                                <div class="media-meta">
                                                    6 tháng 6, 2014
                                                    <span class="divider">/</span><a href="#"><i
                                                            class="fa fa-comment"></i>27</a>
                                                </div>
                                                <h4 class="media-heading"><a href="#">Tiêu đề bài viết chuẩn</a></h4>
                                            </div>
                                        </div>
                                        <div class="media">
                                            <a class="pull-left media-link" href="#">
                                                <img class="media-object" src="clients/images/recent-post-3.jpg"
                                                    alt="">
                                                <i class="fa fa-plus"></i>
                                            </a>
                                            <div class="media-body">
                                                <div class="media-meta">
                                                    6 tháng 6, 2014
                                                    <span class="divider">/</span><a href="#"><i
                                                            class="fa fa-comment"></i>27</a>
                                                </div>
                                                <h4 class="media-heading"><a href="#">Tiêu đề bài viết chuẩn</a></h4>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <a class="btn btn-theme btn-theme-transparent btn-theme-sm btn-block" href="#">Xem thêm sản
                                phẩm</a>
                        </div>
                    </div>
                    <div class="widget shop-categories">
                        <h4 class="widget-title">Lưu Trữ</h4>
                        <div class="widget-content">
                            <ul>
                                <li>
                                    <span class="arrow"><i class="fa fa-angle-down"></i></span>
                                    <a href="#">Tháng Một<span class="count">12</span></a>
                                    <ul class="children">
                                        <li>
                                            <a href="#">Tên Bài Viết Mẫu</a>
                                        </li>
                                        <li>
                                            <a href="#">Tên Bài Viết Mẫu</a>
                                        </li>
                                        <li>
                                            <a href="#">Tên Bài Viết Mẫu</a>
                                        </li>
                                    </ul>
                                </li>
                                <li>
                                    <span class="arrow"><i class="fa fa-angle-down"></i></span>
                                    <a href="#">Tháng Hai<span class="count">12</span></a>
                                    <ul class="children">
                                        <li>
                                            <a href="#">Tên Bài Viết Mẫu</a>
                                        </li>
                                        <li>
                                            <a href="#">Tên Bài Viết Mẫu</a>
                                        </li>
                                        <li>
                                            <a href="#">Tên Bài Viết Mẫu</a>
                                        </li>
                                    </ul>
                                </li>
                                <li>
                                    <span class="arrow"><i class="fa fa-angle-down"></i></span>
                                    <a href="#">Tháng Ba<span class="count">12</span></a>
                                    <ul class="children">
                                        <li>
                                            <a href="#">Tên Bài Viết Mẫu</a>
                                        </li>
                                        <li>
                                            <a href="#">Tên Bài Viết Mẫu</a>
                                        </li>
                                        <li>
                                            <a href="#">Tên Bài Viết Mẫu</a>
                                        </li>
                                    </ul>
                                </li>
                                <li>
                                    <span class="arrow"><i class="fa fa-angle-down"></i></span>
                                    <a href="#">Tháng Tư<span class="count">12</span></a>
                                    <ul class="children">
                                        <li>
                                            <a href="#">Tên Bài Viết Mẫu</a>
                                        </li>
                                        <li>
                                            <a href="#">Tên Bài Viết Mẫu</a>
                                        </li>
                                        <li>
                                            <a href="#">Tên Bài Viết Mẫu</a>
                                        </li>
                                    </ul>
                                </li>
                                <li>
                                    <span class="arrow"><i class="fa fa-angle-up"></i></span>
                                    <a href="#">Tháng Năm<span class="count">12</span></a>
                                    <ul class="children active">
                                        <li>
                                            <a href="#">Tên Bài Viết Mẫu</a>
                                        </li>
                                        <li>
                                            <a href="#">Tên Bài Viết Mẫu</a>
                                        </li>
                                        <li>
                                            <a href="#">Tên Bài Viết Mẫu</a>
                                        </li>
                                    </ul>
                                </li>
                            </ul>
                        </div>
                    </div>
                    <div class="widget widget-flickr-feed">
                        <a class="btn btn-theme btn-title-more" href="#">Xem Tất Cả</a>
                        <h4 class="widget-title"><span>Hình Ảnh Flickr</span></h4>
                        <ul>
                            <li><a href="#"><img src="clients/images/flickr-feed-8.jpg" alt="//"></a></li>
                            <li><a href="#"><img src="clients/images/flickr-feed-9.jpg" alt="//"></a></li>
                            <li><a href="#"><img src="clients/images/flickr-feed-10.jpg" alt="//"></a></li>
                            <li><a href="#"><img src="clients/images/flickr-feed-11.jpg" alt="//"></a></li>
                            <li><a href="#"><img src="clients/images/flickr-feed-12.jpg" alt="//"></a></li>
                            <li><a href="#"><img src="clients/images/flickr-feed-13.jpg" alt="//"></a></li>
                            <li><a href="#"><img src="clients/images/flickr-feed-14.jpg" alt="//"></a></li>
                            <li><a href="#"><img src="clients/images/flickr-feed-15.jpg" alt="//"></a></li>
                        </ul>
                    </div>
                    <div class="widget widget-tag-cloud">
                        <a class="btn btn-theme btn-title-more" href="#">Xem Tất Cả</a>
                        <h4 class="widget-title"><span>Thẻ</span></h4>
                        <ul>
                            <li><a href="#">Thời Trang</a></li>
                            <li><a href="#">Quần Jeans</a></li>
                            <li><a href="#">Bán Chạy</a></li>
                            <li><a href="#">Thương Mại Điện Tử</a></li>
                            <li><a href="#">Ưu Đãi Nóng</a></li>
                            <li><a href="#">Nhà Cung Cấp</a></li>
                            <li><a href="#">Cửa Hàng</a></li>
                            <li><a href="#">Chủ Đề</a></li>
                            <li><a href="#">Trang Web</a></li>
                            <li><a href="#">Isamercan</a></li>
                            <li><a href="#">Themeforest</a></li>
                        </ul>
                    </div>
                    <div class="widget">
                        <a class="btn btn-theme btn-title-more btn-icon-left" href="#"><i class="fab fa-twitter"></i>Theo Dõi
                            Chúng Tôi</a>
                        <h4 class="widget-title"><span>Twitter</span></h4>
                        <div class="recent-tweets">
                            <div class="media">
                                <span class="media-object pull-left"><i class="fab fa-twitter"></i></span>
                                <div class="media-body">
                                    <p><a href="#">@twittername</a> At vero eos et accusam et justo duo dolores et ea rebum.
                                        Stet clita kasd gubergren, no sea takimata sanctus est Lorem ipsum dolor sit amet.
                                    </p>
                                    <small>1 phút trước</small>
                                </div>
                            </div>
                            <div class="media">
                                <span class="media-object pull-left"><i class="fab fa-twitter"></i></span>
                                <div class="media-body">
                                    <p><a href="#">@twittername</a> At vero eos et accusam et justo duo dolores et ea rebum.
                                        Stet clita kasd gubergren, no sea takimata sanctus est Lorem ipsum dolor sit amet.
                                    </p>
                                    <small>1 phút trước</small>
                                </div>
                            </div>
                            <div class="media">
                                <span class="media-object pull-left"><i class="fab fa-twitter"></i></span>
                                <div class="media-body">
                                    <p><a href="#">@twittername</a> At vero eos et accusam et justo duo dolores et ea rebum.
                                        Stet clita kasd gubergren, no sea takimata sanctus est Lorem ipsum dolor sit amet.
                                    </p>
                                    <small>1 phút trước</small>
                                </div>
                            </div>
                        </div>
                    </div>
                </aside>
                <div class="col-md-9 content" id="content">
                    <article class="post-wrap">
                        <div class="post-media">
                            <a href="clients/images/blog-post-1.jpg" data-gal="prettyPhoto"><img
                                    src="clients/images/blog-post-1.jpg" alt=""></a>
                        </div>
                        <div class="post-header">
                            <h2 class="post-title"><a href="#">Bài Viết Mẫu Với Hình Ảnh Nổi Bật</a></h2>
                            <div class="post-meta">Bởi <a href="#">tên tác giả</a> / 6 tháng 6, 2014 / trong <a
                                    href="#">Thiết Kế</a>, <a href="#">Nhiếp Ảnh</a> / <a href="#">27 Bình Luận</a> / 18
                                Thích / <a href="#">Chia Sẻ Bài Viết Này</a></div>
                        </div>
                        <div class="post-body">
                            <div class="post-excerpt">
                                <p>Fusce gravida interdum eros a mollis. Sed non lorem varius, volutpat nisl in, laoreet
                                    ante. Quisque suscipit mauris ipsum, eu mollis arcu laoreet vel. In posuere odio sed
                                    libero tincidunt commodo a vel ipsum. Mauris fringilla tellus aliquam, egestas sem in,
                                    malesuada nunc. Etiam condimentum felis odio, vel mollis est tempor non...</p>
                            </div>
                        </div>
                        <div class="post-footer">
                            <span class="post-read-more"><a href="#"
                                    class="btn btn-theme btn-theme-transparent btn-icon-left"><i
                                        class="fa fa-file-text-o"></i>Đọc thêm</a></span>
                        </div>
                    </article>
                    <article class="post-wrap">
                        <div class="post-media">
                            <div class="owl-carousel img-carousel">
                                <div class="item"><a href="clients/images/blog-post-2.jpg"
                                        data-gal="prettyPhoto"><img class="img-responsive"
                                            src="clients/images/blog-post-2.jpg" alt="" /></a></div>
                                <div class="item"><a href="clients/images/preview/shop/blog-post-3.jpg"
                                        data-gal="prettyPhoto"><img class="img-responsive"
                                            src="clients/images/blog-post-3.jpg" alt="" /></a></div>
                                <div class="item"><a href="clients/images/preview/shop/blog-post-4.jpg"
                                        data-gal="prettyPhoto"><img class="img-responsive"
                                            src="clients/images/blog-post-4.jpg" alt="" /></a></div>
                                <div class="item"><a href="clients/images/preview/shop/blog-post-1.jpg"
                                        data-gal="prettyPhoto"><img class="img-responsive"
                                            src="clients/images/blog-post-1.jpg" alt="" /></a></div>
                            </div>
                        </div>
                        <div class="post-header">
                            <h2 class="post-title"><a href="#">Bài Viết Chuẩn Với Tiêu Đề Hình Ảnh Trượt</a></h2>
                            <div class="post-meta">Bởi <a href="#">tên tác giả</a> / 6 tháng 6, 2014 / trong <a
                                    href="#">Thiết Kế</a>, <a href="#">Nhiếp Ảnh</a> / <a href="#">27 Bình Luận</a> / 18
                                Thích / <a href="#">Chia Sẻ Bài Viết Này</a></div>
                        </div>
                        <div class="post-body">
                            <div class="post-excerpt">
                                <p>Fusce gravida interdum eros a mollis. Sed non lorem varius, volutpat nisl in, laoreet
                                    ante. Quisque suscipit mauris ipsum, eu mollis arcu laoreet vel. In posuere odio sed
                                    libero tincidunt commodo a vel ipsum. Mauris fringilla tellus aliquam, egestas sem in,
                                    malesuada nunc. Etiam condimentum felis odio, vel mollis est tempor non...</p>
                            </div>
                        </div>
                        <div class="post-footer">
                            <span class="post-read-more"><a href="#"
                                    class="btn btn-theme btn-theme-transparent btn-icon-left"><i
                                        class="fa fa-file-text-o"></i>Đọc thêm</a></span>
                        </div>
                    </article>
                    <!-- / -->
                    <article class="post-wrap">
                        <div class="post-media">
                            <img src="clients/images/audio-post.jpg" alt="">
                        </div>
                        <div class="post-header">
                            <h2 class="post-title"><a href="#">Tiêu Đề Bài Viết Âm Thanh Chuẩn</a></h2>
                            <div class="post-meta">Bởi <a href="#">tên tác giả</a> / 6 tháng 6, 2014 / trong <a
                                    href="#">Thiết Kế</a>, <a href="#">Nhiếp Ảnh</a> / <a href="#">27 Bình Luận</a> / 18
                                Thích / <a href="#">Chia Sẻ Bài Viết Này</a></div>
                        </div>
                        <div class="post-body">
                            <div class="post-excerpt">
                                <p>Fusce gravida interdum eros a mollis. Sed non lorem varius, volutpat nisl in, laoreet
                                    ante. Quisque suscipit mauris ipsum, eu mollis arcu laoreet vel. In posuere odio sed
                                    libero tincidunt commodo a vel ipsum. Mauris fringilla tellus aliquam, egestas sem in,
                                    malesuada nunc. Etiam condimentum felis odio, vel mollis est tempor non...</p>
                            </div>
                        </div>
                        <div class="post-footer">
                            <span class="post-read-more"><a href="#"
                                    class="btn btn-theme btn-theme-transparent btn-icon-left"><i
                                        class="fa fa-file-text-o"></i>Đọc thêm</a></span>
                        </div>
                    </article>
                    <!-- / -->
                    <article class="post-wrap">
                        <div class="post-media">
                            <a href="http://youtu.be/kg-clmeHBrM" data-gal="prettyPhoto" class="media-link">
                                <span class="btn btn-play"><i class="fa fa-play"></i></span>
                                <img src="clients/images/blog-post-3.jpg" alt="">
                            </a>
                        </div>
                        <div class="post-header">
                            <h2 class="post-title"><a href="#">Tiêu Đề Bài Viết Video Chuẩn</a></h2>
                            <div class="post-meta">Bởi <a href="#">tên tác giả</a> / 6 tháng 6, 2014 / trong <a
                                    href="#">Thiết Kế</a>, <a href="#">Nhiếp Ảnh</a> / <a href="#">27 Bình Luận</a> / 18
                                Thích / <a href="#">Chia Sẻ Bài Viết Này</a></div>
                        </div>
                        <div class="post-body">
                            <div class="post-excerpt">
                                <p>Fusce gravida interdum eros a mollis. Sed non lorem varius, volutpat nisl in, laoreet
                                    ante. Quisque suscipit mauris ipsum, eu mollis arcu laoreet vel. In posuere odio sed
                                    libero tincidunt commodo a vel ipsum. Mauris fringilla tellus aliquam, egestas sem in,
                                    malesuada nunc. Etiam condimentum felis odio, vel mollis est tempor non...</p>
                            </div>
                        </div>
                        <div class="post-footer">
                            <span class="post-read-more"><a href="#"
                                    class="btn btn-theme btn-theme-transparent btn-icon-left"><i
                                        class="fa fa-file-text-o"></i>Đọc thêm</a></span>
                        </div>
                    </article>
                    <!-- / -->
                    <article class="post-wrap">
                        <div class="post-media">
                            <blockquote>
                                <p>Fusce gravida interdum eros a mollis. Sed non lorem varius, volutpat nisl in, laoreet
                                    ante. Quisque suscipit mauris ipsum, eu mollis arcu laoreet vel. </p>
                                <footer><cite title="Source Title">ISA MERCAN</cite></footer>
                            </blockquote>
                        </div>
                        <div class="post-header">
                            <div class="post-meta">Bởi <a href="#">tên tác giả</a> / 6 tháng 6, 2014 / trong <a
                                    href="#">Thiết Kế</a>, <a href="#">Nhiếp Ảnh</a> / <a href="#">27 Bình Luận</a> / 18
                                Thích / <a href="#">Chia Sẻ Bài Viết Này</a></div>
                        </div>
                        <div class="post-footer">
                            <span class="post-read-more"><a href="#"
                                    class="btn btn-theme btn-theme-transparent btn-icon-left"><i
                                        class="fa fa-file-text-o"></i>Đọc thêm</a></span>
                        </div>
                    </article>
                    <!-- / -->
                    <article class="post-wrap">
                        <div class="post-media">
                            <!-- 16:9 aspect ratio -->
                            <div class="embed-responsive embed-responsive-16by9">
                                <iframe class="embed-responsive-item" src="//player.vimeo.com/video/113101251"></iframe>
                            </div>
                        </div>
                        <div class="post-header">
                            <h2 class="post-title"><a href="#">Tiêu Đề Bài Viết Video Vimeo Chuẩn</a></h2>
                            <div class="post-meta">Bởi <a href="#">tên tác giả</a> / 6 tháng 6, 2014 / trong <a
                                    href="#">Thiết Kế</a>, <a href="#">Nhiếp Ảnh</a> / <a href="#">27 Bình Luận</a> / 18
                                Thích / <a href="#">Chia Sẻ Bài Viết Này</a></div>
                        </div>
                        <div class="post-body">
                            <div class="post-excerpt">
                                <p>Fusce gravida interdum eros a mollis. Sed non lorem varius, volutpat nisl in, laoreet
                                    ante. Quisque suscipit mauris ipsum, eu mollis arcu laoreet vel. In posuere odio sed
                                    libero tincidunt commodo a vel ipsum. Mauris fringilla tellus aliquam, egestas sem in,
                                    malesuada nunc. Etiam condimentum felis odio, vel mollis est tempor non...</p>
                            </div>
                        </div>
                        <div class="post-footer">
                            <span class="post-read-more"><a href="#"
                                    class="btn btn-theme btn-theme-transparent btn-icon-left"><i
                                        class="fa fa-file-text-o"></i>Đọc thêm</a></span>
                        </div>
                    </article>

                    <!-- /Blog posts -->

                    <!-- Pagination -->
                    <div class="pagination-wrapper">
                        <ul class="pagination">
                            <li class="disabled"><a href="#"><i class="fa fa-angle-double-left"></i> Trước</a></li>
                            <li class="active"><a href="#">1 <span class="sr-only">(hiện tại)</span></a></li>
                            <li><a href="#">2</a></li>
                            <li><a href="#">3</a></li>
                            <li><a href="#">4</a></li>
                            <li><a href="#">Tiếp <i class="fa fa-angle-double-right"></i></a></li>
                        </ul>
                    </div>

                </div>
            </div>
        </div>
    </section>
@endsection