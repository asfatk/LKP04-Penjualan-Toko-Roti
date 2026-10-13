<!DOCTYPE html>
<html lang="id">

<head>

    <meta charset="UTF-8">

    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>Data Produk - Modern Bakery</title>


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
            background: #fff;
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
            max-width: 1250px;
            margin: 45px auto;
        }

        .header {
            display: flex;
            justify-content: space-between;
            align-items: center;
            margin-bottom: 25px;
        }

        .header h1 {
            margin: 0;
            font-family: Georgia, serif;
            font-size: 36px;
        }

        .header p {
            margin-top: 8px;
            color: #756861;
            font-size: 16px;
        }

        .button {
            display: inline-block;
            background: #7d3028;
            color: white;
            text-decoration: none;
            padding: 13px 20px;
            border-radius: 7px;
            font-weight: bold;
            border: none;
            cursor: pointer;
        }

        .button:hover {
            background: #64251f;
        }

        .success {
            background: #e7f6e9;
            color: #276738;
            border: 1px solid #b9dfc0;
            padding: 14px 18px;
            border-radius: 8px;
            margin-bottom: 20px;
        }

        .error {
            background: #f9e1df;
            color: #a12b24;
            border: 1px solid #edc3bf;
            padding: 14px 18px;
            border-radius: 8px;
            margin-bottom: 20px;
        }

        .table-card {
            background: white;
            border: 1px solid #e2ddd5;
            border-radius: 12px;
            overflow: hidden;
            box-shadow: 0 2px 8px rgba(0, 0, 0, .03);
        }

        table {
            width: 100%;
            border-collapse: collapse;
        }

        thead {
            background: #f1e9dd;
        }

        th {
            text-align: left;
            padding: 18px 20px;
            font-size: 14px;
            color: #4b342d;
        }

        td {
            padding: 18px 20px;
            border-top: 1px solid #eee9e2;
            vertical-align: middle;
        }

        tbody tr:hover {
            background: #fcfaf7;
        }

        .product-name {
            font-weight: bold;
        }

        .price {
            font-weight: bold;
            color: #7d3028;
        }

        .stock {
            font-weight: bold;
        }

        .stock-empty {
            color: #b3261e;
        }

        .stock-available {
            color: #34723f;
        }

        .badge {
            display: inline-block;
            background: #f2eee8;
            color: #604a40;
            padding: 6px 10px;
            border-radius: 20px;
            font-size: 13px;
        }

        .actions {
            display: flex;
            gap: 8px;
        }

        .edit-button {
            background: #eee8df;
            color: #5a4037;
            text-decoration: none;
            padding: 8px 13px;
            border-radius: 6px;
            font-size: 14px;
            font-weight: bold;
        }

        .edit-button:hover {
            background: #e2d9cd;
        }

        .delete-button {
            background: #f9e1df;
            color: #a12b24;
            padding: 8px 13px;
            border-radius: 6px;
            font-size: 14px;
            font-weight: bold;
            border: none;
            cursor: pointer;
        }

        .delete-button:hover {
            background: #f1ceca;
        }

        .empty {
            text-align: center;
            padding: 50px;
            color: #766b64;
        }

        @media (max-width: 800px) {

            .navbar {
                padding: 18px 20px;
            }

            .container {
                width: 95%;
            }

            .header {
                flex-direction: column;
                align-items: flex-start;
                gap: 15px;
            }

            .table-card {
                overflow-x: auto;
            }

            table {
                min-width: 800px;
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


        {{-- HEADER --}}

        <div class="header">

            <div>

                <h1>
                    Data Produk
                </h1>

                <p>
                    Kelola daftar produk yang tersedia di Modern Bakery.
                </p>

            </div>


            <a
                href="{{ route('admin.products.create') }}"
                class="button"
            >
                + Tambah Produk
            </a>

        </div>



        {{-- PESAN BERHASIL --}}

        @if(session('success'))

            <div class="success">

                {{ session('success') }}

            </div>

        @endif



        {{-- PESAN ERROR --}}

        @if(session('error'))

            <div class="error">

                {{ session('error') }}

            </div>

        @endif



        {{-- TABLE PRODUK --}}

        <div class="table-card">


            @if($products->count() > 0)


                <table>

                    <thead>

                        <tr>

                            <th>
                                No
                            </th>

                            <th>
                                Nama Produk
                            </th>

                            <th>
                                Kategori
                            </th>

                            <th>
                                Harga
                            </th>

                            <th>
                                Stok
                            </th>

                            <th>
                                Aksi
                            </th>

                        </tr>

                    </thead>


                    <tbody>


                        @foreach($products as $product)


                            <tr>


                                {{-- NOMOR --}}

                                <td>
                                    {{ $loop->iteration }}
                                </td>



                                {{-- NAMA --}}

                                <td>

                                    <div class="product-name">

                                        {{ $product->nama_produk }}

                                    </div>

                                </td>



                                {{-- KATEGORI --}}

                                <td>

                                    <span class="badge">

                                        {{ $product->kategori }}

                                    </span>

                                </td>



                                {{-- HARGA --}}

                                <td>

                                    <span class="price">

                                        Rp
                                        {{ number_format($product->harga, 0, ',', '.') }}

                                    </span>

                                </td>



                                {{-- STOK --}}

                                <td>

                                    @php

                                        $jumlahStok =
                                            $product->stock?->jumlah ?? 0;

                                    @endphp


                                    <span
                                        class="stock
                                        {{ $jumlahStok <= 0
                                            ? 'stock-empty'
                                            : 'stock-available' }}"
                                    >

                                        {{ $jumlahStok }}

                                        pcs

                                    </span>

                                </td>



                                {{-- AKSI --}}

                                <td>

                                    <div class="actions">


                                        {{-- EDIT --}}

                                        <a
                                            href="{{ route('admin.products.edit', $product) }}"
                                            class="edit-button"
                                        >
                                            Edit
                                        </a>



                                        {{-- HAPUS --}}

                                        <form
                                            action="{{ route('admin.products.destroy', $product) }}"
                                            method="POST"
                                            onsubmit="return confirm(
                                                'Yakin ingin menghapus produk {{ $product->nama_produk }}?'
                                            );"
                                        >

                                            @csrf

                                            @method('DELETE')


                                            <button
                                                type="submit"
                                                class="delete-button"
                                            >
                                                Hapus
                                            </button>

                                        </form>


                                    </div>

                                </td>


                            </tr>


                        @endforeach


                    </tbody>

                </table>


            @else


                <div class="empty">

                    <h3>
                        Belum ada produk
                    </h3>

                    <p>
                        Silakan tambahkan produk terlebih dahulu.
                    </p>

                </div>


            @endif


        </div>

    </div>


</body>

</html>