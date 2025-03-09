<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class NguyenLieuSeeder extends Seeder
{
    public function run()
    {
        // Danh sách nguyên liệu lấy từ sản phẩm
        $nguyen_lieus = [
            ['ten_nguyen_lieu' => 'Trà đen', 'ma_nha_cung_cap' => 1, 'loai_nguyen_lieu' => 0, 'don_vi' => 'kg'],
            ['ten_nguyen_lieu' => 'Trà xanh', 'ma_nha_cung_cap' => 1, 'loai_nguyen_lieu' => 0, 'don_vi' => 'kg'],
            ['ten_nguyen_lieu' => 'Sữa tươi', 'ma_nha_cung_cap' => 2, 'loai_nguyen_lieu' => 0, 'don_vi' => 'lit'],
            ['ten_nguyen_lieu' => 'Đường', 'ma_nha_cung_cap' => 3, 'loai_nguyen_lieu' => 0, 'don_vi' => 'kg'],
            ['ten_nguyen_lieu' => 'Trái cây tươi', 'ma_nha_cung_cap' => 4, 'loai_nguyen_lieu' => 0, 'don_vi' => 'kg'],
            ['ten_nguyen_lieu' => 'Bột sữa', 'ma_nha_cung_cap' => 2, 'loai_nguyen_lieu' => 0, 'don_vi' => 'kg'],
            ['ten_nguyen_lieu' => 'Nước ép nguyên chất', 'ma_nha_cung_cap' => 4, 'loai_nguyen_lieu' => 0, 'don_vi' => 'ml'],
        ];

        // Chèn vào bảng nguyen_lieus
        DB::table('nguyen_lieus')->insert($nguyen_lieus);
    }
}
