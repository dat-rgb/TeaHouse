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
                            <input type="radio" name="size" value="{{ $size->ma_size }}" data-gia="{{ $size->gia_size }}" class="size-option d-none"> 
                            {{ $size->ten_size }} + {{ number_format($size->gia_size, 0, ',', '.') }} đ
                        </label>
                    @endforeach
                </div>
            </div>
            <div class="mb-3">
                <h6 class="fw-semibold mb-2">Số lượng</h6>
                <input type="number" id="so-luong" class="form-control w-25" value="1" min="1">
            </div>
            <div class="mb-3">
                <h6 class="fw-semibold mb-2">Topping</h6>
                <div class="row g-2">
                    @foreach ($toppings as $topping)
                        <div class="col-6 col-sm-4">
                            <label class="btn btn-outline-secondary btn-sm w-100 topping-label">
                                <input type="checkbox" class="topping-option d-none" value="{{ $topping->ma_topping }}" data-gia="{{ $topping->gia_topping }}"> 
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

            // Lấy size được chọn và cộng giá từ dataset
            const sizeChecked = document.querySelector(".size-option:checked");
            if (sizeChecked) total += parseInt(sizeChecked.dataset.gia);

            // Cộng giá các topping được chọn
            document.querySelectorAll(".topping-option:checked").forEach(topping => {
                total += parseInt(topping.dataset.gia);
            });

            // Cập nhật giá hiển thị
            priceDisplay.innerText = new Intl.NumberFormat("vi-VN").format(total) + " đ";

            // Thêm class 'selected' để đánh dấu size & topping được chọn
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
                showNotification("Vui lòng chọn size trước khi thêm vào giỏ hàng!", "error");
                resetButton();
                return;
            }

            const toppings = Array.from(document.querySelectorAll(".topping-option:checked"))
                                .map(t => t.value); // Chỉ lấy mã topping

            fetch("{{ route('giohang.add') }}", {
                method: "POST",
                body: JSON.stringify({
                    ma_san_pham: "{{ $sanPham->ma_san_pham }}",
                    so_luong: document.getElementById("so-luong").value,
                    size: sizeChecked.value, // Chỉ lấy mã size
                    toppings: toppings
                }),
                headers: {
                    "Content-Type": "application/json",
                    "X-CSRF-TOKEN": "{{ csrf_token() }}"
                }
            })
            .then(response => response.json())
            .then(data => {
                showNotification(data.message, data.type);
            })
            .catch(error => {
                console.error("Lỗi:", error);
                showNotification("Có lỗi xảy ra, vui lòng thử lại!", "error");
            })
            .finally(resetButton);
        });

        function resetButton() {
            const addToCartBtn = document.getElementById("add-to-cart");
            addToCartBtn.disabled = false;
            addToCartBtn.innerHTML = '<i class="fas fa-cart-plus me-2"></i> Thêm vào giỏ hàng';
        }
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