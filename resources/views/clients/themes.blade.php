<!DOCTYPE html>
<html lang="vi">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    @yield("title")
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.7.2/font/bootstrap-icons.css">
    <meta name="author" content="WanderWeave">
    <meta name="csrf-token" content="{{ csrf_token() }}">
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

    <script src="https://js.pusher.com/beams/2.1.0/push-notifications-cdn.js"></script>
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

        <div class="buy-now" id="order-list"></div>

        <?php if ($tien_ich_live_chat->TrangThai == "1"): ?>
            <div class="form-contact-DATN">
                <div class="form-chat" id="form-chat">
                    <div class="header-chat">
                        <div>
                            <img src="/clients/images/LOGO/favicon.png" alt="">
                        </div>
                        <div>
                            <span>Hỗ Trợ Khách Hàng</span>
                            <span>Online</span>
                        </div>
                    </div>
                    <div class="content-chat"></div>
                    <div class="list-image-chat" style="display: none;"></div>
                    <div class="button-chat">
                        <span>
                            <label for="images-chat">
                                <img src="/clients/images/icon/image-add.png" alt="">
                                <input type="file" class="d-none" name="images_chat" id="images-chat" multiple>
                            </label>
                        </span>
                        <span><input type="text" placeholder="Nhập Nội Dung" id="content-chat"></span>
                        <span>
                            <button onclick="guiTinNhan(this)">Gửi</button>
                        </span>
                    </div>
                </div>

                <div class="button-chat-contact" onclick="viewFormChat()">
                    <span>
                        <img src="/clients/images/icon/contact.gif" alt="">
                    </span>
                    <span>Tư Vấn Khách Hàng</span>
                </div>
            </div>
        <?php endif; ?>
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
        let fakeProductList = [];

        function fetchFakeProducts() {
            const formData = new FormData();
            formData.append('_token', "{{ csrf_token() }}");
            formData.append('type', 'get_products_virtual');

            $.ajax({
                url: "<?= route('api.client'); ?>",
                type: "POST",
                data: formData,
                processData: false,
                contentType: false,
                success: function(data) {
                    if (data.status === "success" && data.data.length > 0) {
                        fakeProductList = data.data;
                    }
                    setTimeout(() => {
                        startShowingItems();
                    }, 5000);
                },
                error: function() {
                    setTimeout(() => {
                        startShowingItems();
                    }, 5000);
                }
            });
        }

        function pickRandomProduct() {
            if (fakeProductList.length > 0) {
                const list = fakeProductList;
                return list[Math.floor(Math.random() * list.length)];
            }
        }

        function soDienThoai() {
            const prefixes = ['032', '033', '034', '035', '036', '037', '038', '039', '090', '091', '092', '093', '094', '095'];
            const prefix = prefixes[Math.floor(Math.random() * prefixes.length)];
            const suffix = Math.floor(1000 + Math.random() * 8999);
            return `${prefix}.${suffix}.xxx`;
        }

        function addItem(phone, title, image, createdAt = null) {
            if (fakeProductList.length > 0) {
                return new Promise(resolve => {
                    const orderList = document.getElementById('order-list');

                    const item = document.createElement('div');
                    item.className = 'item';
                    const timeId = `time-${Date.now()}`;

                    item.innerHTML = `
            <div class="logo">
                <img src="${image}" alt="">
            </div>
            <div class="info-buy">
                <span class="info">${phone} <small>vừa mua hàng</small></span>
                <span class="title">${title}</span>
                <span class="time" id="${timeId}">1 giây trước</span>
            </div>
        `;

                    orderList.insertBefore(item, orderList.firstChild);

                    const items = orderList.querySelectorAll('.item');
                    if (items.length > 3) {
                        orderList.removeChild(items[items.length - 1]);
                    }

                    const timeInterval = setInterval(() => {
                        const diff = Math.floor((Date.now() - createdAt) / 1000);
                        const timeText = diff < 60 ? `${diff} giây trước` : `${Math.floor(diff / 60)} phút trước`;
                        const timeSpan = document.getElementById(timeId);
                        if (timeSpan) timeSpan.textContent = timeText;
                    }, 6000);

                    setTimeout(() => {
                        clearInterval(timeInterval);
                        item.style.transition = "opacity 2s ease";
                        item.style.opacity = 0;
                        setTimeout(() => {
                            item.remove();
                            resolve();
                        }, 2000);
                    }, 5000);
                });
            }
        }


        async function startShowingItems() {
            while (true) {
                const phone = soDienThoai();
                const product = pickRandomProduct();
                const createdAt = Date.now();
                await addItem(phone, product.TenSanPham, product.HinhAnh, createdAt);
            }
        }

        fetchFakeProducts();
    </script>

    <script>
        setInterval(checkNapTien, 5000);

        function checkNapTien() {
            const formData = new FormData();
            formData.append('_token', "{{ csrf_token() }}");
            formData.append('type', 'check_recharge');
            $.ajax({
                url: "<?= route('api.client'); ?>",
                type: "POST",
                data: formData,
                processData: false,
                contentType: false,
                success: function(data) {
                    if (data.status === "success") {
                        AlertDATN(data.status, data.message);
                    }

                    if(document.getElementById("maQrNapTien")) {
                        document.getElementById("maQrNapTien").innerHTML = "";
                    }

                    if(document.getElementById("soDuVi")) {
                        document.getElementById("soDuVi").innerText = data.money;
                    }
                },
                error: function(error) {
                    let errorMessage = "Có lỗi xảy ra!";
                    AlertDATN(errorMessage);
                }
            });
        }

        <?php if ($tien_ich_live_chat->TrangThai == "1"): ?>
            setInterval(getTinNhan, 5000);

            function getTinNhan() {
                const contentChat = document.querySelector('.content-chat');
                const formData = new FormData();
                formData.append('_token', "{{ csrf_token() }}");
                formData.append('type', 'get_chat_user');
                $.ajax({
                    url: "<?= route('api.client'); ?>",
                    type: "POST",
                    data: formData,
                    processData: false,
                    contentType: false,
                    success: function(data) {
                        if (data.status === "success") {
                            contentChat.innerHTML = "";
                            if (data.message !== "ok") {
                                data.data.forEach(message => {
                                    const newMessage = document.createElement('div');
                                    newMessage.classList.add('item-chat', message.user === 'my' ? 'user' : 'system');

                                    let messageHTML = message.content ? `<span class="content-item">${message.content}</span>` : '';
                                    if (message.images) {
                                        let imageList = JSON.parse(message.images);
                                        if (Array.isArray(imageList)) {
                                            imageList.forEach(imageUrl => {
                                                messageHTML += `<img src="${imageUrl}" alt="Ảnh" style="max-width: 100px; margin-top: 5px;">`;
                                            });
                                        }
                                    }

                                    let formattedTime = "";
                                    if (message.time) {
                                        const messageTime = new Date(message.time);
                                        if (!isNaN(messageTime.getTime())) {
                                            formattedTime = messageTime.toLocaleTimeString("vi-VN", {
                                                    hour: '2-digit',
                                                    minute: '2-digit'
                                                }) +
                                                " " +
                                                messageTime.toLocaleDateString("vi-VN");
                                        } else {
                                            console.error("Lỗi chuyển đổi thời gian:", message.time);
                                        }
                                    }

                                    messageHTML += `<span class="time-item">${formattedTime}</span>`;
                                    newMessage.innerHTML = messageHTML;

                                    contentChat.appendChild(newMessage);
                                    scrollToBottom();
                                });
                            }
                        } else {
                            if (data.message) {
                                AlertDATN("error", data.message);
                            }
                        }

                    },
                    error: function(error) {
                        let errorMessage = "Có lỗi xảy ra!";
                        if (error.responseJSON && error.responseJSON.message) {
                            errorMessage = error.responseJSON.message;
                        }
                        AlertDATN(errorMessage);
                    }
                });
            }

            let selectedFiles = [];
            document.getElementById('images-chat').addEventListener('change', function(event) {
                const files = Array.from(event.target.files);
                selectedFiles = [...files];
                displayImages(selectedFiles);
            });

            function displayImages(files) {
                const listImageChat = document.querySelector('.list-image-chat');
                listImageChat.innerHTML = '';

                if (files.length === 0) {
                    listImageChat.style.display = 'none';
                } else {
                    listImageChat.style.display = "flex";
                    files.forEach((file, index) => {
                        if (file.type.startsWith('image/')) {
                            const reader = new FileReader();

                            reader.onload = function(e) {
                                const span = document.createElement('span');
                                const img = document.createElement('img');
                                img.src = e.target.result;
                                img.alt = file.name;

                                const removeBtn = document.createElement('span');
                                removeBtn.innerHTML = '<i class="fas fa-times"></i>';
                                removeBtn.onclick = function() {
                                    selectedFiles.splice(index, 1);
                                    displayImages(selectedFiles);
                                    updateInputFiles();
                                };

                                span.appendChild(removeBtn);
                                span.appendChild(img);
                                listImageChat.appendChild(span);
                            };

                            reader.readAsDataURL(file);
                        }
                    });
                }
            }

            function updateInputFiles() {
                const input = document.getElementById('images-chat');
                const dataTransfer = new DataTransfer();

                selectedFiles.forEach(file => {
                    dataTransfer.items.add(file);
                });

                input.files = dataTransfer.files;
            }

            function viewFormChat() {
                var formChat = document.getElementById("form-chat");
                if (formChat.classList.contains("show")) {
                    formChat.classList.remove("show");
                } else {
                    formChat.classList.add("show");
                }
            }

            function scrollToBottom() {
                const contentChat = document.querySelector('.content-chat');
                contentChat.scrollTop = contentChat.scrollHeight;
            }

            function viewFormChat() {
                var formChat = document.getElementById("form-chat");

                if (formChat.classList.contains("show")) {
                    formChat.classList.remove("show");
                } else {
                    formChat.classList.add("show");
                    scrollToBottom();
                }
            }

            function guiTinNhan(button) {
                const contentChat = document.querySelector('.content-chat');
                const content = document.getElementById('content-chat').value;
                const imageInput = document.getElementById('images-chat');
                const files = selectedFiles;
                const originalText = button.innerHTML;
                button.innerHTML = "...";

                if (content.trim() === '' && files.length === 0) return;

                const formData = new FormData();
                formData.append('_token', "{{ csrf_token() }}");
                formData.append('type', 'chat_support');
                formData.append('content', content);

                files.forEach(file => {
                    formData.append('images[]', file);
                });

                $.ajax({
                    url: "<?= route('api.client'); ?>",
                    type: "POST",
                    data: formData,
                    processData: false,
                    contentType: false,
                    success: function(data) {
                        if (data.status === "success") {
                            document.getElementById('content-chat').value = '';
                            selectedFiles = [];
                            imageInput.value = '';
                            displayImages(selectedFiles);
                            scrollToBottom();

                            getTinNhan();

                            button.disabled = false;
                        } else {
                            AlertDATN("error", data.message);
                        }
                    },
                    error: function(error) {
                        let errorMessage = "Có lỗi xảy ra!";
                        if (error.responseJSON && error.responseJSON.message) {
                            errorMessage = error.responseJSON.message;
                        }
                        AlertDATN(errorMessage);
                    },
                    complete: function() {
                        button.disabled = false;
                        button.innerHTML = originalText;
                    }
                });
            }

            document.addEventListener('DOMContentLoaded', function() {
                scrollToBottom();
            });
        <?php endif; ?>

        window.gtranslateSettings = {
            "default_language": "vi",
            "native_language_names": true,
            "detect_browser_language": true,
            "wrapper_selector": ".gtranslate_wrapper"
        }

        let alertQueue = [];

        function AlertDATN(type, message) {
            if (message) {
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
        }

        function closeAlertManhDev(alert) {
            alert.classList.remove("show");
            setTimeout(() => {
                alert.remove();
                alertQueue = alertQueue.filter(item => item !== alert);
            }, 500);
        }

        window.Echo.channel('orders')
            .listen('.order.created', (e) => {
                console.log('Đơn hàng mới:', e.order);
                const list = document.getElementById('order-list');
                const li = document.createElement('li');
                li.innerText = `#${e.order.id} - Tổng: ${e.order.total}đ`;
                list.prepend(li);
            });
    </script>
    <script src="https://cdn.gtranslate.net/widgets/latest/dropdown.js" defer></script>
    <script>
        const beamsClient = new PusherPushNotifications.Client({
            instanceId: '578ce584-9ce3-46ed-b7ce-f3c02c7c8991',
        });

        beamsClient.start()
            .then(() => beamsClient.addDeviceInterest('DATN2025'))
            .then(() => console.log('Dự Án Tốt Nghiệp 2025 - Nhóm WD-14'))
            .catch(console.error);
    </script>
    @yield("js")
</body>

</html>