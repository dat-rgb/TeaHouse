<style>
    .product-card {
        transition: transform 0.3s ease, box-shadow 0.3s ease;
        border-radius: 15px;
        overflow: hidden;
    }

    .product-card:hover {
        transform: translateY(-5px);
        box-shadow: 0px 8px 20px rgba(0, 0, 0, 0.15);
    }

    .product-image {
        transition: transform 0.3s ease;
        border-radius: 15px 15px 0 0;
    }

    .product-card:hover .product-image {
        transform: scale(1.05);
    }

    .product-title {
        font-weight: bold;
        color: #333;
    }

    .product-price {
        font-size: 1.2rem;
        color: #e44d26;
        font-weight: bold;
    }

    .product-btn {
        transition: background 0.3s ease, transform 0.2s ease;
        border-radius: 50px;
    }

    .product-btn:hover {
        background: #e44d26;
        transform: scale(1.05);
        color: #fff;
    }
</style>

<div class="row">
    @foreach ($products as $product)
        <div class="col-md-3 mb-3">
            <div class="card product-card shadow-sm border-0">
                <div class="position-relative d-flex justify-content-center align-items-center" style="height: 250px;">
                    <img src="{{ asset('img/product/' . $product->hinh_anh) }}" 
                        class="img-fluid product-image p-3" 
                        alt="{{ $product->ten_san_pham }}" 
                        style="max-width: 100%; max-height: 100%; object-fit: contain;">
                </div>
                <div class="card-body text-center">
                    <h6 class="product-title">{{ $product->ten_san_pham }}</h6>
                    <p class="product-price">{{ number_format($product->gia, 0, ',', '.') }} đ</p>
                </div>
            </div>
        </div>
    @endforeach
    @if ($products->isEmpty())
        <p class="text-center w-100">Không có sản phẩm nào.</p>
    @endif
</div>
<!-- Thêm phân trang -->
<div class="d-flex justify-content-center mt-3">
    {{ $products->links('pagination::bootstrap-4') }}
</div>