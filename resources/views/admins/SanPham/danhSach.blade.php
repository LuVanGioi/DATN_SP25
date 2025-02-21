@extends("admins.themes")

@section("titleHead")
<title>Danh Sách Sản Phẩm - ADMIN</title>
@endsection

@section("main")
<div class="page-body">
    <div class="container-fluid pt-3">
        <div class="card">
            <div class="card-header">
                <h5>DANH SÁCH SẢN PHẨM</h5>
            </div>
            <div class="card-body">
                <div class="text-end">
                    <a href="/admin/SanPham/create" class="btn btn-primary btn-sm">Thêm Sản Phẩm</a>
                </div> 
                <div class="table-responsive dt-responsive">
                    <div id="dom-jqry_wrapper" class="dataTables_wrapper dt-bootstrap5">
                        <div class="row dt-row">
                            <div class="col-sm-12">
                                <table class="table table-striped table-bordered nowrap dataTable">
                                    <thead>
                                        <tr>
                                            <th>STT</th>
                                            <th>Danh Mục</th>
                                            <th>Tên</th>
                                            <th>Chất Liệu</th>
                                            <th>Thương Hiệu</th>
                                            <th>Trạng Thái</th>
                                            <th>Thao Tác</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <tr>
                                            <td>1</td>
                                            <td></td>
                                            <td></td>
                                            <td></td>
                                            <td></td>
                                            <td></td>
                                            <td>
                                                <a href="/admin/SanPham/{{ "1234" }}/edit" class="btn btn-primary btn-sm">Sửa</a>

                                                <a href="/admin/SanPham/{{ "1234" }}" class="btn btn-info btn-sm">Chi Tiết</a>

                                                <form action="/admin/SanPham/{{ "1234" }}" class="d-inline" method="POST" onsubmit="return confirm('Bạn có muốn xóa không?'); ">
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