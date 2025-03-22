@extends("clients.themes")

@section("title")
    <title>{{ $news->tieu_de }}</title>
@endsection

@section('main')
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
                    <!-- chi tiết bài viết -->
                    <div class="card news-card">
                       <img src="{{ Storage::url($news->hinh_anh) }}" class="card-img-top img-fluid" alt="{{ $news->tieu_de }}">
                        <div class="card-body">
                            <h5 class="card-title" style="text-transform: uppercase;">{{ $news->tieu_de }}</h5>
                                <style>
                                    .card-title {
                                        text-transform: uppercase;
                                    }
                                </style>
                            <p class="card-text"><strong>Tác giả:</strong> {{ $news->tac_gia }}</p>
                            <div>{!! $news->noi_dung !!}</div>
                            <p class="text-muted">Ngày đăng: {{ date('d/m/Y', strtotime($news->ngay_dang)) }}</p>
                        </div>
                    </div>

                    <!-- ô bình luận và nút gửi -->
                    <div class="card mt-4">
                        <div class="card-body">
                            <h5 class="card-title">Bình luận</h5>
                            @if (Auth::check())
                                <form action="{{ route('binhluan.store') }}" method="POST">
                                    @csrf
                                    <input type="hidden" name="id_baiviet" value="{{ $news->id }}">
                                    <div class="form-group">
                                        <textarea class="form-control" name="noi_dung" rows="5" placeholder="Viết bình luận của bạn..."></textarea>
                                    </div>
                                    <button type="submit" class="btn btn-primary">Gửi</button>
                                </form>
                            @else
                                <p>Vui lòng <a href="{{ route('login') }}">đăng nhập</a> để bình luận.</p>
                            @endif
                        </div>
                    </div>

                    
                    @foreach ($binhLuans as $binhLuan)
    <div class="card mt-4">
        <div class="card-body">
            <div class="d-flex align-items-center">
                <i class="bi bi-person-circle" style="font-size: 30px; margin-right: 10px;"></i>
                <strong>{{ $binhLuan->user_name }}</strong>
                <span class="text-muted ml-auto">{{ date('d/m/Y', strtotime($binhLuan->ngay_binh_luan)) }}</span>
            </div>
            <p class="mt-2">{{ $binhLuan->noi_dung }}</p>
            <div class="d-flex justify-content-between align-items-center mt-2">
                <div>
                    <button class="btn btn-link p-0" onclick="likeComment({{ $binhLuan->id }})">Thích</button>
                    <button class="btn btn-link p-0" onclick="showReplyForm({{ $binhLuan->id }})">Phản hồi</button>
                </div>
                <div class="text-muted">
                    {{ $binhLuan->so_luot_thich }} lượt thích
                </div>
            </div>
            <!-- Form phản hồi -->
            <div id="reply-form-{{ $binhLuan->id }}" class="mt-3" style="display: none;">
                <form action="{{ route('binhluan.reply') }}" method="POST">
                    @csrf
                    <input type="hidden" name="id_binh_luan" value="{{ $binhLuan->id }}">
                    <textarea class="form-control" name="noi_dung" rows="2" placeholder="Viết phản hồi..."></textarea>
                    <button type="submit" class="btn btn-primary btn-sm mt-2">Gửi</button>
                </form>
            </div>

            <!-- Hiển thị phản hồi -->
            @foreach ($phanHois as $phanHoi)
                @if ($phanHoi->id_binh_luan == $binhLuan->id)
                    <div class="card mt-3 ms-4">
                        <div class="card-body">
                            <div class="d-flex align-items-center">
                                <i class="bi bi-person-circle" style="font-size: 25px; margin-right: 10px;"></i>
                                <strong>{{ $phanHoi->user_name }}</strong>
                                <span class="text-muted ml-auto">{{ date('d/m/Y', strtotime($phanHoi->ngay_phan_hoi)) }}</span>
                            </div>
                            <p class="mt-2">{{ $phanHoi->noi_dung }}</p>
                            <div class="d-flex justify-content-between align-items-center mt-2">
                                <div>
                                    <button class="btn btn-link p-0" onclick="likeComment({{ $phanHoi->id }})">Thích</button>
                                </div>
                                <div class="text-muted">
                                    {{ $phanHoi->so_luot_thich ?? 0 }} lượt thích
                                </div>
                            </div>
                        </div>
                    </div>
                    
                @endif
            @endforeach
            <style>
                .ms-4 {
                    margin-left: 3rem; 
                }
            </style>
        </div>
    </div>
 
    <hr class="thick-hr">
    <style>
        .thick-hr {
            border: 0;
            height: 1px; 
            background-color: #ada6a6; 
            
        }
    </style>
@endforeach
                </div>
            </div>
        </div>
    </section>
@endsection

<script>
    function likeComment(id) {
        fetch(`/binhluan/${id}/like`, { 
            method: 'POST',
            headers: {
                'X-CSRF-TOKEN': '{{ csrf_token() }}',
                'Content-Type': 'application/json',
            },
        })
        .then(response => response.json())
        .then(data => {
            if (data.success) {
                location.reload(); 
            } else {
                alert(data.message);
            }
        })
        .catch(error => console.error('Error:', error));
    }

    function showReplyForm(id) {
        const form = document.getElementById(`reply-form-${id}`);
        form.style.display = form.style.display === 'none' ? 'block' : 'none';
    }
</script>