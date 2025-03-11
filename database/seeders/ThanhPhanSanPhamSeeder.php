<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ThanhPhanSanPhamSeeder extends Seeder
{
    public function run()
    {
        DB::table('thanh_phan_san_phams')->truncate(); // Xóa dữ liệu cũ

        $data = [
            //1
            [
                'ma_san_pham' => 1, // ID của Cà phê sữa đá
                'ma_nguyen_lieu' => 1, // Cà phê rang ARABICA
                'dinh_luong' => 25,
                'don_vi' => 'g'
            ],
            [
                'ma_san_pham' => 1, 
                'ma_nguyen_lieu' => 2, // Sữa Đặc Ngôi Sao Phương Nam
                'dinh_luong' => 40,
                'don_vi' => 'g'
            ],
            //2
            [
                'ma_san_pham' => 2, // ID của sản phẩm "Cà Phê Đen Đá"
                'ma_nguyen_lieu' => 1, // ID của "Cà phê rang ARABICA"
                'dinh_luong' => 25, // 25g cà phê
                'don_vi' => 'g'
            ],
            [
                'ma_san_pham' => 2,
                'ma_nguyen_lieu' => 6, // ID của "Nước đường bắp"
                'dinh_luong' => 20, // 20ml nước đường
                'don_vi' => 'ml'
            ],
            //3
            [
                'ma_san_pham' => 3, // ID của "Sữa Tươi Cà Phê"
                'ma_nguyen_lieu' => 1, // ID của "Cà phê rang ARABICA"
                'dinh_luong' => 25, // 25g cà phê
                'don_vi' => 'g'
            ],
            [
                'ma_san_pham' => 3,
                'ma_nguyen_lieu' => 3, // ID của "Sữa tươi tiệt trùng không đường"
                'dinh_luong' => 100, // 100ml sữa tươi
                'don_vi' => 'ml'
            ],
            [
                'ma_san_pham' => 3,
                'ma_nguyen_lieu' => 6, // ID của "Nước đường bắp"
                'dinh_luong' => 20, // 20ml nước đường
                'don_vi' => 'ml'
            ],
            //4
            [
                'ma_san_pham' => 4, // ID của "Cà Phê Sữa Nóng"
                'ma_nguyen_lieu' => 1, // ID của "Cà phê rang ARABICA"
                'dinh_luong' => 25, // 25g cà phê
                'don_vi' => 'g'
            ],
            [
                'ma_san_pham' => 4,
                'ma_nguyen_lieu' => 2, // ID của "Sữa đặc Ngôi Sao Phương Nam"
                'dinh_luong' => 40, // 40ml sữa đặc
                'don_vi' => 'ml'
            ],
            [
                'ma_san_pham' => 4,
                'ma_nguyen_lieu' => 6, // ID của "Nước đường bắp"
                'dinh_luong' => 10, // 10ml nước đường
                'don_vi' => 'ml'
            ],
            //5
            [
                'ma_san_pham' => 5, // ID của "Cà Phê Đen Nóng"
                'ma_nguyen_lieu' => 1, // ID của "Cà phê rang ARABICA"
                'dinh_luong' => 25, // 25g cà phê
                'don_vi' => 'g'
            ],
            [
                'ma_san_pham' => 5,
                'ma_nguyen_lieu' => 6, // ID của "Nước đường bắp"
                'dinh_luong' => 10, // 10ml nước đường
                'don_vi' => 'ml'
            ],
            //6
            [
                'ma_san_pham' => 6, // ID của "Americano"
                'ma_nguyen_lieu' => 1, // ID của "Cà phê rang ARABICA"
                'dinh_luong' => 25, // 25g cà phê
                'don_vi' => 'g'
            ],
            //7
            [
                'ma_san_pham' => 7, // ID của "Latte Đá"
                'ma_nguyen_lieu' => 1, // Cà phê rang ARABICA
                'dinh_luong' => 30, // 30g cà phê
                'don_vi' => 'g'
            ],
            [
                'ma_san_pham' => 7,
                'ma_nguyen_lieu' => 3, // Sữa tươi tiệt trùng không đường
                'dinh_luong' => 150, // 150ml sữa
                'don_vi' => 'ml'
            ],
            [
                'ma_san_pham' => 7,
                'ma_nguyen_lieu' => 7, // Bột béo
                'dinh_luong' => 20, // 150ml sữa
                'don_vi' => 'ml'
            ],
            //8
            [
                'ma_san_pham' => 8, // ID của "Capuchino Đá"
                'ma_nguyen_lieu' => 1, // Cà phê rang ARABICA
                'dinh_luong' => 30, // 30g cà phê
                'don_vi' => 'g'
            ],
            [
                'ma_san_pham' => 8,
                'ma_nguyen_lieu' => 3, // Sữa tươi tiệt trùng không đường
                'dinh_luong' => 120, // 120ml sữa
                'don_vi' => 'ml'
            ],
            [
                'ma_san_pham' => 8,
                'ma_nguyen_lieu' => 7, // Bột béo B One
                'dinh_luong' => 10, // 10g bột béo
                'don_vi' => 'g'
            ],
            [
                'ma_san_pham' => 8,
                'ma_nguyen_lieu' => 8, // Kem tươi Topping Base Richs
                'dinh_luong' => 20, // 20g kem tươi
                'don_vi' => 'g'
            ],
            //9
            [
                'ma_san_pham' => 9, // ID của "Espresso"
                'ma_nguyen_lieu' => 1, // Cà phê rang ARABICA
                'dinh_luong' => 30, // 30g cà phê
                'don_vi' => 'g'
            ],
            //10
            [
                'ma_san_pham' => 10, // ID của "Trà Đào Cam Sả"
                'ma_nguyen_lieu' => 9, // Trà đen Phúc Long
                'dinh_luong' => 10, // 10g trà
                'don_vi' => 'g'
            ],
            [
                'ma_san_pham' => 10,
                'ma_nguyen_lieu' => 6, // Nước đường bắp
                'dinh_luong' => 30, // 30ml
                'don_vi' => 'ml'
            ],
            [
                'ma_san_pham' => 10,
                'ma_nguyen_lieu' => 12, // Siro đào Maulin
                'dinh_luong' => 15, // 15ml
                'don_vi' => 'ml'
            ],
            [
                'ma_san_pham' => 10,
                'ma_nguyen_lieu' => 10, // Đào ngâm Rhodes
                'dinh_luong' => 30, // 30g (1 miếng)
                'don_vi' => 'g'
            ],
            //11
            [
                'ma_san_pham' => 11, // ID của "Trà Vải"
                'ma_nguyen_lieu' => 9, // Trà đen Phúc Long
                'dinh_luong' => 10, // 10g trà
                'don_vi' => 'g'
            ],
            [
                'ma_san_pham' => 11,
                'ma_nguyen_lieu' => 6, // Nước đường bắp
                'dinh_luong' => 30, // 30ml
                'don_vi' => 'ml'
            ],
            [
                'ma_san_pham' => 11,
                'ma_nguyen_lieu' => 11, // Vải ngâm Thái
                'dinh_luong' => 50, // 50g (khoảng 3 quả)
                'don_vi' => 'g'
            ],
            //12
            [
                'ma_san_pham' => 12, // ID của "Trà Xoài"
                'ma_nguyen_lieu' => 9, // Trà đen Phúc Long
                'dinh_luong' => 10, // 10g trà
                'don_vi' => 'g'
            ],
            [
                'ma_san_pham' => 12,
                'ma_nguyen_lieu' => 6, // Nước đường bắp
                'dinh_luong' => 30, // 30ml
                'don_vi' => 'ml'
            ],
            [
                'ma_san_pham' => 12,
                'ma_nguyen_lieu' => 13, // Siro xoài Maulin
                'dinh_luong' => 15, // 15ml
                'don_vi' => 'ml'
            ],
            //13
            [
                'ma_san_pham' => 13, // ID của "Trà Táo"
                'ma_nguyen_lieu' => 9, // Trà đen Phúc Long
                'dinh_luong' => 10, // 10g trà
                'don_vi' => 'g'
            ],
            [
                'ma_san_pham' => 13,
                'ma_nguyen_lieu' => 6, // Nước đường bắp
                'dinh_luong' => 30, // 30ml
                'don_vi' => 'ml'
            ],
            [
                'ma_san_pham' => 13,
                'ma_nguyen_lieu' => 12, // Siro táo Maulin
                'dinh_luong' => 15, // 15ml
                'don_vi' => 'ml'
            ]
            //14
        ];

        DB::table('thanh_phan_san_phams')->insert($data);
    }
}
