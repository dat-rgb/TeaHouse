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
                @foreach ($products as $product)
                    <div class="col-md-4 mb-4">
                        <div class="card h-100 shadow-sm border-0 rounded-lg overflow-hidden">
                            <div class="position-relative d-flex justify-content-center align-items-center" style="height: 250px;">
                                <img src="{{ asset('img/product/' . $product->hinh_anh) }}" 
                                    class="img-fluid p-3 rounded" 
                                    alt="{{ $product->ten_san_pham }}" 
                                    style="max-width: 100%; max-height: 100%; object-fit: contain;">
                            </div>
                            <div class="card-body text-center">
                                <h6 class="card-title font-weight-bold">{{ $product->ten_san_pham }}</h6>
                                <p class="card-text text-danger fw-bold">{{ number_format($product->gia, 0, ',', '.') }} VND</p>
                                <a href="#" class="btn btn-primary w-100 rounded-pill">Xem Chi Tiết</a>
                            </div>
                        </div>
                    </div>
                @endforeach
                @if ($products->isEmpty())
                    <p class="text-center w-100">Không có sản phẩm nào.</p>
                @endif
            </div>
            <!-- Thêm phân trang -->
            <div class="d-flex justify-content-center mt-4">
                {{ $products->links('pagination::bootstrap-4') }}
            </div>
        </div>
    </div>
</div>
@endsection
