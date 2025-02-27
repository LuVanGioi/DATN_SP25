@extends("clients.themes")


@section("title")
    <title>Đăng Ký - WD-14</title>
@endsection

@section('main')
    <section class="page-section color">
        <div class="container">
            <div class="row">
                <div class="col-sm-6">
                    <h3 class="block-title"><span>Đăng Ký</span></h3>
                    <form action="#" class="form-login">
                        <div class="row">
                            <div class="col-md-12 hello-text-wrap">
                                <span class="hello-text text-thin">Xin chào, chào mừng bạn đến với tài khoản của bạn</span>
                            </div>
                            <div class="col-md-12">
                                <div class="form-group"><input class="form-control" type="text"
                                        placeholder="Tên đăng nhập hoặc email"></div>
                            </div>
                            <div class="col-md-12">
                                <div class="form-group"><input class="form-control" type="password"
                                        placeholder="Mật khẩu của bạn"></div>
                            </div>
                            <div class="col-md-12">
                                <div class="form-group"><input class="form-control" type="password"
                                        placeholder="Xác nhận mật khẩu"></div>
                            </div>
                            <div class="col-md-12 col-lg-6">
                                <a href="/dang-nhap">Đã có tài khoản?</a>
                            </div>
                            <div class="col-md-6">
                                <a class="btn btn-theme btn-block btn-theme-dark" href="#">Đăng Ký</a>
                            </div>
                        </div>
                    </form>
                </div>
                <div class="col-sm-6">
                    <form action="#" class="create-account">
                        <div class="row">
                            <div class="col-md-12 hello-text-wrap">
                                <span class="hello-text text-thin">Tạo Tài Khoản Của Bạn Trên Bellashop</span>
                            </div>
                            <div class="col-md-12">
                                <h3 class="block-title">Đăng ký hôm nay và bạn sẽ có thể</h3>
                                <ul class="list-check">
                                    <li>Trạng thái đơn hàng trực tuyến</li>
                                    <li>Xem các ưu đãi nóng</li>
                                    <li>Danh sách yêu thích</li>
                                    <li>Đăng ký nhận tin tức độc quyền và bán hàng riêng</li>
                                    <li>Mua hàng nhanh chóng</li>
                                </ul>
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
                                Proin dictum elementum velit. Fusce euismod consequat ante.
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
                                Proin dictum elementum velit. Fusce euismod consequat ante.
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
                                Proin dictum elementum velit. Fusce euismod consequat ante.
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection