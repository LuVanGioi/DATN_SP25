@extends("admins.themes")

@section("titleHead")
    <title>DANH SÁCH KHÁCH HÀNG - ADMIN</title>
@endsection


@section("main")
    <div class="page-body">
        <div class="container-fluid pt-3">
            <div class="card">
                <div class="card-header">
                    <h5>DANH SÁCH KHÁCH HÀNG</h5>
                </div>
                <div class="card-body">

                    <div class="table-responsive dt-responsive">
                        <div id="dom-jqry_wrapper" class="dataTables_wrapper dt-bootstrap5">
                            <div class="row dt-row">
                                <div class="col-sm-12">
                                    <table class="table table-striped table-bordered nowrap dataTable">
                                        <thead>
                                            <tr>
                                                <th>STT</th>
                                                <th>Email</th>
                                                <th>Ngày Tham Gia</th>
                                                <th>Trạng Thái</th>
                                                <th>Thao Tác</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @foreach ($khachHang as $index => $row)<tr>
                                                    <td>{{$row->id }}</td>
                                                    <td>{{$row->email}}</td>
                                                    <td>{{$row->created_at}}</td>
                                                    <td>@if ($row->role == 0)
                                                        <?php echo 'Hoạt Động' ?>
                                                    @else
                                                        <?php echo 'Không Hoạt Động' ?>
                                                    @endif</td>
                                                    <td>
                                                        <a href="{{route('KhachHang.show',$row->id)}}" class="btn btn-info btn-sm">Chi Tiết</a>
                                                       <form method="POST" class="d-inline" action="{{route('KhachHang.update',$row->id)}}">

                                                        @csrf
                                                        @method('PUT')
                                                        <input type="hidden" name="role" value="{{$row->role}}">
                                                        <!-- @if ($row->role == 0)
                                                        
                                                        <button type="submit" class="btn btn-danger btn-sm" >Chặn</button>
                                                    @else
                                                    <button type="submit" class="btn btn-success btn-sm" >Bỏ Chặn</button>
                                                    @endif -->
                                                     
                                                       </form>
                                                    </td>
                                                </tr>
                                            @endforeach
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection