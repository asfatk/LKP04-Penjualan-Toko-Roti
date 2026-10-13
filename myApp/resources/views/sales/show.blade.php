<!DOCTYPE html>
<html lang="id">

<head>

    <meta charset="UTF-8">

    <meta
        name="viewport"
        content="width=device-width, initial-scale=1.0"
    >

    <title>
        Detail Penjualan - Modern Bakery
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

        .container {
            width: min(900px, calc(100% - 40px));
            margin: 50px auto;
        }

        .card {
            background: white;
            padding: 25px;
            border-radius: 8px;
            border: 1px solid #e1dbd0;
            margin-top: 20px;
        }

        h1,
        h2 {
            font-family: Georgia, serif;
            color: #4b211d;
        }

        table {
            width: 100%;
            border-collapse: collapse;
        }

        th,
        td {
            padding: 12px;
            border-bottom: 1px solid #ddd;
            text-align: left;
        }

        th {
            background: #f0e8dc;
        }

        .total {
            font-size: 22px;
            font-weight: bold;
            color: #6c2924;
        }

        .button {
            display: inline-block;
            margin-top: 20px;
            padding: 11px 16px;
            background: #6c2924;
            color: white;
            text-decoration: none;
            font-weight: bold;
            border-radius: 5px;
        }

    </style>

</head>

<body>


<div class="container">

    <h1>
        Detail Penjualan
    </h1>


    <div class="card">

        <p>

            <strong>
                No. Transaksi:
            </strong>

            TRX-{{
                str_pad(
                    $sale->id,
                    4,
                    '0',
                    STR_PAD_LEFT
                )
            }}

            <br>

            <strong>
                Tanggal:
            </strong>

            {{ $sale->tanggal->format('d-m-Y H:i') }}

            <br>

            <strong>
                Kasir:
            </strong>

            {{ $sale->user->nama }}

            <br>

            <strong>
                Metode Pembayaran:
            </strong>

            {{ $sale->metode_bayar }}

            <br>

            <strong>
                Status:
            </strong>

            {{ $sale->status }}

        </p>

    </div>


    <div class="card">

        <h2>
            Produk yang Dibeli
        </h2>


        <table>

            <thead>

                <tr>

                    <th>
                        Produk
                    </th>

                    <th>
                        Harga
                    </th>

                    <th>
                        Jumlah
                    </th>

                    <th>
                        Subtotal
                    </th>

                </tr>

            </thead>


            <tbody>

                @foreach ($sale->saleDetails as $detail)

                    <tr>

                        <td>
                            {{ $detail->product->nama_produk }}
                        </td>

                        <td>

                            Rp
                            {{ number_format(
                                $detail->harga,
                                0,
                                ',',
                                '.'
                            ) }}

                        </td>

                        <td>
                            {{ $detail->jumlah }}
                        </td>

                        <td>

                            Rp
                            {{ number_format(
                                $detail->subtotal,
                                0,
                                ',',
                                '.'
                            ) }}

                        </td>

                    </tr>

                @endforeach

            </tbody>

        </table>


        <br>


        <div class="total">

            Total:

            Rp
            {{ number_format(
                $sale->total,
                0,
                ',',
                '.'
            ) }}

        </div>


        <a
            href="{{ route(
                'admin.sales.receipt',
                $sale
            ) }}"
            class="button"
        >
            🧾 Lihat / Cetak Struk
        </a>


        <a
            href="{{ route(
                'admin.sales.history'
            ) }}"
            class="button"
        >
            ← Kembali

        </a>

    </div>

</div>

</body>

</html>