<?php
namespace App\Http\ViewComposers;

use Illuminate\View\View;
use App\Models\DanhMucSanPham;

class DanhMucComposer
{
    public function compose(View $view)
    {
        $danhMucSanPhams = DanhMucSanPham::where('trang_thai', 1)
            ->whereNull('danh_muc_cha_id') // Chỉ lấy danh mục cha
            ->with(['children' => function ($query) {
                $query->where('trang_thai', 1); // Chỉ lấy danh mục con có trạng thái kích hoạt
            }])
            ->get();

        $view->with('danhMucSanPhams', $danhMucSanPhams);
    }
}
