```php
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

    <!-- Icon -->
    <link rel="stylesheet"
          href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.2/css/all.min.css">

    <!-- CSS -->
    <link rel="stylesheet" href="{{ asset('css/landing.css') }}">
</head>

<body>

<!-- ================= NAVBAR ================= -->
<header class="navbar">
    <div class="container nav-wrapper">

        <a href="#" class="logo">
            <div class="logo-icon">
                <i class="fa-solid fa-bread-slice"></i>
            </div>

            <div>
                <span>MODERN</span>
                <small>BAKERY</small>
            </div>
        </a>

        <nav class="nav-menu">
            <a href="#home">Beranda</a>
            <a href="#produk">Produk</a>
            <a href="#fitur">Fitur</a>
            <a href="#tentang">Tentang</a>
        </nav>

        <a href="#" class="btn-login">
            <i class="fa-solid fa-right-to-bracket"></i>
            Login Kasir
        </a>

        <button class="menu-toggle" id="menuToggle">
            <i class="fa-solid fa-bars"></i>
        </button>

    </div>
</header>


<!-- ================= HERO ================= -->
<section class="hero" id="home">

    <div class="container hero-content">

        <div class="hero-text">

            <span class="badge">
                <i class="fa-solid fa-star"></i>
                Sistem Kasir Modern Bakery
            </span>

            <h1>
                Kelola Toko Roti
                <span>Lebih Mudah</span>
            </h1>

            <p>
                Sistem kasir sederhana dan modern untuk membantu
                MODERN BAKERY mengelola transaksi, produk, stok,
                dan penjualan dengan lebih cepat dan teratur.
            </p>

            <div class="hero-buttons">
                <a href="#" class="btn-primary">
                    Mulai Transaksi
                    <i class="fa-solid fa-arrow-right"></i>
                </a>

                <a href="#fitur" class="btn-secondary">
                    Lihat Fitur
                </a>
            </div>

            <div class="hero-info">

                <div class="info-item">
                    <i class="fa-solid fa-circle-check"></i>
                    <div>
                        <strong>Mudah Digunakan</strong>
                        <span>Interface sederhana</span>
                    </div>
                </div>

                <div class="info-item">
                    <i class="fa-solid fa-bolt"></i>
                    <div>
                        <strong>Transaksi Cepat</strong>
                        <span>Proses lebih efisien</span>
                    </div>
                </div>

            </div>

        </div>


        <div class="hero-image">

            <div class="circle-decoration"></div>

            <div class="bread-card">
                <span class="floating-label">
                    <i class="fa-solid fa-heart"></i>
                    Fresh Every Day
                </span>

                <div class="bread-illustration">
                    <i class="fa-solid fa-bread-slice"></i>
                </div>

                <div class="bread-shadow"></div>
            </div>

            <div class="floating-card card-one">
                <i class="fa-solid fa-cart-shopping"></i>
                <div>
                    <strong>Transaksi</strong>
                    <span>Lebih cepat</span>
                </div>
            </div>

            <div class="floating-card card-two">
                <i class="fa-solid fa-chart-line"></i>
                <div>
                    <strong>Penjualan</strong>
                    <span>Lebih terkontrol</span>
                </div>
            </div>

        </div>

    </div>
</section>


<!-- ================= STATISTICS ================= -->
<section class="statistics">

    <div class="container stats-wrapper">

        <div class="stat-item">
            <div class="stat-icon">
                <i class="fa-solid fa-bread-slice"></i>
            </div>
            <div>
                <strong>50+</strong>
                <span>Produk Roti</span>
            </div>
        </div>

        <div class="stat-item">
            <div class="stat-icon">
                <i class="fa-solid fa-receipt"></i>
            </div>
            <div>
                <strong>100+</strong>
                <span>Transaksi</span>
            </div>
        </div>

        <div class="stat-item">
            <div class="stat-icon">
                <i class="fa-solid fa-box"></i>
            </div>
            <div>
                <strong>Real-time</strong>
                <span>Monitoring Stok</span>
            </div>
        </div>

        <div class="stat-item">
            <div class="stat-icon">
                <i class="fa-solid fa-clock"></i>
            </div>
            <div>
                <strong>24/7</strong>
                <span>Siap Digunakan</span>
            </div>
        </div>

    </div>

</section>


<!-- ================= PRODUK ================= -->
<section class="products section" id="produk">

    <div class="container">

        <div class="section-heading">

            <div>
                <span class="section-label">PRODUK UNGGULAN</span>

                <h2>
                    Roti Favorit
                    <span>Pelanggan</span>
                </h2>
            </div>

            <p>
                Berbagai pilihan produk terbaik dari
                MODERN BAKERY yang dibuat dengan bahan
                berkualitas.
            </p>

        </div>


        <div class="product-grid">

            <div class="product-card">

                <div class="product-image bread-bg">
                    <i class="fa-solid fa-bread-slice"></i>

                    <span class="product-tag">
                        Best Seller
                    </span>
                </div>

                <div class="product-content">
                    <h3>Roti Manis</h3>
                    <p>Roti lembut dengan rasa manis yang pas.</p>

                    <div class="product-bottom">
                        <strong>Rp8.000</strong>

                        <button>
                            <i class="fa-solid fa-plus"></i>
                        </button>
                    </div>
                </div>

            </div>


            <div class="product-card">

                <div class="product-image croissant-bg">
                    <i class="fa-solid fa-croissant"></i>

                    <span class="product-tag">
                        Favorit
                    </span>
                </div>

                <div class="product-content">
                    <h3>Croissant</h3>
                    <p>Croissant renyah dengan aroma butter.</p>

                    <div class="product-bottom">
                        <strong>Rp12.000</strong>

                        <button>
                            <i class="fa-solid fa-plus"></i>
                        </button>
                    </div>
                </div>

            </div>


            <div class="product-card">

                <div class="product-image cake-bg">
                    <i class="fa-solid fa-cake-candles"></i>
                </div>

                <div class="product-content">
                    <h3>Mini Cake</h3>
                    <p>Kue lembut cocok untuk berbagai momen.</p>

                    <div class="product-bottom">
                        <strong>Rp18.000</strong>

                        <button>
                            <i class="fa-solid fa-plus"></i>
                        </button>
                    </div>
                </div>

            </div>

        </div>

    </div>

</section>


<!-- ================= FEATURES ================= -->
<section class="features section" id="fitur">

    <div class="container">

        <div class="section-heading center">

            <span class="section-label">
                FITUR SISTEM
            </span>

            <h2>
                Semua yang Dibutuhkan
                <span>Dalam Satu Sistem</span>
            </h2>

            <p>
                Membantu aktivitas kasir dan pengelolaan toko
                menjadi lebih praktis, cepat, dan terorganisir.
            </p>

        </div>


        <div class="feature-grid">

            <div class="feature-card">

                <div class="feature-icon">
                    <i class="fa-solid fa-cart-shopping"></i>
                </div>

                <h3>Transaksi Penjualan</h3>

                <p>
                    Catat transaksi pelanggan dengan cepat
                    dan praktis melalui sistem kasir.
                </p>

                <a href="#">
                    Selengkapnya
                    <i class="fa-solid fa-arrow-right"></i>
                </a>

            </div>


            <div class="feature-card">

                <div class="feature-icon">
                    <i class="fa-solid fa-boxes-stacked"></i>
                </div>

                <h3>Manajemen Produk</h3>

                <p>
                    Kelola data produk, harga, kategori,
                    dan stok dengan lebih mudah.
                </p>

                <a href="#">
                    Selengkapnya
                    <i class="fa-solid fa-arrow-right"></i>
                </a>

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

                <a href="#">
                    Selengkapnya
                    <i class="fa-solid fa-arrow-right"></i>
                </a>

            </div>


            <div class="feature-card">

                <div class="feature-icon">
                    <i class="fa-solid fa-warehouse"></i>
                </div>

                <h3>Kontrol Stok</h3>

                <p>
                    Ketahui jumlah stok produk agar
                    persediaan tetap terkontrol.
                </p>

                <a href="#">
                    Selengkapnya
                    <i class="fa-solid fa-arrow-right"></i>
                </a>

            </div>

        </div>

    </div>

</section>


<!-- ================= ABOUT ================= -->
<section class="about section" id="tentang">

    <div class="container about-wrapper">

        <div class="about-visual">

            <div class="about-circle">

                <div class="about-bread">
                    <i class="fa-solid fa-bread-slice"></i>
                </div>

            </div>

            <div class="about-badge">
                <i class="fa-solid fa-award"></i>
                <div>
                    <strong>Fresh & Quality</strong>
                    <span>Everyday</span>
                </div>
            </div>

        </div>


        <div class="about-text">

            <span class="section-label">
                TENTANG MODERN BAKERY
            </span>

            <h2>
                Rasa Lezat,
                <span>Pelayanan Hebat</span>
            </h2>

            <p>
                MODERN BAKERY merupakan toko roti yang
                menghadirkan berbagai pilihan roti dan
                produk bakery untuk memenuhi kebutuhan
                pelanggan.
            </p>

            <p>
                Dengan adanya sistem kasir ini, proses
                transaksi dan pengelolaan data toko dapat
                dilakukan dengan lebih cepat, mudah, dan
                terorganisir.
            </p>

            <div class="about-list">

                <div>
                    <i class="fa-solid fa-check"></i>
                    <span>Transaksi lebih cepat</span>
                </div>

                <div>
                    <i class="fa-solid fa-check"></i>
                    <span>Pengelolaan produk lebih mudah</span>
                </div>

                <div>
                    <i class="fa-solid fa-check"></i>
                    <span>Data penjualan lebih terorganisir</span>
                </div>

            </div>

            <a href="#" class="btn-primary">
                Masuk ke Sistem
                <i class="fa-solid fa-arrow-right"></i>
            </a>

        </div>

    </div>

</section>


<!-- ================= CTA ================= -->
<section class="cta">

    <div class="container cta-content">

        <div>
            <span class="section-label">
                MODERN BAKERY
            </span>

            <h2>
                Siap Mengelola
                Toko dengan Lebih Mudah?
            </h2>

            <p>
                Gunakan sistem kasir MODERN BAKERY
                untuk membuat proses transaksi lebih praktis.
            </p>
        </div>

        <a href="#" class="btn-white">
            Mulai Sekarang
            <i class="fa-solid fa-arrow-right"></i>
        </a>

    </div>

</section>


<!-- ================= FOOTER ================= -->
<footer class="footer">

    <div class="container footer-wrapper">

        <div class="footer-brand">

            <a href="#" class="logo footer-logo">

                <div class="logo-icon">
                    <i class="fa-solid fa-bread-slice"></i>
                </div>

                <div>
                    <span>MODERN</span>
                    <small>BAKERY</small>
                </div>

            </a>

            <p>
                Sistem kasir modern untuk membantu
                pengelolaan toko roti menjadi lebih mudah.
            </p>

        </div>


        <div class="footer-column">

            <h4>Navigasi</h4>

            <a href="#home">Beranda</a>
            <a href="#produk">Produk</a>
            <a href="#fitur">Fitur</a>
            <a href="#tentang">Tentang</a>

        </div>


        <div class="footer-column">

            <h4>Kontak</h4>

            <span>
                <i class="fa-solid fa-location-dot"></i>
                Menganti, Gresik
            </span>

            <span>
                <i class="fa-solid fa-phone"></i>
                08xx-xxxx-xxxx
            </span>

            <span>
                <i class="fa-solid fa-envelope"></i>
                modernbakery@gmail.com
            </span>

        </div>

    </div>


    <div class="footer-bottom">
        <p>
            © {{ date('Y') }} MODERN BAKERY. All Rights Reserved.
        </p>
    </div>

</footer>


<!-- ================= JAVASCRIPT ================= -->
<script>

    const menuToggle = document.getElementById('menuToggle');
    const navMenu = document.querySelector('.nav-menu');

    menuToggle.addEventListener('click', function () {
        navMenu.classList.toggle('active');
    });


    document.querySelectorAll('.nav-menu a').forEach(link => {

        link.addEventListener('click', () => {
            navMenu.classList.remove('active');
        });

    });


    // Smooth scroll
    document.querySelectorAll('a[href^="#"]').forEach(anchor => {

        anchor.addEventListener('click', function (e) {

            const target = document.querySelector(
                this.getAttribute('href')
            );

            if (target) {

                e.preventDefault();

                target.scrollIntoView({
                    behavior: 'smooth'
                });

            }

        });

    });

</script>

</body>
</html>
```
