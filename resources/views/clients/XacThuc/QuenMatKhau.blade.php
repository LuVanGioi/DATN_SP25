@extends("clients.themes")


@section("title")
    <title>Quên Mật Khẩu - WD-14</title>
@endsection

@section('main')
    <section class="page-section color">
        <div class="container">
            <div class="row">
                <div class="col-sm-6">
                    <h3 class="block-title"><span>Quên Mật Khẩu</span></h3>
                    <form action="#" class="form-login">
                        <div class="row">
                            <div class="col-md-12">
                                <div class="form-group"><input class="form-control" type="text"
                                        placeholder="Nhập Email Của Bạn">
                                </div>
                            </div>
                            <div class="col-md-6">
                                <a class="btn btn-theme btn-block btn-theme-dark" href="#">Gửi Email</a>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </section>

    <section class="page-section no-padding-top">
        <div class="container">
            <div class="row blocks shop-info-banners">
                <div class="col-md-4">
                    <div class="block">
                        <div class="media">
                            <div class="pull-right"><i class="fa fa-credit-card"></i></div>
                            <div class="media-body">
                                <h4 class="media-heading">Thanh toán</h4>
                                Thanh toán qua các cổng online và COD 1 cách nhanh chóng.
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="block">
                        <div class="media">
                            <div class="pull-right"><i class="fa fa-headset"></i></div>
                            <div class="media-body">
                                <h4 class="media-heading">Hỗ trợ</h4>
                                Đội ngũ hỗ trợ 24/7. Sẵn sàng giúp bạn tư vấn và giải đáp thắc mắc.
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="block">
                        <div class="media">
                            <div class="pull-right"><i class="fa fa-rotate-left"></i></div>
                            <div class="media-body">
                                <h4 class="media-heading">Hoàn trả</h4>
                                Có hỗ trợ đổi trả hàng, bạn nhận lại 100% giá trị đơn hàng.
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection