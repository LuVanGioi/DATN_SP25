@extends("admins.themes")

@section("titleHead")
  <title>THÔNG TIN THÀNH VIÊN - ADMIN</title>
@endsection


@section("main")


  <div class="page-body">
    <div class="container-fluid">
    <div class="page-title">
      <div class="row">
      <div class="col-6">
        <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="index.html">
          <svg class="stroke-icon">
            <use href="../assets/svg/icon-sprite.svg#stroke-home"></use>
          </svg></a></li>
        </ol>
      </div>
      </div>
    </div>
    </div>
    <!-- Container-fluid starts-->
    <div class="container-fluid">
    <div class="edit-profile">
      <div class="row">
      <div class="col-xl-12">
        <form class="card">
          <div class="card-body">
          <div class="card">
          <div class="card-header">
            <h4 class="card-title mb-0" style="text-align: center">THÔNG TIN KHÁCH HÀNG</h4>
            <div class="card-options"><a class="card-options-collapse" href="#" data-bs-toggle="card-collapse"><i
              class="fe fe-chevron-up"></i></a><a class="card-options-remove" href="#"
              data-bs-toggle="card-remove"><i class="fe fe-x"></i></a></div>
          </div>
          <div class="card-body">
            <form>
            <div class="row mb-2">
              <div class="profile-title">
              <div class="media"> <img class="img-70 rounded-circle" alt="" src="../assets/images/user/7.jpg">
                <div class="media-body">
                <h5 class="mb-1">Tên Khách Hàng</h5>
                </div>
              </div>
              </div>
            </div>
            <div class="mb-3">
              <label class="form-label">Email</label>
              <input class="form-control"  disabled>
            </div>
            <div class="mb-3">
              <label class="form-label">Mật Khẩu</label>
              <input class="form-control" type="password" disabled>
            </div>
            <div class="row">
              <div class="col-md-12">
                <div class="mb-3">
                <label class="form-label">Số Điện Thoại</label>
                <input class="form-control" type="text"  disabled>
                </div>
              </div>
              <div class="col-sm-6 col-md-12">
                <div class="mb-3">
                <label class="form-label">Ngày Sinh</label disabled>
                <input class="form-control" type="date" >
                </div>
              </div>
              <div class="col-sm-6 col-md-12">
                <div class="mb-3">
                <label class="form-label">Giới Tính</label >
                <input class="form-control" type="text" disabled>
                </div>
              </div>
              <div class="col-sm-6 col-md-12">
                <div class="mb-3">
                <label class="form-label">Địa Chỉ</label>
                <input class="form-control" type="text" disabled>
                </div>
              </div>
              </div>
            </form>
          </div>
          </div>
         
        </div>
        <div class="card-footer text-center">
          <a href="/admin/KhachHang">
          <button class="btn btn-primary" type="submit">Quay Lại</button></a>
        </div>
        </form>
      </div>

      </div>
    </div>
    </div>
    <!-- Container-fluid Ends-->
  </div>


@endsection