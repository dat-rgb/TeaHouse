@extends('Layout.app')
@section('title', $title)
@section('content')
 <!-- 404 Start -->
 <div class="container-xxl py-5 wow fadeInUp" data-wow-delay="0.1s">
        <div class="container text-center">
            <div class="row justify-content-center">
                <div class="col-lg-6">
                    <i class="bi bi-exclamation-triangle display-1 text-primary"></i>
                    <h1 class="display-1">404</h1>
                    <h1 class="mb-4">Trang không tìm thấy</h1>
                    <p class="mb-4">Chúng tôi rất tiếc, trang bạn tìm không tồn tại trên website của chúng tôi! Bạn có thể quay lại trang chủ hoặc thử tìm kiếm trang khác?</p>
                    <a class="btn btn-primary rounded-pill py-3 px-5" href="{{ route('home.index') }}">Quay lại trang chủ</a>
                </div>
            </div>
        </div>
    </div>
    <!-- 404 End -->
@endsection
