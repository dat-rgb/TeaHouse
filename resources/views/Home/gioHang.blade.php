@extends('Layout.app')
@section('content')

<!-- Banner -->
<div class="container-fluid page-header py-5 mb-5 wow fadeIn" data-wow-delay="0.1s">
    <div class="container text-center py-5">
        <h2 class="display-2 text-dark mb-4 animated slideInDown">Giỏ hàng</h2>
    </div>
</div>

<div class="container my-5">
    <nav aria-label="breadcrumb">
        <ol class="breadcrumb bg-light p-3 rounded">
            <li class="breadcrumb-item"><a href="{{ route('home.index') }}">Trang chủ</a></li>
            <li class="breadcrumb-item active" aria-current="page">Giỏ hàng</li>
        </ol>
    </nav>

    @php
        $maTaiKhoan = session('ma_tai_khoan', 1);
        $gioHang = session("cart_$maTaiKhoan", []);
        $tongTien = 0;
    @endphp

    @if (empty($gioHang))
        <div class="alert alert-warning text-center">
            Giỏ hàng của bạn đang trống. <a href="{{ route('home.index') }}" class="text-primary">Tiếp tục mua sắm</a>
        </div>
    @else
        <div class="row">
            <div class="col-lg-8">
                <table class="table text-center">
                    <thead class="bg-primary text-white">
                        <tr>
                            <th>Sản phẩm</th>
                            <th>Giá</th>
                            <th>Số lượng</th>
                            <th>Tổng</th>
                        </tr>
                    </thead>
                    <tbody id="cart-items">
                        @foreach ($gioHang as $maSanPham => $item)
                            @php $tongTien += $item['gia'] * $item['so_luong']; @endphp
                            <tr id="cart-item-{{ $maSanPham }}">
                                <td>
                                    <div class="d-flex align-items-center">
                                        <div class="me-2">
                                            <img src="{{ asset('img/sanpham/' . $item['hinh_anh']) }}" class="img-fluid" style="width: 80px;">
                                        </div>
                                        <div>
                                            <span>{{ $item['ten_san_pham'] }}</span>
                                            <br>
                                            <a href="javascript:void(0);" class="text-danger" onclick="removeFromCart({{ $maSanPham }})">Xóa</a>
                                        </div>
                                    </div>
                                </td>
                                <td>{{ number_format($item['gia'], 0, ',', '.') }}đ</td>
                                <td>
                                    <div class="d-flex align-items-center justify-content-center">
                                        <button class="btn btn-outline-secondary btn-sm" onclick="changeQuantity({{ $maSanPham }}, -1)">-</button>
                                        <input type="number" class="form-control text-center mx-2" value="{{ $item['so_luong'] }}" min="1" style="width: 50px;" readonly>
                                        <button class="btn btn-outline-secondary btn-sm" onclick="changeQuantity({{ $maSanPham }}, 1)">+</button>
                                    </div>
                                </td>
                                <td>{{ number_format($item['gia'] * $item['so_luong'], 0, ',', '.') }}đ</td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
                <button class="btn btn-danger" onclick="clearCart()">Xóa tất cả</button>
            </div>

            <div class="col-lg-4">
                <div class="card p-3">
                    <h4 class="text-center">Tổng Cộng</h4>
                    <p class="d-flex justify-content-between"><span>Tạm tính:</span> <strong id="subtotal">{{ number_format($tongTien, 0, ',', '.') }}đ</strong></p>
                    <p class="d-flex justify-content-between"><span>Phí vận chuyển:</span> <strong id="shipping">15,000đ</strong></p>
                    <hr>
                    <p class="d-flex justify-content-between text-primary"><span><strong>Tổng tiền:</strong></span> <strong id="total">{{ number_format($tongTien + 15000, 0, ',', '.') }}đ</strong></p>
                    <button class="btn btn-primary w-100">Thanh Toán</button>
                </div>
            </div>
        </div>
    @endif
</div>

<script>
    function changeQuantity(maSanPham, change) {
        $.ajax({
            url: "{{ route('giohang.add') }}",
            method: "POST",
            data: {
                ma_san_pham: maSanPham,
                so_luong: change,
                _token: "{{ csrf_token() }}"
            },
            success: function(response) {
                location.reload();
            }
        });
    }

    function removeFromCart(maSanPham) {
        $.ajax({
            url: "/gio-hang/xoa/" + maSanPham,
            method: "DELETE",
            data: { _token: "{{ csrf_token() }}" },
            success: function(response) {
                location.reload();
            }
        });
    }

    function clearCart() {
        $.ajax({
            url: "{{ route('giohang.clear') }}",
            method: "POST",
            data: { _token: "{{ csrf_token() }}" },
            success: function(response) {
                location.reload();
            }
        });
    }
</script>

@endsection
