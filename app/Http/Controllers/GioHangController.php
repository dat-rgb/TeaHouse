<?php

namespace App\Http\Controllers;

use App\Models\SanPham;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class GioHangController extends Controller
{
    public function gioHang(){
        $viewData = [
            "title" => "Giỏ hàng",    
        ];
        return view('Home.gioHang');
    }

    //Thêm sản phẩm vào giỏ hàng
    public function addToCart(Request $request)
    {
        $maTaiKhoan = Session::get('ma_tai_khoan', 1);
        $maSanPham = $request->input('ma_san_pham');
        $soLuong = $request->input('so_luong', 1);
        $size = $request->input('size');
        $toppings = $request->input('toppings', []);

        if (!$size) {
            return response()->json([
                'message' => 'Vui lòng chọn size!',
                'type' => 'error'
            ]);
        }

        $sanPham = SanPham::find($maSanPham);
        if (!$sanPham) {
            return response()->json([
                'message' => 'Sản phẩm không tồn tại!',
                'type' => 'error'
            ]);
        }

        $gioHang = Session::get("cart_$maTaiKhoan", []);
        
        if (isset($gioHang[$maSanPham])) {
            $gioHang[$maSanPham]['so_luong'] += $soLuong;
        } else {
            $gioHang[$maSanPham] = [
                'ten_san_pham' => $sanPham->ten_san_pham,
                'gia' => $sanPham->gia + $size,
                'size' => $size,
                'toppings' => $toppings,
                'so_luong' => $soLuong,
                'hinh_anh' => $sanPham->hinh_anh
            ];
        }

        Session::put("cart_$maTaiKhoan", $gioHang);

        return response()->json([
            'message' => 'Đã thêm vào giỏ hàng!',
            'type' => 'success'
        ]);
    }


    //Xóa sản phẩm khỏi giỏ hàng
    public function removeFromCart($maSanPham) {
        $maTaiKhoan = Session::get('ma_tai_khoan', 1);
        $gioHang = Session::get("cart_$maTaiKhoan", []);

        if (isset($gioHang[$maSanPham])) {
            unset($gioHang[$maSanPham]);
            Session::put("cart_$maTaiKhoan", $gioHang);
        }

        return response()->json(['message' => 'Xóa sản phẩm thành công!', 'cart' => $gioHang]);
    }
    //Xóa giỏ hàng
    public function clearCart() {
        $maTaiKhoan = Session::get('ma_tai_khoan', 1);
        Session::forget("cart_$maTaiKhoan");
        return response()->json(['message' => 'Đã xóa toàn bộ giỏ hàng']);
    }

}
