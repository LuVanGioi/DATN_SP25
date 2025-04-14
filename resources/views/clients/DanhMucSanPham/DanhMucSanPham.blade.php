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
                        <h4 class="widget-title">Danh Mục</h4>
                        <div class="widget-content">
                            <ul>
                                @foreach ($danhSach as $item)
                                    <li>
                                        <a href="/danh-muc/{{xoadau($item->TenDanhMucSanPham)}}">{{ $item->TenDanhMucSanPham }}</a>
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
                                        <a href="">{{ $item->TenThuongHieu }}</a>
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
                                        <select class="selectpicker">
                                            <option value="">Chọn Giá Tiền</option>
                                            <option value="">0đ - 100.000đ</option>
                                            <option value="">100.000đ - 200.000đ</option>
                                            <option value="">200.000đ - 300.000đ</option>
                                            <option value="">300.000đ - 400.000đ</option>
                                            <option value="">400.000đ - hơn 1 triệu</option>
                                        </select>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>

                    <div class="row products grid">
                        @foreach ($danhSach as $row)
                            @if($id == xoadau($row->TenDanhMucSanPham))


                                @foreach (DB::table('san_pham')->where('ID_DanhMuc', $row->id)->get() as $sanPham)
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
                                                <span>Đã bán 54,3k</span>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                @endforeach
                            @endif
                        @endforeach

                    </div>

                    <div class="pagination-wrapper">
                        <ul class="pagination">
                            <li class="disabled"><a href="#"><i class="fa fa-angle-double-left"></i> Previous</a></li>
                            <li class="active"><a href="#">1 <span class="sr-only">(current)</span></a></li>
                            <li><a href="#">2</a></li>
                            <li><a href="#">3</a></li>
                            <li><a href="#">4</a></li>
                            <li><a href="#">Next <i class="fa fa-angle-double-right"></i></a></li>
                        </ul>
                    </div>

                </div>
            </div>
        </div>
    </section>
@endsection