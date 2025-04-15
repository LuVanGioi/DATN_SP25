@extends("admins.themes")

@section("titleHead")
<title>Danh Sách Yêu Cầu Rút Tiền - ADMIN</title>
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
                <h5>DANH SÁCH RÚT TIỀN</h5>
            </div>
            <div class="card-body">
                <div class="table-responsive dt-responsive">
                    <div id="dom-jqry_wrapper" class="dataTables_wrapper dt-bootstrap5">
                        <div class="row dt-row">
                            <div class="col-sm-12">
                                <table class="table table-striped table-bordered nowrap dataTable">
                                    <thead>
                                        <tr>
                                            <th>#</th>
                                            <th>Mã Giao Dịch</th>
                                            <th>Tài Khoản</th>
                                            <th>Rút Về</th>
                                            <th>Số Tiền</th>
                                            <th class="text-center">Trạng Thái</th>
                                            <th>Thao Tác</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($danhSach as $index => $ds)
                                        <tr>
                                            <td>{{ $index + 1 }}</td>
                                            <td>#{{ $ds->MaGiaoDich }}</td>
                                            <td>{{ DB::table("users")->find($ds->ID_User)->email }}</td>
                                            <td>
                                                <div><strong>Ngân Hàng:</strong> {{ DB::table("ngan_hang")->where("bin", $ds->banking)->first()->shortName }} - {{ DB::table("ngan_hang")->where("bin", $ds->banking)->first()->name }}</div>
                                                <div><strong>Tên Tài Khoản:</strong> {{ $ds->namebank }}</div>
                                                <div><strong>Số Tài Khoản: </strong> {{ $ds->numberBank }}</div>
                                            </td>
                                            <td class="text-start">₫{{ number_format($ds->SoTien) }}</td>
                                            <td>
                                                @if ($ds->TrangThai == "thanhcong")
                                                <div class="text-success">Thành Công</div>
                                                @elseif ($ds->TrangThai == "dangxuly")
                                                <div class="text-warning">Chờ Xử Lý</div>
                                                @elseif ($ds->TrangThai == "thatbai")
                                                <div class="text-danger">Thất Bại</div>
                                                @else
                                                <div class="text-danger">Khác</div>
                                                @endif
                                            </td>
                                            <td>
                                                <a href="{{ route("RutTienVi.show", $ds->id) }}" class="btn btn-info btn-sm">Chi Tiết / Cập Nhật</a>
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