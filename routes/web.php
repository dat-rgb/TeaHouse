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
// Home
Route::get('/', [HomeController::class, 'index'])->name('home.index');
Route::get('/lien-he', [HomeController::class, 'contact'])->name('home.contact');
Route::get('/thuc-don', [HomeController::class, 'thucDon'])->name('home.thucdon');
Route::get('/gio-hang', [GioHangController::class, 'gioHang'])->name('home.giohang');

//SamPham
Route::prefix('san-pham')->group(function () {
    Route::get('/',[SanPhamController::class, 'index'])->name('sanpham.index');
    Route::get('/filter', [SanPhamController::class, 'filter'])->name('sanpham.filter');
    Route::get('/{id}', [SanPhamController::class, 'show'])->name('sanpham.show');
});
//Admin
Route::get('/admin/home', [AdminHomeController::class, 'index'])
    ->middleware('auth')
    ->name('admin.home.index');
//KhachHang
Route::middleware('auth')->group(function () {
    Route::get('/khachhang', [KhachHangController::class, 'index'])->name('khachhang.index');
    Route::post('/khachhang/update', [KhachHangController::class, 'update'])->name('khachhang.update');
});
//GioHang
Route::prefix('gio-hang')->group(function () {
    Route::get('/', [GioHangController::class, 'gioHang'])->name('giohang.index');
    Route::post('/them', [GioHangController::class, 'addToCart'])->name('giohang.add');
    Route::delete('/gio-hang/xoa/{maSanPham}', [GioHangController::class, 'removeFromCart'])->name('giohang.remove');
    Route::post('/xoa-tat-ca', [GioHangController::class, 'clearCart'])->name('giohang.clear');
});

