@extends("clients.themes")

@section("title")
<title>Chi Tiết Trà Hàng / Hoàn Tiền #{{ $id }}- {{ $caiDatWebsite->TenCuaHang }}</title>
@endsection

@section('main')
<section class="page-section">
    <div class="container">
        <div class="row mt-1">
            <div class="col-lg-9 col-md-9 col-sm-8">
                <div class="information-title">Chi Tiết Trả Hàng / Hoàn Tiền</div>
                <div class="details-wrap">
                    <div class="block-title alt"><a href="{{ route("lich-su-don-hang.index") }}"><i
                                class="fa fa-angle-left"></i></a> Mã Đơn Hàng: <b>#{{$chiTietDonHang->MaDonHang}}</b>
                        <strong class="pull-right">
                            @if ($chiTietDonHang->TrangThai == "hoanhang")
                            <span class="badge bg-warning">Chờ Xử Lý Hoàn Tiền</span>
                            @elseif($chiTietDonHang->TrangThai == "xacnhanhoanhang")
                            <span class="badge bg-primary">Đã Hoàn Tiền</span>
                            @endif
                        </strong>
                    </div>
                </div>

                <div class="row mt-1">
                    <div class="col-md-7">
                        <div class="card">
                            <div class="card-body">
                                <h5>SẢN PHẨM HOÀN TRẢ</h5>
                                @foreach ($sanPhamMua as $item)
                                <div class="card card-body">
                                    <div class="media"
                                        style="display: flex; align-items: center; gap: 15px; width: 100%; padding: 10px 5px">
                                        <img class="align-self-center img-fluid img-60" width="100" height="100"
                                            src="{{ Storage::url($item->HinhAnh)}}" alt="#"
                                            style="object-fit: cover; border-radius: 5px;">
                                        <div class="media-body ms-3"
                                            style="display: flex; flex-direction: column; align-items: flex-start; width: 100%; color: black;">
                                            <div class="product-name" style="margin-bottom: 5px; color: black;">
                                                <h6 style="margin: 0; font-size: 16px; font-weight: bold; color: black;">
                                                    <a href="/san-pham/{{ $item->DuongDan }}" target="_blank"
                                                        style="color: black; text-decoration: none;">
                                                        {{ $item->TenSanPham }}
                                                    </a>
                                                </h6>
                                            </div>
                                            <div class="text" style="font-size: 13px; margin-bottom: 5px; color: #888;">
                                                {{ $item->KichCo }} - {{ $item->MauSac }}
                                            </div>
                                            <div class="price d-flex"
                                                style="font-size: 14px; margin-bottom: 5px; color: black;">
                                                <div class="text" style="color: black;">Giá : </div>
                                                {{ number_format($item->GiaTien, 0, ',', '.') }}đ
                                            </div>
                                            <div class="avaiabilty" style="font-size: 14px; color: black;">
                                                <div class="text" style="color: black;">Số Lượng : {{ $item->SoLuongMua }}</div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                @endforeach
                            </div>
                        </div>
                    </div>

                    <div class="col-md-5">
                        <div class="card">
                            <div class="card-body">
                                <div class="deltail-total-order">
                                    <div><span>Tổng Tiền Hoàn : </span> <span
                                            style="color: #010660">₫{{ number_format($chiTietDonHang->TongTien) }}</span></div>
                                    <div>
                                        <span>Hoàn Tiền Vào :</span> <span
                                            style="font-weight: 500; font-size: 15px">Ví Của Tôi</span>
                                    </div>
                                    <div>
                                        <span>Lý Do Trà hàng / Hoàn Tiền :</span> <span
                                            style="font-weight: 500; font-size: 15px; text-align: right;">{{ $chiTietDonHang->LyDoHuy }}</span>
                                    </div>
                                    <div>
                                        <span>Yêu Cầu Lúc :</span> <span
                                            style="font-weight: 500; font-size: 15px">{{ $chiTietDonHang->updated_at }}</span>
                                    </div>
                                    @if ($chiTietDonHang->TrangThai !== "xacnhanhoanhang")
                                    <div>
                                        <button class="btn btn-danger w-100" onclick="close_refund('{{ $chiTietDonHang->MaDonHang }}')">Hủy Hoàn Trả / Hoàn Tiền</button>
                                    </div>
                                    @endif
                                </div>
                            </div>
                        </div>

                        @if (count($hinhAnh) >= 1)
                        <div class="card">
                            <div class="card-body">
                                <h5>HÌNH ẢNH CỦA BẠN</h5>
                                <div class="row mt-1">
                                    @foreach ($hinhAnh as $row)
                                    <div class="col-md-4 mt-1">
                                        <img src="{{ Storage::url($row->DuongDan) }}" style="width: 100%; border: 1px solid #888" alt="">
                                    </div>
                                    @endforeach
                                </div>
                            </div>
                        </div>
                        @endif
                    </div>
                </div>
            </div>



            <div class="col-lg-3 col-md-3 order-lg-last">
                <div class="widget account-details">
                    <h2 class="widget-title">Tài Khoản</h2>
                    <ul>
                        <li><a href="/thong-tin-tai-khoan"> Thông Tin Tài Khoản </a></li>
                        <li><a href="/vi">Ví Của Tôi</a></li>
                        <li><a href="/doi-mat-khau">Đổi Mật Khẩu</a></li>
                        <li><a href="/dia-chi-nhan-hang">Địa Chỉ Nhận Hàng</a></li>
                        <li class="active"><a href="/lich-su-don-hang">Lịch Sử Đơn Hàng</a></li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
</section>
@endsection

@section("js")
<script>
    function close_refund(MaDonHoanTien) {
        const formData = new FormData();
        formData.append('_token', "{{ csrf_token() }}");
        formData.append('type', 'close_refund');
        formData.append('trading', MaDonHoanTien);
        $.ajax({
            url: "<?= route('api.client'); ?>",
            type: "POST",
            data: formData,
            processData: false,
            contentType: false,
            success: function(data) {
                if (data.status === "success") {
                    location.href = data.redirect;
                } else {
                    if (data.message) {
                        AlertDATN("error", data.message);
                    }
                }

            },
            error: function(error) {
                let errorMessage = "Có lỗi xảy ra!";
                if (error.responseJSON && error.responseJSON.message) {
                    errorMessage = error.responseJSON.message;
                }
                AlertDATN(errorMessage);
            }
        });
    }
</script>
@endsection