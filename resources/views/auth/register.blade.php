@extends('Layout.app')

@section('content')
<div class="container py-5 mt-5">
        <div class="row justify-content-center">
        <div class="col-md-6">
            @if(session('message'))
                
            @endif
            <div class="card shadow-lg">
                <div class="card-header bg-success text-white text-center">
                    <h4>Đăng ký</h4>
                </div>
                <div class="card-body">
                    <form method="POST" action="{{ route('register') }}">
                        @csrf
                        <div class="mb-3">
                            <label for="ho_ten" class="form-label">Họ và tên</label>
                            <input type="text" class="form-control" id="ho_ten" name="ho_ten_khach_hang" required>
                        </div>
                        <div class="mb-3">
                            <label for="ngay_sinh" class="form-label">Ngày sinh</label>
                            <input type="date" class="form-control" id="ngay_sinh" name="ngay_sinh">
                        </div>
                        <div class="mb-3">
                            <label for="email" class="form-label">Email</label>
                            <input type="email" class="form-control" id="email" name="email" required>
                        </div>
                        <div class="mb-3">
                            <label for="so_dien_thoai" class="form-label">Số điện thoại</label>
                            <input type="text" class="form-control" id="so_dien_thoai" name="so_dien_thoai" required>
                        </div>
                        <div class="mb-3">
                            <label for="password" class="form-label">Mật khẩu</label>
                            <input type="password" class="form-control" id="password" name="mat_khau" required>
                        </div>
                        <div class="mb-3">
                            <label for="password_confirmation" class="form-label">Xác nhận mật khẩu</label>
                            <input type="password" class="form-control" id="password_confirmation" name="mat_khau_confirmation" required>
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
@endsection
<script>
    console.log(@json(session()->all()));
</script>
