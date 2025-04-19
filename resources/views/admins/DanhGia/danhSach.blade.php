@extends("admins.themes")

@section("titleHead")
    <title>Danh Sách Đánh Giá - ADMIN</title>
@endsection

@section('main')
<div class="page-body">
    <div class="container-fluid pt-3">
        <div class="card">
            <div class="card-header d-flex justify-content-between align-items-center">
                <h5>Danh Sách Đánh Giá</h5>
                <a href="{{ url()->previous() }}" class="btn btn-secondary btn-sm">Quay lại</a>
            </div>
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table table-striped table-bordered nowrap">
                        <thead>
                            <tr>
                                <th>#</th>
                                <th>Tên Người Dùng</th>
                                <th>Tên Sản Phẩm</th>
                                <th>Nội Dung</th>
                                <th>Ngày Đánh Giá</th>
                                <th>Trả Lời</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($danhGias as $index => $danhGia)
                            <tr>
                                <td>{{ $index + 1 }}</td>
                                <td>{{ $danhGia->user_name }}</td>
                                <td>{{ $danhGia->TenSanPham }}</td>
                                <td>{{ $danhGia->noi_dung }}</td>
                                <td>{{ date('d/m/Y H:i', strtotime($danhGia->ngay_danh_gia)) }}</td>
                                <td>
                                    @if ($danhGia->tra_loi)
                                        <p>{{ $danhGia->tra_loi }}</p>
                                    @else
                                        <form action="{{ route('DanhGia.reply', $danhGia->id) }}" method="POST">
                                            @csrf
                                            <textarea name="tra_loi" class="form-control" rows="2" placeholder="Nhập câu trả lời"></textarea>
                                            <button type="submit" class="btn btn-primary btn-sm mt-2">Trả Lời</button>
                                        </form>
                                    @endif
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection