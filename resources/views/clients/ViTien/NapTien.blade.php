@extends("clients.themes")

@section("title")
    <title>Nạp Tiền Vào Ví - {{ $caiDatWebsite->TenCuaHang }}</title>
@endsection

@section('main')
    <section class="page-section">
        <div class="wrap container">
            <div class="row">
                <div class="col-md-7">
                    <div class="card">
                        <div class="card-body">
                            <div class="form-group">
                                <label class="form-label">Số Tiền Nạp :</label>
                                <input required type="number" name="money" id="money" class="form-control" min="10000"
                                    onkeyup="totalMoney()" placeholder="Nhập số tiền cần nạp">
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
                        </div>
                    </div>

                    <div class="card">
                        <div class="card-body">
                            <div class="d-flex justify-between">
                                <span>Số tiền nạp</span>
                                <span style="font-size: 14px;" id="soTienNap">₫0</span>
                            </div>
                            <div class="d-flex justify-between">
                                <span>Tổng nạp</span>
                                <span style="font-size: 18px; font-weight: bold" id="tongTien">₫0</span>
                            </div>
                        </div>
                    </div>

                    <div class="row m-0">
                        <div class="col-md-6">
                            <a href="/vi" class="btn btn-dark">Quay Lại</a>
                        </div>
                        <div class="col-md-6 text-end">
                            <button class="btn btn-primary" onclick="createQr()">Tạo Mã QR</button>
                        </div>
                    </div>

                    <center>
                        <div id="maQrNapTien"></div>
                    </center>
                </div>

                <div class="col-md-5">
                    <div class="row m-0">
                        <div class="col-md-12" style="margin-top: 0px !important;">
                            <div class="card">
                                <div class="card-body text-center">
                                    <h1 class="text-success">{{ number_format(Auth::user()->price) }}đ</h1>
                                    <h5>Số Dư Ví Hiện Tại</h5>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6" style="margin-top: 0px !important;">
                            <a href="{{ route("vi.RutTien") }}">
                                <div class="wallet-DATN withdraw">
                                    <div class="img"><img src="/clients/images/icon/wallet-withdraw.png" alt=""></div>
                                    <span>Rút Tiền</span>
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
                success: function (data) {
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
                error: function (error) {
                    let errorMessage = "Có lỗi xảy ra!";
                    AlertDATN(errorMessage);
                }
            });
        }
    </script>
@endsection