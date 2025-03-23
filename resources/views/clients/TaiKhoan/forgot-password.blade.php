@extends("clients.themes")

@section("title")
<title>Quên Mật Khẩu - WD-14</title>
@endsection

@section('main')
<section class="page-section">
    <div class="container">
        <h3>Quên Mật Khẩu</h3>
        <form action="{{ route("forgot-password-send") }}" method="POST">
            @csrf
            <div class="form-group">
                <label>Email của bạn:</label>
                <input type="email" name="email" class="form-control" required>
                @error('email') <p class="text-danger">{{ $message }}</p> @enderror
            </div>
            <button type="submit" class="btn btn-primary">Gửi Email Đặt Lại Mật Khẩu</button>
        </form>
    </div>
</section>
@endsection
