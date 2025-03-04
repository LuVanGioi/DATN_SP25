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
                    <form action="#">
                        <div class="form-group">
                            <input class="form-control" type="text"
                                placeholder="Nhập Email nhận thông báo của bạn">
                        </div>
                        <div class="form-group">
                            <button class="btn btn-theme btn-theme-transparent">Đăng ký</button>
                        </div>
                    </form>
                </div>
            </div>
            <div class="col-md-3">
                <div class="widget widget-categories">
                    <h4 class="widget-title">Liên kết</h4>
                    <ul>
                        <li><a href="/gioi-thieu-cua-hang">Về chúng tôi</a></li>
                        <li><a href="/tim-kiem">Tìm kiếm</a></li>
                        <li><a href="/chinh-sach-doi-tra">Chính sách đổi trả</a></li>
                        <li><a href="/chinh-sach-bao-mat">Chính sách bảo mật</a></li>
                        <li><a href="/dieu-khoan-dich-vu">Điều khoản dịch vụ</a></li>
                        <li><a href="/lien-he">Liên hệ</a></li>
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
                <div class="copyright">Copyright 2025 Wanderweave | All Rights Reserved</div>
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