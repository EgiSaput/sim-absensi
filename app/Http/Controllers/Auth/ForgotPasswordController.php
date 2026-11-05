<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\PasswordResetRequest;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;

class ForgotPasswordController extends Controller
{
    // Activity Diagram "Lupa Password Guru" (diagram 1), sisi Guru.

    public function create()
    {
        return view('auth.forgot-password');
    }

    // "Guru Membuka Halaman Login" -> "Klik Lupa Password" -> "Masukkan Email Terdaftar"
    // -> "Sistem Memeriksa Email" -> percabangan "Email Terdaftar?"
    public function store(Request $request)
    {
        $request->validate(['email' => ['required', 'email']]);

        $user = User::where('email', $request->email)->first();

        if (! $user) {
            return back()->withErrors(['email' => 'Email Tidak Terdaftar']);
        }

        // Hindari duplikasi permintaan yang masih pending.
        $existing = PasswordResetRequest::where('user_id', $user->id)
            ->where('status', 'pending')
            ->first();

        if (! $existing) {
            PasswordResetRequest::create([
                'user_id' => $user->id,
                'status' => 'pending',
            ]);
        }

        return back()->with('status', 'Permintaan reset password telah dikirim ke Admin. Silakan tunggu persetujuan.');
    }

    // "Guru Membuka Link Reset Password" (link berisi token yang dibuat saat Admin menyetujui)
    public function edit(string $token)
    {
        $resetRequest = PasswordResetRequest::where('token', $token)
            ->where('status', 'approved')
            ->firstOrFail();

        return view('auth.reset-password', ['resetRequest' => $resetRequest, 'token' => $token]);
    }

    // "Guru Memasukkan Password Baru" -> "Konfirmasi Password Baru" -> "Sistem Memvalidasi Password Baru"
    // -> jika valid: hash + simpan; jika tidak: "Password Tidak Valid"
    public function update(Request $request, string $token)
    {
        $resetRequest = PasswordResetRequest::where('token', $token)
            ->where('status', 'approved')
            ->firstOrFail();

        $validated = $request->validate([
            'password' => ['required', 'string', 'min:8', 'confirmed'],
        ], [
            'password.min' => 'Password Tidak Valid (minimal 8 karakter).',
            'password.confirmed' => 'Password Tidak Valid (konfirmasi tidak sama).',
        ]);

        $resetRequest->user->update([
            'password' => Hash::make($validated['password']),
        ]);

        $resetRequest->update([
            'status' => 'completed',
            'completed_at' => now(),
        ]);

        // Pastikan sesi login apa pun yang sedang aktif di browser ini
        // (mis. sesi Admin yang sedang testing link) diakhiri, supaya
        // selalu diarahkan ke halaman login, bukan ke dashboard lama.
        if ($request->user()) {
            Auth::logout();
            $request->session()->invalidate();
            $request->session()->regenerateToken();
        }

        return redirect()->route('login')->with('status', 'Password Berhasil Diubah. Silakan login kembali.');
    }
}