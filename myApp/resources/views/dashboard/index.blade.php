<!DOCTYPE html>
<html lang="id">

<head>

    <meta charset="UTF-8">

    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>Dashboard - Modern Bakery</title>


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
            background: white;
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

            grid-template-columns: repeat(3, 1fr);

            gap: 25px;
        }


        .menu-card {
            background: white;

            border: 1px solid #e2ddd5;

            border-radius: 12px;

            padding: 30px;

            min-height: 270px;

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
        }


        .menu-button:hover {
            background: #64251f;
        }



        /* RESPONSIVE */

        @media (max-width: 950px) {

            .menu-grid {
                grid-template-columns: repeat(2, 1fr);
            }

        }


        @media (max-width: 650px) {

            .navbar {
                padding: 18px 20px;
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


            .user-area span {
                display: none;
            }

        }

    </style>

</head>


<body>


    {{-- NAVBAR --}}

    <div class="navbar">

        <div class="brand">
            Modern Bakery
        </div>


        <div class="user-area">

            <span>
                {{ auth()->user()->nama }}
            </span>


            <form
                action="{{ route('logout') }}"
                method="POST"
            >

                @csrf

                <button
                    type="submit"
                    class="logout-button"
                >
                    Keluar
                </button>

            </form>

        </div>

    </div>



    {{-- CONTENT --}}

    <div class="container">


        {{-- WELCOME --}}

        <div class="welcome">

            <div class="welcome-label">
                RUANG KERJA · ADMIN KASIR
            </div>


            <h1>
                Selamat datang, {{ auth()->user()->nama }}
            </h1>


            <p>
                Sistem Informasi Kasir Modern Bakery.
                Silakan pilih menu yang ingin digunakan.
            </p>

        </div>



        {{-- MENU --}}

        <div class="menu-grid">


            {{-- DATA PRODUK --}}

            <div class="menu-card">

                <div>

                    <div class="menu-icon">
                        📦
                    </div>


                    <h2>
                        Data Produk
                    </h2>


                    <p>
                        Mengelola daftar produk bakery,
                        menambah produk baru,
                        mengedit produk,
                        dan menghapus produk.
                    </p>

                </div>


                <a
                    href="{{ route('admin.products.index') }}"
                    class="menu-button"
                >
                    Kelola Produk
                </a>

            </div>



            {{-- KASIR --}}

            <div class="menu-card">

                <div>

                    <div class="menu-icon">
                        🛒
                    </div>


                    <h2>
                        Kasir
                    </h2>


                    <p>
                        Melakukan transaksi penjualan,
                        menghitung total pembayaran,
                        menerima pembayaran,
                        dan mencetak struk.
                    </p>

                </div>


                <a
                    href="{{ route('admin.sales.create') }}"
                    class="menu-button"
                >
                    Buka Kasir
                </a>

            </div>



            {{-- RIWAYAT PENJUALAN --}}

            <div class="menu-card">

                <div>

                    <div class="menu-icon">
                        📋
                    </div>


                    <h2>
                        Riwayat Penjualan
                    </h2>


                    <p>
                        Melihat daftar transaksi
                        penjualan yang sudah dilakukan.
                    </p>

                </div>


                <a
                    href="{{ route('admin.sales.history') }}"
                    class="menu-button"
                >
                    Lihat Penjualan
                </a>

            </div>



            {{-- PROFIL --}}

            <div class="menu-card">

                <div>

                    <div class="menu-icon">
                        👤
                    </div>


                    <h2>
                        Profil
                    </h2>


                    <p>
                        Akun yang sedang digunakan
                        untuk mengoperasikan sistem.
                    </p>

                </div>


                <a
                    href="{{ route('admin.profile') }}"
                    class="menu-button"
                >
                    Profil Saya
                </a>

            </div>


        </div>

    </div>


</body>

</html>