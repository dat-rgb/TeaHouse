<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class SanPhamToppingSeeder extends Seeder
{
    public function run()
    {
        $sanPhamToppings = [
            ['ma_san_pham' => 2, 'ma_topping' => 1],
            ['ma_san_pham' => 2, 'ma_topping' => 2],
            ['ma_san_pham' => 2, 'ma_topping' => 3],
            ['ma_san_pham' => 2, 'ma_topping' => 4],
            ['ma_san_pham' => 2, 'ma_topping' => 5],
        ];

        DB::table('san_pham_toppings')->insert($sanPhamToppings);
    }
}
