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
                                            <a href="#">Áo Len
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
                </aside>
                <div class="col-md-9 content" id="content">
                    <!-- list bài viết -->

                    @foreach ($newsList as $news)
                    <div class="col-md-4">
                        <div class="card news-card">
                            <img src="{{ $news->hinh_anh }}" class="card-img-top img-fluid" alt="{{ $news->tieu_de }}">

                            <div class="card-body">
                                <h5 class="card-title">{{ $news->tieu_de }}</h5>
                                <p class="card-text"><strong>Tác giả:</strong> {{ $news->tac_gia }}</p>
                                <p class="card-text">{{ Str::limit($news->noi_dung, 100) }}</p>
                                <p class="text-muted">Ngày đăng: {{ date('d/m/Y', strtotime($news->ngay_dang)) }}</p>
                                <a href="{{ route('news.show', $news->id) }}" class="btn btn-info btn-sm">Đọc 
                                    thêm</a>
                            </div>
                        </div>
                    </div>
               
                @endforeach
            </div>
        </div>
 
     



           

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