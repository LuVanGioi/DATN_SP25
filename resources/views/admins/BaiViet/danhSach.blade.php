@extends("admins.themes")

@section("titleHead")
<title>Danh Sách Bài viết - ADMIN</title>
@endsection

@section("main")
<div class="page-body">
    <div class="container-fluid pt-3">
        <div class="card">
            <div class="card-header d-flex justify-content-between align-items-center">
                <h5>DANH SÁCH BÀI VIẾT</h5>
                <div class="text-end">
                    <a href="{{ route('BaiViet.create') }}" class="btn btn-primary btn-sm ms-2">Thêm Bài Viết</a>
                </div>
            </div>
            <div class="card-body">
                <div class="table-responsive">
                    <div id="dom-jqry_wrapper" class="dataTables_wrapper dt-bootstrap5">
                    <table class="table table-striped table-bordered nowrap dataTable">
                            <thead>
                                <tr>
                                    <th>#</th>
                                    <th>Hình Ảnh</th>
                                    <th>Tiêu Đề</th>
                                    <th>Danh Mục</th>
                                    <th>Tác Giả</th>
                                    <th>Ngày Đăng</th>
                                    <th>Thao Tác</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($baiViet as $index => $bai)
                                <tr>
                                    <td>{{ $index+1 }}</td>
                                    <td>
                                        <img src="{{ asset('storage/' . $bai->hinh_anh) }}" alt="" class="img-fluid w-50">
                                    </td>
                                    <td>{{ $bai->tieu_de }}</td>
                                    <td>{{ $bai->ten_danh_muc }}</td>
                                    <td>{{ $bai->tac_gia }}</td>
                                    <td>{{ $bai->created_at }}</td>
                                    <td>
                                        <a href="{{ route('BaiViet.edit', $bai->id) }}"
                                            class="btn btn-primary btn-sm">Sửa</a>
                                        <a href="{{ route('BaiViet.show', $bai->id) }}" class="btn btn-info btn-sm">Chi
                                            Tiết</a>
                                        <form action="{{ route('BaiViet.destroy', $bai->id) }}" method="POST"
                                            class="d-inline" onsubmit="return confirm('Bạn có muốn xóa không?');">
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