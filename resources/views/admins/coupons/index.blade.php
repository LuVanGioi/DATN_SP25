@extends("admins.themes")

@section("titleHead")
    <title>Danh Sách Mã Giảm Giá - ADMIN</title>
@endsection

@section("main")
<div class="page-body">
    <div class="container-fluid pt-3">
        <div class="card">
            <div class="card-header d-flex justify-content-between align-items-center">
                <h5>DANH SÁCH MÃ GIẢM GIÁ</h5>
                <div class="d-flex">
                    <input type="text" class="form-control me-2" placeholder="Tìm kiếm mã... 🔎" style="max-width: 300px;">
                    <a href="{{ route('coupons.create') }}" class="btn btn-success btn-sm">Thêm Mã Giảm Giá</a>
                </div>
            </div>
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table table-hover table-striped">
                        <thead class="table-dark">
                            <tr>
                                <th>#</th>
                                <th>Tên Mã</th>
                                <th>Giá Trị</th>
                                <th>Giá Trị Tối Thiểu</th>
                                <th>Giá Trị Tối Đa</th>
                                <th>Điều Kiện</th>
                                <th>Ngày Bắt Đầu</th>
                                <th>Ngày Kết Thúc</th>
                                <th>Trạng Thái</th>
                                <th>Thao Tác</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($couponsPaginator as $coupon)
                            <tr>
                                <td>{{ $coupon['id'] }}</td> <!-- Sử dụng cú pháp mảng -->
                                <td>{{ $coupon['name'] }}</td>
                                <td>{{ $coupon['value'] }}%</td>
                                <td>{{ $coupon['min_value'] }} VNĐ</td>
                                <td>{{ $coupon['max_value'] }} VNĐ</td>
                                <td>{{ $coupon['condition'] }}</td>
                                <td>{{ $coupon['start_date'] }}</td>
                                <td>{{ $coupon['end_date'] }}</td>
                                <td>{{ $coupon['status'] }}</td>
                                <td>
                                    <a href="{{ route('coupons.edit', $coupon['id']) }}" class="btn btn-primary btn-sm">Sửa</a>
                                    <form action="{{ route('coupons.destroy', $coupon['id']) }}" method="POST" class="d-inline" onsubmit="return confirm('Bạn có muốn xóa không?');">
                                        @csrf
                                        @method("DELETE")
                                        <button type="submit" class="btn btn-danger btn-sm">Xóa</button>
                                    </form>
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
                <div class="d-flex justify-content-end mt-3">
                    <nav>
                        <ul class="pagination">
                            @if ($couponsPaginator->onFirstPage())
                                <li class="page-item disabled"><a class="page-link" href="#">Trước</a></li>
                            @else
                                <li class="page-item"><a class="page-link" href="{{ $couponsPaginator->previousPageUrl() }}">Trước</a></li>
                            @endif
                            
                            @for ($i = 1; $i <= $couponsPaginator->lastPage(); $i++)
                                @if ($i == $couponsPaginator->currentPage())
                                    <li class="page-item active"><a class="page-link" href="#">{{ $i }}</a></li>
                                @else
                                    <li class="page-item"><a class="page-link" href="{{ $couponsPaginator->url($i) }}">{{ $i }}</a></li>
                                @endif
                            @endfor
                            
                            @if ($couponsPaginator->hasMorePages())
                                <li class="page-item"><a class="page-link" href="{{ $couponsPaginator->nextPageUrl() }}">Sau</a></li>
                            @else
                                <li class="page-item disabled"><a class="page-link" href="#">Sau</a></li>
                            @endif
                        </ul>
                    </nav>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection