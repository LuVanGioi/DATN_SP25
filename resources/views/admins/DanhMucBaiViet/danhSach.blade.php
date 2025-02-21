@extends("admins.themes")

@section("titleHead")
    <title>Danh Mục Bài Viết - ADMIN</title>
@endsection

@section('main')
    <div class="page-body">
        <div class="container-fluid pt-3">
            <div class="card">
                <div class="card-header d-flex justify-content-between align-items-center">
                    <h5>DANH MỤC BÀI VIẾT</h5>
                    <div class="d-flex">
                        <form action="{{ route('DanhMucBaiViet.index') }}" method="GET" class="d-flex">
                            <input type="text" name="search" class="form-control me-2" placeholder="Tìm kiếm..."
                                value="{{ request('search') }}" style="max-width: 300px;">
                            <button type="submit" class="btn btn-primary btn-sm">Tìm</button>
                        </form>
                        <a href="{{ route('DanhMucBaiViet.create') }}" class="btn btn-success btn-sm ms-2">Thêm</a>
                    </div>
                </div>
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table table-hover table-striped">
                            <thead class="table-dark">
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
                                                class="d-inline" onsubmit="return confirm('Xóa?');">
                                                @csrf @method("DELETE")
                                                <button type="submit" class="btn btn-danger btn-sm">Xóa</button>
                                            </form>
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>

                    {{-- <div class="d-flex justify-content-end mt-3">
                        {{ $danhSach->appends(['search' => request('search')])->links() }}
                    </div> --}}
                </div>
            </div>
        </div>
    </div>
@endsection