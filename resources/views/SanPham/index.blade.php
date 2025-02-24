@extends('Layout.app')

@section('content')
<!-- Banner -->
<div class="container-fluid page-header py-5 mb-5 wow fadeIn" data-wow-delay="0.1s">
    <div class="container text-center py-5">
        <h2 class="display-2 text-dark mb-4 animated slideInDown">Sản phẩm</h2>
    </div>
</div>
<div class="container my-5">
    <nav aria-label="breadcrumb">
        <ol class="breadcrumb bg-light p-3 rounded">
            <li class="breadcrumb-item"><a href="{{ route('home.index') }}">Trang chủ</a></li>
            <li class="breadcrumb-item active" aria-current="page">Sản phẩm</li>
        </ol>
    </nav>
    <div class="row mt-4">
        <!-- Sublayout -->
        @include('SanPham.subLayout')
        <!-- Danh sách sản phẩm -->
        <div class="col-lg-9">
            <div class="row">
                @php
                    $products = [
                        ['name' => 'Trà Sữa Matcha', 'price' => '50,000đ', 'image' => 'https://via.placeholder.com/200'],
                        ['name' => 'Cà Phê Đen', 'price' => '35,000đ', 'image' => 'https://via.placeholder.com/200'],
                        ['name' => 'Sinh Tố Bơ', 'price' => '45,000đ', 'image' => 'https://via.placeholder.com/200'],
                        ['name' => 'Nước Ép Cam', 'price' => '30,000đ', 'image' => 'https://via.placeholder.com/200'],
                        ['name' => 'Trà Đào', 'price' => '40,000đ', 'image' => 'https://via.placeholder.com/200'],
                        ['name' => 'Cà Phê Sữa', 'price' => '40,000đ', 'image' => 'https://via.placeholder.com/200'],
                    ];
                @endphp

                @foreach ($products as $product)
                    <div class="col-md-4 mb-4">
                        <div class="card h-100">
                            <img src="{{ $product['image'] }}" class="card-img-top" alt="{{ $product['name'] }}">
                            <div class="card-body">
                                <h5 class="card-title">{{ $product['name'] }}</h5>
                                <p class="card-text text-primary fw-bold">{{ $product['price'] }}</p>
                                <a href="#" class="btn btn-outline-primary w-100">Xem Chi Tiết</a>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </div>
</div>
@endsection
