@extends('layouts.app')

@section('content')

<div class="fade-in">
    <div class="d-flex align-items-center mb-4">
        <a href="{{ route('games.index') }}" class="btn-gaming btn-secondary-gaming me-3">
            <i class="fas fa-arrow-left"></i>
        </a>
        <h3 class="page-title-gaming">
            <i class="fas fa-plus-circle"></i>
            Tambah Game Baru
        </h3>
    </div>

    <div class="card-gaming slide-in">
        <div class="card-header-gaming">
            <i class="fas fa-gamepad"></i>
            Form Tambah Game
        </div>
        <div class="card-body-gaming">
            <form action="{{ route('games.store') }}" method="POST">
                @csrf

                <div class="mb-4">
                    <label class="form-label-gaming">
                        <i class="fas fa-heading"></i>
                        Judul Game
                    </label>
                    <input type="text" name="title" class="form-control-gaming" placeholder="Masukkan judul game..." required>
                </div>

                <div class="mb-4">
                    <label class="form-label-gaming">
                        <i class="fas fa-code"></i>
                        Developer
                    </label>
                    <input type="text" name="developer" class="form-control-gaming" placeholder="Nama developer..." required>
                </div>

                <div class="mb-4">
                    <label class="form-label-gaming">
                        <i class="fas fa-tags"></i>
                        Genre
                    </label>
                    <input type="text" name="genre" class="form-control-gaming" placeholder="Action, RPG, dll..." required>
                </div>

                <div class="mb-4">
                    <label class="form-label-gaming">
                        <i class="fas fa-coins"></i>
                        Harga (Rp)
                    </label>
                    <input type="number" name="price" class="form-control-gaming" placeholder="0" required>
                </div>

                <div class="mb-4">
                    <label class="form-label-gaming">
                        <i class="fas fa-calendar-alt"></i>
                        Tanggal Rilis
                    </label>
                    <input type="date" name="release_date" class="form-control-gaming" required>
                </div>

                <div class="d-flex justify-content-between mt-4">
                    <a href="{{ route('games.index') }}" class="btn-gaming btn-secondary-gaming">
                        <i class="fas fa-times me-2"></i> Batal
                    </a>
                    <button type="submit" class="btn-gaming btn-success-gaming">
                        <i class="fas fa-save me-2"></i> Simpan Game
                    </button>
                </div>
            </form>
        </div>
    </div>
</div>

@endsection
