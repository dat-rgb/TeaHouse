<?php

use App\Http\Controllers\GioHangController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\SanPhamController;
use Illuminate\Support\Facades\Route;


Route::get('/',[HomeController::class,'index'])->name('home.index');
Route::get('/lien-he',[HomeController::class,'contact'])->name('home.contact');

Route::get('/gio-hang',[GioHangController::class,'gioHang'])->name('home.giohang');

Route::get('/san-pham',[SanPhamController::class, 'index'])->name('sanpham.index');
Route::get('/san-pham/filter', [SanPhamController::class, 'filter'])->name('sanpham.filter');


Route::get('/san-pham/chi-tiet/1',[SanPhamController::class, 'productDetail'])->name('sanpham.detail');