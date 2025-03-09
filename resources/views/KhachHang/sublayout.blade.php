<style>
    .profile-card {
        border-radius: 12px;
        overflow: hidden;
        transition: all 0.3s ease-in-out;
    }

    .profile-card:hover {
        transform: translateY(-5px);
        box-shadow: 0px 10px 20px rgba(0, 0, 0, 0.2);
    }

    .barcode img {
        max-width: 100px;
        margin: 10px auto;
        display: block;
    }

    .list-group-item {
        transition: all 0.3s ease-in-out;
        font-weight: 500;
    }

    .list-group-item:hover {
        background: #f8f9fa;
        transform: translateX(5px);
    }

    .list-group-item a {
        text-decoration: none;
        color: #333;
    }

    .list-group-item i {
        margin-right: 10px;
        color: #007bff;
    }
</style>
<div class="card profile-card shadow-sm">
    <div class="card-body text-center">
        <h5 class="card-title fw-bold">{{ $khachHang->ho_ten_khach_hang }}</h5>
        @php
            $colors = [
                'Đồng' => 'brown',
                'Bạc' => 'silver',
                'Vàng' => 'gold'
            ];
            $hangMau = $colors[$khachHang->hang_thanh_vien] ?? 'gray'; 
        @endphp

        <p class="text-muted">
            {{ $khachHang->diem_thanh_vien }} BEAN - 
            <span class="badge" style="background-color: {{ $hangMau }}; color: white;">
                {{ $khachHang->hang_thanh_vien }}
            </span>
        </p>
        <p class="fw-bold text-success">Còn {{ $khachHang->beanConThieu }} BEAN nữa để thăng hạng.</p>
    </div>
</div>
<ul class="list-group mt-3">
    <li class="list-group-item d-flex align-items-center">
        <i class="bi bi-person-circle"></i>
        <a href="{{ route('khachhang.index') }}">Thông tin tài khoản</a>
    </li>
    <li class="list-group-item d-flex align-items-center">
        <i class="bi bi-geo-alt"></i>
        <a href="#">Số địa chỉ</a>
    </li>
    <li class="list-group-item d-flex align-items-center">
        <i class="bi bi-gift"></i>
        <a href="#">Quyền lợi thành viên</a>
    </li>
    <li class="list-group-item d-flex align-items-center">
        <i class="bi bi-clock-history"></i>
        <a href="#">Lịch sử mua hàng</a>
    </li>
</ul>
