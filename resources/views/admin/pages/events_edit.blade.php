@extends('admin.layouts.app')

@section('title', 'Edit Event')
@section('page-title', 'Edit Data Event')

@section('content')
<div class="card shadow-sm border-0">
    <div class="card-body">
        <form action="{{ route('admin.events.update', $event->id) }}" method="POST" enctype="multipart/form-data">
            @csrf
            @method('PUT')

            <div class="mb-3">
                <label class="form-label">Nama Event</label>
                <input type="text" name="nama_event" class="form-control" value="{{ $event->nama_event }}" required>
            </div>

            <div class="mb-3">
                <label class="form-label">Tanggal Event</label>
                <input type="date" name="tanggal_event" class="form-control" value="{{ $event->tanggal_event }}" required>
            </div>

            <div class="mb-3">
                <label class="form-label">Lokasi</label>
                <input type="text" name="lokasi" class="form-control" value="{{ $event->lokasi }}" required>
            </div>

            <div class="mb-3">
                <label class="form-label">Deskripsi</label>
                <textarea name="deskripsi" class="form-control" rows="4">{{ $event->deskripsi }}</textarea>
            </div>

            <div class="mb-3">
                <label class="form-label">Harga Tiket (Rp)</label>
                <input type="number" name="harga_tiket" class="form-control" value="{{ $event->harga_tiket }}" required>
            </div>

            <div class="mb-3">
                <label class="form-label">Status</label>
                <select name="status" class="form-select">
                    <option value="aktif" {{ $event->status == 'aktif' ? 'selected' : '' }}>Aktif</option>
                    <option value="nonaktif" {{ $event->status == 'nonaktif' ? 'selected' : '' }}>Nonaktif</option>
                    <option value="selesai" {{ $event->status == 'selesai' ? 'selected' : '' }}>Selesai</option>
                </select>
            </div>

            <div class="mb-3">
                <label class="form-label">Gambar Event</label><br>
                @if($event->gambar)
                    <img src="{{ asset('storage/' . $event->gambar) }}" alt="Event Image" class="img-thumbnail mb-2" style="width: 120px;">
                @endif
                <input type="file" name="gambar" class="form-control">
            </div>

            <div class="text-end">
                <a href="{{ route('admin.events.index') }}" class="btn btn-secondary">Kembali</a>
                <button type="submit" class="btn btn-success">Perbarui Event</button>
            </div>
        </form>
    </div>
</div>
@endsection
