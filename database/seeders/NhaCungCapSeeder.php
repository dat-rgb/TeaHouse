<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class NhaCungCapSeeder extends Seeder
{
    public function run()
    {
        $nhaCungCaps = [
            ['ten_nha_cung_cap' => 'Công ty A', 'dia_chi' => 'Hà Nội', 'so_dien_thoai' => '0123456789', 'email' => 'a@example.com', 'trang_thai' => 1],
            ['ten_nha_cung_cap' => 'Công ty B', 'dia_chi' => 'TP HCM', 'so_dien_thoai' => '0987654321', 'email' => 'b@example.com', 'trang_thai' => 1],
            ['ten_nha_cung_cap' => 'Công ty C', 'dia_chi' => 'Đà Nẵng', 'so_dien_thoai' => '0345678901', 'email' => 'c@example.com', 'trang_thai' => 1],
            ['ten_nha_cung_cap' => 'Công ty D', 'dia_chi' => 'Cần Thơ', 'so_dien_thoai' => '0765432109', 'email' => 'd@example.com', 'trang_thai' => 1],
            ['ten_nha_cung_cap' => 'Công ty E', 'dia_chi' => 'Hải Phòng', 'so_dien_thoai' => '0456789012', 'email' => 'e@example.com', 'trang_thai' => 1],
        ];

        DB::table('nha_cung_caps')->insert($nhaCungCaps);
    }
}
