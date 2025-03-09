<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;

class CuaHangNguyenLieuSeeder extends Seeder
{
    public function run()
    {
        $now = Carbon::now();

        // Chỉ seed dữ liệu cho cửa hàng có mã = 1
        $cua_hang_nguyen_lieus = [
            ['ma_cua_hang' => 1, 'ma_nguyen_lieu' => 1, 'so_luong_nhap' => 100, 'so_luong_xuat' => 20, 'so_luong_ton' => 80, 'don_vi' => 'kg', 'ngay_nhap_cuoi' => $now, 'ngay_xuat_cuoi' => $now],
            ['ma_cua_hang' => 1, 'ma_nguyen_lieu' => 2, 'so_luong_nhap' => 50, 'so_luong_xuat' => 5, 'so_luong_ton' => 45, 'don_vi' => 'kg', 'ngay_nhap_cuoi' => $now, 'ngay_xuat_cuoi' => $now],
            ['ma_cua_hang' => 1, 'ma_nguyen_lieu' => 3, 'so_luong_nhap' => 200, 'so_luong_xuat' => 50, 'so_luong_ton' => 150, 'don_vi' => 'lit', 'ngay_nhap_cuoi' => $now, 'ngay_xuat_cuoi' => $now],
            ['ma_cua_hang' => 1, 'ma_nguyen_lieu' => 4, 'so_luong_nhap' => 70, 'so_luong_xuat' => 10, 'so_luong_ton' => 60, 'don_vi' => 'kg', 'ngay_nhap_cuoi' => $now, 'ngay_xuat_cuoi' => $now],
            ['ma_cua_hang' => 1, 'ma_nguyen_lieu' => 5, 'so_luong_nhap' => 120, 'so_luong_xuat' => 20, 'so_luong_ton' => 100, 'don_vi' => 'kg', 'ngay_nhap_cuoi' => $now, 'ngay_xuat_cuoi' => $now],
        ];

        DB::table('cua_hang_nguyen_lieus')->insert($cua_hang_nguyen_lieus);
    }
}
