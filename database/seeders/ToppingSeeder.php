<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;

class ToppingSeeder extends Seeder
{
    public function run()
    {
        $toppings = [
            [
                'ten_topping' => 'Trân châu đen',
                'gia_topping' => 5000,
                'anh_dai_dien' => 'tran-chau-den.jpg',
                'trang_thai' => 1,
                'mo_ta' => 'Trân châu đen dai ngon.',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'ten_topping' => 'Trân châu trắng',
                'gia_topping' => 5000,
                'anh_dai_dien' => 'tran-chau-den.jpg',
                'trang_thai' => 1,
                'mo_ta' => '',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'ten_topping' => 'Trân châu hoàng kim',
                'gia_topping' => 5000,
                'anh_dai_dien' => 'tran-chau-den.jpg',
                'trang_thai' => 1,
                'mo_ta' => '',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'ten_topping' => 'Đào - Peach 3 miếng',
                'gia_topping' => 15000,
                'anh_dai_dien' => 'tran-chau-den.jpg',
                'trang_thai' => 1,
                'mo_ta' => '',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'ten_topping' => 'Kem cheese',
                'gia_topping' => 7000,
                'anh_dai_dien' => 'kem-cheese.jpg',
                'trang_thai' => 1,
                'mo_ta' => 'Lớp kem cheese béo mịn, thơm ngon.',
                'created_at' => now(),
                'updated_at' => now(),
            ],
        ];

        DB::table('toppings')->insert($toppings);
    }
}
