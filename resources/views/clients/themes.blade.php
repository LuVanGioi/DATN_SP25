<!DOCTYPE html>
<html lang="vi">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    @yield("title")
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.7.2/font/bootstrap-icons.css">
    <meta name="author" content="WanderWeave">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <link rel="icon" href="{{ Storage::url($caiDatWebsite->Favicon_website) }}" type="image/x-icon">
    <meta name="description" content="{{ $caiDatWebsite->MoTa }}">
    <meta name="keywords" content="{{ $caiDatWebsite->TuKhoa }}">
    <meta property="og:title" content="{{ $caiDatWebsite->TenCuaHang }} | Cửa Hàng Quần Áo Uy Tín - Chất Lượng Số 1 Việt Nam">
    <meta property="og:type" content="Website">
    <meta property="og:description" content="{{ $caiDatWebsite->MoTa }}">
    <meta property="og:site_name" content="{{ $caiDatWebsite->TenCuaHang }} | Cửa Hàng Quần Áo Uy Tín - Chất Lượng Số 1 Việt Nam">
    <meta property="article:section" content="{{ $caiDatWebsite->MoTa }}">
    <meta property="article:tag" content="{{ $caiDatWebsite->TenCuaHang }} | Cửa Hàng Quần Áo Uy Tín - Chất Lượng Số 1 Việt Nam">
    <meta property="og:image" content="{{ Storage::url($caiDatWebsite->Bia_website) }}">
    <meta name="twitter:card" content="{{ Storage::url($caiDatWebsite->Bia_website) }}">
    <meta name="twitter:image:src" content="{{ Storage::url($caiDatWebsite->Bia_website) }}">
    <link rel="icon" href="{{ Storage::url($caiDatWebsite->Favicon_website) }}">
    <link rel="apple-touch-icon" href="{{ Storage::url($caiDatWebsite->Favicon_website) }}">
    <meta name="twitter:title" content="{{ $caiDatWebsite->TenCuaHang }} | Cửa Hàng Quần Áo Uy Tín - Chất Lượng Số 1 Việt Nam">
    <meta name="twitter:keywords" content="{{ $caiDatWebsite->TuKhoa }}">
    <meta name="twitter:description" content="{{ $caiDatWebsite->MoTa }}">

    <link href="/clients/css/bootstrap.min.css" rel="stylesheet">
    <link href="/clients/css/bootstrap-select.min.css" rel="stylesheet">
    <link href="/clients/css/font-awesome.min.css" rel="stylesheet">
    <link href="/clients/css/prettyPhoto.css" rel="stylesheet">
    <link href="/clients/css/owl.carousel.min.css" rel="stylesheet">
    <link href="/clients/css/owl.theme.default.min.css" rel="stylesheet">
    <link href="/clients/css/animate.min.css" rel="stylesheet">
    <link href="/clients/css/theme.css" rel="stylesheet">
    <link href="/clients/css/theme-green-1.css?t=<?= time(); ?>" rel="stylesheet" id="theme-config-link">
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

    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.7.2/font/bootstrap-icons.css">
    <link rel="stylesheet" href="/clients/css/style.css?t=<?= time(); ?>">

    <script src="https://js.pusher.com/7.0/pusher.min.js"></script>
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

        @include("clients.Block.header")

        <div class="content-area">
            @yield("main")
        </div>

        <footer class="footer">
            @include("clients.Block.foot")
        </footer>
        <div id="to-top" class="to-top"><i class="fas fa-angle-up"></i></div>

        <div id="alertContainer"></div>
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
    <script src="/clients/js/systemVIP.js?t=<?= time(); ?>"></script>
    <script>
        window.gtranslateSettings = {
            "default_language": "vi",
            "native_language_names": true,
            "detect_browser_language": true,
            "wrapper_selector": ".gtranslate_wrapper"
        }

        let alertQueue = [];

        function AlertDATN(type, message) {
            const alertContainer = document.getElementById("alertContainer");

            const alertBox = document.createElement("div");
            alertBox.classList.add("alertManhDev", "show", type === "success" ? "alertManhDevSuccess" : "alertManhDevError");

            alertBox.innerHTML = `
        <span class="icon">${type === "success" ? "<i class='fas fa-check'></i>" : "<i class='fas fa-triangle-exclamation'></i>"}</span>
        <span class="noteAlertManhDev">${message}</span>
        <button onclick="closeAlertManhDev(this.parentElement)"><i class='fas fa-times'></i></button>
    `;

            alertContainer.prepend(alertBox);
            alertQueue.push(alertBox);

            if (alertQueue.length > 3) {
                let firstAlert = alertQueue.shift();
                firstAlert.remove();
            }

            setTimeout(() => {
                closeAlertManhDev(alertBox);
            }, 3000);
        }

        function closeAlertManhDev(alert) {
            alert.classList.remove("show");
            setTimeout(() => {
                alert.remove();
                alertQueue = alertQueue.filter(item => item !== alert);
            }, 500);
        }
    </script>
    <script src="https://cdn.gtranslate.net/widgets/latest/dropdown.js" defer></script>

    @yield("js")
</body>

</html>