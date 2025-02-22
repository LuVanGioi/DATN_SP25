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
                            <input type="text" name="search" class="form-control me-2" placeholder="Tìm kiếm... 🔎"
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

                    <div class="d-flex justify-content-end mt-3">
                        <nav>
                            <ul class="pagination">
                                @if ($danhSach->onFirstPage())
                                    <li class="page-item disabled"><a class="page-link" href="#">Trước</a></li>
                                @else
                                    <li class="page-item"><a class="page-link"
                                            href="{{ $danhSach->previousPageUrl() }}">Trước</a></li>
                                @endif

                                @for ($i = 1; $i <= $danhSach->lastPage(); $i++)
                                    @if ($i == $danhSach->currentPage())
                                        <li class="page-item active"><a class="page-link" href="#">{{ $i }}</a></li>
                                    @else
                                        <li class="page-item"><a class="page-link" href="{{ $danhSach->url($i) }}">{{ $i }}</a></li>
                                    @endif
                                @endfor

                                @if ($danhSach->hasMorePages())
                                    <li class="page-item"><a class="page-link" href="{{ $danhSach->nextPageUrl() }}">Sau</a>
                                    </li>
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