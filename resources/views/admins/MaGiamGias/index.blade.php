@extends("admins.themes")

@section("titleHead")
<title>Danh Sách Mã Giảm Giá - ADMIN</title>
@endsection

@section("main")
<div class="page-body">
    <div class="container-fluid pt-3">
        @if (session('success'))
        <div class="alert alert-success fade show" role="alert">
            <p>{{ session('success') }}</p>
        </div>
        @endif

        @if (session('error'))
        <div class="alert alert-danger fade show" role="alert">
            <p>{{ session('error') }}</p>
        </div>
        @endif
        
        <div class="card">
            <div class="card-header d-flex justify-content-between align-items-center">
                <h5>DANH SÁCH MÃ GIẢM GIÁ</h5>
                <div class="text-end">
                    <a href="{{ route('maGiamGias.create') }}" class="btn btn-primary btn-sm ms-2">Thêm Mã Giảm Giá</a>
                </div>
                
            </div>
            <div class="card-body">
                <div class="table-responsive">
                    <div id="dom-jqry_wrapperr" class="dataTables_wrapper dt-bootstrap5">
                        <table class="table table-striped table-bordered nowrap dataTable">
                            <thead>
                                <tr>
                                    <th>#</th>
                                    <th>Tên Mã</th>
                                    <th>Số Lượng</th>
                                    <th>Giá Trị</th>
                                    <th>Giá Trị Đơn Hàng Tối Thiểu</th>
                                    <th>Giá Trị Giảm Giá Tối Thiểu </th>
                                    <th>Điều Kiện</th>
                                    <th>Ngày Bắt Đầu</th>
                                    <th>Ngày Kết Thúc</th>
                                    <th>Trạng Thái</th>
                                    <th>Thao Tác</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($maGiamGias as $maGiamGia)
                                <tr>
                                    <td>{{ $maGiamGia['id'] }}</td>
                                    <td>{{ $maGiamGia['name'] }}</td>
                                    <td>{{ $maGiamGia['quantity'] }}</td>
                                    <td>{{ $maGiamGia['value'] }}%</td>
                                    <td>{{ $maGiamGia['max_value'] }} VNĐ</td>
                                    <td>{{ $maGiamGia['min_value'] }} VNĐ</td>
                                    <td>{{ $maGiamGia['condition'] }}</td>
                                    <td>{{ $maGiamGia['start_date'] }}</td>
                                    <td>{{ $maGiamGia['end_date'] }}</td>
                                    <td>{{ $maGiamGia['status'] }}</td>
                                    <td>
                                        <a href="{{ route('maGiamGias.edit', $maGiamGia['id']) }}" class="btn btn-primary btn-sm">Sửa</a>
                                        <form action="{{ route('maGiamGias.destroy', $maGiamGia['id']) }}" method="POST" class="d-inline" onsubmit="return confirm('Bạn có muốn xóa không?');">
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
                </div>
            </div>
        </div>
    </div>
</div>
@endsection