import Echo from 'laravel-echo';
import Pusher from 'pusher-js';

window.Pusher = Pusher;

window.Echo = new Echo({
    broadcaster: 'pusher',
    key: process.env.MIX_PUSHER_APP_KEY,
    cluster: process.env.MIX_PUSHER_APP_CLUSTER,
    encrypted: true
});

window.Echo.channel('image-channel')
    .listen('.image.uploaded', (data) => {
        console.log("Ảnh mới được tải lên:", data.imagePath);
        let img = document.createElement("img");
        img.src = `/storage/${data.imagePath}`;
        document.getElementById("imagePreview").appendChild(img);
    });
