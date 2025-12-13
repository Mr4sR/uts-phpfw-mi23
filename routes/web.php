<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\GameController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
| Di file ini kita mengatur URL (alamat website) dan
| menghubungkannya ke Controller
|--------------------------------------------------------------------------
*/

// Halaman utama langsung diarahkan ke halaman daftar game
Route::get('/', function () {
    return redirect()->route('games.index');
});

// Resource route untuk Game (CRUD)
// Otomatis membuat route:
// index, create, store, edit, update, destroy
Route::resource('games', GameController::class);
