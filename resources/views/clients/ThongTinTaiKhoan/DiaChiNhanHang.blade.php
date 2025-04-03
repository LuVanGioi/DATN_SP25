@extends("clients.themes")

@section("title")
    <title>Địa Chỉ Nhận Hàng - WD-14</title>
@endsection

@section('main')
    <section class="page-section">
        <div class="wrap container">
            <div class="row">
                <div class="col-lg-9 col-md-9 order-lg-first">
                    <div class="information-title">Địa Chỉ Nhận Hàng</div>
                    <div class="details-wrap">
                        <div class="details-box orders">
                            <button class="btn btn-primary mb-3" onclick="toggleForm('addAddressForm')">+ Thêm Địa
                                Chỉ</button>

                            <table class="table">
                                <thead>
                                    <tr>
                                        <th>Họ Tên</th>
                                        <th>Số Điện Thoại</th>
                                        <th>Địa Chỉ</th>
                                        <th>Xã/Phường</th>
                                        <th>Quận/Huyện</th>
                                        <th>Tỉnh/Thành</th>
                                        <th>Mặc Định</th>
                                        <th>Thao Tác</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach($diaChiNhanHangs as $diaChiNhanHang)
                                        <tr>
                                            <td>{{ $diaChiNhanHang->HoTen }}</td>
                                            <td>{{ $diaChiNhanHang->SoDienThoai }}</td>
                                            <td>{{ $diaChiNhanHang->DiaChi }}</td>
                                            <td>{{ $diaChiNhanHang->Xa }}</td>
                                            <td>{{ $diaChiNhanHang->Huyen }}</td>
                                            <td>{{ $diaChiNhanHang->Tinh }}</td>
                                            <td>
                                                @if($diaChiNhanHang->MacDinh)
                                                    <span class="badge badge-success">Mặc định</span>
                                                @else
                                                    <form action="{{ route('dia-chi-nhan-hang.set-default', $diaChiNhanHang->id) }}"
                                                        method="POST">
                                                        @csrf
                                                        <button type="submit" class="btn btn-sm btn-outline-secondary">Đặt mặc
                                                            định</button>
                                                    </form>
                                                @endif
                                            </td>
                                            <td>
                                                <button class="btn btn-warning"
                                                    onclick="editAddress({{ $diaChiNhanHang->id }})">Cập
                                                    nhật</button>
                                                <form action="{{ route('dia-chi-nhan-hang.destroy', $diaChiNhanHang->id) }}"
                                                    method="POST" style="display:inline;">
                                                    @csrf
                                                    @method('DELETE')
                                                    <button type="submit" class="btn btn-danger"
                                                        onclick="return confirm('Bạn có chắc chắn muốn xóa?')">Xóa</button>
                                                </form>
                                            </td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>

                            <div>
                                <a href="/thong-tin-tai-khoan" class="btn btn-theme"> Quay Lại Tài Khoản </a>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="col-lg-3 col-md-3 order-lg-last">
                    <div class="widget account-details">
                        <h2 class="widget-title">Tài Khoản</h2>
                        <ul>
                            <li><a href="/thong-tin-tai-khoan"> Thông Tin Tài Khoản </a></li>
                            <li><a href="/tai-khoan-cua-toi">Tài Khoản Của Tôi</a></li>
                            <li><a href="/doi-mat-khau">Đổi Mật Khẩu</a></li>
                            <li class="active"><a href="/dia-chi-nhan-hang">Địa Chỉ Nhận Hàng</a></li>
                            <li><a href="/lich-su-don-hang">Lịch Sử Đơn Hàng</a></li>
                            <li><a href="/danh-gia-va-nhan-xet">Đánh Giá và Nhận Xét</a></li>
                            <li><a href="/yeu-cau-tra-hang">Yêu Cầu Trả Hàng</a></li>
                        </ul>
                    </div>
                </div>
            </div>

            <!-- Form Thêm Địa Chỉ -->
            <div id="addAddressForm" class="card p-3 shadow-sm mt-3" style="display: none;">
                <h4>Thêm Địa Chỉ Mới</h4>
                <form action="{{ route('dia-chi-nhan-hang.store') }}" method="POST">
                    @csrf
                    <div class="form-group">
                        <label>Họ Tên</label>
                        <input type="text" name="HoTen" class="form-control" placeholder="Nhập họ tên" required>
                    </div>
                    <div class="form-group">
                        <label>Số Điện Thoại</label>
                        <input type="text" name="SoDienThoai" class="form-control" placeholder="Nhập số điện thoại"
                            required>
                    </div>
                    <div class="form-group">
                        <label>Địa Chỉ</label>
                        <input type="text" name="DiaChi" class="form-control" placeholder="Nhập địa chỉ cụ thể" required>
                    </div>
                    <div class="col-md-4">
                        <div class="form-group selectpicker-wrapper">
                            <select class="selectpicker input-price" name="Tinh" id="tinhThanh" onchange="chonTinhThanh()"
                                data-live-search="true" data-width="100%" data-toggle="tooltip" title="Chọn Tỉnh Thành">
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
                    <div class="form-group">
                        <label>Mặc Định</label>
                        <select class="form-control" name="MacDinh" id="macDinh" required>
                            <option value="0">Không đặt làm địa chỉ mặc định</option>
                            <option value="1">Đặt làm địa chỉ mặc định</option>
                        </select>
                    </div>
                    <button type="submit" class="btn btn-success mt-2">Thêm</button>
                    <button type="button" class="btn btn-secondary mt-2" onclick="toggleForm('addAddressForm')">Quay
                        Lại</button>
                </form>
            </div>

            <!-- Form Cập Nhật Địa Chỉ -->
            <div id="updateAddressForm" class="card p-3 shadow-sm mt-3" style="display: none;">
                <h4>Cập Nhật Địa Chỉ</h4>
                <form id="updateForm" method="POST">
                    @csrf
                    @method('PUT')
                    <div class="form-group">
                        <label>Họ Tên</label>
                        <input type="text" name="HoTen" id="editHoTen" class="form-control" required>
                    </div>
                    <div class="form-group">
                        <label>Số Điện Thoại</label>
                        <input type="text" name="SoDienThoai" id="editSoDienThoai" class="form-control" required>
                    </div>
                    <div class="form-group">
                        <label>Địa Chỉ</label>
                        <input type="text" name="DiaChi" id="editDiaChi" class="form-control" required>
                    </div>
                    <div class="row">
                        <div class="col-md-4">
                            <div class="form-group selectpicker-wrapper">
                                <select class="selectpicker input-price" name="Tinh" id="editTinhThanh"
                                    onchange="chonTinhThanhEdit()" data-live-search="true" data-width="100%"
                                    data-toggle="tooltip" title="Chọn Tỉnh Thành" required>
                                    <option value="">Tỉnh Thành</option>
                                    @foreach ($danhSachTinhThanh as $tinhThanh)
                                        <option value="{{ $tinhThanh->TenThanhPho }}">{{ $tinhThanh->TenThanhPho }}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="form-group">
                                <select class="form-control" name="Huyen" id="editHuyen" onchange="chonHuyenEdit()"
                                    required>
                                    <option value="">Quận / Huyện</option>
                                </select>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="form-group">
                                <select class="form-control" name="Xa" id="editXaPhuong" required>
                                    <option value="">Xã / Phường</option>
                                </select>
                            </div>
                        </div>
                    </div>
                    <div class="form-group">
                        <label>Mặc Định</label>
                        <select class="form-control" name="MacDinh" id="editMacDinh" required>
                            <option value="0">Không đặt làm địa chỉ mặc định</option>
                            <option value="1">Đặt làm địa chỉ mặc định</option>
                        </select>
                    </div>
                    <button type="submit" class="btn btn-primary mt-2">Cập Nhật</button>
                    <button type="button" class="btn btn-secondary mt-2" onclick="toggleForm('updateAddressForm')">Quay
                        Lại</button>
                </form>
            </div>
        </div>
    </section>
@endsection

@section('js')
    <script>
        function toggleForm(formId) {
            let form = document.getElementById(formId);
            if (form.style.display === "none") {
                form.style.display = "block";
            } else {
                form.style.display = "none";
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
    </script>
@endsection