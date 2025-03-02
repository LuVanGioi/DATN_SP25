<!DOCTYPE html>
<html lang="vi">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    @yield("title")
    <link rel="apple-touch-icon-precomposed" sizes="144x144" href="">
    <link rel="shortcut icon" href="">
    <link href="/clients/css/bootstrap.min.css" rel="stylesheet">
    <link href="/clients/css/bootstrap-select.min.css" rel="stylesheet">
    <link href="/clients/css/font-awesome.min.css" rel="stylesheet">
    <link href="/clients/css/prettyPhoto.css" rel="stylesheet">
    <link href="/clients/css/owl.carousel.min.css" rel="stylesheet">
    <link href="/clients/css/owl.theme.default.min.css" rel="stylesheet">
    <link href="/clients/css/animate.min.css" rel="stylesheet">
    <link href="/clients/css/theme.css" rel="stylesheet">
    <link href="/clients/css/theme-green-1.css" rel="stylesheet" id="theme-config-link">
    <script src="/clients/js/modernizr.custom.js"></script>

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.0/css/all.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css">
    <link rel="stylesheet" href="https://site-assets.fontawesome.com/releases/v6.7.2/css/all.css">
    <link rel="stylesheet"
        href="https://cdnjs.cloudflare.com/ajax/libs/limonte-sweetalert2/11.4.14/sweetalert2.min.css">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/limonte-sweetalert2/11.4.14/sweetalert2.min.js"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.css">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/clipboard@2.0.10/dist/clipboard.min.js"></script>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/swiper@9/swiper-bundle.min.css" />

    <link rel="stylesheet" href="/clients/css/style.css?t=<?=time();?>">
    @yield("css")
</head>

<body id="home" class="wide">
    <div id="preloader">
        <div id="preloader-status">
            <div class="spinner">
                <div class="rect1"></div>
                <div class="rect2"></div>
                <div class="rect3"></div>
                <div class="rect4"></div>
                <div class="rect5"></div>
            </div>
            <div id="preloader-title">Loading</div>
        </div>
    </div>

    <div class="wrapper">
        <div class="modal fade popup-cart" id="popup-cart" tabindex="-1" role="dialog" aria-hidden="true">
            <div class="modal-dialog">
                <div class="container">
                    <div class="cart-items">
                        <div class="cart-items-inner">
                            <div class="media">
                                <a class="pull-left" href="#"><img class="media-object item-image"
                                        src="/clients/images/order-1s.jpg" alt=""></a>
                                <p class="pull-right item-price">$450.00</p>
                                <div class="media-body">
                                    <h4 class="media-heading item-title"><a href="#">1x Standard Product</a></h4>
                                    <p class="item-desc">Lorem ipsum dolor</p>
                                </div>
                            </div>
                            <div class="media">
                                <p class="pull-right item-price">$450.00</p>
                                <div class="media-body">
                                    <h4 class="media-heading item-title summary">Subtotal</h4>
                                </div>
                            </div>
                            <div class="media">
                                <div class="media-body">
                                    <div>
                                        <a href="#" class="btn btn-theme btn-theme-dark" data-dismiss="modal">
                                            Close
                                        </a>
                                        <a href="/gio-hang"
                                            class="btn btn-theme btn-theme-transparent btn-call-checkout">Checkout
                                        </a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        @include("clients.Block.header")

        <div class="content-area">
            @yield("main")
        </div>

        <footer class="footer">
            @include("clients.Block.foot")
        </footer>
        <div id="to-top" class="to-top"><i class="fas fa-angle-up"></i></div>
    </div>

    <script src="/clients/js/jquery-1.11.1.min.js"></script>
    <script src="/clients/js/bootstrap.min.js"></script>
    <script src="/clients/js/bootstrap-select.min.js"></script>
    <script src="/clients/js/superfish.min.js"></script>
    <script src="/clients/js/jquery.prettyPhoto.js"></script>
    <script src="/clients/js/owl.carousel.min.js"></script>
    <script src="/clients/js/jquery.sticky.min.js"></script>
    <script src="/clients/js/jquery.easing.min.js"></script>
    <script src="/clients/js/jquery.smoothscroll.min.js"></script>
    <script src="/clients/js/smooth-scrollbar.min.js"></script>
    <script src="/clients/js/theme.js"></script>
    <script src="/clients/js/jquery.cookie.js"></script>
    <script>
        window.gtranslateSettings = {
            "default_language": "vi",
            "native_language_names": true,
            "detect_browser_language": true,
            "wrapper_selector": ".gtranslate_wrapper"
        }
    </script>
    <script src="https://cdn.gtranslate.net/widgets/latest/dropdown.js" defer></script>

    @yield("js")
</body>

</html>