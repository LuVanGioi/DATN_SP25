@extends('admins.themes')

@section("titleHead")
    <title>Chi Tiết Bình Luận - ADMIN</title>
@endsection

@section('main')
    <div class="page-body">
        <div class="container-fluid pt-3">
            <div class="card">
                <div class="card-header">
                    <h5>Chi Tiết Bình Luận</h5>
                </div>
                <div class="card-body">
                    <p><strong>ID:</strong> {{ $binhLuan->id }}</p>
                    <p><strong>ID Bài Viết:</strong> {{ $binhLuan->id_baiviet }}</p>
                    <p><strong>ID Tài Khoản:</strong> {{ $binhLuan->id_users }}</p>
                    <p><strong>Nội Dung:</strong> {{ $binhLuan->noi_dung }}</p>
                    <p><strong>Ngày Bình Luận:</strong> {{ date('d/m/Y', strtotime($binhLuan->ngay_binh_luan)) }}</p>
                    <p><strong>Trạng Thái:</strong> {{ $binhLuan->duyet ? 'Đã duyệt' : 'Chưa duyệt' }}</p>
                    <a href="{{ route('binhluan.index') }}" class="btn btn-secondary">Quay lại</a>
                </div>
            </div>
        </div>
    </div>
@endsection