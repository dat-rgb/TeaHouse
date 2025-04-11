@extends('Layout.app')
@section('title', 'Đăng nhập | Tea House Coffee & Tea')

@section('content')
<div class="container py-5 mt-5">
    @if ($errors->any())
        <div class="alert alert-danger alert-dismissible fade show" role="alert">
            <ul class="mb-0">
                @foreach ($errors->all() as $error) <li>{{ $error }}</li> @endforeach
            </ul>
            <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
        </div>
    @endif

    @if (session('success'))
        <div class="alert alert-success alert-dismissible fade show" role="alert">
            {{ session('success') }}
            <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
        </div>
    @endif

    <div class="row justify-content-center">
        <div class="col-md-6 col-lg-5">
            <div class="card shadow-lg rounded-4 border-0 animate__animated animate__fadeIn">
                <div class="card-header bg-primary text-white text-center rounded-top-4">
                    <h4 class="mb-0">Đăng nhập</h4>
                </div>
                <div class="card-body p-4">
                    <form method="POST" action="{{ route('login') }}">
                        @csrf
                        <div class="mb-3">
                            <label for="email" class="form-label">Email</label>
                            <input type="email" class="form-control" id="email" name="email" required>
                        </div>

                        <div class="mb-3">
                            <label for="password" class="form-label">Mật khẩu</label>
                            <div class="input-group">
                                <input type="password" class="form-control password-input" name="mat_khau">
                                <button type="button" class="btn btn-outline-secondary toggle-password">Hiện</button>
                            </div>
                        </div>

                        <div class="d-grid gap-2">
                            <button type="submit" class="btn btn-primary">Đăng nhập</button>
                            <button type="button" class="btn btn-outline-success d-flex align-items-center justify-content-center gap-2">
                                <i class="bi bi-qr-code-scan"></i> Đăng nhập bằng mã QR
                            </button>
                        </div>
                    </form>

                    <div class="mt-4 text-center small">
                        <a href="#" class="text-decoration-none me-2">Quên mật khẩu?</a> | 
                        <a href="{{ route('auth.register.show') }}" class="text-decoration-none ms-2">Đăng ký</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
