<?php

use App\Http\Controllers\Admin\AdminHomeController;
use App\Http\Controllers\Admin\Auth\AdminLoginController;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\Auth\RegisterController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\GioHangController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\KhachHangController;
use App\Http\Controllers\SanPhamController;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Session;

// Đếm số lượng sản phẩm trong giỏ hàng
Route::get('/cart/count', function () {
    $maTaiKhoan = session('ma_tai_khoan', 1);
    $gioHang = session("cart_$maTaiKhoan", []);
    $soLuong = array_sum(array_column($gioHang, 'so_luong'));

    return response()->json(['soLuong' => $soLuong]);
});
// Trang đăng nhập
Route::get('/login', [AuthController::class, 'showLoginForm'])->name('login');
Route::post('/login', [AuthController::class, 'login']);
Route::get('google/login',[LoginController::class, 'redirectToGoogle'])->name('google.login');
Route::get('auth/google/callback',[LoginController::class, 'handleGoogleCallback'])->name('google.callback');
// Trang đăng ký
Route::get('/register', [RegisterController::class, 'showRegisterForm'])->name('auth.register.show');
Route::post('/register', [RegisterController::class, 'register'])->name('auth.register');
// Đăng xuất
Route::post('/logout', [AuthController::class, 'logout'])->name('logout');

//Home
Route::prefix('home')->group(function () {
    Route::get('/', [HomeController::class, 'index'])->name('home.index');
    Route::get('/lien-he', [HomeController::class, 'contact'])->name('home.contact');
    Route::get('/thuc-don', [HomeController::class, 'thucDon'])->name('home.thucdon');
    Route::get('/gio-hang', [GioHangController::class, 'gioHang'])->name('home.giohang');
    Route::get('/not-found', [HomeController::class,'notfound'])->name('home.404');
});


//SamPham
Route::prefix('san-pham')->group(function () {
    Route::get('/',[SanPhamController::class, 'index'])->name('sanpham.index');
    Route::get('/filter', [SanPhamController::class, 'filter'])->name('sanpham.filter');
    Route::get('/{slug}', [SanPhamController::class, 'show'])->name('sanpham.show');
});
//Admin
Route::get('/admin/login',[AdminLoginController::class,'index'])->name('admin.auth.login');
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
    Route::post('/cart/update', [GioHangController::class, 'update'])->name('giohang.update');
    Route::delete('/gio-hang/xoa/{maSanPham}', [GioHangController::class, 'removeFromCart'])->name('giohang.remove');
    Route::post('/xoa-tat-ca', [GioHangController::class, 'clearCart'])->name('giohang.clear');
});


//404
