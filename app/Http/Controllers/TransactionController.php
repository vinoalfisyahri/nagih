<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Models\Transaction;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class TransactionController extends Controller
{
    // Menyimpan pesanan top-up yang baru di-submit user
    public function store(Request $request)
    {
        $request->validate([
            'product_id' => 'required|exists:products,id',
            'target_user_id' => 'required|string|max:255',
            'target_zone_id' => 'nullable|string|max:255',
        ]);

        $product = Product::findOrFail($request->product_id);

        // Buat nomor invoice unik
        $invoiceId = 'INV-' . strtoupper(Str::random(10));

        // Simpan transaksi ke database
        $transaction = Transaction::create([
            'invoice_id' => $invoiceId,
            'product_id' => $product->id,
            'target_user_id' => $request->target_user_id,
            'target_zone_id' => $request->target_zone_id,
            'amount' => $product->price,
            'status' => 'pending', // Status awal pending
        ]);

        // Arahkan ke halaman pembayaran / detail invoice
        return redirect()->route('transaction.show', $transaction->invoice_id)
                         ->with('success', 'Pesanan berhasil dibuat, silakan lakukan pembayaran.');
    }

    // Menampilkan halaman detail transaksi / instruksi pembayaran
    public function show($invoice_id)
    {
        $transaction = Transaction::with('product.game')->where('invoice_id', $invoice_id)->firstOrFail();
        
        return view('transactions.show', compact('transaction'));
    }
}