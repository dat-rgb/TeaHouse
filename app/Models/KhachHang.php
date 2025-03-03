<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class KhachHang extends Model {
    use HasFactory;

    protected $table = 'khach_hang';
    protected $primaryKey = 'ma_khach_hang';
    protected $fillable = ['ma_tai_khoan', 'ho_ten_khach_hang', 'ngay_sinh', 'gioi_tinh', 'so_dien_thoai', 'email', 'dia_chi', 'diem_thanh_vien', 'hang_thanh_vien'];

    public function taiKhoan() {
        return $this->belongsTo(TaiKhoan::class, 'ma_tai_khoan');
    }
}
