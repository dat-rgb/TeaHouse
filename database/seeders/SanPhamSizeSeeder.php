<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class SanPhamSizeSeeder extends Seeder
{
    public function run()
    {
        $sanPhamSizes = [
            ['ma_san_pham' => 1, 'ma_size' => 1],
            ['ma_san_pham' => 1, 'ma_size' => 2],
            ['ma_san_pham' => 1, 'ma_size' => 3],
            ['ma_san_pham' => 2, 'ma_size' => 2],
            ['ma_san_pham' => 2, 'ma_size' => 3],
        ];

        DB::table('san_pham_sizes')->insert($sanPhamSizes);
    }
}
