@extends("admins.themes")

@section("titleHead")
<title>Tin Nhắn Hỗ Trợ - ADMIN</title>
@endsection

@section("main")
<div class="page-body">
    <div class="container-fluid pt-5">
        <div class="row g-0">
            <div class="col-xxl-3 col-xl-4 col-md-5 box-col-5">
                <div class="card card-body">
                    <div class="left-sidebar-chat">
                        <div class="input-group">
                            <span class="input-group-text"><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-search search-icon text-gray">
                                    <circle cx="11" cy="11" r="8"></circle>
                                    <line x1="21" y1="21" x2="16.65" y2="16.65"></line>
                                </svg></span>
                            <input class="form-control" type="text" placeholder="Tìm Kiếm..." id="searchInput">
                        </div>
                    </div>
                    <div class="advance-options">
                        <div class="mt-3">
                            <div>Gần Đây</div>
                        </div>
                        <ul class="list-chat-users list-chat-ne" id="chat-options-tab" role="tablist">
                            @foreach ($danhSachChat as $index => $row)
                            <li class="common-space nav-item" role="presentation">
                                <a class="common-space" id="chats-tab-{{ $row->MaHoTro }}" data-bs-toggle="tab" href="#{{ $row->MaHoTro }}" role="tab" aria-controls="{{ $row->MaHoTro }}" aria-selected="true">
                                    <div class="chat-time">
                                        <div class="active-profile">
                                            <img class="img-fluid rounded-circle" src="https://cdn-icons-png.flaticon.com/256/9572/9572778.png" alt="user">
                                        </div>
                                        <div class="info">
                                            <div>{{ optional(DB::table("users")->where("ID_Guests", $row->ID_Guests)->first())->name ?? ('Khách Hàng ' . ($index + 1)) }}</div>
                                        </div>
                                    </div>

                                    <div class="text-end">
                                        @php
                                        $lastMessage = DB::table("chat_ho_tro")->where("MaHoTro", $row->MaHoTro)->orderByDesc("id")->first();
                                        $createdAt = new \Carbon\Carbon($lastMessage->created_at);
                                        $now = \Carbon\Carbon::now();
                                        $isNew = $createdAt->diffInMinutes($now) <= 60;
                                            @endphp

                                            @if ($isNew && $lastMessage->status !== 1)
                                            <small class="text-danger">Mới</small>
                                            @else
                                            <small>{{ \Carbon\Carbon::parse($lastMessage->created_at)->format('H:i') }}</small>
                                            @endif
                                    </div>
                                </a>
                            </li>
                            @endforeach
                        </ul>
                    </div>
                </div>
            </div>
            <div class="col-xxl-9 col-xl-8 col-md-7 box-col-7">
                <div class="tab-content list-chat-ne" id="chat-options-tabContent">
                    @foreach ($danhSachChat as $index => $row)
                    <div class="tab-pane fade" id="{{ $row->MaHoTro }}" role="tabpanel" aria-labelledby="{{ $row->MaHoTro }}-tab">
                        <div class="card right-sidebar-chat">
                            <div class="right-sidebar-title">
                                <div class="common-space">
                                    <div class="chat-time">
                                        <div>
                                            <span class="f-w-500">{{ (DB::table("users")->where("ID_Guests", $row->ID_Guests)->first()->name ? DB::table("users")->where("ID_Guests", $row->ID_Guests)->first()->name : "Khách Hàng ".$index + 1) }}</span>
                                        </div>
                                    </div>
                                    <div class="d-flex gap-2">
                                        <!-- <div class="contact-edit chat-alert"><i class="icon-info-alt"></i></div> -->
                                    </div>
                                </div>
                            </div>
                            <div class="right-sidebar-Chats">
                                <div class="msger">
                                    <div class="msger-chat" id="msger-{{ $row->MaHoTro }}"></div>
                                    <div class="msger-inputarea">
                                        <div class="list-image-chat" style="display: none;"></div>
                                        <div class="dropdown-form dropdown-toggle" role="main" data-bs-toggle="dropdown" aria-expanded="false"><i class="icon-plus"></i>
                                            <div class="chat-icon dropdown-menu dropdown-menu-start">
                                                <div class="dropdown-item mb-2">
                                                    <label for="images-chat">
                                                        <i class="fal fa-image text-dark"></i>
                                                        <input type="file" class="d-none" name="images_chat" id="images-chat" multiple>
                                                    </label>
                                                </div>
                                            </div>
                                        </div>
                                        <input class="msger-input two uk-textarea" type="text" placeholder="Nhập Nội Dung Tin Nhắn" id="content-chat-{{ $row->MaHoTro }}">
                                        <button class="msger-send-btn" type="button" onclick="guiTinNhan(this, '{{ $row->MaHoTro }}')"><i class="fa fa-location-arrow"></i></button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    @endforeach
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

