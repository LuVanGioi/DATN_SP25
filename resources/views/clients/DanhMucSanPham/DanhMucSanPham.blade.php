@extends("clients.themes")

@section("title")
<title>Danh Mục </title>
@endsection

@section('main')
<section class="page-section">
    <div class="container">
        <div class="row">
            <aside class="col-md-3 sidebar" id="sidebar">
                <div class="widget shop-categories">
                    <h4 class="widget-title">Môn Thể Thao</h4>
                    <div class="widget-content">
                        <ul>
                            @foreach ($dichVu as $dv)
                            <li>
                                <span class="arrow"><i class="fa fa-angle-down"></i></span>
                                <a href="#">{{ $dv->TenDichVuSanPham }}</a>
                                <ul class="children active">
                                    @foreach (DB::table("danh_muc_san_pham")->where("ID_DichVuSanPham", $dv->id)->where("Xoa", 0)->get() as $item)
                                    @php
                                    $soLuongSp = DB::table("san_pham")->where("ID_DanhMuc", $item->id)->where("Xoa", 0)->count();
                                    @endphp
                                    <li>
                                        <a href="/danh-muc/{{xoadau($item->TenDanhMucSanPham)}}"> {{ $item->TenDanhMucSanPham }}
                                            <span class="count">{{ number_format($soLuongSp) }}</span>
                                        </a>
                                    </li>
                                    @endforeach
                                </ul>
                            </li>
                            @endforeach
                        </ul>
                    </div>
                </div>
            </aside>

            <div class="col-md-9 content" id="content">
                <div class="shop-sorting">
                    <div class="row">
                        <div class="col-sm-12">
                            <form id="filterForm" class="form-inline" method="GET" action="">
                               
                                <div class="form-group selectpicker-wrapper">
                                    <select class="selectpicker input-price" name="price_range" id="priceRange">
                                        <option value="">-- Chọn Khoảng Giá --</option>
                                        <option value="0-100000" {{ request('price_range') == '0-100000' ? 'selected' : '' }}>₫0 - ₫100.000</option>
                                        <option value="100000-200000" {{ request('price_range') == '100000-200000' ? 'selected' : '' }}>₫100.000 - ₫200.000</option>
                                        <option value="200000-500000" {{ request('price_range') == '200000-500000' ? 'selected' : '' }}>₫200.000 - ₫500.000</option>
                                        <option value="500000-1000000" {{ request('price_range') == '500000-1000000' ? 'selected' : '' }}>₫500.000 - ₫1.000.000</option>
                                    </select>
                                </div>
                                <div class="form-group selectpicker-wrapper ml-2">
                                    <select class="selectpicker" name="sort" id="sort">
                                        <option value="">-- Sắp xếp --</option>
                                        <option value="asc" {{ request('sort') == 'asc' ? 'selected' : '' }}>Giá: Thấp đến cao</option>
                                        <option value="desc" {{ request('sort') == 'desc' ? 'selected' : '' }}>Giá: Cao đến thấp</option>
                                    </select>
                                </div>
                                <div class="form-group ml-2">
                                    <button type="submit" class="btn btn-primary">Lọc sản phẩm</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>

                <div id="productList" class="row mt-4" style="display: flex; flex-wrap: wrap">
                    @foreach ($danhSach as $row)
                        @if($id == xoadau($row->TenDanhMucSanPham))
                            @php
                                $query = DB::table('san_pham')
                                    ->join('bien_the_san_pham', 'san_pham.id', '=', 'bien_the_san_pham.ID_SanPham')
                                    ->where('san_pham.ID_DanhMuc', $row->id)
                                    ->where('bien_the_san_pham.Xoa', 0);

                                if(request('search')) {
                                    $search = request('search');
                                    $query->where('san_pham.TenSanPham', 'LIKE', "%{$search}%");
                                }

                                $query->select('san_pham.*', DB::raw('MIN(bien_the_san_pham.Gia) as min_price'))
                                    ->groupBy('san_pham.id');

                                if (request('price_range')) {
                                    [$min, $max] = explode('-', request('price_range'));
                                    $min = (int)$min;
                                    $max = (int)$max;
                                    $query->having('min_price', '>=', $min)->having('min_price', '<=', $max);
                                }

                                if (request('sort')) {
                                    $direction = request('sort');
                                    $query->orderBy('min_price', $direction);
                                }

                                $sanPhams = $query->paginate(12);
                            @endphp
                            @foreach ($sanPhams as $sanPham)
                                @php
                                    $luotMua = DB::table("san_pham_don_hang")->where("Id_SanPham", $sanPham->id)->count();
                                @endphp
                                <div class="col-md-3 col-sm-3 mb-1">
                                    <div class="thumbnail product-item">
                                        <div class="media">
                                            <a class="media-link" href="{{ route("san-pham.show", ($sanPham->DuongDan)) }}">
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
                                                @if ($sanPham->TheLoai == "bienThe")
                                                    <ins>₫{{ number_format(DB::table("bien_the_san_pham")->where("ID_SanPham", $sanPham->id)->where("Xoa", 0)->min("Gia")) }}</ins>
                                                @else
                                                    <ins>₫{{ number_format($sanPham->min_price) }}</ins>
                                                @endif
                                                <span>Đã bán {{ soGon($luotMua) }}</span>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            @endforeach
                        @endif
                    @endforeach
                </div>

                @if ($sanPhams->count() > 0)
                <div class="pagination-wrapper text-center">
                    <ul class="pagination">
                        @if ($sanPhams->onFirstPage())
                        <li class="disabled"><a href="#"><i class="fa fa-angle-double-left"></i> Trước</a></li>
                        @else
                        <li><a href="{{ $sanPhams->previousPageUrl() }}"><i class="fa fa-angle-double-left"></i> Trước</a></li>
                        @endif

                        @if ($sanPhams->lastPage() > 1)
                        @foreach ($sanPhams->links()->elements[0] as $link)
                        <li class="{{ $link->active ? 'active' : '' }}">
                            <a href="{{ $link->url }}">{{ $link->label }}</a>
                        </li>
                        @endforeach
                        @else
                        <li class="active"><a href="#">1</a></li>
                        @endif

                        @if ($sanPhams->hasMorePages())
                        <li><a href="{{ $sanPhams->nextPageUrl() }}">Sau <i class="fa fa-angle-double-right"></i></a></li>
                        @else
                        <li class="disabled"><a href="#">Sau <i class="fa fa-angle-double-right"></i></a></li>
                        @endif
                    </ul>
                </div>
                @endif
            </div>
        </div>
    </div>
</section>
@endsection

@push('scripts')
<script>
document.getElementById('search').addEventListener('keypress', function(e) {
    if (e.key === 'Enter') {
        document.getElementById('filterForm').submit();
    }
});

document.getElementById('priceRange').addEventListener('change', function() {
    document.getElementById('filterForm').submit();
});

document.getElementById('sort').addEventListener('change', function() {
    document.getElementById('filterForm').submit();
});
</script>
@endpush
