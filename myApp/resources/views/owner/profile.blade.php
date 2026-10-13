
<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Profil Toko - Modern Bakery</title>

    <style>
        * {
            box-sizing: border-box;
        }

        body {
            margin: 0;
            font-family: Arial, sans-serif;
            background: #f7f3ed;
            color: #422d24;
        }

        .topbar {
            background: #fffdf9;
            padding: 20px 6%;
            border-bottom: 1px solid #eadfd3;
            display: flex;
            align-items: center;
            justify-content: space-between;
            gap: 15px;
        }

        .brand {
            font-size: 21px;
            font-weight: bold;
        }

        .brand span {
            color: #a67550;
        }

        .back {
            color: #805638;
            text-decoration: none;
            font-size: 14px;
        }

        .container {
            max-width: 900px;
            margin: 40px auto;
            padding: 0 20px;
        }

        .heading {
            margin-bottom: 25px;
        }

        .heading p {
            color: #8b7a6c;
            line-height: 1.6;
        }

        .card {
            background: white;
            border: 1px solid #eee3d8;
            border-radius: 16px;
            overflow: hidden;
            box-shadow: 0 8px 25px rgba(70, 43, 25, 0.05);
        }

        .card-header {
            padding: 22px 26px;
            border-bottom: 1px solid #f0e8df;
        }

        .card-header h2 {
            margin: 0 0 8px;
            font-size: 19px;
        }

        .card-header p {
            margin: 0;
            color: #8b7a6c;
            font-size: 14px;
        }

        form {
            padding: 26px;
        }

        .form-group {
            margin-bottom: 22px;
        }

        label {
            display: block;
            font-size: 14px;
            font-weight: bold;
            margin-bottom: 9px;
        }

        input, textarea {
            width: 100%;
            padding: 13px 14px;
            border: 1px solid #ded2c5;
            border-radius: 9px;
            font-family: inherit;
            font-size: 14px;
            color: #422d24;
            background: #fffefa;
            outline: none;
        }

        input:focus, textarea:focus {
            border-color: #a67550;
            box-shadow: 0 0 0 3px rgba(166, 117, 80, 0.12);
        }

        textarea {
            min-height: 115px;
            resize: vertical;
        }

        .hint {
            margin-top: 7px;
            font-size: 12px;
            color: #9a8a7d;
        }

        .alert {
            padding: 14px 16px;
            border-radius: 9px;
            margin-bottom: 20px;
            font-size: 14px;
        }

        .success {
            background: #edf7ed;
            color: #286338;
            border: 1px solid #cce7d0;
        }

        .error {
            background: #fff0ed;
            color: #9c3325;
            border: 1px solid #f1c9c1;
        }

        .error ul {
            margin: 8px 0 0;
            padding-left: 20px;
        }

        .actions {
            display: flex;
            justify-content: flex-end;
            gap: 12px;
            padding-top: 20px;
            border-top: 1px solid #f0e8df;
        }

        .btn {
            display: inline-block;
            border: none;
            border-radius: 9px;
            padding: 13px 19px;
            font-size: 14px;
            font-weight: bold;
            text-decoration: none;
            cursor: pointer;
        }

        .btn-secondary {
            background: #f2ece5;
            color: #654734;
        }

        .btn-primary {
            background: #805638;
            color: white;
        }

        .btn-primary:hover {
            background: #69432c;
        }

        @media (max-width: 600px) {
            .topbar {
                padding: 18px 5%;
            }

            .brand {
                font-size: 17px;
            }

            .container {
                margin-top: 28px;
                padding: 0 14px;
            }

            form {
                padding: 20px;
            }

            .actions {
                flex-direction: column-reverse;
            }

            .btn {
                text-align: center;
                width: 100%;
            }
        }
    </style>
</head>

<body>
    <header class="topbar">
        <div class="brand">MODERN <span>BAKERY</span></div>
        <a class="back" href="{{ route('owner.dashboard') }}">
            ← Kembali ke Dashboard
        </a>
    </header>

    <main class="container">
        <div class="heading">
            <h1>Profil Toko</h1>
            <p>
                Kelola informasi identitas toko Modern Bakery.
                Perubahan yang disimpan akan digunakan sebagai data profil toko.
            </p>
        </div>

        @if (session('success'))
            <div class="alert success">
                ✓ {{ session('success') }}
            </div>
        @endif

        @if ($errors->any())
            <div class="alert error">
                <strong>Data belum bisa disimpan.</strong>
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        <section class="card">
            <div class="card-header">
                <h2>Informasi Toko</h2>
                <p>Isi informasi toko dengan data yang benar.</p>
            </div>

            <form action="{{ route('owner.profile.update') }}" method="POST">
                @csrf
                @method('PUT')

                <div class="form-group">
                    <label for="nama_toko">Nama Toko</label>
                    <input
                        type="text"
                        id="nama_toko"
                        name="nama_toko"
                        value="{{ old('nama_toko', $profile?->nama_toko ?? 'Modern Bakery') }}"
                        placeholder="Contoh: Modern Bakery"
                        maxlength="255"
                        required
                    >
                </div>

                <div class="form-group">
                    <label for="alamat">Alamat Toko</label>
                    <textarea
                        id="alamat"
                        name="alamat"
                        placeholder="Masukkan alamat lengkap toko"
                        required
                    >{{ old('alamat', $profile?->alamat ?? '') }}</textarea>
                </div>

                <div class="form-group">
                    <label for="no_telepon">Nomor Telepon</label>
                    <input
                        type="tel"
                        id="no_telepon"
                        name="no_telepon"
                        value="{{ old('no_telepon', $profile?->no_telepon ?? '') }}"
                        placeholder="Contoh: 081234567890"
                        maxlength="255"
                        required
                    >
                    <div class="hint">
                        Masukkan nomor telepon yang bisa dihubungi.
                    </div>
                </div>

                <div class="actions">
                    <a
                        href="{{ route('owner.dashboard') }}"
                        class="btn btn-secondary"
                    >
                        Batal
                    </a>

                    <button type="submit" class="btn btn-primary">
                        Simpan Perubahan
                    </button>
                </div>
            </form>
        </section>
    </main>
</body>
</html>
