<!DOCTYPE html>
<html lang="id">

<head>

    <meta charset="UTF-8">

    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>
        Struk Transaksi - Modern Bakery
    </title>

    <style>

        body {
            margin: 0;
            padding: 30px;
            background: #eeeeee;
            font-family: Arial, sans-serif;
            color: #222;
        }

        .receipt {
            width: 380px;
            margin: auto;
            padding: 25px;
            background: white;
        }

        .center {
            text-align: center;
        }

        .center h2 {
            margin-bottom: 5px;
        }

        hr {
            border: none;
            border-top: 1px dashed #999;
            margin: 18px 0;
        }

        table {
            width: 100%;
            border-collapse: collapse;
        }

        td {
            padding: 5px 0;
            vertical-align: top;
        }

        .right {
            text-align: right;
        }

        .total {
            font-size: 18px;
            font-weight: bold;
        }

        .button {
            display: block;
            width: 380px;
            margin: 20px auto;
            padding: 13px;
            background: #6c2924;
            color: white;
            border: none;
            cursor: pointer;
            font-weight: bold;
        }

        .back {
            display: block;
            text-align: center;
            margin-top: 15px;
            color: #6c2924;
            text-decoration: none;
        }

        @media print {

            body {
                padding: 0;
                background: white;
            }

            .button,
            .back {
                display: none;
            }

            .receipt {
                width: 100%;
            }

        }

    </style>

</head>

<body>


<div class="receipt">

    <div class="center">

        <h2>
            MODERN BAKERY
        </h2>

        <p>
            Struk Pembelian
        </p>

    </div>


    <hr>


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

    </p>


    <hr>


    <table>

        @foreach ($sale->saleDetails as $detail)

            <tr>

                <td colspan="2">

                    <strong>
                        {{ $detail->product->nama_produk }}
                    </strong>

                </td>

            </tr>


            <tr>

                <td>

                    {{ $detail->jumlah }}
                    x
                    Rp
                    {{ number_format(
                        $detail->harga,
                        0,
                        ',',
                        '.'
                    ) }}

                </td>


                <td class="right">

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

    </table>


    <hr>


    <table>

        <tr>

            <td>
                Total
            </td>

            <td class="right total">

                Rp
                {{ number_format(
                    $sale->total,
                    0,
                    ',',
                    '.'
                ) }}

            </td>

        </tr>


        <tr>

            <td>
                Metode Bayar
            </td>

            <td class="right">
                {{ $sale->metode_bayar }}
            </td>

        </tr>


        @if (session('jumlah_bayar') !== null)

            <tr>

                <td>
                    Bayar
                </td>

                <td class="right">

                    Rp
                    {{ number_format(
                        session('jumlah_bayar'),
                        0,
                        ',',
                        '.'
                    ) }}

                </td>

            </tr>


            <tr>

                <td>
                    Kembalian
                </td>

                <td class="right">

                    Rp
                    {{ number_format(
                        session('kembalian'),
                        0,
                        ',',
                        '.'
                    ) }}

                </td>

            </tr>

        @endif

    </table>


    <hr>


    <div class="center">

        <p>
            Terima kasih sudah berbelanja ❤️
        </p>

        <small>
            Modern Bakery
        </small>

    </div>

</div>


<button
    class="button"
    onclick="window.print()"
>
    🖨️ Cetak Struk
</button>


<a
    href="{{ route('admin.sales.create') }}"
    class="back"
>
    ← Kembali ke Kasir
</a>


</body>

</html>