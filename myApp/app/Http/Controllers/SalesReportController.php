<?php

namespace App\Http\Controllers;

use App\Models\Sale;
use Illuminate\Http\Request;
use Illuminate\View\View;

class SalesReportController extends Controller
{
    public function index(Request $request): View
    {
        $filters = $request->validate([
            'tanggal_mulai' => ['nullable', 'date'],
            'tanggal_akhir' => [
                'nullable',
                'date',
                'after_or_equal:tanggal_mulai',
            ],
        ]);

        $query = Sale::query()
            ->with(['user', 'saleDetails.product'])
            ->when(
                ! empty($filters['tanggal_mulai']),
                fn ($q) => $q->whereDate(
                    'tanggal',
                    '>=',
                    $filters['tanggal_mulai']
                )
            )
            ->when(
                ! empty($filters['tanggal_akhir']),
                fn ($q) => $q->whereDate(
                    'tanggal',
                    '<=',
                    $filters['tanggal_akhir']
                )
            );

        $totalOmzet = (clone $query)->sum('total');
        $jumlahTransaksi = (clone $query)->count();

        $jumlahProdukTerjual = (clone $query)
            ->withSum('saleDetails as total_barang', 'jumlah')
            ->get()
            ->sum('total_barang');

        $penjualan = (clone $query)
            ->orderByDesc('tanggal')
            ->orderByDesc('id')
            ->paginate(10)
            ->withQueryString();

        return view('owner.reports.index', compact(
            'penjualan',
            'totalOmzet',
            'jumlahTransaksi',
            'jumlahProdukTerjual',
            'filters'
        ));
    }
}
