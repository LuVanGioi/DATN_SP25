<div class="top-bar">
    <div class="container">
        <div class="top-bar-left">
            <ul class="list-inline">
                @if (Auth::check())
                <li>
                    <a href=""><i class="fas fa-user"></i> {{Auth::user()->name}}</a>
                </li>
                <li>
                    <form action="{{route('logout')}}" method="POST">
                        @csrf
                        <button class="btn-none"><i class="fas fa-sign-out-alt"></i>Đăng Xuất</button>
                    </form>
                </li>
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
                <li class="hidden-xs"><a href="/gioi-thieu-cua-hang">Giới thiệu</a></li>
                <li class="hidden-xs"><a href="/danh-sach-bai-viet">Bài viết</a></li>
                <li class="hidden-xs"><a href="/thong-tin-tai-khoan">Tài khoản</a></li>
                <li class="hidden-xs"><a href="/lien-he">Liên hệ</a></li>
                <li class="hidden-xs"><a href="/faq">FAQ</a></li>
                <li class="hidden-xs"><a href="/san-pham-yeu-thich">Sản phẩm yêu thích</a></li>
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
                <a href="/"><img src="/clients/images/LOGO/logo.png" alt="WD - 14"></a>
            </div>

            <div class="header-search">
                <input class="form-control" type="text" placeholder="Tìm kiếm sản phẩm">
                <button><i class="fa fa-search"></i></button>
            </div>

            <div class="header-cart">
                <div class="cart-wrapper">
                    <a href="/thong-tin-tai-khoan" class="btn btn-theme-transparent hidden-xs hidden-sm"><i
                            class="fa fa-user-circle"></i></a>
                    <a href="#" class="btn btn-theme-transparent" data-toggle="modal" data-target="#popup-cart"><i
                            class="fa fa-shopping-cart"></i> <span class="hidden-xs"> 0
                            Sản phẩm - 0 đ </span> <i class="fa fa-angle-down"></i></a>
                    <a href="#" class="menu-toggle btn btn-theme-transparent"><i class="fa fa-bars"></i></a>
                </div>
            </div>
        </div>
    </div>
    <div class="navigation-wrapper">
        <div class="container">
            <nav class="navigation closed clearfix">
                <a href="#" class="menu-toggle-close btn"><i class="fa fa-times"></i></a>
                <ul class="nav sf-menu">
                    <li class="active"><a href="/">Trang chủ</a></li>
                    <li>
                        <a href="#">Hàng mới về</a>
                        <ul></ul>
                    </li>
                    <li>
                        <a href="#">Danh mục</a>
                        <ul>
                            @foreach ($danhMucSanPham as $danhMuc)
                                {{-- <li><a
                                    href="/danh-muc/{{ xoadau($danhMuc->TenDanhMucSanPham) }}">{{ $danhMuc->TenDanhMucSanPham }}</a>
                                </li> --}}
                            @endforeach
                        </ul>
                    </li>
                    <li><a href="/danh-sach-bai-viet">Bài viết</a></li>
                    <li><a href="/gioi-thieu-cua-hang">Giới thiệu</a></li>
                    <li><a href="/lien-he">Liên hệ</a></li>
                </ul>
            </nav>
        </div>
    </div>
</header>