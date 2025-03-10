<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class PhieuNhapXuatNguyenLieuSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('phieu_nhap_xuat_nguyen_lieus')->insert([
            [
                'ma_cua_hang' => 1, //Cửa hàng 1
                'ma_nguyen_lieu' => 1, //Cà phê rang ARABICA gói 1kg
                'ma_nhan_vien' => 1,
                'so_lo' => 'LO-001',
                'ngay_san_xuat' => '2025-01-10',
                'han_su_dung' => '2027-01-10',
                'loai_phieu' => 0, // Nhập
                'dinh_luong' => 20000,
                'so_luong' => 20,
                'don_vi' => 'Gói 100g',
                'gia_tien' => 455000,
                'tong_tien' => 9100000,
                'ngay_giao_dich' => now(),
                'ghi_chu' => 'Nhập cà phê rang ARABICA gói 1kg số lượng 20 gói (20kg)',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            //2
            [
                'ma_cua_hang' => 1, //Cửa hàng 1
                'ma_nguyen_lieu' => 2, //Sữa Đặc Ngôi Sao Phương Nam Nhãn xanh lá 380g
                'ma_nhan_vien' => 1,
                'so_lo' => 'LO-001',
                'ngay_san_xuat' => '2025-02-10',
                'han_su_dung' => '2027-02-10',
                'loai_phieu' => 0, // Nhập
                'dinh_luong' => 20000,
                'so_luong' => 20,
                'don_vi' => 'Gói',
                'gia_tien' => 455000,
                'tong_tien' => 9100000,
                'ngay_giao_dich' => now(),
                'ghi_chu' => 'Nhập cà phê rang ARABICA gói 1kg số lượng 20 gói (20kg)',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            //3
            [
                'ma_cua_hang' => 1, //Cửa hàng 1
                'ma_nguyen_lieu' => 3, // Sữa tươi tiệt trùng 100% không đường 1L
                'ma_nhan_vien' => 1, // mã nhân viên nhập
                'so_lo' => 'LO-001',
                'ngay_san_xuat' => '2025-02-10',
                'han_su_dung' => '2027-07-10',
                'loai_phieu' => 0, // Nhập
                'dinh_luong' => 24000, // định lượng (g/ml)
                'so_luong' => 2, // số lượng
                'don_vi' => 'Thùng (12 hộp 1L)', // đơn vị
                'gia_tien' => 408240, //giá tiền
                'tong_tien' => 816480, //tổng tiền
                'ngay_giao_dich' => now(), //ngày nhập
                'ghi_chu' => 'Nhập hàng sữa tươi tiệt trùng 100% không đường 1L số lượng 2 thùng (24 hộp 1L)', // ghi chú (nếu có)
                'created_at' => now(),
                'updated_at' => now(),
            ],
            //4
            [
                'ma_cua_hang' => 1, //Cửa hàng 1
                'ma_nguyen_lieu' => 4, // Tên nguyên liệu nhập
                'ma_nhan_vien' => 1, // mã nhân viên nhập
                'so_lo' => 'LO-001',
                'ngay_san_xuat' => '2025-01-10',
                'han_su_dung' => '2026-01-10',
                'loai_phieu' => 0, // Nhập
                'dinh_luong' => 24000, // định lượng (g/ml)
                'so_luong' => 2, // số lượng
                'don_vi' => 'Thùng (12 hộp 1L)', // đơn vị
                'gia_tien' => 408240, //giá tiền
                'tong_tien' => 816480, //tổng tiền
                'ngay_giao_dich' => now(), //ngày nhập
                'ghi_chu' => 'Nhập hàng sữa tươi tiệt trùng có đường 1L số lượng 2 thùng (24 hộp 1L)', // ghi chú (nếu có)
                'created_at' => now(),
                'updated_at' => now(),
            ],
            //5
            [
                'ma_cua_hang' => 1, //Cửa hàng 1
                'ma_nguyen_lieu' => 5, // Tên nguyên liệu nhập
                'ma_nhan_vien' => 1, // mã nhân viên nhập
                'so_lo' => 'LO-001',
                'ngay_san_xuat' => '2025-01-10',
                'han_su_dung' => '2027-01-10',
                'loai_phieu' => 0, // Nhập
                'dinh_luong' => 24000, // định lượng (g/ml)
                'so_luong' => 2, // số lượng
                'don_vi' => 'Thùng (12 hộp 1L)', // đơn vị
                'gia_tien' => 408262, //giá tiền
                'tong_tien' => 816524, //tổng tiền
                'ngay_giao_dich' => now(), //ngày nhập
                'ghi_chu' => 'Nhập hàng sữa tươi tiệt trùng ít đường 1L số lượng 2 thùng (24 hộp 1L)', // ghi chú (nếu có)
                'created_at' => now(),
                'updated_at' => now(),
            ],
            //6
            [
                'ma_cua_hang' => 1, //Cửa hàng 1
                'ma_nguyen_lieu' => 6, // NƯỚC ĐƯỜNG BẮP GLOFOOD ĐƯỜNG BẮP 6KG 
                'ma_nhan_vien' => 1, // mã nhân viên nhập
                'so_lo' => 'LO-001',
                'ngay_san_xuat' => '2025-01-27',
                'han_su_dung' => '2027-01-27',
                'loai_phieu' => 0, // Nhập
                'dinh_luong' => 6000, // định lượng (g/ml)
                'so_luong' => 3, // số lượng
                'don_vi' => 'Can 6kg', // đơn vị
                'gia_tien' => 145000, //giá tiền
                'tong_tien' => 435000, //tổng tiền
                'ngay_giao_dich' => now(), //ngày nhập
                'ghi_chu' => 'Nhập nước đường GLOFOOD bắp 6KG số lượng 3 (Can 6kg)', // ghi chú (nếu có)
                'created_at' => now(),
                'updated_at' => now(),
            ],
            //7
            [
                'ma_cua_hang' => 1, //Cửa hàng 1
                'ma_nguyen_lieu' => 7, // BỘT BÉO B ONE 1KG
                'ma_nhan_vien' => 1, // mã nhân viên nhập
                'so_lo' => 'LO-001',
                'ngay_san_xuat' => '2025-01-10',
                'han_su_dung' => '2025-01-10',
                'loai_phieu' => 0, // Nhập
                'dinh_luong' => 11000, // định lượng (g/ml)
                'so_luong' => 11, // số lượng
                'don_vi' => 'Bịch 1kg', // đơn vị
                'gia_tien' => 65000, //giá tiền
                'tong_tien' => 715000, //tổng tiền
                'ngay_giao_dich' => now(), //ngày nhập
                'ghi_chu' => 'Nhập bột béo B ONE 1KG số lượng 11 (Bịch 1kg)', // ghi chú (nếu có)
                'created_at' => now(),
                'updated_at' => now(),
            ],
            //8
            [
                'ma_cua_hang' => 1, //Cửa hàng 1
                'ma_nguyen_lieu' => 8, // KEM TƯƠI TOPPING BASE RICH'S - HỘP CAO 907G
                'ma_nhan_vien' => 1, // mã nhân viên nhập
                'so_lo' => 'LO-001',
                'ngay_san_xuat' => '2025-01-10',
                'han_su_dung' => '2025-09-10',
                'loai_phieu' => 0, // Nhập
                'dinh_luong' => 18140, // định lượng (g/ml)
                'so_luong' => 20, // số lượng
                'don_vi' => 'Hộp 907g', // đơn vị
                'gia_tien' => 80000, //giá tiền
                'tong_tien' => 1600000, //tổng tiền
                'ngay_giao_dich' => now(), //ngày nhập
                'ghi_chu' => 'Nhập kem tươi Base Richs hộp 907g số lượng 20 (hộp 907g)', // ghi chú (nếu có)
                'created_at' => now(),
                'updated_at' => now(),
            ],
            //9
            [
                'ma_cua_hang' => 1, //Cửa hàng 1
                'ma_nguyen_lieu' => 9, // TRÀ ĐEN PHÚC LONG 500G
                'ma_nhan_vien' => 1, // mã nhân viên nhập
                'so_lo' => 'LO-001',
                'ngay_san_xuat' => '2025-05-23',
                'han_su_dung' => '2026-05-23',
                'loai_phieu' => 0, // Nhập
                'dinh_luong' => 35000, // định lượng (g/ml)
                'so_luong' => 7, // số lượng
                'don_vi' => 'Bịch 500g', // đơn vị
                'gia_tien' => 105000, //giá tiền
                'tong_tien' => 735000, //tổng tiền
                'ngay_giao_dich' => now(), //ngày nhập
                'ghi_chu' => 'Nhập trà đen Phúc Long 500g số luọng 7 (bịch 500g)', // ghi chú (nếu có)
                'created_at' => now(),
                'updated_at' => now(),
            ],
            //10
            [
                'ma_cua_hang' => 1, //Cửa hàng 1
                'ma_nguyen_lieu' => 10, // ĐÀO NGÂM RHODES
                'ma_nhan_vien' => 1, // mã nhân viên nhập
                'loai_phieu' => 0, // Nhập
                'so_lo' => 'LO-001',
                'ngay_san_xuat' => '2025-01-10',
                'han_su_dung' => '2025-06-10',
                'dinh_luong' => 15360, // định lượng (g/ml)
                'so_luong' => 32, // số lượng
                'don_vi' => 'Hộp 480g', // đơn vị
                'gia_tien' => 65000, //giá tiền
                'tong_tien' => 2080000, //tổng tiền
                'ngay_giao_dich' => now(), //ngày nhập
                'ghi_chu' => 'Nhập đào ngâm RHODES số lượng 32 (Hộp 480g)', // ghi chú (nếu có)
                'created_at' => now(),
                'updated_at' => now(),
            ],
            //11
            [
                'ma_cua_hang' => 1, //Cửa hàng 1
                'ma_nguyen_lieu' => 11, // VẢI NGÂM THÁI	51.000 ₫	Hộp 230g
                'ma_nhan_vien' => 1, // mã nhân viên nhập
                'so_lo' => 'LO-001',
                'ngay_san_xuat' => '2025-02-10',
                'han_su_dung' => '2025-07-10',
                'loai_phieu' => 0, // Nhập
                'dinh_luong' => 17480, // định lượng (g/ml)
                'so_luong' => 76, // số lượng
                'don_vi' => 'Hộp 230g', // đơn vị
                'gia_tien' => 51000, //giá tiền
                'tong_tien' => 3876000, //tổng tiền
                'ngay_giao_dich' => now(), //ngày nhập
                'ghi_chu' => 'Nhập vải ngâm Thái số lượng 76 (hộp 230g)', // ghi chú (nếu có)
                'created_at' => now(),
                'updated_at' => now(),
            ],
            //12
            [
                'ma_cua_hang' => 1, //Cửa hàng 1
                'ma_nguyen_lieu' => 12, // SIRO MAULIN TÁO (APPLE)	200.000 ₫	Chai 2,25Kg
                'ma_nhan_vien' => 1, // mã nhân viên nhập
                'so_lo' => 'LO-001',
                'ngay_san_xuat' => '2025-01-10',
                'han_su_dung' => '2026-06-10',
                'loai_phieu' => 0, // Nhập
                'dinh_luong' => 15750, // định lượng (g/ml)
                'so_luong' => 7, // số lượng
                'don_vi' => 'Chai 2,25Kg', // đơn vị
                'gia_tien' => 200000, //giá tiền
                'tong_tien' => 1400000, //tổng tiền
                'ngay_giao_dich' => now(), //ngày nhập
                'ghi_chu' => 'Nhập Siro Maulin Táo (apple) số lượng 7 (chai 2,25kg)', // ghi chú (nếu có)
                'created_at' => now(),
                'updated_at' => now(),
            ],
            //13
            [
                'ma_cua_hang' => 1, //Cửa hàng 1
                'ma_nguyen_lieu' => 13, // SIRO MAULIN XOÀI	205.000 ₫	Chai 1,3kg
                'ma_nhan_vien' => 1, // mã nhân viên nhập
                'so_lo' => 'LO-001',
                'ngay_san_xuat' => '2025-01-10',
                'han_su_dung' => '2026-06-10',
                'loai_phieu' => 0, // Nhập
                'dinh_luong' => 143000, // định lượng (g/ml)
                'so_luong' => 11, // số lượng
                'don_vi' => 'Chai 1,3kg', // đơn vị
                'gia_tien' => 205000, //giá tiền
                'tong_tien' => 2255000, //tổng tiền
                'ngay_giao_dich' => now(), //ngày nhập
                'ghi_chu' => 'Nhập Siro Maulin Xoài số lượng 11 (chai 1,3kg)', // ghi chú (nếu có)
                'created_at' => now(),
                'updated_at' => now(),
            ],
        ]);
    }
}
