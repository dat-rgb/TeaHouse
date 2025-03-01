<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;

class DanhMucSanPhamSeeder extends Seeder
{
    public function run()
    {
        $categories = [
            //1
            [
                'ten_danh_muc' => 'Cà phê',
                'slug' => Str::slug('Cà phê'),
                'anh_dai_dien' => 'ca-phe.jpg',
                'danh_muc_cha_id' => null,
                'trang_thai' => 1,
                'thu_tu' => 1,
                'mo_ta' => 'Cà phê nguyên chất, đậm đà hương vị.',
            ],
            //2
            [
                'ten_danh_muc' => 'Trà',
                'slug' => Str::slug('Trà'),
                'anh_dai_dien' => 'tra-trai-cay.jpg',
                'danh_muc_cha_id' => null,
                'trang_thai' => 1,
                'thu_tu' => 2,
                'mo_ta' => 'Trà trái cây tươi mát, tốt cho sức khỏe.',
            ],
            //3
            [
                'ten_danh_muc' => 'Sinh tố',
                'slug' => Str::slug('Sinh tố'),
                'anh_dai_dien' => 'sinh-to.jpg',
                'danh_muc_cha_id' => null,
                'trang_thai' => 1,
                'thu_tu' => 3,
                'mo_ta' => 'Sinh tố trái cây tươi, bổ dưỡng.',
            ],
            //4
            [
                'ten_danh_muc' => 'Nước ép',
                'slug' => Str::slug('Nước ép'),
                'anh_dai_dien' => 'nuoc-ep.jpg',
                'danh_muc_cha_id' => null,
                'trang_thai' => 1,
                'thu_tu' => 4,
                'mo_ta' => 'Nước ép trái cây nguyên chất.',
            ],

            //Các danh mục con
            //Danh mục: 1 Cà phê 
            //5
            [
                'ten_danh_muc' => 'Cà phê Việt Nam',
                'slug' => Str::slug('Cà phê Việt Nam'),
                'anh_dai_dien' => 'ca-phe-sua.jpg',
                'danh_muc_cha_id' => 1, // Thuộc danh mục "Cà phê"
                'trang_thai' => 1,
                'thu_tu' => 5,
                'mo_ta' => 'Cà phê Việt Nam thơm ngon, đậm chất Việt!',
            ],
            //6
            [
                'ten_danh_muc' => 'Cà phê máy',
                'slug' => Str::slug('Cà phê máy'),
                'anh_dai_dien' => 'ca-phe-sua.jpg',
                'danh_muc_cha_id' => 1, // Thuộc danh mục "Cà phê"
                'trang_thai' => 1,
                'thu_tu' => 5,
                'mo_ta' => 'Cà phê pha máy',
            ],
            //Danh mục: 2 Trà
            //7
            [
                'ten_danh_muc' => 'Trà trái cây',
                'slug' => Str::slug('Trà trái cây'),
                'anh_dai_dien' => 'ca-phe-sua.jpg',
                'danh_muc_cha_id' => 2, // Thuộc danh mục "Trà"
                'trang_thai' => 1,
                'thu_tu' => 5,
                'mo_ta' => 'Trà trái cây tươi mát',
            ],
        ];
        DB::table('danh_muc_san_phams')->insert($categories);
    }
}
