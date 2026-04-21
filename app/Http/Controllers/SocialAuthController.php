<?php

namespace App\Http\Controllers;

use App\Services\SocialAuthService;
use Illuminate\Http\Request;
use Laravel\Socialite\Facades\Socialite;

class SocialAuthController extends Controller
{
    protected $socialAuthService;

    public function __construct(SocialAuthService $socialAuthService)
    {
        $this->socialAuthService = $socialAuthService;
    }

    /**
     * Chuyển hướng người dùng đến trang đăng nhập của Google/Facebook.
     */
    public function redirect(string $provider)
    {
        return Socialite::driver($provider)->redirect();
    }

    /**
     * Xử lý dữ liệu trả về từ Google/Facebook.
     */
    public function callback(string $provider)
    {
        try {
            // Bỏ qua kiểm tra SSL để tránh lỗi cURL error 60 trên môi trường local
            $socialUser = Socialite::driver($provider)
                ->setHttpClient(new \GuzzleHttp\Client(['verify' => false]))
                ->user();
            
            $user = $this->socialAuthService->findOrCreateUser($socialUser, $provider);
            
            auth()->login($user);

            return redirect()->route('dashboard')->with('success', 'Đăng nhập thành công!');
        } catch (\Exception $e) {
            return redirect()->route('login')->with('error', 'Đăng nhập thất bại: ' . $e->getMessage());
        }
    }

    /**
     * Đăng xuất người dùng.
     */
    public function logout(Request $request)
    {
        auth()->logout();
        
        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return redirect()->route('login')->with('success', 'Bạn đã đăng xuất.');
    }
}
