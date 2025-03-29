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
        <ol class="breadcrumb bg-light p-3 rounded shadow-sm">
            <li class="breadcrumb-item"><a href="{{ route('home.index') }}">Trang chủ</a></li>
            <li class="breadcrumb-item active" aria-current="page">Giỏ hàng</li>
        </ol>
    </nav>

    @php $tongTien = 0; @endphp

    @if (count($gioHang) == 0)
        <div class="alert alert-warning text-center shadow-sm">
            Giỏ hàng của bạn đang trống. <a href="{{ route('sanpham.index') }}" class="text-primary">Tiếp tục mua sắm</a>
        </div>
    @else
        <div class="row">
            <div class="col-lg-8">
                <div class="table-responsive">
                    <table class="table border-0">
                        <thead class="bg-primary text-white">
                            <tr>
                                <th class="text-start px-4">Sản phẩm</th>
                                <th class="text-center">Giá</th>
                                <th class="text-center">Số lượng</th>
                                <th class="text-center">Thành tiền</th>
                            </tr>
                        </thead>
                        <tbody id="cart-items">
                            @foreach ($gioHang as $item)
                                @php 
                                    $giaSanPham = $item['san_pham']->gia;
                                    $giaSize = $item['size']->gia_size ?? 0;
                                    $giaTopping = is_array($item['toppings']) ? collect($item['toppings'])->sum('gia_topping') : 0;
                                    $tongTienSanPham = ($giaSanPham + $giaSize + $giaTopping) * $item['so_luong'];
                                    $tongTien += $tongTienSanPham;
                                @endphp
                                <tr id="cart-item-{{ $item['san_pham']->ma_san_pham }}" class="border-bottom align-middle">
                                    <td class="d-flex align-items-center p-3 text-start">
                                        <img src="{{ asset('img/product/' . $item['san_pham']->hinh_anh) }}" alt="Sản phẩm" width="70" class="rounded">
                                        <div class="ms-3">
                                            <strong>{{ $item['san_pham']->ten_san_pham }}</strong><br>
                                            @if ($item['size'])
                                                <small>Size: {{ $item['size']->ten_size }}</small><br>
                                            @endif
                                            @if (!empty($item['toppings']))
                                                <small>Topping: 
                                                    {{ implode(', ', collect($item['toppings'])->pluck('ten_topping')->toArray()) }}
                                                </small>
                                            @endif
                                        </div>
                                        <button class="btn btn-danger btn-sm ms-auto" onclick="removeFromCart({{ $item['san_pham']->ma_san_pham }})">
                                            <i class="fas fa-trash-alt"></i>
                                        </button>
                                    </td>
                                    <td class="text-center">{{ number_format($giaSanPham + $giaSize + $giaTopping, 0, ',', '.') }}đ</td>
                                    <td class="text-center">
                                        <div class="d-flex align-items-center justify-content-center">
                                            <button class="btn btn-outline-secondary btn-sm" onclick="changeQuantity({{ $item['san_pham']->ma_san_pham }}, -1)">-</button>
                                            <input type="number" id="quantity-{{ $item['san_pham']->ma_san_pham }}" 
                                                class="form-control text-center mx-2 border-0" 
                                                value="{{ $item['so_luong'] }}" min="1" style="width: 70px;" 
                                                onchange="updateQuantity(this, {{ $item['san_pham']->ma_san_pham }})">
                                            <button class="btn btn-outline-secondary btn-sm" onclick="changeQuantity({{ $item['san_pham']->ma_san_pham }}, 1)">+</button>
                                        </div>
                                    </td>
                                    <td class="text-center">{{ number_format($tongTienSanPham, 0, ',', '.') }}đ</td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
                <button class="btn btn-danger mt-3" onclick="clearCart()">Xóa tất cả</button>
            </div>
            <div class="col-lg-4">
                <div class="card p-3 shadow-sm">
                    <h4 class="text-center">Tổng Cộng</h4>
                    <p class="d-flex justify-content-between"><span>Tạm tính:</span> <strong id="subtotal">{{ number_format($tongTien, 0, ',', '.') }}đ</strong></p>
                    <p class="d-flex justify-content-between"><span>Phí vận chuyển:</span> <strong id="shipping">15,000đ</strong></p>
                    <hr>
                    <p class="d-flex justify-content-between text-primary"><strong>Tổng tiền:</strong> <strong id="total">{{ number_format($tongTien + 15000, 0, ',', '.') }}đ</strong></p>
                    <button class="btn btn-primary w-100">Thanh Toán</button>
                </div>
            </div>
        </div>
    @endif
</div>

<script>
     function changeQuantity(maSanPham, change) {
        let quantityInput = $("#quantity-" + maSanPham);
        let newQuantity = parseInt(quantityInput.val()) + change;
        if (newQuantity < 1) return; // Không cho số lượng < 1
        updateCart(maSanPham, newQuantity);
    }

    function updateQuantity(input, maSanPham) {
        let newQuantity = parseInt(input.value);
        if (isNaN(newQuantity) || newQuantity < 1) {
            input.value = 1; // Nếu nhập sai, reset về 1
            newQuantity = 1;
        }
        updateCart(maSanPham, newQuantity);
    }

    function updateCart(maSanPham, newQuantity) {
        $.ajax({
            url: "{{ route('giohang.update') }}",
            method: "POST",
            data: {
                ma_san_pham: maSanPham,
                so_luong: newQuantity,
                _token: "{{ csrf_token() }}"
            },
            success: function(response) {
                if (response.success) {
                    $("#quantity-" + maSanPham).val(newQuantity);
                    $("#subtotal").text(response.tongTien.toLocaleString() + "đ");
                    $("#total").text((response.tongTien + 15000).toLocaleString() + "đ");
                    $("#item-total-" + maSanPham).text(response.itemTotal.toLocaleString() + "đ");
                }
            },
            error: function(xhr) {
                console.error(xhr.responseText);
            }
        });
    }

    function removeFromCart(maSanPham) {
        $.ajax({
            url: "",
            method: "POST",
            data: { 
                ma_san_pham: maSanPham,
                _token: "{{ csrf_token() }}"
            },
            success: function() { location.reload(); },
            error: function(xhr) { console.error(xhr.responseText); }
        });
    }

    function clearCart() {
        $.ajax({
            url: "{{ route('giohang.clear') }}",
            method: "POST",
            data: { _token: "{{ csrf_token() }}" },
            success: function() { location.reload(); },
            error: function(xhr) { console.error(xhr.responseText); }
        });
    }

    
</script>

@endsection