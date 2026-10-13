<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>Kasir - Modern Bakery Menganto</title>

    <style>
        * {
            box-sizing: border-box;
        }

        body {
            margin: 0;
            font-family: Arial, Helvetica, sans-serif;
            background: #f7f4ee;
            color: #3d2b1f;
        }

        .container {
            width: 92%;
            max-width: 1200px;
            margin: 35px auto;
        }

        .header {
            display: flex;
            justify-content: space-between;
            align-items: center;
            margin-bottom: 25px;
        }

        .header h1 {
            margin: 0;
            font-size: 30px;
        }

        .header p {
            margin-top: 7px;
            color: #777;
        }

        .back-btn {
            text-decoration: none;
            background: white;
            color: #5a3825;
            padding: 11px 18px;
            border-radius: 8px;
            border: 1px solid #ddd;
        }

        .card {
            background: white;
            border-radius: 14px;
            padding: 25px;
            margin-bottom: 20px;
            box-shadow: 0 3px 12px rgba(0,0,0,0.06);
        }

        .card h2 {
            margin-top: 0;
            font-size: 20px;
        }

        .product-picker {
            display: flex;
            gap: 12px;
            align-items: end;
        }

        .field {
            flex: 1;
        }

        label {
            display: block;
            font-weight: bold;
            margin-bottom: 8px;
        }

        select,
        input {
            width: 100%;
            padding: 13px;
            border: 1px solid #d8d1c8;
            border-radius: 8px;
            font-size: 15px;
            background: white;
        }

        button {
            border: none;
            cursor: pointer;
            border-radius: 8px;
            padding: 13px 20px;
            font-size: 15px;
            font-weight: bold;
        }

        .btn-add {
            background: #6b442f;
            color: white;
            min-width: 120px;
        }

        .btn-add:hover {
            background: #563624;
        }

        .cart-table {
            width: 100%;
            border-collapse: collapse;
        }

        .cart-table th {
            background: #f4eee6;
            padding: 14px;
            text-align: left;
        }

        .cart-table td {
            padding: 14px;
            border-bottom: 1px solid #eee;
        }

        .qty-control {
            display: flex;
            align-items: center;
            gap: 8px;
        }

        .qty-btn {
            width: 32px;
            height: 32px;
            padding: 0;
            background: #eee5dc;
            color: #4b3020;
            font-size: 18px;
        }

        .qty-number {
            min-width: 25px;
            text-align: center;
            font-weight: bold;
        }

        .btn-remove {
            background: #f7dddd;
            color: #a32929;
            padding: 8px 12px;
        }

        .empty-cart {
            text-align: center;
            color: #888;
            padding: 30px;
        }

        .summary {
            display: flex;
            justify-content: flex-end;
        }

        .summary-box {
            width: 400px;
        }

        .total-box {
            background: #f4eee6;
            padding: 20px;
            border-radius: 10px;
            margin-bottom: 20px;
        }

        .total-label {
            color: #777;
            margin-bottom: 5px;
        }

        .total-value {
            font-size: 32px;
            font-weight: bold;
            color: #6b2d1c;
        }

        .payment-grid {
            display: grid;
            grid-template-columns: 1fr 1fr;
            gap: 15px;
        }

        .change-box {
            margin-top: 15px;
            background: #edf7ee;
            border-radius: 10px;
            padding: 18px;
        }

        .change-label {
            color: #666;
        }

        .change-value {
            font-size: 25px;
            font-weight: bold;
            color: #2f7d32;
            margin-top: 5px;
        }

        .btn-payment {
            width: 100%;
            margin-top: 20px;
            background: #6b442f;
            color: white;
            font-size: 17px;
            padding: 15px;
        }

        .btn-payment:hover {
            background: #563624;
        }

        .error-box {
            background: #fdecec;
            color: #a32929;
            padding: 15px;
            border-radius: 8px;
            margin-bottom: 20px;
        }

        @media (max-width: 768px) {
            .product-picker {
                flex-direction: column;
                align-items: stretch;
            }

            .payment-grid {
                grid-template-columns: 1fr;
            }

            .summary-box {
                width: 100%;
            }

            .cart-table {
                font-size: 13px;
            }
        }
    </style>
</head>

<body>

