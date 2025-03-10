@extends("admins.themes")

@section("titleHead")
    <title>Chi Tiết Đơn Hàng - ADMIN</title>
@endsection

@section('main')
    <div class="container" style="margin-top: 150px;">
        <div class="card shadow-lg">
            <div class="card-header bg-primary text-white d-flex justify-content-between align-items-center">
                <h4 class="mb-0 text-white">Chi Tiết Đơn Hàng</h4>
                <strong>Mã Đơn Hàng: #123456</strong>
            </div>
            <div class="card-body">
                <div class="mb-4 p-3 border rounded">
                    <h5 class="text-primary">Thông Tin Khách Hàng</h5>
                    <p><strong>Họ Tên:</strong> Nguyễn Văn A</p>
                    <p><strong>Số Điện Thoại:</strong> 0987654321</p>
                    <p><strong>Địa Chỉ:</strong> 123 Đường ABC, TP.HCM</p>
                </div>
                <h5 class="text-primary">Danh Sách Sản Phẩm</h5>
                <div class="table-responsive">
                    <table class="table table-hover table-bordered">
                        <thead class="table-dark">
                            <tr>
                                <th>#</th>
                                <th>Tên Sản Phẩm</th>
                                <th>Kích Cỡ</th>
                                <th>Màu Sắc</th>
                                <th>Số Lượng</th>
                                <th>Giá</th>
                                <th>Tổng Tiền</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td>1</td>
                                <td>Áo Cộc Nike</td>
                                <td>M</td>
                                <td>Đỏ</td>
                                <td>1</td>
                                <td>120.000đ</td>
                                <td>120.000đ</td>
                            </tr>
                        </tbody>
                    </table>
                </div>
                <h5 class="mt-4 text-primary">Trạng Thái Đơn Hàng</h5>
                <select class="form-control w-50">
                    <option>Chờ Xác Nhận</option>
                    <option>Đã Xác Nhận</option>
                    <option>Chuẩn Bị Giao</option>
                    <option>Đang Giao</option>
                    <option>Đã Giao</option>
                    <option>Giao Thất Bại</option>
                    <option>Đã Hủy</option>
                </select>
                <div class="mt-4">
                    <a href="{{ route('DonHang.index') }}" class="btn btn-secondary">
                        <i class="fas fa-arrow-left"></i> Quay Lại
                    </a>
                </div>
            </div>
        </div>
    </div>
@endsection