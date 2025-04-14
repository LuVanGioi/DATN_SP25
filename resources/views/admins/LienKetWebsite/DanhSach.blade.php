@extends("admins.themes")

@section("titleHead")
<title>Danh Sách Liên Kết Website - ADMIN</title>
@endsection

@section("main")
<div class="page-body">
    <div class="container-fluid pt-3">
        @if (session('success'))
        <div class="alert alert-success fade show" role="alert">
            <p>{{ session('success') }}</p>
        </div>
        @endif

        @if (session('error'))
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
                    <a href="{{route('LienKetWebsite.create')}}" class="btn btn-primary btn-sm">Thêm Liên Kết</a>
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
                                            <th>Ngày Thêm</th>
                                            <th>Thao Tác</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($lienKetWebsite as $index => $row)
                                        <tr>
                                            <td>{{ $index + 1 }}</td>
                                            <td>{{ $row->TieuDe }}</td>
                                            <td>{{ $row->created_at }}</td>
                                            <td>
                                                <a href="{{route('LienKetWebsite.edit',$row->id)}}" class="btn btn-primary btn-sm">Sửa</a>
                                                <a href="{{route('LienKetWebsite.show',$row->id)}}" class="btn btn-info btn-sm">Chi Tiết</a>
                                                <form action="{{route('LienKetWebsite.destroy',$row->id)}}" class="d-inline" method="POST" onsubmit="return confirm('Bạn có muốn xóa không?'); ">
                                                    @csrf
                                                    @method("DELETE")
                                                    <input type="hidden" name="table" value="lien_ket_ket_website">
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