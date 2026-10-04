<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard - Modern Bakery</title>
    <style>
        :root { font-family: 'DM Sans', 'Segoe UI', sans-serif; color: #28231f; background: #f5f3ed; }
        * { box-sizing: border-box; }
        body { margin: 0; min-height: 100vh; background: radial-gradient(ellipse at 90% 0%, #e9dfc9 0, transparent 38%), #f5f3ed; }
        a { color: inherit; text-decoration: none; }
        .topbar { min-height: 72px; display: flex; align-items: center; justify-content: space-between; gap: 20px; padding: 0 max(24px, calc((100vw - 1120px) / 2)); border-bottom: 1px solid #ded9ce; background: rgba(255,255,255,.82); }
        .brand { font-family: Georgia, serif; color: #6c2924; font-size: 20px; font-weight: 700; }
        .account { display: flex; align-items: center; gap: 16px; color: #665d55; font-size: 14px; }
        .logout { border: 1px solid #b9afa2; background: transparent; color: #4b4139; padding: 9px 14px; font: inherit; cursor: pointer; }
        main { width: min(100% - 40px, 1120px); margin: 56px auto; }
        .eyebrow { color: #496251; text-transform: uppercase; font-size: 12px; font-weight: 700; letter-spacing: 1px; }
        h1 { margin: 10px 0; font: 700 36px/1.15 Georgia, serif; color: #312721; }
        .intro { max-width: 620px; color: #70675e; line-height: 1.65; }
        .workspace { display: grid; grid-template-columns: minmax(0, 1.5fr) minmax(240px, .8fr); gap: 20px; margin-top: 34px; }
        .panel { padding: 26px; background: #fff; border: 1px solid #e4dfd4; border-radius: 6px; }
        .panel h2 { margin: 0 0 8px; font: 700 20px Georgia, serif; }
        .panel p { margin: 0; color: #746b62; line-height: 1.6; }
        .action { display: inline-block; margin-top: 22px; padding: 11px 15px; background: #6c2924; color: #fff; font-weight: 700; font-size: 14px; }
        .role-tag { display: inline-block; margin-top: 18px; padding: 6px 9px; color: #3d5947; background: #e8efe8; font-size: 12px; font-weight: 700; text-transform: uppercase; }
        @media (max-width: 680px) { .topbar { padding: 14px 20px; align-items: flex-start; flex-direction: column; } .account { width: 100%; justify-content: space-between; } main { margin: 36px auto; } h1 { font-size: 30px; } .workspace { grid-template-columns: 1fr; } }
    </style>
</head>
<body>
    @php($user = auth()->user())
    <header class="topbar">
        <a class="brand" href="{{ route('home') }}">Modern Bakery</a>
        <div class="account">
            <span>{{ $user->nama }}</span>
            <form method="POST" action="{{ route('logout') }}">
                @csrf
                <button class="logout" type="submit">Keluar</button>
            </form>
        </div>
    </header>
    <main>
        <div class="eyebrow">Ruang kerja · {{ ucfirst($user->role) }}</div>
        <h1>Selamat datang, {{ $user->nama }}</h1>
        <p class="intro">Anda masuk ke sistem Modern Bakery sebagai {{ $user->role }}. Akses menu tersedia sesuai peran akun Anda.</p>
        <div class="workspace">
            <section class="panel">
                <h2>{{ $user->role === 'owner' ? 'Pengelolaan pengguna' : 'Panel operasional' }}</h2>
                <p>{{ $user->role === 'owner' ? 'Kelola akun admin dan kasir yang memiliki akses ke sistem.' : 'Akun Anda aktif dan memiliki akses ke dashboard sesuai peran.' }}</p>
                @if ($user->role === 'owner')
                    <a class="action" href="{{ route('owner.users') }}">Buka manajemen pengguna</a>
                @else
                    <a class="action" href="{{ route('home') }}">Kembali ke beranda</a>
                @endif
            </section>
            <aside class="panel">
                <h2>Akun aktif</h2>
                <p>{{ $user->username }}</p>
                <span class="role-tag">{{ $user->role }}</span>
            </aside>
        </div>
    </main>
</body>
</html>