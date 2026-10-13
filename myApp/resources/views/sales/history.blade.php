<!DOCTYPE html>
<html lang="id">

<head>

    <meta charset="UTF-8">

    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>
        Riwayat Penjualan - Modern Bakery
    </title>

    <style>

        * {
            box-sizing: border-box;
        }

        body {
            margin: 0;
            font-family: 'Segoe UI', sans-serif;
            background: #f5f3ed;
            color: #302823;
        }

        .topbar {
            min-height: 72px;
            display: flex;
            justify-content: space-between;
            align-items: center;
            padding: 0 40px;
            background: white;
            border-bottom: 1px solid #ddd5c8;
        }

        .brand {
            color: #6c2924;
            font-family: Georgia, serif;
            font-size: 22px;
            font-weight: bold;
        }

        .topbar a {
            color: #6c2924;
            text-decoration: none;
            font-weight: bold;
        }

        .container {
            width: min(1100px, calc(100% - 40px));
            margin: 40px auto;
        }

        h1 {
            font-family: Georgia, serif;
            color: #4b211d;
        }

        .card {
            background: white;
            padding: 25px;
            border-radius: 8px;
            border: 1px solid #e1dbd0;
            margin-top: 25px;
            overflow-x: auto;
        }

        table {
            width: 100%;
            border-collapse: collapse;
        }

        th,
        td {
            padding: 13px;
            border-bottom: 1px solid #ddd;
            text-align: left;
        }

        th {
            background: #f0e8dc;
        }

        a.action {
            color: #6c2924;
            text-decoration: none;
            font-weight: bold;
        }

        .empty {
            text-align: center;
            padding: 30px;
            color: #777;
        }

    </style>

</head>

<body>


<header class="topbar">

    <div class="brand">
        Modern Bakery
    </div>

    <div>

        {{ auth()->user()->nama }}

        &nbsp; | &nbsp;

        <a href="{{ route('admin.dashboard') }}">
            Dashboard
        </a>

    </div>

</header>


<div class="container">

    <h1>
        Riwayat Penjualan
    </h1>

    <p>
        Daftar transaksi yang sudah dilakukan.
    </p>


    <div class="card">

        <table>

            <thead>

                <tr>

                    <th>No. Transaksi</th>

                    <th>Tanggal</th>

                    <th>Kasir</th>

                    <th>Total</th>

                    <th>Pembayaran</th>

                    <th>Status</th>

                    <th>Aksi</th>

                </tr>

            </thead>


            <tbody>

                @forelse ($sales as $sale)

                    <tr>

                        <td>

                            TRX-{{
                                str_pad(
                                    $sale->id,
                                    4,
                                    '0',
                                    STR_PAD_LEFT
                                )
                            }}

                        </td>


                        <td>

                            {{ $sale->tanggal->format('d-m-Y H:i') }}

                        </td>


                        <td>

                            {{ $sale->user->nama }}

                        </td>


                        <td>

                            Rp
                            {{ number_format(
                                $sale->total,
                                0,
                                ',',
                                '.'
                            ) }}

                        </td>


                        <td>

                            {{ $sale->metode_bayar }}

                        </td>


                        <td>

                            {{ $sale->status }}

                        </td>


                        <td>

                            <a
                                class="action"
                                href="{{ route(
                                    'admin.sales.show',
                                    $sale
                                ) }}"
                            >
                                Detail
                            </a>

                            <br>

                            <a
                                class="action"
                                href="{{ route(
                                    'admin.sales.receipt',
                                    $sale
                                ) }}"
                            >
                                Struk
                            </a>

                        </td>

                    </tr>

                @empty

                    <tr>

                        <td
                            colspan="7"
                            class="empty"
                        >

                            Belum ada transaksi.

                        </td>

                    </tr>

                @endforelse

            </tbody>

        </table>

    </div>


</div>

</body>

</html>