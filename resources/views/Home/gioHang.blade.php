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
                <tbody>
                    <tr>
                        <td>
                            <div class="d-flex align-items-center">
                                <!-- Phần hình ảnh -->
                                <div class="me-2">
                                    <img src="{{ asset('img/sanpham/cafe_den_da.jpg') }}" class="img-fluid" alt="Sản phẩm" style="width: 80px;">
                                </div>
                                <!-- Phần tên sản phẩm và nút xóa -->
                                <div>
                                    <span>Cafe Đen Đá</span>
                                    <br>
                                    <a href="" class="text-danger">Xóa</a>
                                </div>
                            </div>
                        </td>
                        <td>50,000đ</td>
                        <td>
                            <div class="d-flex align-items-center justify-content-center">
                                <button class="btn btn-outline-secondary btn-sm" onclick="decreaseQuantity(this)">-</button>
                                <input type="number" class="form-control text-center mx-2" value="1" min="1" style="width: 50px;">
                                <button class="btn btn-outline-secondary btn-sm" onclick="increaseQuantity(this)">+</button>
                            </div>
                        </td>
                        <td>50,000đ</td>
                    </tr>
                </tbody>
            </table>
        </div>
        <div class="col-lg-4">
            <div class="card p-3">
                <h4 class="text-center">Tổng Cộng</h4>
                <p class="d-flex justify-content-between"><span>Tạm tính:</span> <strong>120,000đ</strong></p>
                <p class="d-flex justify-content-between"><span>Phí vận chuyển:</span> <strong>15,000đ</strong></p>
                <hr>
                <p class="d-flex justify-content-between text-primary"><span><strong>Tổng tiền:</strong></span> <strong>135,000đ</strong></p>
                <button class="btn btn-primary w-100">Thanh Toán</button>
            </div>
        </div>
    </div>
</div>

<script>
    function increaseQuantity(button) {
        let input = button.previousElementSibling;
        input.value = parseInt(input.value) + 1;
    }
    
    function decreaseQuantity(button) {
        let input = button.nextElementSibling;
        if (input.value > 1) {
            input.value = parseInt(input.value) - 1;
        }
    }
</script>

@endsection
