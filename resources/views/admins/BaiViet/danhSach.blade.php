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
                    <div class="d-flex">
                        <form action="{{ route('BaiViet.index') }}" method="GET" class="d-flex">
                            <input type="text" class="form-control me-2" name="search" value="{{ request('search') }}"
                                placeholder="Tìm kiếm bài viết... 🔎" style="max-width: 300px;">
                            <button type="submit" class="btn btn-primary btn-sm">Tìm</button>
                        </form>
                        <a href="{{ route('BaiViet.create') }}" class="btn btn-success btn-sm ms-2">Thêm Bài Viết</a>
                    </div>
                </div>
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table table-hover table-striped">
                            <thead class="table-dark">
                                <tr>
                                    <th>#</th>
                                    <th>Hình Ảnh</th>
                                    <th>Tiêu Đề</th>
                                    <th>Danh Mục</th>
                                    <th>Tác Giả</th>
                                    <th>Nội Dung</th>
                                    <th>Ngày Đăng</th>
                                    <th>Thao Tác</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($baiViet as $bai)
                                    <tr>
                                        <td>{{ $loop->iteration }}</td>
                                        <td>
                                            <img src="{{ asset('storage/' . $bai->hinh_anh) }}" alt="" style="width: 50%;">
                                        </td>
                                        <td>{{ $bai->tieu_de }}</td>
                                        <td>{{ $bai->ten_danh_muc }}</td>
                                        <td>{{ $bai->tac_gia }}</td>
                                        <td>{{ Str::limit($bai->noi_dung, 50) }}</td>
                                        <td>{{ \Carbon\Carbon::parse($bai->ngay_dang)->format('d/m/Y') }}</td>
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

                    <div class="d-flex justify-content-end mt-3">
                        <nav>
                            <ul class="pagination">
                                @if ($baiViet->onFirstPage())
                                    <li class="page-item disabled"><a class="page-link" href="#">Trước</a></li>
                                @else
                                    <li class="page-item"><a class="page-link"
                                            href="{{ $baiViet->previousPageUrl() }}">Trước</a></li>
                                @endif

                                @for ($i = 1; $i <= $baiViet->lastPage(); $i++)
                                    @if ($i == $baiViet->currentPage())
                                        <li class="page-item active"><a class="page-link" href="#">{{ $i }}</a></li>
                                    @else
                                        <li class="page-item"><a class="page-link" href="{{ $baiViet->url($i) }}">{{ $i }}</a></li>
                                    @endif
                                @endfor

                                @if ($baiViet->hasMorePages())
                                    <li class="page-item"><a class="page-link" href="{{ $baiViet->nextPageUrl() }}">Sau</a>
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