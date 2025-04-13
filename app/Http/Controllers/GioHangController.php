<?php

namespace App\Http\Controllers;

use App\Models\CuaHang;
use App\Models\SanPham;
use App\Models\Sizes;
use App\Models\Topping;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\DB;
use App\Events\CartUpdated;
use Str;

class GioHangController extends Controller
{
    public function checkPro($ma_san_pham, $so_luong, $ma_size, $ma_cua_hang)
    {
        $thanhPhan = DB::table('thanh_phan_san_phams')
            ->where('ma_san_pham', $ma_san_pham)
            ->where('ma_size', $ma_size)
            ->get();

        if ($thanhPhan->isEmpty()) {
            return response()->json([
                'status' => false,
                'message' => 'Sản phẩm không có công thức pha chế hoặc size không hợp lệ.'
            ]);
        }

        $nguyenLieuThieu = [];

        foreach ($thanhPhan as $tp) {
            $nguyenLieuKho = DB::table('cua_hang_nguyen_lieus')
                ->where('ma_cua_hang', $ma_cua_hang)
                ->where('ma_nguyen_lieu', $tp->ma_nguyen_lieu)
                ->first();

            $tong_dinh_luong_can = $tp->dinh_luong * $so_luong;

            if (!$nguyenLieuKho || $nguyenLieuKho->dinh_luong_ton < $tong_dinh_luong_can || $nguyenLieuKho->dinh_luong_ton < $nguyenLieuKho->dinh_luong_ton_min) {
                $nguyenLieuThieu[] = $tp->ma_nguyen_lieu;
            }
        }

        if (!empty($nguyenLieuThieu)) {
            return response()->json([
                'status' => false,
                'message' => 'Không đủ nguyên liệu trong kho để pha chế sản phẩm.',
            ]);
        }

        return response()->json([
            'status' => true,
            'message' => 'Sản phẩm đủ nguyên liệu để                                                                                                                                                                                                                                                                                                                                                                                                        bán.'
        ]);
    }

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
            $gioHang[$key] = [
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
    //cap nhat so luong
    public function updateQuantity(Request $request, $key, $type)
    {
        $maTaiKhoan = auth()->check() ? auth()->user()->ma_tai_khoan : 1;
        $cartKey = "cart_{$maTaiKhoan}";
        $cart = session()->get($cartKey, []);

        if (isset($cart[$key])) {
            if ($type === 'increase') {
                $cart[$key]['so_luong'] += 1;
            } elseif ($type === 'decrease') {
                $cart[$key]['so_luong'] -= 1;
                if ($cart[$key]['so_luong'] <= 0) {
                    unset($cart[$key]);
                    session()->put($cartKey, $cart);
                    return redirect()->back();
                }
            }
            $cart[$key]['tong_tien'] = $cart[$key]['gia'] * $cart[$key]['so_luong'];
            session()->put($cartKey, $cart);
        }

        return redirect()->back();
    }
    //Xóa giỏ hàng
    public function clearCart()
    {
        $maTaiKhoan = auth()->check() ? auth()->user()->ma_tai_khoan : 1;

        session()->forget("cart_{$maTaiKhoan}");

        return redirect()->route('giohang.index')->with('success', 'Đã xoá toàn bộ giỏ hàng.');
    }
    // CartController.php
    public function showEditModal(Request $request)
    {
        $rowId = $request->input('rowId');
        $maTaiKhoan = auth()->check() ? auth()->user()->ma_tai_khoan : 1;
        $cart = session()->get("cart_{$maTaiKhoan}", []);
        $item = $cart[$rowId] ?? null;
        dd($rowId);  // Add this to check if $rowId is being set properly

        if (!$item) {
            return response()->json(['error' => 'Không tìm thấy sản phẩm'], 404);
        }

        $sizes = Sizes::where('ma_san_pham', $item['id'])->get();
        $toppings = Topping::all();

        // Make sure to pass $rowId correctly
        return view('components.cart.edit-cart-modal', [
            'item' => $item,
            'rowId' => $rowId,   // Ensure this line is included
            'sizes' => $sizes,
            'toppings' => $toppings
        ]);
    }

}
