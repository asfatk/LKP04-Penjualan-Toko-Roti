<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\View\View;

class AuthController extends Controller
{
    /**
     * Menampilkan halaman login.
     */
    public function showLogin(): View|RedirectResponse
    {
        if (Auth::check()) {
            return $this->dashboardRedirect(Auth::user());
        }

        return view('login');
    }

    /**
     * Memproses login pengguna.
     */
    public function login(Request $request): RedirectResponse
    {
        $credentials = $request->validate([
            'username' => ['required', 'string'],
            'password' => ['required', 'string'],
        ]);

        if (! Auth::attempt($credentials, $request->boolean('remember'))) {
            return back()
                ->withErrors([
                    'username' => 'Username atau password salah.',
                ])
                ->onlyInput('username');
        }

        $user = Auth::user();

        // Role yang diizinkan masuk ke sistem.
        $allowedRoles = [
            'owner',
            'admin',
            'kasir',
            'admin_kasir',
        ];

        if (! in_array($user->role, $allowedRoles, true)) {
            Auth::logout();

            $request->session()->invalidate();
            $request->session()->regenerateToken();

            return redirect()
                ->route('login')
                ->withErrors([
                    'username' => 'Role akun tidak dikenali.',
                ])
                ->onlyInput('username');
        }

        // Membuat ulang session setelah login berhasil.
        $request->session()->regenerate();

        return $this->dashboardRedirect($user);
    }

    /**
     * Memproses logout pengguna.
     */
    public function logout(Request $request): RedirectResponse
    {
        Auth::logout();

        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return redirect()->route('login');
    }

    /**
     * Menampilkan halaman profil pengguna.
     */
    public function profile(): View
    {
        $user = Auth::user();

        return view('profile.index', compact('user'));
    }

    /**
     * Mengarahkan pengguna sesuai role.
     */
    private function dashboardRedirect(User $user): RedirectResponse
    {
        switch ($user->role) {
            case 'owner':
                return redirect()->route('owner.dashboard');

            case 'admin':
            case 'kasir':
            case 'admin_kasir':
                return redirect()->route('admin.dashboard');

            default:
                abort(403, 'Role akun tidak dikenali.');
        }
    }
}