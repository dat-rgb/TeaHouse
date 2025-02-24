<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class SizeSeeder extends Seeder
{
    public function run()
    {
        $sizes = [
            ['ten_size' => 'Nhỏ', 'gia_size' => 0, 'the_tich' => 360, 'trang_thai' => 1, 'mo-ta' => 'Ly nhỏ 360ml'],
            ['ten_size' => 'Vừa', 'gia_size' => 5000, 'the_tich' => 500, 'trang_thai' => 1, 'mo-ta' => 'Ly vừa 500ml'],
            ['ten_size' => 'Lớn', 'gia_size' => 10000, 'the_tich' => 700, 'trang_thai' => 1, 'mo-ta' => 'Ly lớn 700ml'],
        ];

        DB::table('sizes')->insert($sizes);
    }
}
