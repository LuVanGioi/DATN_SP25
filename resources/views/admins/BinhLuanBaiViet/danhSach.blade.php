@extends("admins.themes")

@section("titleHead")
    <title>Danh Sách Bình Luận và Phản Hồi - ADMIN</title>
@endsection

@section('main')
    <div class="page-body">
        <div class="container-fluid pt-3">
            <!-- Bảng Bình Luận -->
            <div class="card">
                <div class="card-header d-flex justify-content-between align-items-center">
                    <h5>QUẢN LÝ BÌNH LUẬN</h5>
                    <div class="text-end">
                        <a href="#" class="btn btn-dark btn-sm">Thùng Rác</a>
                    </div>
                </div>
                <div class="card-body">
                    <div class="table-responsive dt-responsive">
                        <table class="table table-striped table-bordered nowrap dataTable">
                            <thead>
                                <tr>
                                    <th>#</th>
                                    <th>ID Bài Viết</th>
                                    <th>ID Tài Khoản</th>
                                    <th>Nội Dung</th>
                                    <th>Ngày Bình Luận</th>
                                    <th>Thao Tác</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($binhLuans as $binhLuan)
                                    <tr>
                                        <td>{{ $binhLuan->id }}</td>
                                        <td>{{ $binhLuan->id_baiviet }}</td>
                                        <td>{{ $binhLuan->id_users }}</td>
                                        <td>{{ $binhLuan->noi_dung }}</td>
                                        <td>{{ date('d/m/Y', strtotime($binhLuan->ngay_binh_luan)) }}</td>
                                        <td>
                                            <a href="{{ route('binhluan.edit', $binhLuan->id) }}" class="btn btn-primary btn-sm">Sửa</a>
                                            <form action="{{ route('binhluan.destroy', $binhLuan->id) }}" method="POST" style="display:inline-block;">
                                                @csrf
                                                @method('DELETE')
                                                <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('Bạn có chắc chắn muốn xóa bình luận này?')">Xóa</button>
                                            </form>
                                            <a href="{{ route('binhluan.show', $binhLuan->id) }}" class="btn btn-info btn-sm">Chi tiết bình luận</a>
                                            @if ($binhLuan->duyet)
                                                <button class="btn btn-secondary btn-sm" disabled>Đã duyệt</button>
                                            @else
                                                <form action="{{ route('binhluan.duyet', $binhLuan->id) }}" method="POST" style="display:inline-block;">
                                                    @csrf
                                                    <button type="submit" class="btn btn-success btn-sm">Duyệt</button>
                                                </form>
                                            @endif
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>

            <!-- Bảng Phản Hồi -->
            <div class="card mt-5">
                <div class="card-header d-flex justify-content-between align-items-center">
                    <h5>QUẢN LÝ PHẢN HỒI</h5>
                </div>
                <div class="card-body">
                    <div class="table-responsive dt-responsive">
                        <table class="table table-striped table-bordered nowrap dataTable">
                            <thead>
                                <tr>
                                    <th>#</th>
                                    <th>ID Bình Luận</th>
                                    <th>ID Tài Khoản</th>
                                    <th>Nội Dung</th>
                                    <th>Ngày Phản Hồi</th>
                                    <th>Thao Tác</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($phanHois as $phanHoi)
                                    <tr>
                                        <td>{{ $phanHoi->id }}</td>
                                        <td>{{ $phanHoi->id_binh_luan }}</td>
                                        <td>{{ $phanHoi->id_users }}</td>
                                        <td>{{ $phanHoi->noi_dung }}</td>
                                        <td>{{ date('d/m/Y', strtotime($phanHoi->ngay_phan_hoi)) }}</td>
                                        <td>
                                            <a href="{{ route('phanhoi.edit', $phanHoi->id) }}" class="btn btn-primary btn-sm">Sửa</a>
                                            <form action="{{ route('phanhoi.destroy', $phanHoi->id) }}" method="POST" style="display:inline-block;">
                                                @csrf
                                                @method('DELETE')
                                                <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('Bạn có chắc chắn muốn xóa phản hồi này?')">Xóa</button>
                                            </form>
                                            <a href="{{ route('phanhoi.show', $phanHoi->id) }}" class="btn btn-info btn-sm">Chi tiết phản hồi</a>
                                            @if ($phanHoi->duyet)
                                                <button class="btn btn-secondary btn-sm" disabled>Đã duyệt</button>
                                            @else
                                                <form action="{{ route('phanhoi.duyet', $phanHoi->id) }}" method="POST" style="display:inline-block;">
                                                    @csrf
                                                    <button type="submit" class="btn btn-success btn-sm">Duyệt</button>
                                                </form>
                                            @endif
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
@endsection