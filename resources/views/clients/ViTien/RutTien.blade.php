@extends("clients.themes")

@section("title")
<title>Rút Tiền Ví - {{ $caiDatWebsite->TenCuaHang }}</title>
@endsection

@section('main')
<section class="page-section">
    <div class="wrap container">
        <div class="row">
            <div class="col-md-7">
                <div class="card">
                    <div class="card-body">
                        <form submit-ajax="true" action="{{ route("vi.RutTienApi") }}" method="POST" time_load="0" swal_success="" type="POST">
                            <input type="hidden" name="_token" value="{{ csrf_token() }}">
                            <input type="hidden" name="action" id="actionField" value="">
                            <div class="form-group">
                                <label class="form-label">Số Tiền Cần Rút :</label>
                                <input required type="number" name="money" id="money" class="form-control" min="10000"
                                    onkeyup="totalMoney()" placeholder="Nhập số tiền cần rút">
                            </div>

                            <div class="form-group mt-3">
                                <div class="row">
                                    <div class="col-md-4">
                                        <div class="card cusor-pointer" onclick="inputMoney(100000)">
                                            <div class="p-2 text-center">
                                                <b>100.000</b>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="card cusor-pointer">
                                            <div class="p-2 text-center" onclick="inputMoney(200000)">
                                                <b>200.000</b>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="card cusor-pointer" onclick="inputMoney(500000)">
                                            <div class="p-2 text-center">
                                                <b>500.000</b>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="form-group">
                                <label class="form-label">Ngân Hàng :</label>
                                <select name="banking" id="exampleSelect1" class="selectpicker input-price" data-live-search="true" data-width="100%" data-toggle="tooltip" title="Select">
                                    <option value="">-- Ngân Hàng Nhận Tiền --</option>
                                    @foreach ($nganHang as $nh)
                                    <option value="{{ $nh->bin }}" {{ Auth::user()->banking == $nh->bin ? "selected" : "" }}>{{ $nh->shortName }} - {{ $nh->name }}</option>
                                    @endforeach
                                </select>
                            </div>

                            <div class="form-group">
                                <label class="form-label">Tên Tài Khoản :</label>
                                <input required type="text" name="nameBank" class="form-control" placeholder="Nhập tên chủ tài khoản" value="{{ Auth::user()->nameBank }}">
                            </div>

                            <div class="form-group">
                                <label class="form-label">Số Tài Khoản :</label>
                                <input required type="text" name="numberBank" class="form-control" placeholder="Nhập số tài khoản nhận tiền" value="{{ Auth::user()->numberBank }}">
                            </div>

                            <div class="form-group">
                                <label class="form-label">Mật Khẩu Tài Khoản Website:</label>
                                <input required type="password" name="password" class="form-control" placeholder="******">
                            </div>

                            <label for="saveInfo">
                                <input type="checkbox" id="saveInfo" name="saveInfo" value="on"> <span>Lưu Thông Tin Tài Khoản Ngân Hàng Thành Mặc Định</span>
                            </label>

                            <div class="d-flex justify-between mt-1">
                                <div class="w-100">
                                    <button onclick="history.back();" class="btn btn-dark w-100">Quay Lại</button>
                                </div>
                                <div class="w-100">
                                    <button class="btn btn-primary w-100" type="submit" data-action="withdraw">Rút Ngay</button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>

            <div class="col-md-5">
                <div class="row m-0">
                    <div class="col-md-12" style="margin-top: 0px !important;">
                        <div class="card">
                            <div class="card-body text-center">
                                <h1 class="text-success" id="soDuVi">{{ number_format(Auth::user()->price) }}đ</h1>
                                <h5>Số Dư Ví Hiện Tại</h5>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-6" style="margin-top: 0px !important;">
                        <a href="{{ route("vi.NapTien") }}">
                            <div class="wallet-DATN withdraw">
                                <div class="img"><img src="/clients/images/icon/wallet-add.png" alt=""></div>
                                <span>Nạp Tiền</span>
                            </div>
                        </a>
                    </div>

                    <div class="col-md-6" style="margin-top: 0px !important;">
                        <a href="{{ route("vi.LichSu") }}">
                            <div class="wallet-DATN withdraw">
                                <div class="img"><img src="/clients/images/icon/wallet-history.png" alt=""></div>
                                <span>Lịch Sử Giao Dịch</span>
                            </div>
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>
    </div>
</section>
@endsection

@section("js")
<script src="https://cdnjs.cloudflare.com/ajax/libs/qrcodejs/1.0.0/qrcode.min.js"></script>
<script>
    function inputMoney(money) {
        document.getElementById("money").value = money;
        document.getElementById("soTienNap").innerText = "₫" + money.toString().replace(/\B(?=(\d{3})+(?!\d))/g, ",");
        document.getElementById("tongTien").innerText = "₫" + money.toString().replace(/\B(?=(\d{3})+(?!\d))/g, ",");
    }

    function totalMoney() {
        var soTien = document.getElementById("money").value;
        document.getElementById("soTienNap").innerText = "₫" + soTien.toString().replace(/\B(?=(\d{3})+(?!\d))/g, ",");
        document.getElementById("tongTien").innerText = "₫" + soTien.toString().replace(/\B(?=(\d{3})+(?!\d))/g, ",");
    }

    function createQr() {
        document.getElementById("maQrNapTien").innerHTML = "";
        $.ajax({
            url: "{{ route('vi.TaoQr') }}",
            type: "POST",
            data: {
                _token: "{{ csrf_token() }}",
                money: document.getElementById("money").value
            },
            success: function(data) {
                if (data.status == "success") {
                    AlertDATN("success", data.message);
                    document.getElementById("maQrNapTien").innerHTML = "<span class='text-danger'>Vui Lòng Quét Mã Bên Dưới Để Nạp Tiền</span>";
                    new QRCode(document.getElementById("maQrNapTien"), {
                        text: data.qrCode,
                        width: 256,
                        height: 256
                    });
                }

                if (data.status == "error") {
                    AlertDATN("error", data.message);
                }
            },
            error: function(error) {
                let errorMessage = "Có lỗi xảy ra!";
                AlertDATN(errorMessage);
            }
        });
    }
</script>
@endsection