@extends("admins.themes")

@section("titleHead")
    <title>Danh Mục Bài Viết - ADMIN</title>
@endsection

@section('main')
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
                    <h5>DANH MỤC BÀI VIẾT</h5>
                    <div class="text-end">
                        <a href="{{ route('DanhMucBaiViet.create') }}" class="btn btn-primary btn-sm ms-2">Thêm Danh Mục</a>
                        <a href="{{ route("ThungRac.index") }}" class="btn btn-dark btn-sm">Thùng Rác</a>
                    </div>
                </div>
                <div class="card-body">
                    <div class="table-responsive">
                        <div id="dom-jqry_wrapper" class="dataTables_wrapper dt-bootstrap5">
                            <table class="table table-striped table-bordered nowrap dataTable">
                                <thead>
                                    <tr>
                                        <th>#</th>
                                        <th>Danh Mục</th>
                                        <th>Thao Tác</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($danhSach as $danhMuc)
                                        <tr>
                                            <td>{{ $danhMuc->id }}</td>
                                            <td>{{ $danhMuc->TenDanhMucBaiViet }}</td>
                                            <td>
                                                <a href="{{ route('DanhMucBaiViet.edit', $danhMuc->id) }}"
                                                    class="btn btn-primary btn-sm">Sửa</a>
                                                <form action="{{ route('DanhMucBaiViet.destroy', $danhMuc->id) }}" method="POST"
                                                    class="d-inline"
                                                    onsubmit="return confirm('Bạn có chắc chắn muốn xóa không?');">
                                                    @csrf @method("DELETE")
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