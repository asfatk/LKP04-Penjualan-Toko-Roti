<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Laporan Penjualan - Modern Bakery</title>

    <style>
        * {
            box-sizing: border-box;
        }

        body {
            margin: 0;
            padding: 30px;
            font-family: Arial, sans-serif;
            background: #f8f5f0;
            color: #3e3028;
        }

        .container {
            max-width: 1200px;
            margin: auto;
        }

        .header {
            display: flex;
            justify-content: space-between;
            align-items: center;
            gap: 15px;
            flex-wrap: wrap;
            margin-bottom: 25px;
        }

        h1 {
            margin: 0 0 8px;
            font-size: 28px;
        }

        .subtitle {
            color: #82756b;
            margin: 0;
        }

        .btn {
            display: inline-block;
            padding: 11px 16px;
            border: none;
            border-radius: 8px;
            background: #795548;
            color: white;
            text-decoration: none;
            cursor: pointer;
            font-size: 14px;
        }

        .btn:hover {
            background: #5d4037;
        }

        .filter {
            display: flex;
            align-items: end;
            gap: 12px;
            flex-wrap: wrap;
            padding: 20px;
            margin-bottom: 22px;
            background: white;
            border-radius: 12px;
        }

        .filter-group {
            display: flex;
            flex-direction: column;
            gap: 7px;
        }

        input[type="date"] {
            padding: 10px;
            border: 1px solid #ddd2c8;
            border-radius: 7px;
        }

        .reset {
            background: #e8e0d8;
            color: #3e3028;
        }

        .cards {
            display: grid;
            grid-template-columns: repeat(3, minmax(0, 1fr));
            gap: 18px;
            margin-bottom: 25px;
        }

        .card {
            background: white;
            padding: 22px;
            border-radius: 12px;
            box-shadow: 0 3px 12px rgba(0, 0, 0, 0.04);
        }

        .card-label {
            color: #82756b;
            font-size: 14px;
            margin-bottom: 12px;
        }

        .card-value {
            font-size: 25px;
            font-weight: bold;
            overflow-wrap: anywhere;
        }

        .section {
            background: white;
            border-radius: 12px;
            padding: 22px;
            margin-bottom: 25px;
        }

        .section h2 {
            font-size: 19px;
            margin: 0 0 18px;
        }

        .table-wrapper {
            overflow-x: auto;
        }

        table {
            width: 100%;
            border-collapse: collapse;
            min-width: 700px;
        }

        th, td {
            padding: 13px 12px;
            border-bottom: 1px solid #eee7e1;
            text-align: left;
            font-size: 14px;
            vertical-align: top;
        }

        th {
            background: #f8f5f0;
            color: #5d4037;
        }

        .empty {
            text-align: center;
            color: #82756b;
            padding: 25px;
        }

        .pagination {
            margin-top: 20px;
        }

        .pagination nav > div:first-child {
            margin-bottom: 10px;
        }

        @media (max-width: 750px) {
            body {
                padding: 16px;
            }

            .cards {
                grid-template-columns: 1fr;
            }

            h1 {
                font-size: 23px;
            }
        }
    </style>
</head>

<body>
<div class="container">

    <div class="header">
        <div>
            <h1>Laporan Penjualan</h1>
            <p class="subtitle">
                Ringkasan dan riwayat transaksi Modern Bakery
            </p>
        </div>

        <a href="{{ route('owner.dashboard') }}" class="btn">
            Kembali ke Dashboard
        </a>
    </div>

    <form action="{{ route('owner.reports') }}" method="GET" class="filter">
        <div class="filter-group">
            <label for="tanggal_mulai">Dari tanggal</label>
            <input
                type="date"
                id="tanggal_mulai"
                name="tanggal_mulai"
                value="{{ $filters['tanggal_mulai'] ?? '' }}"
            >
        </div>

        <div class="filter-group">
            <label for="tanggal_akhir">Sampai tanggal</label>
            <input
                type="date"
                id="tanggal_akhir"
                name="tanggal_akhir"
                value="{{ $filters['tanggal_akhir'] ?? '' }}"
            >
        </div>

        <button type="submit" class="btn">
            Terapkan Filter
        </button>

        <a href="{{ route('owner.reports') }}" class="btn reset">
            Reset
        </a>
    </form>

    <div class="cards">
        <div class="card">
            <div class="card-label">Total Omzet</div>
            <div class="card-value">
                Rp {{ number_format((float) $totalOmzet, 0, ',', '.') }}
            </div>
        </div>

        <div class="card">
            <div class="card-label">Jumlah Transaksi</div>
            <div class="card-value">
                {{ number_format($jumlahTransaksi, 0, ',', '.') }}
            </div>
        </div>

        <div class="card">
            <div class="card-label">Jumlah Produk Terjual</div>
            <div class="card-value">
                {{ number_format($jumlahProdukTerjual, 0, ',', '.') }}
            </div>
        </div>
    </div>

    <div class="section">
        <h2>Riwayat Transaksi</h2>

        <div class="table-wrapper">
            <table>
                <thead>
                    <tr>
                        <th>No.</th>
                        <th>Tanggal</th>
                        <th>Kasir</th>
                        <th>Detail Produk</th>
                        <th>Metode Bayar</th>
                        <th>Total</th>
                        <th>Status</th>
                    </tr>
                </thead>

                <tbody>
                    @forelse ($penjualan as $sale)
                        <tr>
                            <td>
                                {{ $penjualan->firstItem() + $loop->index }}
                            </td>

                            <td>
                                {{ $sale->tanggal
                                    ? $sale->tanggal->format('d-m-Y H:i')
                                    : '-' }}
                            </td>

                            <td>
                                {{ $sale->user->nama
                                    ?? $sale->user->name
                                    ?? '-' }}
                            </td>

                            <td>
                                @forelse ($sale->saleDetails as $detail)
                                    <div>
                                        {{ $detail->product->nama_produk
                                            ?? 'Produk dihapus' }}
                                        × {{ $detail->jumlah }}
                                    </div>
                                @empty
                                    -
                                @endforelse
                            </td>

                            <td>{{ $sale->metode_bayar ?? '-' }}</td>

                            <td>
                                Rp {{ number_format((float) $sale->total, 0, ',', '.') }}
                            </td>

                            <td>{{ $sale->status ?? '-' }}</td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="7" class="empty">
                                Belum ada transaksi pada periode ini.
                            </td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>

        <div class="pagination">
            {{ $penjualan->links() }}
        </div>
    </div>

</div>
</body>
</html>
