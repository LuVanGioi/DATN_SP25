@extends("clients.themes")

@section("title")
    <title>Lịch sử đơn hàng - WD-14</title>
@endsection

@section('main')
    <section class="page-section">
        <div class="wrap container">
            <div class="row">
                <div class="col-md-9">
                    <div class="information-title">Lịch Sử Đơn Hàng Của Bạn</div>
                    <div class="details-wrap">
                        <div class="details-box orders">
                            <table class="table">
                                <thead>
                                    <tr>
                                        <th>Hình Ảnh</th>
                                        <th>Số Lượng</th>
                                        <th>Tên Sản Phẩm</th>
                                        <th>Giá Tiền</th>
                                        <th>Mã Đơn Hàng</th>
                                        <th>Ngày Mua</th>
                                        <th>Trạng Thái</th>
                                        <th></th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($lichSu  as $item)
                                    <tr>
                                        <td class="image"><img width="100px" height="100px" src="{{ Storage::url($item->HinhAnh)}}"></td>
                                        <td class="text">{{$item->SoLuong}}</td>
                                        <td class="description"><h4><a href="/san-pham/{{ $item->DuongDan }}" target="_blank">{{ $item->TenSanPham }}</a></td>
                                        <td class="text">{{$item->GiaTien}}</td>
                                        <td class="text">{{$item->MaDonHang}} </td>
                                        <td class="text"> {{$item->created_at}} </td>
                                        <td class="" ><?=trangThaiDonHang($item->TrangThaiDonHang);?> </td>
                                        <td class="order-status">
                                            <a href="{{route('lich-su-don-hang.show', $item->MaDonHang)  }}" class="btn btn-theme btn-theme-dark">Chi Tiết</a> 
                                        </td>
                                    </tr>
                                    @endforeach
                                    
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>

                <div class="col-lg-3 col-md-3 col-sm-4">
                    <div class="widget account-details">
                        <h2 class="widget-title">Tài Khoản</h2>
                        <ul>
                            <li><a href="/thong-tin-tai-khoan"> Thông Tin Tài Khoản </a></li>
                            <li class="active"><a href="/doi-mat-khau">Đổi Mật Khẩu</a></li>
                            <li><a href="/lich-su-don-hang">Lịch Sử Đơn Hàng</a></li>
                            <li><a href="/danh-gia-va-nhan-xet">Đánh Giá và Nhận Xét</a></li>
                            <li><a href="/yeu-cau-tra-hang">Yêu Cầu Trả Hàng</a></li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection