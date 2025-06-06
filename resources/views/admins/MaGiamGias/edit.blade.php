@extends("admins.themes")

@section("titleHead")
    <title>Sửa Mã Giảm Giá - ADMIN</title>
@endsection
@section("main")
<div class="page-body">
    <div class="container-fluid pt-3">
        <div class="row">
            <div class="col-md-8 col-lg-6">
                <div class="card shadow-sm">
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
                                <label for="name">Mã Code</label>
                                <input class="form-control @error('name') is-invalid border-danger @enderror" type="text" id="name" name="name" placeholder="Nhập Mã Code" value="{{ old('name', $maGiamGia->name) }}" required>
                                @error('name')
                                <p class="text-danger">{{ $message }}</p>
                                @enderror
                            </div>
    
                            <div class="mb-3">
                                <label for="quantity">Số Lượng</label>
                                <input class="form-control @error('quantity') is-invalid border-danger @enderror" type="number" id="quantity" name="quantity" placeholder="Số Lượng" value="{{ old('quantity', $maGiamGia->quantity) }}" required>
                                @error('quantity')
                                <p class="text-danger">{{ $message }}</p>
                                @enderror
                            </div>
    
                            <div class="mb-3">
                                <label for="value">Giá Trị (%)</label>
                                <input class="form-control @error('value') is-invalid border-danger @enderror" type="number" id="value" name="value" placeholder="Giá Trị (%)" value="{{ old('value', $maGiamGia->value) }}" required>
                                @error('value')
                                <p class="text-danger">{{ $message }}</p>
                                @enderror
                            </div>

                            <div class="mb-3">
                                <label for="max_value">Giá Trị Giảm Giá Tối Đa</label>
                                <input class="form-control @error('max_value') is-invalid border-danger @enderror" type="number" id="max_value" name="max_value" placeholder="Giá Trị Giảm Giá Tối Đa" value="{{ old('max_value', $maGiamGia->max_value) }}" required>
                                @error('max_value')
                                <p class="text-danger">{{ $message }}</p>
                                @enderror
                            </div>
    
                            <div class="mb-3">
                                <label for="min_value">Giá Trị Đơn Hàng Tối Thiểu (VNĐ)</label>
                                <input class="form-control @error('min_value') is-invalid border-danger @enderror" type="number" id="min_value" name="min_value" placeholder="Giá Trị Đơn Hàng Tối Thiểu" value="{{ old('min_value', $maGiamGia->min_value) }}" required>
                                @error('min_value')
                                <p class="text-danger">{{ $message }}</p>
                                @enderror
                            </div>
    
                            <div class="mb-3">
                                <label for="condition">Tiêu Đề</label>
                                <input class="form-control @error('condition') is-invalid border-danger @enderror" type="text" id="condition" name="condition" placeholder="Tiêu Đề" value="{{ old('condition', $maGiamGia->condition) }}" required>
                                @error('condition')
                                <p class="text-danger">{{ $message }}</p>
                                @enderror
                            </div>
    
                            <div class="mb-3">
                                <label for="start_date">Ngày Bắt Đầu</label>
                                <input class="form-control @error('start_date') is-invalid border-danger @enderror" type="date" id="start_date" name="start_date" value="{{ old('start_date', $maGiamGia->start_date) }}" required>
                                @error('start_date')
                                <p class="text-danger">{{ $message }}</p>
                                @enderror
                            </div>
    
                            <div class="mb-3">
                                <label for="end_date">Ngày Kết Thúc</label>
                                <input class="form-control @error('end_date') is-invalid border-danger @enderror" type="date" id="end_date" name="end_date" value="{{ old('end_date', $maGiamGia->end_date) }}" required>
                                @error('end_date')
                                <p class="text-danger">{{ $message }}</p>
                                @enderror
                            </div>
    
                            <div class="mb-3">
                                <label for="status">Trạng Thái</label>
                                <select class="form-select @error('status') is-invalid border-danger @enderror" id="status" name="status" required>
                                    <option value="on" {{ old('status', $maGiamGia->status) == 'on' ? 'selected' : '' }}>Hoạt động</option>
                                    <option value="off" {{ old('status', $maGiamGia->status) == 'off' ? 'selected' : '' }}>Ngừng hoạt động</option>
                                </select>
                                @error('status')
                                <p class="text-danger">{{ $message }}</p>
                                @enderror
                            </div>
    
                            <div class="text-end">
                                <button type="submit" class="btn btn-primary">Cập Nhật</button>
                                <a href="{{ route('maGiamGias.index') }}" class="btn btn-secondary">Quay Lại</a>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection