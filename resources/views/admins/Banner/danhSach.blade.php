@extends("admins.themes")

@section("titleHead")
<title>Danh Sách Banner - ADMIN</title>
@endsection

@section("main")
<div class="page-body">
    <div class="container-fluid pt-3">
        <div class="card">
            <div class="card-header">
                <h5>DANH SÁCH Banner</h5>
            </div>
            <div class="card-body">
                <div class="text-end">
                    <a href="{{route('Banner.create')}}" class="btn btn-primary btn-sm">Thêm Banner</a>
                    <a href="{{route('ThungRac.index')}}" class="btn btn-dark btn-sm">Thùng Rác</a>
                </div>
                <div class="table-responsive dt-responsive">
                    <div id="dom-jqry_wrapper" class="dataTables_wrapper dt-bootstrap5">
                        <div class="row dt-row">
                            <div class="col-sm-12">
                                <table class="table table-striped table-bordered nowrap dataTable">
                                    <thead>
                                        <tr>
                                            <th>STT</th>
                                            <th>Tên</th>
                                            <th>Hình ảnh</th>
                                            <th>Trạng Thái</th>
                                            <th>Thao Tác</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($danhSach as $row)
                                        <tr>
                                            <td>{{ $row->id }}</td>
                                            <td>{{ $row->TenBanner }}</td>
                                            <td class="text-center"><img src="{{ Storage::url($row->HinhAnh) }}" alt="{{ $row->TenBanner }}" width="100px" class="img-fluid"></td>
                                            <td class="text-center">
                                                @if ($row->TrangThai == "hien")
                                                <span class="badge bg-success">Hiển Thị</span>
                                                @else
                                                <span class="badge bg-danger">Ẩn</span>
                                                @endif
                                            </td>
                                            <td>
                                                <a href="{{route('Banner.edit', $row->id)}}"
                                                    class="btn btn-primary btn-sm">Sửa</a>
                                                <form action="{{route('Banner.destroy', $row->id)}}" method="POST"
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
    </div>
</div>
@endsection