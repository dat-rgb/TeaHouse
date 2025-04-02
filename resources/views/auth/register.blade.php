@extends('Layout.app')

@section('content')
<div class="container py-5 mt-5">
    <div class="row justify-content-center">
        <div class="col-md-6">
            @if(session('message'))
                <div class="alert alert-success">
                    {{ session('message') }}
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
                            <input type="text" class="form-control" id="ho_ten" name="ho_ten_khach_hang" required>
                        </div>
                        <div class="mb-3">
                            <label for="ngay_sinh" class="form-label">Ngày sinh</label>
                            <input type="date" class="form-control" id="ngay_sinh" name="ngay_sinh" min="1925-01-01" max="2013-12-31">
                        </div>
                        <div class="mb-3">
                            <label for="email" class="form-label">Email</label>
                            <input type="email" class="form-control" id="email" name="email" required>
                        </div>
                        <div class="mb-3">
                            <label for="password" class="form-label">Mật khẩu</label>
                            <div class="input-group">
                                <input type="password" class="form-control" id="password" name="mat_khau" required>
                                <button type="button" class="btn btn-outline-secondary" onclick="togglePassword('password', this)">
                                    <i class="fa fa-eye"></i>
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

<script>
   function togglePassword(fieldId, button) {
        let field = document.getElementById(fieldId);
        let icon = button.querySelector('i');
        
        if (field.type === "password") {
            field.type = "text";
            icon.classList.replace("fa-eye", "fa-eye-slash");
        } else {
            field.type = "password";
            icon.classList.replace("fa-eye-slash", "fa-eye");
        }
    }   
</script>
@endsection
