<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\View\View;

class AuthController extends Controller
{
    public function showLogin(): View|RedirectResponse
    {
        if (Auth::check()) {
            return $this->dashboardRedirect(Auth::user());
        }

        return view('login');
    }

    public function login(Request $request): RedirectResponse
    {
        $credentials = $request->validate([
            'username' => ['required', 'string'],
            'password' => ['required', 'string'],
        ]);

        if (! Auth::attempt($credentials, $request->boolean('remember'))) {
            return back()
                ->withErrors(['username' => 'Username atau password salah.'])
                ->onlyInput('username');
        }

        $user = Auth::user();

        if (! in_array($user->role, ['owner', 'admin', 'kasir'], true)) {
            Auth::logout();

            return back()
                ->withErrors(['username' => 'Akun tidak memiliki role yang valid.'])
                ->onlyInput('username');
        }

        $request->session()->regenerate();

        return $this->dashboardRedirect($user);
    }

    public function logout(Request $request): RedirectResponse
    {
        Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return redirect()->route('login');
    }

    private function dashboardRedirect(User $user): RedirectResponse
    {
        return redirect()->route(match ($user->role) {
            'owner' => 'owner.dashboard',
            'kasir' => 'kasir.dashboard',
            default => 'admin.dashboard',
        });
    }
}
