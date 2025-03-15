@extends('admins.themes')

@section('main')
    <div class="page-body">
        <div class="container-fluid pt-3">
            <div class="card">
                <div class="card-header">
                    <h5>Chi Tiết Phản Hồi</h5>
                </div>
                <div class="card-body">
                    <p><strong>ID:</strong> {{ $phanHoi->id }}</p>
                    <p><strong>ID Bình Luận:</strong> {{ $phanHoi->id_binh_luan }}</p>
                    <p><strong>ID Tài Khoản:</strong> {{ $phanHoi->id_users }}</p>
                    <p><strong>Nội Dung:</strong> {{ $phanHoi->noi_dung }}</p>
                    <p><strong>Ngày Phản Hồi:</strong> {{ date('d/m/Y', strtotime($phanHoi->ngay_phan_hoi)) }}</p>
                    <p><strong>Trạng Thái:</strong> {{ $phanHoi->duyet ? 'Đã duyệt' : 'Chưa duyệt' }}</p>
                    <a href="{{ route('binhluan.index') }}" class="btn btn-secondary">Quay lại</a>
                </div>
            </div>
        </div>
    </div>
@endsection