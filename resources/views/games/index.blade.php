@extends('layouts.app')

@section('content')

<div class="d-flex justify-content-between mb-3">
    <h3>Daftar Game</h3>
    <a href="{{ route('games.create') }}" class="btn btn-primary">
        + Tambah Game
    </a>
</div>

<div class="card shadow-sm">
    <div class="card-body">
        <table class="table table-striped table-hover">
            <thead class="table-dark">
                <tr>
                    <th>Judul</th>
                    <th>Developer</th>
                    <th>Genre</th>
                    <th>Harga</th>
                    <th>Tanggal Rilis</th>
                    <th>Aksi</th>
                </tr>
            </thead>
            <tbody>
                @forelse ($games as $game)
                <tr>
                    <td>{{ $game->title }}</td>
                    <td>{{ $game->developer }}</td>
                    <td>{{ $game->genre }}</td>
                    <td>Rp {{ number_format($game->price) }}</td>
                    <td>{{ $game->release_date }}</td>
                    <td>
                        <a href="{{ route('games.edit', $game->id) }}" class="btn btn-sm btn-warning">
                            Edit
                        </a>

                        <form action="{{ route('games.destroy', $game->id) }}" method="POST" class="d-inline">
                            @csrf
                            @method('DELETE')
                            <button class="btn btn-sm btn-danger" onclick="return confirm('Yakin hapus game ini?')">
                                Hapus
                            </button>
                        </form>
                    </td>
                </tr>
                @empty
                <tr>
                    <td colspan="6" class="text-center">Data game belum ada</td>
                </tr>
                @endforelse
            </tbody>
        </table>
    </div>
</div>

@endsection
