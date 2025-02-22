@extends("admins.themes")

@section("titleHead")
<title>Biến Thể Sản Phẩm - ADMIN</title>
@endsection

@section("main")
<div class="page-body">
    <div class="container-fluid pt-3">
        <div class="card">
            <div class="card-header">
                <h5>DANH SÁCH BIẾN THỂ</h5>
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
                                            <th>Tên Biến Thể</th>
                                            <th>Giá Trị</th>
                                            <th>Thao Tác</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($danhSachBienThe as $index => $BienThe)
                                        <tr>
                                            <td>{{ $index + 1 }}</td>
                                            <td>{{ $BienThe->TenBienThe }}</td>
                                            <td>
                                                @if ($BienThe->id == 1)
                                                @foreach ($thongTinKichCo as $index => $KichCo)
                                                <span class="badge bg-dark">{{ $KichCo->TenKichCo }}</span>
                                                @endforeach
                                                @else
                                                @foreach ($thongTinMauSac as $index => $MauSac)
                                                <span class="badge bg-dark">{{ $MauSac->TenMauSac }}</span>
                                                @endforeach
                                                @endif
                                            </td>
                                            <td>
                                                <a href="{{ route("BienThe.edit", $BienThe->id) }}" class="btn btn-primary btn-sm"><i class="fal fa-edit"></i> Sửa</a>
                                            </td>
                                        </tr>

                                        <!-- <div class="modal fade" id="ModalGiaTri_{{ $BienThe->id }}" tabindex="-1" aria-labelledby="ModalGiaTri_{{ $BienThe->id }}" aria-modal="true" role="dialog">
                                            <div class="modal-dialog" role="document">
                                                <div class="modal-content">
                                                    <form action="{{ route("GiaTriBienThe.index") }}" method="POST">
                                                        @csrf
                                                        <input type="hidden" name="ID_BienThe" value="{{ $BienThe->id }}">
                                                        <div class="modal-header">
                                                            <h5 class="modal-title" id="exampleModalLongTitle">Thêm Giá Trị Biến Thể</h5>
                                                            <button class="btn-close py-0" type="button" data-bs-dismiss="modal" aria-label="Close"></button>
                                                        </div>
                                                        <div class="modal-body">
                                                            <div class="mb-3">
                                                                <label>Tên Giá Trị</label>
                                                                <input class="form-control @error(" TenGiaTri") is-invalid border-danger @enderror" type="text" name="TenGiaTri" placeholder="Tên Giá Trị Biến Thể" value="{{ old("TenGiaTri") }}" required>
                                                                @error("TenGiaTri")
                                                                <p class="text-danger">{{ $message }}</p>
                                                                @enderror
                                                            </div>
                                                        </div>
                                                        <div class="modal-footer">
                                                            <button type="button" class="btn btn-sm btn-dark" data-bs-dismiss="modal">Đóng</button>
                                                            <button class="btn btn-sm btn-primary" type="submit">Thêm Giá Trị</button>
                                                        </div>
                                                    </form>
                                                </div>
                                            </div>
                                        </div> -->
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