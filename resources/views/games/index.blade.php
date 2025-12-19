@extends('layouts.app')

@section('content')

<div class="d-flex justify-content-between align-items-center mb-4 fade-in">
    <h3 class="page-title-gaming">
        <i class="fas fa-list"></i>
        Daftar Game
    </h3>
    <a href="{{ route('games.create') }}" class="btn-gaming btn-primary-gaming">
        <i class="fas fa-plus me-2"></i> Tambah Game
    </a>
</div>

<div class="card-gaming slide-in">
    <div class="card-header-gaming">
        <i class="fas fa-trophy"></i>
        Koleksi Game
    </div>
    <div class="card-body-gaming">
        <div class="table-responsive">
            <table class="table-gaming">
                <thead>
                    <tr>
                        <th><i class="fas fa-heading me-2"></i>Judul</th>
                        <th><i class="fas fa-code me-2"></i>Developer</th>
                        <th><i class="fas fa-tags me-2"></i>Genre</th>
                        <th><i class="fas fa-coins me-2"></i>Harga</th>
                        <th><i class="fas fa-calendar-alt me-2"></i>Tanggal Rilis</th>
                        <th><i class="fas fa-cogs me-2"></i>Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse ($games as $game)
                    <tr>
                        <td data-label="Judul Game">
                            <i class="fas fa-gamepad me-2" style="color: var(--neon-blue);"></i>
                            {{ $game->title }}
                        </td>
                        <td data-label="Developer">{{ $game->developer }}</td>
                        <td data-label="Genre"><span class="genre-badge">{{ $game->genre }}</span></td>
                        <td data-label="Harga"><span class="price-tag">Rp {{ number_format($game->price, 0, ',', '.') }}</span></td>
                        <td data-label="Tanggal Rilis">
                            <i class="fas fa-calendar me-1" style="color: var(--neon-purple);"></i>
                            {{ \Carbon\Carbon::parse($game->release_date)->format('d M Y') }}
                        </td>
                        <td data-label="Aksi">
                            <div class="action-buttons">
                                <a href="{{ route('games.edit', $game->id) }}" class="btn-gaming btn-warning-gaming btn-sm-gaming">
                                    <i class="fas fa-edit"></i>
                                </a>

                                <form id="delete-form-{{ $game->id }}" action="{{ route('games.destroy', $game->id) }}" method="POST" class="d-inline">
                                    @csrf
                                    @method('DELETE')
                                    <button type="button" class="btn-gaming btn-danger-gaming btn-sm-gaming" onclick="confirmDelete('delete-form-{{ $game->id }}', '{{ $game->title }}')">
                                        <i class="fas fa-trash-alt"></i>
                                    </button>
                                </form>
                            </div>
                        </td>
                    </tr>
                    @empty
                    <tr>
                        <td colspan="6">
                            <div class="empty-state">
                                <i class="fas fa-ghost"></i>
                                <p>Belum ada game dalam koleksi</p>
                            </div>
                        </td>
                    </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    </div>
</div>

@endsection
