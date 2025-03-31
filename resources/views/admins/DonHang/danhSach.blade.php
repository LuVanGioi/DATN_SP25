@extends("admins.themes")

@section("titleHead")
    <title>Quản Lý Đơn Hàng - ADMIN</title>
@endsection

@section('main')
    <div class="page-body">
        <div class="container-fluid pt-3">
            <div class="card">
                <div class="card-header d-flex justify-content-between align-items-center">
                    <h5>Quản Lý Đơn Hàng</h5>
                </div>
                <div class="card-body">
                    <div class="table-responsive">
                        <div id="dom-jqry_wrapper" class="dataTables_wrapper dt-bootstrap5">
                            <table class="table table-striped table-bordered nowrap dataTable">
                                <thead>
                                    <tr>
                                        <th>#</th>
                                        <th>Mã Đơn Hàng</th>
                                        <th>Sản Phẩm</th>
                                        <th>Trạng thái</th>
                                        <th>Phương Thức Thanh Toán</th>
                                        <th>Thao Tác</th>
                                    </tr>
                                </thead>
                                <tbody>
                                  @foreach ($donHang as $item)
                                      <tr>
                                        <td>{{$item->id}}</td>
                                        <td>{{$item->MaDonHang}}</td>
                                        <td>{{$item->TenSanPham}}</td>
                                        <td>
                                            <select name="" class="form-control">
                                                <option value="">Chờ Xác Nhận</option>
                                                <option value="">Đã Xác Nhận</option>
                                                <option value="">Đang Giao Hàng</option>
                                                <option value="">Đã Giao Hàng</option>
                                                <option value="">Giao Thất Bại</option>
                                                <option value="">Đã Hủy</option>
                                                <option value="">Hoàn Hàng</option>
                                            </select>
                                        </td>
                                        <td>{{$item->PhuongThucThanhToan}}</td>
                                        <td>
                                            <a class="btn btn-info btn-sm" href="{{ route('DonHang.show', 1234) }}">Xem Chi Tiết</a>
                                        </td>
                                    </tr>
                                  @endforeach
                                    
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection