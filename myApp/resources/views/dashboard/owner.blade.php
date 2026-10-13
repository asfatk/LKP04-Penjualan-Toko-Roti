<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>Dashboard Owner - Modern Bakery</title>

    <style>
        * {
            box-sizing: border-box;
        }

        body {
            margin: 0;
            font-family: Arial, Helvetica, sans-serif;
            background: #f7f4ee;
            color: #3b2721;
        }

        /* NAVBAR */
        .navbar {
            background: #ffffff;
            border-bottom: 1px solid #ddd6cc;
            padding: 22px 55px;
            display: flex;
            justify-content: space-between;
            align-items: center;
        }

        .brand {
            font-family: Georgia, serif;
            font-size: 28px;
            font-weight: bold;
            color: #7d3028;
        }

        .user-area {
            display: flex;
            align-items: center;
            gap: 20px;
            font-size: 16px;
        }

        .role-badge {
            background: #f1e9dd;
            color: #7d3028;
            padding: 7px 12px;
            border-radius: 20px;
            font-size: 13px;
            font-weight: bold;
        }

        .logout-button {
            border: 1px solid #ddd;
            background: white;
            padding: 10px 18px;
            border-radius: 7px;
            cursor: pointer;
            font-size: 15px;
        }

        .logout-button:hover {
            background: #f5f2ed;
        }

        /* CONTAINER */
        .container {
            width: 90%;
            max-width: 1250px;
            margin: 55px auto;
        }

        /* WELCOME */
        .welcome {
            margin-bottom: 35px;
        }

        .welcome-label {
            color: #315b5e;
            font-size: 16px;
            font-weight: bold;
            letter-spacing: 1px;
            margin-bottom: 15px;
        }

        .welcome h1 {
            margin: 0;
            font-family: Georgia, serif;
            font-size: 42px;
        }

        .welcome p {
            margin-top: 15px;
            color: #756861;
            font-size: 18px;
            line-height: 1.6;
        }

        /* MENU */
        .menu-grid {
            display: grid;
            grid-template-columns: repeat(3, minmax(0, 1fr));
            gap: 25px;
        }

        .menu-card {
            background: white;
            border: 1px solid #e2ddd5;
            border-radius: 12px;
            padding: 30px;
            min-height: 280px;
            display: flex;
            flex-direction: column;
            justify-content: space-between;
            box-shadow: 0 2px 8px rgba(0, 0, 0, 0.03);
        }

        .menu-icon {
            font-size: 38px;
            margin-bottom: 12px;
        }

        .menu-card h2 {
            margin: 0 0 15px;
            font-family: Georgia, serif;
            font-size: 29px;
        }

        .menu-card p {
            margin: 0;
            color: #756861;
            font-size: 16px;
            line-height: 1.7;
        }

        .menu-button {
            display: inline-block;
            width: fit-content;
            margin-top: 25px;
            background: #7d3028;
            color: white;
            text-decoration: none;
            padding: 13px 20px;
            border-radius: 7px;
            font-weight: bold;
            transition: background 0.2s;
        }

        .menu-button:hover {
            background: #64251f;
        }

        /* INFORMATION */
        .info-box {
            margin-top: 30px;
            background: white;
            border: 1px solid #e2ddd5;
            border-radius: 12px;
            padding: 25px 30px;
            box-shadow: 0 2px 8px rgba(0, 0, 0, 0.03);
        }

        .info-box h3 {
            margin-top: 0;
            font-family: Georgia, serif;
            font-size: 24px;
        }

        .info-box p {
            margin-bottom: 0;
            color: #756861;
            line-height: 1.7;
        }

        /* RESPONSIVE */
        @media (max-width: 950px) {
            .menu-grid {
                grid-template-columns: repeat(2, minmax(0, 1fr));
            }
        }

        @media (max-width: 650px) {
            .navbar {
                padding: 18px 20px;
                gap: 15px;
                flex-wrap: wrap;
            }

            .brand {
                font-size: 24px;
            }

            .user-area {
                gap: 10px;
            }

            .container {
                width: 95%;
                margin: 35px auto;
            }

            .welcome h1 {
                font-size: 32px;
            }

            .menu-grid {
                grid-template-columns: 1fr;
            }

            .user-area span.user-name {
                display: none;
            }
        }
    </style>
</head>

<body>

    <!-- NAVBAR -->
    <div class="navbar">
        <div class="brand">
            Modern Bakery
        </div>

        <div class="user-area">
            <span class="user-name">
                {{ auth()->user()->nama }}
            </span>

            <span class="role-badge">
                Owner
            </span>

            <form action="{{ route('logout') }}" method="POST">
                @csrf

                <button type="submit" class="logout-button">
                    Keluar
                </button>
            </form>
        </div>
    </div>

    <!-- CONTENT -->
    <div class="container">

        <div class="welcome">
            <div class="welcome-label">
                RUANG KERJA · OWNER
            </div>

            <h1>
                Selamat datang, {{ auth()->user()->nama }}
            </h1>

            <p>
                Selamat datang di Sistem Informasi Kasir Modern Bakery.
                Silakan pilih menu yang ingin digunakan untuk mengelola
                dan memantau kegiatan toko.
            </p>
        </div>

        <!-- MENU OWNER -->
        <div class="menu-grid">

            <!-- LAPORAN PENJUALAN -->
            <div class="menu-card">
                <div>
                    <div class="menu-icon">📊</div>

                    <h2>Laporan Penjualan</h2>

                    <p>
                        Melihat informasi penjualan toko,
                        jumlah transaksi, total penjualan,
                        produk terjual, dan hasil penjualan
                        berdasarkan periode.
                    </p>
                </div>

                <a href="{{ route('owner.reports') }}" class="menu-button">
                    Lihat Laporan →
                </a>
            </div>

            <!-- KELOLA PENGGUNA -->
            <div class="menu-card">
                <div>
                    <div class="menu-icon">👥</div>

                    <h2>Kelola Pengguna</h2>

                    <p>
                        Mengelola akun pengguna yang dapat
                        menggunakan sistem, seperti Admin/Kasir.
                    </p>
                </div>

                <a href="{{ route('owner.users') }}" class="menu-button">
                    Kelola Pengguna →
                </a>
            </div>

            <!-- PROFIL TOKO -->
            <div class="menu-card">
                <div>
                    <div class="menu-icon">🏪</div>

                    <h2>Profil Toko</h2>

                    <p>
                        Melihat dan mengelola informasi
                        Modern Bakery seperti nama toko,
                        alamat, dan nomor telepon.
                    </p>
                </div>

                <a href="{{ route('owner.profile') }}" class="menu-button">
                    Profil Toko →
                </a>
            </div>

        </div>

        <!-- INFORMASI OWNER -->
        <div class="info-box">
            <h3>Informasi</h3>

            <p>
                Sebagai Owner, Anda dapat memantau kegiatan
                penjualan, mengelola pengguna, dan memperbarui
                informasi toko. Fitur transaksi kasir dan
                pengelolaan produk digunakan oleh Admin/Kasir.
            </p>
        </div>

    </div>

</body>
</html>
