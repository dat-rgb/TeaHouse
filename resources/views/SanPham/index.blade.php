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
            <div id="product-list">
                @include('SanPham.productList', ['products' => $products])
            </div>
        </div>
    </div>
</div>

@endsection
