@extends('layouts.app')

@section('title', $item->title)

@section('content')
<div class="container my-5">
    <div class="mb-4">
        <h2 class="fw-bold">{{ $item->title }}</h2>
        <small class="text-muted">
            <i class="bi bi-calendar-event"></i> {{ \Carbon\Carbon::parse($item->date)->format('d F Y') }}
            • <span class="badge bg-secondary">{{ ucfirst($item->category) }}</span>
        </small>
    </div>

    @if($item->image)
        <img src="{{ asset('storage/' . $item->image) }}" alt="{{ $item->title }}" class="img-fluid rounded mb-4 shadow-sm">
    @endif

    <div class="news-content">
        {!! nl2br(e($item->description)) !!}
    </div>

    <div class="mt-4">
        <a href="{{ route('news.index') }}" class="btn btn-outline-secondary">
            ← Kembali ke Berita
        </a>
    </div>
</div>
@endsection
