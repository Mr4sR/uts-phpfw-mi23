@extends('layouts.app')

@section('content')

<div class="card shadow-sm">
    <div class="card-header bg-warning">
        Edit Game
    </div>
    <div class="card-body">
        <form action="{{ route('games.update', $game->id) }}" method="POST">
            @csrf
            @method('PUT')

            <div class="mb-3">
                <label class="form-label">Judul Game</label>
                <input type="text" name="title" class="form-control" value="{{ $game->title }}" required>
            </div>

            <div class="mb-3">
                <label class="form-label">Developer</label>
                <input type="text" name="developer" class="form-control" value="{{ $game->developer }}" required>
            </div>

            <div class="mb-3">
                <label class="form-label">Genre</label>
                <input type="text" name="genre" class="form-control" value="{{ $game->genre }}" required>
            </div>

            <div class="mb-3">
                <label class="form-label">Harga</label>
                <input type="number" name="price" class="form-control" value="{{ $game->price }}" required>
            </div>

            <div class="mb-3">
                <label class="form-label">Tanggal Rilis</label>
                <input type="date" name="release_date" class="form-control" value="{{ $game->release_date }}" required>
            </div>

            <div class="d-flex justify-content-between">
                <a href="{{ route('games.index') }}" class="btn btn-secondary">Kembali</a>
                <button class="btn btn-warning">Update</button>
            </div>
        </form>
    </div>
</div>

@endsection
