@extends("clients.themes")


@section("title")
    <title>Thông tin tài khoản - WD-14</title>
@endsection

@section('main')
    <section class="page-section">
        <div class="wrap container">
            <div class="row">
                <div class="col-lg-9 col-md-9 col-sm-8">
                    <div class="information-title">Thông Tin Tài Khoản Của Bạn</div>
                    <div class="details-wrap">
                        <div class="block-title alt"> <i class="fa fa-angle-down"></i> Thay Đổi Thông Tin Cá Nhân Của Bạn
                        </div>
                        <div class="details-box">
                            <form class="form-delivery" action="{{ route('update-profile') }}" method="POST">
                                @csrf
                                <div class="row">
                                    <div class="row" style="margin-top: 10px;">
                                        <div class="col-md-6">
                                            <label for="name" class="font-weight-bold text-dark mb-2 d-block"
                                                style="margin-left: 15px;">Họ Và
                                                Tên</label>
                                            <div class="form-group">
                                                <input type="text" name="name" id="name" placeholder="Họ Tên"
                                                    class="form-control @error('name') is-invalid @enderror"
                                                    style="width: 395px; margin-left: 14px;"
                                                    value="{{ old('name', $user->name) }}" required>
                                                @error('name')
                                                    <div class="invalid-feedback">{{ $message }}</div>
                                                @enderror
                                            </div>
                                        </div>

                                        <div class="col-md-6">
                                            <label for="email" class="font-weight-bold text-dark mb-2 d-block"
                                                style="margin-left: 15px;">Email</label>
                                            <div class="form-group">
                                                <input type="email" name="email" id="email" placeholder="Email"
                                                    class="form-control  @error('email') is-invalid @enderror"
                                                    style="width: 395px; margin-left: 14px;"
                                                    value="{{ old('email', $user->email) }}" required>
                                                @error('email')
                                                    <div class="invalid-feedback">{{ $message }}</div>
                                                @enderror
                                            </div>
                                        </div>
                                    </div>
                                    {{-- <div class="col-md-6 col-sm-6">
                                        <div class="form-group">
                                            <select name="Gender" id="" class="form-control">
                                                <option value="GioiTinh">Giới Tính</option>
                                                <option value="Nam" {{ old('gender', $user->gender) == 'Nam' ? 'selected' :
                                                    '' }}>Nam</option>
                                                <option value="Nữ" {{ old('gender', $user->gender) == 'Nữ' ? 'selected' : ''
                                                    }}>Nữ</option>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="col-md-6 col-sm-6">
                                        <div class="form-group"> <input type="text" name="phone" placeholder="Số Điện Thoại"
                                                class="form-control" value="{{ old('phone', $user->phone) }}"></div>
                                    </div>
                                    <div class="col-md-6 col-sm-6">
                                        <div class="form-group"> <input type="text" name="address" placeholder="Địa Chỉ"
                                                class="form-control" value="{{ old('address', $user->address) }}"></div>
                                    </div>
                                    <div class="col-md-6 col-sm-6">
                                        <label for="">Ngày sinh</label>
                                        <input class="form-control" type="date" name="birthday"
                                            value="{{ old('birthday', $user->birthday) }}">
                                    </div> --}}
                                    <div class="col-md-12 col-sm-12">
                                        <button class="btn btn-theme btn-theme-dark" type="submit"> Cập Nhật </button>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
                <div class="col-lg-3 col-md-3 col-sm-4">
                    <div class="widget account-details">
                        <h2 class="widget-title">Tài Khoản</h2>
                        <ul>
                            <li class="active"><a href="/thong-tin-tai-khoan"> Thông Tin Tài Khoản </a></li>
                            <li><a href="/tai-khoan-cua-toi">Tài Khoản Của Tôi</a></li>
                            <li><a href="/doi-mat-khau">Đổi Mật Khẩu</a></li>
                            <li><a href="/so-dia-chi">Sổ Địa Chỉ</a></li>
                            <li><a href="/lich-su-don-hang">Lịch Sử Đơn Hàng</a></li>
                            <li><a href="/danh-gia-va-nhan-xet">Đánh Giá và Nhận Xét</a></li>
                            <li><a href="/yeu-cau-tra-hang">Yêu Cầu Trả Hàng</a></li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection