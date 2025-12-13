@extends('layouts.app')

@section('content')

<div class="card shadow-sm">
    <div class="card-header bg-primary text-white">
        Tambah Game
    </div>
    <div class="card-body">
        <form action="{{ route('games.store') }}" method="POST">
            @csrf

            <div class="mb-3">
                <label class="form-label">Judul Game</label>
                <input type="text" name="title" class="form-control" required>
            </div>

            <div class="mb-3">
                <label class="form-label">Developer</label>
                <input type="text" name="developer" class="form-control" required>
            </div>

            <div class="mb-3">
                <label class="form-label">Genre</label>
                <input type="text" name="genre" class="form-control" required>
            </div>

            <div class="mb-3">
                <label class="form-label">Harga</label>
                <input type="number" name="price" class="form-control" required>
            </div>

            <div class="mb-3">
                <label class="form-label">Tanggal Rilis</label>
                <input type="date" name="release_date" class="form-control" required>
            </div>

            <div class="d-flex justify-content-between">
                <a href="{{ route('games.index') }}" class="btn btn-secondary">Kembali</a>
                <button class="btn btn-success">Simpan</button>
            </div>
        </form>
    </div>
</div>

@endsection
