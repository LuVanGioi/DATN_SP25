@extends("clients.themes")

@section("title")
<title>Bài Viết - {{ $caiDatWebsite->TenCuaHang }}</title>
@endsection

@section('main')
<section class="page-section breadcrumbs">
    <div class="container">
        <div class="page-header">
            <h1>Trang Bài Viết</h1>
        </div>
    </div>
</section>

<section class="page-section">
    <div class="container">
        <div class="row" style="margin-top: 0px;">
            <div class="col-md-3" style="margin-top: 0px;">
                <div class="widget">
                    <div class="widget-search">
                        <input id="searchInput" class="form-control" type="text" placeholder="Search">
                        <button><i class="fa fa-search"></i></button>
                    </div>
                </div>

                <div class="widget shop-categories mb-2">
                    <h4 class="widget-title">Danh Mục</h4>
                    <div class="widget-content">
                        <ul id="danhMucList">

                            @foreach ($danhMuc as $dm)
                            @php
                            $soBaiViet = DB::table("bai_viet")->where("danh_muc_id", $dm->id)->count()
                            @endphp
                            <li>
                                <a href="{{ route("danh-muc-bai-viet.show", $dm->id) }}">
                                    {{ $dm->TenDanhMucBaiViet }}
                                    <span class="count">{{ number_format($soBaiViet) }}</span>
                                </a>
                            </li>
                            @endforeach
                        </ul>
                    </div>
                </div>

                <div class="widget widget-tabs alt">
                    <div class="widget-content">
                        <ul id="tabs" class="nav nav-justified">
                            <li class="active"><a href="#tab-s1" data-toggle="tab">Bài viết gần đây</a></li>
                        </ul>
                        <div class="tab-content">
                            <div class="tab-pane fade in active" id="tab-s1">
                                <div class="recent-post">
                                    @foreach ($baiVietGanDay as $bvgd)
                                    @php
                                    $soBinhLuan = DB::table("binh_luan_bai_viet")->where("id_baiviet", $bvgd->id)->count()
                                    @endphp
                                    <div class="media">
                                        <a class="pull-left media-link" href="{{ route('baiviet.show', $bvgd->id) }}">
                                            <img class="media-object" src="{{ Storage::url($bvgd->hinh_anh) }}" width="100px" height="70px" alt="">
                                            <i class="fa fa-plus"></i>
                                        </a>
                                        <div class="media-body">
                                            <h4 class="media-heading" style="margin: 0px 0px 5px 0px"><a href="{{ route('baiviet.show', $bvgd->id) }}">{{ Str::limit(strip_tags(html_entity_decode($bvgd->tieu_de)), 40) }}</a></h4>
                                            <div class="media-meta">
                                                {{ $bvgd->ngay }}
                                                <span class="divider">/</span><a href="{{ route('baiviet.show', $bvgd->id) }}"><i
                                                        class="fa fa-comment"></i> {{ number_format($soBinhLuan) }}</a>
                                            </div>
                                        </div>
                                    </div>
                                    @endforeach
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md-9">
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
    
@section("js")
<script>
    document.addEventListener('DOMContentLoaded', function() {
        const input = document.getElementById('searchInput');
        const listItems = document.querySelectorAll('#danhMucList li');

        input.addEventListener('input', function() {
            const keyword = input.value.toLowerCase();

            listItems.forEach(item => {
                const text = item.textContent.toLowerCase();
                if (text.includes(keyword)) {
                    item.style.display = '';
                } else {
                    item.style.display = 'none';
                }
            });
        });
    });
</script>
@endsection