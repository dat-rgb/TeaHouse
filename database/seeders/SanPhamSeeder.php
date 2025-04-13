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
            // 5 Sản phẩm thuộc danh mục Cà Phê Việt Nam
            //1
            [
                'ten_san_pham' => 'Cà phê sữa Đá',
                'gia' => 30000, // S, L, XL
                'slug' => Str::slug('Cà phê sữa Đá'),
                'thu_tu' => 1,
                'mo_ta' => 'Cà phê sữa đậm đà, béo ngậy.',
                'hinh_anh' => 'cafe_sua_da.jpg',
                'ma_danh_muc' => 5,
                'trang_thai' => 1,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            //2
            [
                'ten_san_pham' => 'Cà Phê Đen Đá',
                'gia' => 25000, // S, L, XL
                'slug' => Str::slug('Cà Phê Đen Đá'),
                'thu_tu' => 2,
                'mo_ta' => 'Cà phê đen đá đậm đà chất Việt.',
                'hinh_anh' => 'cafe_den_da.jpg',
                'ma_danh_muc' => 5, 
                'trang_thai' => 1,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            //3
            [
                'ten_san_pham' => 'Sữa Tươi Cà Phê',
                'gia' => 35000, // S, L, XL
                'slug' => Str::slug('Sữa Tươi Cà Phê'),
                'thu_tu' => 3,
                'mo_ta' => 'Sữa tươi cà phê đậm đà, béo ngậy.',
                'hinh_anh' => 'sua_tuoi_cafe.jpg',
                'ma_danh_muc' => 5,
                'trang_thai' => 1,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            //4
            [
                'ten_san_pham' => 'Cà Phê Sữa Nóng',
                'gia' => 30000, // S, L
                'slug' => Str::slug('Cà Phê Sữa Nóng'),
                'thu_tu' => 4,
                'mo_ta' => 'Cà phê sữa nóng đậm đà, béo ngậy.',
                'hinh_anh' => 'cafe_sua_nong.jpg',
                'ma_danh_muc' => 5, 
                'trang_thai' => 1,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            //5
            [
                'ten_san_pham' => 'Cà Phê Đen Nóng',
                'gia' => 25000, // S, L
                'slug' => Str::slug('Cà Phê Đen Nóng'),
                'thu_tu' => 5,
                'mo_ta' => 'Cà phê đen nóng đậm đà chất Việt.',
                'hinh_anh' => 'cafe_den_nong.jpg',
                'ma_danh_muc' => 5, 
                'trang_thai' => 1,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            // 5 Sản phẩm thuộc danh mục Cà Phê Pha Máy
            //6
            [
                'ten_san_pham' => 'Americano',
                'gia' => 30000, // S, L, XL
                'slug' => Str::slug('Americano'),
                'thu_tu' => 6,
                'mo_ta' => 'Americano',
                'hinh_anh' => 'americano_ly.jpg',
                'ma_danh_muc' => 6, 
                'trang_thai' => 2,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            //7
            [
                'ten_san_pham' => 'Latte Đá',
                'gia' => 30000, // S, L, XL
                'slug' => Str::slug('Latte Đá'),
                'thu_tu' => 7,
                'mo_ta' => 'Latte Đá',
                'hinh_anh' => 'latte_da.jpg',
                'ma_danh_muc' => 6, 
                'trang_thai' => 2,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            //8
            [
                'ten_san_pham' => 'Capuchino Đá',
                'gia' => 35000,
                'slug' => Str::slug('Capuchino Đá'),
                'thu_tu' => 7,
                'mo_ta' => 'Capuchino Đá',
                'hinh_anh' => 'capuchino_da.jpg',
                'ma_danh_muc' => 6, 
                'trang_thai' => 2,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            //8
            [
                'ten_san_pham' => 'Capuchino Nóng',
                'gia' => 35000,
                'slug' => Str::slug('Capuchino Nóng'),
                'thu_tu' => 8,
                'mo_ta' => 'Capuchino Nóng',
                'hinh_anh' => 'capuchino_nong.jpg',
                'ma_danh_muc' => 6, 
                'trang_thai' => 2,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            //9
            [
                'ten_san_pham' => 'Espresso',
                'gia' => 35000,
                'slug' => Str::slug('Espresso'),
                'thu_tu' => 9,
                'mo_ta' => 'Espresso',
                'hinh_anh' => 'Espresso.jpg',
                'ma_danh_muc' => 6, 
                'trang_thai' => 2,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            // 5 sản phẩm thuộc danh mục Trà Trái Cây.
            //10
            [
                'ten_san_pham' => 'Trà Đào Cam Xả',
                'gia' => 30000,
                'slug' => Str::slug('Trà Đào Cam Xả'),
                'thu_tu' => 10,
                'mo_ta' => 'Trà Đào Cam Xả',
                'hinh_anh' => 'tra_dao_cam_xa.jpg',
                'ma_danh_muc' => 7, 
                'trang_thai' => 2,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            //11
            [
                'ten_san_pham' => 'Trà Vải',
                'gia' => 30000,
                'slug' => Str::slug('Trà Vải'),
                'thu_tu' => 11,
                'mo_ta' => 'Trà Vải',
                'hinh_anh' => 'TraVai.webp',
                'ma_danh_muc' => 7, 
                'trang_thai' => 2,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            //12
            [
                'ten_san_pham' => 'Trà Xoài',
                'gia' => 30000,
                'slug' => Str::slug('Trà Xoài'),
                'thu_tu' => 12,
                'mo_ta' => 'Trà Xoài',
                'hinh_anh' => 'TraXoai.webp',
                'ma_danh_muc' => 7, 
                'trang_thai' => 2,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            //13
            [
                'ten_san_pham' => 'Trà Táo',
                'gia' => 30000,
                'slug' => Str::slug('Trà Táo'),
                'thu_tu' => 13,
                'mo_ta' => 'Trà Táo',
                'hinh_anh' => 'TraTao.webp',
                'ma_danh_muc' => 7, 
                'trang_thai' => 2,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            // 5 Sản phẩm thuộc danh mục sinh tố
            //14
            [
                'ten_san_pham' => 'Sinh Tố Bơ',
                'gia' => 30000,
                'slug' => Str::slug('Sinh Tố Bơ'),
                'thu_tu' => 14,
                'mo_ta' => 'Sinh Tố Bơ',
                'hinh_anh' => 'sinhto_bo.jpg',
                'ma_danh_muc' => 3, 
                'trang_thai' => 2,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            //15
            [
                'ten_san_pham' => 'Sinh Tố Dâu',
                'gia' => 30000,
                'slug' => Str::slug('Sinh Tố Dâu'),
                'thu_tu' => 15,
                'mo_ta' => 'Sinh Tố Dâu',
                'hinh_anh' => 'sinhto_dau.jpg',
                'ma_danh_muc' => 3, 
                'trang_thai' => 2,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            //16
            [
                'ten_san_pham' => 'Sinh Tố Dưa Lưới',
                'gia' => 30000,
                'slug' => Str::slug('Sinh Tố Dưa Lưới'),
                'thu_tu' => 16,
                'mo_ta' => 'Sinh Tố Dưa Lưới',
                'hinh_anh' => 'sinhto_dualuoi.jpg',
                'ma_danh_muc' => 3, 
                'trang_thai' => 2,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            //17
            [
                'ten_san_pham' => 'Sinh Tố Kiwi',
                'gia' => 30000,
                'slug' => Str::slug('Sinh Tố Kiwi'),
                'thu_tu' => 17,
                'mo_ta' => 'Sinh Tố Kiwi',
                'hinh_anh' => 'sinhto_kiwi.jpg',
                'ma_danh_muc' => 3, 
                'trang_thai' => 2,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            //18
            [
                'ten_san_pham' => 'Sinh Tố Sầu Riêng',
                'gia' => 30000,
                'slug' => Str::slug('Sinh Tố Sầu Riêng'),
                'thu_tu' => 18,
                'mo_ta' => 'Sinh Tố Sầu Riêng',
                'hinh_anh' => 'sinhto_saurieng.jpg',
                'ma_danh_muc' => 3, 
                'trang_thai' => 2,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            // 5 sản phẩm thuộc danh mục Nước Ép
            //19
            [
                'ten_san_pham' => 'Nước Ép Cam',
                'gia' => 30000,
                'slug' => Str::slug('Nước Ép Cam'),
                'thu_tu' => 19,
                'mo_ta' => 'Nước Ép Cam',
                'hinh_anh' => 'nuoc_cam_ep.jpg',
                'ma_danh_muc' => 4, 
                'trang_thai' => 2,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            //20
            [
                'ten_san_pham' => 'Nước Ép Dưa Hấu',
                'gia' => 30000,
                'slug' => Str::slug('Nước Ép Dưa Hấu'),
                'thu_tu' => 20,
                'mo_ta' => 'Nước Ép Dưa Hấu',
                'hinh_anh' => 'nuoc_dua_hau_ep.jpg',
                'ma_danh_muc' => 4, 
                'trang_thai' => 2,
                'created_at' => now(),
                'updated_at' => now(),
            ], 
            //21
            [
                'ten_san_pham' => 'Nước Ép Dưa Lưới',
                'gia' => 30000,
                'slug' => Str::slug('Nước Ép Dưa Lưới'),
                'thu_tu' => 21,
                'mo_ta' => 'Nước Ép Dưa Lưới',
                'hinh_anh' => 'nuoc_dua_luoi_ep.jpg',
                'ma_danh_muc' => 4, 
                'trang_thai' => 2,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            //22
            [
                'ten_san_pham' => 'Nước Ép Lê Táo',
                'gia' => 30000,
                'slug' => Str::slug('Nước Ép Lê Táo'),
                'thu_tu' => 22,
                'mo_ta' => 'Nước Ép Lê Táo',
                'hinh_anh' => 'nuoc_le_tao_ep.jpg',
                'ma_danh_muc' => 4, 
                'trang_thai' => 2,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            //22
            [
                'ten_san_pham' => 'Nước Ép Táo',
                'gia' => 30000,
                'slug' => Str::slug('Nước Ép Táo'),
                'thu_tu' => 23,
                'mo_ta' => 'Nước Ép Táo',
                'hinh_anh' => 'nuoc_tao_ep.jpg',
                'ma_danh_muc' => 4, 
                'trang_thai' => 2,
                'created_at' => now(),
                'updated_at' => now(),
            ],
        ];
        DB::table('san_phams')->insert($sanPhams);
    }
}
