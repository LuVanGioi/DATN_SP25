@extends("clients.themes")

@section("title")
<title>Bài Viết - WD-14</title>
@endsection

@section('main')
<section class="page-section with-sidebar">
    <div class="container">

        <div class="row mt-1">
            <div class="col-md-8">
                <div class="card news-card">
                    <div class="card-body">
                        <img src="{{ Storage::url($chiTiet->hinh_anh) }}" class="img-fluid" alt="{{ $chiTiet->tieu_de }}">
                        <hr>
                        <h3>{{ $chiTiet->tieu_de }}</h3>
                        <p class="card-text"><strong>Tác giả:</strong> {{ $chiTiet->tac_gia }} | Ngày đăng: {{ date('d/m/Y', strtotime($chiTiet->ngay_dang)) }}</p>
                        <hr>
                        <div class="card-text">{!! $chiTiet->noi_dung !!}</div>
                    </div>
                </div>
            </div>
            <div class="col-md-4">
                <a class="btn btn-theme btn-title-more btn-icon-left" href="/danh-sach-bai-viet"><i class="fas fa-file-lines me-2"></i> Xem tất cả</a>
                <h2 class="block-title mb-3"><span>Bài Viết</span></h2>
                <div class="row">
                    @foreach ($tatCaBaiViet as $baiViet)
                    <div class="col-md-12">
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
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    @endforeach
                </div>
            </div>
        </div>
</section>
@endsection