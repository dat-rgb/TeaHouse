<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class NhaCungCapSeeder extends Seeder
{
    public function run()
    {
        $nhaCungCaps = [
            //1
            [
                'ten_nha_cung_cap' => 'CTY TNHH COFFEE CONCEPT',
                'dia_chi' => 'Số 5 Đường 7C, KP5, P. An Phú, TP. Thủ Đức, TP. HCM.', 
                'so_dien_thoai' => '0965867586',
                'email' => 'hello@coffeeconcept.vn', 
                'trang_thai' => 1
            ],
            //2
            [
                'ten_nha_cung_cap' => 'CÔNG TY CỐ PHẦN SỮA VIỆT NAM',
                'dia_chi' => '10, Tân Trào, Phường Tân Phú, Quận 7, Thành phố Hồ Chí Minh, Việt Nam', 
                'so_dien_thoai' => '0254155555',
                'email' => 'vinamilk@vinamilk.com.vn', 
                'trang_thai' => 1
            ],
            //3
            [
                'ten_nha_cung_cap' => 'CÔNG TY CỐ PHẦN VINBAR',
                'dia_chi' => '', 
                'so_dien_thoai' => '',
                'email' => 'hotro@vinbar.vn', 
                'trang_thai' => 1
            ],
            //4
            //5
            //6
            //7
            //8
            //9
        ];

        DB::table('nha_cung_caps')->insert($nhaCungCaps);
    }
}
