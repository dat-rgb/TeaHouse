<?php

use App\Http\Controllers\Admin\AdminHomeController;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\GioHangController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\KhachHangController;
use App\Http\Controllers\SanPhamController;
use Illuminate\Support\Facades\Route;


// Trang đăng nhập
Route::get('/login', [AuthController::class, 'showLoginForm'])->name('login');
Route::post('/login', [AuthController::class, 'login']);

Route::get('google/login',[LoginController::class, 'redirectToGoogle'])->name('google.login');
Route::get('auth/google/callback',[LoginController::class, 'handleGoogleCallback'])->name('google.callback');
// Trang đăng ký
Route::get('/register', [AuthController::class, 'showRegisterForm'])->name('register');
Route::post('/register', [AuthController::class, 'register']);

// Đăng xuất
Route::post('/logout', [AuthController::class, 'logout'])->name('logout');

Route::get('/',[HomeController::class,'index'])->name('home.index');
Route::get('/lien-he',[HomeController::class,'contact'])->name('home.contact');

Route::get('/gio-hang',[GioHangController::class,'gioHang'])->name('home.giohang');

Route::get('/san-pham',[SanPhamController::class, 'index'])->name('sanpham.index');
Route::get('/san-pham/filter', [SanPhamController::class, 'filter'])->name('sanpham.filter');

Route::get('/san-pham/chi-tiet/1',[SanPhamController::class, 'productDetail'])->name('sanpham.detail');

Route::get('/admin/home', [AdminHomeController::class, 'index'])
    ->middleware('auth')
    ->name('admin.home.index');

Route::middleware('auth')->group(function () {
    Route::get('/khachhang', [KhachHangController::class, 'index'])->name('khachhang.index');
    Route::post('/khachhang/update', [KhachHangController::class, 'update'])->name('khachhang.update');
});


