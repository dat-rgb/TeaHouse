<?php

namespace App\Http\Controllers;
use App\Models\SanPham;

use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index(){
        $viewData = [
            "title" => "Trang chủ",
        ];
        return view('Home.index');
    }

    public function contact(){
        return view('Home.lienHe');
    }
    public function thucDon()
    {
        $viewData = [
            "title" => "Thực đơn",
        ];
        $tra = SanPham::where('ma_danh_muc', 7)->get(); // Lấy danh sách trà
        $caPhe = SanPham::where('ma_danh_muc', 5)->get(); // Lấy danh sách cà phê Việt Nam
        $sinhTo = SanPham::where('ma_danh_muc', 3)->get(); // Lấy danh sách sinh tố
        $nuocEp = SanPham::where('ma_danh_muc', 4)->get(); // Lấy danh sách nước ép

        return view('Home.thucDon', compact('viewData', 'tra', 'caPhe', 'sinhTo', 'nuocEp'));
    }

}
