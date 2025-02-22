@extends("admins.themes")

@section("titleHead")
  <title>THÔNG TIN kHÁCH HÀNG - ADMIN</title>
@endsection


@section("main")

  <div class="page-body">
    <div class="container-fluid">
    <div class="page-title">
      <div class="row">
      <div class="col-6">
        <h4>THÔNG TIN KHÁCH HÀNG</h4>
      </div>
      </div>
    </div>
    </div>
    <!-- Container-fluid starts-->
    <div class="container-fluid">
    <div class="edit-profile">
      <div class="row">
      <div class="col-xl-4">
        <div class="card">
        <div class="card-header">

          <div class="card-options"><a class="card-options-collapse" href="#" data-bs-toggle="card-collapse"><i
            class="fe fe-chevron-up"></i></a><a class="card-options-remove" href="#"
            data-bs-toggle="card-remove"><i class="fe fe-x"></i></a></div>
        </div>
        <div class="card-body">
          <form>
          <div class="row mb-2">
            <div class="profile-title">
            <div class="media"> <img class="img-70 rounded-circle" alt="" src="../assets/images/user/7.jpg">
              <div class="media-body">
              <h5 class="mb-1">{{$chiTiet->HoTen}}</h5>
              </div>
            </div>
            </div>
          </div>

          <div class="mb-3">
            <label class="form-label">Email</label>
            <input class="form-control" value="{{$chiTiet->Email}}" disabled>
          </div>
          <div class="mb-3">
            <label class="form-label">Mật Khẩu</label>
            <input class="form-control" type="password" value="{{$chiTiet->MatKhau}}" disabled>
          </div>
          <div class="mb-3">
            <label class="form-label">Số Điện Thoại</label>
            <input class="form-control" value="{{$chiTiet->SoDienThoai}}" disabled>
          </div>
          <div class="mb-3">
            <label class="form-label">Ngày Sinh</label>
            <input class="form-control" value="{{$chiTiet->NgaySinh}}" disabled>
          </div>
          <div class="mb-3">
            <label class="form-label">Giới Tính</label>
            <input class="form-control" value="{{$chiTiet->GioiTinh == 'nam' ? "Nam" : 'Nữ'}}" disabled>
          </div>
          <div class="mb-3">
            <label class="form-label">Vai trò</label>
            <input class="form-control" value="{{$chiTiet->VaiTro == 'khach' ? "Khách" : 'Quản Trị'}}" disabled>
          </div>

          </form>
        </div>
        </div>
      </div>
      <div class="col-xl-8">
        <form class="card">
        <div class="card-header">
          <h4 class="card-title mb-0">Lịch Sử Mua Hàng</h4>
          <div class="card-options"><a class="card-options-collapse" href="#" data-bs-toggle="card-collapse"><i
            class="fe fe-chevron-up"></i></a><a class="card-options-remove" href="#"
            data-bs-toggle="card-remove"><i class="fe fe-x"></i></a></div>
        </div>
        <div class="page-body">
          <div class="container-fluid">
            <div class="page-title">
              <div class="row">
                <div class="col-6">
                  <h4>Basic DataTables</h4>
                </div>
                <div class="col-6">
                  <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="index.html">                                       
                        <svg class="stroke-icon">
                          <use href="../assets/svg/icon-sprite.svg#stroke-home"></use>
                        </svg></a></li>
                    <li class="breadcrumb-item">Data Tables</li>
                    <li class="breadcrumb-item active">Basic DataTables</li>
                  </ol>
                </div>
              </div>
            </div>
          </div>
          <!-- Container-fluid starts-->
          <div class="container-fluid">
            <div class="row">
              <!-- Zero Configuration  Starts-->
              <div class="col-sm-12">
                <div class="card">
                  <div class="card-header pb-0 card-no-border">
                    <h4>Zero Configuration</h4><span>DataTables has most features enabled by default, so all you need to do to use it with your own tables is to call the construction function:<code>$().DataTable();</code>.</span><span>Searching, ordering and paging goodness will be immediately added to the table, as shown in this example.</span>
                  </div>
                  <div class="card-body">
                    <div class="table-responsive custom-scrollbar">
                      <div id="basic-1_wrapper" class="dataTables_wrapper no-footer"><div class="dataTables_length" id="basic-1_length"><label>Show <select name="basic-1_length" aria-controls="basic-1" class=""><option value="10">10</option><option value="25">25</option><option value="50">50</option><option value="100">100</option></select> entries</label></div><div id="basic-1_filter" class="dataTables_filter"><label>Search:<input type="search" class="" placeholder="" aria-controls="basic-1"></label></div><table class="display dataTable no-footer" id="basic-1" role="grid" aria-describedby="basic-1_info">
                        <thead>
                          <tr role="row"><th class="sorting_asc" tabindex="0" aria-controls="basic-1" rowspan="1" colspan="1" aria-sort="ascending" aria-label="Name: activate to sort column descending" style="width: 157.3px;">Name</th><th class="sorting" tabindex="0" aria-controls="basic-1" rowspan="1" colspan="1" aria-label="Position: activate to sort column ascending" style="width: 253.075px;">Position</th><th class="sorting" tabindex="0" aria-controls="basic-1" rowspan="1" colspan="1" aria-label="Office: activate to sort column ascending" style="width: 124.537px;">Office</th><th class="sorting" tabindex="0" aria-controls="basic-1" rowspan="1" colspan="1" aria-label="Age: activate to sort column ascending" style="width: 55.0875px;">Age</th><th class="sorting" tabindex="0" aria-controls="basic-1" rowspan="1" colspan="1" aria-label="Start date: activate to sort column ascending" style="width: 112.863px;">Start date</th><th class="sorting" tabindex="0" aria-controls="basic-1" rowspan="1" colspan="1" aria-label="Salary: activate to sort column ascending" style="width: 78.8125px;">Salary</th><th class="sorting" tabindex="0" aria-controls="basic-1" rowspan="1" colspan="1" aria-label="Action: activate to sort column ascending" style="width: 81.125px;">Action</th></tr>
                        </thead>
                        <tbody>
                          
                          
                          
                          
                          
                          
                          
                          
                          
                          
                          
                          
                          
                          
                        <tr role="row" class="odd">
                            <td class="sorting_1">Airi Satou</td>
                            <td>Accountant</td>
                            <td>Tokyo</td>
                            <td>33</td>
                            <td>2008/11/28</td>
                            <td>$162,700</td>
                            <td> 
                              <ul class="action"> 
                                <li class="edit"> <a href="#"><i class="icon-pencil-alt"></i></a></li>
                                <li class="delete"><a href="#"><i class="icon-trash"></i></a></li>
                              </ul>
                            </td>
                          </tr><tr role="row" class="even">
                            <td class="sorting_1">Ashton Cox</td>
                            <td>Junior Technical Author</td>
                            <td>San Francisco</td>
                            <td>66</td>
                            <td>2009/01/12</td>
                            <td>$86,000</td>
                            <td> 
                              <ul class="action"> 
                                <li class="edit"> <a href="#"><i class="icon-pencil-alt"></i></a></li>
                                <li class="delete"><a href="#"><i class="icon-trash"></i></a></li>
                              </ul>
                            </td>
                          </tr><tr role="row" class="odd">
                            <td class="sorting_1">Brielle Williamson</td>
                            <td>Integration Specialist</td>
                            <td>New York</td>
                            <td>61</td>
                            <td>2012/12/02</td>
                            <td>$372,000</td>
                            <td> 
                              <ul class="action"> 
                                <li class="edit"> <a href="#"><i class="icon-pencil-alt"></i></a></li>
                                <li class="delete"><a href="#"><i class="icon-trash"></i></a></li>
                              </ul>
                            </td>
                          </tr><tr role="row" class="even">
                            <td class="sorting_1">Cedric Kelly</td>
                            <td>Senior Javascript Developer</td>
                            <td>Edinburgh</td>
                            <td>22</td>
                            <td>2012/03/29</td>
                            <td>$433,060</td>
                            <td> 
                              <ul class="action"> 
                                <li class="edit"> <a href="#"><i class="icon-pencil-alt"></i></a></li>
                                <li class="delete"><a href="#"><i class="icon-trash"></i></a></li>
                              </ul>
                            </td>
                          </tr><tr role="row" class="odd">
                            <td class="sorting_1">Charde Marshall</td>
                            <td>Regional Director</td>
                            <td>San Francisco</td>
                            <td>36</td>
                            <td>2008/10/16</td>
                            <td>$470,600</td>
                            <td> 
                              <ul class="action"> 
                                <li class="edit"> <a href="#"><i class="icon-pencil-alt"></i></a></li>
                                <li class="delete"><a href="#"><i class="icon-trash"></i></a></li>
                              </ul>
                            </td>
                          </tr><tr role="row" class="even">
                            <td class="sorting_1">Colleen Hurst</td>
                            <td>Javascript Developer</td>
                            <td>San Francisco</td>
                            <td>39</td>
                            <td>2009/09/15</td>
                            <td>$205,500</td>
                            <td> 
                              <ul class="action"> 
                                <li class="edit"> <a href="#"><i class="icon-pencil-alt"></i></a></li>
                                <li class="delete"><a href="#"><i class="icon-trash"></i></a></li>
                              </ul>
                            </td>
                          </tr><tr role="row" class="odd">
                            <td class="sorting_1">Donna Snider</td>
                            <td>Customer Support</td>
                            <td>New York</td>
                            <td>27</td>
                            <td>2011/01/25</td>
                            <td>$112,000</td>
                            <td> 
                              <ul class="action"> 
                                <li class="edit"> <a href="#"><i class="icon-pencil-alt"></i></a></li>
                                <li class="delete"><a href="#"><i class="icon-trash"></i></a></li>
                              </ul>
                            </td>
                          </tr><tr role="row" class="even">
                            <td class="sorting_1">Garrett Winters</td>
                            <td>Accountant</td>
                            <td>Tokyo</td>
                            <td>63</td>
                            <td>2011/07/25</td>
                            <td>$170,750</td>
                            <td> 
                              <ul class="action"> 
                                <li class="edit"> <a href="#"><i class="icon-pencil-alt"></i></a></li>
                                <li class="delete"><a href="#"><i class="icon-trash"></i></a></li>
                              </ul>
                            </td>
                          </tr><tr role="row" class="odd">
                            <td class="sorting_1">Herrod Chandler</td>
                            <td>Sales Assistant</td>
                            <td>San Francisco</td>
                            <td>59</td>
                            <td>2012/08/06</td>
                            <td>$137,500</td>
                            <td> 
                              <ul class="action"> 
                                <li class="edit"> <a href="#"><i class="icon-pencil-alt"></i></a></li>
                                <li class="delete"><a href="#"><i class="icon-trash"></i></a></li>
                              </ul>
                            </td>
                          </tr><tr role="row" class="even">
                            <td class="sorting_1">Jena Gaines</td>
                            <td>Office Manager</td>
                            <td>London</td>
                            <td>30</td>
                            <td>2008/12/19</td>
                            <td>$90,560</td>
                            <td> 
                              <ul class="action"> 
                                <li class="edit"> <a href="#"><i class="icon-pencil-alt"></i></a></li>
                                <li class="delete"><a href="#"><i class="icon-trash"></i></a></li>
                              </ul>
                            </td>
                          </tr></tbody>
                      </table><div class="dataTables_info" id="basic-1_info" role="status" aria-live="polite">Showing 1 to 10 of 14 entries</div><div class="dataTables_paginate paging_simple_numbers" id="basic-1_paginate"><a class="paginate_button previous disabled" aria-controls="basic-1" data-dt-idx="0" tabindex="0" id="basic-1_previous">Previous</a><span><a class="paginate_button current" aria-controls="basic-1" data-dt-idx="1" tabindex="0">1</a><a class="paginate_button " aria-controls="basic-1" data-dt-idx="2" tabindex="0">2</a></span><a class="paginate_button next" aria-controls="basic-1" data-dt-idx="3" tabindex="0" id="basic-1_next">Next</a></div></div>
                    </div>
                  </div>
                </div>
              </div>
              <!-- Zero Configuration  Ends-->
              <!-- Complex headers (rowspan and colspan) Starts-->
              <div class="col-sm-12">
                <div class="card">
                  <div class="card-header pb-0 card-no-border">
                    <h4>Complex headers (rowspan and colspan)                                </h4><span>When using tables to display data, you will often wish to display column information in groups. DataTables fully supports <code>colspan</code> and<code>rowspan</code> in the table's header, assigning the required order listeners to the TH element suitable for that column.</span><span>
                      Each column must have one TH cell which is unique to it for the listeners to be added. By default DataTables will use the bottom unique cell for the column
                      to attach the order listener, if more than one cell for a column if found. The <code class="option" title="DataTables initialisation option">orderCellsTop:option</code>option can be used to tell DataTables to use the top cell if you prefer.</span><span>The example shown below has two sets of grouped information, grouped by colspan in the header.</span>
                  </div>
                  <div class="card-body">
                    <div class="table-responsive custom-scrollbar">
                      <div id="basic-6_wrapper" class="dataTables_wrapper"><div class="dataTables_length" id="basic-6_length"><label>Show <select name="basic-6_length" aria-controls="basic-6" class=""><option value="10">10</option><option value="25">25</option><option value="50">50</option><option value="100">100</option></select> entries</label></div><div id="basic-6_filter" class="dataTables_filter"><label>Search:<input type="search" class="" placeholder="" aria-controls="basic-6"></label></div><table class="display dataTable" id="basic-6" role="grid" aria-describedby="basic-6_info" style="width: 1163px;">
                        <thead>
                          <tr role="row"><th rowspan="2" class="sorting_asc" tabindex="0" aria-controls="basic-6" colspan="1" aria-sort="ascending" aria-label="Name: activate to sort column descending" style="width: 123px;">Name</th><th colspan="2" rowspan="1">HR Information</th><th colspan="3" rowspan="1">Contact</th></tr>
                          <tr role="row"><th class="sorting" tabindex="0" aria-controls="basic-6" rowspan="1" colspan="1" aria-label="Position: activate to sort column ascending" style="width: 197px;">Position</th><th class="sorting" tabindex="0" aria-controls="basic-6" rowspan="1" colspan="1" aria-label="Salary: activate to sort column ascending" style="width: 67px;">Salary</th><th class="sorting" tabindex="0" aria-controls="basic-6" rowspan="1" colspan="1" aria-label="Office: activate to sort column ascending" style="width: 89px;">Office</th><th class="sorting" tabindex="0" aria-controls="basic-6" rowspan="1" colspan="1" aria-label="CV: activate to sort column ascending" style="width: 27px;">CV</th><th class="sorting" tabindex="0" aria-controls="basic-6" rowspan="1" colspan="1" aria-label="Status: activate to sort column ascending" style="width: 84px;">Status</th><th class="sorting" tabindex="0" aria-controls="basic-6" rowspan="1" colspan="1" aria-label="E-mail: activate to sort column ascending" style="width: 184px;">E-mail</th><th class="sorting" tabindex="0" aria-controls="basic-6" rowspan="1" colspan="1" aria-label="Action: activate to sort column ascending" style="width: 56px;">Action</th></tr>
                        </thead>
                        <tbody>
                          
                          
                          
                          
                          
                          
                          
                          
                          
                          
                          
                          
                          
                          
                          
                          
                          
                          
                          
                          
                          
                          
                          
                          
                          
                          
                          
                          
                          
                          
                          
                          
                          
                          
                          
                          
                          
                          
                          
                          
                          
                          
                          
                          
                          
                          
                          
                          
                          
                          
                          
                          
                          
                          
                          
                          
                          
                        <tr role="row" class="odd">
                            <td class="sorting_1">Airi Satou</td>
                            <td>Accountant</td>
                            <td>$162,700</td>
                            <td>Tokyo</td>
                            <td class="action">                                  <a class="pdf" href="../assets/pdf/sample.pdf" target="_blank"><i class="icofont icofont-file-pdf"> </i></a></td>
                            <td> <span class="badge rounded-pill badge-success">hired</span></td>
                            <td>a.satou@datatables.net</td>
                            <td> 
                              <ul class="action"> 
                                <li class="edit"> <a href="#"><i class="icon-pencil-alt"></i></a></li>
                                <li class="delete"><a href="#"><i class="icon-trash"></i></a></li>
                              </ul>
                            </td>
                          </tr><tr role="row" class="even">
                            <td class="sorting_1">Angelica Ramos</td>
                            <td>Chief Executive Officer (CEO)</td>
                            <td>$1,200,000</td>
                            <td>London</td>
                            <td class="action">                                  <a class="pdf" href="../assets/pdf/sample.pdf" target="_blank"><i class="icofont icofont-file-pdf"> </i></a></td>
                            <td> <span class="badge rounded-pill badge-danger">Pending</span></td>
                            <td>a.ramos@datatables.net</td>
                            <td> 
                              <ul class="action"> 
                                <li class="edit"> <a href="#"><i class="icon-pencil-alt"></i></a></li>
                                <li class="delete"><a href="#"><i class="icon-trash"></i></a></li>
                              </ul>
                            </td>
                          </tr><tr role="row" class="odd">
                            <td class="sorting_1">Ashton Cox</td>
                            <td>Junior Technical Author</td>
                            <td>$86,000</td>
                            <td>San Francisco</td>
                            <td class="action">                                  <a class="pdf" href="../assets/pdf/sample.pdf" target="_blank"><i class="icofont icofont-file-pdf"> </i></a></td>
                            <td> <span class="badge rounded-pill badge-warning"> in process</span></td>
                            <td>a.cox@datatables.net</td>
                            <td> 
                              <ul class="action"> 
                                <li class="edit"> <a href="#"><i class="icon-pencil-alt"></i></a></li>
                                <li class="delete"><a href="#"><i class="icon-trash"></i></a></li>
                              </ul>
                            </td>
                          </tr><tr role="row" class="even">
                            <td class="sorting_1">Bradley Greer</td>
                            <td>Software Engineer</td>
                            <td>$132,000</td>
                            <td>London</td>
                            <td class="action">                                  <a class="pdf" href="../assets/pdf/sample.pdf" target="_blank"><i class="icofont icofont-file-pdf"> </i></a></td>
                            <td> <span class="badge rounded-pill badge-danger">Pending</span></td>
                            <td>b.greer@datatables.net</td>
                            <td> 
                              <ul class="action"> 
                                <li class="edit"> <a href="#"><i class="icon-pencil-alt"></i></a></li>
                                <li class="delete"><a href="#"><i class="icon-trash"></i></a></li>
                              </ul>
                            </td>
                          </tr><tr role="row" class="odd">
                            <td class="sorting_1">Brenden Wagner</td>
                            <td>Software Engineer</td>
                            <td>$206,850</td>
                            <td>San Francisco</td>
                            <td class="action">                                  <a class="pdf" href="../assets/pdf/sample.pdf" target="_blank"><i class="icofont icofont-file-pdf"> </i></a></td>
                            <td> <span class="badge rounded-pill badge-success">hired</span></td>
                            <td>b.wagner@datatables.net</td>
                            <td> 
                              <ul class="action"> 
                                <li class="edit"> <a href="#"><i class="icon-pencil-alt"></i></a></li>
                                <li class="delete"><a href="#"><i class="icon-trash"></i></a></li>
                              </ul>
                            </td>
                          </tr><tr role="row" class="even">
                            <td class="sorting_1">Brielle Williamson</td>
                            <td>Integration Specialist</td>
                            <td>$372,000</td>
                            <td>New York</td>
                            <td class="action">                                  <a class="pdf" href="../assets/pdf/sample.pdf" target="_blank"><i class="icofont icofont-file-pdf"> </i></a></td>
                            <td> <span class="badge rounded-pill badge-danger">Pending</span></td>
                            <td>b.williamson@datatables.net</td>
                            <td> 
                              <ul class="action"> 
                                <li class="edit"> <a href="#"><i class="icon-pencil-alt"></i></a></li>
                                <li class="delete"><a href="#"><i class="icon-trash"></i></a></li>
                              </ul>
                            </td>
                          </tr><tr role="row" class="odd">
                            <td class="sorting_1">Bruno Nash</td>
                            <td>Software Engineer</td>
                            <td>$163,500</td>
                            <td>London</td>
                            <td class="action">                                  <a class="pdf" href="../assets/pdf/sample.pdf" target="_blank"><i class="icofont icofont-file-pdf"> </i></a></td>
                            <td> <span class="badge rounded-pill badge-warning"> in process</span></td>
                            <td>b.nash@datatables.net</td>
                            <td> 
                              <ul class="action"> 
                                <li class="edit"> <a href="#"><i class="icon-pencil-alt"></i></a></li>
                                <li class="delete"><a href="#"><i class="icon-trash"></i></a></li>
                              </ul>
                            </td>
                          </tr><tr role="row" class="even">
                            <td class="sorting_1">Caesar Vance</td>
                            <td>Pre-Sales Support</td>
                            <td>$106,450</td>
                            <td>New York</td>
                            <td class="action">                                  <a class="pdf" href="../assets/pdf/sample.pdf" target="_blank"><i class="icofont icofont-file-pdf"> </i></a></td>
                            <td> <span class="badge rounded-pill badge-warning"> in process</span></td>
                            <td>c.vance@datatables.net</td>
                            <td> 
                              <ul class="action"> 
                                <li class="edit"> <a href="#"><i class="icon-pencil-alt"></i></a></li>
                                <li class="delete"><a href="#"><i class="icon-trash"></i></a></li>
                              </ul>
                            </td>
                          </tr><tr role="row" class="odd">
                            <td class="sorting_1">Cara Stevens</td>
                            <td>Sales Assistant</td>
                            <td>$145,600</td>
                            <td>New York</td>
                            <td class="action">                                  <a class="pdf" href="../assets/pdf/sample.pdf" target="_blank"><i class="icofont icofont-file-pdf"> </i></a></td>
                            <td> <span class="badge rounded-pill badge-warning"> in process</span></td>
                            <td>c.stevens@datatables.net</td>
                            <td> 
                              <ul class="action"> 
                                <li class="edit"> <a href="#"><i class="icon-pencil-alt"></i></a></li>
                                <li class="delete"><a href="#"><i class="icon-trash"></i></a></li>
                              </ul>
                            </td>
                          </tr><tr role="row" class="even">
                            <td class="sorting_1">Cedric Kelly</td>
                            <td>Senior Javascript Developer</td>
                            <td>$433,060</td>
                            <td>Edinburgh</td>
                            <td class="action">                                  <a class="pdf" href="../assets/pdf/sample.pdf" target="_blank"><i class="icofont icofont-file-pdf"> </i></a></td>
                            <td> <span class="badge rounded-pill badge-warning"> in process</span></td>
                            <td>c.kelly@datatables.net</td>
                            <td> 
                              <ul class="action"> 
                                <li class="edit"> <a href="#"><i class="icon-pencil-alt"></i></a></li>
                                <li class="delete"><a href="#"><i class="icon-trash"></i></a></li>
                              </ul>
                            </td>
                          </tr></tbody>
                        <tfoot>
                          <tr><th rowspan="1" colspan="1">Name</th><th rowspan="1" colspan="1">Position</th><th rowspan="1" colspan="1">Salary</th><th rowspan="1" colspan="1">Office</th><th rowspan="1" colspan="1">CV </th><th rowspan="1" colspan="1">Status</th><th rowspan="1" colspan="1">E-mail</th><th rowspan="1" colspan="1">Action</th></tr>
                        </tfoot>
                      </table><div class="dataTables_info" id="basic-6_info" role="status" aria-live="polite">Showing 1 to 10 of 57 entries</div><div class="dataTables_paginate paging_simple_numbers" id="basic-6_paginate"><a class="paginate_button previous disabled" aria-controls="basic-6" data-dt-idx="0" tabindex="0" id="basic-6_previous">Previous</a><span><a class="paginate_button current" aria-controls="basic-6" data-dt-idx="1" tabindex="0">1</a><a class="paginate_button " aria-controls="basic-6" data-dt-idx="2" tabindex="0">2</a><a class="paginate_button " aria-controls="basic-6" data-dt-idx="3" tabindex="0">3</a><a class="paginate_button " aria-controls="basic-6" data-dt-idx="4" tabindex="0">4</a><a class="paginate_button " aria-controls="basic-6" data-dt-idx="5" tabindex="0">5</a><a class="paginate_button " aria-controls="basic-6" data-dt-idx="6" tabindex="0">6</a></span><a class="paginate_button next" aria-controls="basic-6" data-dt-idx="7" tabindex="0" id="basic-6_next">Next</a></div></div>
                    </div>
                  </div>
                </div>
              </div>
              <!-- Complex headers (rowspan and colspan) Ends-->
              <!-- State saving Starts-->
              <div class="col-sm-12">
                <div class="card">
                  <div class="card-header pb-0 card-no-border">
                    <h4>State saving</h4><span>
                      DataTables has the option of being able to save the state of a table (its paging position, ordering state etc) so that is can be restored when the user
                      reloads a page, or comes back to the page after visiting a sub-page. This state saving ability is enabled by the <code class="option" title="DataTables initialisation option">stateSave</code> option.</span><span>The built in state saving method uses the HTML5 <code>localStorage</code> and <code>sessionStorage</code> APIs for efficient storage of the data. Please
                                                              note that this means that the built in state saving option <strong>will not work with IE6/7</strong> as these browsers do not support these APIs. Alternative
                                                              options of using cookies or saving the state on the server through Ajax can be used through the <code class="option" title="DataTables initialisation option">stateSaveCallback</code> and <a href="//datatables.net/reference/option/stateLoadCallback"><code class="option" title="DataTables initialisation option">stateLoadCallback</code></a> options.</span><span>The duration for which the saved state is valid and can be used to restore the table state can be set using the <code class="option" title="DataTables initialisation option">stateDuration</code> initialisation
                                                              parameter (2 hours by default). This parameter also controls if <code>localStorage</code> (0 or greater) or <code>sessionStorage</code> (-1) is used to store
                                                              the data.</span><span>The example below simply shows state saving enabled in DataTables with the <code class="option" title="DataTables initialisation option">stateSave</code> option.</span>
                  </div>
                  <div class="card-body">
                    <div class="table-responsive custom-scrollbar">
                      <div id="basic-9_wrapper" class="dataTables_wrapper"><div class="dataTables_length" id="basic-9_length"><label>Show <select name="basic-9_length" aria-controls="basic-9" class=""><option value="10">10</option><option value="25">25</option><option value="50">50</option><option value="100">100</option></select> entries</label></div><div id="basic-9_filter" class="dataTables_filter"><label>Search:<input type="search" class="" placeholder="" aria-controls="basic-9"></label></div><table class="display dataTable" id="basic-9" role="grid" aria-describedby="basic-9_info">
                        <thead>
                          <tr role="row"><th class="sorting_asc" tabindex="0" aria-controls="basic-9" rowspan="1" colspan="1" aria-sort="ascending" aria-label="Name: activate to sort column descending" style="width: 157.762px;">Name</th><th class="sorting" tabindex="0" aria-controls="basic-9" rowspan="1" colspan="1" aria-label="Position: activate to sort column ascending" style="width: 264.8px;">Position</th><th class="sorting" tabindex="0" aria-controls="basic-9" rowspan="1" colspan="1" aria-label="Office: activate to sort column ascending" style="width: 117.463px;">Office</th><th class="sorting" tabindex="0" aria-controls="basic-9" rowspan="1" colspan="1" aria-label="Age: activate to sort column ascending" style="width: 50.9625px;">Age</th><th class="sorting" tabindex="0" aria-controls="basic-9" rowspan="1" colspan="1" aria-label="Start date: activate to sort column ascending" style="width: 106.275px;">Start date</th><th class="sorting" tabindex="0" aria-controls="basic-9" rowspan="1" colspan="1" aria-label="Salary: activate to sort column ascending" style="width: 89.6625px;">Salary</th><th class="sorting" tabindex="0" aria-controls="basic-9" rowspan="1" colspan="1" aria-label="Action: activate to sort column ascending" style="width: 75.875px;">Action</th></tr>
                        </thead>
                        <tbody>
                          
                          
                          
                          
                          
                          
                          
                          
                          
                          
                          
                          
                          
                          
                          
                          
                          
                          
                          
                          
                          
                          
                          
                          
                          
                          
                          
                          
                          
                          
                          
                          
                          
                          
                          
                          
                          
                          
                          
                          
                          
                          
                          
                          
                          
                          
                          
                          
                          
                          
                          
                          
                          
                          
                          
                          
                          
                        <tr role="row" class="odd">
                            <td class="sorting_1">Airi Satou</td>
                            <td><span class="badge rounded-pill badge-light-secondary">Accountant</span></td>
                            <td>Tokyo</td>
                            <td>33</td>
                            <td>2008/11/28</td>
                            <td>$162,700</td>
                            <td> 
                              <ul class="action"> 
                                <li class="edit"> <a href="#"><i class="icon-pencil-alt"></i></a></li>
                                <li class="delete"><a href="#"><i class="icon-trash"></i></a></li>
                              </ul>
                            </td>
                          </tr><tr role="row" class="even">
                            <td class="sorting_1">Angelica Ramos</td>
                            <td><span class="badge rounded-pill badge-light-primary">Chief Executive Officer (CEO)</span></td>
                            <td>London</td>
                            <td>47</td>
                            <td>2009/10/09</td>
                            <td>$1,200,000</td>
                            <td> 
                              <ul class="action"> 
                                <li class="edit"> <a href="#"><i class="icon-pencil-alt"></i></a></li>
                                <li class="delete"><a href="#"><i class="icon-trash"></i></a></li>
                              </ul>
                            </td>
                          </tr><tr role="row" class="odd">
                            <td class="sorting_1">Ashton Cox</td>
                            <td><span class="badge rounded-pill badge-light-primary">Junior Technical Author</span></td>
                            <td>San Francisco</td>
                            <td>66</td>
                            <td>2009/01/12</td>
                            <td>$86,000</td>
                            <td> 
                              <ul class="action"> 
                                <li class="edit"> <a href="#"><i class="icon-pencil-alt"></i></a></li>
                                <li class="delete"><a href="#"><i class="icon-trash"></i></a></li>
                              </ul>
                            </td>
                          </tr><tr role="row" class="even">
                            <td class="sorting_1">Bradley Greer</td>
                            <td><span class="badge rounded-pill badge-light-success">Software Engineer</span></td>
                            <td>London</td>
                            <td>41</td>
                            <td>2012/10/13</td>
                            <td>$132,000</td>
                            <td> 
                              <ul class="action"> 
                                <li class="edit"> <a href="#"><i class="icon-pencil-alt"></i></a></li>
                                <li class="delete"><a href="#"><i class="icon-trash"></i></a></li>
                              </ul>
                            </td>
                          </tr><tr role="row" class="odd">
                            <td class="sorting_1">Brenden Wagner</td>
                            <td><span class="badge rounded-pill badge-light-success">Software Engineer</span></td>
                            <td>San Francisco</td>
                            <td>28</td>
                            <td>2011/06/07</td>
                            <td>$206,850</td>
                            <td> 
                              <ul class="action"> 
                                <li class="edit"> <a href="#"><i class="icon-pencil-alt"></i></a></li>
                                <li class="delete"><a href="#"><i class="icon-trash"></i></a></li>
                              </ul>
                            </td>
                          </tr><tr role="row" class="even">
                            <td class="sorting_1">Brielle Williamson</td>
                            <td><span class="badge rounded-pill badge-light-info">Integration Specialist</span></td>
                            <td>New York</td>
                            <td>61</td>
                            <td>2012/12/02</td>
                            <td>$372,000</td>
                            <td> 
                              <ul class="action"> 
                                <li class="edit"> <a href="#"><i class="icon-pencil-alt"></i></a></li>
                                <li class="delete"><a href="#"><i class="icon-trash"></i></a></li>
                              </ul>
                            </td>
                          </tr><tr role="row" class="odd">
                            <td class="sorting_1">Bruno Nash</td>
                            <td><span class="badge rounded-pill badge-light-success">Software Engineer</span></td>
                            <td>London</td>
                            <td>38</td>
                            <td>2011/05/03</td>
                            <td>$163,500</td>
                            <td> 
                              <ul class="action"> 
                                <li class="edit"> <a href="#"><i class="icon-pencil-alt"></i></a></li>
                                <li class="delete"><a href="#"><i class="icon-trash"></i></a></li>
                              </ul>
                            </td>
                          </tr><tr role="row" class="even">
                            <td class="sorting_1">Caesar Vance</td>
                            <td><span class="badge rounded-pill badge-light-primary">Pre-Sales Support</span></td>
                            <td>New York</td>
                            <td>21</td>
                            <td>2011/12/12</td>
                            <td>$106,450</td>
                            <td> 
                              <ul class="action"> 
                                <li class="edit"> <a href="#"><i class="icon-pencil-alt"></i></a></li>
                                <li class="delete"><a href="#"><i class="icon-trash"></i></a></li>
                              </ul>
                            </td>
                          </tr><tr role="row" class="odd">
                            <td class="sorting_1">Cara Stevens</td>
                            <td><span class="badge rounded-pill badge-light-primary">Sales Assistant</span></td>
                            <td>New York</td>
                            <td>46</td>
                            <td>2011/12/06</td>
                            <td>$145,600</td>
                            <td> 
                              <ul class="action"> 
                                <li class="edit"> <a href="#"><i class="icon-pencil-alt"></i></a></li>
                                <li class="delete"><a href="#"><i class="icon-trash"></i></a></li>
                              </ul>
                            </td>
                          </tr><tr role="row" class="even">
                            <td class="sorting_1">Cedric Kelly</td>
                            <td><span class="badge rounded-pill badge-light-primary">Senior Javascript Developer</span></td>
                            <td>Edinburgh</td>
                            <td>22</td>
                            <td>2012/03/29</td>
                            <td>$433,060</td>
                            <td> 
                              <ul class="action"> 
                                <li class="edit"> <a href="#"><i class="icon-pencil-alt"></i></a></li>
                                <li class="delete"><a href="#"><i class="icon-trash"></i></a></li>
                              </ul>
                            </td>
                          </tr></tbody>
                        <tfoot>
                          <tr><th rowspan="1" colspan="1">Name</th><th rowspan="1" colspan="1">Position</th><th rowspan="1" colspan="1">Office</th><th rowspan="1" colspan="1">Age</th><th rowspan="1" colspan="1">Start date</th><th rowspan="1" colspan="1">Salary</th><td rowspan="1" colspan="1">Action </td></tr>
                        </tfoot>
                      </table><div class="dataTables_info" id="basic-9_info" role="status" aria-live="polite">Showing 1 to 10 of 57 entries</div><div class="dataTables_paginate paging_simple_numbers" id="basic-9_paginate"><a class="paginate_button previous disabled" aria-controls="basic-9" data-dt-idx="0" tabindex="0" id="basic-9_previous">Previous</a><span><a class="paginate_button current" aria-controls="basic-9" data-dt-idx="1" tabindex="0">1</a><a class="paginate_button " aria-controls="basic-9" data-dt-idx="2" tabindex="0">2</a><a class="paginate_button " aria-controls="basic-9" data-dt-idx="3" tabindex="0">3</a><a class="paginate_button " aria-controls="basic-9" data-dt-idx="4" tabindex="0">4</a><a class="paginate_button " aria-controls="basic-9" data-dt-idx="5" tabindex="0">5</a><a class="paginate_button " aria-controls="basic-9" data-dt-idx="6" tabindex="0">6</a></span><a class="paginate_button next" aria-controls="basic-9" data-dt-idx="7" tabindex="0" id="basic-9_next">Next</a></div></div>
                    </div>
                  </div>
                </div>
              </div>
              <!-- State saving Ends-->
              <!-- Scroll - vertical dynamic Starts-->
              <div class="col-sm-12">
                <div class="card">
                  <div class="card-header pb-0 card-no-border">
                    <h4>Scroll - vertical, dynamic height</h4><span>This example shows a vertically scrolling DataTable that makes use of the CSS3 vh unit in order to dynamically resize the viewport based on the browser window height. The vh unit is effectively a percentage of the browser window height. So the 50vh used in this example is 50% of the window height. The viewport size will update dynamically as the window is resized.</span><span>A relatively modern browser is required for vh units to operate correctly. IE9+ supports the vh unit and all other evergreen browsers.</span>
                  </div>
                  <div class="card-body">
                    <div class="table-responsive user-datatable custom-scrollbar">
                      <div id="basic-12_wrapper" class="dataTables_wrapper"><div id="basic-12_filter" class="dataTables_filter"><label>Search:<input type="search" class="" placeholder="" aria-controls="basic-12"></label></div><div class="dataTables_scroll"><div class="dataTables_scrollHead" style="overflow: hidden; position: relative; border: 0px; width: 100%;"><div class="dataTables_scrollHeadInner" style="box-sizing: content-box; width: 1142.4px; padding-right: 17px;"><table class="display dataTable" role="grid" style="margin-left: 0px; width: 1142.4px;"><thead>
                          <tr role="row"><th class="sorting_asc" tabindex="0" aria-controls="basic-12" rowspan="1" colspan="1" style="width: 202.587px;" aria-sort="ascending" aria-label="Name: activate to sort column descending">Name</th><th class="sorting" tabindex="0" aria-controls="basic-12" rowspan="1" colspan="1" style="width: 233.725px;" aria-label="Position: activate to sort column ascending">Position</th><th class="sorting" tabindex="0" aria-controls="basic-12" rowspan="1" colspan="1" style="width: 109.537px;" aria-label="Office: activate to sort column ascending">Office</th><th class="sorting" tabindex="0" aria-controls="basic-12" rowspan="1" colspan="1" style="width: 46.85px;" aria-label="Age: activate to sort column ascending">Age</th><th class="sorting" tabindex="0" aria-controls="basic-12" rowspan="1" colspan="1" style="width: 99.6625px;" aria-label="Start date: activate to sort column ascending">Start date</th><th class="sorting" tabindex="0" aria-controls="basic-12" rowspan="1" colspan="1" style="width: 83.7875px;" aria-label="Salary: activate to sort column ascending">Salary</th><th class="sorting" tabindex="0" aria-controls="basic-12" rowspan="1" colspan="1" style="width: 69.85px;" aria-label="Action: activate to sort column ascending">Action</th></tr>
                        </thead></table></div></div><div class="dataTables_scrollBody" style="position: relative; overflow: auto; max-height: 40vh; width: 100%;"><table class="display dataTable" id="basic-12" role="grid" aria-describedby="basic-12_info" style="width: 100%;"><thead>
                          <tr role="row" style="height: 0px;"><th class="sorting" aria-controls="basic-12" rowspan="1" colspan="1" style="width: 202.587px; padding-top: 0px; padding-bottom: 0px; border-top-width: 0px; border-bottom-width: 0px; height: 0px;"><div class="dataTables_sizing" style="height:0;overflow:hidden;">Name</div></th><th class="sorting" aria-controls="basic-12" rowspan="1" colspan="1" style="width: 233.725px; padding-top: 0px; padding-bottom: 0px; border-top-width: 0px; border-bottom-width: 0px; height: 0px;"><div class="dataTables_sizing" style="height:0;overflow:hidden;">Position</div></th><th class="sorting" aria-controls="basic-12" rowspan="1" colspan="1" style="width: 109.537px; padding-top: 0px; padding-bottom: 0px; border-top-width: 0px; border-bottom-width: 0px; height: 0px;"><div class="dataTables_sizing" style="height:0;overflow:hidden;">Office</div></th><th class="sorting" aria-controls="basic-12" rowspan="1" colspan="1" style="width: 46.85px; padding-top: 0px; padding-bottom: 0px; border-top-width: 0px; border-bottom-width: 0px; height: 0px;"><div class="dataTables_sizing" style="height:0;overflow:hidden;">Age</div></th><th class="sorting" aria-controls="basic-12" rowspan="1" colspan="1" style="width: 99.6625px; padding-top: 0px; padding-bottom: 0px; border-top-width: 0px; border-bottom-width: 0px; height: 0px;"><div class="dataTables_sizing" style="height:0;overflow:hidden;">Start date</div></th><th class="sorting" aria-controls="basic-12" rowspan="1" colspan="1" style="width: 83.7875px; padding-top: 0px; padding-bottom: 0px; border-top-width: 0px; border-bottom-width: 0px; height: 0px;"><div class="dataTables_sizing" style="height:0;overflow:hidden;">Salary</div></th><th class="sorting" aria-controls="basic-12" rowspan="1" colspan="1" style="width: 69.85px; padding-top: 0px; padding-bottom: 0px; border-top-width: 0px; border-bottom-width: 0px; height: 0px;"><div class="dataTables_sizing" style="height:0;overflow:hidden;">Action</div></th></tr>
                        </thead><tfoot>
                          <tr style="height: 0px;"><th rowspan="1" colspan="1" style="padding-top: 0px; padding-bottom: 0px; border-top-width: 0px; border-bottom-width: 0px; height: 0px; width: 220.587px;"><div class="dataTables_sizing" style="height:0;overflow:hidden;">Name</div></th><th rowspan="1" colspan="1" style="padding-top: 0px; padding-bottom: 0px; border-top-width: 0px; border-bottom-width: 0px; height: 0px; width: 251.725px;"><div class="dataTables_sizing" style="height:0;overflow:hidden;">Position</div></th><th rowspan="1" colspan="1" style="padding-top: 0px; padding-bottom: 0px; border-top-width: 0px; border-bottom-width: 0px; height: 0px; width: 127.537px;"><div class="dataTables_sizing" style="height:0;overflow:hidden;">Office</div></th><th rowspan="1" colspan="1" style="padding-top: 0px; padding-bottom: 0px; border-top-width: 0px; border-bottom-width: 0px; height: 0px; width: 64.85px;"><div class="dataTables_sizing" style="height:0;overflow:hidden;">Age</div></th><th rowspan="1" colspan="1" style="padding-top: 0px; padding-bottom: 0px; border-top-width: 0px; border-bottom-width: 0px; height: 0px; width: 117.662px;"><div class="dataTables_sizing" style="height:0;overflow:hidden;">Start date</div></th><th rowspan="1" colspan="1" style="padding-top: 0px; padding-bottom: 0px; border-top-width: 0px; border-bottom-width: 0px; height: 0px; width: 101.787px;"><div class="dataTables_sizing" style="height:0;overflow:hidden;">Salary</div></th></tr>
                        </tfoot>
                        
                        <tbody>
                          
                          
                          
                          
                          
                          
                          
                          
                          
                          
                          
                          
                          
                          
                          
                          
                          
                          
                          
                          
                          
                          
                          
                          
                          
                          
                          
                          
                          
                          
                          
                          
                          
                          
                          
                          
                          
                          
                          
                          
                          
                          
                          
                          
                          
                          
                          
                          
                          
                          
                          
                          
                          
                          
                          
                          
                          
                        <tr role="row" class="odd">
                            <td class="sorting_1"> <img class="img-fluid table-avtar" src="../assets/images/user/1.jpg" alt="">Airi Satou</td>
                            <td>Accountant</td>
                            <td>Tokyo</td>
                            <td>33</td>
                            <td>2008/11/28</td>
                            <td>$162,700</td>
                            <td> 
                              <ul class="action"> 
                                <li class="edit"> <a href="#"><i class="icon-pencil-alt"></i></a></li>
                                <li class="delete"><a href="#"><i class="icon-trash"></i></a></li>
                              </ul>
                            </td>
                          </tr><tr role="row" class="even">
                            <td class="sorting_1"> <img class="img-fluid table-avtar" src="../assets/images/user/2.png" alt="">Angelica Ramos</td>
                            <td>Chief Executive Officer (CEO)</td>
                            <td>London</td>
                            <td>47</td>
                            <td>2009/10/09</td>
                            <td>$1,200,000</td>
                            <td> 
                              <ul class="action"> 
                                <li class="edit"> <a href="#"><i class="icon-pencil-alt"></i></a></li>
                                <li class="delete"><a href="#"><i class="icon-trash"></i></a></li>
                              </ul>
                            </td>
                          </tr><tr role="row" class="odd">
                            <td class="sorting_1"> <img class="img-fluid table-avtar" src="../assets/images/user/2.jpg" alt="">Ashton Cox</td>
                            <td>Junior Technical Author</td>
                            <td>San Francisco</td>
                            <td>66</td>
                            <td>2009/01/12</td>
                            <td>$86,000</td>
                            <td> 
                              <ul class="action"> 
                                <li class="edit"> <a href="#"><i class="icon-pencil-alt"></i></a></li>
                                <li class="delete"><a href="#"><i class="icon-trash"></i></a></li>
                              </ul>
                            </td>
                          </tr><tr role="row" class="even">
                            <td class="sorting_1"> <img class="img-fluid table-avtar" src="../assets/images/user/2.jpg" alt="">Bradley Greer</td>
                            <td>Software Engineer</td>
                            <td>London</td>
                            <td>41</td>
                            <td>2012/10/13</td>
                            <td>$132,000</td>
                            <td> 
                              <ul class="action"> 
                                <li class="edit"> <a href="#"><i class="icon-pencil-alt"></i></a></li>
                                <li class="delete"><a href="#"><i class="icon-trash"></i></a></li>
                              </ul>
                            </td>
                          </tr><tr role="row" class="odd">
                            <td class="sorting_1"> <img class="img-fluid table-avtar" src="../assets/images/user/12.png" alt="">Brenden Wagner</td>
                            <td>Software Engineer</td>
                            <td>San Francisco</td>
                            <td>28</td>
                            <td>2011/06/07</td>
                            <td>$206,850</td>
                            <td> 
                              <ul class="action"> 
                                <li class="edit"> <a href="#"><i class="icon-pencil-alt"></i></a></li>
                                <li class="delete"><a href="#"><i class="icon-trash"></i></a></li>
                              </ul>
                            </td>
                          </tr><tr role="row" class="even">
                            <td class="sorting_1"> <img class="img-fluid table-avtar" src="../assets/images/user/2.jpg" alt="">Brielle Williamson</td>
                            <td>Integration Specialist</td>
                            <td>New York</td>
                            <td>61</td>
                            <td>2012/12/02</td>
                            <td>$372,000</td>
                            <td> 
                              <ul class="action"> 
                                <li class="edit"> <a href="#"><i class="icon-pencil-alt"></i></a></li>
                                <li class="delete"><a href="#"><i class="icon-trash"></i></a></li>
                              </ul>
                            </td>
                          </tr><tr role="row" class="odd">
                            <td class="sorting_1"> <img class="img-fluid table-avtar" src="../assets/images/user/2.png" alt="">Bruno Nash</td>
                            <td>Software Engineer</td>
                            <td>London</td>
                            <td>38</td>
                            <td>2011/05/03</td>
                            <td>$163,500</td>
                            <td> 
                              <ul class="action"> 
                                <li class="edit"> <a href="#"><i class="icon-pencil-alt"></i></a></li>
                                <li class="delete"><a href="#"><i class="icon-trash"></i></a></li>
                              </ul>
                            </td>
                          </tr><tr role="row" class="even">
                            <td class="sorting_1"> <img class="img-fluid table-avtar" src="../assets/images/user/12.png" alt="">Caesar Vance</td>
                            <td>Pre-Sales Support</td>
                            <td>New York</td>
                            <td>21</td>
                            <td>2011/12/12</td>
                            <td>$106,450</td>
                            <td> 
                              <ul class="action"> 
                                <li class="edit"> <a href="#"><i class="icon-pencil-alt"></i></a></li>
                                <li class="delete"><a href="#"><i class="icon-trash"></i></a></li>
                              </ul>
                            </td>
                          </tr><tr role="row" class="odd">
                            <td class="sorting_1"> <img class="img-fluid table-avtar" src="../assets/images/user/2.jpg" alt="">Cara Stevens</td>
                            <td>Sales Assistant</td>
                            <td>New York</td>
                            <td>46</td>
                            <td>2011/12/06</td>
                            <td>$145,600</td>
                            <td> 
                              <ul class="action"> 
                                <li class="edit"> <a href="#"><i class="icon-pencil-alt"></i></a></li>
                                <li class="delete"><a href="#"><i class="icon-trash"></i></a></li>
                              </ul>
                            </td>
                          </tr><tr role="row" class="even">
                            <td class="sorting_1"> <img class="img-fluid table-avtar" src="../assets/images/user/12.png" alt="">Cedric Kelly</td>
                            <td>Senior Javascript Developer</td>
                            <td>Edinburgh</td>
                            <td>22</td>
                            <td>2012/03/29</td>
                            <td>$433,060</td>
                            <td> 
                              <ul class="action"> 
                                <li class="edit"> <a href="#"><i class="icon-pencil-alt"></i></a></li>
                                <li class="delete"><a href="#"><i class="icon-trash"></i></a></li>
                              </ul>
                            </td>
                          </tr><tr role="row" class="odd">
                            <td class="sorting_1"> <img class="img-fluid table-avtar" src="../assets/images/user/1.jpg" alt="">Charde Marshall</td>
                            <td>Regional Director</td>
                            <td>San Francisco</td>
                            <td>36</td>
                            <td>2008/10/16</td>
                            <td>$470,600</td>
                            <td> 
                              <ul class="action"> 
                                <li class="edit"> <a href="#"><i class="icon-pencil-alt"></i></a></li>
                                <li class="delete"><a href="#"><i class="icon-trash"></i></a></li>
                              </ul>
                            </td>
                          </tr><tr role="row" class="even">
                            <td class="sorting_1"> <img class="img-fluid table-avtar" src="../assets/images/user/1.jpg" alt="">Colleen Hurst</td>
                            <td>Javascript Developer</td>
                            <td>San Francisco</td>
                            <td>39</td>
                            <td>2009/09/15</td>
                            <td>$205,500</td>
                            <td> 
                              <ul class="action"> 
                                <li class="edit"> <a href="#"><i class="icon-pencil-alt"></i></a></li>
                                <li class="delete"><a href="#"><i class="icon-trash"></i></a></li>
                              </ul>
                            </td>
                          </tr><tr role="row" class="odd">
                            <td class="sorting_1"> <img class="img-fluid table-avtar" src="../assets/images/user/12.png" alt="">Dai Rios</td>
                            <td>Personnel Lead</td>
                            <td>Edinburgh</td>
                            <td>35</td>
                            <td>2012/09/26</td>
                            <td>$217,500</td>
                            <td> 
                              <ul class="action"> 
                                <li class="edit"> <a href="#"><i class="icon-pencil-alt"></i></a></li>
                                <li class="delete"><a href="#"><i class="icon-trash"></i></a></li>
                              </ul>
                            </td>
                          </tr><tr role="row" class="even">
                            <td class="sorting_1"> <img class="img-fluid table-avtar" src="../assets/images/user/2.png" alt="">Donna Snider</td>
                            <td>Customer Support</td>
                            <td>New York</td>
                            <td>27</td>
                            <td>2011/01/25</td>
                            <td>$112,000</td>
                            <td> 
                              <ul class="action"> 
                                <li class="edit"> <a href="#"><i class="icon-pencil-alt"></i></a></li>
                                <li class="delete"><a href="#"><i class="icon-trash"></i></a></li>
                              </ul>
                            </td>
                          </tr><tr role="row" class="odd">
                            <td class="sorting_1"> <img class="img-fluid table-avtar" src="../assets/images/user/1.jpg" alt="">Doris Wilder</td>
                            <td>Sales Assistant</td>
                            <td>Sidney</td>
                            <td>23</td>
                            <td>2010/09/20</td>
                            <td>$85,600</td>
                            <td> 
                              <ul class="action"> 
                                <li class="edit"> <a href="#"><i class="icon-pencil-alt"></i></a></li>
                                <li class="delete"><a href="#"><i class="icon-trash"></i></a></li>
                              </ul>
                            </td>
                          </tr><tr role="row" class="even">
                            <td class="sorting_1"> <img class="img-fluid table-avtar" src="../assets/images/user/2.png" alt="">Finn Camacho</td>
                            <td>Support Engineer</td>
                            <td>San Francisco</td>
                            <td>47</td>
                            <td>2009/07/07</td>
                            <td>$87,500</td>
                            <td> 
                              <ul class="action"> 
                                <li class="edit"> <a href="#"><i class="icon-pencil-alt"></i></a></li>
                                <li class="delete"><a href="#"><i class="icon-trash"></i></a></li>
                              </ul>
                            </td>
                          </tr><tr role="row" class="odd">
                            <td class="sorting_1"> <img class="img-fluid table-avtar" src="../assets/images/user/1.jpg" alt="">Fiona Green</td>
                            <td>Chief Operating Officer (COO)</td>
                            <td>San Francisco</td>
                            <td>48</td>
                            <td>2010/03/11</td>
                            <td>$850,000</td>
                            <td> 
                              <ul class="action"> 
                                <li class="edit"> <a href="#"><i class="icon-pencil-alt"></i></a></li>
                                <li class="delete"><a href="#"><i class="icon-trash"></i></a></li>
                              </ul>
                            </td>
                          </tr><tr role="row" class="even">
                            <td class="sorting_1"> <img class="img-fluid table-avtar" src="../assets/images/user/2.png" alt="">Garrett Winters</td>
                            <td>Accountant</td>
                            <td>Tokyo</td>
                            <td>63</td>
                            <td>2011/07/25</td>
                            <td>$170,750</td>
                            <td> 
                              <ul class="action"> 
                                <li class="edit"> <a href="#"><i class="icon-pencil-alt"></i></a></li>
                                <li class="delete"><a href="#"><i class="icon-trash"></i></a></li>
                              </ul>
                            </td>
                          </tr><tr role="row" class="odd">
                            <td class="sorting_1"> <img class="img-fluid table-avtar" src="../assets/images/user/2.png" alt="">Gavin Cortez</td>
                            <td>Team Leader</td>
                            <td>San Francisco</td>
                            <td>22</td>
                            <td>2008/10/26</td>
                            <td>$235,500</td>
                            <td> 
                              <ul class="action"> 
                                <li class="edit"> <a href="#"><i class="icon-pencil-alt"></i></a></li>
                                <li class="delete"><a href="#"><i class="icon-trash"></i></a></li>
                              </ul>
                            </td>
                          </tr><tr role="row" class="even">
                            <td class="sorting_1"> <img class="img-fluid table-avtar" src="../assets/images/user/2.png" alt="">Gavin Joyce</td>
                            <td>Developer</td>
                            <td>Edinburgh</td>
                            <td>42</td>
                            <td>2010/12/22</td>
                            <td>$92,575</td>
                            <td> 
                              <ul class="action"> 
                                <li class="edit"> <a href="#"><i class="icon-pencil-alt"></i></a></li>
                                <li class="delete"><a href="#"><i class="icon-trash"></i></a></li>
                              </ul>
                            </td>
                          </tr><tr role="row" class="odd">
                            <td class="sorting_1"> <img class="img-fluid table-avtar" src="../assets/images/user/2.png" alt="">Gloria Little</td>
                            <td>Systems Administrator</td>
                            <td>New York</td>
                            <td>59</td>
                            <td>2009/04/10</td>
                            <td>$237,500</td>
                            <td> 
                              <ul class="action"> 
                                <li class="edit"> <a href="#"><i class="icon-pencil-alt"></i></a></li>
                                <li class="delete"><a href="#"><i class="icon-trash"></i></a></li>
                              </ul>
                            </td>
                          </tr><tr role="row" class="even">
                            <td class="sorting_1"> <img class="img-fluid table-avtar" src="../assets/images/user/2.png" alt="">Haley Kennedy</td>
                            <td>Senior Marketing Designer</td>
                            <td>London</td>
                            <td>43</td>
                            <td>2012/12/18</td>
                            <td>$313,500</td>
                            <td> 
                              <ul class="action"> 
                                <li class="edit"> <a href="#"><i class="icon-pencil-alt"></i></a></li>
                                <li class="delete"><a href="#"><i class="icon-trash"></i></a></li>
                              </ul>
                            </td>
                          </tr><tr role="row" class="odd">
                            <td class="sorting_1"> <img class="img-fluid table-avtar" src="../assets/images/user/12.png" alt="">Hermione Butler</td>
                            <td>Regional Director</td>
                            <td>London</td>
                            <td>47</td>
                            <td>2011/03/21</td>
                            <td>$356,250</td>
                            <td> 
                              <ul class="action"> 
                                <li class="edit"> <a href="#"><i class="icon-pencil-alt"></i></a></li>
                                <li class="delete"><a href="#"><i class="icon-trash"></i></a></li>
                              </ul>
                            </td>
                          </tr><tr role="row" class="even">
                            <td class="sorting_1"> <img class="img-fluid table-avtar" src="../assets/images/user/2.png" alt="">Herrod Chandler</td>
                            <td>Sales Assistant</td>
                            <td>San Francisco</td>
                            <td>59</td>
                            <td>2012/08/06</td>
                            <td>$137,500</td>
                            <td> 
                              <ul class="action"> 
                                <li class="edit"> <a href="#"><i class="icon-pencil-alt"></i></a></li>
                                <li class="delete"><a href="#"><i class="icon-trash"></i></a></li>
                              </ul>
                            </td>
                          </tr><tr role="row" class="odd">
                            <td class="sorting_1"> <img class="img-fluid table-avtar" src="../assets/images/user/2.png" alt="">Hope Fuentes</td>
                            <td>Secretary</td>
                            <td>San Francisco</td>
                            <td>41</td>
                            <td>2010/02/12</td>
                            <td>$109,850</td>
                            <td> 
                              <ul class="action"> 
                                <li class="edit"> <a href="#"><i class="icon-pencil-alt"></i></a></li>
                                <li class="delete"><a href="#"><i class="icon-trash"></i></a></li>
                              </ul>
                            </td>
                          </tr><tr role="row" class="even">
                            <td class="sorting_1"> <img class="img-fluid table-avtar" src="../assets/images/user/1.jpg" alt="">Howard Hatfield</td>
                            <td>Office Manager</td>
                            <td>San Francisco</td>
                            <td>51</td>
                            <td>2008/12/16</td>
                            <td>$164,500</td>
                            <td> 
                              <ul class="action"> 
                                <li class="edit"> <a href="#"><i class="icon-pencil-alt"></i></a></li>
                                <li class="delete"><a href="#"><i class="icon-trash"></i></a></li>
                              </ul>
                            </td>
                          </tr><tr role="row" class="odd">
                            <td class="sorting_1"> <img class="img-fluid table-avtar" src="../assets/images/user/1.jpg" alt="">Jackson Bradshaw</td>
                            <td>Director</td>
                            <td>New York</td>
                            <td>65</td>
                            <td>2008/09/26</td>
                            <td>$645,750</td>
                            <td> 
                              <ul class="action"> 
                                <li class="edit"> <a href="#"><i class="icon-pencil-alt"></i></a></li>
                                <li class="delete"><a href="#"><i class="icon-trash"></i></a></li>
                              </ul>
                            </td>
                          </tr><tr role="row" class="even">
                            <td class="sorting_1"> <img class="img-fluid table-avtar" src="../assets/images/user/2.jpg" alt="">Jena Gaines</td>
                            <td>Office Manager</td>
                            <td>London</td>
                            <td>30</td>
                            <td>2008/12/19</td>
                            <td>$90,560</td>
                            <td> 
                              <ul class="action"> 
                                <li class="edit"> <a href="#"><i class="icon-pencil-alt"></i></a></li>
                                <li class="delete"><a href="#"><i class="icon-trash"></i></a></li>
                              </ul>
                            </td>
                          </tr><tr role="row" class="odd">
                            <td class="sorting_1"> <img class="img-fluid table-avtar" src="../assets/images/user/2.jpg" alt="">Jenette Caldwell</td>
                            <td>Development Lead</td>
                            <td>New York</td>
                            <td>30</td>
                            <td>2011/09/03</td>
                            <td>$345,000</td>
                            <td> 
                              <ul class="action"> 
                                <li class="edit"> <a href="#"><i class="icon-pencil-alt"></i></a></li>
                                <li class="delete"><a href="#"><i class="icon-trash"></i></a></li>
                              </ul>
                            </td>
                          </tr><tr role="row" class="even">
                            <td class="sorting_1"> <img class="img-fluid table-avtar" src="../assets/images/user/2.png" alt="">Jennifer Acosta</td>
                            <td>Junior Javascript Developer</td>
                            <td>Edinburgh</td>
                            <td>43</td>
                            <td>2013/02/01</td>
                            <td>$75,650</td>
                            <td> 
                              <ul class="action"> 
                                <li class="edit"> <a href="#"><i class="icon-pencil-alt"></i></a></li>
                                <li class="delete"><a href="#"><i class="icon-trash"></i></a></li>
                              </ul>
                            </td>
                          </tr><tr role="row" class="odd">
                            <td class="sorting_1"> <img class="img-fluid table-avtar" src="../assets/images/user/2.jpg" alt="">Jennifer Chang</td>
                            <td>Regional Director</td>
                            <td>Singapore</td>
                            <td>28</td>
                            <td>2010/11/14</td>
                            <td>$357,650</td>
                            <td> 
                              <ul class="action"> 
                                <li class="edit"> <a href="#"><i class="icon-pencil-alt"></i></a></li>
                                <li class="delete"><a href="#"><i class="icon-trash"></i></a></li>
                              </ul>
                            </td>
                          </tr><tr role="row" class="even">
                            <td class="sorting_1"> <img class="img-fluid table-avtar" src="../assets/images/user/2.png" alt="">Jonas Alexander</td>
                            <td>Developer</td>
                            <td>San Francisco</td>
                            <td>30</td>
                            <td>2010/07/14</td>
                            <td>$86,500</td>
                            <td> 
                              <ul class="action"> 
                                <li class="edit"> <a href="#"><i class="icon-pencil-alt"></i></a></li>
                                <li class="delete"><a href="#"><i class="icon-trash"></i></a></li>
                              </ul>
                            </td>
                          </tr><tr role="row" class="odd">
                            <td class="sorting_1"> <img class="img-fluid table-avtar" src="../assets/images/user/1.jpg" alt="">Lael Greer</td>
                            <td>Systems Administrator</td>
                            <td>London</td>
                            <td>21</td>
                            <td>2009/02/27</td>
                            <td>$103,500</td>
                            <td> 
                              <ul class="action"> 
                                <li class="edit"> <a href="#"><i class="icon-pencil-alt"></i></a></li>
                                <li class="delete"><a href="#"><i class="icon-trash"></i></a></li>
                              </ul>
                            </td>
                          </tr><tr role="row" class="even">
                            <td class="sorting_1"> <img class="img-fluid table-avtar" src="../assets/images/user/2.jpg" alt="">Martena Mccray</td>
                            <td>Post-Sales support</td>
                            <td>Edinburgh</td>
                            <td>46</td>
                            <td>2011/03/09</td>
                            <td>$324,050</td>
                            <td> 
                              <ul class="action"> 
                                <li class="edit"> <a href="#"><i class="icon-pencil-alt"></i></a></li>
                                <li class="delete"><a href="#"><i class="icon-trash"></i></a></li>
                              </ul>
                            </td>
                          </tr><tr role="row" class="odd">
                            <td class="sorting_1"> <img class="img-fluid table-avtar" src="../assets/images/user/12.png" alt="">Michael Bruce</td>
                            <td>Javascript Developer</td>
                            <td>Singapore</td>
                            <td>29</td>
                            <td>2011/06/27</td>
                            <td>$183,000</td>
                            <td> 
                              <ul class="action"> 
                                <li class="edit"> <a href="#"><i class="icon-pencil-alt"></i></a></li>
                                <li class="delete"><a href="#"><i class="icon-trash"></i></a></li>
                              </ul>
                            </td>
                          </tr><tr role="row" class="even">
                            <td class="sorting_1"> <img class="img-fluid table-avtar" src="../assets/images/user/12.png" alt="">Michael Silva</td>
                            <td>Marketing Designer</td>
                            <td>London</td>
                            <td>66</td>
                            <td>2012/11/27</td>
                            <td>$198,500</td>
                            <td> 
                              <ul class="action"> 
                                <li class="edit"> <a href="#"><i class="icon-pencil-alt"></i></a></li>
                                <li class="delete"><a href="#"><i class="icon-trash"></i></a></li>
                              </ul>
                            </td>
                          </tr><tr role="row" class="odd">
                            <td class="sorting_1"> <img class="img-fluid table-avtar" src="../assets/images/user/2.jpg" alt="">Michelle House</td>
                            <td>Integration Specialist</td>
                            <td>Sidney</td>
                            <td>37</td>
                            <td>2011/06/02</td>
                            <td>$95,400</td>
                            <td> 
                              <ul class="action"> 
                                <li class="edit"> <a href="#"><i class="icon-pencil-alt"></i></a></li>
                                <li class="delete"><a href="#"><i class="icon-trash"></i></a></li>
                              </ul>
                            </td>
                          </tr><tr role="row" class="even">
                            <td class="sorting_1"> <img class="img-fluid table-avtar" src="../assets/images/user/2.jpg" alt="">Olivia Liang</td>
                            <td>Support Engineer</td>
                            <td>Singapore</td>
                            <td>64</td>
                            <td>2011/02/03</td>
                            <td>$234,500</td>
                            <td> 
                              <ul class="action"> 
                                <li class="edit"> <a href="#"><i class="icon-pencil-alt"></i></a></li>
                                <li class="delete"><a href="#"><i class="icon-trash"></i></a></li>
                              </ul>
                            </td>
                          </tr><tr role="row" class="odd">
                            <td class="sorting_1"> <img class="img-fluid table-avtar" src="../assets/images/user/1.jpg" alt="">Paul Byrd</td>
                            <td>Chief Financial Officer (CFO)</td>
                            <td>New York</td>
                            <td>64</td>
                            <td>2010/06/09</td>
                            <td>$725,000</td>
                            <td> 
                              <ul class="action"> 
                                <li class="edit"> <a href="#"><i class="icon-pencil-alt"></i></a></li>
                                <li class="delete"><a href="#"><i class="icon-trash"></i></a></li>
                              </ul>
                            </td>
                          </tr><tr role="row" class="even">
                            <td class="sorting_1"> <img class="img-fluid table-avtar" src="../assets/images/user/1.jpg" alt="">Prescott Bartlett</td>
                            <td>Technical Author</td>
                            <td>London</td>
                            <td>27</td>
                            <td>2011/05/07</td>
                            <td>$145,000</td>
                            <td> 
                              <ul class="action"> 
                                <li class="edit"> <a href="#"><i class="icon-pencil-alt"></i></a></li>
                                <li class="delete"><a href="#"><i class="icon-trash"></i></a></li>
                              </ul>
                            </td>
                          </tr><tr role="row" class="odd">
                            <td class="sorting_1"> <img class="img-fluid table-avtar" src="../assets/images/user/12.png" alt="">Quinn Flynn</td>
                            <td>Support Lead</td>
                            <td>Edinburgh</td>
                            <td>22</td>
                            <td>2013/03/03</td>
                            <td>$342,000</td>
                            <td> 
                              <ul class="action"> 
                                <li class="edit"> <a href="#"><i class="icon-pencil-alt"></i></a></li>
                                <li class="delete"><a href="#"><i class="icon-trash"></i></a></li>
                              </ul>
                            </td>
                          </tr><tr role="row" class="even">
                            <td class="sorting_1"> <img class="img-fluid table-avtar" src="../assets/images/user/12.png" alt="">Rhona Davidson</td>
                            <td>Integration Specialist</td>
                            <td>Tokyo</td>
                            <td>55</td>
                            <td>2010/10/14</td>
                            <td>$327,900</td>
                            <td> 
                              <ul class="action"> 
                                <li class="edit"> <a href="#"><i class="icon-pencil-alt"></i></a></li>
                                <li class="delete"><a href="#"><i class="icon-trash"></i></a></li>
                              </ul>
                            </td>
                          </tr><tr role="row" class="odd">
                            <td class="sorting_1"> <img class="img-fluid table-avtar" src="../assets/images/user/12.png" alt="">Sakura Yamamoto</td>
                            <td>Support Engineer</td>
                            <td>Tokyo</td>
                            <td>37</td>
                            <td>2009/08/19</td>
                            <td>$139,575</td>
                            <td> 
                              <ul class="action"> 
                                <li class="edit"> <a href="#"><i class="icon-pencil-alt"></i></a></li>
                                <li class="delete"><a href="#"><i class="icon-trash"></i></a></li>
                              </ul>
                            </td>
                          </tr><tr role="row" class="even">
                            <td class="sorting_1"> <img class="img-fluid table-avtar" src="../assets/images/user/2.jpg" alt="">Serge Baldwin</td>
                            <td>Data Coordinator</td>
                            <td>Singapore</td>
                            <td>64</td>
                            <td>2012/04/09</td>
                            <td>$138,575</td>
                            <td> 
                              <ul class="action"> 
                                <li class="edit"> <a href="#"><i class="icon-pencil-alt"></i></a></li>
                                <li class="delete"><a href="#"><i class="icon-trash"></i></a></li>
                              </ul>
                            </td>
                          </tr><tr role="row" class="odd">
                            <td class="sorting_1"> <img class="img-fluid table-avtar" src="../assets/images/user/2.jpg" alt="">Shad Decker</td>
                            <td>Regional Director</td>
                            <td>Edinburgh</td>
                            <td>51</td>
                            <td>2008/11/13</td>
                            <td>$183,000</td>
                            <td> 
                              <ul class="action"> 
                                <li class="edit"> <a href="#"><i class="icon-pencil-alt"></i></a></li>
                                <li class="delete"><a href="#"><i class="icon-trash"></i></a></li>
                              </ul>
                            </td>
                          </tr><tr role="row" class="even">
                            <td class="sorting_1"> <img class="img-fluid table-avtar" src="../assets/images/user/2.png" alt="">Shou Itou</td>
                            <td>Regional Marketing</td>
                            <td>Tokyo</td>
                            <td>20</td>
                            <td>2011/08/14</td>
                            <td>$163,000</td>
                            <td> 
                              <ul class="action"> 
                                <li class="edit"> <a href="#"><i class="icon-pencil-alt"></i></a></li>
                                <li class="delete"><a href="#"><i class="icon-trash"></i></a></li>
                              </ul>
                            </td>
                          </tr><tr role="row" class="odd">
                            <td class="sorting_1"> <img class="img-fluid table-avtar" src="../assets/images/user/2.png" alt="">Sonya Frost</td>
                            <td>Software Engineer</td>
                            <td>Edinburgh</td>
                            <td>23</td>
                            <td>2008/12/13</td>
                            <td>$103,600</td>
                            <td> 
                              <ul class="action"> 
                                <li class="edit"> <a href="#"><i class="icon-pencil-alt"></i></a></li>
                                <li class="delete"><a href="#"><i class="icon-trash"></i></a></li>
                              </ul>
                            </td>
                          </tr><tr role="row" class="even">
                            <td class="sorting_1"> <img class="img-fluid table-avtar" src="../assets/images/user/12.png" alt="">Suki Burks</td>
                            <td>Developer</td>
                            <td>London</td>
                            <td>53</td>
                            <td>2009/10/22</td>
                            <td>$114,500</td>
                            <td> 
                              <ul class="action"> 
                                <li class="edit"> <a href="#"><i class="icon-pencil-alt"></i></a></li>
                                <li class="delete"><a href="#"><i class="icon-trash"></i></a></li>
                              </ul>
                            </td>
                          </tr><tr role="row" class="odd">
                            <td class="sorting_1"> <img class="img-fluid table-avtar" src="../assets/images/user/2.jpg" alt="">Tatyana Fitzpatrick</td>
                            <td>Regional Director</td>
                            <td>London</td>
                            <td>19</td>
                            <td>2010/03/17</td>
                            <td>$385,750</td>
                            <td> 
                              <ul class="action"> 
                                <li class="edit"> <a href="#"><i class="icon-pencil-alt"></i></a></li>
                                <li class="delete"><a href="#"><i class="icon-trash"></i></a></li>
                              </ul>
                            </td>
                          </tr><tr role="row" class="even">
                            <td class="sorting_1"> <img class="img-fluid table-avtar" src="../assets/images/user/1.jpg" alt="">Thor Walton</td>
                            <td>Developer</td>
                            <td>New York</td>
                            <td>61</td>
                            <td>2013/08/11</td>
                            <td>$98,540</td>
                            <td> 
                              <ul class="action"> 
                                <li class="edit"> <a href="#"><i class="icon-pencil-alt"></i></a></li>
                                <li class="delete"><a href="#"><i class="icon-trash"></i></a></li>
                              </ul>
                            </td>
                          </tr><tr role="row" class="odd">
                            <td class="sorting_1"> <img class="img-fluid table-avtar" src="../assets/images/user/1.jpg" alt="">Tiger Nixon</td>
                            <td>System Architect</td>
                            <td>Edinburgh</td>
                            <td>61</td>
                            <td>2011/04/25</td>
                            <td>$320,800</td>
                            <td> 
                              <ul class="action"> 
                                <li class="edit"> <a href="#"><i class="icon-pencil-alt"></i></a></li>
                                <li class="delete"><a href="#"><i class="icon-trash"></i></a></li>
                              </ul>
                            </td>
                          </tr><tr role="row" class="even">
                            <td class="sorting_1"> <img class="img-fluid table-avtar" src="../assets/images/user/12.png" alt="">Timothy Mooney</td>
                            <td>Office Manager</td>
                            <td>London</td>
                            <td>37</td>
                            <td>2008/12/11</td>
                            <td>$136,200</td>
                            <td> 
                              <ul class="action"> 
                                <li class="edit"> <a href="#"><i class="icon-pencil-alt"></i></a></li>
                                <li class="delete"><a href="#"><i class="icon-trash"></i></a></li>
                              </ul>
                            </td>
                          </tr><tr role="row" class="odd">
                            <td class="sorting_1"> <img class="img-fluid table-avtar" src="../assets/images/user/12.png" alt="">Unity Butler</td>
                            <td>Marketing Designer</td>
                            <td>San Francisco</td>
                            <td>47</td>
                            <td>2009/12/09</td>
                            <td>$85,675</td>
                            <td> 
                              <ul class="action"> 
                                <li class="edit"> <a href="#"><i class="icon-pencil-alt"></i></a></li>
                                <li class="delete"><a href="#"><i class="icon-trash"></i></a></li>
                              </ul>
                            </td>
                          </tr><tr role="row" class="even">
                            <td class="sorting_1"> <img class="img-fluid table-avtar" src="../assets/images/user/2.jpg" alt="">Vivian Harrell</td>
                            <td>Financial Controller</td>
                            <td>San Francisco</td>
                            <td>62</td>
                            <td>2009/02/14</td>
                            <td>$452,500</td>
                            <td> 
                              <ul class="action"> 
                                <li class="edit"> <a href="#"><i class="icon-pencil-alt"></i></a></li>
                                <li class="delete"><a href="#"><i class="icon-trash"></i></a></li>
                              </ul>
                            </td>
                          </tr><tr role="row" class="odd">
                            <td class="sorting_1"> <img class="img-fluid table-avtar" src="../assets/images/user/2.png" alt="">Yuri Berry</td>
                            <td>Chief Marketing Officer (CMO)</td>
                            <td>New York</td>
                            <td>40</td>
                            <td>2009/06/25</td>
                            <td>$675,000</td>
                            <td> 
                              <ul class="action"> 
                                <li class="edit"> <a href="#"><i class="icon-pencil-alt"></i></a></li>
                                <li class="delete"><a href="#"><i class="icon-trash"></i></a></li>
                              </ul>
                            </td>
                          </tr><tr role="row" class="even">
                            <td class="sorting_1"> <img class="img-fluid table-avtar" src="../assets/images/user/12.png" alt="">Zenaida Frank</td>
                            <td>Software Engineer</td>
                            <td>New York</td>
                            <td>63</td>
                            <td>2010/01/04</td>
                            <td>$125,250</td>
                            <td> 
                              <ul class="action"> 
                                <li class="edit"> <a href="#"><i class="icon-pencil-alt"></i></a></li>
                                <li class="delete"><a href="#"><i class="icon-trash"></i></a></li>
                              </ul>
                            </td>
                          </tr><tr role="row" class="odd">
                            <td class="sorting_1"> <img class="img-fluid table-avtar" src="../assets/images/user/1.jpg" alt="">Zorita Serrano</td>
                            <td>Software Engineer</td>
                            <td>San Francisco</td>
                            <td>56</td>
                            <td>2012/06/01</td>
                            <td>$115,000</td>
                            <td> 
                              <ul class="action"> 
                                <li class="edit"> <a href="#"><i class="icon-pencil-alt"></i></a></li>
                                <li class="delete"><a href="#"><i class="icon-trash"></i></a></li>
                              </ul>
                            </td>
                          </tr></tbody>
                        
                      </table></div><div class="dataTables_scrollFoot" style="overflow: hidden; border: 0px; width: 100%;"><div class="dataTables_scrollFootInner" style="width: 1142.4px; padding-right: 17px;"><table class="display dataTable" role="grid" style="margin-left: 0px; width: 1142.4px;"><tfoot>
                          <tr><th rowspan="1" colspan="1" style="width: 220.587px;">Name</th><th rowspan="1" colspan="1" style="width: 251.725px;">Position</th><th rowspan="1" colspan="1" style="width: 127.537px;">Office</th><th rowspan="1" colspan="1" style="width: 64.85px;">Age</th><th rowspan="1" colspan="1" style="width: 117.662px;">Start date</th><th rowspan="1" colspan="1" style="width: 101.787px;">Salary</th></tr>
                        </tfoot></table></div></div></div><div class="dataTables_info" id="basic-12_info" role="status" aria-live="polite">Showing 1 to 57 of 57 entries</div></div>
                    </div>
                  </div>
                </div>
              </div>
              <!-- Scroll - vertical dynamic Ends-->
            </div>
          </div>
          <!-- Container-fluid Ends-->
        </div>
        <div class="card-footer text-end">
          <a class="btn btn-primary" href="/admin/KhachHang">Quay Lại</a>
        </div>
        </form>
      </div>
      </div>
    </div>
    </div>
    <!-- Container-fluid Ends-->
  </div>

@endsection