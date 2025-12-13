<?php

namespace App\Http\Controllers;

use App\Models\Game;
use Illuminate\Http\Request;

class GameController extends Controller
{
    /**
     * Menampilkan daftar game
     */
    public function index()
    {
        // Ambil semua data game dari database
        $games = Game::orderBy('created_at', 'desc')->get();

        // Kirim data ke view games/index.blade.php
        return view('games.index', compact('games'));
    }

    /**
     * Menampilkan form tambah game
     */
    public function create()
    {
        return view('games.create');
    }

    /**
     * Menyimpan data game baru ke database
     */
    public function store(Request $request)
    {
        // Validasi input (biar aman & rapi)
        $request->validate([
            'title'        => 'required|string|max:255',
            'developer'    => 'required|string|max:255',
            'genre'        => 'required|string|max:100',
            'price'        => 'required|integer|min:0',
            'release_date' => 'required|date',
        ]);

        // Simpan ke database
        Game::create([
            'title'        => $request->title,
            'developer'    => $request->developer,
            'genre'        => $request->genre,
            'price'        => $request->price,
            'release_date' => $request->release_date,
        ]);

        // Kembali ke halaman index
        return redirect()
            ->route('games.index')
            ->with('success', 'Game berhasil ditambahkan');
    }

    /**
     * Menampilkan form edit game
     */
    public function edit(Game $game)
    {
        return view('games.edit', compact('game'));
    }

    /**
     * Update data game
     */
    public function update(Request $request, Game $game)
    {
        // Validasi input
        $request->validate([
            'title'        => 'required|string|max:255',
            'developer'    => 'required|string|max:255',
            'genre'        => 'required|string|max:100',
            'price'        => 'required|integer|min:0',
            'release_date' => 'required|date',
        ]);

        // Update data
        $game->update([
            'title'        => $request->title,
            'developer'    => $request->developer,
            'genre'        => $request->genre,
            'price'        => $request->price,
            'release_date' => $request->release_date,
        ]);

        return redirect()
            ->route('games.index')
            ->with('success', 'Game berhasil diperbarui');
    }

    /**
     * Menghapus data game
     */
    public function destroy(Game $game)
    {
        $game->delete();

        return redirect()
            ->route('games.index')
            ->with('success', 'Game berhasil dihapus');
    }
}
