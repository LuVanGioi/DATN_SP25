@extends("admins.themes")

@section("titleHead")
<title>Biến Thể Sản Phẩm - ADMIN</title>
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
                <h5>DANH SÁCH BIẾN THỂ</h5>
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
                                            <th>Tên Biến Thể</th>
                                            <th>Giá Trị</th>
                                            <th>Thao Tác</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($danhSachBienThe as $index => $BienThe)
                                        <tr>
                                            <td>{{ $index + 1 }}</td>
                                            <td>{{ $BienThe->TenBienThe }}</td>
                                            <td>
                                                @if ($BienThe->id == 1)
                                                @foreach ($thongTinKichCo as $index => $KichCo)
                                                <span class="badge bg-dark">{{ $KichCo->TenKichCo }}</span>
                                                @endforeach
                                                @else
                                                @foreach ($thongTinMauSac as $index => $MauSac)
                                                <span class="badge bg-dark">{{ $MauSac->TenMauSac }}</span>
                                                @endforeach
                                                @endif
                                            </td>
                                            <td>
                                                <a href="{{ route("BienThe.edit", $BienThe->id) }}" class="btn btn-primary btn-sm"><i class="fal fa-edit"></i> Sửa</a>
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