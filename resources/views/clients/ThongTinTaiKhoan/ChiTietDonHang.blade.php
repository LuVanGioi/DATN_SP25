@extends("clients.themes")

@section("titleHead")
    <title>Chi Tiết Đơn Hàng</title>
@endsection

@section('main')
   
    <section class="page-section">
        <div class="wrap container">
            <div class="row">
                <div class="col-lg-9 col-md-9 col-sm-8">
                    <div class="information-title">Chi Tiết Đơn Hàng Của Bạn </div>
                    <div class="details-wrap">
                        <div class="block-title alt"> <i class="fa fa-angle-down"></i>Đơn Hàng <strong
                                class="pull-right">Mã Đơn Hàng: #{{$chiTietDonHang->MaDonHang}}</strong></div>
                     
                           
                                <div class="row">
                                    <div class="col-md-12 col-sm-6">
                                        <span style="color:#111111; font-weight: bold;">Người Nhận : {{$chiTietDonHang->HoTen}}</span>                                      
                                    </div>

                                    <div class="col-md-12 col-sm-6">
                                        <span style="color:#111111; font-weight: bold;">Số Điện Thoại : {{$chiTietDonHang->SoDienThoai}}</span>
                                    </div>

                                    <div class="col-md-12  col-sm-6">
                                        <span style="color:#111111; font-weight: bold;">Địa Chỉ Nhận : {{$chiTietDonHang->DiaChi . ", " . $chiTietDonHang->Xa . " - " . $chiTietDonHang->TenHuyen . " - " . $chiTietDonHang->TenThanhPho}}</span>
                                    </div>

                                    <div class="col-md-12 col-sm-6">
                                        <span style="color:#111111; font-weight: bold;">Ngày Mua : {{$chiTietDonHang->created_at}}</span>
                                    </div>

                                    <div class="col-md-12 col-sm-6">
                                        <span style="color:#111111; font-weight: bold;">Trạng Thái Đơn : <?=trangThaiDonHang($chiTietDonHang->TrangThaiDonHang);?></span>
                                    </div>

                                    <div class="col-md-12 col-sm-6">
                                        <span style="color:#111111; font-weight: bold;">Phương Thức Thanh Toán : {{$chiTietDonHang->PhuongThucThanhToan}}</span>
                                    </div>

                                    <div class="col-md-12  col-sm-6">
                                        <span style="color:#111111; font-weight: bold;">Giảm Giá : {{$chiTietDonHang->GiamGia}}đ</span>
                                    </div>

                                    <div class="col-md-12  col-sm-6">
                                        <span style="color:#111111; font-weight: bold;">Tổng Tiền : {{$chiTietDonHang->TongTien}}đ</span>
                                    </div>
                                </div>
                </div>

                    <div class="card shadow-lg">
                        <div class="card-header bg-primary text-white d-flex justify-content-between align-items-center">
                        </div>
                        <div class="card-body">
                            <div class="row mt-3">
                                @foreach ($sanPhamMua as $item) 
                                <div class="col-xxl-4 col-md-12">
                                    <div class="prooduct-details-box" 
                                        style="display: flex; align-items: center; border: 1px solid #ddd; padding: 10px; border-radius: 8px; background: #fff;">
                                        <div class="media" style="display: flex; align-items: center; gap: 15px; width: 100%;">
                                            <img class="align-self-center img-fluid img-60" width="100" height="100" 
                                                src="{{ Storage::url($item->HinhAnh)}}" alt="#" 
                                                style="object-fit: cover; border-radius: 5px;">
                                            <div class="media-body ms-3" 
                                                style="display: flex; flex-direction: column; align-items: flex-start; width: 100%; color: black;">
                                                <div class="product-name" style="margin-bottom: 5px; color: black;">
                                                    <h6 style="margin: 0; font-size: 16px; font-weight: bold; color: black;">
                                                        <a href="/san-pham/{{ $item->DuongDan }}" target="_blank" style="color: black; text-decoration: none;">
                                                            {{ $item->TenSanPham }}
                                                        </a>
                                                    </h6>
                                                </div>
                                                <div class="text" style="font-size: 14px; margin-bottom: 5px; color: black; ; font-weight: bold">
                                                    {{ $item->KichCo }} - {{ $item->MauSac }}
                                                </div>
                                                <div class="price d-flex" style="font-weight: bold; font-size: 14px; margin-bottom: 5px; color: black;">
                                                    <div class="text" style="color: black;">Giá : </div>{{ number_format($item->GiaTien, 0, ',', '.') }}đ
                                                </div>
                                                <div class="avaiabilty" style="font-size: 14px; color: black;">
                                                    <div class="text" style="color: black;; font-weight: bold">Số Lượng : {{ $item->SoLuong }}</div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                               
                                @endforeach
                            </div>
                        </div>
                    </div>
                
            </div>



            <div class="col-lg-3 col-md-3 col-sm-4">
                <div class="widget account-details">
                    <h2 class="widget-title">Tài Khoản</h2>
                    <ul>
                        <li class="active"><a href="/thong-tin-tai-khoan"> Thông Tin Tài Khoản </a></li>
                        <li><a href="/doi-mat-khau">Đổi Mật Khẩu</a></li>
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