@extends("admins.themes")

@section("titleHead")
<title>Thông Tin Liên Hệ - ADMIN</title>
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
                <h5>THÔNG TIN LIÊN HỆ ADMIN</h5>
            </div>
            <div class="card-body">
                <div class="text-end">
                    <a href="{{ route("ThongTinLienHe.create") }}" class="btn btn-primary btn-sm">Thêm Phương Thức</a> <a href="{{ route("ThungRac.index") }}" class="btn btn-dark btn-sm">Thùng Rác</a>
                </div>
                <div class="table-responsive dt-responsive">
                    <div id="dom-jqry_wrapper" class="dataTables_wrapper dt-bootstrap5">
                        <table class="table table-striped table-bordered nowrap dataTable">
                            <thead>
                                <tr>
                                    <th>STT</th>
                                    <th>Tên Phương Thức</th>
                                    <th>Đường Dẫn</th>
                                    <th>Thao Tác</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($danhSach as $index => $LienHe)
                                <tr>
                                    <td>{{ $index + 1 }}</td>
                                    <td>{{ $LienHe->TenPhuongThuc }}</td>
                                    <td><a href="{{ $LienHe->DuongDan }}" target="_blank">{{ $LienHe->DuongDan }}</a></td>
                                    <td>
                                        <a href="{{ route("ThongTinLienHe.edit", $LienHe->id) }}" class="btn btn-primary btn-sm"><i class="fal fa-edit"></i> Sửa</a>

                                        <a href="{{ $LienHe->DuongDan }}" class="btn btn-warning btn-sm" target="_blank"><i class="fal fa-eye"></i> Truy Cập</a>

                                        <form action="{{ route("ThongTinLienHe.destroy", $LienHe->id) }}" class="d-inline" method="POST" onsubmit="return confirm('Bạn có muốn xóa không?'); ">
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
@endsection