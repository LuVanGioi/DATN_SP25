@extends("admins.themes")

@section("titleHead")
  <title>THÔNG TIN kHÁCH HÀNG - ADMIN</title>
@endsection


@section("main")
  <div class="page-body">
    <div class="container-fluid">
    <div class="page-title">
      <div class="row">
      <div class="col-6">
        <h4>THÔNG TIN KHÁCH HÀNG</h4>
      </div>
      </div>
    </div>
    </div>
    <div class="container-fluid">
    <div class="edit-profile">
      <div class="row">
      <div class="col-xl-4">
        <div class="card">
        <div class="card-header">

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
              <h5 class="mb-1">{{$chiTiet->name}}</h5>
              </div>
            </div>
            </div>
          </div>

          <div class="mb-3">
            <label class="form-label">Email</label>
            <input class="form-control" value="{{$chiTiet->email}}" disabled>
          </div>

          <div class="mb-3">
            <label class="form-label">Vai trò</label>
            <input class="form-control" value="{{$chiTiet->role == 'User' ? "Khách" : 'Quản Trị'}}" disabled>
          </div>
          <div class="mb-3">
            <label class="form-label">Giới Tính</label>
            <input class="form-control" name="sex" type="text" value="{{$chiTiet->sex}}" disabled>
          </div>
          <div class="mb-3">
            <label class="form-label">Ngày Sinh</label>
            <input class="form-control" name="birthday" type="date" value="{{$chiTiet->birthday}}" disabled>
          </div>

          <div class="mb-3">
            <label class="form-label">Giới Tính</label>
            <input class="form-control" name="sex" type="text" value="{{$chiTiet->sex}}" disabled>
          </div>

          <div class="mb-3">
            <label class="form-label">Số Điện Thoại</label>
            <input class="form-control" name="phone" type="number" value="{{$chiTiet->phone}}" disabled>
          </div>

          <div class="mb-3">
            <label class="form-label">Địa Chỉ</label>
            <input class="form-control" name="address" type="text" value="{{$chiTiet->address}}" disabled>
          </div>

          <div class="mb-3">
            <label class="form-label">Thời Gian Tham Gia</label>
            <input class="form-control" value="{{$chiTiet->created_at}}" disabled>
          </div>
          </form>
        </div>
        </div>
      </div>
      <div class="col-xl-8">
        <form class="card">
        <div class="card-header">
          <h4 class="card-title mb-0">Lịch Sử Mua Hàng</h4>
          <div class="card-options"><a class="card-options-collapse" href="#" data-bs-toggle="card-collapse"><i
            class="fe fe-chevron-up"></i></a><a class="card-options-remove" href="#"
            data-bs-toggle="card-remove"><i class="fe fe-x"></i></a></div>
        </div>
        <div class="col-sm-12">
          <div class="card">
          <div class="card-body">
            <div class="table-responsive custom-scrollbar">
            
                <table class="display dataTable no-footer" id="basic-1" role="grid" aria-describedby="basic-1_info">
                  <thead>
                    <tr role="row">
                      <th>Mã Đơn Hàng</th>
                      <th>Tên Sản Phẩm</th>
                      <th>Ngày Mua</th>
                      <th class="">Số Lượng</th>
                      <th>Tổng Tiền</th>
                      <th>Trạng Thái</th>
                      <th>Thao tác</th>
                    </tr>
                  </thead>
                  <tbody>
                    @foreach ($donHang as $item)
                      <tr role="row">
                        <td>{{$item->MaDonHang}}</td>
                        <td>{{$item->TenSanPham}}</td>
                        <td>{{\Carbon\Carbon::parse($item->created_at)->format('d/m/Y')}}</td>
                        <td>{{$item->SoLuong}}</td>
                        <td>{{number_format($item->GiaTien * $item->SoLuong, 0, ',', '.')}} đ</td>
                        <td>{{$item->TrangThai}}</td>
                        {{-- <td><a href="{{ route('donhang.show', $item->MaDonHang) }}">Chi Tiết</a></td> --}}
                      </tr>
                    @endforeach
                  </tbody>
                </table>
                

              </tbody>
            </table>
            <div class="dataTables_paginate paging_simple_numbers" id="basic-1_paginate"><a
              class="paginate_button previous disabled" aria-controls="basic-1" data-dt-idx="0" tabindex="0"
              id="basic-1_previous">Previous</a><span><a class="paginate_button current"
                aria-controls="basic-1" data-dt-idx="1" tabindex="0">1</a><a class="paginate_button "
                aria-controls="basic-1" data-dt-idx="2" tabindex="0">2</a></span><a
              class="paginate_button next" aria-controls="basic-1" data-dt-idx="3" tabindex="0"
              id="basic-1_next">Next</a></div>
            </div>
          </div>
          </div>
        </div>
      </div>
      <div class="card-footer ">
        <a class="btn btn-dark" href="{{route('KhachHang.index')}}">Quay Lại</a>
      </div>
      </form>
      </div>
    </div>
    </div>
  </div>
  </div>

@endsection