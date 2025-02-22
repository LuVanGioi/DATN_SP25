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
                                            <th>Vị trí</th>
                                            <th>Trạng Thái</th>
                                            <th>Thao Tác</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <tr>
                                            <td>1</td>
                                            <td></td>
                                            <td><img src="https://down-vn.img.susercontent.com/file/c7db377b177fc8e2ff75a769022dcc23" alt="Lỗi hiển thị" width="100px" height="50px"></td>
                                            <td></td>
                                            <td></td>
                                            <td>
                                                <a href="/admin/Banner/{{ "1" }}/edit" class="btn btn-primary btn-sm">Sửa</a>

                                                <a href="/admin/Banner/{{ "1" }}" class="btn btn-info btn-sm">Chi Tiết</a>

                                                <form action="/admin/Banner/{{ "1234" }}" class="d-inline" method="POST" onsubmit="return confirm('Bạn có muốn xóa không?'); ">
                                                    @csrf
                                                    @method("DELETE")
                                                    <button type="submit" class="btn btn-danger btn-sm">Xóa</button>
                                                </form>
                                            </td>
                                        </tr>

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