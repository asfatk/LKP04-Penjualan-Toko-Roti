<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class RoleMiddleware
{
    public function handle(
        Request $request,
        Closure $next,
        string ...$roles
    ): Response {
        // Pastikan pengguna sudah login.
        if (! $request->user()) {
            return redirect()->route('login');
        }

        $userRole = $request->user()->role;

        // Role admin dan kasir juga boleh masuk
        // ke halaman yang menggunakan role:admin_kasir.
        foreach ($roles as $role) {
            if ($role === 'admin_kasir') {
                $allowedRoles = ['admin_kasir', 'admin', 'kasir'];

                if (in_array($userRole, $allowedRoles, true)) {
                    return $next($request);
                }

                continue;
            }

            // Role lain, misalnya owner, harus cocok.
            if ($userRole === $role) {
                return $next($request);
            }
        }

        abort(403, 'Kamu tidak memiliki akses ke halaman ini.');
    }
}
