<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Product;
use App\Models\Game;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    public function index()
    {
        $products = Product::with('game')->get();
        return view('admin.products.index', compact('products'));
    }

    public function create()
    {
        $games = Game::all();
        return view('admin.products.create', compact('games'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'game_id' => 'required|exists:games,id',
            'name' => 'required|string|max:255',
            'price' => 'required|numeric|min:0',
        ]);

        Product::create($request->all());

        return redirect()->route('admin.product.index')->with('success', 'Produk nominal berhasil ditambahkan!');
    }
}