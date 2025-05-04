@extends("admins.themes")

@section("titleHead")
<title>Cài Đặt Hệ Thống - ADMIN</title>
@endsection

@section("main")
<div class="page-body">
    <div class="container-fluid pt-3">
        @if (session('success'))
        <div class="alert alert-success fade show" role="alert">
            <p>{{ session('success') }}</p>
        </div>
        @endif

        @if (session('error'))
        <div class="alert alert-danger fade show" role="alert">
            <p>{{ session('error') }}</p>
        </div>
        @endif

        <form action="{{ route("CaiDatWebsite.update", 1) }}" class="form theme-form" method="POST" enctype="multipart/form-data">
            @csrf
            @method('PUT')
            <div class="row">
                <div class="col-md-3">
                    <div class="list-group" id="list-tab" role="tablist">
                        <a class="list-group-item list-group-item-action active" data-bs-toggle="list" href="#caiDatChung" role="tab">Cài Đặt Chung</a>
                        <a class="list-group-item list-group-item-action" data-bs-toggle="list" href="#ketNoi" role="tab">Kết Nối</a>
                        <a class="list-group-item list-group-item-action thietLap" data-bs-toggle="list" href="#thietLap" role="tab">Thiết Lập Nội Dung</a>
                        <a class="list-group-item list-group-item-action" data-bs-toggle="list" href="#tienIch" role="tab">Tiện Ích</a>
                        <a class="list-group-item list-group-item-action" data-bs-toggle="list" href="#giaoDien" role="tab">Giao Diện</a>
                    </div>
                </div>
                <div class="col-md-9">
                    <div class="tab-content" id="nav-tabContent">
                        <div class="tab-pane fade list-behaviors active show" id="caiDatChung" role="tabpanel">
                            <div class="card">
                                <div class="card-header">
                                    <h5>CÀI ĐẶT HỆ THỐNG</h5>
                                </div>
                                <div class="card-body">
                                    <div class="row">
                                        <div class="col">
                                            <div class="mb-3">
                                                <img src="{{ Storage::url($cai_dat_website->Favicon_website) }}" class="d-block mb-2" height="100px" alt="">
                                                <label>Icon Trang Web</label>
                                                <input class="form-control @error(" Favicon_website") is-invalid border-danger @enderror" type="file" name="Favicon_website">
                                                @error("Favicon_website")
                                                <p class="text-danger">{{ $message }}</p>
                                                @enderror
                                            </div>
                                        </div>

                                        <div class="col">
                                            <div class="mb-3">
                                                <img src="{{ Storage::url($cai_dat_website->Logo_website) }}" class="d-block mb-2" height="100px" alt="">
                                                <label>Logo Trang Web</label>
                                                <input class="form-control @error(" Logo_website") is-invalid border-danger @enderror" type="file" name="Logo_website">
                                                @error("Logo_website")
                                                <p class="text-danger">{{ $message }}</p>
                                                @enderror
                                            </div>
                                        </div>

                                        <div class="col">
                                            <div class="mb-3">
                                                <img src="{{ Storage::url($cai_dat_website->Bia_website) }}" class="d-block mb-2" height="100px" alt="">
                                                <label>Bìa Trang Web</label>
                                                <input class="form-control @error(" Bia_website") is-invalid border-danger @enderror" type="file" name="Bia_website">
                                                @error("Bia_website")
                                                <p class="text-danger">{{ $message }}</p>
                                                @enderror
                                            </div>
                                        </div>
                                    </div>

                                    <div class="row">
                                        <div class="col">
                                            <div class="mb-3">
                                                <label>Tên Cửa Hàng</label>
                                                <input class="form-control @error(" TenCuaHang") is-invalid border-danger @enderror" type="text" name="TenCuaHang" placeholder="Tên Cửa Hàng" value="{{ $cai_dat_website->TenCuaHang }}" required>
                                                @error("TenCuaHang")
                                                <p class="text-danger">{{ $message }}</p>
                                                @enderror
                                            </div>
                                        </div>
                                    </div>

                                    <div class="row">
                                        <div class="col">
                                            <div class="mb-3">
                                                <label>Mô Tả Trang Web</label>
                                                <textarea class="form-control @error(" MoTa") is-invalid border-danger @enderror" type="text" name="MoTa" rows="5" placeholder="Mô Tả Website" required>{{ $cai_dat_website->MoTa }}</textarea>
                                                @error("MoTa")
                                                <p class="text-danger">{{ $message }}</p>
                                                @enderror
                                            </div>
                                        </div>

                                        <div class="col">
                                            <div class="mb-3">
                                                <label>Từ Khóa Trang Web</label>
                                                <textarea class="form-control @error(" TuKhoa") is-invalid border-danger @enderror" type="text" name="TuKhoa" rows="5" placeholder="Từ Khóa Website" required>{{ $cai_dat_website->TuKhoa }}</textarea>
                                                @error("TuKhoa")
                                                <p class="text-danger">{{ $message }}</p>
                                                @enderror
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="tab-pane fade list-behaviors" id="ketNoi" role="tabpanel">
                            <div class="card">
                                <div class="card-header">
                                    <h5>Kết Nối</h5>
                                </div>
                                <div class="card-body">
                                    <div class="row push mb-3">
                                        <div class="col-md-6">
                                            <table class="table table-bordered border table-striped table-hover mb-3">
                                                <thead class="table-dark text-center">
                                                    <tr>
                                                        <th colspan="2">
                                                            <img src="/admins/images/icon/icon-smtp.png" width="20px" class="me-1">
                                                            SMTP
                                                        </th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    <tr>
                                                        <td>
                                                            <i class="fa fa-toggle-on text-success"></i>
                                                            SMTP Mail
                                                        </td>
                                                        <td>
                                                            <select class="form-control" name="smtp_status" id="smtp_status" onchange="SMTP_view()">
                                                                <option value="1" {{ $smtp_mail->smtp_status == "1" ? "selected" : "" }}>
                                                                    ON
                                                                </option>
                                                                <option value="0" {{ $smtp_mail->smtp_status == "0" ? "selected" : "" }}>
                                                                    OFF
                                                                </option>
                                                            </select>
                                                        </td>
                                                    </tr>

                                                    <tr>
                                                        <td>
                                                            <i class="fas fa-server text-primary"></i>
                                                            SMTP Host
                                                        </td>
                                                        <td>
                                                            <input type="text" name="smtp_host" class="form-control" placeholder="VD: smtp.gmail.com" value="{{ $smtp_mail->smtp_host }}">
                                                        </td>
                                                    </tr>

                                                    <tr>
                                                        <td>
                                                            <i class="fas fa-shield-alt text-warning"></i>
                                                            SMTP Encryption
                                                        </td>
                                                        <td>
                                                            <select class="form-control" name="smtp_encryption">
                                                                <option value="tls" {{ $smtp_mail->smtp_encryption == "tls" ? "selected" : "" }}>TLS</option>
                                                                <option value="ssl" {{ $smtp_mail->smtp_encryption == "ssl" ? "selected" : "" }}>SSL</option>
                                                            </select>
                                                        </td>
                                                    </tr>

                                                    <tr>
                                                        <td>
                                                            <i class="fas fa-network-wired text-info"></i>
                                                            SMTP Port
                                                        </td>
                                                        <td>
                                                            <input type="text" name="smtp_port" class="form-control" placeholder="VD: 465, 587" value="{{ $smtp_mail->smtp_port }}">
                                                        </td>
                                                    </tr>

                                                    <tr>
                                                        <td>
                                                            <i class="fa fa-envelope text-danger"></i>
                                                            SMTP Email
                                                        </td>
                                                        <td>
                                                            <input type="text" name="smtp_email" class="form-control" placeholder="VD: yourmail@gmail.com" value="{{ $smtp_mail->smtp_email }}">
                                                        </td>
                                                    </tr>

                                                    <tr>
                                                        <td>
                                                            <i class="fas fa-key text-secondary"></i>
                                                            SMTP Password
                                                        </td>
                                                        <td>
                                                            <input type="password" name="smtp_password" class="form-control" placeholder="Mật khẩu SMTP..." value="{{ $smtp_mail->smtp_password }}">
                                                        </td>
                                                    </tr>
                                                </tbody>
                                            </table>
                                        </div>
                                        <div class="col-md-6">
                                            <table class="table table-bordered border table-striped table-hover mb-3">
                                                <thead class="table-dark">
                                                    <tr>
                                                        <th colspan="2" class="text-center">
                                                            <img src="/clients/images/LOGO/payos.png" width="20px"> Cổng Thanh Toán PayOs
                                                        </th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    <tr>
                                                        <td>PayOs</td>
                                                        <td>
                                                            <select class="form-control" name="PayOs_status">
                                                                <option value="1" {{ $pay_os->status == "1" ? "selected" : "" }}>ON</option>
                                                                <option value="0" {{ $pay_os->status == "0" ? "selected" : "" }}>OFF</option>
                                                            </select>
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <td>PayOs ClientID</td>
                                                        <td>
                                                            <input type="text" name="PayOs_Client_ID" value="{{ $pay_os->Client_ID }}" class="form-control">
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <td>PayOs API Key</td>
                                                        <td>
                                                            <input type="text" name="PayOs_API_Key" value="{{ $pay_os->API_Key }}" class="form-control">
                                                        </td>
                                                    </tr>

                                                    <tr>
                                                        <td>PayOs Checksum Key</td>
                                                        <td>
                                                            <input type="text" name="PayOs_Checksum_Key" value="{{ $pay_os->Checksum_Key }}" class="form-control">
                                                        </td>
                                                    </tr>
                                                </tbody>
                                            </table>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="tab-pane fade list-behaviors" id="thietLap" role="tabpanel">
                            <div class="card">
                                <div class="card-header">
                                    <h5>NỘI DUNG THÔNG BÁO MAIL</h5>
                                </div>
                                <div class="card-body">
                                    <div class="row push mb-3">
                                        <div class="col-md-12">
                                            <table class="mb-3 table table-bordered table-striped table-hover">
                                                <thead class="table-dark">
                                                    <tr>
                                                        <th colspan="2" class="text-center">THIẾT LẬP NỘI DUNG</th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    <tr>
                                                        <td>Thông Tin Mua Hàng</td>
                                                        <td>
                                                            <div class="input-group mb-2">
                                                                <span class="input-group-text">Tiêu Đề</span>
                                                                <input class="form-control" name="email_temp_subject_buy_order" value="{{ $noi_dung_gui_mail->firstWhere("Loai", "order_buy")->TieuDe }}">
                                                            </div>
                                                            <textarea name="email_temp_content_buy_order" class="note-DATN">{{ $noi_dung_gui_mail->firstWhere("Loai", "order_buy")->NoiDung }}</textarea>
                                                            <div class="accordion accordion-customicon1 accordion-primary">
                                                                <div class="accordion-item">
                                                                    <h2 class="accordion-header">
                                                                        <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#email_temp_content_buy_order" aria-expanded="false" aria-controls="email_temp_content_buy_order">Văn bản thay thế</button>
                                                                    </h2>
                                                                    <div id="email_temp_content_buy_order" class="accordion-collapse collapse">
                                                                        <div class="accordion-body">
                                                                            <ul>
                                                                                <li><b>{domain}</b> => Link Website.</li>
                                                                                <li><b>{title}</b> => Tên website.</li>
                                                                                <li><b>{username}</b> => Tên khách hàng.</li>
                                                                                <li><b>{ip}</b> => Địa chỉ IP.</li>
                                                                                <li><b>{device}</b> => Thiết bị.</li>
                                                                                <li><b>{time}</b> => Thời gian.</li>
                                                                                <li><b>{list_product}</b> => Danh sách sản phẩm mua.</li>
                                                                                <li><b>{trans_id}</b> => Mã đơn hàng.</li>
                                                                                <li><b>{pay}</b> => Số tiền đã thanh toán.</li>
                                                                            </ul>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <td>Thông báo đăng nhập</td>
                                                        <td>
                                                            <div class="input-group mb-2">
                                                                <span class="input-group-text" id="basic-addon1">Tiêu Đề</span>
                                                                <input class="form-control" name="email_temp_subject_warning_login" value="{{ $noi_dung_gui_mail->firstWhere("Loai", "alert_login")->TieuDe }}">
                                                            </div>
                                                            <textarea name="email_temp_content_warning_login" class="note-DATN">{{ $noi_dung_gui_mail->firstWhere("Loai", "alert_login")->NoiDung }}</textarea>
                                                            <div class="accordion accordion-customicon1 accordion-primary">
                                                                <div class="accordion-item">
                                                                    <h2 class="accordion-header">
                                                                        <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#email_temp_content_warning_login" aria-expanded="false" aria-controls="email_temp_content_warning_login">
                                                                            Văn bản thay thế
                                                                        </button>
                                                                    </h2>
                                                                    <div id="email_temp_content_warning_login" class="accordion-collapse collapse">
                                                                        <div class="accordion-body">
                                                                            <ul>
                                                                                <li><b>{domain}</b> => Link Website.</li>
                                                                                <li><b>{title}</b> => Tên website.</li>
                                                                                <li><b>{username}</b> => Tên khách hàng.</li>
                                                                                <li><b>{ip}</b> => Địa chỉ IP.</li>
                                                                                <li><b>{device}</b> => Thiết bị.</li>
                                                                                <li><b>{time}</b> => Thời gian.</li>
                                                                            </ul>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <td>Khôi Phục Mật khẩu</td>
                                                        <td>
                                                            <div class="input-group mb-2">
                                                                <span class="input-group-text" id="basic-addon1">Tiêu Đề</span>
                                                                <input class="form-control" name="email_temp_subject_forgot_password" value="{{ $noi_dung_gui_mail->firstWhere("Loai", "forgot_password")->TieuDe }}">
                                                            </div>
                                                            <textarea name="email_temp_content_forgot_password" class="note-DATN">{{ $noi_dung_gui_mail->firstWhere("Loai", "forgot_password")->NoiDung }}</textarea>
                                                            <div class="accordion accordion-customicon1 accordion-primary">
                                                                <div class="accordion-item">
                                                                    <h2 class="accordion-header">
                                                                        <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#email_temp_content_forgot_password" aria-expanded="false" aria-controls="email_temp_content_forgot_password">
                                                                            Văn bản thay thế
                                                                        </button>
                                                                    </h2>
                                                                    <div id="email_temp_content_forgot_password" class="accordion-collapse collapse">
                                                                        <div class="accordion-body">
                                                                            <ul>
                                                                                <li><b>{domain}</b> => Link Website.</li>
                                                                                <li><b>{title}</b> => Tên website.</li>
                                                                                <li><b>{username}</b> => Tên khách hàng.</li>
                                                                                <li><b>{link}</b> => Link xác minh.</li>
                                                                                <li><b>{ip}</b> => Địa chỉ IP.</li>
                                                                                <li><b>{device}</b> => Thiết bị.</li>
                                                                                <li><b>{time}</b> => Thời gian.</li>
                                                                            </ul>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </td>
                                                    </tr>
                                                </tbody>
                                            </table>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="tab-pane fade list-behaviors" id="tienIch" role="tabpanel">
                            <div class="card">
                                <div class="card-header">
                                    <h5>TIỆN ÍCH</h5>
                                </div>
                                <div class="card-body">
                                    <div class="row">
                                        <div class="col-md-6">
                                            <table class="mb-3 table table-bordered border table-striped table-hover">
                                                <tbody>
                                                    <tr>
                                                        <td colspan="2">
                                                            <select class="form-control mb-1" name="TienIchZalo_status">
                                                                <option value="1" {{ $tien_ich_website->firstWhere("Loai", "support_zalo")->TrangThai == "1" ? "selected" : "" }}>ON</option>
                                                                <option value="0" {{ $tien_ich_website->firstWhere("Loai", "support_zalo")->TrangThai == "0" ? "selected" : "" }}>OFF</option>
                                                            </select>
                                                            <img src="/clients/images/icon/zalo.png" width="50px">
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <td>Số điện thoại
                                                        </td>
                                                        <td>
                                                            <input type="text" class="form-control" placeholder="Nhập Số Điện Thoại Zalo" name="TienIchZalo_phone" value="{{ $tien_ich_website->firstWhere("Loai", "support_zalo")->SoDienThoai }}">
                                                        </td>
                                                    </tr>
                                                </tbody>
                                            </table>

                                            <table class="mb-3 table table-bordered border table-striped table-hover">
                                                <tbody>
                                                    <tr>
                                                        <td colspan="2">
                                                            <select class="form-control mb-1" name="TienIchZalo2_status">
                                                                <option value="1" {{ $tien_ich_website->firstWhere("Loai", "support_zalo_2")->TrangThai == "1" ? "selected" : "" }}>ON</option>
                                                                <option value="0" {{ $tien_ich_website->firstWhere("Loai", "support_zalo_2")->TrangThai == "0" ? "selected" : "" }}>OFF</option>
                                                            </select>
                                                            <img src="/clients/images/icon/fb_email.png" width="50px">
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <td>Link Facebook
                                                        </td>
                                                        <td>
                                                            <input type="text" class="form-control" placeholder="Nhập Link Facebook" name="TienIchZalo2_DuongDan" value="{{ $tien_ich_website->firstWhere("Loai", "support_zalo_2")->DuongDan }}">
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <td>Email
                                                        </td>
                                                        <td>
                                                            <input type="text" class="form-control" placeholder="Nhập Số Điện Thoại Zalo" name="TienIchZalo2_phone" value="{{ $tien_ich_website->firstWhere("Loai", "support_zalo_2")->SoDienThoai }}">
                                                        </td>
                                                    </tr>
                                                </tbody>
                                            </table>
                                        </div>

                                        <div class="col-md-6">
                                            <table class="mb-3 table table-bordered border table-striped table-hover">
                                                <tbody>
                                                    <tr>
                                                        <td colspan="2">
                                                            <select class="form-control mb-1" name="TienIchPhone_status">
                                                                <option value="1" {{ $tien_ich_website->firstWhere("Loai", "support_phone")->TrangThai == "1" ? "selected" : "" }}>ON</option>
                                                                <option value="0" {{ $tien_ich_website->firstWhere("Loai", "support_phone")->TrangThai == "0" ? "selected" : "" }}>OFF</option>
                                                            </select>
                                                            <img src="/clients/images/icon/phone.png" width="50px">
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <td>Số điện thoại
                                                        </td>
                                                        <td>
                                                            <input type="text" class="form-control" placeholder="Nhập Số Điện Thoại Liên Hệ" name="TienIchPhone_phone" value="{{ $tien_ich_website->firstWhere("Loai", "support_phone")->SoDienThoai }}">
                                                        </td>
                                                    </tr>
                                                </tbody>
                                            </table>

                                            <table class="table table-bordered border table-striped table-hover mb-3">
                                                <tbody>
                                                    <tr>
                                                        <td>LiveChat</td>
                                                        <td>
                                                            <select class="form-control" name="liveChat_status">
                                                                <option value="1" {{ $tien_ich_website->firstWhere("Loai", "live_chat")->TrangThai == "1" ? "selected" : "" }}>ON</option>
                                                                <option value="0" {{ $tien_ich_website->firstWhere("Loai", "live_chat")->TrangThai == "0" ? "selected" : "" }}>OFF</option>
                                                            </select>
                                                        </td>
                                                    </tr>
                                                </tbody>
                                            </table>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="tab-pane fade list-behaviors" id="giaoDien" role="tabpanel">
                            <div class="card">
                                <div class="card-header">
                                    <h5>CÀI ĐẶT GIAO DIỆN</h5>
                                </div>
                                <div class="card-body">
                                    <input type="hidden" name="product_new_home" value="0">
                                    <input type="hidden" name="product_sale_home" value="0">
                                    <div class="row">
                                        <div class="col-md-6">
                                            <table class="mb-3 table table-bordered border table-striped table-hover">
                                                <thead class="bg-primary text-center">
                                                    <tr>
                                                        <th colspan="2">
                                                            Trang Chủ Client
                                                        </th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    <tr>
                                                        <th colspan="2" class="text-center bg-dark">
                                                            SẢN PHẨM
                                                        </th>
                                                    </tr>
                                                    <tr>
                                                        <td width="30%">
                                                            Số Lượng Sản Phẩm Hiển Thị
                                                        </td>
                                                        <td>
                                                            <input type="number" placeholder="Không Nhập Mặc Định Là 12" class="form-control" name="amount_product_home" value="{{ $cai_dat_giao_dien_website->firstWhere("Loai", "quantity_product_home")->GiaTri }}">
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <td width="30%">
                                                            Loại Hiển Thị Sản Phẩm
                                                        </td>
                                                        <td>
                                                            <input type="hidden" name="product_cate_quality_trademark_home" value="0">
                                                            <select class="form-control" name="product_style_home">
                                                                <option value="0" {{ $cai_dat_giao_dien_website->firstWhere("Loai", "style_product_home")->GiaTri == "0" ? "selected" : "" }}>MỚI HIỆN ĐẦU TIÊN</option>
                                                                <option value="1" {{ $cai_dat_giao_dien_website->firstWhere("Loai", "style_product_home")->GiaTri == "1" ? "selected" : "" }}>MỚI HIỆN CUỐI</option>
                                                            </select>
                                                        </td>
                                                    </tr>

                                                    <tr>
                                                        <th colspan="2" class="text-center bg-dark">
                                                            BÀI VIẾT
                                                        </th>
                                                    </tr>
                                                    <tr>
                                                        <td width="30%">
                                                            Lượt Xem Bài Viết
                                                        </td>
                                                        <td>
                                                            <select class="form-control mb-2" name="news_view_home">
                                                                <option value="1" {{ $cai_dat_giao_dien_website->firstWhere("Loai", "news_view_home")->GiaTri == "1" ? "selected" : "" }}>ON</option>
                                                                <option value="0" {{ $cai_dat_giao_dien_website->firstWhere("Loai", "news_view_home")->GiaTri == "0" ? "selected" : "" }}>OFF</option>
                                                            </select>
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <td width="30%">
                                                            Số Bình Luận Bài Viết
                                                        </td>
                                                        <td>
                                                            <select class="form-control mb-2" name="news_comment_home">
                                                                <option value="1" {{ $cai_dat_giao_dien_website->firstWhere("Loai", "news_comment_home")->GiaTri == "1" ? "selected" : "" }}>ON</option>
                                                                <option value="0" {{ $cai_dat_giao_dien_website->firstWhere("Loai", "news_comment_home")->GiaTri == "0" ? "selected" : "" }}>OFF</option>
                                                            </select>
                                                        </td>
                                                    </tr>

                                                    <tr>
                                                        <th colspan="2" class="text-center bg-dark">
                                                            KHÁC
                                                        </th>
                                                    </tr>

                                                    <tr>
                                                        <td width="30%">
                                                            Thông Điệp Xanh
                                                        </td>
                                                        <td>
                                                            <select class="form-control mb-2" name="message_status_home">
                                                                <option value="1" {{ $cai_dat_giao_dien_website->firstWhere("Loai", "message_status_home")->GiaTri == "1" ? "selected" : "" }}>ON</option>
                                                                <option value="0" {{ $cai_dat_giao_dien_website->firstWhere("Loai", "message_status_home")->GiaTri == "0" ? "selected" : "" }}>OFF</option>
                                                            </select>
                                                            <input type="text" placeholder="Nhập Thông Điệp" class="form-control" name="message_home" value="{{ $cai_dat_giao_dien_website->firstWhere("Loai", "message_home")->GiaTri }}">
                                                        </td>
                                                    </tr>

                                                    <tr>
                                                        <td width="30%">
                                                            3 Biểu Ngữ
                                                        </td>
                                                        <td>
                                                            <select class="form-control mb-2" name="3_banners_status_home">
                                                                <option value="1" {{ $cai_dat_giao_dien_website->firstWhere("Loai", "3_banners_status_home")->GiaTri == "1" ? "selected" : "" }}>ON</option>
                                                                <option value="0" {{ $cai_dat_giao_dien_website->firstWhere("Loai", "3_banners_status_home")->GiaTri == "0" ? "selected" : "" }}>OFF</option>
                                                            </select>
                                                        </td>
                                                    </tr>
                                                </tbody>
                                            </table>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="row">
                <div class="col">
                    <div class="text-end">
                        <button class="btn btn-primary me-3" type="submit">Lưu Thông Tin</button>
                    </div>
                </div>
            </div>
        </form>
    </div>
</div>
@endsection

@section("js")
<script>
    function SMTP_view() {
        if (document.getElementById("smtp_status").value == "1") {
            document.querySelector(".thietLap").style.display = "block";
        } else {
            document.querySelector(".thietLap").style.display = "none";
        }
    }
</script>
@endsection