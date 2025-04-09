@extends("clients.themes")

@section("title")
    <title>Lịch sử đơn hàng - {{ $caiDatWebsite->TenCuaHang }}</title>
@endsection

@section('main')
    <section class="page-section">
        <div class="wrap container">
            <div class="row">
                <div class="col-md-12">
                    <div class="information-title">Lịch Sử Đơn Hàng Của Bạn</div>
                    <div class="details-wrap">
                        <div class="details-box orders">
                            <table class="table">
                                <thead>
                                    <tr>
                                        <th>Hình Ảnh</th>
                                        <th>Số Lượng</th>
                                        <th>Tên Sản Phẩm</th>
                                        <th>Giá</th>
                                        <th>Mã Đơn Hàng</th>
                                        <th>Ngày Giao</th>
                                        <th></th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr>
                                        <td class="image"><a href="#" class="media-link"><i class="fa fa-plus"></i><img
                                                    alt="" src="clients/images/top-sellers-1.jpg"></a></td>
                                        <td class="quantity">x3</td>
                                        <td class="description">
                                            <h4><a href="#">Tên Sản Phẩm Tiêu Chuẩn Ở Đây</a></h4>
                                            bởi Tên Danh Mục
                                        </td>
                                        <td class="total">$150 </td>
                                        <td class="order-id"> OD31207 </td>
                                        <td class="diliver-date"> 12 Tháng 12'13 </td>
                                        <td class="order-status"><a href="return.html"
                                                class="btn btn-theme btn-theme-dark">Trả Hàng</a> <a href="#"
                                                class="btn btn-theme btn-theme-dark">Đặt Lại</a> </td>
                                    </tr>
                                    <tr>
                                        <td class="image"><a href="#" class="media-link"><i class="fa fa-plus"></i><img
                                                    alt="" src="clients/images/top-sellers-4.jpg"></a></td>
                                        <td class="quantity">x3</td>
                                        <td class="description">
                                            <h4><a href="#">Tên Sản Phẩm Tiêu Chuẩn Ở Đây</a></h4>
                                            bởi Tên Danh Mục
                                        </td>
                                        <td class="total">$250 </td>
                                        <td class="order-id"> OD31207 </td>
                                        <td class="diliver-date"> 12 Tháng 12'13 </td>
                                        <td class="order-status"><a href="return.html"
                                                class="btn btn-theme btn-theme-dark">Trả Hàng</a> <a href="#"
                                                class="btn btn-theme btn-theme-dark">Đặt Lại</a> </td>
                                    </tr>
                                    <tr>
                                        <td class="image"><a href="#" class="media-link"><i class="fa fa-plus"></i><img
                                                    alt="" src="clients/images/top-sellers-6.jpg"></a></td>
                                        <td class="quantity">x3</td>
                                        <td class="description">
                                            <h4><a href="#">Tên Sản Phẩm Tiêu Chuẩn Ở Đây</a></h4>
                                            bởi Tên Danh Mục
                                        </td>
                                        <td class="total">$350 </td>
                                        <td class="order-id"> OD31207 </td>
                                        <td class="diliver-date"> 12 Tháng 12'13 </td>
                                        <td class="order-status"> <span class="return-request"> Bạn đã yêu cầu </br> trả lại đơn hàng này </span> <a href="#" class="btn btn-theme btn-theme-dark">Đặt Lại</a> </td>
                                    </tr>
                                </tbody>
                            </table>

                            <div>
                                <a href="/thong-tin-tai-khoan" class="btn btn-theme"> Quay Lại Tài Khoản </a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection