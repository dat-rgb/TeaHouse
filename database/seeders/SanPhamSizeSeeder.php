<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class SanPhamSizeSeeder extends Seeder
{
    public function run()
    {
        $sanPhamSizes = [
            // sp 1
            ['ma_san_pham' => 1, 'ma_size' => 1],
            ['ma_san_pham' => 1, 'ma_size' => 2],
            ['ma_san_pham' => 1, 'ma_size' => 3],
            // sp 2
            ['ma_san_pham' => 2, 'ma_size' => 1],
            ['ma_san_pham' => 2, 'ma_size' => 2],
            ['ma_san_pham' => 2, 'ma_size' => 3],
            // sp 3
            ['ma_san_pham' => 3, 'ma_size' => 1],
            ['ma_san_pham' => 3, 'ma_size' => 2],
            ['ma_san_pham' => 3, 'ma_size' => 3],
            // sp 4
            ['ma_san_pham' => 4, 'ma_size' => 1],
            ['ma_san_pham' => 4, 'ma_size' => 2],
           
            // sp 5
            ['ma_san_pham' => 5, 'ma_size' => 1],
            ['ma_san_pham' => 5, 'ma_size' => 2],
          
            // sp 6
            ['ma_san_pham' => 6, 'ma_size' => 1],
            ['ma_san_pham' => 6, 'ma_size' => 2],
            ['ma_san_pham' => 6, 'ma_size' => 3],
            // sp 7
            ['ma_san_pham' => 7, 'ma_size' => 1],
            ['ma_san_pham' => 7, 'ma_size' => 2],
            ['ma_san_pham' => 7, 'ma_size' => 3],
            // sp 8
            ['ma_san_pham' => 8, 'ma_size' => 1],
            ['ma_san_pham' => 8, 'ma_size' => 2],
            ['ma_san_pham' => 8, 'ma_size' => 3],
            // sp 9
            ['ma_san_pham' => 9, 'ma_size' => 1],
            ['ma_san_pham' => 9, 'ma_size' => 2],
           
            // sp 10
            ['ma_san_pham' => 10, 'ma_size' => 1],
            ['ma_san_pham' => 10, 'ma_size' => 2],
            ['ma_san_pham' => 10, 'ma_size' => 3],
            // sp 11
            ['ma_san_pham' => 11, 'ma_size' => 1],
            ['ma_san_pham' => 11, 'ma_size' => 2],
            ['ma_san_pham' => 11, 'ma_size' => 3],
            // sp 12
            ['ma_san_pham' => 12, 'ma_size' => 1],
            ['ma_san_pham' => 12, 'ma_size' => 2],
            ['ma_san_pham' => 12, 'ma_size' => 3],
            // sp 13
            ['ma_san_pham' => 13, 'ma_size' => 1],
            ['ma_san_pham' => 13, 'ma_size' => 2],
            ['ma_san_pham' => 13, 'ma_size' => 3],
            // sp 14
            ['ma_san_pham' => 14, 'ma_size' => 1],
            ['ma_san_pham' => 14, 'ma_size' => 2],
            ['ma_san_pham' => 14, 'ma_size' => 3],
            // sp 15
            ['ma_san_pham' => 15, 'ma_size' => 1],
            ['ma_san_pham' => 15, 'ma_size' => 2],
            ['ma_san_pham' => 15, 'ma_size' => 3],
            // sp 16
            ['ma_san_pham' => 16, 'ma_size' => 1],
            ['ma_san_pham' => 16, 'ma_size' => 2],
            ['ma_san_pham' => 16, 'ma_size' => 3],
            // sp 17
            ['ma_san_pham' => 17, 'ma_size' => 1],
            ['ma_san_pham' => 17, 'ma_size' => 2],
            ['ma_san_pham' => 17, 'ma_size' => 3],
            // sp 18
            ['ma_san_pham' => 18, 'ma_size' => 1],
            ['ma_san_pham' => 18, 'ma_size' => 2],
            ['ma_san_pham' => 18, 'ma_size' => 3],
            // sp 19
            ['ma_san_pham' => 19, 'ma_size' => 1],
            ['ma_san_pham' => 19, 'ma_size' => 2],
            ['ma_san_pham' => 19, 'ma_size' => 3],
            // sp 20
            ['ma_san_pham' => 20, 'ma_size' => 1],
            ['ma_san_pham' => 20, 'ma_size' => 2],
            ['ma_san_pham' => 20, 'ma_size' => 3],
            // sp 21
            ['ma_san_pham' => 21, 'ma_size' => 1],
            ['ma_san_pham' => 21, 'ma_size' => 2],
            ['ma_san_pham' => 21, 'ma_size' => 3],
            // sp 22
            ['ma_san_pham' => 22, 'ma_size' => 1],
            ['ma_san_pham' => 22, 'ma_size' => 2],
            ['ma_san_pham' => 22, 'ma_size' => 3],
            // sp 23
            ['ma_san_pham' => 23, 'ma_size' => 1],
            ['ma_san_pham' => 23, 'ma_size' => 2],
            ['ma_san_pham' => 23, 'ma_size' => 3],
        ];
        DB::table('san_pham_sizes')->insert($sanPhamSizes);
    }
}
