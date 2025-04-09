@extends("clients.themes")

@section("title")
<title>Thanh Toán Thất Bại - {{ $caiDatWebsite->TenCuaHang }}</title>
@endsection

@section('main')
<section class="page-section">
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="invoice">
                    <div class="icon"><i class="fas fa-times text-danger"></i></div>
                    <div class="title">Thanh Toán Thất Bại</div>
                    <div class="d-block mt-3">
                        <a href="{{ route("home.client") }}" class="btn btn-theme btn-theme-dark">Quay Về Trang Chủ</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
@endsection

@section("js")
<script>
    document.addEventListener("DOMContentLoaded", function() {
        setInterval(function() {
            fetch(location.href)
                .then(response => response.text())
                .then(data => {
                    const parser = new DOMParser();
                    const doc = parser.parseFromString(data, "text/html");

                    const newCartCount = doc.querySelector("#cart-count");
                    if (newCartCount) {
                        document.getElementById("cart-count").innerHTML = newCartCount.innerHTML;
                    }

                    const newListHeader = doc.querySelector("#list-product-header");
                    if (newListHeader) {
                        document.getElementById("list-product-header").innerHTML = newListHeader.innerHTML;
                    }
                })
                .catch(error => console.log("Lỗi: ", error));
        }, 2000);
    });
</script>
@endsection