@section("js")
<script>
    document.querySelectorAll('.nav-item a').forEach((tab) => {
        tab.addEventListener('click', function() {
            const MaGiaoDich = this.getAttribute('href').substring(1);

            const formData = new FormData();
            formData.append('_token', '{{ csrf_token() }}');
            formData.append('type', "update_status_chat");
            formData.append('trading', MaGiaoDich);

            $.ajax({
                url: "<?= route('api.client'); ?>",
                type: "POST",
                data: formData,
                processData: false,
                contentType: false,
                success: function(data) {
                    if (data.status === "success") {
                        const chatItem = document.getElementById('chats-tab-' + MaGiaoDich);
                        const newMessageIndicator = chatItem.querySelector('.text-danger');
                        if (newMessageIndicator) {
                            newMessageIndicator.style.display = 'none';
                        }
                    }
                }
            });
        });
    });

    function guiTinNhan(button, MaGiaoDich) {
        const contentChat = document.getElementById('msger-' + MaGiaoDich);
        const content = document.getElementById('content-chat-' + MaGiaoDich).value;
        const imageInput = document.getElementById('images-chat');
        const files = selectedFiles;
        const originalText = button.innerHTML;

        if (content.trim() === '' && files.length === 0) return;

        const formData = new FormData();
        formData.append('_token', "{{ csrf_token() }}");
        formData.append('type', 'chat_support_admin');
        formData.append('content', content);
        formData.append('trading', MaGiaoDich);

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
                    document.getElementById('content-chat-' + MaGiaoDich).value = '';
                    selectedFiles = [];
                    imageInput.value = '';
                    displayImages(selectedFiles);

                    getTinNhan(MaGiaoDich);
                }
            },
            complete: function() {
                button.disabled = false;
                button.innerHTML = originalText;
            }
        });
    }

    setInterval(getTinNhan, 2000);

    function getTinNhan(MaGiaoDich) {
        const chatBox = document.getElementById('msger-' + MaGiaoDich);
        if (!chatBox) return;

        const formData = new FormData();
        formData.append('_token', '{{ csrf_token() }}');
        formData.append('type', 'get_chat_admin');
        formData.append('trading', MaGiaoDich);

        $.ajax({
            url: "<?= route('api.client'); ?>",
            type: "POST",
            data: formData,
            processData: false,
            contentType: false,
            success: function(response) {
                if (response.status === "success" && response.data) {
                    chatBox.innerHTML = '';

                    response.data.forEach(group => {
                        group.data.forEach(message => {
                            const newMessage = document.createElement('div');
                            newMessage.classList.add('msg', message.user === 'my' ? 'left-msg' : 'right-msg');

                            const msgBubble = document.createElement('div');
                            msgBubble.classList.add('msg-bubble');

                            const msgInfo = document.createElement('div');
                            msgInfo.classList.add('msg-info');

                            const msgInfoTime = document.createElement('div');
                            msgInfoTime.classList.add('msg-info-time');

                            let formattedTime = '';
                            if (message.time) {
                                const messageTime = new Date(message.time);
                                if (!isNaN(messageTime.getTime())) {
                                    formattedTime = messageTime.toLocaleTimeString("vi-VN", {
                                        hour: '2-digit',
                                        minute: '2-digit'
                                    }) + " " + messageTime.toLocaleDateString("vi-VN");
                                }
                            }
                            msgInfoTime.textContent = formattedTime;
                            msgInfo.appendChild(msgInfoTime);

                            const msgText = document.createElement('div');
                            msgText.classList.add('msg-text');

                            let contentHTML = message.content ? message.content : '';
                            if (message.images) {
                                try {
                                    let imageList = JSON.parse(message.images);
                                    if (Array.isArray(imageList)) {
                                        imageList.forEach(imageUrl => {
                                            contentHTML += `<br><img src="${imageUrl}" alt="Ảnh" style="max-width: 100px; margin-top: 5px;">`;
                                        });
                                    }
                                } catch (e) {
                                    console.error('Lỗi parse ảnh:', e);
                                }
                            }
                            msgText.innerHTML = contentHTML;

                            msgBubble.appendChild(msgInfo);
                            msgBubble.appendChild(msgText);
                            newMessage.appendChild(msgBubble);
                            chatBox.appendChild(newMessage);
                        });
                    });

                    scrollToBottom(chatBox);
                } else {
                    console.error('Lỗi dữ liệu:', response.message);
                }
            },
            error: function(error) {
                console.error('Lỗi AJAX:', error);
            }
        });
    }

    $('a[data-bs-toggle="tab"]').on('shown.bs.tab', function(e) {
        const target = $(e.target).attr("href").substring(1);
        clearInterval(window.intervalGetChat);
        getTinNhan(target);
        window.intervalGetChat = setInterval(function() {
            getTinNhan(target);
        }, 2000);
    });

    function scrollToBottom(chatBox) {
        chatBox.scrollTop = chatBox.scrollHeight;
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

    document.getElementById('searchInput').addEventListener('input', function() {
        const searchValue = this.value.toLowerCase();
        const chatItems = document.querySelectorAll('#chat-options-tab .nav-item');

        chatItems.forEach(function(item) {
            const userName = item.querySelector('.info > div').textContent.toLowerCase();
            if (userName.includes(searchValue)) {
                item.style.display = '';
            } else {
                item.style.display = 'none';
            }
        });
    });
</script>
@endsection