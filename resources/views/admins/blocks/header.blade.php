<div class="page-header">
  <div class="header-wrapper row m-0">
    <form class="form-inline search-full col" action="#" method="get">
      <div class="form-group w-100">
        <div class="Typeahead Typeahead--twitterUsers">
          <div class="u-posRelative">
            <input class="demo-input Typeahead-input form-control-plaintext w-100" type="text" placeholder="Tìm kiếm sản phẩm" name="q" title="" autofocus="">
            <div class="spinner-border Typeahead-spinner" role="status"><span class="sr-only">Loading... </span></div><i class="close-search" data-feather="x"></i>
          </div>
          <div class="Typeahead-menu"> </div>
        </div>
      </div>
    </form>
    <div class="header-logo-wrapper col-auto p-0">
      <div class="logo-wrapper">
        <a href="/">
          <img class="img-fluid for-light" src="/admins/images/logo/logo_DATN.png" style="width:100px" alt="logo-light">
          <img class="img-fluid for-dark" src="/admins/images/logo/logo_DATN.png" style="width:100px" alt="logo-dark">
        </a>
      </div>
      <div class="toggle-sidebar"> <i class="status_toggle middle sidebar-toggle" data-feather="align-center"></i></div>
    </div>
    <div class="left-header col-xxl-5 col-xl-6 col-lg-5 col-md-4 col-sm-3 p-0">
      <div> <a class="toggle-sidebar" href="#"> <i class="iconly-Category icli"> </i></a>
        <div class="d-flex align-items-center gap-2 ">
          <h4 class="f-w-600">TRANG QUẢN TRỊ</h4>
        </div>
      </div>
      <div class="welcome-content d-xl-block d-none"><span class="text-truncate col-12">Website Bán Quần Áo Thể Thao</span></div>
    </div>
    <div class="nav-right col-xxl-7 col-xl-6 col-md-7 col-8 pull-right right-header p-0 ms-auto">
      <ul class="nav-menus">
        <li>
          <div class="mode"><i class="moon" data-feather="moon"> </i></div>
        </li>

        <li class="profile-nav onhover-dropdown">
          <div class="media profile-media">
            <img class="b-r-10" src="/admins/images/profile.png" alt="">
            <div class="media-body d-xxl-block d-none box-col-none">
              <div class="d-flex align-items-center gap-2"> <a href="{{route('home.index')}}"><span>{{Auth::user()->name}}</span><i class="middle fa fa-angle-down"> </i> </a> </div>
              <p class="mb-0 font-roboto">Quản Trị Viên</p>
            </div>
          </div>

          <ul class="profile-dropdown onhover-show-div active">
            <li><a href="{{route('admin.thongtin', Auth::user()->id)}}"><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-user">
                  <path d="M20 21v-2a4 4 0 0 0-4-4H8a4 4 0 0 0-4 4v2"></path>
                  <circle cx="12" cy="7" r="4"></circle>
                </svg><span>Thông Tin</span></a></li>
            <li>
              <form action="{{route('logout')}}" method="POST" class="d-flex align-items-center">
                @csrf
                <button class="btn btn-primary d-flex align-items-center">
                  <i class="fas fa-sign-out-alt me-2"></i> Đăng Xuất
                </button>
              </form>
            </li>
          </ul>
        </li>
      </ul>
    </div>
  </div>
</div>