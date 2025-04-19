@extends("clients.themes")

@section("title")
<title>Danh Sách Sản Phẩm</title>
@endsection

@section('main')
<section class="page-section">
    <div class="container">
        <div class="row">
            <div id="productList" class="row mt-4">
                @foreach ($sanPhams as $sanPham)
                    @php
                        $luotMua = DB::table("san_pham_don_hang")->where("Id_SanPham", $sanPham->id)->count();
                    @endphp
                    <div class="col-md-3 col-sm-3">
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
                                        <ins>₫{{ number_format($sanPham->GiaSanPham) }}</ins>
                                    @endif
                                    <span>Đã bán {{ soGon($luotMua) }}</span>
                                </div>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>

        @if ($sanPhams->count() > 0)
        <div class="pagination-wrapper">
            {{ $sanPhams->links() }}
        </div>
        @endif
    </div>
</section>
@endsection