@extends("clients.themes")

@section("title")
<title>Thanh Toán Đơn Hàng - {{ $caiDatWebsite->TenCuaHang }}</title>
@endsection

@section('main')
@php
if($soLuongGioHangClient <= 0) {
    abort(404, 'Dữ liệu không hợp lệ.' );
    }
    @endphp
    <section class="page-section breadcrumbs">
    <div class="container">
        <div class="page-header">
            <h1>Thanh Toán</h1>
        </div>
        <ul class="breadcrumb">
            <li><a href="/">Trang Chủ</a></li>
            <li><a href="{{ route("gio-hang.index") }}">Giỏ Hàng</a></li>
            <li class="active">Giỏ Hàng</li>
        </ul>
    </div>
    </section>

    <section class="page-section">
        <div class="container">
            <div class="row orders">
                <div class="col-md-7">
                    <h3 class="block-title"><span>Sản Phẩm</span></h3>

                    <ul class="list-product-payment">
                        @foreach ($danhSachGioHangClient as $gioHangClient)
                        <li class="item-product-payment" onclick="href('/san-pham/{{ $gioHangClient->DuongDan }}')">
                            <div class="logo">
                                <img src="{{ Storage::url($gioHangClient->HinhAnh) }}" alt="">
                            </div>
                            <div class="info">
                                <div class="name">{{ $gioHangClient->TenSanPham }}</div>
                                <div class="parameter"><small>{{ $gioHangClient->TenKichCo }} - {{ $gioHangClient->TenMauSac }}</small></div>

                                <div class="money">
                                    <div class="prices">
                                    {{ number_format($gioHangClient->GiaSanPham) }} đ <del><small>{{ ($gioHangClient->GiaKhuyenMai ? number_format($gioHangClient->GiaKhuyenMai) : '') }} đ</small></del>
                                    </div>
                                    <div class="amount">
                                        x{{ number_format($gioHangClient->SoLuong) }}
                                    </div>
                                </div>

                                <div class="total-money">
                                    <span>Tổng Số Tiền</span>
                                    <span>{{ number_format($gioHangClient->ThanhTien) }} đ</span>
                                </div>
                            </div>
                        </li>
                        @endforeach
                    </ul>
                </div>

                @php
                $giamGia = session('giamGia', 0);
                $tongTienSauGiam = $tongTienSanPhamGioHangClient - $giamGia;
                @endphp
                <div class="col-md-5">
                    @if (!Auth::check())
                    <h3 class="block-title"><span>Đăng Nhập & Đăng Ký</span></h3>
                    <p class="text-success">Bạn Chưa Đăng Nhập, Vui Lòng Đăng Nhập Để Thanh Toán Đơn Hàng</p>
                    <form action="{{route('login')}}" method="POST" class="form-login">
                        @csrf
                        <div class="row">
                            <div class="col-md-12">
                                <div class="form-group">
                                    <input class="form-control" type="text" name="email"
                                        placeholder="Tên đăng nhập hoặc email" value="{{old('email')}}" autocomplete="email">

                                    @error('email')
                                    <p class="text-danger">{{ $message}}</p>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-md-12">
                                <div class="form-group"><input class="form-control" type="password" name="password"
                                        placeholder="Mật khẩu của bạn"></div>
                            </div>
                            <div class="col-md-6">
                                <button class="btn btn-theme btn-block btn-theme-dark">Đăng Nhập</button>
                            </div>
                            <div class="col-md-6">
                                <a class="btn btn-block btn-theme btn-theme-dark btn-create" href="{{route('register')}}">Tạo Tài
                                    Khoản</a>
                            </div>
                        </div>
                    </form>
                    @else
                    <h3 class="block-title"><span>Địa Chỉ Giao Hàng</span></h3>
                    <div role="tab" id="headingTwo">
                        <h4 class="panel-title">
                            <a class="collapsed" data-toggle="collapse" data-parent="#accordion" href="#addAddress" aria-expanded="false" aria-controls="collapseTwo">
                                <span>Thêm Địa Chỉ Giao Hàng</span> <i class="fas fa-plus-circle text-success ms-1"></i>
                            </a>
                        </h4>
                    </div>
                    <div id="addAddress" class="collapse" role="tabpanel" aria-labelledby="heading2" aria-expanded="false">
                        <form action="" class="mt-2">
                            <h3 class="block-title"><span>Thêm Địa Chỉ Giao Hàng</span></h3>
                            <div class="row mt-3">
                                <div class="col-md-6">
                                    <div class="form-group"><input class="form-control" type="text" placeholder="Họ Và Tên"></div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group"><input class="form-control" type="text" placeholder="Số Điện Thoại"></div>
                                </div>
                                <div class="col-md-12">
                                    <div class="form-group"><input class="form-control" type="text" placeholder="Tên Đường, Tòa Nhà, Số Nhà,..."></div>
                                </div>
                                <div class="col-md-4">
                                    <div class="form-group selectpicker-wrapper">
                                        <select class="selectpicker input-price" name="tinhThanh" id="tinhThanh" onchange="chonTinhThanh()" data-live-search="true" data-width="100%" data-toggle="tooltip" title="Chọn Tỉnh Thành">
                                            <option value="">Tỉnh Thành</option>
                                            @foreach ($danhSachTinhThanh as $tinhThanh)
                                            <option value="{{ $tinhThanh->IdTinh }}">{{ $tinhThanh->TenThanhPho }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>

                                <div class="col-md-4">
                                    <div class="form-group">
                                        <select class="form-control" name="huyen" id="huyen" onchange="chonHuyen()">
                                            <option value="">Quận / Huyện</option>
                                        </select>
                                    </div>
                                </div>

                                <div class="col-md-4">
                                    <div class="form-group">
                                        <select class="form-control" name="xaPhuong" id="xaPhuong">
                                            <option>Xã / Phường</option>
                                        </select>
                                    </div>
                                </div>

                                <div class="col-md-12">
                                    <div class="form-group">
                                        <select class="form-control" name="huyen" id="huyen" onchange="chonHuyen()">
                                            <option value="1">Đặt Làm Địa Chỉ Mặc Định</option>
                                            <option value="0">Không</option>
                                        </select>
                                    </div>
                                </div>

                                <div class="col-md-12 text-end mb-3">
                                    <button type="submit" class="btn btn-theme btn-theme-dark">Thêm Ngay</button>
                                </div>
                            </div>
                            <hr>
                        </form>
                    </div>

                    <ul class="list-address">
                        <li class="item-address">
                            <i class="fas fa-location-dot"></i>
                            <div>
                                <div class="name">
                                    <span>Lư Văn Giỏi</span> <small>0333293290</small>
                                </div>
                                <div class="address">
                                    <span>Nhà Số 19, Thôn Linh Tràng</span>
                                    <span>Xã Trường Lương, Thị Xã Đông Triều, Tỉnh Quảng Ninh</span>
                                </div>
                            </div>
                            <div class="icon-right">
                                <i class="fas fa-chevron-right"></i>
                            </div>
                        </li>
                    </ul>
                    @endif
                    <br>
                    <form action="" method="POST">
                        <h3 class="block-title"><span>Mã Giảm Giá</span></h3>
                        <div class="form-group">
                            <input class="form-control" placeholder="Nhập Mã Giảm Giá" name="name" id="id">
                        </div>

                        <div class="form-group">
                            <textarea class="form-control" placeholder="Lời Nhắn Cho Shop" name="name" id="id" rows="4"></textarea>
                        </div>
                        <br>
                        <h3 class="block-title"><span>Phương Thức Thanh Toán</span></h3>
                        <ul class="list-method-payment">
                            <li class="item-method active" onclick="chonPhuongThucThanhToan('shipCod')" id="shipCod-button">
                                <label for="shipCod">
                                    <img src="https://otothangloi.com/wp-content/uploads/2019/04/icon-thanh-toan.png" alt="">
                                    <input type="radio" id="shipCod" name="method" value="COD" checked>
                                </label>
                                <span>Thanh Toán Khi Nhận Hàng</span>
                            </li>

                            <li class="item-method" onclick="chonPhuongThucThanhToan('banking')" id="banking-button">
                                <label for="banking">
                                    <img src="https://images.icon-icons.com/1091/PNG/512/bank_78392.png" alt="">
                                    <input type="radio" id="banking" name="method" value="Banking">
                                </label>
                                <span>Thanh Toán Ngân Hàng</span>
                            </li>

                            <li class="item-method" onclick="chonPhuongThucThanhToan('momo')" id="momo-button">
                                <label for="momo">
                                    <img src="https://cdn.haitrieu.com/wp-content/uploads/2022/10/Logo-MoMo-Circle.png" alt="">
                                    <input type="radio" id="momo" name="method" value="Momo">
                                </label>
                                <span>Thanh Toán Ví Momo</span>
                            </li>

                            <li class="item-method" onclick="chonPhuongThucThanhToan('vnpay')" id="vnpay-button">
                                <label for="vnpay">
                                    <img src="https://vnpay.vn/s1/statics.vnpay.vn/2023/9/06ncktiwd6dc1694418196384.png" alt="">
                                    <input type="radio" id="vnpay" name="method" value="VNPay">
                                </label>
                                <span>Thanh Toán Ví VNPay</span>
                            </li>
                        </ul>
                        <br>
                        <h3 class="block-title"><span>Chi Tiết Thanh Toán</span></h3>
                        <div class="shopping-cart">
                            <table>
                                <tr>
                                    <td style="text-align: start">Tổng Tiền Hàng:</td>
                                    <td style="text-align: end; font-weight: bold">{{ number_format($tongTienSanPhamGioHangClient) }} VND</td>
                                </tr>
                                <tr>
                                    <td style="text-align: start">Tổng Tiền Phí Vận Chuyển:</td>
                                    <td style="text-align: end; font-weight: bold">0 VND</td>
                                </tr>
                                <tr>
                                    <td style="text-align: start">Giảm Giá Tiền Hàng:</td>
                                    <td style="text-align: end; font-weight: bold">{{ number_format($giamGia) }} VND</td>
                                </tr>
                                <tfoot>
                                    <tr>
                                        <td colspan="2" style="padding: 5px 0px; margin: 0px">Tổng Thanh Toán: {{ number_format($tongTienSauGiam) }} VND</td>
                                    </tr>
                                </tfoot>
                            </table>
                        </div>
                        <div class="text-end mt-3">
                            <button type="submit" class="btn btn-theme btn-theme-dark" @if (!Auth::check())
                                disabled
                                @endif>Đặt Hàng</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </section>
    @endsection

    @section("js")
    <script>
        function chonPhuongThucThanhToan(id) {
            var button = document.getElementById(id + "-button");
            let items = document.querySelectorAll(".item-method");
            items.forEach(item => item.classList.remove("active"));

            if (button) {
                button.classList.add("active");
            }
        }

        function chonHuyen() {
            let huyenSelect = document.getElementById("huyen").value;
            let xaPhuong = document.getElementById("xaPhuong");
            xaPhuong.innerHTML = "";

            if (!huyenSelect) {
                xaPhuong.innerHTML = '<option value="">Xã / Phường</option>';
                return;
            }

            fetch("https://provinces.open-api.vn/api/d/" + huyenSelect + "?depth=2")
                .then(response => response.json())
                .then(data => {
                    xaPhuong.innerHTML = '<option value="">Xã / Phường</option>';

                    data.wards.forEach(ward => {
                        let option = new Option(ward.name, ward.code);
                        xaPhuong.add(option);
                    });
                })
                .catch(error => console.error("Không Thể Lấy Dữ Liệu", error));
        }

        function chonTinhThanh() {
            let tinhThanh = document.getElementById("tinhThanh").value;
            let huyenSelect = document.getElementById("huyen");
            huyenSelect.innerHTML = "";

            if (!tinhThanh) {
                huyenSelect.innerHTML = '<option value="">Quận / Huyện</option>';
                return;
            }

            let options = <?php echo json_encode($danhSachHuyen); ?>;

            options.forEach(huyen => {
                if (huyen.ID_TinhThanh == tinhThanh) {
                    let option = new Option(huyen.TenHuyen, huyen.MaHuyen);
                    huyenSelect.add(option);
                }
            });
        }

        function href(link) {
            location.href = link;
        }
    </script>
    @endsection