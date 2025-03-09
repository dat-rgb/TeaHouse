@extends('Layout.app')

@section('content')
<div class="container mt-4" style="padding: 50px;">
    <!-- Breadcrumb -->
    <nav aria-label="breadcrumb">
        <ol class="breadcrumb bg-light p-3 rounded">
            <li class="breadcrumb-item"><a href="{{ route('home.index') }}">Trang chủ</a></li>
            <li class="breadcrumb-item active" aria-current="page">{{ $sanPham->ten_san_pham }}</li>
        </ol>
    </nav>

    <div class="row">
        <!-- Product Image -->
        <div class="col-md-5 text-center">
            <div class="position-relative">
                <img src="{{ asset('img/product/' . $sanPham->hinh_anh) }}" class="img-fluid rounded" alt="{{ $sanPham->ten_san_pham }}">
            </div>
            <img src="{{ asset('img/product/' . $sanPham->hinh_anh) }}" class="mt-3 rounded" width="80" height="80" alt="Thumbnail">
        </div>

        <!-- Product Details -->
        <div class="col-md-7">
            <h2 class="fw-bold mb-2">{{ $sanPham->ten_san_pham }}</h2>
            <p class="text-warning fs-5 fw-semibold mb-3">
                Giá: <span id="gia-san-pham" data-gia="{{ $sanPham->gia }}">{{ number_format($sanPham->gia, 0, ',', '.') }}</span> đ
            </p>

            <!-- Size Options -->
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

            <!-- Topping Options -->
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
                <!-- Order Button -->
                <button class="btn btn-warning flex-fill">
                    <i class="fas fa-truck me-2"></i> Đặt giao tận nơi
                </button>

                <!-- Add to Cart Button -->
                <button class="btn btn-success flex-fill" id="add-to-cart">
                    <i class="fas fa-cart-plus me-2"></i> Thêm vào giỏ hàng
                </button>
            </div>
        </div>
    </div>
    <!-- Product Description -->
    <div class="mt-4">
        <h5 class="fw-semibold">Mô tả sản phẩm</h5>
        <p class="text-muted small">
            {{ $sanPham->mo_ta }}
        </p>
    </div>
</div>

<script>
    document.addEventListener("DOMContentLoaded", function () {
        const basePrice = parseInt(document.getElementById("gia-san-pham").dataset.gia);
        const priceDisplay = document.getElementById("gia-san-pham");

        function updatePrice() {
            let total = basePrice;

            // Cộng giá size (chỉ lấy giá của size được chọn)
            const sizeChecked = document.querySelector(".size-option:checked");
            if (sizeChecked) {
                total += parseInt(sizeChecked.value);
            }

            // Cộng dồn giá topping (tính tổng giá của tất cả topping được chọn)
            document.querySelectorAll(".topping-option:checked").forEach(topping => {
                total += parseInt(topping.value);
            });

            // Cập nhật giá hiển thị
            priceDisplay.innerText = new Intl.NumberFormat('vi-VN').format(total);
        }

        // Lắng nghe sự kiện thay đổi trên size và topping
        document.querySelectorAll(".size-option, .topping-option").forEach(input => {
            input.addEventListener("change", updatePrice);
        });
        function updateSelected() {
            document.querySelectorAll(".size-option").forEach(input => {
                input.closest("label").classList.toggle("selected", input.checked);
            });

            document.querySelectorAll(".topping-option").forEach(input => {
                input.closest("label").classList.toggle("selected", input.checked);
            });
        }

        document.querySelectorAll(".size-option, .topping-option").forEach(input => {
            input.addEventListener("change", function () {
                updateSelected();
            });
        });

        updateSelected();
        
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