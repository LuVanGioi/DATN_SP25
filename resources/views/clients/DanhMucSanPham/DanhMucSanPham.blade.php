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

                <div class="widget shop-categories">
                    <h4 class="widget-title">Thương Hiệu</h4>
                    <div class="widget-content">
                        <ul>
                            @foreach ($thuongHieu as $item)
                            <li>
                                <a href="/thuong-hieu/{{ xoadau($item->TenThuongHieu) }}">{{ $item->TenThuongHieu }}</a>
                            </li>
                            @endforeach
                        </ul>
                    </div>
                </div>
            </aside>

            <div class="col-md-9 content" id="content">
                <div class="shop-sorting">
                    <div class="row">
                        <div class="col-sm-8">
                            <form class="form-inline" action="">
                                <div class="form-group selectpicker-wrapper">
                                    <select class="selectpicker input-price">
                                        <option value="">-- Chọn Khoảng Giá --</option>
                                        <option value="0-100000">₫0 - ₫100.000</option>
                                        <option value="100000-200000">₫100.000 - ₫200.000</option>
                                        <option value="200000-500000">₫200.000 - ₫500.000</option>
                                        <option value="500000-1000000">₫500.000 - ₫1.000.000</option>
                                    </select>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>

                <div class="row mt-1">
                    @foreach ($danhSach as $row)
                    @if($id == xoadau($row->TenDanhMucSanPham))
                    @php
                    $sanPhams = DB::table('san_pham')->where('ID_DanhMuc', $row->id)->paginate(12);
                    @endphp
                    @foreach ($sanPhams as $sanPham)
                    @php
                    $luotMua = DB::table("san_pham_don_hang")->where("Id_SanPham", $sanPham->id)->count();
                    @endphp
                    <div class="col-md-3 col-sm-3">
                        <div class="thumbnail product-item">
                            <div class="media">
                                <a class="media-link" href="{{ route("san-pham.show", xoadau($sanPham->TenSanPham)) }}">
                                    <img src="{{ Storage::url($sanPham->HinhAnh) }}" alt="">
                                </a>
                                @if ($sanPham->Nhan)
                                <span class="ribbons {{ $sanPham->Nhan }}">{{ nhan($sanPham->Nhan) }}</span>
                                @endif
                                <div class="title-time">
                                    {{ date("d.m") }}
                                </div>
                            </div>
                            <div class="caption text-center">
                                <h4 class="caption-title">
                                    <a href="{{ route("san-pham.show", xoadau($sanPham->TenSanPham)) }}">{{ $sanPham->TenSanPham }}</a>
                                </h4>
                                <div class="price">
                                    <ins>{{ number_format($sanPham->GiaSanPham) }}đ</ins>
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
                <div class="pagination-wrapper">
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