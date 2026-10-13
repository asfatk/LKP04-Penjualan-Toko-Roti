<!DOCTYPE html>
<html lang="id">

<head>

    <meta charset="UTF-8">

    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>Edit Produk - Modern Bakery</title>

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

        .container {
            width: 90%;
            max-width: 900px;
            margin: 45px auto;
        }

        .page-header {
            margin-bottom: 25px;
        }

        .page-header h1 {
            margin: 0;
            font-family: Georgia, serif;
            font-size: 36px;
        }

        .page-header p {
            margin-top: 8px;
            color: #756861;
            font-size: 16px;
        }

        .card {
            background: white;
            border: 1px solid #e2ddd5;
            border-radius: 12px;
            padding: 30px;
            box-shadow: 0 2px 8px rgba(0, 0, 0, .03);
        }

        .form-group {
            margin-bottom: 22px;
        }

        .form-group label {
            display: block;
            margin-bottom: 8px;
            font-weight: bold;
            color: #4b342d;
        }

        .required {
            color: #a12b24;
        }

        input,
        select,
        textarea {
            width: 100%;
            padding: 13px 14px;
            border: 1px solid #d7d0c8;
            border-radius: 7px;
            font-size: 15px;
            font-family: Arial, Helvetica, sans-serif;
            background: white;
            color: #3b2721;
        }

        input:focus,
        select:focus,
        textarea:focus {
            outline: none;
            border-color: #7d3028;
        }

        textarea {
            min-height: 120px;
            resize: vertical;
        }

        .input-help {
            display: block;
            margin-top: 6px;
            color: #81766f;
            font-size: 13px;
        }

        .stock-section {
            margin-top: 30px;
            padding-top: 25px;
            border-top: 1px solid #eee9e2;
        }

        .stock-title {
            margin: 0 0 8px;
            font-family: Georgia, serif;
            font-size: 24px;
        }

        .stock-description {
            margin: 0 0 22px;
            color: #756861;
            font-size: 14px;
        }

        .error-box {
            background: #f9e1df;
            color: #a12b24;
            border: 1px solid #edc3bf;
            padding: 15px 18px;
            border-radius: 8px;
            margin-bottom: 22px;
        }

        .error-box ul {
            margin: 8px 0 0 20px;
            padding: 0;
        }

        .button-area {
            display: flex;
            justify-content: space-between;
            align-items: center;
            margin-top: 30px;
            padding-top: 22px;
            border-top: 1px solid #eee9e2;
        }

        .back-button {
            display: inline-block;
            text-decoration: none;
            background: #eee8df;
            color: #5a4037;
            padding: 12px 20px;
            border-radius: 7px;
            font-weight: bold;
        }

        .save-button {
            border: none;
            background: #7d3028;
            color: white;
            padding: 13px 24px;
            border-radius: 7px;
            font-size: 15px;
            font-weight: bold;
            cursor: pointer;
        }

        .save-button:hover {
            background: #64251f;
        }

        @media (max-width: 700px) {

            .navbar {
                padding: 18px 20px;
            }

            .container {
                width: 95%;
                margin: 30px auto;
            }

            .card {
                padding: 22px;
            }

            .button-area {
                flex-direction: column-reverse;
                align-items: stretch;
                gap: 12px;
            }

            .back-button,
            .save-button {
                width: 100%;
                text-align: center;
            }

        }

    </style>

</head>