<div class="container">

    {{-- HEADER --}}
    <div class="header">
        <div>
            <h1>Transaksi Penjualan</h1>
            <p>Silakan pilih produk yang dibeli pelanggan.</p>
        </div>

        <a href="{{ route('admin.dashboard') }}" class="back-btn">
            ← Dashboard
        </a>
    </div>


    {{-- ERROR --}}
    @if ($errors->any())
        <div class="error-box">
            <strong>Transaksi gagal:</strong>

            <ul style="margin-bottom: 0;">
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif


    <form action="{{ route('admin.sales.store') }}" method="POST" id="cashierForm">
        @csrf

        {{-- PILIH PRODUK --}}
        <div class="card">

            <h2>Pilih Produk</h2>

            <div class="product-picker">

                <div class="field">
                    <label for="productSelect">
                        Produk
                    </label>

                    <select id="productSelect">

                        <option value="">
                            -- Pilih Produk --
                        </option>

                        @foreach ($products as $product)

                            <option
                                value="{{ $product->id }}"
                                data-name="{{ $product->nama_produk }}"
                                data-price="{{ $product->harga }}"
                                data-stock="{{ $product->stock?->jumlah ?? 0 }}"
                            >
                                {{ $product->nama_produk }}
                                - Rp {{ number_format($product->harga, 0, ',', '.') }}
                                (Stok: {{ $product->stock?->jumlah ?? 0 }})
                            </option>

                        @endforeach

                    </select>
                </div>

                <button
                    type="button"
                    class="btn-add"
                    onclick="addProduct()"
                >
                    + Tambah
                </button>

            </div>

        </div>


        {{-- KERANJANG --}}
        <div class="card">

            <h2>Keranjang Belanja</h2>

            <table class="cart-table">

                <thead>
                    <tr>
                        <th>Produk</th>
                        <th>Harga</th>
                        <th>Jumlah</th>
                        <th>Subtotal</th>
                        <th>Aksi</th>
                    </tr>
                </thead>

                <tbody id="cartBody">

                    <tr id="emptyCart">
                        <td colspan="5" class="empty-cart">
                            Belum ada produk yang dipilih.
                        </td>
                    </tr>

                </tbody>

            </table>

        </div>


        {{-- PEMBAYARAN --}}
        <div class="card">

            <h2>Pembayaran</h2>

            <div class="summary">

                <div class="summary-box">

                    <div class="total-box">

                        <div class="total-label">
                            Total Belanja
                        </div>

                        <div class="total-value" id="totalDisplay">
                            Rp 0
                        </div>

                    </div>


                    <div class="payment-grid">

                        <div>
                            <label for="metode_bayar">
                                Metode Pembayaran
                            </label>

                            <select
                                name="metode_bayar"
                                id="metode_bayar"
                                onchange="paymentMethodChanged()"
                            >
                                <option value="Cash">
                                    Cash
                                </option>

                                <option value="QRIS">
                                    QRIS
                                </option>

                                <option value="Transfer">
                                    Transfer
                                </option>
                            </select>
                        </div>


                        <div>
                            <label for="jumlah_bayar">
                                Uang Dibayar
                            </label>

                            <input
                                type="number"
                                name="jumlah_bayar"
                                id="jumlah_bayar"
                                value="0"
                                min="0"
                                oninput="calculateChange()"
                            >
                        </div>

                    </div>


                    <div class="change-box">

                        <div class="change-label">
                            Kembalian
                        </div>

                        <div
                            class="change-value"
                            id="changeDisplay"
                        >
                            Rp 0
                        </div>

                    </div>


                    <button
                        type="submit"
                        class="btn-payment"
                    >
                        PROSES PEMBAYARAN
                    </button>

                </div>

            </div>

        </div>

    </form>

</div>


<script>

    let cart = [];

    /*
    |--------------------------------------------------------------------------
    | FORMAT RUPIAH
    |--------------------------------------------------------------------------
    */

    function rupiah(number) {

        return 'Rp ' + Number(number).toLocaleString('id-ID');

    }


    /*
    |--------------------------------------------------------------------------
    | TAMBAH PRODUK
    |--------------------------------------------------------------------------
    */

    function addProduct() {

        const select = document.getElementById('productSelect');

        const option = select.options[select.selectedIndex];

        if (!select.value) {

            alert('Silakan pilih produk terlebih dahulu.');

            return;
        }

        const id = Number(select.value);

        const name = option.dataset.name;

        const price = Number(option.dataset.price);

        const stock = Number(option.dataset.stock);


        if (stock <= 0) {

            alert('Stok produk ini habis.');

            return;
        }


        // Kalau produk sudah ada di keranjang
        const existing = cart.find(item => item.id === id);

        if (existing) {

            if (existing.qty >= stock) {

                alert('Jumlah melebihi stok yang tersedia.');

                return;
            }

            existing.qty++;

        } else {

            cart.push({
                id: id,
                name: name,
                price: price,
                stock: stock,
                qty: 1
            });

        }


        renderCart();

        select.value = '';

    }


    /*
    |--------------------------------------------------------------------------
    | TAMPILKAN KERANJANG
    |--------------------------------------------------------------------------
    */

    function renderCart() {

        const body = document.getElementById('cartBody');

        body.innerHTML = '';

        if (cart.length === 0) {

            body.innerHTML = `
                <tr>
                    <td colspan="5" class="empty-cart">
                        Belum ada produk yang dipilih.
                    </td>
                </tr>
            `;

        } else {

            cart.forEach((item, index) => {

                const subtotal = item.price * item.qty;

                body.innerHTML += `

                    <tr>

                        <td>
                            <strong>${item.name}</strong>

                            <input
                                type="hidden"
                                name="product_id[]"
                                value="${item.id}"
                            >
                        </td>

                        <td>
                            ${rupiah(item.price)}
                        </td>

                        <td>

                            <div class="qty-control">

                                <button
                                    type="button"
                                    class="qty-btn"
                                    onclick="decreaseQty(${index})"
                                >
                                    −
                                </button>

                                <span class="qty-number">
                                    ${item.qty}
                                </span>

                                <button
                                    type="button"
                                    class="qty-btn"
                                    onclick="increaseQty(${index})"
                                >
                                    +
                                </button>

                            </div>

                            <input
                                type="hidden"
                                name="jumlah[]"
                                value="${item.qty}"
                            >

                        </td>

                        <td>
                            <strong>
                                ${rupiah(subtotal)}
                            </strong>
                        </td>

                        <td>

                            <button
                                type="button"
                                class="btn-remove"
                                onclick="removeProduct(${index})"
                            >
                                Hapus
                            </button>

                        </td>

                    </tr>

                `;

            });

        }

        calculateTotal();

    }


    /*
    |--------------------------------------------------------------------------
    | TAMBAH JUMLAH
    |--------------------------------------------------------------------------
    */

    function increaseQty(index) {

        const item = cart[index];

        if (item.qty >= item.stock) {

            alert('Jumlah melebihi stok yang tersedia.');

            return;
        }

        item.qty++;

        renderCart();

    }


    /*
    |--------------------------------------------------------------------------
    | KURANGI JUMLAH
    |--------------------------------------------------------------------------
    */

    function decreaseQty(index) {

        if (cart[index].qty > 1) {

            cart[index].qty--;

        } else {

            cart.splice(index, 1);

        }

        renderCart();

    }


    /*
    |--------------------------------------------------------------------------
    | HAPUS PRODUK
    |--------------------------------------------------------------------------
    */

    function removeProduct(index) {

        cart.splice(index, 1);

        renderCart();

    }


    /*
    |--------------------------------------------------------------------------
    | HITUNG TOTAL
    |--------------------------------------------------------------------------
    */

    function calculateTotal() {

        let total = 0;

        cart.forEach(item => {

            total += item.price * item.qty;

        });


        document.getElementById('totalDisplay').innerText =
            rupiah(total);


        calculateChange();

    }


    /*
    |--------------------------------------------------------------------------
    | PEMBAYARAN
    |--------------------------------------------------------------------------
    */

    function paymentMethodChanged() {

        const method =
            document.getElementById('metode_bayar').value;

        const paymentInput =
            document.getElementById('jumlah_bayar');


        const total = getTotal();


        if (method === 'Cash') {

            paymentInput.value = '';

            paymentInput.readOnly = false;

        } else {

            // QRIS dan Transfer otomatis dianggap dibayar sesuai total
            paymentInput.value = total;

            paymentInput.readOnly = true;

        }


        calculateChange();

    }


    /*
    |--------------------------------------------------------------------------
    | HITUNG KEMBALIAN
    |--------------------------------------------------------------------------
    */

    function calculateChange() {

        const total = getTotal();

        const paid =
            Number(
                document.getElementById('jumlah_bayar').value
            ) || 0;


        let change = paid - total;


        if (change < 0) {

            change = 0;

        }


        document.getElementById('changeDisplay').innerText =
            rupiah(change);

    }


    /*
    |--------------------------------------------------------------------------
    | AMBIL TOTAL
    |--------------------------------------------------------------------------
    */

    function getTotal() {

        let total = 0;

        cart.forEach(item => {

            total += item.price * item.qty;

        });

        return total;

    }


    /*
    |--------------------------------------------------------------------------
    | CEGAH SUBMIT KALAU KERANJANG KOSONG
    |--------------------------------------------------------------------------
    */

    document
        .getElementById('cashierForm')
        .addEventListener('submit', function(event) {

            if (cart.length === 0) {

                event.preventDefault();

                alert('Silakan pilih minimal satu produk.');

                return;

            }

            const total = getTotal();

            const paid =
                Number(
                    document.getElementById('jumlah_bayar').value
                ) || 0;

            const method =
                document.getElementById('metode_bayar').value;


            if (method === 'Cash' && paid < total) {

                event.preventDefault();

                alert(
                    'Uang pembayaran masih kurang.'
                );

                return;

            }

        });


</script>

</body>
</html>