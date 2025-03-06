<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class KhachHangSeeder extends Seeder
{
    public function run()
    {
        $khachHangs = [
            ['ma_tai_khoan' => 11, 'ho_ten_khach_hang' => 'Ngô Văn J', 'gioi_tinh' => 1,  'dia_chi' => 'Hà Nội', 'diem_thanh_vien' => 100, 'hang_thanh_vien' => 'Đồng'],
            ['ma_tai_khoan' => 12, 'ho_ten_khach_hang' => 'Bùi Thị K', 'gioi_tinh' => 0,  'dia_chi' => 'HCM', 'diem_thanh_vien' => 200, 'hang_thanh_vien' => 'Bạc'],
            ['ma_tai_khoan' => 13, 'ho_ten_khach_hang' => 'Tô Văn L', 'gioi_tinh' => 1,  'dia_chi' => 'Đà Nẵng', 'diem_thanh_vien' => 300, 'hang_thanh_vien' => 'Vàng'],
            ['ma_tai_khoan' => 14, 'ho_ten_khach_hang' => 'Lâm Thị M', 'gioi_tinh' => 0,  'dia_chi' => 'Cần Thơ', 'diem_thanh_vien' => 150, 'hang_thanh_vien' => 'Đồng'],
            ['ma_tai_khoan' => 15, 'ho_ten_khach_hang' => 'Vương Văn N', 'gioi_tinh' => 1, 'dia_chi' => 'Hải Phòng', 'diem_thanh_vien' => 250, 'hang_thanh_vien' => 'Bạc'],
        ];

        DB::table('khach_hang')->insert($khachHangs);
    }
}

