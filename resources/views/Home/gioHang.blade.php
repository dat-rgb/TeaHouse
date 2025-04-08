@extends('Layout.app')
@section('title', 'Giỏ hàng | Tea House Coffee & Tea')
@section('content')
<!-- Page Header Start -->
<div class="container-fluid page-header py-5 mb-5 wow fadeIn" data-wow-delay="0.1s">
    <div class="container text-center py-5">
        <h1 class="display-2 text-dark mb-4 animated slideInDown">Giỏ hàng</h1>
        <nav aria-label="breadcrumb animated slideInDown">
            <ol class="breadcrumb justify-content-center mb-0">
                <li class="breadcrumb-item"><a href="{{ route('home.index') }}">Trang chủ</a></li>
                <li class="breadcrumb-item active">Giỏ hàng</li>
            </ol>
        </nav>
    </div>
</div>

<div class="container py-4">
    @if (!empty($gioHang))
        <div class="row g-4">
            {{-- Giỏ hàng --}}
            <div class="col-lg-8">
                <div class="table-responsive">
                    <table class="table table-borderless table-hover align-middle shadow-sm rounded overflow-hidden">
                        <thead class="bg-light text-dark">
                            <tr>
                                <th><input type="checkbox" /></th>
                                <th>#</th>
                                <th>Sản phẩm</th>
                                <th class="text-center">Số lượng</th>
                                <th>Giá</th>
                                <th>Thành tiền</th>
                                <th class="text-center">Thao tác</th>
                            </tr>
                        </thead>
                        <tbody>
                            @php $i = 1; $tongTien = 0; @endphp
                            @foreach ($gioHang as $key => $item)
                                @php
                                    $thanhTien = $item['gia'] * $item['so_luong'];
                                    $tongTien += $thanhTien;
                                @endphp
                                <tr>
                                    <td><input type="checkbox" name="selected[]" value="{{ $key }}"></td>
                                    <td>{{ $i++ }}</td>
                                    <td>
                                        <div class="d-flex align-items-center gap-3">
                                            <img src="{{ asset('img/product/' . ($item['hinh_anh'] ?? 'default.jpg')) }}"
                                                class="rounded shadow-sm border" style="width: 70px; height: 70px; object-fit: cover;">
                                            <div>
                                                <div class="fw-semibold">{{ $item['ten_san_pham'] }}</div>
                                                <small class="text-muted">Size: {{ $item['size_ten'] }}</small>
                                                @if (!empty($item['toppings']))
                                                    <ul class="mb-0 small text-muted ps-3">
                                                        @foreach ($item['toppings'] as $tp)
                                                            <li>{{ $tp['ten_topping'] }}</li>
                                                        @endforeach
                                                    </ul>
                                                @endif
                                            </div>
                                        </div>
                                    </td>
                                    <td class="text-center">
                                        <div class="btn-group" role="group">
                                            @foreach($gioHang as $key => $item)
                                                <div class="btn-group align-items-center" role="group">
                                                    <a href="{{ route('cart.updateQuantity', ['key' => $key, 'type' => 'decrease']) }}"
                                                    class="btn btn-outline-secondary btn-sm">−</a>
                                                    
                                                    <span class="px-3 d-flex align-items-center">{{ $item['so_luong'] }}</span>
                                                    
                                                    <a href="{{ route('cart.updateQuantity', ['key' => $key, 'type' => 'increase']) }}"
                                                    class="btn btn-outline-secondary btn-sm">+</a>
                                                </div>
                                            @endforeach
                                        </div>
                                    </td>
                                    <td>{{ number_format($item['gia'], 0, ',', '.') }} đ</td>
                                    <td>{{ number_format($thanhTien, 0, ',', '.') }} đ</td>
                                    <td class="text-center">
                                        <button class="btn btn-warning btn-sm" onclick="openEditModal('{{ $key }}')">
                                            <i class="bi bi-pencil-square"></i> Sửa
                                        </button>
                                        <a class="text-danger" href="#">Xóa</a>
                                    </td>
                                </tr>
                            @endforeach
                            @if (empty($gioHang))
                                <tr>
                                    <td colspan="7" class="text-center py-3 text-muted">Giỏ hàng trống</td>
                                </tr>
                            @endif
                        </tbody>
                    </table>
                    <form action="{{ route('giohang.clear') }}" method="POST">
                        @csrf
                        <button type="submit" class="btn btn-outline-danger">Xóa tất cả</button>
                    </form>
                </div>
            </div>

            {{-- Thông tin đơn hàng --}}
            <div class="col-lg-4">
                <div class="card border-0 shadow-sm rounded">
                    <div class="card-body">
                        <h5 class="card-title mb-3">Thông tin đơn hàng</h5>
                        <div class="d-flex justify-content-between small">
                            <span>Số lượng sản phẩm:</span>
                            <span>{{ collect($gioHang)->sum('so_luong') }}</span>
                        </div>
                        <div class="d-flex justify-content-between small my-2">
                            <span>Tạm tính:</span>
                            <span>{{ number_format($tongTien, 0, ',', '.') }} đ</span>
                        </div>
                        <hr>
                        <div class="d-flex justify-content-between fw-bold fs-5">
                            <span>Tổng tiền:</span>
                            <span class="text-danger">{{ number_format($tongTien, 0, ',', '.') }} đ</span>
                        </div>
                        <div class="mt-4 d-grid gap-2">

                            <a href="#" class="btn btn-outline-secondary">Tiếp tục mua hàng</a>
                            <a href="#" class="btn btn-success">Thanh toán</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    @else
        <div class="text-center py-5">
            <img src="{{ asset('img/empty-cart.jpg') }}" alt="Giỏ hàng trống" style="max-width: 200px;">
            <h4 class="mt-4 text-muted">Giỏ hàng của bạn đang trống!</h4>
            <a href="{{ route('sanpham.index') }}" class="btn btn-primary mt-3">Quay lại mua sắm</a>
        </div>
    @endif
</div>

@endsection


