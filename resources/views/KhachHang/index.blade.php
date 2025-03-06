@extends('Layout.app')

@section('content')
<div class="container">
    <div class="row d-flex justify-content-center" style="margin-top: 100px;">
        <!-- Sublayout -->
        <div class="col-md-3">
            @include('KhachHang.sublayout')
        </div>
        <!-- Form -->
        <div class="col-md-4">
            @if(session('message'))
                @include('components.notification-modal')
            @endif
            <h3>Thông tin tài khoản</h3>
            <form action="{{ route('khachhang.update') }}" method="POST">
                @csrf
                <div class="mb-3">
                    <label for="ho_ten_khach_hang" class="form-label">Họ và tên</label>
                    <input type="text" class="form-control" name="ho_ten_khach_hang" value="{{ $khachHang->ho_ten_khach_hang }}" required>
                </div>
                <div class="mb-3">
                    <label for="ngay_sinh" class="form-label">Ngày sinh</label>
                    <input type="date" class="form-control" name="ngay_sinh" value="{{ $khachHang->ngay_sinh }}">
                </div>
                <div class="mb-3">
                    <label for="gioi_tinh" class="form-label">Giới tính</label>
                    <select class="form-control" name="gioi_tinh">
                        <option value="null"></option>
                        <option value="1" {{ $khachHang->gioi_tinh == 1 ? 'selected' : '' }}>Nam</option>
                        <option value="0" {{ $khachHang->gioi_tinh == 0 ? 'selected' : '' }}>Nữ</option>
                    </select>
                </div>
                <div class="mb-3">
                    <label for="so_dien_thoai" class="form-label">Số điện thoại</label>
                    <input type="text" class="form-control" name="so_dien_thoai" value="{{ $khachHang->taiKhoan->so_dien_thoai }}" readonly>
                </div>
                <div class="mb-3">
                    <label for="email" class="form-label">Email</label>
                    <input type="email" class="form-control" name="email" value="{{ $khachHang->taiKhoan->email }}" readonly>
                </div>
                <div class="mb-3">
                    <label for="dia_chi" class="form-label">Địa chỉ</label>
                    <input type="text" class="form-control" name="dia_chi" value="{{ $khachHang->dia_chi }}">
                </div>
                <button type="submit" class="btn btn-primary">Cập nhật</button>
            </form>
        </div>
    </div>
</div>
@endsection
