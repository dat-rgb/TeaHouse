<?php
namespace App\Http\Controllers;

use App\Models\KhachHang;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use App\Models\TaiKhoan;

class AuthController extends Controller {
    // Hiển thị form đăng nhập
    public function showLoginForm() {
        return view('auth.login');
    }
    // Hiển thị form đăng ký
    public function showRegisterForm() {
        return view('auth.register');
    }
    public function register(Request $request) {
        $request->validate([
            'ho_ten_khach_hang' => 'required|string|max:255',
            'ngay_sinh' => 'nullable|date',
            'email' => 'nullable|email|unique:tai_khoan,email',
            'so_dien_thoai' => 'nullable|unique:tai_khoan,so_dien_thoai',
            'mat_khau' => 'required|min:6',
            'mat_khau_confirmation' => 'required|same:mat_khau'
        ]);

        // Tạo tài khoản mới
        $user = TaiKhoan::create([
            'email' => $request->email,
            'so_dien_thoai' => $request->so_dien_thoai,
            'mat_khau' => Hash::make($request->mat_khau),
        ]);

        // Kiểm tra nếu không tạo được user
        if (!$user) {
            return redirect()->back()->withInput()->with([
                'message' => 'Tài khoản gắn email hoặc số điện thoại đã tồn tại!',
                'type' => 'error'
            ]);
        }

        // Tạo bản ghi khách hàng
        KhachHang::create([
            'ma_tai_khoan' => $user->ma_tai_khoan,
            'ho_ten_khach_hang' => $request->ho_ten_khach_hang,
            'ngay_sinh' => $request->ngay_sinh,
        ]);

        Auth::login($user);

        return redirect()->route('home.index')->with([
            'message' => 'Đăng ký thành công!',
            'type' => 'success'
        ]);
    }

    public function login(Request $request) {
        $request->validate([
            'email' => 'required|email',
            'mat_khau' => 'required',
        ]);

        $user = TaiKhoan::with(['nhanVien', 'khachHang'])
            ->where('email', $request->email)
            ->first();

        if ($user && Hash::check($request->mat_khau, $user->mat_khau)) {
            Auth::login($user);

            // Chuyển hướng dựa vào loại tài khoản
            return redirect()->route($user->loai_tai_khoan == 1 ? 'admin.home.index' : 'home.index')
                ->with('success', 'Đăng nhập thành công!');
        }

        return back()->withErrors(['error' => 'Sai email hoặc mật khẩu'])->withInput();
    }


    // Xử lý đăng xuất
    public function logout() {
        Auth::logout();
        return redirect()->route('login');
    }
}
