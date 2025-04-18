@extends("clients.themes")

@section("title")
    <title>Câu Hỏi Thường Gặp - Wanderweave</title>
@endsection

@section('main')
    <section class="page-section breadcrumbs">
        <div class="container">
            <div class="page-header">
                <h1>Câu Hỏi Thường Gặp</h1>
            </div>
            <ul class="breadcrumb"></ul>
        </div>
    </section>

    <section class="page-section color">
        <div class="container">
            <p class="lead">Dưới đây là những câu hỏi thường gặp về việc mua sắm tại Wanderweave. Nếu bạn có bất kỳ câu hỏi
                nào khác, vui lòng liên hệ với chúng tôi.</p>
            <div class="panel-group accordion" id="accordion" role="tablist" aria-multiselectable="true">

{{-- đang lỗi form chữ đổ dữ liệu ra --}}

                <div class="panel-group accordion" id="accordion" role="tablist" aria-multiselectable="true">
                    @foreach($faq as $item)
                        <div class="panel panel-default">
                            <div class="panel-heading" role="tab" id="heading{{ $item->id }}">
                                <h4 class="panel-title">
                                    <a data-toggle="collapse" data-parent="#accordion" href="#collapse{{ $item->id }}"
                                       aria-expanded="false" aria-controls="collapse{{ $item->id }}">
                                        <span class="dot"></span> {{ $item->TieuDe }}
                                    </a>
                                </h4>
                            </div>
                            <div id="collapse{{ $item->id }}" class="panel-collapse collapse" role="tabpanel"
                                 aria-labelledby="heading{{ $item->id }}">
                                <div class="panel-body">
                                    {!! $item->NoiDung !!}
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>
              
            </div>
        </div>
    </section>

   
@endsection