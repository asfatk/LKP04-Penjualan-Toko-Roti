<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Models\Sale;
use App\Models\Stock;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class SaleController extends Controller
{
    /**
     * Menampilkan halaman kasir.
     */
    public function create()
    {
        $products = Product::with('stock')
            ->orderBy('nama_produk')
            ->get();

        return view('sales.create', compact('products'));
    }

    /**
     * Menyimpan transaksi penjualan.
     */
    public function store(Request $request)
    {
        $request->validate([
            'product_id' => ['required', 'array'],
            'product_id.*' => ['required', 'exists:products,id'],

            'jumlah' => ['required', 'array'],
            'jumlah.*' => ['required', 'integer', 'min:0'],

            'metode_bayar' => ['required', 'in:Cash,QRIS,Transfer'],

            'jumlah_bayar' => ['required', 'numeric', 'min:0'],
        ]);

        try {

            $sale = DB::transaction(function () use ($request) {

                $total = 0;
                $details = [];

                foreach ($request->product_id as $index => $productId) {

                    $jumlah = (int) $request->jumlah[$index];

                    if ($jumlah <= 0) {
                        continue;
                    }

                    $product = Product::findOrFail($productId);

                    $stock = Stock::where('product_id', $productId)
                        ->lockForUpdate()
                        ->first();

                    if (!$stock) {
                        throw new \Exception(
                            "Stok {$product->nama_produk} belum tersedia."
                        );
                    }

                    if ($stock->jumlah < $jumlah) {
                        throw new \Exception(
                            "Stok {$product->nama_produk} tidak cukup. Sisa stok: {$stock->jumlah}."
                        );
                    }

                    $harga = (float) $product->harga;

                    $subtotal = $harga * $jumlah;

                    $total += $subtotal;

                    $details[] = [
                        'product_id' => $product->id,
                        'jumlah' => $jumlah,
                        'harga' => $harga,
                        'subtotal' => $subtotal,
                    ];

                    // Stok otomatis berkurang
                    $stock->decrement('jumlah', $jumlah);
                }

                if (empty($details)) {
                    throw new \Exception(
                        'Silakan pilih minimal satu produk.'
                    );
                }

                $jumlahBayar = (float) $request->jumlah_bayar;

                if (
                    $request->metode_bayar === 'Cash'
                    && $jumlahBayar < $total
                ) {
                    throw new \Exception(
                        'Uang pembayaran kurang.'
                    );
                }

                if ($request->metode_bayar !== 'Cash') {
                    $jumlahBayar = $total;
                }

                $sale = Sale::create([
                    'user_id' => auth()->id(),
                    'tanggal' => now(),
                    'total' => $total,
                    'metode_bayar' => $request->metode_bayar,
                    'status' => 'Selesai',
                ]);

                foreach ($details as $detail) {
                    $sale->saleDetails()->create($detail);
                }

                return $sale;
            });

            return redirect()
                ->route('admin.sales.receipt', $sale)
                ->with([
                    'jumlah_bayar' => $request->metode_bayar === 'Cash'
                        ? (float) $request->jumlah_bayar
                        : (float) $sale->total,

                    'kembalian' => $request->metode_bayar === 'Cash'
                        ? (float) $request->jumlah_bayar - (float) $sale->total
                        : 0,
                ]);

        } catch (\Exception $e) {

            return back()
                ->withInput()
                ->withErrors([
                    'transaksi' => $e->getMessage(),
                ]);
        }
    }

    /**
     * Riwayat penjualan.
     */
    public function history()
    {
        $sales = Sale::with('user')
            ->withCount('saleDetails')
            ->latest()
            ->get();

        return view('sales.history', compact('sales'));
    }

    /**
     * Detail transaksi.
     */
    public function show(Sale $sale)
    {
        $sale->load([
            'user',
            'saleDetails.product',
        ]);

        return view('sales.show', compact('sale'));
    }

    /**
     * Struk transaksi.
     */
    public function receipt(Sale $sale)
    {
        $sale->load([
            'user',
            'saleDetails.product',
        ]);

        return view('sales.receipt', compact('sale'));
    }
}