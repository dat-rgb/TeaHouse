<?php

namespace App\Http\Controllers;

use App\Models\SanPham;
use App\Models\Sizes;
use App\Models\Topping;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\DB;
use App\Events\CartUpdated;

class GioHangController extends Controller
{

    public function gioHang()
    {
        $maTaiKhoan = auth()->check() ? auth()->user()->ma_tai_khoan : 1;

        // Lấy giỏ hàng từ session
        $cart = session()->get("cart_{$maTaiKhoan}", []);

        if (empty($cart)) {
            return view('Home.gioHang', ['cart' => [], 'tongTien' => 0]);
        }

        // Lấy danh sách mã
        $maSanPhams = collect($cart)->pluck('ma_san_pham')->unique()->toArray();
        $maSizes = collect($cart)->pluck('size')->unique()->toArray();
        $maToppings = collect($cart)->pluck('toppings')->flatten()->unique()->toArray();

        // Truy vấn dữ liệu liên quan
        $sanPhams = SanPham::whereIn('ma_san_pham', $maSanPhams)->get()->keyBy('ma_san_pham');
        $sizes = Sizes::whereIn('ma_size', $maSizes)->get()->keyBy('ma_size');
        $toppings = Topping::whereIn('ma_topping', $maToppings)->get()->keyBy('ma_topping');

        $gioHang = [];
        $tongTien = 0;

        foreach ($cart as $key => $item) {
            $sanPham = $sanPhams[$item['ma_san_pham']] ?? null;
            $size = $sizes[$item['size']] ?? null;
            $dsTopping = collect($item['toppings'])->map(fn($id) => $toppings[$id] ?? null)->filter();

            // Giá từng thành phần
            $giaSP = $sanPham->gia ?? 0;
            $giaSize = $size->gia_size ?? 0;
            $giaTopping = $dsTopping->sum('gia_topping');

            // Tổng cho từng sản phẩm
            $tongTienSP = ($giaSP + $giaSize + $giaTopping) * ($item['so_luong'] ?? 1);
            $tongTien += $tongTienSP;

            // Đưa vào giỏ hàng để hiển thị
            $gioHang[] = [
                'cart_key' => $key,
                'ma_san_pham' => $item['ma_san_pham'],
                'ten_san_pham' => $sanPham->ten_san_pham ?? '[SP không tồn tại]',
                'hinh_anh' => $sanPham->hinh_anh ?? 'default.jpg',
                'gia' => $giaSP + $giaSize + $giaTopping,
                'tongTienSanPham' => $tongTienSP,
                'so_luong' => $item['so_luong'] ?? 1,
                'size_ten' => $size->ten_size ?? 'Không rõ',
                'toppings' => $dsTopping->map(function ($tp) {
                    return [
                        'ten_topping' => $tp->ten_topping,
                        'gia_topping' => $tp->gia_topping,
                    ];
                }),
            ];
        }
       
        return view('Home.giohang', [
            'gioHang' => $gioHang,
            'tongTien' => $tongTien
        ]);
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
            $soLuong = $request->so_luong;

            // Xử lý danh sách topping
            $toppings = [];
            $tongGiaTopping = 0;

            if ($request->has('toppings') && is_array($request->toppings)) {
                $toppingList = Topping::whereIn('ma_topping', $request->toppings)->get();
                foreach ($toppingList as $topping) {
                    $toppings[] = [
                        'ma_topping' => $topping->ma_topping,
                        'ten_topping' => $topping->ten_topping,
                        'gia_topping' => $topping->gia_topping,
                    ];
                    $tongGiaTopping += $topping->gia_topping;
                }
            }

            // Giá 1 sản phẩm (bao gồm giá size và topping)
            $gia1SanPham = $sanPham->gia + $size->gia_size + $tongGiaTopping;

            // Tạo key định danh cho sản phẩm trong giỏ hàng
            $toppingKey = implode('_', collect($toppings)->pluck('ma_topping')->toArray());
            $cartKey = "{$request->ma_san_pham}_{$request->size}_{$toppingKey}";

            // Lấy giỏ hàng từ session
            $maTaiKhoan = auth()->check() ? auth()->user()->ma_tai_khoan : 1;
            $cart = session()->get("cart_{$maTaiKhoan}", []);

            if (isset($cart[$cartKey])) {
                $cart[$cartKey]['so_luong'] += $soLuong;
            } else {
                $cart[$cartKey] = [
                    'ma_san_pham' => $sanPham->ma_san_pham,
                    'ten_san_pham' => $sanPham->ten_san_pham,
                    'gia' => $gia1SanPham,
                    'so_luong' => $soLuong,
                    'size' => $size->ma_size,
                    'size_ten' => $size->ten_size,
                    'toppings' => $toppings,
                    'tong_tien' => $gia1SanPham * $soLuong
                ];
            }

            session()->put("cart_{$maTaiKhoan}", $cart);

            return response()->json(['message' => 'Đã thêm vào giỏ hàng!', 'type' => 'success']);
        } catch (\Exception $e) {
            return response()->json(['message' => 'Có lỗi xảy ra!', 'type' => 'error'], 500);
        }
    }
    //edit 
    public function edit($id)
    {
        $gioHang = session('gioHang', []);
        if (!isset($gioHang[$id])) {
            return response('Không tìm thấy sản phẩm.', 404);
        }

        $item = $gioHang[$id];
        return view('components.cart.edit-cart-modal', compact('item', 'id'));
    }

    public function update(Request $request, $id)
    {
        $gioHang = session('gioHang', []);
        if (!isset($gioHang[$id])) {
            return redirect()->back()->with('error', 'Sản phẩm không tồn tại.');
        }

        $gioHang[$id]['so_luong'] = $request->input('so_luong');
        $gioHang[$id]['size'] = $request->input('size');
        $gioHang[$id]['topping'] = $request->input('topping', []);

        session(['gioHang' => $gioHang]);

        return redirect()->route('cart.index')->with('success', 'Cập nhật sản phẩm thành công!');
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
