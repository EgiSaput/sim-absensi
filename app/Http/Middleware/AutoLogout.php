<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Symfony\Component\HttpFoundation\Response;

class AutoLogout
{
    public function handle(
        Request $request,
        Closure $next
    ): Response {

        if (Auth::check()) {

            $lastActivity = session('last_activity');

            $timeout = 5 * 60; // 5 menit

            if ($lastActivity && (time() - $lastActivity) > $timeout) {

                Auth::logout();

                $request->session()->invalidate();
                $request->session()->regenerateToken();

                return redirect()
                    ->route('login')
                    ->with('timeout', 'Sesi Anda telah berakhir karena tidak ada aktivitas selama 5 menit.');
            }

            session([
                'last_activity' => time()
            ]);
        }

        return $next($request);
    }
}