<div class="logo-wrapper">
  <a href="/">
    <img class="img-fluid" src="/admins/images/logo/logo_DATN.png" style="width: 200px" alt="">
  </a>
  <div class="back-btn"><i class="fa fa-angle-left"> </i></div>
</div>
<div class="logo-icon-wrapper">
  <a href="/">
    <img class="img-fluid" src="/admins/images/logo-icon.png" alt="">
  </a>
</div>
<nav class="sidebar-main">
  <div class="left-arrow" id="left-arrow"><i data-feather="arrow-left"></i></div>
  <div id="sidebar-menu">
    <ul class="sidebar-links" id="simple-bar">
      <li class="back-btn">
        <a href="/">
          <img class="img-fluid" src="/admins/images/logo-icon.png" alt="">
        </a>
        <div class="mobile-back text-end"> <span>Back </span><i class="fa fa-angle-right ps-2" aria-hidden="true"></i>
        </div>
      </li>
      <li class="pin-title sidebar-main-title">
        <div>
          <h6>PIN</h6>
        </div>
      </li>
      <li class="sidebar-main-title">
        <div>
          <h6>DASHBOARD</h6>
        </div>
      </li>
      <li class="sidebar-list">
        <i class="fa fa-thumb-tack"> </i>
        <a class="sidebar-link" href="{{ route(name: "home.index") }}">
          <i class="fa-light fa-objects-column"></i>
          <span>Thống Kê</span>
        </a>
      </li>
      <li class="sidebar-list">
        <i class="fa fa-thumb-tack"> </i>
        <a class="sidebar-link" href="{{ route("KhachHang.index") }}">
          <i class="fal fa-users"></i>
          <span>Khách Hàng</span>
        </a>
      </li>
      <li class="sidebar-list">
        <i class="fa fa-thumb-tack"></i>
        <a class="sidebar-link sidebar-title">
          <i class="fa-light fa-grid-2-plus"></i>
          <span>Sản Phẩm</span></a>
        <ul class="sidebar-submenu">
          <li><a href="{{ route("DichVu.index") }}">Môn Thể Thao</a></li>
          <li><a href="{{ route("DanhMuc.index") }}">Danh Mục</a></li>
          <li><a href="{{ route("ThuongHieu.index") }}">Thương Hiệu</a></li>
          <li><a href="{{ route("BienThe.index") }}">Biến Thể</a></li>
          <li><a href="{{ route("SanPham.index") }}">Sản Phẩm</a></li>
        </ul>
      </li>
      <li class="sidebar-list">
        <i class="fa fa-thumb-tack"></i>
        <a class="sidebar-link sidebar-title">
          <i class="fa-solid fa-newspaper"></i>
          <span>Bài Viết</span></a>
        <ul class="sidebar-submenu">
          <li><a href="{{ route("DanhMucBaiViet.index") }}">Danh Mục</a></li>
          <li><a href="{{ route("BaiViet.index") }}">Bài Viết</a></li>
          {{-- <li><a href="{{ route("BinhLuanBaiViet.index") }}">Bình Luận Bài Viết</a>
      </li> --}}
    </ul>
    </li>

    <li class="sidebar-list">
      <i class="fa fa-thumb-tack"></i>
      <a class="sidebar-link sidebar-title">
        <i class="fa-light fa-envelope"></i>
        <span>Mã Giảm Giá</span></a>
      <ul class="sidebar-submenu">
        <li><a href="{{ route('maGiamGias.index') }}">Danh Sách</a></li>
        <li><a href="{{ route('maGiamGias.create') }}">Tạo Mã</a></li>
      </ul>
    </li>

    <li class="sidebar-list">
      <i class="fa fa-thumb-tack"> </i>
      <a class="sidebar-link" href="{{ route('DonHang.index') }}">
        <i class="fa-light fa-bags-shopping"></i>
        <span>Đơn Hàng</span>
      </a>
    </li>

    <li class="sidebar-list">
      <i class="fa fa-thumb-tack"> </i>
      <a class="sidebar-link" href="{{route('RutTienVi.index')}}">
        <i class="fa-light fa-money-bill"></i>
        <span>Danh Sách Rút Tiền</span>
      </a>
    </li>

    <li class="sidebar-list">
      <i class="fa fa-thumb-tack"> </i>
      <a class="sidebar-link" href="{{route('Banner.index')}}">
        <i class="fa-light fa-image"></i>
        <span>Banners</span>
      </a>
    </li>

    <li class="sidebar-list">
      <i class="fa fa-thumb-tack"> </i>
      <a class="sidebar-link" href="/admin/BaoCao">
        <i class="fa-light fa-bug"></i>
        <span>Yêu Cầu Hỗ Trợ</span>
      </a>
    </li>

    <li class="sidebar-list">
      <i class="fa fa-thumb-tack"> </i>
      <a class="sidebar-link" href="{{ route("ThongTinLienHe.index") }}">
        <i class="fa-light fa-headset"></i>
        <span>Thông Tin Liên Hệ</span>
      </a>
    </li>

    <li class="sidebar-list">
      <i class="fa fa-thumb-tack"> </i>
      <a class="sidebar-link" href="{{ route("CaiDatWebsite.index") }}">
        <i class="fa-light fa-cog"></i>
        <span>Cài Đặt Website</span>
      </a>
    </li>

    <li class="sidebar-list">
      <i class="fa fa-thumb-tack"> </i>
      <a class="sidebar-link" href="{{ route("LienKetWebsite.index") }}">
        <i class="fa-light fa-link"></i>
        <span>Liên Kết Website</span>
      </a>
    </li>

    <li class="sidebar-list">
      <i class="fa fa-thumb-tack"> </i>
      <a class="sidebar-link" href="{{ route("FAQ.index") }}">
        <i class="fa-light fa-square-question"></i>
        <span>FAQ</span>
      </a>
    </li>

    </ul>
    <div class="right-arrow" id="right-arrow"><i data-feather="arrow-right"></i></div>
  </div>
</nav>