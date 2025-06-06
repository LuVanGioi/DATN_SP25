<div class="top-bar">
    <div class="container">
        <div class="top-bar-left">
            <ul class="list-inline">
                @if (Auth::check())
                <li>
                    <a href="{{ route("ThongTinTaiKhoan") }}"><i class="fas fa-user"></i> {{Auth::user()->name}}</a>
                </li>
                <li>
                    <form action="{{route('logout')}}" method="POST">
                        @csrf
                        <button class="btn-none"><i class="fas fa-sign-out-alt"></i>Đăng Xuất</button>
                    </form>
                </li>
                @if (Auth::user()->role == "Admin")
                <li>
                    <a href="{{ route("home.index") }}"><i class="fas fa-cog"></i> Quản Trị Viên</a>
                </li>
                @endif
                @else
                <li class="icon-user">
                    <a href="{{route('login')}}">
                        <img src="/clients/images/icon-1.png" alt="">
                        <span>Đăng Nhập</span>

                    </a>
                </li>
                <li class="icon-form">
                    <a href="{{route('register')}}"><img src="/clients/images/icon-2.png" alt="">
                        <span>Tạo tài khoản</span>
                    </a>
                </li>

                @endif


            </ul>
        </div>
        <div class="top-bar-right">
            <ul class="list-inline">
                <li class="hidden-xs"><a href="{{ route("danhSachBaiViet.index") }}">Bài viết</a></li>
                <li class="hidden-xs"><a href="{{ route("ThongTinTaiKhoan") }}">Tài khoản</a></li>
                <li class="hidden-xs"><a href="{{ route("contact") }}">Liên hệ</a></li>
                <li class="hidden-xs"><a href="{{ route("faq") }}">FAQ</a></li>
                <li>
                    <div class="gtranslate_wrapper"></div>
                </li>
            </ul>
        </div>
    </div>
</div>

<header class="header fixed">
    <div class="header-wrapper">
        <div class="container">

            <div class="logo">
                <a href="/"><img src="{{ Storage::url($caiDatWebsite->Logo_website) }}"
                        alt="{{ $caiDatWebsite->TenCuaHang }}"></a>
            </div>

            <div class="header-search">
                <form action="{{ route('sanpham.timkiem') }}" method="GET">
                    <input class="form-control" type="text" name="q" placeholder="Tìm kiếm sản phẩm" required>
                    <button type="submit"><i class="fa fa-search"></i></button>
                </form>
            </div>

            <div class="header-cart">
                <div class="cart-wrapper">
                    <a href="/thong-tin-tai-khoan" class="btn btn-theme-transparent hidden-xs hidden-sm"><i
                            class="fa fa-user-circle"></i></a>
                    <a href="#" class="btn btn-theme-transparent" data-toggle="modal" data-target="#popup-cart"><i
                            class="fa fa-shopping-cart"></i> <span class="hidden-xs" id="cart-count">
                            {{ number_format($soLuongGioHangClient) }}
                            Sản phẩm - {{ number_format($tongTienSanPhamGioHangClient) }} đ </span> <i
                            class="fa fa-angle-down"></i></a>
                    <a href="#" class="menu-toggle btn btn-theme-transparent"><i class="fa fa-bars"></i></a>
                </div>
            </div>
        </div>
    </div>
    <div class="modal fade popup-cart" id="popup-cart" tabindex="-1" role="dialog" aria-hidden="true">
        <div class="modal-dialog">
            <div class="container">
                <div class="cart-items">

                    <div class="cart-items-inner" id="list-product-header">
                        @foreach ($danhSachGioHangClient as $gioHangClient)
                        <div class="media">
                            <a class="pull-left" href="/san-pham/{{ $gioHangClient->DuongDan }}">
                                <img class="media-object item-image" src="{{ Storage::url($gioHangClient->HinhAnh) }}" alt=""></a>
                            <p class="pull-right item-price">{{ number_format($gioHangClient->ThanhTien) }} đ</p>
                            <div class="media-body">
                                <h4 class="media-heading item-title"><a href="/san-pham/{{ $gioHangClient->DuongDan }}">{{ number_format($gioHangClient->soLuongGioHang) }} x {{ $gioHangClient->TenSanPham }}</a></h4>
                                <p class="item-desc">{{ $gioHangClient->TenKichCo }} - {{ $gioHangClient->TenMauSac }}</p>
                            </div>
                        </div>
                        @endforeach

                        @foreach ($danhSachGioHangClient2 as $gioHangClient2)
                        <div class="media">
                            <a class="pull-left" href="/san-pham/{{ $gioHangClient2->DuongDan }}">
                                <img class="media-object item-image" src="{{ Storage::url($gioHangClient2->HinhAnh) }}" alt=""></a>
                            <p class="pull-right item-price">{{ number_format($gioHangClient2->ThanhTien) }} đ</p>
                            <div class="media-body">
                                <h4 class="media-heading item-title"><a href="/san-pham/{{ $gioHangClient2->DuongDan }}">{{ number_format($gioHangClient2->SoLuongGioHang) }} x {{ $gioHangClient2->TenSanPham }}</a></h4>
                            </div>
                        </div>
                        @endforeach

                        <div class="media">
                            <p class="pull-right item-price">{{ number_format($tongTienSanPhamGioHangClient) }} đ</p>
                            <div class="media-body">
                                <h4 class="media-heading item-title summary">Tổng Tiền</h4>
                            </div>
                        </div>
                        <div class="media">
                            <div class="media-body">
                                <div>
                                    <a href="#" class="btn btn-theme btn-theme-dark" data-dismiss="modal">
                                        Đóng
                                    </a>
                                    <a href="{{ route("gio-hang.index") }}"
                                        class="btn btn-theme btn-theme-transparent btn-call-checkout">Giỏ Hàng
                                    </a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="navigation-wrapper">
        <div class="container">
            <nav class="navigation closed clearfix">
                <a href="#" class="menu-toggle-close btn"><i class="fa fa-times"></i></a>
                <ul class="nav sf-menu">
                    <li><a href="/">Trang chủ</a></li>
                    <li class="megamenu">
                        <a href="#" class="sf-with-ul">Môn Thể Thao</a>
                        <ul>
                            <li class="row" style="width: 100%">
                                @foreach ($dich_vu_san_pham as $dichVuSP)
                                <div class="col-md-2">
                                    <h4 class="block-title"><b>{{ $dichVuSP->TenDichVuSanPham }}</b></h4>
                                    <ul style="padding: 0px;">
                                        @foreach (DB::table("danh_muc_san_pham")->where("Xoa", 0)->where("ID_DichVuSanPham", $dichVuSP->id)->orderByDesc("id")->limit(7)->get() as $danhMucSP)
                                        <li><a href="{{route('danh-muc.show', xoadau($danhMucSP->TenDanhMucSanPham))}}">{{ $danhMucSP->TenDanhMucSanPham }}</a></li>
                                        @endforeach
                                    </ul>
                                </div>
                                @endforeach
                            </li>
                        </ul>
                    </li>
                    <li><a href="{{ route("danhSachBaiViet.index") }}">Bài viết</a></li>
                    <li><a href="{{ route("contact") }}">Liên hệ</a></li>
                    <li><a href="{{ route("faq") }}">FAQ</a></li>
                </ul>
            </nav>
        </div>
    </div>
</header>