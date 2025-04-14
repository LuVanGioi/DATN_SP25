{{--  --}}

  @extends("admins.themes")

@section("titleHead")
    <title>Thông Tin Cá Nhân - ADMIN</title>
@endsection


@section("main")
<div class="page-body">
  <div class="container-fluid">
    <div class="edit-profile">
      <div class="row">
        <div class="col-xl-12">
          <div class="card">
            <div class="card-header">
              <h4 class="card-title mb-0">Thông Tin Cá Nhân</h4>
              <div class="card-options"><a class="card-options-collapse" href="#" data-bs-toggle="card-collapse"><i class="fe fe-chevron-up"></i></a><a class="card-options-remove" href="#" data-bs-toggle="card-remove"><i class="fe fe-x"></i></a></div>
            </div>
            <div class="card-body">
              <form>
                <div class="row mb-2">
                  <div class="profile-title">
                    <div class="media">                       <img src="{{ Storage::url($chiTiet->image) }}"  width="100px" class="img-fluid">
                      <div class="media-body">
                        <h5 class="mb-1">{{$chiTiet->name}}</h5>
                        <p>Quản Trị Viên</p>
                      </div>
                    </div>
                  </div>
                </div>
               
                <div class="mb-3">
                  <label class="form-label">Email</label>
                  <input class="form-control" value="{{$chiTiet->email}}" disabled>
                </div>
               
                <div class="form-footer">
                    <a class="btn btn-dark" href="{{route('home.index')}}">Quay Lại</a>
                </div>
              </form>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>
@endsection