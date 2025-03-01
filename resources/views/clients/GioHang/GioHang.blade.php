@extends("clients.themes")

@section("title")
    <title>Giỏ Hàng - WD-14</title>
@endsection

@section('main')
    <section class="page-section breadcrumbs">
        <div class="container">
            <div class="page-header">
                <h1>Giỏ Hàng</h1>
            </div>
            <ul class="breadcrumb">
                <li><a href="#">Trang Chủ</a></li>
                <li><a href="#">Cửa Hàng</a></li>
                <li class="active">Giỏ Hàng</li>
            </ul>
        </div>
    </section>

    <section class="page-section color">
        <div class="container">

            <h3 class="block-title alt"><i class="fa fa-angle-down color"></i>1. Tài Khoản</h3>
            <form action="#" class="form-sign-in">
                <div class="row ">
                    <div class="col-md-6">
                        <a class="btn btn-theme btn-block btn-icon-left facebook" href="#">
                            <i class="fab fa-facebook"></i>
                            Đăng nhập bằng Facebook
                        </a>
                    </div>
                    <div class="col-md-6">
                        <a class="btn btn-theme btn-block btn-icon-left twitter" href="#">
                            <i class="fab fa-twitter"></i>
                            Đăng nhập bằng Twitter
                        </a>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group"><input class="form-control" type="text"
                                placeholder="Tên người dùng hoặc email"></div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group"><input class="form-control" type="password" placeholder="Mật khẩu của bạn">
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="checkbox">
                            <label>
                                <input type="checkbox"> Nhớ mật khẩu
                            </label>
                        </div>
                    </div>
                    <div class="col-md-6 text-right-md">
                        <a class="forgot-password" href="/forgot-password">Quên mật khẩu?</a>
                    </div>
                    <div class="col-md-12">
                        <p class="btn-row"><a class="btn btn-theme btn-theme-dark" href="#">Đăng Nhập</a> <span
                                class="text"> hoặc </span> <a class="btn btn-theme btn-theme-dark" href="/dang-ky">
                                Tạo tài khoản
                            </a>
                        </p>
                    </div>
                </div>
            </form>

            <h3 class="block-title alt"><i class="fa fa-angle-down"></i>2. Đơn Hàng</h3>
            <div class="row orders">
                <div class="col-md-8">
                    <table class="table">
                        <thead>
                            <tr>
                                <th>Hình Ảnh</th>
                                <th>Số Lượng</th>
                                <th>Tên Sản Phẩm</th>
                                <th>Tổng</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td class="image"><a class="media-link" href="#"><i class="fa fa-plus"></i><img
                                            src="clients/images/top-sellers-4.jpg" alt="" /></a></td>
                                <td class="quantity">x3</td>
                                <td class="description">
                                    <h4><a href="#">Tên Sản Phẩm Tiêu Chuẩn Ở Đây</a></h4>
                                    bởi Tên Danh Mục
                                </td>
                                <td class="total">$150 <a href="#"><i class="fa fa-close"></i></a></td>
                            </tr>
                            <tr>
                                <td class="image"><a class="media-link" href="#"><i class="fa fa-plus"></i><img
                                            src="clients/images/top-sellers-9.jpg" alt="" /></a></td>
                                <td class="quantity">x3</td>
                                <td class="description">
                                    <h4><a href="#">Tên Sản Phẩm Tiêu Chuẩn Ở Đây</a></h4>
                                    bởi Tên Danh Mục
                                </td>
                                <td class="total">$250 <a href="#"><i class="fa fa-close"></i></a></td>
                            </tr>
                            <tr>
                                <td class="image"><a class="media-link" href="#"><i class="fa fa-plus"></i><img
                                            src="clients/images/top-sellers-4.jpg" alt="" /></a></td>
                                <td class="quantity">x3</td>
                                <td class="description">
                                    <h4><a href="#">Tên Sản Phẩm Tiêu Chuẩn Ở Đây</a></h4>
                                    bởi Tên Danh Mục
                                </td>
                                <td class="total">$350 <a href="#"><i class="fa fa-close"></i></a></td>
                            </tr>
                        </tbody>
                    </table>
                </div>
                <div class="col-md-4">
                    <h3 class="block-title"><span>Giỏ Hàng</span></h3>
                    <div class="shopping-cart">
                        <table>
                            <tr>
                                <td>Tạm tính:</td>
                                <td>$2,500.00</td>
                            </tr>
                            <tr>
                                <td>Phí vận chuyển:</td>
                                <td>$25</td>
                            </tr>
                            <tfoot>
                                <tr>
                                    <td>Tổng cộng:</td>
                                    <td>$2,525.00</td>
                                </tr>
                            </tfoot>
                        </table>
                        <div class="form-group">
                            <textarea class="form-control" placeholder="Gửi tin nhắn"></textarea>
                        </div>
                        <div class="form-group">
                            <input class="form-control" type="text" placeholder="Nhập mã giảm giá của bạn" />
                        </div>
                        <button class="btn btn-theme btn-theme-dark btn-block">Áp Dụng Mã</button>
                    </div>
                </div>
            </div>

            <h3 class="block-title alt"><i class="fa fa-angle-down"></i>3. Địa Chỉ Giao Hàng</h3>
            <form action="#" class="form-delivery">
                <div class="row">
                    <div class="col-md-6">
                        <div class="form-group"><input class="form-control" type="text" placeholder="Tên"></div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group"><input class="form-control" type="text" placeholder="Họ"></div>
                    </div>
                    <div class="col-md-12">
                        <div class="form-group"><input class="form-control" type="text" placeholder="Địa Chỉ"></div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group selectpicker-wrapper">
                            <select class="selectpicker input-price" data-live-search="true" data-width="100%"
                                data-toggle="tooltip" title="Chọn">
                                <option>Quốc Gia</option>
                                <option>Quốc Gia</option>
                                <option>Quốc Gia</option>
                            </select>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group selectpicker-wrapper">
                            <select class="selectpicker input-price" data-live-search="true" data-width="100%"
                                data-toggle="tooltip" title="Chọn">
                                <option>Thành Phố</option>
                                <option>Thành Phố</option>
                                <option>Thành Phố</option>
                            </select>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="form-group"><input class="form-control" type="text" placeholder="Mã Bưu Điện"></div>
                    </div>
                    <div class="col-md-4">
                        <div class="form-group"><input class="form-control" type="text" placeholder="Email"></div>
                    </div>
                    <div class="col-md-4">
                        <div class="form-group"><input class="form-control" type="text" placeholder="Số Điện Thoại"></div>
                    </div>
                    <div class="col-md-12">
                        <div class="form-group"><textarea class="form-control" placeholder="Thông Tin Bổ Sung" name="name"
                                id="id" cols="30" rows="10"></textarea></div>
                    </div>
                    <div class="col-md-12">
                        <div class="checkbox">
                            <label>
                                <input type="checkbox"> Giao đến địa chỉ khác để xuất hóa đơn
                            </label>
                        </div>
                    </div>
                </div>
            </form>

            <h3 class="block-title alt"><i class="fa fa-angle-down"></i>4. Phương Thức Thanh Toán</h3>
            <div class="panel-group payments-options" id="accordion" role="tablist" aria-multiselectable="true">
                <div class="panel radio panel-default">
                    <div class="panel-heading" role="tab" id="headingOne">
                        <h4 class="panel-title">
                            <a data-toggle="collapse" data-parent="#accordion" href="#collapse1" aria-expanded="true"
                                aria-controls="collapseOne">
                                <span class="dot"></span> Chuyển Khoản Ngân Hàng
                            </a>
                        </h4>
                    </div>
                    <div id="collapse1" class="panel-collapse collapse in" role="tabpanel" aria-labelledby="heading1">
                        <div class="panel-body">
                            <div class="alert alert-success" role="alert"> Phương thức thanh toán của bạn đã được chọn thành
                                công. Vui lòng kiểm tra lại thông tin trước khi đặt hàng.
                            </div>
                        </div>
                    </div>
                </div>
                <div class="panel panel-default">
                    <div class="panel-heading" role="tab" id="headingTwo">
                        <h4 class="panel-title">
                            <a class="collapsed" data-toggle="collapse" data-parent="#accordion" href="#collapse2"
                                aria-expanded="false" aria-controls="collapseTwo">
                                <span class="dot"></span> Thanh Toán Bằng Momo
                            </a>
                        </h4>
                    </div>
                    <div id="collapse2" class="panel-collapse collapse" role="tabpanel" aria-labelledby="heading2">
                        <div class="panel-body">
                            Vui lòng gửi séc của bạn đến Tên Cửa Hàng, Đường Cửa Hàng, Thị Trấn Cửa Hàng, Bang / Hạt Cửa
                            Hàng, Mã Bưu Điện Cửa Hàng.
                        </div>
                    </div>
                </div>
                <div class="panel panel-default">
                    <div class="panel-heading" role="tab" id="headingThree">
                        <h4 class="panel-title">
                            <a class="collapsed" data-toggle="collapse" data-parent="#accordion" href="#collapse3"
                                aria-expanded="false" aria-controls="collapseThree">
                                <span class="dot"></span> Thẻ Tín Dụng
                            </a>
                            <span class="overflowed pull-right">
                                <img src="clients/images/mastercard.jpg" alt="" />
                                <img src="clients/images/visa.jpg" alt="" />
                                <img src="clients/images/american-express.jpg" alt="" />
                                <img src="clients/images/maestro.jpg" alt="" />
                                <img src="clients/images/visa.jpg" alt="" />
                            </span>
                        </h4>
                    </div>
                    <div id="collapse3" class="panel-collapse collapse" role="tabpanel" aria-labelledby="heading3"></div>
                </div>
                <div class="panel panel-default">
                    <div class="panel-heading" role="tab" id="heading4">
                        <h4 class="panel-title">
                            <a class="collapsed" data-toggle="collapse" data-parent="#accordion" href="#collapse4"
                                aria-expanded="false" aria-controls="collapse4">
                                <span class="dot"></span> PayPal
                            </a>
                            <span class="overflowed pull-right"><img src="clients/images/paypal.jpg" alt="" /></span>
                        </h4>
                    </div>
                    <div id="collapse4" class="panel-collapse collapse" role="tabpanel" aria-labelledby="heading4"></div>
                </div>
            </div>
            <div class="overflowed">
                <a class="btn btn-theme btn-theme-dark" href="#">Trang Chủ</a>
                <a class="btn btn-theme pull-right" href="#">Đặt Hàng</a>
            </div>

        </div>
    </section>

    <section class="page-section">
        <div class="container">
            <div class="row blocks shop-info-banners">
                <div class="col-md-4">
                    <div class="block">
                        <div class="media">
                            <div class="pull-right"><i class="fa fa-gift"></i></div>
                            <div class="media-body">
                                <h4 class="media-heading">Mua 1 Tặng 1</h4>
                                Nhận ưu đãi đặc biệt khi mua sắm tại cửa hàng của chúng tôi.
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="block">
                        <div class="media">
                            <div class="pull-right"><i class="fa fa-comments"></i></div>
                            <div class="media-body">
                                <h4 class="media-heading">Gọi Miễn Phí</h4>
                                Liên hệ với chúng tôi để được tư vấn miễn phí về sản phẩm.
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="block">
                        <div class="media">
                            <div class="pull-right"><i class="fa fa-trophy"></i></div>
                            <div class="media-body">
                                <h4 class="media-heading">Hoàn Tiền!</h4>
                                Đảm bảo hoàn tiền nếu bạn không hài lòng với sản phẩm.
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection