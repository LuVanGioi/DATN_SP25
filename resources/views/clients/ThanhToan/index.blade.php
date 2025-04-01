@extends("clients.themes")

@section("title")
<title>Thanh Toán Đơn Hàng - {{ $caiDatWebsite->TenCuaHang }}</title>
@endsection

@section('main')
    <section class="page-section breadcrumbs">
    <div class="container">
        <div class="page-header">
            <h1>Thanh Toán</h1>
        </div>
        <ul class="breadcrumb">
            <li><a href="/">Trang Chủ</a></li>
            <li><a href="{{ route("gio-hang.index") }}">Giỏ Hàng</a></li>
            <li class="active">Thanh Toán</li>
        </ul>
    </div>
    </section>

    <section class="page-section">
        <div class="container">
            @if(session("error"))
            <div class="alert alert-danger mb-2">{{ session("error") }}</div>
            @endif

            @if(session("success"))
            <div class="alert alert-success mb-2">{{ session("success") }}</div>
            @endif

            @error("id_product")
            <div class="alert alert-danger mb-2">{{ $message }}</div>
            @enderror
            <div class="row orders">
                <div class="col-md-7">
                    <h3 class="block-title"><span>Sản Phẩm</span></h3>

                    <ul class="list-product-payment">
                        @foreach ($sanPhamDaChon as $sanPhamm)
                        <li class="item-product-payment" onclick="href('/san-pham/{{ $sanPhamm->DuongDan }}')">
                            <div class="logo">
                                <img src="{{ Storage::url($sanPhamm->HinhAnh) }}" alt="">
                            </div>
                            <div class="info">
                                <div class="name">{{ $sanPhamm->TenSanPham }}</div>
                                <div class="parameter"><small>{{ $sanPhamm->TenKichCo }} -
                                        {{ $sanPhamm->TenMauSac }}</small></div>

                                <div class="money">
                                    <div class="prices">
                                        {{ number_format($sanPhamm->GiaSanPham) }} đ
                                        <del><small>{{ ($sanPhamm->GiaKhuyenMai ? number_format($sanPhamm->GiaKhuyenMai) : '') }}
                                                đ</small></del>
                                    </div>
                                    <div class="amount">
                                        x{{ number_format($sanPhamm->SoLuong) }}
                                    </div>
                                </div>

                                <div class="total-money">
                                    <span>Tổng Số Tiền</span>
                                    <span>{{ number_format($sanPhamm->ThanhTien) }} đ</span>
                                </div>
                            </div>
                        </li>
                        @endforeach
                    </ul>
                </div>

                @php
                $giamGia = session('giamGia', 0);
                $tongTienSauGiam = $tongTienSanPhamDaChon - $giamGia;
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
                                        placeholder="Tên đăng nhập hoặc email" value="{{old('email')}}"
                                        autocomplete="email">

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
                                <a class="btn btn-block btn-theme btn-theme-dark btn-create"
                                    href="{{route('register')}}">Tạo Tài
                                    Khoản</a>
                            </div>
                        </div>
                    </form>
                    @else
                    <h3 class="block-title"><span>Địa Chỉ Giao Hàng</span></h3>
                    <div role="tab" id="headingTwo" class="d-flex">
                        <h4 class="panel-title m-1">
                            <a class="collapsed btn btn-theme" data-toggle="collapse" data-parent="#accordion"
                                href="#addAddress" aria-expanded="false" aria-controls="collapseTwo">
                                <span class="text-white">Thêm Địa Chỉ Giao Hàng</span> <i
                                    class="fas fa-plus-circle text-success ms-1"></i>
                            </a>
                        </h4>

                        <h4 class="panel-title m-1">
                            <a class="collapsed btn btn-theme" data-toggle="collapse" data-parent="#accordion"
                                href="#listAddress" aria-expanded="false" aria-controls="collapseTwo">
                                <span class="text-white">Danh Sách Địa Chỉ</span> <i class="fas fa-location-dot ms-1"
                                    style="color: #ff5733;"></i>
                            </a>
                        </h4>
                    </div>
                    <div id="addAddress" class="collapse" role="tabpanel" aria-labelledby="heading2" aria-expanded="false">
                        <form action="{{ route('locations.store') }}" method="POST" class="mt-2">
                            @csrf
                            <h3 class="block-title"><span>Thêm Địa Chỉ Giao Hàng</span></h3>
                            <div class="row mt-3">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <input class="form-control" type="text" name="HoTen" placeholder="Họ Và Tên"
                                            value="{{ old('HoTen') }}">
                                        @error('HoTen')
                                        <span class="text-danger">{{ $message }}</span>
                                        @enderror
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <input class="form-control" type="text" name="SoDienThoai"
                                            placeholder="Số Điện Thoại" value="{{ old('SoDienThoai') }}">
                                        @error('SoDienThoai')
                                        <span class="text-danger">{{ $message }}</span>
                                        @enderror
                                    </div>
                                </div>
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <input class="form-control" type="text" name="DiaChi"
                                            placeholder="Tên Đường, Tòa Nhà, Số Nhà,..." value="{{ old('DiaChi') }}">
                                        @error('DiaChi')
                                        <span class="text-danger">{{ $message }}</span>
                                        @enderror
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="form-group selectpicker-wrapper">
                                        <select class="selectpicker input-price" name="Tinh" id="tinhThanh"
                                            onchange="chonTinhThanh()" data-live-search="true" data-width="100%"
                                            data-toggle="tooltip" title="Chọn Tỉnh Thành">
                                            <option value="">Tỉnh Thành</option>
                                            @foreach ($danhSachTinhThanh as $tinhThanh)
                                            <option value="{{ $tinhThanh->IdTinh }}">{{ $tinhThanh->TenThanhPho }}</option>
                                            @endforeach
                                        </select>
                                        @error('Tinh')
                                        <span class="text-danger">{{ $message }}</span>
                                        @enderror
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <select class="form-control" name="Huyen" id="huyen" onchange="chonHuyen()">
                                            <option value="">Quận / Huyện</option>
                                        </select>
                                        @error('Huyen')
                                        <span class="text-danger">{{ $message }}</span>
                                        @enderror
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <select class="form-control" name="Xa" id="xaPhuong">
                                            <option value="">Xã / Phường</option>
                                        </select>
                                        @error('Xa')
                                        <span class="text-danger">{{ $message }}</span>
                                        @enderror
                                    </div>
                                </div>
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <select class="form-control" name="MacDinh" id="macDinh">
                                            <option value="1">Đặt Làm Địa Chỉ Mặc Định</option>
                                            <option value="0">Không Đặt Làm Địa Chỉ Mặc Định</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="col-md-12 text-end mb-3">
                                    <button type="submit" class="btn btn-theme btn-theme-dark">Thêm Ngay</button>
                                </div>
                            </div>
                        </form>
                    </div>

                    <div id="listAddress" class="collapse in" role="tabpanel" aria-labelledby="heading2"
                        aria-expanded="false">
                        <h3 class="block-title mt-2"><span>Danh Sách Địa Chỉ</span></h3>

                        <div class="list-address">
                            @foreach ($danhSachDiaChimacDinh as $diaChi)
                            @php
                            $thongTinHuyenTinh = DB::table("tinh_thanh")->where("IdTinh", $diaChi->Tinh)->first();
                            $thongTinHuyen = DB::table("huyen")->where("MaHuyen", $diaChi->Huyen)->first();
                            @endphp
                            <div class="item-location {{ ($diaChi->MacDinh == 1 ? "active" : "") }}"
                                onclick="document.getElementById('inputLocation_{{ $diaChi->id }}').click()"
                                data-id="{{ $diaChi->id }}">
                                <i class="fas fa-location-dot"></i>
                                <i class="fas fa-check color-theme"></i>
                                <label for="inputLocation_{{ $diaChi->id }}">
                                    <div class="name" style="font-weight: bold; color: #333; font-size: 16px;">
                                        <span>{{ $diaChi->HoTen }}</span>
                                        <small
                                            style="color: #666; font-size: 14px; margin-left: 5px;">{{ $diaChi->SoDienThoai }}</small>
                                    </div>
                                    <div class="location" style="color: #555; font-size: 14px;">
                                        <span>{{ $diaChi->DiaChi }}</span><br>
                                        <span>{{ $diaChi->Xa }}, {{ $thongTinHuyen->TenHuyen }},
                                            {{ $thongTinHuyenTinh->TenThanhPho }}</span>
                                    </div>
                                </label>
                                <div class="icon-right" style="display: flex;">
                                    <form action="{{ route('locations.destroy', $diaChi->id) }}" method="POST"
                                        onsubmit="return confirm('Bạn Chắc Chắn Muốn Xóa Địa Chỉ Này?')" class="d-inline">
                                        @csrf
                                        @method("DELETE")
                                        <button type="submit" class="btn btn-none"><i class="fas fa-times"
                                                style="color: #999; font-size: 16px;"></i></button>
                                    </form>
                                </div>
                            </div>
                            @endforeach
                        </div>
                    </div>
                    @endif
                    <form action="{{ route("payment.store", $orderCode) }}" method="POST">
                        @csrf
                        @foreach ($danhSachDiaChimacDinh as $diaChiInput)
                        @php
                        $thongTinHuyenTinh = DB::table("tinh_thanh")->where("IdTinh", $diaChiInput->Tinh)->first();
                        $thongTinHuyen = DB::table("huyen")->where("MaHuyen", $diaChiInput->Huyen)->first();
                        @endphp
                        <input type="radio" class="d-none" name="location" id="inputLocation_{{ $diaChiInput->id }}"
                            value="{{ $diaChiInput->id }}" {{ ($diaChiInput->MacDinh == 1 ? "checked" : "") }}
                            onchange="checkLocation(this)">
                        @endforeach
                        <br>
                        <h3 class="block-title"><span>Mã Giảm Giá</span></h3>
                        <div class="form-group">
                            <input class="form-control" placeholder="Nhập Mã Giảm Giá" name="voucher"
                                value="{{ old("voucher") }}" onchange="checkVoucher(this)">
                            @if(session('voucher_error'))
                            <small class="text-danger">{{ session('voucher_error') }}</small>
                            @endif
                        </div>

                        <div class="form-group">
                            <textarea class="form-control" placeholder="Lời Nhắn Cho Shop" name="message"
                                rows="4">{{ old("message") }}</textarea>
                        </div>
                        <br>
                        <h3 class="block-title"><span>Phương Thức Thanh Toán</span></h3>
                        <ul class="list-method-payment">
                            <li>
                                <label for="shipCod" class="item-method active" onclick="chonPhuongThucThanhToan('shipCod')" id="shipCod-button">
                                    <img src="/clients/images/LOGO/cod.png"
                                        alt="">
                                    <input type="radio" id="shipCod" name="method" value="COD" checked>
                                </label>
                                <span>Thanh Toán Khi Nhận Hàng</span>
                            </li>

                            <li>
                                <label for="banking" class="item-method" onclick="chonPhuongThucThanhToan('banking')" id="banking-button">
                                    <img src="/clients/images/LOGO/banking.webp" alt="">
                                    <input type="radio" id="banking" name="method" value="Banking">
                                </label>
                                <span>Thanh Toán Ngân Hàng</span>
                            </li>

                            <!-- <li class="item-method" onclick="chonPhuongThucThanhToan('momo')" id="momo-button">
                                <label for="momo">
                                    <img src="/clients/images/LOGO/momo.webp"
                                        alt="">
                                    <input type="radio" id="momo" name="method" value="Momo">
                                </label>
                                <span>Thanh Toán Ví Momo</span>
                            </li> -->
                        </ul>
                        <br>
                        <h3 class="block-title"><span>Chi Tiết Thanh Toán</span></h3>
                        <div class="shopping-cart">
                            <table>
                                <tr>
                                    <td style="text-align: start">Tổng Tiền Hàng:</td>
                                    <td style="text-align: end; font-weight: bold">
                                        {{ number_format($tongTienSanPhamDaChon) }} VND
                                    </td>
                                </tr>
                                <tr>
                                    <td style="text-align: start">Tổng Tiền Phí Vận Chuyển:</td>
                                    <td style="text-align: end; font-weight: bold">0 VND</td>
                                </tr>
                                <tr>
                                    <td style="text-align: start">Giảm Giá Tiền Hàng:</td>
                                    <td style="text-align: end; font-weight: bold" id="discountForm">0 VND</td>
                                </tr>
                                <tfoot>
                                    <tr>
                                        <td colspan="2" style="padding: 5px 0px; margin: 0px">Tổng Thanh Toán:
                                            <span id="total_price">{{ number_format($tongTienSauGiam) }}</span> VND
                                        </td>
                                    </tr>
                                </tfoot>
                            </table>
                        </div>
                        <div class="text-end mt-3">
                            <button type="submit" class="btn btn-theme btn-theme-dark" @if (!Auth::check()) disabled
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
        function checkVoucher(e) {
            let selectedCartIds = getSelectedCartIds();

            localStorage.setItem('list_id_cart', JSON.stringify(selectedCartIds));

            var voucher = e.value;

            if (voucher || voucher !== null) {
                fetch("<?= route('api.client'); ?>", {
                        method: "POST",
                        headers: {
                            "Content-Type": "application/json",
                            "X-CSRF-TOKEN": document.querySelector('meta[name="csrf-token"]').content
                        },
                        body: JSON.stringify({
                            type: "check_voucher",
                            voucher: voucher,
                            cart_id_list: selectedCartIds
                        })
                    })
                    .then(response => response.json())
                    .then(data => {
                        if (data.status === "success") {
                            document.getElementById("discountForm").innerHTML = data.discount.toString().replace(/\B(?=(\d{3})+(?!\d))/g, ",") + " VND";
                            document.getElementById("total_price").innerHTML = data.total_price.toString().replace(/\B(?=(\d{3})+(?!\d))/g, ",") + " VND";
                            AlertDATN("success", data.message);
                        } else {
                            AlertDATN("error", data.message);
                            document.getElementById("discountForm").innerHTML = "0 VND";
                        }
                    })
                    .catch(error => {
                        AlertDATN("error", "Đã xảy ra lỗi, vui lòng thử lại.");
                    });
            }
        }

        function getSelectedCartIds() {
            return JSON.parse(localStorage.getItem('list_id_cart')) || [];
        }

        function disableEditMode(id) {
            document.getElementById(`edit-${id}`).classList.remove('active');
            document.getElementById(`view-${id}`).style.display = 'flex';
        }

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
                        let option = new Option(ward.name, ward.name);
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

        function checkLocation(radio) {
            document.querySelectorAll('.item-location.active').forEach(el => {
                el.classList.remove('active');
            });

            const item = document.querySelector(`.item-location[data-id='${radio.value}']`);
            if (item) {
                item.classList.add('active');
            }
        }
    </script>
    @endsection