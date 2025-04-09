@extends("clients.themes")

@section("title")
    <title>Yêu Cầu Trả Hàng - {{ $caiDatWebsite->TenCuaHang }}</title>
@endsection

@section('main')
    <section class="page-section">
        <div class="wrap container">
            <div class="row">
                <div class="col-md-12">
                    <div class="information-title">Yêu Cầu Trả Hàng</div>
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
                                        <th>Trạng Thái</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr>
                                        <td class="image"><a href="#" class="media-link"><i class="fa fa-plus"></i><img
                                                    alt="" src="clients/images/top-sellers-9.jpg"></a></td>
                                        <td class="quantity">x3</td>
                                        <td class="description">
                                            <h4><a href="#">Tên Sản Phẩm Tiêu Chuẩn Ở Đây</a></h4>
                                            bởi Tên Danh Mục
                                        </td>
                                        <td class="total">$150 </td>
                                        <td class="order-id"> OD31207 </td>
                                        <td class="status"> Trả Hàng </td>
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