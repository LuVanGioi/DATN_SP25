@extends('admins.themes')

@section('main')
    <div class="page-body">
        <div class="container-fluid pt-3">
            <div class="card">
                <div class="card-header">
                    <h5>Sửa Phản Hồi</h5>
                </div>
                <div class="card-body">
                    <form action="{{ route('phanhoi.update', $phanHoi->id) }}" method="POST">
                        @csrf
                        @method('PUT')
                        <div class="form-group">
                            <label for="noi_dung">Nội Dung</label>
                            <textarea name="noi_dung" id="noi_dung" class="form-control" rows="5">{{ $phanHoi->noi_dung }}</textarea>
                        </div>
                        <button type="submit" class="btn btn-primary mt-3">Cập Nhật</button>
                        <a href="{{ route('binhluan.index') }}" class="btn btn-secondary mt-3">Hủy</a>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection