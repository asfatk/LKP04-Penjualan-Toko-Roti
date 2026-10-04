<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Manajemen Pengguna - Modern Bakery</title>
    <style>
        :root { font-family: 'DM Sans', 'Segoe UI', sans-serif; color: #28231f; background: #f5f3ed; }
        * { box-sizing: border-box; }
        body { margin: 0; min-height: 100vh; background: radial-gradient(ellipse at 90% 0%, #e9dfc9 0, transparent 38%), #f5f3ed; }
        a { color: inherit; text-decoration: none; }
        .topbar { min-height: 72px; display: flex; align-items: center; justify-content: space-between; gap: 20px; padding: 0 max(24px, calc((100vw - 1120px) / 2)); border-bottom: 1px solid #ded9ce; background: rgba(255,255,255,.82); }
        .brand { font-family: Georgia, serif; color: #6c2924; font-size: 20px; font-weight: 700; }
        .account, .actions { display: flex; align-items: center; gap: 12px; }
        .logout { border: 1px solid #b9afa2; background: transparent; color: #4b4139; padding: 9px 14px; font: inherit; cursor: pointer; }
        main { width: min(100% - 40px, 1120px); margin: 48px auto; }
        .eyebrow { color: #496251; text-transform: uppercase; font-size: 12px; font-weight: 700; letter-spacing: 1px; }
        h1 { margin: 8px 0 6px; font: 700 34px/1.2 Georgia, serif; color: #312721; }
        .intro { margin: 0; color: #70675e; }
        .toolbar { display: flex; align-items: center; justify-content: space-between; gap: 16px; margin: 26px 0 14px; }
        .button { display: inline-block; padding: 11px 15px; border: 0; background: #6c2924; color: #fff; font: 700 14px 'DM Sans', 'Segoe UI', sans-serif; cursor: pointer; }
        .button.secondary { background: transparent; color: #6c2924; border: 1px solid #b9afa2; }
        .notice { margin: 14px 0; padding: 12px 14px; background: #e8efe8; color: #31543d; }
        .table-wrap { overflow-x: auto; background: #fff; border: 1px solid #e4dfd4; border-radius: 6px; }
        table { width: 100%; border-collapse: collapse; min-width: 620px; text-align: left; }
        th, td { padding: 14px 16px; border-bottom: 1px solid #eeeae2; }
        th { color: #71675d; background: #faf9f6; font-size: 12px; text-transform: uppercase; letter-spacing: .5px; }
        td { font-size: 14px; }
        .role { color: #496251; font-weight: 700; text-transform: capitalize; }
        .actions form { display: inline; }
        .empty { text-align: center; color: #746b62; padding: 32px; }
        .pagination { margin-top: 18px; }
        @media (max-width: 620px) { .topbar { padding: 14px 20px; align-items: flex-start; flex-direction: column; } main { margin: 34px auto; } .toolbar { align-items: flex-start; flex-direction: column; } h1 { font-size: 29px; } }
    </style>
</head>
<body>
    <header class="topbar">
        <a class="brand" href="{{ route('owner.dashboard') }}">Modern Bakery</a>
        <div class="account">
            <span>{{ auth()->user()->nama }}</span>
            <form method="POST" action="{{ route('logout') }}">
                @csrf
                <button class="logout" type="submit">Keluar</button>
            </form>
        </div>
    </header>
    <main>
        <div class="eyebrow">Owner · Pengaturan akses</div>
        <h1>Manajemen pengguna</h1>
        <p class="intro">Kelola akun admin dan kasir toko.</p>
        <div class="toolbar">
            <a class="button secondary" href="{{ route('owner.dashboard') }}">Kembali ke dashboard</a>
            <a class="button" href="{{ route('owner.users.create') }}">Tambah pengguna</a>
        </div>
        @if (session('success'))
            <div class="notice" role="status">{{ session('success') }}</div>
        @endif
        <div class="table-wrap">
            <table>
                <thead>
                    <tr><th>Nama</th><th>Username</th><th>Role</th><th>Aksi</th></tr>
                </thead>
                <tbody>
                    @forelse ($users as $user)
                        <tr>
                            <td>{{ $user->nama }}</td>
                            <td>{{ $user->username }}</td>
                            <td class="role">{{ $user->role }}</td>
                            <td>
                                <div class="actions">
                                    <a class="button secondary" href="{{ route('owner.users.edit', $user) }}">Edit</a>
                                    <form method="POST" action="{{ route('owner.users.destroy', $user) }}" onsubmit="return confirm('Hapus akun {{ $user->username }}?')">
                                        @csrf
                                        @method('DELETE')
                                        <button class="button" type="submit">Hapus</button>
                                    </form>
                                </div>
                            </td>
                        </tr>
                    @empty
                        <tr><td class="empty" colspan="4">Belum ada akun admin atau kasir.</td></tr>
                    @endforelse
                </tbody>
            </table>
        </div>
        <div class="pagination">{{ $users->links() }}</div>
    </main>
</body>
</html>