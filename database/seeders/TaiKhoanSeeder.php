<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class TaiKhoanSeeder extends Seeder {
    public function run() {
        $taiKhoan = [
            ['so_dien_thoai' => '', 'mat_khau' => '', 'loai_tai_khoan' => 0, 'trang_thai' => 1], // Guest

            ['so_dien_thoai' => '0123456789', 'mat_khau' => Hash::make('admin123'), 'loai_tai_khoan' => 1, 'trang_thai' => 1], // Admin
            
            // Nhân viên bán hàng
            ['so_dien_thoai' => '0911111111', 'mat_khau' => Hash::make('nvbh123'), 'loai_tai_khoan' => 2, 'trang_thai' => 1],
            ['so_dien_thoai' => '0922222222', 'mat_khau' => Hash::make('nvbh123'), 'loai_tai_khoan' => 2, 'trang_thai' => 1],
            ['so_dien_thoai' => '0933333333', 'mat_khau' => Hash::make('nvbh123'), 'loai_tai_khoan' => 2, 'trang_thai' => 1],

            // Nhân viên kho
            ['so_dien_thoai' => '0944444444', 'mat_khau' => Hash::make('nvkho123'), 'loai_tai_khoan' => 2, 'trang_thai' => 1],
            ['so_dien_thoai' => '0955555555', 'mat_khau' => Hash::make('nvkho123'), 'loai_tai_khoan' => 2, 'trang_thai' => 1],

            // Nhân viên phục vụ
            ['so_dien_thoai' => '0966666666', 'mat_khau' => Hash::make('nvpv123'), 'loai_tai_khoan' => 2, 'trang_thai' => 1],
            ['so_dien_thoai' => '0977777777', 'mat_khau' => Hash::make('nvpv123'), 'loai_tai_khoan' => 2, 'trang_thai' => 1],
            ['so_dien_thoai' => '0988888888', 'mat_khau' => Hash::make('nvpv123'), 'loai_tai_khoan' => 2, 'trang_thai' => 1],
            ['so_dien_thoai' => '0999999999', 'mat_khau' => Hash::make('nvpv123'), 'loai_tai_khoan' => 2, 'trang_thai' => 1],

            // Khách hàng
            ['so_dien_thoai' => '0800000001', 'mat_khau' => Hash::make('kh123'), 'loai_tai_khoan' => 3, 'trang_thai' => 1],
            ['so_dien_thoai' => '0800000002', 'mat_khau' => Hash::make('kh123'), 'loai_tai_khoan' => 3, 'trang_thai' => 1],
            ['so_dien_thoai' => '0800000003', 'mat_khau' => Hash::make('kh123'), 'loai_tai_khoan' => 3, 'trang_thai' => 1],
            ['so_dien_thoai' => '0800000004', 'mat_khau' => Hash::make('kh123'), 'loai_tai_khoan' => 3, 'trang_thai' => 1],
            ['so_dien_thoai' => '0800000005', 'mat_khau' => Hash::make('kh123'), 'loai_tai_khoan' => 3, 'trang_thai' => 1],
        ];

        DB::table('tai_khoan')->insert($taiKhoan);
    }
}
