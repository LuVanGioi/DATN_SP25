@extends("clients.themes")

@section("title")
    <title>Sản phẩm yêu thích - WD-14</title>
@endsection

@section('main')
    <section class="page-section breadcrumbs">
        <div class="container">
            <div class="page-header">
                <h1>Sản Phẩm Yêu Thích</h1>
            </div>
            <ul class="breadcrumb">
                <li><a href="#">Trang Chủ</a></li>
                <li><a href="#">Cửa Hàng</a></li>
                <li class="active">Sản Phẩm Yêu Thích</li>
            </ul>
        </div>
    </section>

    <section class="page-section color no-padding-bottom">
        <div class="container">

            <div class="row wishlist">
                <div class="col-md-9">
                    <table class="table">
                        <thead>
                            <tr>
                                <th>Hình Ảnh</th>
                                <th>Tên Sản Phẩm</th>
                                <th>Giá Đơn Vị</th>
                                <th></th>
                                <th></th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td class="image"><a class="media-link" href="#"><i class="fa fa-plus"></i><img
                                            src="clients/images/top-sellers-3.jpg" alt="" /></a></td>
                                <td class="description">
                                    <h4><a href="#">Tên Sản Phẩm Tiêu Chuẩn Ở Đây</a></h4>
                                    bởi Tên Danh Mục
                                </td>
                                <td class="price">$116.00</td>
                                <td class="add"><a class="btn btn-theme btn-theme-dark btn-icon-left" href="#"><i
                                            class="fa fa-shopping-cart"></i> Thêm vào giỏ hàng</a></td>
                                <td class="total"><a href="#"><i class="fa fa-close"></i></a></td>
                            </tr>
                            <tr>
                                <td class="image"><a class="media-link" href="#"><i class="fa fa-plus"></i><img
                                            src="clients/images/top-sellers-6.jpg" alt="" /></a></td>
                                <td class="description">
                                    <h4><a href="#">Tên Sản Phẩm Tiêu Chuẩn Ở Đây</a></h4>
                                    bởi Tên Danh Mục
                                </td>
                                <td class="price">$116.00</td>
                                <td class="add"><a class="btn btn-theme btn-theme-dark btn-icon-left" href="#"><i
                                            class="fa fa-shopping-cart"></i> Thêm vào giỏ hàng</a></td>
                                <td class="total"><a href="#"><i class="fa fa-close"></i></a></td>
                            </tr>
                            <tr>
                                <td class="image"><a class="media-link" href="#"><i class="fa fa-plus"></i><img
                                            src="clients/images/top-sellers-8.jpg" alt="" /></a></td>
                                <td class="description">
                                    <h4><a href="#">Tên Sản Phẩm Tiêu Chuẩn Ở Đây</a></h4>
                                    bởi Tên Danh Mục
                                </td>
                                <td class="price">$116.00</td>
                                <td class="add"><a class="btn btn-theme btn-theme-dark btn-icon-left" href="#"><i
                                            class="fa fa-shopping-cart"></i> Thêm vào giỏ hàng</a></td>
                                <td class="total"><a href="#"><i class="fa fa-close"></i></a></td>
                            </tr>
                        </tbody>
                    </table>
                    <a class="btn btn-theme btn-theme-transparent btn-icon-left btn-continue-shopping" href="#"><i
                            class="fa fa-shopping-cart"></i>Tiếp tục mua sắm</a>
                </div>
                <div class="col-md-3">
                    <h3 class="block-title"><span>Đăng Nhập</span></h3>
                    <form action="#" class="form-sign-in">
                        <div class="row">
                            <div class="col-md-12 hello-text-wrap">
                                <span class="hello-text text-thin">Xin chào, chào mừng bạn đến với tài khoản của bạn</span>
                            </div>
                            <div class="col-md-12">
                                <a class="btn btn-theme btn-block btn-icon-left facebook" href="#"><i
                                        class="fab fa-facebook"></i> Đăng nhập bằng Facebook</a>
                            </div>
                            <div class="col-md-12">
                                <a class="btn btn-theme btn-block btn-icon-left twitter" href="#"><i
                                        class="fab fa-twitter"></i> Đăng nhập bằng Twitter</a>
                            </div>
                            <div class="col-md-12">
                                <div class="form-group"><input class="form-control" type="text"
                                        placeholder="Tên người dùng hoặc email"></div>
                            </div>
                            <div class="col-md-12">
                                <div class="form-group"><input class="form-control" type="password"
                                        placeholder="Mật khẩu của bạn"></div>
                            </div>
                            <div class="col-md-12 col-lg-6">
                                <div class="checkbox">
                                    <label><input type="checkbox"> Nhớ mật khẩu</label>
                                </div>
                            </div>
                            <div class="col-md-12 col-lg-6 text-right-lg">
                                <a class="" href="/forgot-password">Quên mật khẩu?</a>
                            </div>
                            <div class="col-md-12">
                                <a class="btn btn-theme btn-block btn-theme-dark" href="#">Đăng Nhập</a>
                            </div>
                            <div class="col-md-12">
                                <a class="btn btn-theme btn-block btn-theme-transparent" href="/dang-ky">Tạo tài khoản</a>
                            </div>
                        </div>
                    </form>
                </div>
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