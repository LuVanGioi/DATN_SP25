@extends("clients.themes")

@section("title")
    <title>Liên Hệ - WD-14</title>
@endsection

@section('main')
    <section class="page-section breadcrumbs">
        <div class="container">
            <div class="page-header">
                <h1>Liên Hệ</h1>
            </div>
            <ul class="breadcrumb">
                <li><a href="#">Trang Chủ</a></li>
                <li><a href="#">Cửa Hàng</a></li>
                <li class="active">Liên Hệ Với Chúng Tôi</li>
            </ul>
        </div>
    </section>
    <section class="page-section color">
        <div class="container">

            <div class="row">

                <div class="col-md-4">
                    <div class="contact-info">

                        <h2 class="block-title"><span>Liên Hệ Với Chúng Tôi</span></h2>

                        <div class="media-list">
                            <div class="media">
                                <i class="pull-left fa fa-home"></i>
                                <div class="media-body">
                                    <strong>Địa Chỉ:</strong><br>
                                    Phố Trịnh Văn Bô - Nam Từ Liêm - Hà Nội
                                </div>
                            </div>
                            <div class="media">
                                <i class="pull-left fa fa-phone"></i>
                                <div class="media-body">
                                    <strong>Điện Thoại:</strong><br>
                                    (+84) 123 456 789
                                </div>
                            </div>
                            <div class="media">
                                <i class="pull-left fa fa-envelope-o"></i>
                                <div class="media-body">
                                    <strong>Fax:</strong><br>
                                    0123456789
                                </div>
                            </div>
                            <div class="media">
                                <div class="media-body">
                                    Phasellus pellentesque purus in massa aenean in pede phasellus libero ac tellus
                                    pellentesque semper.
                                </div>
                            </div>
                            <div class="media">
                                <div class="media-body">
                                    <strong>Dịch Vụ Khách Hàng:</strong><br>
                                    <a href="mailto:hello@bella.com">hello@bella.com</a>
                                </div>
                            </div>
                            <div class="media">
                                <div class="media-body">
                                    <strong>Trả Hàng và Hoàn Tiền:</strong><br>
                                    <a href="mailto:hello@bella.com">hello@bella.com</a>
                                </div>
                            </div>
                        </div>

                    </div>
                </div>

                <div class="col-md-8 text-left">

                    <h2 class="block-title"><span>Form Liên Hệ</span></h2>

                    <form name="contact-form" method="post" action="#" class="contact-form" id="contact-form">

                        <div class="outer required">
                            <div class="form-group af-inner">
                                <label class="sr-only" for="name">Tên</label>
                                <input type="text" name="name" id="name" placeholder="Tên" value="" size="30"
                                    data-toggle="tooltip" title="Tên là bắt buộc" class="form-control placeholder" />
                            </div>
                        </div>

                        <div class="outer required">
                            <div class="form-group af-inner">
                                <label class="sr-only" for="email">Email</label>
                                <input type="text" name="email" id="email" placeholder="Email" value="" size="30"
                                    data-toggle="tooltip" title="Email là bắt buộc" class="form-control placeholder" />
                            </div>
                        </div>

                        <div class="outer required">
                            <div class="form-group af-inner">
                                <label class="sr-only" for="subject">Chủ Đề</label>
                                <input type="text" name="subject" id="subject" placeholder="Chủ Đề" value="" size="30"
                                    data-toggle="tooltip" title="Chủ Đề là bắt buộc" class="form-control placeholder" />
                            </div>
                        </div>

                        <div class="form-group af-inner">
                            <label class="sr-only" for="input-message">Tin Nhắn</label>
                            <textarea name="message" id="input-message" placeholder="Tin Nhắn" rows="4" cols="50"
                                data-toggle="tooltip" title="Tin Nhắn là bắt buộc"
                                class="form-control placeholder"></textarea>
                        </div>

                        <div class="outer required">
                            <div class="form-group af-inner">
                                <input type="submit" name="submit"
                                    class="form-button form-button-submit btn btn-theme btn-theme-dark" id="submit_btn"
                                    value="Gửi Tin Nhắn" />
                            </div>
                        </div>

                    </form>
                </div>
            </div>
        </div>
    </section>

    <section class="page-section no-padding no-bottom-space">
        <div class="container full-width">
            <div class="google-map">
                <div id="map-canvas"></div>
            </div>
        </div>
    </section>
@endsection