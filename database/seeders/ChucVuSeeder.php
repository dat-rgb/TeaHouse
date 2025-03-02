<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ChucVuSeeder extends Seeder
{
    public function run()
    {
        DB::table('chuc_vu')->insert([
            ['ten_chuc_vu' => 'Nhân viên phục vụ', 'luong_co_ban' => 5000000],
            ['ten_chuc_vu' => 'Nhân viên bán hàng', 'luong_co_ban' => 6000000],
            ['ten_chuc_vu' => 'Nhân viên kho', 'luong_co_ban' => 5500000],
            ['ten_chuc_vu' => 'Nhân viên chăm sóc khách hàng', 'luong_co_ban' => 5800000],
        ]);
    }
}
