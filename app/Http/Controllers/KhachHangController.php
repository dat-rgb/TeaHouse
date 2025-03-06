<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\KhachHang;
use Illuminate\Support\Facades\Auth;

class KhachHangController extends Controller
{
    /**
     * Hiển thị trang thông tin khách hàng.
     */
    public function index()
    {
        $khachHang = KhachHang::with('taiKhoan')->where('ma_tai_khoan', Auth::id())->first();

        if (!$khachHang) {
            return redirect()->route('home')->with('error', 'Không tìm thấy thông tin khách hàng.');
        }

        return view('khachhang.index', compact('khachHang'));
    }

    /**
     * Cập nhật thông tin khách hàng.
     */
    public function update(Request $request)
    {
        // Kiểm tra xem khách hàng có tồn tại không
        $khachHang = KhachHang::where('ma_tai_khoan', Auth::id())->first();

        if (!$khachHang) {
            return redirect()->back()->with('error', 'Không tìm thấy khách hàng.');
        }
       
        $khachHang->update([
            'ho_ten_khach_hang' => $request->ho_ten_khach_hang,
            'ngay_sinh' => $request->ngay_sinh,
            'gioi_tinh' => $request->gioi_tinh,
            'dia_chi' => $request->dia_chi,
        ]);
        return redirect()->route('khachhang.index')->with([
            'message' => 'Cập nhật thông tin thành công!',
            'type' => 'success' // hoặc 'error' nếu cần thông báo lỗi
        ]);
    }
}
