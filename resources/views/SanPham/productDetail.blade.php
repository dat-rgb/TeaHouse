@extends('Layout.app')

@section('content')
<div class="container mt-4" style="padding: 50px;">
    <nav aria-label="breadcrumb">
        <ol class="breadcrumb bg-light p-3 rounded">
            <li class="breadcrumb-item"><a href="{{ route('home.index') }}">Trang chủ</a></li>
            <li class="breadcrumb-item"><a href="{{ route('sanpham.index') }}">Sản phẩm</a></li>
            <li class="breadcrumb-item active" aria-current="page">{{ $sanPham->ten_san_pham }}</li>
        </ol>
    </nav>

    <div class="row">
        <div class="col-md-5 text-center">
            <div class="position-relative">
                <img src="{{ asset('img/product/' . $sanPham->hinh_anh) }}" class="img-fluid rounded" alt="{{ $sanPham->ten_san_pham }}">
            </div>
            <img src="{{ asset('img/product/' . $sanPham->hinh_anh) }}" class="mt-3 rounded" width="80" height="80" alt="Thumbnail">
        </div>

        <div class="col-md-7">
            <h2 class="fw-bold mb-2">{{ $sanPham->ten_san_pham }}</h2>
            <p class="text-warning fs-5 fw-semibold mb-3">
                Giá: <span id="gia-san-pham" data-gia="{{ $sanPham->gia }}">{{ number_format($sanPham->gia, 0, ',', '.') }}</span> đ
            </p>

            <div class="mb-3">
                <h6 class="fw-semibold mb-2">Chọn size (bắt buộc)</h6>
                <div class="d-flex gap-2">
                    @foreach ($sizes as $size)
                        <label class="btn btn-outline-secondary btn-sm size-label">
                            <input type="radio" name="size" value="{{ $size->gia_size }}" class="size-option d-none"> 
                            {{ $size->ten_size }} + {{ number_format($size->gia_size, 0, ',', '.') }} đ
                        </label>
                    @endforeach
                </div>
            </div>

            <div class="mb-3">
                <h6 class="fw-semibold mb-2">Topping</h6>
                <div class="row g-2">
                    @foreach ($toppings as $topping)
                        <div class="col-6 col-sm-4">
                            <label class="btn btn-outline-secondary btn-sm w-100 topping-label">
                                <input type="checkbox" class="topping-option d-none" value="{{ $topping->gia_topping }}"> 
                                {{ $topping->ten_topping }} + {{ number_format($topping->gia_topping, 0, ',', '.') }} đ
                            </label>
                        </div>
                    @endforeach
                </div>
            </div>
            <div class="d-flex gap-2">
                <button class="btn btn-warning flex-fill">
                    <i class="fas fa-truck me-2"></i> Đặt giao tận nơi
                </button>
                <button class="btn btn-success flex-fill" id="add-to-cart">
                    <i class="fas fa-cart-plus me-2"></i> Thêm vào giỏ hàng
                </button>
            </div>
        </div>
    </div>

    <div class="mt-4">
        <h5 class="fw-semibold">Mô tả sản phẩm</h5>
        <p class="text-muted small">{{ $sanPham->mo_ta }}</p>
    </div>
</div>

@include('components.notification-modal')

<script>
    document.addEventListener("DOMContentLoaded", function () {
        const priceDisplay = document.getElementById("gia-san-pham");
        const basePrice = parseInt(priceDisplay.dataset.gia);

        function updateUI() {
            let total = basePrice;
            
            const sizeChecked = document.querySelector(".size-option:checked");
            if (sizeChecked) total += parseInt(sizeChecked.value);
            
            document.querySelectorAll(".topping-option:checked").forEach(topping => {
                total += parseInt(topping.value);
            });

            priceDisplay.innerText = new Intl.NumberFormat("vi-VN").format(total);
            document.querySelectorAll(".size-label, .topping-label").forEach(label => {
                label.classList.toggle("selected", label.querySelector("input").checked);
            });
        }

        document.addEventListener("change", function (event) {
            if (event.target.matches(".size-option, .topping-option")) {
                updateUI();
            }
        });
        
        updateUI();

        document.getElementById("add-to-cart").addEventListener("click", function (e) {
            e.preventDefault();
            const addToCartBtn = this;
            addToCartBtn.disabled = true;
            addToCartBtn.innerHTML = '<i class="fas fa-spinner fa-spin"></i> Đang thêm...';

            const sizeChecked = document.querySelector(".size-option:checked");
            if (!sizeChecked) {
                showNotification && showNotification("Vui lòng chọn size trước khi thêm vào giỏ hàng!", "error");
                addToCartBtn.disabled = false;
                addToCartBtn.innerHTML = '<i class="fas fa-cart-plus me-2"></i> Thêm vào giỏ hàng';
                return;
            }

            const toppings = Array.from(document.querySelectorAll(".topping-option:checked"))
                                .map(t => t.value);

            fetch("{{ route('giohang.add') }}", {
                method: "POST",
                body: JSON.stringify({
                    ma_san_pham: "{{ $sanPham->ma_san_pham }}",
                    so_luong: 1,
                    size: sizeChecked.value,
                    toppings: toppings
                }),
                headers: {
                    "Content-Type": "application/json",
                    "X-CSRF-TOKEN": "{{ csrf_token() }}"
                }
            })
            .then(response => response.json())
            .then(data => {
                showNotification && showNotification(data.message, data.type);
            })
            .catch(error => {
                console.error("Lỗi:", error);
                showNotification && showNotification("Có lỗi xảy ra, vui lòng thử lại!", "error");
            })
            .finally(() => {
                addToCartBtn.disabled = false;
                addToCartBtn.innerHTML = '<i class="fas fa-cart-plus me-2"></i> Thêm vào giỏ hàng';
            });
        });
    });
</script>
@endsection

<style>
.selected {
    background-color: orange !important;
    color: white !important;
    border-color: orange !important;
}
</style>