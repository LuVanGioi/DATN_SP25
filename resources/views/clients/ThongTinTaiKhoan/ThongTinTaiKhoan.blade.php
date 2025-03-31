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
                        <div class="block-title alt"> <i class="fa fa-angle-down"></i> Thay Đổi Thông Tin Cá Nhân Của Bạn</div>
                        <div class="details-box">
                            <form class="form-delivery" action="{{route('thong-tin-tai-khoan.update', Auth::user()->id)}}" method="POST">
                                @method('PUT')
                                @csrf
                                
                                @if(session('success'))
                                <script>
                                    alert("{{ session('success') }}");
                                </script>
                                @endif
                                <div class="row">
                                    <div class="col-md-6 col-sm-6">
                                        <span class="title" style="font-weight: bold; color: #111111;">Họ Và Tên :</span>
                                        <div class="form-group"><input required type="text" name="name" class="form-control" value="{{ Auth::user()->name }}"></div>
                                    </div>

                                    <div class="col-md-6 col-sm-6">
                                        <span class="title" style="font-weight: bold; color: #111111;">Email :</span>
                                        <div class="form-group"><input required type="email" name="email" class="form-control" value="{{ Auth::user()->email }}"></div>
                                    </div>

                                    <div class="col-md-6 col-sm-6">
                                        <span class="title" style="font-weight: bold; color: #111111;">Số Điện Thoại :</span>
                                        <div class="form-group"><input required type="number" name="phone" class="form-control" value="{{ Auth::user()->phone }}"></div>
                                    </div>

                                    <div class="col-md-6 col-sm-6">
                                        <span class="title" style="font-weight: bold; color: #111111;">Giới Tính :</span>
                                        <select name="sex" class="form-control">
                                            <option value="{{Auth::user()->sex}}">Chọn giới tính</option>
                                            <option value="1" {{ Auth::user()->sex == 1 ? 'selected' : '' }}>Nam</option>
                                            <option value="2" {{ Auth::user()->sex == 2 ? 'selected' : '' }}>Nữ</option>
                                        </select>
                                    </div>

                                    <div class="col-md-6 col-sm-6">
                                        <span class="title" style="font-weight: bold; color: #111111;">Ngày Sinh :</span>
                                        <div class="form-group"><input type="date" name="birthday" class="form-control" value="{{ Auth::user()->birthday }}">
                                        </div>
                                    </div>

                                    <div class="col-md-6 col-sm-6">
                                        <span class="title" style="font-weight: bold; color: #111111;">Địa Chị :</span>
                                        <div class="form-group"><input type="text" name="address" class="form-control" value="{{ Auth::user()->address }}">
                                        </div>    
                                    </div>
                                    
                                    <div class="col-md-6 col-sm-6">
                                        <span class="title" style="font-weight: bold; color: #111111;">Ngày Tham Gia :</span>
                                        <div class="form-group"><input type="text"  class="form-control" value="{{ Auth::user()->created_at }}" disabled> 
                                        </div>    
                                    </div>
                                    
                                    <div class="col-md-12 col-sm-12">
                                        <button class="btn btn-theme btn-theme-dark" type="submit"> Cập Nhật </button>
                                    </div>
                               
                            </form>
                        </div>
                    </div>
                    </div>
                </div>
                <div class="col-lg-3 col-md-3 col-sm-4">
                    <div class="widget account-details">
                        <h2 class="widget-title">Tài Khoản</h2>
                        <ul>
                            <li class="active"><a href="/thong-tin-tai-khoan"> Thông Tin Tài Khoản </a></li>
                            <li><a href="/doi-mat-khau">Đổi Mật Khẩu</a></li>
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