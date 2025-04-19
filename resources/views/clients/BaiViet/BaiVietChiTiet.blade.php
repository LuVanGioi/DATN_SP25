@extends("clients.themes")

@section("title")
<title>{{ $news->tieu_de }}</title>
@endsection

@section('main')
<section class="page-section with-sidebar">
    <div class="container">
        <div class="row mt-1">
            <aside class="col-md-3 sidebar" id="sidebar">
                <div class="widget">
                    <div class="widget-search">
                        <input id="searchInput" class="form-control" type="text" placeholder="Search">
                        <button><i class="fa fa-search"></i></button>
                    </div>
                </div>
                <div class="widget shop-categories">
                    <h4 class="widget-title">Danh Mục</h4>
                    <div class="widget-content">
                        <ul id="danhMucList">
                            @foreach ($danhMuc as $dm)
                            @php
                            $soBaiViet = DB::table("bai_viet")->where("danh_muc_id", $dm->id)->count()
                            @endphp
                            <li>
                                <a href="{{ route("danh-muc-bai-viet.show", $dm->id) }}">
                                    {{ $dm->TenDanhMucBaiViet }}
                                    <span class="count">{{ number_format($soBaiViet) }}</span>
                                </a>
                            </li>
                            @endforeach
                        </ul>
                    </div>
                </div>
            </aside>
            <div class="col-md-9 content" id="content">
                <!-- chi tiết bài viết -->
                <div class="card news-card">
                    <img src="{{ Storage::url($news->hinh_anh) }}" class="img-fluid" alt="{{ $news->tieu_de }}">
                    <div class="card-body">
                        <h3 class="card-title text-dark" style="text-transform: uppercase;">{{ $news->tieu_de }}</h3>
                        <style>
                            .card-title {
                                text-transform: uppercase;
                            }
                        </style>
                        <p class="card-text"><strong>Tác giả:</strong> {{ $news->tac_gia }} | <strong>Ngày đăng:</strong> {{ date('d/m/Y', strtotime($news->ngay_dang)) }}</p>
                        <hr>
                        <div>{!! $news->noi_dung !!}</div>
                    </div>
                </div>

                <!-- ô bình luận và nút gửi -->
                <div class="card mt-4">
                    <div class="card-body">
                        <h5 class="card-title">Bình luận</h5>
                        @if (Auth::check())
                        <form action="{{ route('binhluan.store') }}" method="POST">
                            @csrf
                            <input type="hidden" name="id_baiviet" value="{{ $news->id }}">
                            <div class="form-group">
                                <textarea class="form-control" name="noi_dung" rows="5" placeholder="Viết bình luận của bạn..."></textarea>
                            </div>
                            <button type="submit" class="btn btn-primary">Gửi</button>
                        </form>
                        @else
                        <h3 class="block-title"><span>Đăng Nhập & Đăng Ký</span></h3>
                        <p class="text-success">Bạn Chưa Đăng Nhập, Vui Lòng Đăng Nhập Để Thanh Toán Đơn Hàng</p>
                        <form action="{{route('login')}}" method="POST" class="form-login">
                            @csrf
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <input class="form-control" type="text" name="email"
                                            placeholder="Tên đăng nhập hoặc email" value="{{old('email')}}"
                                            autocomplete="email">

                                        @error('email')
                                        <p class="text-danger">{{ $message}}</p>
                                        @enderror
                                    </div>
                                </div>
                                <div class="col-md-12">
                                    <div class="form-group"><input class="form-control" type="password" name="password"
                                            placeholder="Mật khẩu của bạn"></div>
                                </div>
                                <div class="col-md-6">
                                    <button class="btn btn-theme btn-block btn-theme-dark">Đăng Nhập</button>
                                </div>
                                <div class="col-md-6">
                                    <a class="btn btn-block btn-theme btn-theme-dark btn-create"
                                        href="{{route('register')}}">Tạo Tài
                                        Khoản</a>
                                </div>
                            </div>
                        </form>
                        @endif
                    </div>
                </div>


                @foreach ($binhLuans as $binhLuan)
                <div class="card mt-4">
                    <div class="card-body">
                        <div class="d-flex align-items-center">
                            <i class="bi bi-person-circle" style="font-size: 30px; margin-right: 10px;"></i>
                            <strong>{{ $binhLuan->user_name }}</strong>
                            <span class="text-muted ml-auto">{{ date('d/m/Y', strtotime($binhLuan->ngay_binh_luan)) }}</span>
                        </div>
                        <p class="mt-2">{{ $binhLuan->noi_dung }}</p>
                        <div class="d-flex justify-content-between align-items-center mt-2">
                            {{-- <div>
                                <button class="btn btn-link p-0" onclick="likeComment('{{ $binhLuan->id }}')">Thích</button>
                                <button class="btn btn-link p-0" onclick="showReplyForm('{{ $binhLuan->id }}')">Phản hồi</button>
                            </div> --}}
                            {{-- <div class="text-muted">
                                {{ $binhLuan->so_luot_thich }} lượt thích
                            </div> --}}
                        </div>
                        <!-- Form phản hồi -->
                        <div id="reply-form-{{ $binhLuan->id }}" class="mt-3" style="display: none;">
                            <form action="{{ route('binhluan.reply') }}" method="POST">
                                @csrf
                                <input type="hidden" name="id_binh_luan" value="{{ $binhLuan->id }}">
                                <textarea class="form-control" name="noi_dung" rows="2" placeholder="Viết phản hồi..."></textarea>
                                <button type="submit" class="btn btn-primary btn-sm mt-2">Gửi</button>
                            </form>
                        </div>

                        <!-- Hiển thị phản hồi -->
                        @foreach ($phanHois as $phanHoi)
                        @if ($phanHoi->id_binh_luan == $binhLuan->id)
                        <div class="card mt-3 ms-4">
                            <div class="card-body">
                                <div class="d-flex align-items-center">
                                    <i class="bi bi-person-circle" style="font-size: 25px; margin-right: 10px;"></i>
                                    <strong>{{ $phanHoi->user_name }}</strong>
                                    <span class="text-muted ml-auto">{{ date('d/m/Y', strtotime($phanHoi->ngay_phan_hoi)) }}</span>
                                </div>
                                <p class="mt-2">{{ $phanHoi->noi_dung }}</p>
                                <div class="d-flex justify-content-between align-items-center mt-2">
                                    <div>
                                        <button class="btn btn-link p-0" onclick="likeComment('{{ $phanHoi->id }}')">Thích</button>
                                    </div>
                                    {{-- <div class="text-muted">
                                        {{ $phanHoi->so_luot_thich ?? 0 }} lượt thích
                                    </div> --}}
                                </div>
                            </div>
                        </div>

                        @endif
                        @endforeach
                        <style>
                            .ms-4 {
                                margin-left: 3rem;
                            }
                        </style>
                    </div>
                </div>

                <hr class="thick-hr">
                <style>
                    .thick-hr {
                        border: 0;
                        height: 1px;
                        background-color: #ada6a6;

                    }
                </style>
                @endforeach
            </div>
        </div>
    </div>
</section>
@endsection

@section("js")
<script>
    function likeComment(id) {
        fetch(`/binhluan/${id}/like`, {
                method: 'POST',
                headers: {
                    'X-CSRF-TOKEN': '{{ csrf_token() }}',
                    'Content-Type': 'application/json',
                },
            })
            .then(response => response.json())
            .then(data => {
                if (data.success) {
                    location.reload();
                } else {
                    alert(data.message);
                }
            })
            .catch(error => console.error('Error:', error));
    }

    function showReplyForm(id) {
        const form = document.getElementById(`reply-form-${id}`);
        form.style.display = form.style.display === 'none' ? 'block' : 'none';
    }

    document.addEventListener('DOMContentLoaded', function() {
        const input = document.getElementById('searchInput');
        const listItems = document.querySelectorAll('#danhMucList li');

        input.addEventListener('input', function() {
            const keyword = input.value.toLowerCase();

            listItems.forEach(item => {
                const text = item.textContent.toLowerCase();
                if (text.includes(keyword)) {
                    item.style.display = '';
                } else {
                    item.style.display = 'none';
                }
            });
        });
    });
</script>
@endsection