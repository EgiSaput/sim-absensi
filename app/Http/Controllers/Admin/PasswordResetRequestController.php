<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Mail\PasswordResetLink;
use App\Models\PasswordResetRequest;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Str;

class PasswordResetRequestController extends Controller
{
    // Sisi Admin dari Activity Diagram "Lupa Password Guru" (diagram 1):
    // "Admin Membuka Permintaan Reset Password" -> "Admin Melihat Detail Permintaan"
    // -> percabangan "Admin Menyetujui?"

    public function index()
    {
        $requests = PasswordResetRequest::with(['user', 'reviewer'])
            ->orderByDesc('created_at')
            ->paginate(15);

        return view('admin.password-requests.index', compact('requests'));
    }

    // "Sistem Menyetujui Permintaan Reset" -> "Sistem Mengirim Link Reset Password ke Email Guru"
    public function approve(Request $request, PasswordResetRequest $passwordRequest)
    {
        $passwordRequest->update([
            'status' => 'approved',
            'token' => Str::random(64),
            'reviewed_by' => $request->user()->id,
            'reviewed_at' => now(),
        ]);

        $resetLink = route('password.reset.edit', $passwordRequest->token);

        Mail::to($passwordRequest->user->email)->send(
            new PasswordResetLink($resetLink, $passwordRequest->user->name)
        );

        return back()->with('status', "Permintaan disetujui. Link reset password telah dikirim ke {$passwordRequest->user->email}.");
    }

    // "Sistem Menolak Permintaan Reset" -> "Mengirim Notifikasi Penolakan kepada Guru"
    public function reject(Request $request, PasswordResetRequest $passwordRequest)
    {
        $validated = $request->validate([
            'rejection_reason' => ['nullable', 'string', 'max:255'],
        ]);

        $passwordRequest->update([
            'status' => 'rejected',
            'reviewed_by' => $request->user()->id,
            'reviewed_at' => now(),
            'rejection_reason' => $validated['rejection_reason'] ?? null,
        ]);

        return back()->with('status', 'Permintaan reset password ditolak.');
    }
}