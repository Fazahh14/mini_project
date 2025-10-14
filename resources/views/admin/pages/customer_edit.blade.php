@extends('admin.layouts.app')

@section('title', 'Edit Customer')
@section('page-title', 'Edit Data Customer')

@section('content')
<div class="card shadow-sm">
    <div class="card-header bg-primary text-white d-flex justify-content-between align-items-center">
        <h4 class="mb-0">Edit Customer</h4>
    </div>

    <div class="card-body">
        <form action="{{ route('admin.customers.update', $customer->id) }}" method="POST" class="p-3">
            @csrf
            @method('PUT')

            <table class="table table-borderless">
                <tr>
                    <th style="width: 200px;">Nama</th>
                    <td>
                        <input type="text" name="name" value="{{ $customer->name }}" class="form-control" required>
                    </td>
                </tr>
                <tr>
                    <th>Email</th>
                    <td>
                        <input type="email" name="email" value="{{ $customer->email }}" class="form-control" required>
                    </td>
                </tr>
                <tr>
                    <th>Password (Opsional)</th>
                    <td>
                        <input type="password" name="password" class="form-control" placeholder="Kosongkan jika tidak ingin diubah">
                    </td>
                </tr>
            </table>

            <div class="text-end mt-3">
                <button type="submit" class="btn btn-primary px-4">🔄 Update</button>
                <a href="{{ route('admin.customers') }}" class="btn btn-secondary px-4">↩ Kembali</a>
            </div>
        </form>
    </div>
</div>
@endsection
