@extends('admin.layouts.app')

@section('title', 'Tambah Customer')
@section('page-title', 'Tambah Customer')

@section('content')
<div class="card shadow-sm">
    <div class="card-header bg-primary text-white d-flex justify-content-between align-items-center">
        <h4 class="mb-0">Tambah Customer</h4>
    </div>

    <div class="card-body">
        <form action="{{ route('admin.customers.store') }}" method="POST" class="p-3">
            @csrf

            <table class="table table-borderless">
                <tr>
                    <th style="width: 200px;">Nama</th>
                    <td>
                        <input type="text" name="name" class="form-control" placeholder="Masukkan nama lengkap" required>
                    </td>
                </tr>
                <tr>
                    <th>Email</th>
                    <td>
                        <input type="email" name="email" class="form-control" placeholder="contoh: user@example.com" required>
                    </td>
                </tr>
                <tr>
                    <th>Password</th>
                    <td>
                        <input type="password" name="password" class="form-control" placeholder="Masukkan password" required>
                    </td>
                </tr>
            </table>

            <div class="text-end mt-3">
                <button type="submit" class="btn btn-success px-4">💾 Simpan</button>
                <a href="{{ route('admin.customers') }}" class="btn btn-secondary px-4">↩ Kembali</a>
            </div>
        </form>
    </div>
</div>
@endsection
