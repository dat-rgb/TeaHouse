@extends('Layout.app')

@section('title', 'Đăng ký | Tea House Coffee & Tea')

@section('content')
<div class="container py-5 mt-5">
    <div class="row justify-content-center">
        <div class="col-md-6">

            @if ($errors->any())
                <div class="alert alert-danger rounded-3 shadow-sm">
                    <ul class="mb-0 ps-3">
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif

            <div class="card shadow-lg border-0 rounded-4">
                <div class="card-header bg-success text-white text-center rounded-top-4">
                    <h4 class="mb-0">Đăng ký tài khoản</h4>
                </div>

                <div class="card-body px-4 py-3">
                    <form method="POST" action="{{ route('auth.register') }}">
                        @csrf

                        <div class="mb-3">
                            <label for="ho_ten" class="form-label fw-semibold">Họ và tên</label>
                            <input type="text" class="form-control rounded-3" name="ho_ten_khach_hang" required>
                        </div>

                        <div class="mb-3">
                            <label for="ngay_sinh" class="form-label fw-semibold">Ngày sinh</label>
                            <input type="date" class="form-control rounded-3" name="ngay_sinh" min="1925-01-01" max="2025-01-01">
                        </div>

                        <div class="mb-3">
                            <label for="email" class="form-label fw-semibold">Email</label>
                            <input type="email" class="form-control rounded-3" name="email" required>
                        </div>

                        <div class="mb-3">
                            <label for="so_dien_thoai" class="form-label fw-semibold">Số điện thoại</label>
                            <input type="tel" class="form-control rounded-3" name="so_dien_thoai" pattern="^(0\d{9}|\+84\d{9})$" placeholder="VD: 0912345678" required>
                        </div>

                        <div class="mb-4">
                            <label for="password" class="form-label fw-semibold">Mật khẩu</label>
                            <div class="input-group">
                                <input type="password" class="form-control password-input" name="mat_khau">
                                <button type="button" class="btn btn-outline-secondary toggle-password">Hiện</button>
                            </div>
                        </div>

                        <button type="submit" class="btn btn-success w-100 py-2 fw-bold">Đăng ký</button>
                    </form>

                    <div class="mt-4 text-center">
                        <span class="text-muted">Đã có tài khoản?</span>
                        <a href="{{ route('login') }}" class="fw-semibold text-decoration-none">Đăng nhập</a>
                    </div>
                </div>
            </div>

        </div>
    </div>
</div>
@endsection
