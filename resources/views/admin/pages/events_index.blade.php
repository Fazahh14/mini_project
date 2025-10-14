@extends('admin.layouts.app')

@section('title', 'Kelola Event')
@section('page-title', 'Kelola Event Festival')

@push('styles')
<link href="{{ asset('css/admin/events.css') }}" rel="stylesheet">
@endpush

@section('content')
<div class="page-header d-flex justify-content-between align-items-center mb-4">
    <h1 class="dashboard-title">Kelola Event</h1>
    <a href="{{ route('admin.events.create') }}" class="btn btn-primary">
        <i class="bi bi-plus-lg"></i> Tambah Event
    </a>
</div>

<!-- Filter & Search -->
<div class="card mb-4 p-3 shadow-sm border-0">
    <form method="GET" action="{{ route('admin.events.index') }}" class="row g-3 align-items-center">
        <div class="col-md-4">
            <input type="text" name="search" class="form-control" placeholder="Cari nama event..." value="{{ request('search') }}">
        </div>
        <div class="col-md-3">
            <select name="status" class="form-select">
                <option value="">Semua Status</option>
                <option value="aktif" {{ request('status') == 'aktif' ? 'selected' : '' }}>Aktif</option>
                <option value="nonaktif" {{ request('status') == 'nonaktif' ? 'selected' : '' }}>Nonaktif</option>
                <option value="selesai" {{ request('status') == 'selesai' ? 'selected' : '' }}>Selesai</option>
            </select>
        </div>
        <div class="col-md-2">
            <button class="btn btn-outline-primary w-100">
                <i class="bi bi-search"></i> Cari
            </button>
        </div>
    </form>
</div>

<!-- Tabel Event -->
<div class="card shadow-sm border-0">
    <div class="card-body">
        <table class="table table-hover align-middle">
            <thead>
                <tr>
                    <th>#</th>
                    <th>Nama Event</th>
                    <th>Tanggal</th>
                    <th>Lokasi</th>
                    <th>Status</th>
                    <th>Tiket Terjual</th>
                    <th>Aksi</th>
                </tr>
            </thead>
            <tbody>
                @forelse($events as $event)
                <tr>
                    <td>{{ $loop->iteration }}</td>
                    <td class="fw-semibold">{{ $event->nama_event }}</td>
                    <td>{{ \Carbon\Carbon::parse($event->tanggal_event)->format('d M Y') }}</td>
                    <td>{{ $event->lokasi }}</td>
                    <td>
                        <span class="badge 
                            @if($event->status == 'aktif') bg-success 
                            @elseif($event->status == 'nonaktif') bg-secondary 
                            @else bg-warning text-dark @endif">
                            {{ ucfirst($event->status) }}
                        </span>
                    </td>
                    <td>{{ $event->tiket_terjual }}</td>
                    <td>
                        <a href="{{ route('admin.events.edit', $event->id) }}" class="btn btn-sm btn-warning">
                            <i class="bi bi-pencil"></i>
                        </a>
                        <form action="{{ route('admin.events.destroy', $event->id) }}" method="POST" class="d-inline">
                            @csrf
                            @method('DELETE')
                            <button onclick="return confirm('Hapus event ini?')" class="btn btn-sm btn-danger">
                                <i class="bi bi-trash"></i>
                            </button>
                        </form>
                    </td>
                </tr>
                @empty
                <tr>
                    <td colspan="7" class="text-center text-muted py-4">Belum ada event yang tersedia.</td>
                </tr>
                @endforelse
            </tbody>
        </table>

        <div class="d-flex justify-content-end mt-3">
            {{ $events->links() }}
        </div>
    </div>
</div>
@endsection
