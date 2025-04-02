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
                <div class="panel panel-default">
                    <div class="panel-heading" role="tab" id="heading1">
                        <h4 class="panel-title">
                            <a data-toggle="collapse" data-parent="#accordion" href="#collapse1" aria-expanded="true"
                                aria-controls="collapse1">
                                <span class="dot"></span> Phí giao hàng cho các đơn hàng từ cửa hàng trực tuyến là bao
                                nhiêu?
                            </a>
                        </h4>
                    </div>
                    <div id="collapse1" class="panel-collapse collapse in" role="tabpanel" aria-labelledby="heading1">
                        <div class="panel-body">
                            Phí giao hàng sẽ được tính dựa trên địa chỉ giao hàng và trọng lượng của đơn hàng. Chi tiết phí
                            giao hàng sẽ được hiển thị trong quá trình thanh toán.
                        </div>
                    </div>
                </div>
                <div class="panel panel-default">
                    <div class="panel-heading" role="tab" id="heading2">
                        <h4 class="panel-title">
                            <a class="collapsed" data-toggle="collapse" data-parent="#accordion" href="#collapse2"
                                aria-expanded="false" aria-controls="collapse2">
                                <span class="dot"></span> Những phương thức thanh toán nào được chấp nhận tại cửa hàng trực
                                tuyến?
                            </a>
                        </h4>
                    </div>
                    <div id="collapse2" class="panel-collapse collapse" role="tabpanel" aria-labelledby="heading2">
                        <div class="panel-body">
                            Chúng tôi chấp nhận các phương thức thanh toán như thẻ tín dụng, thẻ ghi nợ, PayPal và chuyển
                            khoản ngân hàng.
                        </div>
                    </div>
                </div>
                <div class="panel panel-default">
                    <div class="panel-heading" role="tab" id="heading3">
                        <h4 class="panel-title">
                            <a class="collapsed" data-toggle="collapse" data-parent="#accordion" href="#collapse3"
                                aria-expanded="false" aria-controls="collapse3">
                                <span class="dot"></span> Thời gian giao hàng là bao lâu?
                            </a>
                        </h4>
                    </div>
                    <div id="collapse3" class="panel-collapse collapse" role="tabpanel" aria-labelledby="heading3">
                        <div class="panel-body">
                            Thời gian giao hàng thường từ 3-7 ngày làm việc tùy thuộc vào địa chỉ giao hàng của bạn. Chúng
                            tôi sẽ cung cấp thông tin theo dõi đơn hàng để bạn có thể kiểm tra trạng thái giao hàng.
                        </div>
                    </div>
                </div>
                <div class="panel panel-default">
                    <div class="panel-heading" role="tab" id="heading4">
                        <h4 class="panel-title">
                            <a class="collapsed" data-toggle="collapse" data-parent="#accordion" href="#collapse4"
                                aria-expanded="false" aria-controls="collapse4">
                                <span class="dot"></span> Mua sắm tại cửa hàng trực tuyến có an toàn không? Dữ liệu của tôi
                                có được bảo vệ không?
                            </a>
                        </h4>
                    </div>
                    <div id="collapse4" class="panel-collapse collapse" role="tabpanel" aria-labelledby="heading4">
                        <div class="panel-body">
                            Chúng tôi sử dụng các biện pháp bảo mật tiên tiến để bảo vệ thông tin cá nhân và dữ liệu thanh
                            toán của bạn. Mọi giao dịch đều được mã hóa và bảo mật.
                        </div>
                    </div>
                </div>
                <div class="panel panel-default">
                    <div class="panel-heading" role="tab" id="heading5">
                        <h4 class="panel-title">
                            <a class="collapsed" data-toggle="collapse" data-parent="#accordion" href="#collapse5"
                                aria-expanded="false" aria-controls="collapse5">
                                <span class="dot"></span> Điều gì sẽ xảy ra sau khi đặt hàng?
                            </a>
                        </h4>
                    </div>
                    <div id="collapse5" class="panel-collapse collapse" role="tabpanel" aria-labelledby="heading5">
                        <div class="panel-body">
                            Sau khi đặt hàng, bạn sẽ nhận được email xác nhận đơn hàng. Khi đơn hàng được giao, bạn sẽ nhận
                            được thông tin theo dõi để kiểm tra trạng thái giao hàng.
                        </div>
                    </div>
                </div>
                <div class="panel panel-default">
                    <div class="panel-heading" role="tab" id="heading6">
                        <h4 class="panel-title">
                            <a class="collapsed" data-toggle="collapse" data-parent="#accordion" href="#collapse6"
                                aria-expanded="false" aria-controls="collapse6">
                                <span class="dot"></span> Tôi có nhận được hóa đơn cho đơn hàng của mình không?
                            </a>
                        </h4>
                    </div>
                    <div id="collapse6" class="panel-collapse collapse" role="tabpanel" aria-labelledby="heading6">
                        <div class="panel-body">
                            Có, bạn sẽ nhận được hóa đơn điện tử qua email sau khi đơn hàng của bạn được xác nhận.
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

   
@endsection