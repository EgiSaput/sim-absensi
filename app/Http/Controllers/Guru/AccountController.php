<?php

namespace App\Http\Controllers\Guru;

use App\Http\Controllers\Controller;
use App\Mail\EmailChangeVerification;
use App\Models\EmailChangeRequest;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Mail;
use Illuminate\Validation\Rule;

class AccountController extends Controller
{
    // Activity Diagram "Pengelolaan Akun Guru" (diagram 2): Ganti Email & Ganti Password.

    public function edit()
    {
        return view('guru.account.edit');
    }

    // "Masukkan Email Baru" -> "Masukkan Password Saat Ini" -> "Sistem Memvalidasi Password"
    // -> "Password Benar?" -> "Sistem Memeriksa Email Baru" -> "Email Sudah Digunakan?"
    // -> "Kirim Kode Verifikasi ke Email Baru"
    public function requestEmailChange(Request $request)
{
    $user = $request->user();

    $validated = $request->validate([
        'new_email' => ['required', 'email'],
        'current_password' => ['required', 'string'],
    ]);

    if (! Hash::check($validated['current_password'], $user->password)) {
        return back()->withErrors(['current_password' => 'Password Saat Ini Salah']);
    }

    if (User::where('email', $validated['new_email'])->exists()) {
        return back()->withErrors(['new_email' => 'Email Sudah Digunakan']);
    }

    $code = (string) random_int(100000, 999999);

    EmailChangeRequest::create([
        'user_id' => $user->id,
        'new_email' => $validated['new_email'],
        'verification_code' => $code,
        'status' => 'pending',
        'expires_at' => now()->addMinutes(15),
    ]);

    Mail::to($validated['new_email'])->send(
        new EmailChangeVerification($code, $user->name)
    );

    return back()->with('status', "Kode verifikasi telah dikirim ke {$validated['new_email']}. Silakan cek inbox (atau folder spam).");
}

    // "Guru Memasukkan Kode Verifikasi" -> "Sistem Memvalidasi Kode" -> "Kode Benar?"
    // -> "Mengubah Email Guru" -> "Menyimpan Email Baru"
    public function verifyEmailChange(Request $request)
    {
        $user = $request->user();

        $validated = $request->validate([
            'verification_code' => ['required', 'string'],
        ]);

        $emailChange = EmailChangeRequest::where('user_id', $user->id)
            ->where('status', 'pending')
            ->latest()
            ->first();

        if (! $emailChange || $emailChange->expires_at->isPast()) {
            return back()->withErrors(['verification_code' => 'Tidak ada permintaan ganti email yang aktif atau sudah kedaluwarsa.']);
        }

        if ($emailChange->verification_code !== $validated['verification_code']) {
            return back()->withErrors(['verification_code' => 'Kode Verifikasi Salah']);
        }

        $user->update(['email' => $emailChange->new_email]);
        $emailChange->update(['status' => 'verified']);

        return back()->with('status', 'Email Berhasil Diubah');
    }

    // "Masukkan Password Saat Ini" -> "Masukkan Password Baru" -> "Konfirmasi Password Baru"
    // -> "Klik Ganti Password" -> "Sistem Memvalidasi Password Saat Ini" -> "Password Benar?"
    // -> "Validasi Password Baru" -> "Password Baru Valid?" -> hash + simpan
    public function updatePassword(Request $request)
    {
        $user = $request->user();

        $validated = $request->validate([
            'current_password' => ['required', 'string'],
            'password' => ['required', 'string', 'min:8', 'confirmed'],
        ], [
            'password.min' => 'Password Baru Tidak Valid (minimal 8 karakter).',
        ]);

        if (! Hash::check($validated['current_password'], $user->password)) {
            return back()->withErrors(['current_password' => 'Password Saat Ini Salah']);
        }

        $user->update(['password' => Hash::make($validated['password'])]);

        return back()->with('status', 'Password Berhasil Diubah');
    }
}
