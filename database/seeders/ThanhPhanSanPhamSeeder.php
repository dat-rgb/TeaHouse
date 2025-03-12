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
            //1 Size: Nhỏ:1, Vừa:2, Lớn:3
            [
                'ma_san_pham' => 1, // ID của Cà phê sữa đá
                'ma_nguyen_lieu' => 1, // Cà phê rang ARABICA
                'ma_size' => 1,
                'dinh_luong' => 25,
                'don_vi' => 'g'
            ],
            [
                'ma_san_pham' => 1, 
                'ma_nguyen_lieu' => 2, // Sữa Đặc Ngôi Sao Phương Nam
                'ma_size' => 1,
                'dinh_luong' => 40,
                'don_vi' => 'g'
            ],
            [
                'ma_san_pham' => 1, 
                'ma_nguyen_lieu' => 14, // ly nhỏ
                'ma_size' => 1,
                'dinh_luong' => 1,
                'don_vi' => 'g'
            ],
            //1 Vừa2
            [
                'ma_san_pham' => 1, // ID của Cà phê sữa đá
                'ma_nguyen_lieu' => 1, // Cà phê rang ARABICA
                'ma_size' => 2,
                'dinh_luong' => 35,
                'don_vi' => 'g'
            ],
            [
                'ma_san_pham' => 1, 
                'ma_nguyen_lieu' => 2, // Sữa Đặc Ngôi Sao Phương Nam
                'ma_size' => 2,
                'dinh_luong' => 50,
                'don_vi' => 'g'
            ],
            [
                'ma_san_pham' => 1, 
                'ma_nguyen_lieu' => 15, // ly vừa
                'ma_size' => 2,
                'dinh_luong' => 1,
                'don_vi' => 'g'
            ],
            //1 Lớn
            [
                'ma_san_pham' => 1, // ID của Cà phê sữa đá
                'ma_nguyen_lieu' => 1, // Cà phê rang ARABICA
                'ma_size' => 3,
                'dinh_luong' => 45,
                'don_vi' => 'g'
            ],
            [
                'ma_san_pham' => 1, 
                'ma_nguyen_lieu' => 2, // Sữa Đặc Ngôi Sao Phương Nam
                'ma_size' => 3,
                'dinh_luong' => 60,
                'don_vi' => 'g'
            ],
            [
                'ma_san_pham' => 1, 
                'ma_nguyen_lieu' => 16, // ly lớn
                'ma_size' => 3,
                'dinh_luong' => 1,
                'don_vi' => 'g'
            ],
            //2 Nhỏ:1, Vừa:2, Lớn:3
            [
                'ma_san_pham' => 2, // ID của sản phẩm "Cà Phê Đen Đá"
                'ma_nguyen_lieu' => 1, // ID của "Cà phê rang ARABICA"
                'ma_size' => 1,
                'dinh_luong' => 25, // 25g cà phê
                'don_vi' => 'g'
            ],
            [
                'ma_san_pham' => 2,
                'ma_nguyen_lieu' => 6, // ID của "Nước đường bắp"
                'ma_size' => 1,
                'dinh_luong' => 20, // 20ml nước đường
                'don_vi' => 'ml'
            ],
            [
                'ma_san_pham' => 2, 
                'ma_nguyen_lieu' => 14, // ly nhỏ
                'ma_size' => 1,
                'dinh_luong' => 1,
                'don_vi' => 'g'
            ],
            //2 vừa
            [
                'ma_san_pham' => 2, // ID của sản phẩm "Cà Phê Đen Đá"
                'ma_nguyen_lieu' => 1, // ID của "Cà phê rang ARABICA"
                'ma_size' => 2,
                'dinh_luong' => 35, // 25g cà phê
                'don_vi' => 'g'
            ],
            [
                'ma_san_pham' => 2,
                'ma_nguyen_lieu' => 6, // ID của "Nước đường bắp"
                'ma_size' => 2,
                'dinh_luong' => 30, // 20ml nước đường
                'don_vi' => 'ml'
            ],
            [
                'ma_san_pham' => 2, 
                'ma_nguyen_lieu' => 15, // ly vừa
                'ma_size' => 1,
                'dinh_luong' => 1,
                'don_vi' => 'g'
            ],
            //2 lớn
            [
                'ma_san_pham' => 2, // ID của sản phẩm "Cà Phê Đen Đá"
                'ma_nguyen_lieu' => 1, // ID của "Cà phê rang ARABICA"
                'ma_size' => 3,
                'dinh_luong' => 45, // 25g cà phê
                'don_vi' => 'g'
            ],
            [
                'ma_san_pham' => 2,
                'ma_nguyen_lieu' => 6, // ID của "Nước đường bắp"
                'ma_size' => 3,
                'dinh_luong' => 40, // 20ml nước đường
                'don_vi' => 'ml'
            ],
            [
                'ma_san_pham' => 2, 
                'ma_nguyen_lieu' => 16, // ly lớn
                'ma_size' => 1,
                'dinh_luong' => 1,
                'don_vi' => 'g'
            ],
            //3 Nhỏ Vừa Lớn
            [
                'ma_san_pham' => 3, // ID của "Sữa Tươi Cà Phê"
                'ma_nguyen_lieu' => 1, // ID của "Cà phê rang ARABICA"
                'ma_size' => 1,
                'dinh_luong' => 25, // 25g cà phê
                'don_vi' => 'g'
            ],
            [
                'ma_san_pham' => 3,
                'ma_nguyen_lieu' => 3, // ID của "Sữa tươi tiệt trùng không đường"
                'ma_size' => 1,
                'dinh_luong' => 100, // 100ml sữa tươi
                'don_vi' => 'ml'
            ],
            [
                'ma_san_pham' => 3,
                'ma_nguyen_lieu' => 6, // ID của "Nước đường bắp"
                'ma_size' => 1,
                'dinh_luong' => 20, // 20ml nước đường
                'don_vi' => 'ml'
            ],
            [
                'ma_san_pham' => 3, 
                'ma_nguyen_lieu' => 14, // ly nhỏ
                'ma_size' => 1,
                'dinh_luong' => 1,
                'don_vi' => 'g'
            ],
            //3 vừa
            [
                'ma_san_pham' => 3, // ID của "Sữa Tươi Cà Phê"
                'ma_nguyen_lieu' => 1, // ID của "Cà phê rang ARABICA"
                'ma_size' => 2,
                'dinh_luong' => 35, // 25g cà phê
                'don_vi' => 'g'
            ],
            [
                'ma_san_pham' => 3,
                'ma_nguyen_lieu' => 3, // ID của "Sữa tươi tiệt trùng không đường"
                'ma_size' => 2,
                'dinh_luong' => 200, // 100ml sữa tươi
                'don_vi' => 'ml'
            ],
            [
                'ma_san_pham' => 3,
                'ma_nguyen_lieu' => 6, // ID của "Nước đường bắp"
                'ma_size' => 2,
                'dinh_luong' => 30, // 20ml nước đường
                'don_vi' => 'ml'
            ],
            [
                'ma_san_pham' => 3, 
                'ma_nguyen_lieu' => 15, // ly vừa
                'ma_size' => 2,
                'dinh_luong' => 1,
                'don_vi' => 'g'
            ],
            //3 lớn
            [
                'ma_san_pham' => 3, // ID của "Sữa Tươi Cà Phê"
                'ma_nguyen_lieu' => 1, // ID của "Cà phê rang ARABICA"
                'ma_size' => 3,
                'dinh_luong' => 45, // 25g cà phê
                'don_vi' => 'g'
            ],
            [
                'ma_san_pham' => 3,
                'ma_nguyen_lieu' => 3, // ID của "Sữa tươi tiệt trùng không đường"
                'ma_size' => 3,
                'dinh_luong' => 300, // 100ml sữa tươi
                'don_vi' => 'ml'
            ],
            [
                'ma_san_pham' => 3,
                'ma_nguyen_lieu' => 6, // ID của "Nước đường bắp"
                'ma_size' => 3,
                'dinh_luong' => 40, // 20ml nước đường
                'don_vi' => 'ml'
            ],
            [
                'ma_san_pham' => 3, 
                'ma_nguyen_lieu' => 16, // ly lớn
                'ma_size' => 3,
                'dinh_luong' => 1,
                'don_vi' => 'g'
            ],
            //4 Nhỏ
            [
                'ma_san_pham' => 4, // ID của "Cà Phê Sữa Nóng"
                'ma_nguyen_lieu' => 1, // ID của "Cà phê rang ARABICA"
                'ma_size' => 1,
                'dinh_luong' => 25, // 25g cà phê
                'don_vi' => 'g'
            ],
            [
                'ma_san_pham' => 4,
                'ma_nguyen_lieu' => 2, // ID của "Sữa đặc Ngôi Sao Phương Nam"
                'ma_size' => 1,
                'dinh_luong' => 40, // 40ml sữa đặc
                'don_vi' => 'ml'
            ],
            [
                'ma_san_pham' => 4,
                'ma_nguyen_lieu' => 6, // ID của "Nước đường bắp"
                'ma_size' => 1,
                'dinh_luong' => 10, // 10ml nước đường
                'don_vi' => 'ml'
            ],
            [
                'ma_san_pham' => 4,
                'ma_nguyen_lieu' => 17, // ly giấy
                'ma_size' => 1,
                'dinh_luong' => 1, // 1 ly
                'don_vi' => 'ly'
            ],
            [
                'ma_san_pham' => 4,
                'ma_nguyen_lieu' => 18, // nắp nóng
                'ma_size' => 1,
                'dinh_luong' => 1, // 1 cái
                'don_vi' => 'ly'
            ],
            //5 nhỏ
            [
                'ma_san_pham' => 5, // ID của "Cà Phê Đen Nóng"
                'ma_nguyen_lieu' => 1, // ID của "Cà phê rang ARABICA"
                'ma_size' => 1,
                'dinh_luong' => 25, // 25g cà phê
                'don_vi' => 'g'
            ],
            [
                'ma_san_pham' => 5,
                'ma_nguyen_lieu' => 6, // ID của "Nước đường bắp"
                'ma_size' => 1,
                'dinh_luong' => 10, // 10ml nước đường
                'don_vi' => 'ml'
            ],
            [
                'ma_san_pham' => 5,
                'ma_nguyen_lieu' => 17, // ly giấy
                'ma_size' => 1,
                'dinh_luong' => 1, // 1 ly
                'don_vi' => 'ly'
            ],
            [
                'ma_san_pham' => 5,
                'ma_nguyen_lieu' => 18, // nắp nóng
                'ma_size' => 1,
                'dinh_luong' => 1, // 1 cái
                'don_vi' => 'ly'
            ],
            /////
        ];
        DB::table('thanh_phan_san_phams')->insert($data);
    }
}
