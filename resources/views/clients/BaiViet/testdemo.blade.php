@extends("clients.themes")

@section("title")
    <title>Bài Viết - WD-14</title>
@endsection

@section('main')
    <section class="page-section breadcrumbs">
        <div class="container">
            <div class="page-header">
                <h1>Trang Chi Tiết</h1>
            </div>
        </div>
    </section>

    <section class="page-section with-sidebar">
        <div class="container">
            <div class="row">
              
                <div class="col-md-9 content" id="content">
                    <!-- list bài viết -->

                   
                    <div class="col-md-4">
                        <div class="card news-card">
                            
                            <div class="card-body">
                                <h5 class="card-title">{{ $chiTiet->tieu_de }}</h5>
                                <img src="{{ $chiTiet->hinh_anh }}" class="card-img-top img-fluid" alt="{{ $chiTiet->tieu_de }}">
                                <p class="card-text">{{ Str::limit($chiTiet->noi_dung, 100) }}</p>
                                <img src="{{ $chiTiet->hinh_anh }}" class="card-img-top img-fluid" alt="{{ $chiTiet->tieu_de }}">
                                <p class="card-text">{{ Str::limit($chiTiet->noi_dung, 100) }}</p>


                                <p class="card-text"><strong>Tác giả:</strong> {{ $chiTiet->tac_gia }}</p>
                                <p class="text-muted">Ngày đăng: {{ date('d/m/Y', strtotime($chiTiet->ngay_dang)) }}</p>
                                
                            </div>
                        </div>
                    </div>
               
              
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