<body>


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



    <div class="container">


        <div class="page-header">

            <h1>
                Edit Produk
            </h1>

            <p>
                Ubah informasi produk dan stok Modern Bakery.
            </p>

        </div>



        <div class="card">


            @if ($errors->any())

                <div class="error-box">

                    <strong>
                        Ada data yang belum benar:
                    </strong>

                    <ul>

                        @foreach ($errors->all() as $error)

                            <li>
                                {{ $error }}
                            </li>

                        @endforeach

                    </ul>

                </div>

            @endif



            <form
                action="{{ route('admin.products.update', $product) }}"
                method="POST"
            >

                @csrf

                @method('PUT')



                {{-- DATA PRODUK --}}

                <div class="form-group">

                    <label for="nama_produk">
                        Nama Produk
                        <span class="required">*</span>
                    </label>

                    <input
                        type="text"
                        id="nama_produk"
                        name="nama_produk"
                        value="{{ old('nama_produk', $product->nama_produk) }}"
                        required
                    >

                </div>



                <div class="form-group">

                    <label for="kategori">
                        Kategori
                        <span class="required">*</span>
                    </label>

                    <select
                        id="kategori"
                        name="kategori"
                        required
                    >

                        <option value="">
                            -- Pilih Kategori --
                        </option>

                        <option
                            value="Roti"
                            {{ old('kategori', $product->kategori) == 'Roti' ? 'selected' : '' }}
                        >
                            Roti
                        </option>

                        <option
                            value="Donat"
                            {{ old('kategori', $product->kategori) == 'Donat' ? 'selected' : '' }}
                        >
                            Donat
                        </option>

                        <option
                            value="Kue"
                            {{ old('kategori', $product->kategori) == 'Kue' ? 'selected' : '' }}
                        >
                            Kue
                        </option>

                        <option
                            value="Pastry"
                            {{ old('kategori', $product->kategori) == 'Pastry' ? 'selected' : '' }}
                        >
                            Pastry
                        </option>

                    </select>

                </div>



                <div class="form-group">

                    <label for="harga">
                        Harga
                        <span class="required">*</span>
                    </label>

                    <input
                        type="number"
                        id="harga"
                        name="harga"
                        value="{{ old('harga', $product->harga) }}"
                        min="0"
                        step="100"
                        required
                    >

                    <small class="input-help">
                        Masukkan harga dalam rupiah.
                    </small>

                </div>



                <div class="form-group">

                    <label for="deskripsi">
                        Deskripsi
                    </label>

                    <textarea
                        id="deskripsi"
                        name="deskripsi"
                    >{{ old('deskripsi', $product->deskripsi) }}</textarea>

                </div>



                {{-- DATA STOK --}}

                <div class="stock-section">

                    <h2 class="stock-title">
                        Stok Produk
                    </h2>

                    <p class="stock-description">
                        Stok akan otomatis berkurang ketika produk terjual melalui Kasir.
                        Gunakan bagian ini untuk menyesuaikan stok saat ada stok baru atau koreksi stok.
                    </p>



                    <div class="form-group">

                        <label for="jumlah_stok">
                            Jumlah Stok
                            <span class="required">*</span>
                        </label>

                        <input
                            type="number"
                            id="jumlah_stok"
                            name="jumlah_stok"
                            value="{{ old('jumlah_stok', $product->stock?->jumlah ?? 0) }}"
                            min="0"
                            required
                        >

                        <small class="input-help">
                            Contoh: 20 berarti tersedia 20 pcs.
                        </small>

                    </div>



                    <div class="form-group">

                        <label for="satuan">
                            Satuan
                            <span class="required">*</span>
                        </label>

                        <input
                            type="text"
                            id="satuan"
                            name="satuan"
                            value="{{ old('satuan', $product->stock?->satuan ?? 'pcs') }}"
                            required
                        >

                    </div>



                    <div class="form-group">

                        <label for="keterangan_stok">
                            Keterangan Stok
                        </label>

                        <textarea
                            id="keterangan_stok"
                            name="keterangan_stok"
                            placeholder="Contoh: Stok ditambah karena produksi baru."
                        >{{ old('keterangan_stok', $product->stock?->keterangan) }}</textarea>

                    </div>

                </div>



                <div class="button-area">

                    <a
                        href="{{ route('admin.products.index') }}"
                        class="back-button"
                    >
                        ← Kembali
                    </a>


                    <button
                        type="submit"
                        class="save-button"
                    >
                        Simpan Perubahan
                    </button>

                </div>

            </form>

        </div>

    </div>


</body>

</html>