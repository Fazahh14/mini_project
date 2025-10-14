@extends('layouts.app')

@section('title', 'News & Events')

@section('content')
<div class="news-page container my-5">

    <!-- Banner Section -->
    @if($latest)
    <section class="news-banner position-relative mb-5">
        <a href="{{ route('news.show', $latest->slug) }}" class="text-decoration-none text-white">
            <img src="{{ asset('storage/' . $latest->image) }}" alt="News Banner" class="banner-img rounded-4 w-100 shadow-sm">
            <div class="banner-overlay position-absolute top-0 start-0 w-100 h-100 text-white d-flex flex-column justify-content-center px-4 px-md-5" style="background: rgba(0, 0, 0, 0.45); border-radius: 1rem;">
                <span class="badge bg-primary mb-2 px-3 py-2 fs-6">Latest Update</span>
                <h3 class="fw-bold mb-2">{{ $latest->title }}</h3>
                <p class="text-light mb-0">{{ $latest->description }}</p>
            </div>
        </a>
    </section>
    @endif

    <!-- Tabs -->
    <ul class="news-categories">
        <li><a href="{{ route('news.index') }}">All News</a></li>
        <li><a href="{{ route('news.category', 'music') }}">Music Events</a></li>
        <li><a href="{{ route('news.category', 'sports') }}">Sports</a></li>
        <li><a href="{{ route('news.category', 'promotions') }}">Promotions</a></li>
    </ul>

    <!-- News Cards -->
    <div class="news-list">
        @forelse($news as $item)
        <div class="card news-card mb-4 border-0 shadow-sm rounded-4 p-3">
            <div class="d-flex align-items-center flex-column flex-md-row">
                @if($item->image)
                    <img src="{{ asset('storage/' . $item->image) }}" class="rounded-3 me-md-3 mb-3 mb-md-0 news-thumb" alt="News Image" style="width: 140px; height: 90px; object-fit: cover;">
                @endif
                <div class="flex-grow-1 text-center text-md-start">
                    <small class="text-muted d-block mb-2"><i class="bi bi-calendar-event me-1"></i> {{ \Carbon\Carbon::parse($item->date)->format('d F Y') }}</small>
                    <h6 class="fw-bold mb-1">{{ $item->title }}</h6>
                    <p class="text-muted small mb-2">{{ Str::limit($item->description, 100) }}</p>
                    <a href="{{ route('news.show', $item->slug) }}" class="btn btn-outline-primary btn-sm rounded-pill px-3">Baca Selengkapnya</a>
                </div>
            </div>
        </div>
        @empty
            <p class="text-center text-muted">Belum ada berita tersedia.</p>
        @endforelse
    </div>

    <!-- Pagination -->
    <nav class="mt-4 d-flex justify-content-center">
        {{ $news->links() }}
    </nav>

</div>
@endsection
