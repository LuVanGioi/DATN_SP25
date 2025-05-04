    @extends("clients.themes")

    @section("title")
    <title>Đơn Hàng Hủy - {{ $caiDatWebsite->TenCuaHang }}</title>
    @endsection

    @section('main')
    <section class="page-section breadcrumbs">
        <div class="container">
            <div class="page-header">
                <h1>HỦY HÀNG</h1>
            </div>
        </div>
    </section>

    <section class="page-section color">
        <div class="container">
            @if(session("error"))
            <div class="alert alert-danger mb-2">{{ session("error") }}</div>
            @endif

            @if(session("success"))
            <div class="alert alert-success mb-2">{{ session("success") }}</div>
            @endif

            <div class="row orders mt-3">
                <div class="col-md-12">
                    <h3 class="block-title mb-3"><span>Đơn Hàng Hủy Của Bạn</span></h3>
                    <form class="row variable" submit-ajax="true" action="{{route('huy-don.store')}}" method="POST" time_load="1500" swal_success="">
                        <input type="hidden" name="_token" value="{{ csrf_token() }}">
                        <input type="hidden" name="id" value="{{ $id }}">
                        <table class="table">
                            <thead>
                                <tr>
                                    <th>Mã Sản Phẩm</th>
                                    <th>Sản Phẩm</th>
                                    <th>Số Lượng</th>
                                    <th>Giá Tiền</th>
                                    <th>Tổng Tiền</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($donHangHuy as $sanPhamDonHang)
                                <tr>
                                    <td class="quantity money">{{ $sanPhamDonHang->MaDonHang }}</td>
                                    <td style="display:flex">
                                        <img src="{{ Storage::url($sanPhamDonHang->HinhAnh) }}" alt="" style="width: 100px; height: 100px" />
                                        <div>
                                            <h4>{{ $sanPhamDonHang->TenSanPham }}</h4>
                                            <span class="parameter-product-cart">{{ $sanPhamDonHang->KichCo }} - {{ $sanPhamDonHang->MauSac }}</span>
                                        </div>
                                    </td>
                                    <td class="quantity money">{{ $sanPhamDonHang->SoLuong }}</td>
                                    @php
                                    $bienthe = DB::table('bien_the_san_pham')
                                    ->where('ID_SanPham', $sanPhamDonHang->idSP)
                                    ->where('ID_MauSac', DB::table('mau_sac')->where('TenMauSac', $sanPhamDonHang->MauSac)->first()->id)
                                    ->where('KichCo', $sanPhamDonHang->KichCo)
                                    ->where('Xoa', 0)
                                    ->first();
                                    @endphp
                                    <td class="quantity money">
                                        @if ($sanPhamDonHang->TheLoai == "thuong")
                                        <span>₫{{ number_format($sanPhamDonHang->GiaSanPham) }}</span>
                                        @else
                                        <span>₫{{ number_format($bienthe->Gia) }}</span>
                                        @endif
                                    </td>

                                    <td class="quantity money">
                                        @if ($sanPhamDonHang->TheLoai == "thuong")
                                        <span>₫{{ number_format($sanPhamDonHang->GiaSanPham * $sanPhamDonHang->SoLuong) }}</span>
                                        @else
                                        <span>₫{{ number_format($bienthe->Gia * $sanPhamDonHang->SoLuong) }}</span>
                                        @endif
                                    </td>
                                </tr>
                                @endforeach
                            </tbody>
                        </table>


                        <div class="form-group mt-4">
                            <label for="ly_do_huy" class="font-weight-bold" style="font-size: 16px">Lý Do Hủy Đơn Hàng <span class="text-danger">*</span></label>
                            <textarea class="form-control @error('ly_do_huy') is-invalid @enderror" name="ly_do_huy"
                                rows="3"
                                placeholder="Vui lòng nhập lý do hủy đơn hàng "></textarea>
                            @error('ly_do_huy')
                            <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="text-right mt-4">
                            <a href="{{ route('lich-su-don-hang.index') }}" class="btn btn-secondary">
                                <i class="fas fa-arrow-left"></i> Quay Lại
                            </a>
                            <button type="submit" class="btn btn-danger" data-action="huydon" onclick="return confirm('Bạn có chắc chắn muốn hủy đơn hàng này?')">
                                <i class="fas fa-times"></i> Xác Nhận Hủy Đơn
                            </button>
                        </div>
                    </form>

                </div>
            </div>
        </div>
    </section>
    @endsection