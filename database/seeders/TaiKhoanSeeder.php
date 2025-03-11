<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class TaiKhoanSeeder extends Seeder {
    public function run() {
        $taiKhoan = [
            ['email' => '', 'mat_khau' => '', 'loai_tai_khoan' => 0, 'trang_thai' => 1], // Guest
            // Admin
            ['email' => 'admin@example.com', 'mat_khau' => Hash::make('admin123'), 'loai_tai_khoan' => 1, 'trang_thai' => 1],

            // Nhân viên bán hàng
            ['email' => 'nvbh1@example.com', 'mat_khau' => Hash::make('nvbh123'), 'loai_tai_khoan' => 2, 'trang_thai' => 1],
            ['email' => 'nvbh2@example.com', 'mat_khau' => Hash::make('nvbh123'), 'loai_tai_khoan' => 2, 'trang_thai' => 1],
            ['email' => 'nvbh3@example.com', 'mat_khau' => Hash::make('nvbh123'), 'loai_tai_khoan' => 2, 'trang_thai' => 1],

            // Nhân viên kho
            ['email' => 'nvkho1@example.com', 'mat_khau' => Hash::make('nvkho123'), 'loai_tai_khoan' => 2, 'trang_thai' => 1],
            ['email' => 'nvkho2@example.com', 'mat_khau' => Hash::make('nvkho123'), 'loai_tai_khoan' => 2, 'trang_thai' => 1],

            // Nhân viên phục vụ
            ['email' => 'nvpv1@example.com', 'mat_khau' => Hash::make('nvpv123'), 'loai_tai_khoan' => 2, 'trang_thai' => 1],
            ['email' => 'nvpv2@example.com', 'mat_khau' => Hash::make('nvpv123'), 'loai_tai_khoan' => 2, 'trang_thai' => 1],
            ['email' => 'nvpv3@example.com', 'mat_khau' => Hash::make('nvpv123'), 'loai_tai_khoan' => 2, 'trang_thai' => 1],
            ['email' => 'nvpv4@example.com', 'mat_khau' => Hash::make('nvpv123'), 'loai_tai_khoan' => 2, 'trang_thai' => 1],

            // Khách hàng
            ['email' => 'kh1@example.com', 'mat_khau' => Hash::make('kh123'), 'loai_tai_khoan' => 3, 'trang_thai' => 1],
            ['email' => 'kh2@example.com', 'mat_khau' => Hash::make('kh123'), 'loai_tai_khoan' => 3, 'trang_thai' => 1],
            ['email' => 'kh3@example.com', 'mat_khau' => Hash::make('kh123'), 'loai_tai_khoan' => 3, 'trang_thai' => 1],
            ['email' => 'kh4@example.com', 'mat_khau' => Hash::make('kh123'), 'loai_tai_khoan' => 3, 'trang_thai' => 1],
            ['email' => 'kh5@example.com', 'mat_khau' => Hash::make('kh123'), 'loai_tai_khoan' => 3, 'trang_thai' => 1],

        ];
        DB::table('tai_khoan')->insert($taiKhoan);
    }
}
