<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;
use Illuminate\View\View;

class UserManagementController extends Controller
{
    private const MANAGED_ROLES = ['admin', 'kasir'];

    public function index(): View
    {
        $users = User::query()
            ->whereIn('role', self::MANAGED_ROLES)
            ->orderBy('nama')
            ->paginate(10);

        return view('users.index', compact('users'));
    }

    public function create(): View
    {
        return view('users.form');
    }

    public function store(Request $request): RedirectResponse
    {
        $data = $request->validate([
            'nama' => ['required', 'string', 'max:255'],
            'username' => ['required', 'string', 'max:255', 'unique:users,username'],
            'role' => ['required', Rule::in(self::MANAGED_ROLES)],
            'password' => ['required', 'string', 'min:8', 'confirmed'],
        ]);

        User::create($data);

        return redirect()->route('owner.users')->with('success', 'Akun berhasil ditambahkan.');
    }

    public function edit(User $user): View
    {
        abort_unless(in_array($user->role, self::MANAGED_ROLES, true), 404);

        return view('users.form', compact('user'));
    }

    public function update(Request $request, User $user): RedirectResponse
    {
        abort_unless(in_array($user->role, self::MANAGED_ROLES, true), 404);

        $data = $request->validate([
            'nama' => ['required', 'string', 'max:255'],
            'username' => ['required', 'string', 'max:255', Rule::unique('users', 'username')->ignore($user->id)],
            'role' => ['required', Rule::in(self::MANAGED_ROLES)],
            'password' => ['nullable', 'string', 'min:8', 'confirmed'],
        ]);

        if (blank($data['password'] ?? null)) {
            unset($data['password']);
        }

        $user->update($data);

        return redirect()->route('owner.users')->with('success', 'Akun berhasil diperbarui.');
    }

    public function destroy(User $user): RedirectResponse
    {
        abort_unless(in_array($user->role, self::MANAGED_ROLES, true), 404);

        $user->delete();

        return redirect()->route('owner.users')->with('success', 'Akun berhasil dihapus.');
    }
}
