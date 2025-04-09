<div class="footer-widgets">
    <div class="container">
        <div class="row">
            <div class="col-md-3">
                <div class="widget">
                    <h4 class="widget-title">Về chúng tôi</h4>
                    <p>Chúng tôi tự hào mang đến những sản phẩm quần áo thể thao chất lượng, giúp bạn luôn
                        tự tin và thoải mái. Hãy cùng chúng tôi đồng hành trên hành trình chinh phục đỉnh
                        cao của chính bạn!</p>
                    <ul class="social-icons">
                        <li><a href="#"><i class="fab fa-facebook"></i></a></li>
                        <li><a href="#"><i class="fab fa-tiktok"></i></a></li>
                        <li><a href="#"><i class="fab fa-square-instagram"></i></a></li>
                        <li><a href="#"><i class="fab fa-telegram"></i></a></li>
                    </ul>
                </div>
            </div>
            <div class="col-md-3">
                <div class="widget">
                    <h4 class="widget-title">Tin tức</h4>
                    <p>Đăng ký nhận tin tức & khuyến mãi qua Email.</p>
                    @if (session("success_support"))
                    <div class="alert alert-success">
                        {{ session('success_support') }}
                    </div>
                    @endif

                    <form action="{{ route("emailForm") }}" method="POST">
                        @csrf
                        <div class="form-group">
                            <input class="form-control" type="email" placeholder="Nhập Email nhận thông báo của bạn" name="email" value="{{ old("email") }}">
                            @error("email")
                            <p class="text-danger">{{ $message }}</p>
                            @enderror
                        </div>
                        <div class="form-group">
                            <button type="submit" class="btn btn-theme btn-theme-transparent">Đăng ký</button>
                        </div>
                    </form>
                </div>
            </div>
            <div class="col-md-3">
                <div class="widget widget-categories">
                    <h4 class="widget-title">Liên kết</h4>
                    <ul>
                        @foreach ($lienKetWebsiteClient as $lienKet)
                        <li><a href="/url/{{ $lienKet->DuongDan }}">{{ $lienKet->TieuDe }}</a></li>
                        @endforeach
                    </ul>
                </div>
            </div>
            <div class="col-md-3">
                <div class="widget widget-categories">
                    <h4 class="widget-title">Thông tin liên hệ</h4>
                    <ul>
                        @foreach ($danhSachLienHe as $lienHe)
                        <li><a href="{{ $lienHe->DuongDan }}" target="_blank">{{ $lienHe->TenPhuongThuc }}</a></li>
                        @endforeach
                    </ul>
                </div>
            </div>
        </div>
    </div>
</div>
<div class="footer-meta">
    <div class="container">
        <div class="row">
            <div class="col-sm-6">
                <div class="copyright">Copyright 2025 {{ $caiDatWebsite->TenCuaHang }} | All Rights Reserved</div>
            </div>
            <div class="col-sm-6">
                <div class="payments">
                    <ul>
                        <li><img src="/clients/images/visa.jpg" alt=""></li>
                        <li><img src="/clients/images/mastercard.jpg" alt=""></li>
                        <li><img src="/clients/images/paypal.jpg" alt=""></li>
                        <li><img src="/clients/images/american-express.jpg" alt=""></li>
                        <li><img src="/clients/images/visa-electron.jpg" alt=""></li>
                        <li><img src="/clients/images/maestro.jpg" alt=""></li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
</div>

<div class="form-contact">
    <ul class="list-contacts">
        @if ($tien_ich_zalo->TrangThai == 1)
        <li>
            <a href="//zalo.me/{{ $tien_ich_zalo->SoDienThoai }}" target="_blank">
                <span class="icon">
                    <img src="https://img.icons8.com/ios-filled/50/1A1A1A/zalo.png" alt="">
                </span>
            </a>
        </li>
        @endif
        @if ($tien_ich_phone->TrangThai == 1)
        <li>
            <a href="tel:{{ $tien_ich_phone->SoDienThoai }}" target="_blank">
                <span class="icon">
                    <img src="https://img.icons8.com/ios-filled/50/1A1A1A/phone-not-being-used.png" alt="">
                </span>
            </a>
        </li>
        @endif
        @if ($tien_ich_email_fb->TrangThai == 1)
        <li>
            <a href="{{ $tien_ich_email_fb->DuongDan }}" target="_blank">
                <span class="icon">
                    <img src="https://img.icons8.com/external-tanah-basah-glyph-tanah-basah/48/1A1A1A/external-facebook-social-media-tanah-basah-glyph-tanah-basah.png" alt="">
                </span>
            </a>
        </li>
        <li>
            <a href="mailTo:{{ $tien_ich_email_fb->SoDienThoai }}" target="_blank">
                <span class="icon">
                    <img src="https://img.icons8.com/ios-filled/50/1A1A1A/message-squared.png" alt="">
                </span>
            </a>
        </li>
        @endif
    </ul>
</div>