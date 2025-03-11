<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class NguyenLieuSeeder extends Seeder
{
    public function run()
    {
        // Danh sách nguyên liệu lấy từ sản phẩm
        $nguyen_lieus = [
            //1
            [
                'ten_nguyen_lieu' => 'Cà phê rang ARABICA gói 1000G', 
                'ma_nha_cung_cap' => 1, 
                'dinh_luong' => 1000,
                'gia' => 455000,
                'loai_nguyen_lieu' => 0, 
                'don_vi' => 'Gói 10kg'
            ],
            //2
            [
                'ten_nguyen_lieu' => 'Sữa Đặc Ngôi Sao Phương Nam Nhãn xanh lá 380g', 
                'ma_nha_cung_cap' => 2, 
                'dinh_luong' => 380,
                'gia'=> 458006,
                'loai_nguyen_lieu' => 0, 
                'don_vi' => 'Hộp 380g'
            ],
            //3
            [
                'ten_nguyen_lieu' => 'Sữa tươi tiệt trùng 100% không đường 1L', 
                'ma_nha_cung_cap' => 2, 
                'dinh_luong' => 1000,
                'gia'=> 408240,
                'loai_nguyen_lieu' => 0, 
                'don_vi' => 'Thùng 12 hộp 1L'
            ],
            //4
            [
                'ten_nguyen_lieu' => 'Sữa tươi tiệt trùng có đường 1L', 
                'ma_nha_cung_cap' => 2, 
                'dinh_luong' => 1000,
                'gia'=> 408240,
                'loai_nguyen_lieu' => 0, 
                'don_vi' => 'Thùng 12 hộp 1L'
            ],
            //5
            [
                'ten_nguyen_lieu' => 'Sữa tươi tiệt trùng ít đường 1L', 
                'ma_nha_cung_cap' => 2, 
                'dinh_luong' => 1000,
                'gia'=> 408262,
                'loai_nguyen_lieu' => 0, 
                'don_vi' => 'Thùng 12 hộp 1L'
            ],
            //6
            [
                'ten_nguyen_lieu' => 'NƯỚC ĐƯỜNG BẮP GLOFOOD ĐƯỜNG BẮP 6KG', 
                'ma_nha_cung_cap' => 3, 
                'dinh_luong' => 6000,
                'gia'=> 145000,
                'loai_nguyen_lieu' => 0, 
                'don_vi' => 'Can 6kg'
            ],
            //7
            [
                'ten_nguyen_lieu' => 'BỘT BÉO B ONE 1KG', 
                'ma_nha_cung_cap' => 3, 
                'dinh_luong' => 1000,
                'gia'=> 65000,
                'loai_nguyen_lieu' => 0, 
                'don_vi' => 'Bịch 1kg'
            ],
            //8
            [
                'ten_nguyen_lieu' => 'KEM TƯƠI TOPPING BASE RICHS - HỘP CAO 907G', 
                'ma_nha_cung_cap' => 3, 
                'dinh_luong' => 907,
                'gia'=> 80000,
                'loai_nguyen_lieu' => 0, 
                'don_vi' => 'Hộp 907g'
            ],
            //9
            [
                'ten_nguyen_lieu' => 'TRÀ ĐEN PHÚC LONG 500G', 
                'ma_nha_cung_cap' => 3, 
                'dinh_luong' => 500,
                'gia'=> 105000,
                'loai_nguyen_lieu' => 0, 
                'don_vi' => 'Bịch 500g'
            ],
            //10
            [
                'ten_nguyen_lieu' => 'ĐÀO NGÂM RHODES', 
                'ma_nha_cung_cap' => 3, 
                'dinh_luong' => 480,
                'gia'=> 65000,
                'loai_nguyen_lieu' => 0, 
                'don_vi' => 'Hộp 480g'
            ],
            //11
            [
                'ten_nguyen_lieu' => 'VẢI NGÂM THÁI', 
                'ma_nha_cung_cap' => 3, 
                'dinh_luong' => 230,
                'gia'=> 51000,
                'loai_nguyen_lieu' => 0, 
                'don_vi' => 'Hộp 230g'
            ],
            //12
            [
                'ten_nguyen_lieu' => 'SIRO MAULIN TÁO (APPLE)', 
                'ma_nha_cung_cap' => 3, 
                'dinh_luong' => 2250,
                'gia'=> 200000,
                'loai_nguyen_lieu' => 0, 
                'don_vi' => 'Chai 2,25kg'
            ],
            //13
            [
                'ten_nguyen_lieu' => 'SIRO MAULIN XOÀI', 
                'ma_nha_cung_cap' => 3, 
                'dinh_luong' => 1300,
                'gia'=> 205000,
                'loai_nguyen_lieu' => 0, 
                'don_vi' => 'Chai 1,3kg'
            ],
            //14
            //15
            //16
            //17
            //18
            //19
            //20
            //21
            //22
        ];

        // Chèn vào bảng nguyen_lieus
        DB::table('nguyen_lieus')->insert($nguyen_lieus);
    }
}
