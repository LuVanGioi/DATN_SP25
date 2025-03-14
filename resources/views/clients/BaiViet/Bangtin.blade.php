{{-- @extends("clients.themes")

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

                @foreach ($newsList as $news)
            <div class="col-md-4">
                <div class="card news-card">
                    <img src="{{ $news->hinh_anh }}" class="card-img-top" alt="{{ $news->tieu_de }}">
                    <div class="card-body">
                        <h5 class="card-title">{{ $news->tieu_de }}</h5>
                        <p class="card-text"><strong>Tác giả:</strong> {{ $news->tac_gia }}</p>
                        <p class="card-text">{{ Str::limit($news->noi_dung, 50) }}</p>
                        <p class="text-muted">Ngày đăng: {{ date('d/m/Y', strtotime($news->ngay_dang)) }}</p>
                        <a href="#" class="btn btn-primary">Đọc thêm</a>
                    </div>
                    </div>
                </div>
            </div>
        @endforeach

                
                


               




                <div class="col-md-9 content" id="content">
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
@endsection --}}