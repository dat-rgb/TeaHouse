<div class="col-lg-3">
    <div class="position-sticky" style="top: 80px; border-right: 2px solid #ddd;"> <!-- Đường ngăn cách -->
        <div class="fw-bold text-primary text-center mb-3"></div>
        <ul class="list-group list-group-flush">
            @foreach($danhMucSanPhams as $danhMuc)
                <li class="list-group-item border-0 category-item position-relative">
                    <a href="#" class="text-decoration-none text-dark d-block d-flex justify-content-between align-items-center">
                        {{ $danhMuc->ten_danh_muc }}
                        @if ($danhMuc->children->isNotEmpty())
                            <i class="fa fa-chevron-down text-secondary"></i> <!-- Icon dropdown -->
                        @endif
                    </a>
                    @if ($danhMuc->children->isNotEmpty())
                        <ul class="list-unstyled sub-category">
                            @foreach($danhMuc->children as $subDanhMuc)
                                <li class="list-group-item border-0">
                                    <a href="#" class="text-decoration-none text-dark">{{ $subDanhMuc->ten_danh_muc }}</a>
                                </li>
                            @endforeach
                        </ul>
                    @endif
                </li>
            @endforeach
        </ul>
    </div>
</div>

<style>
    /* Ẩn danh mục con mặc định */
    .sub-category {
        display: none;
        padding-left: 15px;
        margin-top: 5px;
    }

    /* Hiển thị danh mục con khi hover vào danh mục cha */
    .category-item:hover > .sub-category {
        display: block;
    }

    .sub-category li {
        padding: 5px 0;
    }

    .sub-category li a {
        text-decoration: none;
        color: #333;
        display: block;
        padding: 5px 10px;
    }

    .sub-category li a:hover {
        color: #007bff;
        background-color: #f1f1f1;
    }

    /* Chỉ hiển thị icon dropdown nếu có danh mục con */
    .category-item i {
        font-size: 12px;
        transition: transform 0.2s ease-in-out;
    }

    /* Khi hover vào danh mục cha, icon quay lên */
    .category-item:hover > a > i {
        transform: rotate(180deg);
    }
</style>

<!-- Font Awesome -->
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">
