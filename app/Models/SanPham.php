<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SanPham extends Model
{
    use HasFactory;
    
    protected $table = 'san_phams';
    protected $primaryKey = 'ma_san_pham';
    public $timestamps = true;

    protected $fillable = [
        'ten_san_pham',
        'gia',
        'slug',
        'thu_tu',
        'mo_ta',
        'hinh_anh',
        'ma_danh_muc',
        'trang_thai'
    ];
    public function sizes()
    {
        return $this->belongsToMany(Sizes::class, 'san_pham_sizes', 'ma_san_pham', 'ma_size');
    }
}
