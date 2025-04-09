@extends("clients.themes")

@section("title")
<title>{{ $danhMuc->TenDanhMucBaiViet }} - {{ $caiDatWebsite->TenCuaHang }}</title>
@endsection

@section('main')
<section class="page-section breadcrumbs">
    <div class="container">
        <div class="page-header">
            <h1>DANH MỤC {{ $danhMuc->TenDanhMucBaiViet }}</h1>
        </div>
    </div>
</section>

<section class="page-section">
    <div class="container">
        <div class="row" style="margin-top: 0px;">
            @foreach ($newsList as $news)
            <div class="col-md-4" style="margin-top: 0px !important">
                <a href="{{ route('baiviet.show', $news->id) }}">
                    <div class="card news-card">
                        <img src="{{ Storage::url($news->hinh_anh) }}" class="card-img-top img-fluid" alt="{{ $news->tieu_de }}">
                        <div class="card-body">
                            <div style="justify-content: space-between; display: flex;">
                                <span class="text-muted">{{ Str::limit(strip_tags(html_entity_decode(DB::table("danh_muc_bai_viet")->find($news->danh_muc_id)->TenDanhMucBaiViet)), 20) }}</span>
                                <span class="text-muted">{{ date('d/m/Y', strtotime($news->ngay_dang)) }}</span>
                            </div>
                            <h4 class="card-title text-dark" style="text-transform: uppercase;">{{ Str::limit(strip_tags(html_entity_decode($news->tieu_de)), 40) }}</h4>
                            <div class="card-text text-muted">{{ Str::limit(strip_tags(html_entity_decode($news->noi_dung)), 50) }}</div>
                        </div>
                    </div>
                </a>
            </div>
            @endforeach
        </div>

        <div class="pagination-wrapper text-center">
            <ul class="pagination">
                @if ($newsList->onFirstPage())
                <li class="disabled"><a href="#"><i class="fa fa-angle-double-left"></i> Trước</a></li>
                @else
                <li><a href="{{ $newsList->previousPageUrl() }}"><i class="fa fa-angle-double-left"></i> Trước</a></li>
                @endif

                @for ($i = 1; $i <= $newsList->lastPage(); $i++)
                    @if ($i == $newsList->currentPage())
                    <li class="active"><a href="#">{{ $i }} <span class="sr-only">(hiện tại)</span></a></li>
                    @else
                    <li><a href="{{ $newsList->url($i) }}">{{ $i }}</a></li>
                    @endif
                    @endfor

                    @if ($newsList->hasMorePages())
                    <li><a href="{{ $newsList->nextPageUrl() }}">Tiếp <i class="fa fa-angle-double-right"></i></a></li>
                    @else
                    <li class="disabled"><a href="#">Tiếp <i class="fa fa-angle-double-right"></i></a></li>
                    @endif
            </ul>
        </div>
    </div>
</section>
@endsection

@section("css")
<style>
    .news-card {
        border: 1px solid #e5e5e5;
    }

    .news-card>.card-body {
        padding: 10px;
    }

    .news-card>img {
        width: 100%;
        height: 100%;
        border-bottom: 1px solid #e5e5e5;
    }
</style>
@endsection