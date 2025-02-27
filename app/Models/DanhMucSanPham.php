<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class DanhMucSanPham extends Model
{
    protected $table = 'danh_muc_san_phams';
    public function children()
    {
        return $this->hasMany(DanhMucSanPham::class, 'danh_muc_cha_id', 'ma_danh_muc');
    }

}
