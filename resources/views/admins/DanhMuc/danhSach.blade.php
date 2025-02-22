@extends("admins.themes")

@section("titleHead")
    <title>Danh Mục Sản Phẩm - ADMIN</title>
@endsection

@section('main')
    <div class="page-body">
        <div class="container-fluid pt-3">
            <div class="card">
                <div class="card-header d-flex justify-content-between align-items-center">
                    <h5>DANH MỤC SẢN PHẨM</h5>
                    <div class="text-end">
                        <a href="{{ route("DanhMuc.create") }}" class="btn btn-success btn-sm">Thêm Danh Mục</a>
                    </div>
                </div>
                <div class="card-body">
                    <div class="table-responsive dt-responsive">
                        <div id="dom-jqry_wrapper" class="dataTables_wrapper dt-bootstrap5">
                            <table class="table table-striped table-bordered nowrap dataTable">
                                <thead class="table-dark">
                                    <tr>
                                        <th>#</th>
                                        <th>Danh Mục</th>
                                        <th>Thao Tác</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr>
                                        <td>1</td>
                                        <td>Quần dài thể thao</td>
                                        <td>
                                            <a href="/admin/DanhMuc/{{ "1234" }}/edit"
                                                class="btn btn-primary btn-sm">Sửa</a>
                                            <form action="/admin/DanhMuc/{{ "1234" }}" method="POST" class="d-inline"
                                                onsubmit="return confirm('Bạn có muốn xóa không?');">
                                                @csrf
                                                @method("DELETE")
                                                <button type="submit" class="btn btn-danger btn-sm">Xóa</button>
                                            </form>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>2</td>
                                        <td>Áo khoác thể thao</td>
                                        <td>
                                            <a href="/admin/DanhMuc/{{ "1234" }}/edit"
                                                class="btn btn-primary btn-sm">Sửa</a>
                                            <form action="/admin/DanhMuc/{{ "1234" }}" method="POST" class="d-inline"
                                                onsubmit="return confirm('Bạn có muốn xóa không?');">
                                                @csrf
                                                @method("DELETE")
                                                <button type="submit" class="btn btn-danger btn-sm">Xóa</button>
                                            </form>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>3</td>
                                        <td>Áo cộc thể thao</td>
                                        <td>
                                            <a href="/admin/DanhMuc/{{ "1234" }}/edit"
                                                class="btn btn-primary btn-sm">Sửa</a>
                                            <form action="/admin/DanhMuc/{{ "1234" }}" method="POST" class="d-inline"
                                                onsubmit="return confirm('Bạn có muốn xóa không?');">
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
@endsection