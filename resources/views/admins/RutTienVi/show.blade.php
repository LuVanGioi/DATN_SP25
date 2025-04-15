@extends("admins.themes")

@section("titleHead")
<title>Thông Tin Yêu Cầu Rút Tiền - ADMIN</title>
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
        <div class="row">
            <div class="col-md-6">
                <div class="card">
                    <div class="card-header">
                        <h5>Thông Tin</h5>
                    </div>
                    <div class="card-body">
                        <p><strong>Mã Giao Dịch :</strong> {{ $danhSach->MaGiaoDich }}</p>
                        <p><strong>Tiêu Đề :</strong> {{ $danhSach->TieuDe }}</p>
                        <p><strong>Tài Khoản :</strong> {{ DB::table("users")->find($danhSach->ID_User)->email }}</p>
                        <p><strong>Số Tiền :</strong> ₫{{ number_format($danhSach->SoTien) }}</p>
                        <p><strong>Trạng Thái :</strong> @if ($danhSach->TrangThai == "thanhcong")
                            <span class="badge bg-success">Thành Công</span>
                            @elseif ($danhSach->TrangThai == "dangxuly")
                            <span class="badge bg-warning">Chờ Xử Lý</span>
                            @elseif ($danhSach->TrangThai == "thatbai")
                            <span class="badge bg-danger">Thất Bại</span>
                            @else
                            <span class="badge bg-danger">Khác</span>
                            @endif
                        </p>
                        <p><strong>Thời Gian Tạo :</strong> {{ $danhSach->created_at }}</p>
                        @if ($danhSach->TrangThai == "thanhcong")
                        <p><strong>Thời Gian Hoàn Thành :</strong> {{ ($danhSach->updated_at ?? "...") }}</p>
                        @endif
                        @if ($danhSach->TrangThai == "thatbai")
                        <p><strong>Lý Do :</strong> {{ $danhSach->LiDoThatBai }}</p>
                        @endif
                    </div>
                </div>

                <div class="card">
                    <div class="card-header">
                        <h5>Thông Tin Rút Tiền</h5>
                    </div>
                    <div class="card-body">
                        <p><strong>Số Tiền :</strong> ₫{{ number_format($danhSach->SoTien) }}</p>
                        <p><strong>Ngân Hàng :</strong> {{ DB::table("ngan_hang")->where("bin", $danhSach->banking)->first()->shortName }} - {{ DB::table("ngan_hang")->where("bin", $danhSach->banking)->first()->name }}</p>
                        <p><strong>Tên Tài Khoản :</strong> {{ $danhSach->namebank }}</p>
                        <p><strong>Số Tài Khoản :</strong> {{ $danhSach->numberBank }}</p>
                    </div>
                </div>
            </div>

            <div class="col-md-6">
                <div class="card">
                    <div class="card-body">
                        <form action="{{ route("RutTienVi.update", $danhSach->id) }}" method="POST">
                            @csrf
                            @method("PUT")
                            <div class="form-group">
                                <label class="form-label">Trạng Thái</label>
                                <select name="TrangThai" id="TrangThai" class="form-control" onclick="checkStatus()">
                                    <option value=""> -- Chọn Trạng Thái Đơn --</option>
                                    <option value="thanhcong" {{ ($danhSach->TrangThai == "thanhcong" ? "selected" : "") }}>Thành Công</option>
                                    <option value="thatbai" {{ ($danhSach->TrangThai == "thatbai" ? "selected" : "") }}>Thất Bại</option>
                                </select>
                            </div>

                            <div class="form-group" style="display: <?=($danhSach->TrangThai == "thatbai" ? "block" : "none");?>;" id="LiDoThatBai">
                                <label class="form-label">Lý Do Thất Bại</label>
                                <textarea name="LiDoThatBai" class="form-control" row="5" placeholder="Lý Do Rút Tiền Thất Bại">{{ $danhSach->LiDoThatBai }}</textarea>
                            </div>

                            <div class="form-group">
                                <button type="submit" class="btn w-100 btn-primary">Xác Nhận</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

@section("js")
<script>
    function checkStatus() {
        var TrangThai = document.getElementById("TrangThai").value;
        if(TrangThai == "thatbai") {
            document.getElementById("LiDoThatBai").style.display = "block";
        } else {
            document.getElementById("LiDoThatBai").style.display = "none";
        }
    }
</script>
@endsection