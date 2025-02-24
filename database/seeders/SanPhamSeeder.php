<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;

class SanPhamSeeder extends Seeder
{
    public function run()
    {
        $sanPhams = [
            [
                'ten_san_pham' => 'Cà phê sữa',
                'gia' => 25000,
                'slug' => Str::slug('Cà phê sữa'),
                'thu_tu' => 1,
                'mo_ta' => 'Cà phê sữa đậm đà, béo ngậy.',
                'hinh_anh' => 'cafe-sua-da.jpg',
                'ma_danh_muc' => 5, // ID của danh mục cà phê sữa
                'trang_thai' => 1,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'ten_san_pham' => 'Trà Đào Cam Sả',
                'gia' => 30000,
                'slug' => Str::slug('Trà Đào Cam Sả'),
                'thu_tu' => 2,
                'mo_ta' => 'Trà đào thơm mát kết hợp với cam và sả.',
                'hinh_anh' => 'tra-cam-dao.webp',
                'ma_danh_muc' => 3, // ID của danh mục trà trái cây
                'trang_thai' => 1,
                'created_at' => now(),
                'updated_at' => now(),
            ],
        ];

        DB::table('san_phams')->insert($sanPhams);
    }
}
