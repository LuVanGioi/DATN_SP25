@extends("admins.themes")

@section("titleHead")
    <title>Sửa Mã Giảm Giá - ADMIN</title>
@endsection

@section("main")
<div class="page-body">
    <div class="container-fluid pt-3">
        <div class="card">
            <div class="card-header">
                <h5>SỬA MÃ GIẢM GIÁ</h5>
            </div>
            <div class="card-body">
                @if(session('success'))
                    <div class="alert alert-success">
                        {{ session('success') }}
                    </div>
                @endif

                <form action="{{ route('maGiamGias.update', $maGiamGia->id) }}" method="POST">
                    @csrf
                    @method('PUT')
                    <div class="mb-3">
                        <label for="name" class="form-label">Tên Mã</label>
                        <input type="text" class="form-control" id="name" name="name" value="{{ old('name', $maGiamGia->name) }}" required>
                    </div>
                    <div class="mb-3">
                        <label for="value" class="form-label">Giá Trị (%)</label>
                        <input type="number" class="form-control" id="value" name="value" value="{{ old('value', $maGiamGia->value) }}" required>
                    </div>
                    <div class="mb-3">
                        <label for="min_value" class="form-label">Giá Trị Tối Thiểu (VNĐ)</label>
                        <input type="number" class="form-control" id="min_value" name="min_value" value="{{ old('min_value', $maGiamGia->min_value) }}" required>
                    </div>
                    <div class="mb-3">
                        <label for="max_value" class="form-label">Giá Trị Tối Đa (VNĐ)</label>
                        <input type="number" class="form-control" id="max_value" name="max_value" value="{{ old('max_value', $maGiamGia->max_value) }}" required>
                    </div>
                    <div class="mb-3">
                        <label for="condition" class="form-label">Điều Kiện</label>
                        <input type="text" class="form-control" id="condition" name="condition" value="{{ old('condition', $maGiamGia->condition) }}" required>
                    </div>
                    <div class="mb-3">
                        <label for="start_date" class="form-label">Ngày Bắt Đầu</label>
                        <input type="date" class="form-control" id="start_date" name="start_date" value="{{ old('start_date', $maGiamGia->start_date) }}" required>
                    </div>
                    <div class="mb-3">
                        <label for="end_date" class="form-label">Ngày Kết Thúc</label>
                        <input type="date" class="form-control" id="end_date" name="end_date" value="{{ old('end_date', $maGiamGia->end_date) }}" required>
                    </div>
                    <div class="mb-3">
                        <label for="status" class="form-label">Trạng Thái</label>
                        <select class="form-control" id="status" name="status" required>
                            <option value="Hoạt động" {{ old('status', $maGiamGia->status) == 'Hoạt động' ? 'selected' : '' }}>Hoạt động</option>
                            <option value="Ngừng hoạt động" {{ old('status', $maGiamGia->status) == 'Ngừng hoạt động' ? 'selected' : '' }}>Ngừng hoạt động</option>
                        </select>
                    </div>
                    <button type="submit" class="btn btn-primary">Cập Nhật</button>
                    <a href="{{ route('maGiamGias.index') }}" class="btn btn-secondary">Hủy</a>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection