<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Models\Stock;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\View\View;

class ProductController extends Controller
{
    public function index(): View
    {
        $products = Product::with('stock')
            ->orderBy('nama_produk')
            ->get();

        return view('products.index', compact('products'));
    }


    public function create(): View
    {
        return view('products.create');
    }


    public function store(Request $request): RedirectResponse
    {
        $validated = $request->validate([
            'nama_produk' => ['required', 'string', 'max:255'],
            'harga' => ['required', 'numeric', 'min:0'],
            'kategori' => ['required', 'string', 'max:100'],
            'deskripsi' => ['nullable', 'string'],
            'jumlah_stok' => ['required', 'integer', 'min:0'],
            'satuan' => ['required', 'string', 'max:50'],
            'keterangan_stok' => ['nullable', 'string'],
        ], [
            'nama_produk.required' => 'Nama produk wajib diisi.',
            'harga.required' => 'Harga produk wajib diisi.',
            'harga.numeric' => 'Harga harus berupa angka.',
            'harga.min' => 'Harga tidak boleh kurang dari 0.',
            'kategori.required' => 'Kategori produk wajib diisi.',
            'jumlah_stok.required' => 'Jumlah stok wajib diisi.',
            'jumlah_stok.integer' => 'Jumlah stok harus berupa angka bulat.',
            'jumlah_stok.min' => 'Jumlah stok tidak boleh kurang dari 0.',
            'satuan.required' => 'Satuan stok wajib diisi.',
        ]);

        $product = Product::create([
            'nama_produk' => $validated['nama_produk'],
            'harga' => $validated['harga'],
            'kategori' => $validated['kategori'],
            'deskripsi' => $validated['deskripsi'] ?? null,
        ]);

        Stock::create([
            'product_id' => $product->id,
            'jumlah' => $validated['jumlah_stok'],
            'satuan' => $validated['satuan'],
            'keterangan' => $validated['keterangan_stok'] ?? null,
        ]);

        return redirect()
            ->route('admin.products.index')
            ->with('success', 'Produk berhasil ditambahkan.');
    }


    public function show(Product $product): View
    {
        $product->load('stock');

        return view('products.show', compact('product'));
    }


    public function edit(Product $product): View
    {
        $product->load('stock');

        return view('products.edit', compact('product'));
    }


    public function update(
        Request $request,
        Product $product
    ): RedirectResponse {

        $validated = $request->validate([
            'nama_produk' => ['required', 'string', 'max:255'],
            'harga' => ['required', 'numeric', 'min:0'],
            'kategori' => ['required', 'string', 'max:100'],
            'deskripsi' => ['nullable', 'string'],
            'jumlah_stok' => ['required', 'integer', 'min:0'],
            'satuan' => ['required', 'string', 'max:50'],
            'keterangan_stok' => ['nullable', 'string'],
        ], [
            'nama_produk.required' => 'Nama produk wajib diisi.',
            'harga.required' => 'Harga produk wajib diisi.',
            'harga.numeric' => 'Harga harus berupa angka.',
            'harga.min' => 'Harga tidak boleh kurang dari 0.',
            'kategori.required' => 'Kategori produk wajib diisi.',
            'jumlah_stok.required' => 'Jumlah stok wajib diisi.',
            'jumlah_stok.integer' => 'Jumlah stok harus berupa angka bulat.',
            'jumlah_stok.min' => 'Jumlah stok tidak boleh kurang dari 0.',
            'satuan.required' => 'Satuan stok wajib diisi.',
        ]);

        // Update data produk
        $product->update([
            'nama_produk' => $validated['nama_produk'],
            'harga' => $validated['harga'],
            'kategori' => $validated['kategori'],
            'deskripsi' => $validated['deskripsi'] ?? null,
        ]);

        // Update atau buat data stok
        Stock::updateOrCreate(
            [
                'product_id' => $product->id,
            ],
            [
                'jumlah' => $validated['jumlah_stok'],
                'satuan' => $validated['satuan'],
                'keterangan' => $validated['keterangan_stok'] ?? null,
            ]
        );

        return redirect()
            ->route('admin.products.index')
            ->with('success', 'Produk dan stok berhasil diperbarui.');
    }


    public function destroy(Product $product): RedirectResponse
    {
        if ($product->saleDetails()->exists()) {
            return redirect()
                ->route('admin.products.index')
                ->with('error', 'Produk tidak dapat dihapus karena sudah pernah digunakan dalam transaksi.');
        }

        if ($product->stock) {
            $product->stock->delete();
        }

        $product->delete();

        return redirect()
            ->route('admin.products.index')
            ->with('success', 'Produk berhasil dihapus.');
    }
}