@extends("admins.themes")

@section("titleHead")
<title>Danh Sách Thương Hiệu Sản Phẩm - ADMIN</title>
@endsection

@section("main")
<div class="page-body">
    <div class="container-fluid pt-3">
        @if (session('success'))
        <div class="alert alert-success fade show" role="alert">
            <p>{{ session('success') }}</p>
        </div>
        @else
        <div class="alert alert-danger fade show" role="alert">
            <p>{{ session('error') }}</p>
        </div>
        @endif

        <div class="card">
            <div class="card-header">
                <h5>DANH SÁCH THƯƠNG HIỆU</h5>
            </div>
            <div class="card-body">
                <div class="text-end">
                    <a href="/admin/ThuongHieu/create" class="btn btn-primary btn-sm">Thêm Thương Hiệu</a> <a href="/admin/ThungRac" class="btn btn-dark btn-sm">Thùng Rác</a>
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
                                            <th>Ngày Thêm</th>
                                            <th>Ngày Sửa</th>
                                            <th>Thao Tác</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($danhSach as $index => $row)
                                        <tr>
                                            <td>{{ $index + 1 }}</td>
                                            <td>{{ $row->TenThuongHieu }}</td>
                                            <td>{{ $row->created_at }}</td>
                                            <td>{{ $row->updated_at }}</td>
                                            <td>
                                                <a href="/admin/ThuongHieu/{{ $row->id }}/edit" class="btn btn-primary btn-sm">Sửa</a>

                                                <form action="/admin/ThuongHieu/{{ $row->id }}" class="d-inline" method="POST" onsubmit="return confirm('Bạn có muốn xóa không?'); ">
                                                    @csrf
                                                    @method("DELETE")
                                                    <input type="hidden" name="table" value="thuong_hieu">
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