<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class NhanVien extends Model {
    use HasFactory;

    protected $table = 'nhan_vien';
    protected $primaryKey = 'ma_nhan_vien';
    protected $fillable = ['ma_chuc_vu', 'ma_tai_khoan', 'ho_ten_nhan_vien', 'ngay_sinh', 'gioi_tinh', 'so_dien_thoai', 'email', 'dia_chi', 'ca_lam'];

    public function taiKhoan() {
        return $this->belongsTo(TaiKhoan::class, 'ma_tai_khoan');
    }
}
