<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>{{ isset($user) ? 'Edit' : 'Tambah' }} Pengguna - Modern Bakery</title>
    <style>
        :root { font-family: 'DM Sans', 'Segoe UI', sans-serif; color: #28231f; background: #f5f3ed; }
        * { box-sizing: border-box; }
        body { margin: 0; min-height: 100vh; background: radial-gradient(ellipse at 90% 0%, #e9dfc9 0, transparent 38%), #f5f3ed; }
        a { color: inherit; text-decoration: none; }
        .topbar { min-height: 72px; display: flex; align-items: center; justify-content: space-between; gap: 20px; padding: 0 max(24px, calc((100vw - 900px) / 2)); border-bottom: 1px solid #ded9ce; background: rgba(255,255,255,.82); }
        .brand { font-family: Georgia, serif; color: #6c2924; font-size: 20px; font-weight: 700; }
        .logout { border: 1px solid #b9afa2; background: transparent; color: #4b4139; padding: 9px 14px; font: inherit; cursor: pointer; }
        main { width: min(100% - 40px, 760px); margin: 46px auto; }
        .eyebrow { color: #496251; text-transform: uppercase; font-size: 12px; font-weight: 700; letter-spacing: 1px; }
        h1 { margin: 8px 0 6px; font: 700 34px/1.2 Georgia, serif; color: #312721; }
        .intro { margin: 0 0 24px; color: #70675e; }
        .form-panel { padding: 26px; background: #fff; border: 1px solid #e4dfd4; border-radius: 6px; }
        label { display: block; margin: 0 0 7px; font-size: 14px; font-weight: 700; }
        input, select { width: 100%; min-height: 44px; margin-bottom: 18px; padding: 10px 12px; border: 1px solid #cfc8bc; border-radius: 3px; color: #28231f; background: #fff; font: inherit; }
        input:focus, select:focus { outline: 2px solid #496251; outline-offset: 1px; }
        .errors { margin-bottom: 18px; padding: 12px 14px; background: #f8e9e5; color: #8b2922; }
        .hint { margin: -12px 0 18px; color: #746b62; font-size: 13px; }
        .actions { display: flex; gap: 10px; margin-top: 4px; }
        .button { display: inline-block; padding: 11px 15px; border: 1px solid #6c2924; background: #6c2924; color: #fff; font: 700 14px 'DM Sans', 'Segoe UI', sans-serif; cursor: pointer; }
        .button.secondary { background: transparent; color: #6c2924; border-color: #b9afa2; }
        @media (max-width: 620px) { .topbar { padding: 14px 20px; } main { margin: 32px auto; } h1 { font-size: 29px; } .form-panel { padding: 20px; } }
    </style>
</head>
<body>
    <header class="topbar">
        <a class="brand" href="{{ route('owner.dashboard') }}">Modern Bakery</a>
        <form method="POST" action="{{ route('logout') }}">
            @csrf
            <button class="logout" type="submit">Keluar</button>
        </form>
    </header>
    <main>
        <div class="eyebrow">Owner · Pengaturan akses</div>
        <h1>{{ isset($user) ? 'Edit pengguna' : 'Tambah pengguna' }}</h1>
        <p class="intro">Akun yang dibuat di sini hanya dapat memiliki role admin atau kasir.</p>
        <form class="form-panel" method="POST" action="{{ isset($user) ? route('owner.users.update', $user) : route('owner.users.store') }}">
            @csrf
            @if (isset($user))
                @method('PUT')
            @endif
            @if ($errors->any())
                <div class="errors" role="alert">
                    <ul style="margin: 0; padding-left: 18px;">
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif
            <label for="nama">Nama</label>
            <input id="nama" name="nama" type="text" value="{{ old('nama', $user->nama ?? '') }}" maxlength="255" required autofocus>

            <label for="username">Username</label>
            <input id="username" name="username" type="text" value="{{ old('username', $user->username ?? '') }}" maxlength="255" autocomplete="username" required>

            <label for="role">Role</label>
            <select id="role" name="role" required>
                <option value="admin" @selected(old('role', $user->role ?? '') === 'admin')>Admin</option>
                <option value="kasir" @selected(old('role', $user->role ?? '') === 'kasir')>Kasir</option>
            </select>

            <label for="password">{{ isset($user) ? 'Password baru' : 'Password' }}</label>
            <input id="password" name="password" type="password" minlength="8" autocomplete="new-password" {{ isset($user) ? '' : 'required' }}>
            @if (isset($user))
                <p class="hint">Biarkan kosong jika password tidak ingin diubah.</p>
            @endif

            <label for="password_confirmation">Konfirmasi password</label>
            <input id="password_confirmation" name="password_confirmation" type="password" minlength="8" autocomplete="new-password" {{ isset($user) ? '' : 'required' }}>

            <div class="actions">
                <button class="button" type="submit">{{ isset($user) ? 'Simpan perubahan' : 'Buat akun' }}</button>
                <a class="button secondary" href="{{ route('owner.users') }}">Batal</a>
            </div>
        </form>
    </main>
</body>
</html>