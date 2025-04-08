@extends('Layout.app')

@section('content')
<div class="container">
    <h2>Giỏ Hàng</h2>
    <table class="table">
        <thead>
            <tr>
                <th>#</th>
                <th>Sản phẩm</th>
                <th>Giá</th>
                <th>Số lượng</th>
                <th>Thành tiền</th>
                <th>Thao tác</th>
            </tr>
        </thead>
        <tbody>
            @php $index = 1; $total = 0; @endphp
            @foreach(session("cart_" . (auth()->check() ? auth()->user()->ma_tai_khoan : 1), []) as $key => $item)
                @php 
                    $sanPham = App\Models\SanPham::find($item['ma_san_pham']);
                    $size = App\Models\Sizes::find($item['size']);
                    $toppings = App\Models\Topping::whereIn('ma_topping', $item['toppings'])->get();
                    $subtotal = $item['gia'] * $item['so_luong'];
                    $total += $subtotal;
                @endphp
                <tr>
                    <td>{{ $index++ }}</td>
                    <td>
                        <img src="{{ asset('img/product/'. $sanPham->hinh_anh) }}" alt="{{ $sanPham->ten_san_pham }}" width="50">
                        <strong>{{ $sanPham->ten_san_pham }}</strong> <br>
                        Size: {{ $size->ten_size }} <br>
                        Topping:
                        <ul>
                            @foreach($toppings as $topping)
                                <li>{{ $topping->ten_topping }}</li>
                            @endforeach
                        </ul>
                    </td>
                    <td>{{ number_format($item['gia'], 0, ',', '.') }}đ</td>
                    <td>
                        <button class="btn btn-sm btn-secondary" onclick="updateQuantity('{{ $key }}', -1)">-</button>
                        {{ $item['so_luong'] }}
                        <button class="btn btn-sm btn-secondary" onclick="updateQuantity('{{ $key }}', 1)">+</button>
                    </td>
                    <td>{{ number_format($subtotal, 0, ',', '.') }}đ</td>
                    <td>
                        <button class="btn btn-danger btn-sm" onclick="removeItem('{{ $key }}')">Xóa</button>
                    </td>
                </tr>
            @endforeach
        </tbody>
        <tfoot>
            <tr>
                <td colspan="4"><strong>Tổng tiền:</strong></td>
                <td><strong>{{ number_format($total, 0, ',', '.') }}đ</strong></td>
                <td>
                    <button class="btn btn-danger" onclick="clearCart()">Xóa tất cả</button>
                </td>
            </tr>
        </tfoot>
    </table>
</div>

<script>
    function updateQuantity(key, change) {
        // Gửi request AJAX cập nhật số lượng
    }
    function removeItem(key) {
        // Gửi request AJAX xóa sản phẩm
    }
    function clearCart() {
        // Gửi request AJAX xóa toàn bộ giỏ hàng
    }
</script>
@endsection
