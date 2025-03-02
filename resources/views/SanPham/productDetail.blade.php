@extends('Layout.app')

@section('content')
<div class="container mt-4">
    <nav aria-label="breadcrumb">
        <ol class="breadcrumb bg-light p-3 rounded">
            <li class="breadcrumb-item"><a href="{{ route('home.index') }}">Trang chủ</a></li>
            <li class="breadcrumb-item active" aria-current="page">Sản phẩm</li>
        </ol>
    </nav>
    <div class="row">
        <!-- Product Image -->
        <div class="col-md-5 text-center">
            <div class="position-relative">
                <img src="{{ asset('img/product/cafe_den_da.jpg') }}" class="img-fluid rounded" alt="Cà Phê Sữa Đá">
                <span class="badge bg-danger position-absolute top-0 start-0 m-2 px-2 py-1">
                    <i class="fas fa-thumbs-up me-1"></i> BEST SELLER
                </span>
            </div>
            <img src="{{ asset('img/product/cafe_den_da.jpg') }}" class="mt-3 rounded" width="80" height="80" alt="Thumbnail">
        </div>

        <!-- Product Details -->
        <div class="col-md-7">
            <h2 class="fw-bold mb-2">Cà Phê Sữa Đá</h2>
            <p class="text-warning fs-5 fw-semibold mb-3">39.000 đ</p>

            <!-- Size Options -->
            <div class="mb-3">
                <h6 class="fw-semibold mb-2">Chọn size (bắt buộc)</h6>
                <div class="d-flex gap-2">
                    <button class="btn btn-outline-secondary btn-sm">Nhỏ + 0 đ</button>
                    <button class="btn btn-outline-secondary btn-sm">Vừa + 10.000 đ</button>
                    <button class="btn btn-outline-secondary btn-sm">Lớn + 16.000 đ</button>
                </div>
            </div>

            <!-- Topping Options -->
            <div class="mb-3">
                <h6 class="fw-semibold mb-2">Topping</h6>
                <div class="row g-2">
                    @php
                        $toppings = ['Thạch Sương Sáo', 'Thạch Kim Quất', 'Thạch Cà Phê', 'Foam Phô Mai', 'Shot Espresso', 'Sốt Caramel'];
                    @endphp
                    @foreach ($toppings as $topping)
                        <div class="col-6 col-sm-4">
                            <button class="btn btn-outline-secondary btn-sm w-100">{{ $topping }} + 10.000 đ</button>
                        </div>
                    @endforeach
                </div>
            </div>

            <!-- Order Button -->
            <button class="btn btn-warning w-100">
                <i class="fas fa-truck me-2"></i> Đặt giao tận nơi
            </button>
        </div>
    </div>

    <!-- Product Description -->
    <div class="mt-4">
        <h5 class="fw-semibold">Mô tả sản phẩm</h5>
        <p class="text-muted small">
            Cà phê Đắk Lắk nguyên chất được pha phin truyền thống kết hợp với sữa đặc tạo nên hương vị đậm đà, hài hòa giữa vị ngọt đầu lưỡi và vị đắng thanh thoát nơi hậu vị.
        </p>
    </div>
</div>
@endsection
