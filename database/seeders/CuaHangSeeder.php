<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class CuaHangSeeder extends Seeder
{
    public function run()
    {
        DB::table('cua_hangs')->insert([
            'ten_cua_hang' => 'TeaHouse Quận 1',
            'dia_chi' => '65, Huỳnh Thúc Kháng, Bến Nghé, Quận 1, TP.HCM',
            'so_dien_thoai' => '0901234567',
            'email' => 'teahouse@example.com',
            'created_at' => now(),
            'updated_at' => now(),
        ]);
    }
}

