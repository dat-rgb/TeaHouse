@extends('Layout.app')

@section('title', 'Đăng ký | Tea House Coffee & Tea')

@section('content')
<div class="container py-5 mt-5">
    <div class="row justify-content-center">
        <div class="col-md-6">
            @if ($errors->any())
                <div class="alert alert-danger">
                    <ul class="mb-0">
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif

            <div class="card shadow-lg">
                <div class="card-header bg-success text-white text-center">
                    <h4>Đăng ký</h4>
                </div>

                <div class="card-body">
                    <form method="POST" action="{{ route('auth.register') }}">
                        @csrf

                        <div class="mb-3">
                            <label for="ho_ten" class="form-label">Họ và tên</label>
                            <input type="text" class="form-control" name="ho_ten_khach_hang" required>
                        </div>

                        <div class="mb-3">
                            <label for="ngay_sinh" class="form-label">Ngày sinh</label>
                            <input type="date" class="form-control" name="ngay_sinh" min="1925-01-01" max="">
                        </div>

                        <div class="mb-3">
                            <label for="email" class="form-label">Email</label>
                            <input type="email" class="form-control" name="email" required>
                        </div>

                        <div class="mb-3">
                            <label for="so_dien_thoai" class="form-label">Số điện thoại</label>
                            <input type="tel" class="form-control" name="so_dien_thoai" pattern="^(0\d{9}|\+84\d{9})$" placeholder="VD: 0912345678" required>
                        </div>

                        <div class="mb-3">
                            <label for="password" class="form-label">Mật khẩu</label>
                            <div class="input-group">
                            <input type="password" class="form-control" id="register_password" name="mat_khau" required>
                            <button type="button" class="btn btn-outline-secondary" id="togglePassword">
                                    Hiện
                                </button>
                            </div>
                        </div>

                        <button type="submit" class="btn btn-success w-100">Đăng ký</button>
                    </form>

                    <div class="mt-3 text-center">
                        <a href="{{ route('login') }}">Đã có tài khoản? Đăng nhập</a>
                    </div>
                </div>
            </div>

        </div>
    </div>
</div>

{{-- JavaScript hiện/ẩn mật khẩu --}}
<script>
    document.addEventListener('DOMContentLoaded', function () {
        const toggle = document.getElementById("togglePassword");
        const input = document.getElementById("register_password");

        if (toggle && input) {
            toggle.addEventListener("click", function () {
                const isPassword = input.type === "password";
                input.type = isPassword ? "text" : "password";
                this.innerText = isPassword ? "Ẩn" : "Hiện";
            });
        }
    });


</script>
@endsection
