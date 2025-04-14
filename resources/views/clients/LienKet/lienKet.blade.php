@extends("clients.themes")

@section("title")
    <title>{{ $lienKetWebsiteClientView->TieuDe }}</title>
@endsection

@section('main')
    <section class="page-section breadcrumbs">
        <div class="container">
            <div class="page-header">
                <h1>{{ $lienKetWebsiteClientView->TieuDe }}</h1>
            </div>
            <ul class="breadcrumb"></ul>
        </div>
    </section>

    <section class="page-section color">
        <div class="container">
            <p class="text-center lead">{!! $lienKetWebsiteClientView->NoiDung !!}</p>
        </div>
    </section>
@endsection