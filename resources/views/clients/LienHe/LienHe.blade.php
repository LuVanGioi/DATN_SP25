@extends("clients.themes")

@section("title")
<title>Liên Hệ Với Chúng Tôi - {{ $caiDatWebsite->TenCuaHang }}</title>
@endsection

@section('main')
<section class="page-section breadcrumbs">
    <div class="container">
        <div class="page-header">
            <h1>Liên Hệ</h1>
        </div>
        <ul class="breadcrumb">
            <li><a href="/">Trang Chủ</a></li>
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
                        @foreach ($danhSachLienheClient as $lienHeClients)
                        <div class="media">
                            <div class="media-body">
                                <a href="{{ $lienHeClients->DuongDan }}" target="_blank" class="text-dark"><i class="fas fa-pipe me-1 text-success"></i> <strong>{{ $lienHeClients->TenPhuongThuc }}</strong></a>
                            </div>
                        </div>
                        @endforeach
                    </div>

                </div>
            </div>

            <div class="col-md-8 text-left">

                <h2 class="block-title"><span>Form Liên Hệ</span></h2>

                <form method="POST" action="{{ route("contactForm") }}" class="contact-form">
                    @csrf
                    <div class="outer required">
                        <div class="form-group af-inner">
                            <label class="sr-only" for="name">Tên</label>
                            <input type="text" name="name" id="name" placeholder="Nhập Họ Và Tên" value="{{ old("name") }}" size="30"
                                data-toggle="tooltip" title="Tên là bắt buộc" class="form-control placeholder" />
                        </div>
                    </div>

                    <div class="outer required">
                        <div class="form-group af-inner">
                            <label class="sr-only" for="email">Email</label>
                            <input type="text" name="email" id="email" placeholder="Email" value="{{ old("email") }}" size="30"
                                data-toggle="tooltip" title="Email là bắt buộc" class="form-control placeholder" />
                        </div>
                    </div>

                    <div class="outer required">
                        <div class="form-group af-inner">
                            <label class="sr-only" for="title">Tiêu Đề</label>
                            <input type="text" name="title" id="title" placeholder="Nhập Tiêu Đề" value="{{ old("title") }}" size="30"
                                data-toggle="tooltip" title="Tiêu Đề là bắt buộc" class="form-control placeholder" />
                        </div>
                    </div>

                    <div class="form-group af-inner">
                        <label class="sr-only" for="message">Tin Nhắn</label>
                        <textarea name="message" id="message" placeholder="Tin Nhắn" rows="4" cols="50"
                            data-toggle="tooltip" title="Tin Nhắn là bắt buộc"
                            class="form-control placeholder">{{ old("message") }}</textarea>
                    </div>

                    <div class="outer required">
                        <div class="form-group af-inner">
                            <button type="submit" class="form-button form-button-submit btn btn-theme btn-theme-dark">Gửi Tin Nhắn</button>
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