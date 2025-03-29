<?php

namespace App\Http\Controllers;

use App\Models\SanPham;
use App\Models\Sizes;
use App\Models\Topping;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\DB;

class GioHangController extends Controller
{
    public function gioHang()
    {
        $maTaiKhoan = auth()->check() ? auth()->user()->ma_tai_khoan : 1;

        // Lấy giỏ hàng từ session
        $cart = session()->get("cart_{$maTaiKhoan}", []);

        if (empty($cart)) {
            return view('Home.giohang', ['gioHang' => []]);
        }

        // Lọc danh sách ID chỉ khi key tồn tại
        $maSanPhams = collect($cart)->pluck('ma_san_pham')->filter()->unique()->toArray();
        $maSizes = collect($cart)->pluck('size')->filter()->unique()->toArray();
        $maToppings = collect($cart)->pluck('toppings')->flatten()->filter()->unique()->toArray();

        // Truy vấn dữ liệu từ database
        $sanPhams = SanPham::whereIn('ma_san_pham', $maSanPhams)->get()->keyBy('ma_san_pham');
        $sizes = Sizes::whereIn('ma_size', $maSizes)->get()->keyBy('ma_size');
        $toppings = Topping::whereIn('ma_topping', $maToppings)->get()->keyBy('ma_topping');

        // Xây dựng giỏ hàng đầy đủ thông tin
        $gioHang = [];
        foreach ($cart as $cartKey => $item) {
            // Kiểm tra key tồn tại trước khi truy xuất
            if (!isset($item['ma_san_pham'], $item['size'], $item['toppings'])) {
                continue;
            }

            $gioHang[] = [
                'cart_key' => $cartKey,
                'san_pham' => $sanPhams[$item['ma_san_pham']] ?? null,
                'size' => $sizes[$item['size']] ?? null,
                'toppings' => collect($item['toppings'])->map(fn($id) => $toppings[$id] ?? null)->filter(),
                'so_luong' => $item['so_luong'] ?? 1,
                'gia' => $item['gia'] ?? 0,
            ];
        }

        return view('Home.giohang', compact('gioHang'));
    }
    //Thêm sản phẩm vào giỏ hàng
    public function addToCart(Request $request)
    {
        try {
            $request->validate([
                'ma_san_pham' => 'required|exists:san_phams,ma_san_pham',
                'size' => 'required|numeric|exists:sizes,ma_size',
                'so_luong' => 'required|integer|min:1',
                'toppings' => 'array'
            ]);

            $sanPham = SanPham::findOrFail($request->ma_san_pham);
            $size = Sizes::findOrFail($request->size);

            // Kiểm tra topping hợp lệ
            $toppings = Topping::whereIn('ma_topping', $request->toppings)->pluck('ma_topping')->toArray();

            $maTaiKhoan = auth()->check() ? auth()->user()->ma_tai_khoan : 1;

            $cart = session()->get("cart_{$maTaiKhoan}", []);

            $cartKey = "{$request->ma_san_pham}_{$request->size}_" . implode('_', $toppings);

            if (isset($cart[$cartKey])) {
                $cart[$cartKey]['so_luong'] += $request->so_luong;
            } else {
                $cart[$cartKey] = [
                    'ma_san_pham' => $request->ma_san_pham,
                    'ten_san_pham' => $sanPham->ten_san_pham,
                    'gia' => $sanPham->gia + $size->gia_size + array_sum(Topping::whereIn('ma_topping', $toppings)->pluck('gia_topping')->toArray()),
                    'size' => $request->size,
                    'size_ten' => $size->ten_size,
                    'so_luong' => $request->so_luong,
                    'toppings' => $toppings,
                ];
            }

            session()->put("cart_{$maTaiKhoan}", $cart);

            return response()->json(['message' => 'Đã thêm vào giỏ hàng!', 'type' => 'success']);
        } catch (\Exception $e) {
            return response()->json(['message' => 'Có lỗi xảy ra!', 'type' => 'error'], 500);
        }
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
    public function update(Request $request)
{
    $maTaiKhoan = session('ma_tai_khoan', 1);
    $gioHang = session("cart_$maTaiKhoan", []);

    $maSanPham = $request->ma_san_pham;
    $soLuong = $request->so_luong;

    if (isset($gioHang[$maSanPham])) {
        $gioHang[$maSanPham]['so_luong'] = $soLuong;
    }

    session(["cart_$maTaiKhoan" => $gioHang]);

    $tongTien = 0;
    $itemTotal = 0;

    foreach ($gioHang as $item) {
        $giaSanPham = $item['san_pham']->gia;
        $giaSize = $item['size']->gia_size ?? 0;
        $giaTopping = is_array($item['toppings']) ? collect($item['toppings'])->sum('gia_topping') : 0;
        $thanhTien = ($giaSanPham + $giaSize + $giaTopping) * $item['so_luong'];

        $tongTien += $thanhTien;
        if ($item['san_pham']->ma_san_pham == $maSanPham) {
            $itemTotal = $thanhTien;
        }
    }

    return response()->json([
        'success' => true,
        'tongTien' => $tongTien,
        'itemTotal' => $itemTotal,
    ]);
}


}
