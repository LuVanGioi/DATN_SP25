<!DOCTYPE html>
<html lang="vi">

<head>
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="">
    <meta name="keywords" content="">
    <meta name="author" content="DATN_SP25">
    <link rel="icon" href="/admins/images/favicon.png" type="image/x-icon">
    <link rel="shortcut icon" href="/admins/images/favicon.png" type="image/x-icon">
    @yield("titleHead")

    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin="">
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@200;300;400;500;600;700;800&amp;display=swap" rel="stylesheet">
    <link rel="stylesheet" type="text/css" href="/admins/css/font-awesome.css">
    <link rel="stylesheet" type="text/css" href="/admins/css/icofont.css">
    <link rel="stylesheet" type="text/css" href="/admins/css/themify.css">
    <link rel="stylesheet" type="text/css" href="/admins/css/flag-icon.css">
    <link rel="stylesheet" type="text/css" href="/admins/css/feather-icon.css">
    <link rel="stylesheet" type="text/css" href="/admins/css/slick.css">
    <link rel="stylesheet" type="text/css" href="/admins/css/slick-theme.css">
    <link rel="stylesheet" type="text/css" href="/admins/css/scrollbar.css">
    <link rel="stylesheet" type="text/css" href="/admins/css/animate.css">
    <link rel="stylesheet" type="text/css" href="/admins/css/owlcarousel.css">

    <link rel="stylesheet" type="text/css" href="/admins/css/echart.css">
    <link rel="stylesheet" type="text/css" href="/admins/css/date-picker.css">
    <link rel="stylesheet" type="text/css" href="/admins/css/bootstrap.css">
    <link rel="stylesheet" type="text/css" href="/admins/css/style.css">
    <link id="color" rel="stylesheet" href="/admins/css/color-1.css" media="screen">
    <link rel="stylesheet" type="text/css" href="/admins/css/responsive.css">
    

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.0/css/all.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css">
    <link rel="stylesheet" href="https://site-assets.fontawesome.com/releases/v6.7.2/css/all.css">
    <link rel="stylesheet" href="https://site-assets.fontawesome.com/releases/v6.7.2/css/sharp-duotone-thin.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/limonte-sweetalert2/11.4.14/sweetalert2.min.css">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/limonte-sweetalert2/11.4.14/sweetalert2.min.js"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.css">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/clipboard@2.0.10/dist/clipboard.min.js"></script>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/swiper@9/swiper-bundle.min.css" />

    <link rel="stylesheet" type="text/css" href="//cdn.datatables.net/2.2.2/css/dataTables.dataTables.min.css">
    <script src="//cdn.datatables.net/2.2.2/js/dataTables.min.js"></script>


    <script src="https://cdn.ckeditor.com/4.20.2/standard/ckeditor.js"></script>
    
    <link rel="stylesheet" href="/admins/css/system.css?m={{time()}}">

    @yield("css")
</head>

<body>

    <div class="loader-wrapper">
        <div class="loader">
            <div class="loader4"></div>
        </div>
    </div>

    <div class="tap-top"><i data-feather="chevrons-up"></i></div>

    <div class="page-wrapper compact-wrapper" id="pageWrapper">
        @include("admins.blocks.header")

        <div class="page-body-wrapper">
            <div class="sidebar-wrapper" data-layout="stroke-svg">
                @include("admins.blocks.sidebar")
            </div>
            @yield("main")

            <footer class="footer">
                @include("admins.blocks.foot")
            </footer>
        </div>
    </div>

    <!-- <script src="/admins/js/jquery.min.js"></script> -->
    <script src="/admins/js/bootstrap.bundle.min.js"></script>
    <script src="/admins/js/feather.min.js"></script>
    <script src="/admins/js/feather-icon.js"></script>
    <script src="/admins/js/simplebar.js"></script>
    <script src="/admins/js/custom.js"></script>
    <script src="/admins/js/config_1.js"></script>
    <script src="/admins/js/sidebar-menu.js"></script>
    <script src="/admins/js/sidebar-pin.js"></script>
    <script src="/admins/js/slick.min.js"></script>
    <script src="/admins/js/slick.js"></script>
    <script src="/admins/js/header-slick.js"></script>
    <script src="/admins/js/owl.carousel.js"></script>
    <script src="/admins/js/owl-custom.js"></script>
    
    <script src="/admins/js/apex-chart.js"></script>
    <script src="/admins/js/stock-prices.js"></script>
    <script src="/admins/js/moment.min.js"></script>
    <script src="/admins/js/esl.js"></script>
    <script src="/admins/js/config.js"></script>
    <script src="/admins/js/facePrint.js"></script>
    <script src="/admins/js/testHelper.js"></script>
    <script src="/admins/js/custom-transition-texture.js"></script>
    <script src="/admins/js/symbols.js"></script>
    <script src="/admins/js/datepicker.js"></script>
    <script src="/admins/js/datepicker.en.js"></script>
    <script src="/admins/js/datepicker.custom.js"></script>
    <script src="/admins/js/script.js"></script>
    <script>
        $(document).ready(function() {
            $('.dataTable').DataTable();
        });

        document.querySelectorAll('.note-DATN').forEach((el) => {
            CKEDITOR.replace(el);
        });
    </script>

    @yield("js")
</body>

</html>