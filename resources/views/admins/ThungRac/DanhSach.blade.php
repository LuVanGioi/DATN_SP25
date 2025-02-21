@extends("admins.themes")

@section("titleHead")
<title>Thùng Rác - ADMIN</title>
@endsection

@section("main")
<div class="page-body">
    <div class="container-fluid pt-3">
        <div class="card">
            <div class="card-header">
                <h5>DANH SÁCH DỮ LIỆU</h5>
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
                                            <th>Tên</th>
                                            <th>Ngày Xóa</th>
                                            <th>Thao Tác</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($danhSachChatLieu as $index => $chatLieu)
                                        <tr>
                                            <td>{{ $index + 1 }}</td>
                                            <td>{{ $chatLieu->TenChatLieu }}</td>
                                            <td>{{ $chatLieu->delete_at }}</td>
                                            <td>
                                                <form action="/admin/ThungRac/{{ $chatLieu->id }}/restore" class="d-inline" method="GET" onsubmit="return confirm('Bạn có muốn khôi phục không?'); ">
                                                    @csrf
                                                    <input type="hidden" name="table" value="ChatLieu">
                                                    <button type="submit" class="btn btn-success btn-sm">Khôi Phục</button>
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