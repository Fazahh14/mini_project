@extends('admin.layouts.app')

@section('title', 'Tambah Event')
@section('page-title', 'Tambah Event Baru')

@section('content')
<div class="card shadow-sm border-0">
    <div class="card-body">
        <form action="{{ route('admin.events.store') }}" method="POST" enctype="multipart/form-data">
            @csrf
            <div class="mb-3">
                <label class="form-label">Nama Event</label>
                <input type="text" name="nama_event" class="form-control" required>
            </div>

            <div class="mb-3">
                <label class="form-label">Tanggal Event</label>
                <input type="date" name="tanggal_event" class="form-control" required>
            </div>

            <div class="mb-3">
                <label class="form-label">Lokasi</label>
                <input type="text" name="lokasi" class="form-control" required>
            </div>

            <div class="mb-3">
                <label class="form-label">Deskripsi</label>
                <textarea name="deskripsi" class="form-control" rows="4"></textarea>
            </div>

            <div class="mb-3">
                <label class="form-label">Harga Tiket (Rp)</label>
                <input type="number" name="harga_tiket" class="form-control" required>
            </div>

            <div class="mb-3">
                <label class="form-label">Status</label>
                <select name="status" class="form-select">
                    <option value="aktif">Aktif</option>
                    <option value="nonaktif">Nonaktif</option>
                    <option value="selesai">Selesai</option>
                </select>
            </div>

            <div class="mb-3">
                <label class="form-label">Gambar Event</label>
                <input type="file" name="gambar" class="form-control">
            </div>

            <div class="text-end">
                <a href="{{ route('admin.events.index') }}" class="btn btn-secondary">Kembali</a>
                <button type="submit" class="btn btn-primary">Simpan Event</button>
            </div>
        </form>
    </div>
</div>
@endsection
