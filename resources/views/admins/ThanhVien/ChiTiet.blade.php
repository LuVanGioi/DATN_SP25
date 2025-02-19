@extends("admins.themes")

@section("titleHead")
<title>THÔNG TIN THÀNH VIÊN - ADMIN</title>
@endsection


@section("main")
{{-- <div class="page-body">
    <div class="container-fluid pt-3">
        <div class="card">
            <div class="card-header">
                <h5>THÔNG TIN THÀNH VIÊN</h5>
            </div>
            <div class="card-body">
                
                <div class="table-responsive dt-responsive">
                    <div id="dom-jqry_wrapper" class="dataTables_wrapper dt-bootstrap5">
                        <div class="row dt-row">
                            <div class="col-sm-12">
                                <table class="table table-striped table-bordered nowrap dataTable">
                                    <thead>
                                        <tr>
                                            <th>STT</th>
                                            <th>Họ Và Tên</th>
                                            <th>Hình Ảnh</th>
                                            <th>Số Điện Thoại </th>
                                            <th>Ngày Sinh</th>
                                            <th>Giới Tính</th>
                                            <th>Địa Chỉ</th>
                                            <th>Mật Khẩu</th>
                                            <th>Thao Tác</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <tr>
                                            <td></td>
                                            <td></td>
                                            <td></td>
                                            <td></td>                                         
                                            <td></td>
                                            <td></td>
                                            <td></td>
                                            <td></td>
                                            <td>
                                                <a href="/admin/products/{{ "1234" }}/edit" class="btn btn-primary btn-sm">Sửa</a>

                                                <form action="/admin/products/{{ "1234" }}" class="d-inline" method="POST" onsubmit="return confirm('Bạn có muốn xóa không?'); ">
                                                    @csrf
                                                    @method("DELETE")
                                                    <button type="submit" class="btn btn-danger btn-sm">Xóa</button>
                                                </form>
                                                <a href="/admin/ThanhVien" class="btn btn-warning btn-sm">Quay Lại</a>
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
</div> --}}



@endsection 