@extends("admins.themes")

@section("titleHead")
<title>Quản Lý Đơn Hàng - ADMIN</title>
@endsection

@section('main')
<div class="page-body">
    <div class="container-fluid pt-3">
            <div class="card">
                <div class="card-header d-flex justify-content-between align-items-center">
                    <h5>Quản Lý Đơn Hàng</h5>
                    <a href="{{ route('DanhGia.index') }}" class="btn btn-primary btn-sm">Xem Danh Sách Đánh Giá</a>
                </div>
                <div class="card-body">
                    <div class="table-responsive">
                        <div id="dom-jqry_wrapper" class="dataTables_wrapper dt-bootstrap5">
                            <table class="table table-striped table-bordered nowrap dataTable">
                                <thead>
                                    <tr>
                                        <th></th>
                                        <th>Mã Đơn Hàng</th>
                                        <th>Trạng Thái Đơn Hàng</th>
                                        <th>Phương Thức Thanh Toán</th>
                                        <th>Trạng Thái Thanh Toán</th>
                                        <th>Thao Tác</th>
                                        
                                    </tr>
                                </thead>
                                <tbody>
                                  @foreach ($donHang as  $index =>$item)
                                      <tr>
                                        <td>{{$index + 1}}</td>
                                        <td>{{$item->MaDonHang}}</td>
                                        <td><?=trangThaiDonHang($item->TrangThai); ?></td>
                                        <td>{{$item->PhuongThucThanhToan}}</td>
                                        <td>
                                           @if ($item->TrangThai == 'choxacnhan')
                                           <span class="text-warning">Chưa Thanh Toán</span>
                                           @elseif($item->TrangThai == 'daxacnhan')
                                           <span class="text-warning">Chưa Thanh Toán</span>
                                           @elseif($item->TrangThai == 'dangiao')
                                           <span class="text-warning">Chưa Thanh Toán</span>
                                           @elseif($item->TrangThai == 'dagiao')
                                           <span class="text-success">Đã Thanh Toán</span>
                                           @elseif($item->TrangThai == 'thatbai')
                                           <span class="text-danger">Thanh Toán Thất Bại</span>
                                           @elseif($item->TrangThai == 'hoanhang')
                                           <span class="text-danger">Thanh Toán Thất Bại</span>
                                           @elseif($item->TrangThai == 'huydon')
                                           <span class="text-danger">Thanh Toán Thất Bại</span>
                                           @endif
                                        </td>
                                        
                                        <td>
                                            <a class="btn btn-info btn-sm dt-no-action" href="{{ route('DonHang.show', $item->MaDonHang) }}">Xem Chi Tiết</a>   
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
@endsection