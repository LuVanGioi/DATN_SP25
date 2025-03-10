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
                                        <th>ID_SanPham</th>
                                        <th>ID_BienThe</th>
                                        <th>Tên Sản Phẩm</th>
                                        <th>Kích Cỡ</th>
                                        <th>Màu Sắc</th>
                                        <th>Giá</th>
                                        <th>Số Lượng</th>
                                        <th>Tổng Tiền</th>
                                        <th>ID_HoaDon</th>
                                        <th>Trạng thái đơn hàng</th>
                                        <th>Ghi Chú</th>
                                        <th>Thao Tác</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr>
                                        <td>#</td>
                                        <td>001</td>
                                        <td>001</td>
                                        <td>Áo cộc Nike</td>
                                        <td>M</td>
                                        <td>Đỏ</td>
                                        <td>120.000đ</td>
                                        <td>1</td>
                                        <td>120.000đ</td>
                                        <td>001</td>
                                        <td>
                                            <select name="" id="">
                                                <option value="">Chờ Xác Nhận</option>
                                                <option value="">Đã Xác Nhận</option>
                                                <option value="">Chuẩn Bị Giao</option>
                                                <option value="">Đang Giao</option>
                                                <option value="">Đã Giao</option>
                                                <option value="">Giao Thất Bại</option>
                                                <option value="">Đã Hủy</option>
                                            </select>
                                        </td>
                                        <td>Ghi Chú</td>
                                        <td>
                                            <a class="btn btn-info btn-sm" href="{{ route('DonHang.show', 1234) }}">Xem Chi
                                                Tiết</a>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>#</td>
                                        <td>002</td>
                                        <td>002</td>
                                        <td>Áo Khoác Adidas</td>
                                        <td>L</td>
                                        <td>Trắng</td>
                                        <td>120.000đ</td>
                                        <td>1</td>
                                        <td>120.000đ</td>
                                        <td>002</td>
                                        <td>
                                            <select name="" id="">
                                                <option value="">Chờ Xác Nhận</option>
                                                <option value="">Đã Xác Nhận</option>
                                                <option value="">Chuẩn Bị Giao</option>
                                                <option value="">Đang Giao</option>
                                                <option value="">Đã Giao</option>
                                                <option value="">Giao Thất Bại</option>
                                                <option value="">Đã Hủy</option>
                                            </select>
                                        </td>
                                        <td>Ghi Chú</td>
                                        <td>
                                            <a class="btn btn-info btn-sm" href="">Xem Chi Tiết</a>
                                        </td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection