<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\RateLimiter;
use Illuminate\Support\Str;

class LoginController extends Controller
{
    public function create()
    {
        return view('auth.login');
    }

    public function store(Request $request)
    {
        $credentials = $request->validate([
            'email' => ['required', 'email', 'max:255'],
            'password' => ['required', 'string', 'max:128'],
        ]);

        // Kunci pembatasan berdasarkan email dan IP.
        $email = Str::lower(trim($credentials['email']));
        $key = 'login:' . hash(
            'sha256',
            $email . '|' . $request->ip()
        );

        // Maksimal 5 percobaan dalam 60 detik.
        if (RateLimiter::tooManyAttempts($key, 5)) {
            $seconds = RateLimiter::availableIn($key);

            return back()
                ->withErrors([
                    'email' => "Terlalu banyak percobaan login. Coba lagi dalam {$seconds} detik.",
                ])
                ->onlyInput('email');
        }

        // Gunakan email yang sudah dinormalisasi.
        $credentials['email'] = $email;

        if (! Auth::attempt(
            $credentials,
            $request->boolean('remember')
        )) {
            RateLimiter::hit($key, 60);

            return back()
                ->withErrors([
                    'email' => 'Email atau password salah, atau akun tidak aktif.',
                ])
                ->onlyInput('email');
        }

        $user = Auth::user();

        // Tolak akun nonaktif dan bersihkan sesi.
        if (! $user->is_active) {
            Auth::logout();

            $request->session()->invalidate();
            $request->session()->regenerateToken();

            RateLimiter::hit($key, 60);

            return redirect()
                ->route('login')
                ->withErrors([
                    'email' => 'Email atau password salah, atau akun tidak aktif.',
                ])
                ->onlyInput('email');
        }

        // Pastikan role valid sebelum memberikan akses.
        if (! $user->isAdmin() && $user->role !== 'guru') {
            Auth::logout();

            $request->session()->invalidate();
            $request->session()->regenerateToken();

            RateLimiter::hit($key, 60);

            return redirect()
                ->route('login')
                ->withErrors([
                    'email' => 'Email atau password salah, atau akun tidak aktif.',
                ])
                ->onlyInput('email');
        }

        // Login berhasil: bersihkan hitungan dan regenerasi sesi.
        RateLimiter::clear($key);
        $request->session()->regenerate();

        // Catat aktivitas untuk middleware auto-logout 5 menit.
        $request->session()->put('last_activity', time());

        return $user->isAdmin()
            ? redirect()->intended(route('admin.dashboard'))
            : redirect()->intended(route('guru.dashboard'));
    }

    public function destroy(Request $request)
    {
        Auth::logout();

        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return redirect()->route('login');
    }
}
