<?php
namespace App\Http\Controllers;

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

    // Xử lý đăng ký
    public function register(Request $request) {
        $request->validate([
            'email' => 'nullable|email|unique:tai_khoan,email',
            'so_dien_thoai' => 'nullable|unique:tai_khoan,so_dien_thoai',
            'mat_khau' => 'required|min:6',
        ]);

        $user = TaiKhoan::create([
            'email' => $request->email,
            'so_dien_thoai' => $request->so_dien_thoai,
            'mat_khau' => Hash::make($request->mat_khau),
        ]);

        Auth::login($user);
        return redirect()->route('home.index'); // Chuyển hướng sau khi đăng ký thành công
    }
    public function login(Request $request) {
        $request->validate([
            'so_dien_thoai' => 'required',
            'mat_khau' => 'required',
        ]);

        $user = TaiKhoan::with(['nhanVien', 'khachHang'])
            ->where('so_dien_thoai', $request->so_dien_thoai)
            ->first();

        if ($user && Hash::check($request->mat_khau, $user->mat_khau)) {
            Auth::login($user);

            // Chuyển hướng dựa vào loại tài khoản
            return redirect()->route($user->loai_tai_khoan == 1 ? 'admin.home.index' : 'home.index')
                ->with('success', 'Đăng nhập thành công!');
        }

        return back()->withErrors(['error' => 'Sai số điện thoại hoặc mật khẩu'])->withInput();
    }

    // Xử lý đăng xuất
    public function logout() {
        Auth::logout();
        return redirect()->route('login');
    }
}
