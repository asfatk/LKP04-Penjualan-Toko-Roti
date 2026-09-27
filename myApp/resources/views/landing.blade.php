<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>Modern Bakery | Sistem Kasir</title>

    <!-- Google Font -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=DM+Sans:wght@400;500;600;700&family=Playfair+Display:wght@600;700;800&display=swap" rel="stylesheet">

    <!-- Font Awesome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.2/css/all.min.css">

    <style>
        :root {
            --red-dark: #65151b;
            --red: #8f2028;
            --red-light: #b9383e;
            --gold: #e2ad42;
            --gold-light: #f4d27b;
            --cream: #fffaf0;
            --cream-dark: #f7efdf;
            --text: #2e211c;
            --muted: #75665e;
            --white: #ffffff;
            --shadow: 0 20px 50px rgba(72, 25, 18, .12);
        }

        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
            scroll-behavior: smooth;
        }

        body {
            font-family: 'DM Sans', sans-serif;
            background: var(--cream);
            color: var(--text);
            line-height: 1.6;
        }

        a {
            text-decoration: none;
            color: inherit;
        }

        .container {
            width: min(1180px, 90%);
            margin: auto;
        }

        /* ================= NAVBAR ================= */

        .navbar {
            position: fixed;
            top: 0;
            left: 0;
            width: 100%;
            z-index: 1000;
            background: rgba(255, 250, 240, .94);
            backdrop-filter: blur(12px);
            border-bottom: 1px solid rgba(143, 32, 40, .08);
        }

        .nav-wrapper {
            height: 78px;
            display: flex;
            align-items: center;
            justify-content: space-between;
        }

        .logo {
            display: flex;
            align-items: center;
            gap: 12px;
        }

        .logo-icon {
            width: 43px;
            height: 43px;
            border-radius: 13px;
            background: var(--red);
            color: var(--gold-light);
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 20px;
            box-shadow: 0 8px 20px rgba(101, 21, 27, .25);
        }

        .logo-text {
            font-family: 'Playfair Display', serif;
            font-size: 21px;
            font-weight: 800;
            color: var(--red-dark);
            letter-spacing: .5px;
        }

        .logo-text span {
            color: var(--gold);
        }

        .nav-menu {
            display: flex;
            align-items: center;
            gap: 35px;
        }

        .nav-menu a {
            font-size: 14px;
            font-weight: 600;
            color: #594b44;
            transition: .3s;
        }

        .nav-menu a:hover {
            color: var(--red);
        }

        .nav-login {
            background: var(--red);
            color: white !important;
            padding: 11px 20px;
            border-radius: 10px;
            box-shadow: 0 7px 18px rgba(101, 21, 27, .18);
        }

        .nav-login:hover {
            background: var(--red-dark);
            transform: translateY(-2px);
        }

        /* ================= HERO ================= */

        .hero {
            min-height: 100vh;
            padding-top: 130px;
            display: flex;
            align-items: center;
            position: relative;
            overflow: hidden;
        }

        .hero::before {
            content: "";
            position: absolute;
            width: 500px;
            height: 500px;
            background: rgba(226, 173, 66, .10);
            border-radius: 50%;
            top: -170px;
            right: -120px;
        }

        .hero::after {
            content: "";
            position: absolute;
            width: 280px;
            height: 280px;
            background: rgba(143, 32, 40, .06);
            border-radius: 50%;
            bottom: -100px;
            left: -80px;
        }

        .hero-grid {
            display: grid;
            grid-template-columns: 1.05fr .95fr;
            align-items: center;
            gap: 70px;
            position: relative;
            z-index: 2;
        }

        .eyebrow {
            display: inline-flex;
            align-items: center;
            gap: 8px;
            padding: 8px 14px;
            border-radius: 50px;
            background: #f8e8bd;
            color: var(--red-dark);
            font-size: 12px;
            font-weight: 700;
            margin-bottom: 20px;
        }

        .eyebrow i {
            color: var(--gold);
        }

        .hero h1 {
            font-family: 'Playfair Display', serif;
            font-size: clamp(44px, 5vw, 72px);
            line-height: 1.08;
            color: var(--red-dark);
            margin-bottom: 22px;
        }

        .hero h1 span {
            color: var(--gold);
        }

        .hero-description {
            max-width: 570px;
            color: var(--muted);
            font-size: 16px;
            margin-bottom: 32px;
        }

        .hero-buttons {
            display: flex;
            gap: 14px;
            flex-wrap: wrap;
        }

        .btn {
            display: inline-flex;
            align-items: center;
            gap: 10px;
            padding: 14px 22px;
            border-radius: 11px;
            font-weight: 700;
            font-size: 14px;
            transition: .3s;
        }

        .btn-primary {
            background: var(--red);
            color: white;
            box-shadow: 0 10px 25px rgba(101, 21, 27, .22);
        }

        .btn-primary:hover {
            background: var(--red-dark);
            transform: translateY(-3px);
        }

        .btn-outline {
            border: 1px solid #d7c8b7;
            color: var(--red-dark);
            background: white;
        }

        .btn-outline:hover {
            border-color: var(--gold);
            transform: translateY(-3px);
        }

        .hero-features {
            display: flex;
            gap: 30px;
            margin-top: 34px;
        }

        .mini-feature {
            display: flex;
            align-items: center;
            gap: 9px;
            font-size: 12px;
            color: var(--muted);
        }

        .mini-feature i {
            color: var(--gold);
            font-size: 15px;
        }

        /* HERO VISUAL */

        .hero-visual {
            position: relative;
            height: 520px;
        }

        .bakery-card {
            position: absolute;
            inset: 30px 0 30px 50px;
            border-radius: 35px;
            background: linear-gradient(145deg, var(--red), var(--red-dark));
            overflow: hidden;
            box-shadow: 0 30px 60px rgba(101, 21, 27, .25);
        }

        .bakery-card::before {
            content: "";
            position: absolute;
            width: 330px;
            height: 330px;
            border: 1px solid rgba(244, 210, 123, .35);
            border-radius: 50%;
            top: -90px;
            right: -100px;
        }

        .bakery-card::after {
            content: "";
            position: absolute;
            width: 220px;
            height: 220px;
            border: 1px solid rgba(244, 210, 123, .2);
            border-radius: 50%;
            bottom: -100px;
            left: -70px;
        }

        .bread-display {
            position: absolute;
            top: 85px;
            left: 50%;
            transform: translateX(-50%);
            width: 230px;
            height: 230px;
            border-radius: 50%;
            background: #f8d992;
            display: flex;
            align-items: center;
            justify-content: center;
            color: var(--red);
            font-size: 105px;
            box-shadow:
                0 0 0 14px rgba(244, 210, 123, .12),
                0 20px 50px rgba(0,0,0,.2);
        }

        .hero-card-text {
            position: absolute;
            bottom: 40px;
            left: 40px;
            color: white;
        }

        .hero-card-text small {
            color: var(--gold-light);
            font-weight: 600;
        }

        .hero-card-text h3 {
            font-family: 'Playfair Display', serif;
            font-size: 29px;
            margin-top: 3px;
        }

        .floating-card {
            position: absolute;
            background: white;
            border-radius: 16px;
            padding: 15px 18px;
            box-shadow: var(--shadow);
            display: flex;
            align-items: center;
            gap: 12px;
        }

        .floating-card i {
            width: 42px;
            height: 42px;
            border-radius: 12px;
            display: flex;
            align-items: center;
            justify-content: center;
            background: #fff2cc;
            color: var(--red);
        }

        .floating-card strong {
            display: block;
            font-size: 13px;
            color: var(--text);
        }

        .floating-card span {
            font-size: 11px;
            color: var(--muted);
        }

        .sales-card {
            top: 45px;
            right: -20px;
        }

        .stock-card {
            bottom: 65px;
            left: -5px;
        }

        /* ================= STATS ================= */

        .stats {
            background: var(--red-dark);
            color: white;
            padding: 28px 0;
        }

        .stats-grid {
            display: grid;
            grid-template-columns: repeat(4, 1fr);
            text-align: center;
        }

        .stat {
            border-right: 1px solid rgba(255,255,255,.13);
        }

        .stat:last-child {
            border-right: none;
        }

        .stat h3 {
            font-family: 'Playfair Display', serif;
            font-size: 28px;
            color: var(--gold-light);
        }

        .stat p {
            font-size: 12px;
            opacity: .75;
        }

        /* ================= SECTION ================= */

        .section {
            padding: 100px 0;
        }

        .section-heading {
            text-align: center;
            max-width: 650px;
            margin: 0 auto 50px;
        }

        .section-label {
            color: var(--red);
            font-size: 12px;
            font-weight: 800;
            letter-spacing: 2px;
            margin-bottom: 10px;
        }

        .section-heading h2 {
            font-family: 'Playfair Display', serif;
            font-size: clamp(32px, 4vw, 46px);
            line-height: 1.2;
            color: var(--red-dark);
            margin-bottom: 15px;
        }

        .section-heading p {
            color: var(--muted);
            font-size: 14px;
        }

        /* ================= PRODUCTS ================= */

        .products {
            background: #fffdf8;
        }

        .product-grid {
            display: grid;
            grid-template-columns: repeat(3, 1fr);
            gap: 24px;
        }

        .product-card {
            background: white;
            border: 1px solid #eee2d4;
            border-radius: 22px;
            padding: 14px;
            transition: .3s;
            position: relative;
        }

        .product-card:hover {
            transform: translateY(-8px);
            box-shadow: var(--shadow);
        }

        .product-image {
            height: 220px;
            border-radius: 16px;
            background: linear-gradient(145deg, #fff0c9, #f8d996);
            display: flex;
            align-items: center;
            justify-content: center;
            color: var(--red);
            font-size: 80px;
            position: relative;
        }

        .product-badge {
            position: absolute;
            top: 12px;
            left: 12px;
            background: var(--red);
            color: white;
            font-size: 10px;
            padding: 6px 10px;
            border-radius: 30px;
            font-weight: 700;
        }

        .product-info {
            padding: 18px 8px 8px;
        }

        .product-info h3 {
            font-family: 'Playfair Display', serif;
            color: var(--red-dark);
            font-size: 21px;
            margin-bottom: 6px;
        }

        .product-info p {
            color: var(--muted);
            font-size: 13px;
            margin-bottom: 15px;
        }

        .product-bottom {
            display: flex;
            justify-content: space-between;
            align-items: center;
        }

        .price {
            color: var(--red);
            font-weight: 800;
            font-size: 17px;
        }

        .product-arrow {
            width: 35px;
            height: 35px;
            border-radius: 10px;
            background: #fff4d7;
            color: var(--red);
            display: flex;
            justify-content: center;
            align-items: center;
        }

        /* ================= FEATURES ================= */

        .feature-grid {
            display: grid;
            grid-template-columns: repeat(4, 1fr);
            gap: 20px;
        }

        .feature-card {
            padding: 28px 22px;
            background: white;
            border-radius: 20px;
            border: 1px solid #eee2d4;
            transition: .3s;
        }

        .feature-card:hover {
            transform: translateY(-6px);
            border-color: #e7c875;
            box-shadow: var(--shadow);
        }

        .feature-icon {
            width: 52px;
            height: 52px;
            border-radius: 15px;
            background: #fff1cc;
            color: var(--red);
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 20px;
            margin-bottom: 20px;
        }

        .feature-card h3 {
            color: var(--red-dark);
            font-size: 16px;
            margin-bottom: 9px;
        }

        .feature-card p {
            color: var(--muted);
            font-size: 12px;
        }

        /* ================= ABOUT ================= */

        .about {
            background: var(--cream-dark);
        }

        .about-grid {
            display: grid;
            grid-template-columns: .9fr 1.1fr;
            gap: 70px;
            align-items: center;
        }

        .about-visual {
            height: 390px;
            border-radius: 30px;
            background: linear-gradient(145deg, var(--red), var(--red-dark));
            display: flex;
            align-items: center;
            justify-content: center;
            position: relative;
            overflow: hidden;
        }

        .about-visual::before {
            content: "";
            width: 280px;
            height: 280px;
            border: 1px solid rgba(244,210,123,.4);
            border-radius: 50%;
            position: absolute;
        }

        .about-visual i {
            font-size: 100px;
            color: var(--gold-light);
            position: relative;
        }

        .about-content .section-label {
            text-align: left;
        }

        .about-content h2 {
            font-family: 'Playfair Display', serif;
            color: var(--red-dark);
            font-size: 42px;
            line-height: 1.2;
            margin-bottom: 18px;
        }

        .about-content > p {
            color: var(--muted);
            font-size: 14px;
            margin-bottom: 22px;
        }

        .check-list {
            display: grid;
            gap: 12px;
            margin-bottom: 25px;
        }

        .check-item {
            display: flex;
            align-items: center;
            gap: 10px;
            font-size: 13px;
            color: #5f5149;
        }

        .check-item i {
            color: var(--gold);
        }

        /* ================= CTA ================= */

        .cta {
            padding: 85px 0;
        }

        .cta-box {
            background: linear-gradient(120deg, var(--red-dark), var(--red));
            border-radius: 30px;
            padding: 65px;
            text-align: center;
            color: white;
            position: relative;
            overflow: hidden;
        }

        .cta-box::before {
            content: "";
            position: absolute;
            width: 260px;
            height: 260px;
            border: 1px solid rgba(244,210,123,.25);
            border-radius: 50%;
            top: -120px;
            left: -80px;
        }

        .cta-box::after {
            content: "";
            position: absolute;
            width: 350px;
            height: 350px;
            border: 1px solid rgba(244,210,123,.18);
            border-radius: 50%;
            right: -150px;
            bottom: -180px;
        }

        .cta-box h2 {
            position: relative;
            z-index: 1;
            font-family: 'Playfair Display', serif;
            font-size: 40px;
            margin-bottom: 12px;
        }

        .cta-box p {
            position: relative;
            z-index: 1;
            opacity: .8;
            font-size: 14px;
            margin-bottom: 25px;
        }

        .cta-box .btn {
            position: relative;
            z-index: 1;
            background: var(--gold);
            color: var(--red-dark);
        }

        .cta-box .btn:hover {
            background: var(--gold-light);
            transform: translateY(-3px);
        }

        /* ================= FOOTER ================= */

        footer {
            background: #321316;
            color: white;
            padding: 55px 0 25px;
        }

        .footer-grid {
            display: grid;
            grid-template-columns: 1.5fr 1fr 1fr;
            gap: 60px;
            padding-bottom: 40px;
        }

        .footer-logo {
            font-family: 'Playfair Display', serif;
            font-size: 24px;
            color: white;
            margin-bottom: 12px;
        }

        .footer-logo span {
            color: var(--gold);
        }

        .footer-about {
            color: rgba(255,255,255,.6);
            font-size: 13px;
            max-width: 330px;
        }

        footer h4 {
            color: var(--gold-light);
            font-size: 14px;
            margin-bottom: 15px;
        }

        .footer-links {
            display: grid;
            gap: 9px;
        }

        .footer-links a {
            color: rgba(255,255,255,.6);
            font-size: 13px;
            transition: .3s;
        }

        .footer-links a:hover {
            color: var(--gold-light);
        }

        .footer-bottom {
            padding-top: 20px;
            border-top: 1px solid rgba(255,255,255,.1);
            color: rgba(255,255,255,.45);
            font-size: 11px;
            text-align: center;
        }

        /* ================= RESPONSIVE ================= */

        @media (max-width: 900px) {
            .hero-grid,
            .about-grid {
                grid-template-columns: 1fr;
            }

            .hero {
                padding-top: 120px;
            }

            .hero-visual {
                height: 460px;
            }

            .product-grid {
                grid-template-columns: repeat(2, 1fr);
            }

            .feature-grid {
                grid-template-columns: repeat(2, 1fr);
            }

            .stats-grid {
                grid-template-columns: repeat(2, 1fr);
                gap: 20px;
            }

            .stat:nth-child(2) {
                border-right: none;
            }

            .footer-grid {
                grid-template-columns: 1fr 1fr;
            }
        }

        @media (max-width: 600px) {
            .nav-menu {
                display: none;
            }

            .hero h1 {
                font-size: 43px;
            }

            .hero-features {
                flex-direction: column;
                gap: 12px;
            }

            .hero-visual {
                height: 390px;
            }

            .bakery-card {
                inset: 20px 0 20px 15px;
            }

            .bread-display {
                width: 170px;
                height: 170px;
                font-size: 75px;
            }

            .sales-card {
                right: -5px;
            }

            .stock-card {
                left: 0;
                bottom: 35px;
            }

            .product-grid,
            .feature-grid,
            .footer-grid {
                grid-template-columns: 1fr;
            }

            .section {
                padding: 75px 0;
            }

            .cta-box {
                padding: 45px 25px;
            }

            .cta-box h2 {
                font-size: 30px;
            }
        }
    </style>
</head>

<body>

    <!-- NAVBAR -->
    <header class="navbar">
        <div class="container nav-wrapper">

            <a href="#home" class="logo">
                <div class="logo-icon">
                    <i class="fa-solid fa-bread-slice"></i>
                </div>

                <div class="logo-text">
                    MODERN <span>BAKERY</span>
                </div>
            </a>

            <nav class="nav-menu">
                <a href="#home">Beranda</a>
                <a href="#produk">Produk</a>
                <a href="#fitur">Fitur</a>
                <a href="#tentang">Tentang</a>
                <a href="/login" class="nav-login">
                    <i class="fa-solid fa-right-to-bracket"></i>
                    Login Kasir
                </a>
            </nav>

        </div>
    </header>


    <!-- HERO -->
    <section class="hero" id="home">
        <div class="container hero-grid">

            <div class="hero-content">

                <div class="eyebrow">
                    <i class="fa-solid fa-star"></i>
                    SISTEM KASIR MODERN BAKERY
                </div>

                <h1>
                    Kelola Toko Roti
                    <span>Lebih Mudah.</span>
                </h1>

                <p class="hero-description">
                    Sistem kasir modern yang membantu MODERN BAKERY
                    mengelola transaksi, produk, stok, dan laporan penjualan
                    secara lebih cepat dan terorganisir.
                </p>

                <div class="hero-buttons">
                    <a href="/login" class="btn btn-primary">
                        Mulai Transaksi
                        <i class="fa-solid fa-arrow-right"></i>
                    </a>

                    <a href="#fitur" class="btn btn-outline">
                        Lihat Fitur
                    </a>
                </div>

                <div class="hero-features">

                    <div class="mini-feature">
                        <i class="fa-solid fa-circle-check"></i>
                        Mudah digunakan
                    </div>

                    <div class="mini-feature">
                        <i class="fa-solid fa-bolt"></i>
                        Transaksi cepat
                    </div>

                    <div class="mini-feature">
                        <i class="fa-solid fa-shield-halved"></i>
                        Data terorganisir
                    </div>

                </div>

            </div>


            <!-- HERO VISUAL -->
            <div class="hero-visual">

                <div class="bakery-card">

                    <div class="bread-display">
                        <i class="fa-solid fa-bread-slice"></i>
                    </div>

                    <div class="hero-card-text">
                        <small>FRESH EVERY DAY</small>
                        <h3>Modern Bakery</h3>
                    </div>

                </div>

                <div class="floating-card sales-card">
                    <i class="fa-solid fa-chart-line"></i>

                    <div>
                        <strong>Penjualan</strong>
                        <span>Lebih terkontrol</span>
                    </div>
                </div>

                <div class="floating-card stock-card">
                    <i class="fa-solid fa-boxes-stacked"></i>

                    <div>
                        <strong>Stok Produk</strong>
                        <span>Monitoring lebih mudah</span>
                    </div>
                </div>

            </div>

        </div>
    </section>


    <!-- STATS -->
    <section class="stats">

        <div class="container stats-grid">

            <div class="stat">
                <h3>50+</h3>
                <p>Produk Bakery</p>
            </div>

            <div class="stat">
                <h3>100+</h3>
                <p>Transaksi</p>
            </div>

            <div class="stat">
                <h3>Real-time</h3>
                <p>Monitoring Stok</p>
            </div>

            <div class="stat">
                <h3>24/7</h3>
                <p>Siap Digunakan</p>
            </div>

        </div>

    </section>


    <!-- PRODUCTS -->
    <section class="section products" id="produk">

        <div class="container">

            <div class="section-heading">

                <div class="section-label">
                    PRODUK UNGGULAN
                </div>

                <h2>
                    Roti Favorit Pelanggan
                </h2>

                <p>
                    Berbagai pilihan produk bakery dengan cita rasa
                    terbaik dari MODERN BAKERY.
                </p>

            </div>


            <div class="product-grid">

                <div class="product-card">

                    <div class="product-image">

                        <span class="product-badge">
                            BEST SELLER
                        </span>

                        <i class="fa-solid fa-bread-slice"></i>

                    </div>

                    <div class="product-info">

                        <h3>Roti Manis</h3>

                        <p>
                            Roti lembut dengan rasa manis
                            yang pas untuk menemani hari.
                        </p>

                        <div class="product-bottom">

                            <div class="price">
                                Rp8.000
                            </div>

                            <div class="product-arrow">
                                <i class="fa-solid fa-arrow-right"></i>
                            </div>

                        </div>

                    </div>

                </div>


                <div class="product-card">

                    <div class="product-image">

                        <span class="product-badge">
                            FAVORIT
                        </span>

                        <i class="fa-solid fa-cookie-bite"></i>

                    </div>

                    <div class="product-info">

                        <h3>Croissant</h3>

                        <p>
                            Croissant renyah dengan aroma
                            butter yang menggugah selera.
                        </p>

                        <div class="product-bottom">

                            <div class="price">
                                Rp12.000
                            </div>

                            <div class="product-arrow">
                                <i class="fa-solid fa-arrow-right"></i>
                            </div>

                        </div>

                    </div>

                </div>


                <div class="product-card">

                    <div class="product-image">

                        <i class="fa-solid fa-cake-candles"></i>

                    </div>

                    <div class="product-info">

                        <h3>Mini Cake</h3>

                        <p>
                            Kue lembut dan cantik untuk
                            berbagai momen spesial.
                        </p>

                        <div class="product-bottom">

                            <div class="price">
                                Rp18.000
                            </div>

                            <div class="product-arrow">
                                <i class="fa-solid fa-arrow-right"></i>
                            </div>

                        </div>

                    </div>

                </div>

            </div>

        </div>

    </section>


    <!-- FEATURES -->
    <section class="section" id="fitur">

        <div class="container">

            <div class="section-heading">

                <div class="section-label">
                    FITUR SISTEM
                </div>

                <h2>
                    Semua yang Dibutuhkan
                    dalam Satu Sistem
                </h2>

                <p>
                    Membantu aktivitas kasir dan pengelolaan toko
                    menjadi lebih praktis, cepat, dan terorganisir.
                </p>

            </div>


            <div class="feature-grid">

                <div class="feature-card">

                    <div class="feature-icon">
                        <i class="fa-solid fa-cash-register"></i>
                    </div>

                    <h3>Transaksi Penjualan</h3>

                    <p>
                        Catat transaksi pelanggan dengan
                        cepat dan praktis melalui sistem kasir.
                    </p>

                </div>


                <div class="feature-card">

                    <div class="feature-icon">
                        <i class="fa-solid fa-box-open"></i>
                    </div>

                    <h3>Manajemen Produk</h3>

                    <p>
                        Kelola data produk, harga, kategori,
                        dan stok dengan lebih mudah.
                    </p>

                </div>


                <div class="feature-card">

                    <div class="feature-icon">
                        <i class="fa-solid fa-chart-column"></i>
                    </div>

                    <h3>Laporan Penjualan</h3>

                    <p>
                        Pantau hasil penjualan dan perkembangan
                        toko melalui laporan yang terstruktur.
                    </p>

                </div>


                <div class="feature-card">

                    <div class="feature-icon">
                        <i class="fa-solid fa-boxes-stacked"></i>
                    </div>

                    <h3>Kontrol Stok</h3>

                    <p>
                        Ketahui jumlah stok produk agar
                        persediaan tetap terkontrol.
                    </p>

                </div>

            </div>

        </div>

    </section>


    <!-- ABOUT -->
    <section class="section about" id="tentang">

        <div class="container about-grid">

            <div class="about-visual">

                <i class="fa-solid fa-bread-slice"></i>

            </div>


            <div class="about-content">

                <div class="section-label">
                    TENTANG MODERN BAKERY
                </div>

                <h2>
                    Rasa Lezat,
                    Pelayanan Hebat.
                </h2>

                <p>
                    MODERN BAKERY merupakan toko roti yang
                    menghadirkan berbagai pilihan roti dan produk
                    bakery untuk memenuhi kebutuhan pelanggan.
                </p>

                <p>
                    Dengan adanya sistem kasir ini, proses transaksi
                    dan pengelolaan data toko dapat dilakukan dengan
                    lebih cepat, mudah, dan terorganisir.
                </p>


                <div class="check-list">

                    <div class="check-item">
                        <i class="fa-solid fa-circle-check"></i>
                        Transaksi lebih cepat
                    </div>

                    <div class="check-item">
                        <i class="fa-solid fa-circle-check"></i>
                        Pengelolaan produk lebih mudah
                    </div>

                    <div class="check-item">
                        <i class="fa-solid fa-circle-check"></i>
                        Data penjualan lebih terorganisir
                    </div>

                </div>

                <a href="/login" class="btn btn-primary">
                    Masuk ke Sistem
                    <i class="fa-solid fa-arrow-right"></i>
                </a>

            </div>

        </div>

    </section>


    <!-- CTA -->
    <section class="cta">

        <div class="container">

            <div class="cta-box">

                <h2>
                    Siap Mengelola Toko
                    dengan Lebih Mudah?
                </h2>

                <p>
                    Gunakan sistem kasir MODERN BAKERY
                    untuk membuat proses transaksi lebih praktis.
                </p>

                <a href="/login" class="btn">
                    Mulai Sekarang
                    <i class="fa-solid fa-arrow-right"></i>
                </a>

            </div>

        </div>

    </section>


    <!-- FOOTER -->
    <footer>

        <div class="container">

            <div class="footer-grid">

                <div>

                    <div class="footer-logo">
                        MODERN <span>BAKERY</span>
                    </div>

                    <p class="footer-about">
                        Sistem kasir modern untuk membantu
                        pengelolaan toko roti menjadi lebih mudah,
                        cepat, dan terorganisir.
                    </p>

                </div>


                <div>

                    <h4>Navigasi</h4>

                    <div class="footer-links">
                        <a href="#home">Beranda</a>
                        <a href="#produk">Produk</a>
                        <a href="#fitur">Fitur</a>
                        <a href="#tentang">Tentang</a>
                    </div>

                </div>


                <div>

                    <h4>Kontak</h4>

                    <div class="footer-links">
                        <a href="#">
                            <i class="fa-solid fa-location-dot"></i>
                            Menganti, Gresik
                        </a>

                        <a href="#">
                            <i class="fa-solid fa-phone"></i>
                            08xx-xxxx-xxxx
                        </a>

                        <a href="#">
                            <i class="fa-solid fa-envelope"></i>
                            modernbakery@gmail.com
                        </a>
                    </div>

                </div>

            </div>


            <div class="footer-bottom">
                © 2026 MODERN BAKERY. All Rights Reserved.
            </div>

        </div>

    </footer>

</body>
</html>