<?php

namespace App\Http\Controllers;

use App\Models\Game;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index()
    {
        // Mengambil semua data game yang statusnya aktif (is_active = true)
        $games = Game::where('is_active', true)->get();

        // Mengirim data game ke view 'welcome' (atau halaman utama Anda)
        return view('welcome', compact('games'));
    }
}   
