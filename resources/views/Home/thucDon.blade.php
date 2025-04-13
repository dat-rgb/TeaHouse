@extends('Layout.app')

@section('content')

<style>/* Thiết lập font và màu */

    body {
            font-family: 'Arial', sans-serif;
            background-color: #f8f8f8;
            color: #333;
            background-image: url('/img/banner.png'); /* có thể là ảnh trong thư mục hoặc URL ảnh online */
            background-size: cover;       /* hình ảnh bao phủ toàn bộ */
            background-repeat: no-repeat; /* không lặp lại ảnh */
            background-position: center;  /* canh giữa hình ảnh */
            background-attachment: fixed; /* cố định hình ảnh khi cuộn trang */
            height: 100vh;                /* đảm bảo chiếm toàn bộ chiều cao màn hình */
            margin: 0;
        }

    .header-logo, h2 {
        color: #2c6e49;
        text-align: center;
        margin: 20px 0;
    }

    .header-logo {
        font-family: "Brush Script MT", cursive;
        font-size: 50px;
        font-weight: bold;
    }

    /* Card sản phẩm */
    .product-card {
        width: 250px;
        flex-shrink: 0;
        transition: transform 0.3s ease, box-shadow 0.3s ease;
        border-radius: 15px;
        overflow: hidden;
        text-align: center;
    }

    .product-card:hover {
        transform: translateY(-5px);
        box-shadow: 0px 8px 20px rgba(0, 0, 0, 0.15);
    }

    .product-image {
        transition: transform 0.3s ease;
        border-radius: 15px 15px 0 0;
        width: 100%;
        height: 180px;
        object-fit: contain;
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
    .card {
        width: 250px; /* Điều chỉnh chiều rộng, có thể tăng lên 270px nếu cần */
        height: 350px; /* Điều chỉnh chiều cao, có thể tăng lên 370px nếu cần */
        padding: 15px;
        border-radius: 10px;
        box-shadow: 0px 4px 8px rgba(0, 0, 0, 0.1);
        transition: transform 0.2s ease-in-out;
    }

    .card:hover {
        transform: scale(1.05);
    }

    .card img {
        width: 100%;
        height: auto;
        object-fit: cover;
        border-radius: 8px;
    }


    /* Slider */
    .slider-container {
        position: relative;
        overflow: hidden;
        width: 100%;
        max-width: 1100px;
        margin: 0 auto;
    }

    .slider-wrapper {
        display: flex;
        gap: 20px;
        transition: transform 0.4s ease-in-out;
    }

    /* Nút điều hướng */
    .slider-btn {
        position: absolute;
        top: 50%;
        transform: translateY(-50%);
        background: rgba(0, 0, 0, 0.7);
        color: white;
        border: none;
        padding: 10px;
        cursor: pointer;
        z-index: 10;
        border-radius: 50%;
        width: 40px;
        height: 40px;
        font-size: 20px;
        display: flex;
        align-items: center;
        justify-content: center;
        transition: background 0.2s ease-in-out;
    }

    .slider-btn:hover {
        background: rgba(0, 0, 0, 0.9);
    }

    .slider-btn.left {
        left: 10px; /* Điều chỉnh vị trí theo ý muốn */
    }

    .slider-btn.right {
        right: 10px; /* Điều chỉnh vị trí theo ý muốn */
    }


    .hidden { display: none; }
</style>
<!-- Banner -->
<div class="py-5 mb-5 container-fluid page-header wow fadeIn" data-wow-delay="0.1s">
    <div class="container py-5 text-center">
        <h2 class="mb-4 display-2 text-dark animated slideInDown">{{ $viewData['title'] }}</h2>
    </div>
</div>
<div class="container" style="padding: 70px;">
    <h2 class="header-logo">Tea House</h2>
    @php
        $categories = [
            'tra' => $tra,
            'caPhe' => $caPhe,
            'sinhTo' => $sinhTo,
            'nuocEp' => $nuocEp
        ];
    @endphp
    @php
        $categoryNames = [
            'tra' => 'Trà',
            'caPhe' => 'Cà Phê',
            'sinhTo' => 'Sinh Tố',
            'nuocEp' => 'Nước Ép'
        ];
    @endphp
    @foreach ($categories as $key => $items)
    <h2>{{ $categoryNames[$key] ?? ucfirst($key) }}</h2>
        <div class="slider-container">
            <button class="hidden slider-btn left" id="prev-{{ $key }}">&#10094;</button>
            <div class="slider-wrapper" id="slider-{{ $key }}">
                @foreach ($items as $item)
                    <div class="product-card">
                        <div class="border-0 shadow-sm card">
                            <div class="position-relative d-flex justify-content-center align-items-center" style="height: 250px;">
                                <a href="{{ route('sanpham.show',$item->ma_san_pham) }}">
                                    <img src="{{ asset('img/product/' . $item->hinh_anh) }}" class="p-3 img-fluid product-image"
                                    alt="{{ $item->ten_san_pham }}" style="max-width: 100%; max-height: 100%; object-fit: contain;">
                                </a>
                            </div>
                            <div class="text-center card-body">
                                <h4 class="product-title">{{ $item->ten_san_pham }}</h4>
                                {{-- <p class="product-price">{{ number_format($item->gia, 0, ',', '.') }} VNĐ</p> --}}
                                <br>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
            <button class="hidden slider-btn right" id="next-{{ $key }}">&#10095;</button>
        </div>
    @endforeach
</div>


<Script>document.addEventListener("DOMContentLoaded", function () {
    document.querySelectorAll(".slider-container").forEach(sliderContainer => {
        const slider = sliderContainer.querySelector(".slider-wrapper");
        const prevBtn = sliderContainer.querySelector(".slider-btn.left");
        const nextBtn = sliderContainer.querySelector(".slider-btn.right");
        const items = slider.querySelectorAll('.product-card');
        const totalItems = items.length;
        const itemsPerPage = 4;
        let currentIndex = 0;

        function updateButtons() {
            prevBtn.classList.toggle("hidden", currentIndex === 0);
            nextBtn.classList.toggle("hidden", currentIndex >= totalItems - itemsPerPage);
        }

        function moveSlide(direction) {
            if ((direction === 1 && currentIndex < totalItems - itemsPerPage) ||
                (direction === -1 && currentIndex > 0)) {
                currentIndex += direction;
                slider.style.transform = `translateX(${-currentIndex * 270}px)`;
                updateButtons();
            }
        }

        prevBtn.addEventListener("click", () => moveSlide(-1));
        nextBtn.addEventListener("click", () => moveSlide(1));

        if (totalItems > itemsPerPage) {
            nextBtn.classList.remove("hidden");
        }
    });
});
</Script>





@endsection
