<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Foundation\Auth\User as Authenticatable;

class TaiKhoan extends Authenticatable {
    use HasFactory;

    protected $table = 'tai_khoan';
    protected $primaryKey = 'ma_tai_khoan';
    protected $fillable = ['so_dien_thoai', 'email', 'mat_khau', 'provider', 'provider_id', 'qr_token', 'loai_tai_khoan', 'trang_thai'];

    protected $hidden = ['mat_khau'];

    public function getAuthPassword() {
        return $this->mat_khau;
    }

    public function khachHang() {
        return $this->hasOne(KhachHang::class, 'ma_tai_khoan');
    }

    public function nhanVien() {
        return $this->hasOne(NhanVien::class, 'ma_tai_khoan');
    }

    public function getTenTaiKhoanAttribute()
    {
        if ($this->loai_tai_khoan == 2 && $this->nhanVien) {
            return $this->nhanVien->ho_ten_nhan_vien;
        } elseif ($this->loai_tai_khoan == 3 && $this->khachHang) {
            return $this->khachHang->ho_ten_khach_hang;
        }
        return 'Người dùng';
    }
}
