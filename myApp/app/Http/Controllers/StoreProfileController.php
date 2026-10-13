<?php

namespace App\Http\Controllers;

use App\Models\StoreProfile;
use Illuminate\Http\Request;
use Illuminate\Http\RedirectResponse;
use Illuminate\View\View;

class StoreProfileController extends Controller
{
    /**
     * Menampilkan halaman profil toko.
     */
    public function edit(): View
    {
        $profile = StoreProfile::first();

        return view('owner.profile', compact('profile'));
    }

    /**
     * Menyimpan perubahan profil toko.
     */
    public function update(Request $request): RedirectResponse
    {
        $validated = $request->validate([
            'nama_toko' => ['required', 'string', 'max:255'],
            'alamat' => ['required', 'string'],
            'no_telepon' => ['required', 'string', 'max:255'],
        ]);

        $profile = StoreProfile::first();

        if ($profile) {
            $profile->update($validated);
        } else {
            StoreProfile::create($validated);
        }

        return redirect()
            ->route('owner.profile')
            ->with('success', 'Profil toko berhasil diperbarui!');
    }
}
