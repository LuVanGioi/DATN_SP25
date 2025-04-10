@extends("admins.themes")

@section("titleHead")
<title>Sửa FAQ - ADMIN</title>
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
        <div class="card">
            <div class="card-header">
                <h5>SỬA FQA</h5>
            </div>
            <div class="card-body">
                <form action="{{ route("FAQ.update", $thongTinLienKet->id) }}" method="POST">
                    @csrf
                    @method("PUT")
                    <div class="row">
                        <div class="col">
                            <div class="mb-3">
                                <label>Tiêu Đề</label>
                                <input class="form-control @error(" TieuDe") is-invalid border-danger @enderror" type="text" name="TieuDe" placeholder="Câu hỏi" value="{{ $thongTinLienKet->TieuDe }}" required>
                                @error("TieuDe")
                                <p class="text-danger">{{ $message }}</p>
                                @enderror
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col">
                            <div class="mb-3">
                                <label>Nội Dung</label>
                                <textarea name="NoiDung" class="note-DATN">{{ $thongTinLienKet->NoiDung }}</textarea>
                            </div>
                        </div>
                    </div>
                    <button type="submit" class="btn btn-sm btn-primary">Cập nhật</button>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection