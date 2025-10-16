@extends('layouts.app')

@section('title', 'Shop - Event Festival')

@section('content')
<div class="dashboard-container">
    <section class="festival-details">
        <div class="container">
            <h1 class="section-title mb-4 text-center">Event yang Sedang Aktif</h1>

            <div class="events-grid">
                @forelse ($events as $event)
                    <div class="event-card">
                        <div class="event-card-header">
                            <div class="event-price-badge">
                                <span>From</span> Rp{{ number_format($event->harga_tiket, 0, ',', '.') }}
                            </div>
                            <div class="event-actions">
                                <div class="event-plus">+</div>
                                <div class="event-favorite">
                                    <i class="bi bi-heart"></i>
                                </div>
                            </div>
                            <div class="event-image">
                                <img src="{{ asset('storage/' . $event->gambar) }}" alt="{{ $event->nama_event }}">
                            </div>
                        </div>
                        <div class="event-content">
                            <div class="event-date">
                                <span class="date-text">
                                    {{ \Carbon\Carbon::parse($event->tanggal_event)->format('d M Y') }}
                                </span>
                            </div>
                            <h3 class="event-title">{{ $event->nama_event }}</h3>
                            <p class="event-description-short">
                                {{ Str::limit($event->deskripsi, 100) }}
                            </p>
                            <div class="event-time">
                                <i class="bi bi-geo-alt"></i>
                                <span>{{ $event->lokasi }}</span>
                            </div>
                            <a>
                                <i class="bi bi-ticket-perforated"></i> Beli Tiket
                            </a>
                        </div>
                    </div>
                @empty
                    <div class="text-center text-muted py-5">
                        Belum ada event aktif untuk saat ini.
                    </div>
                @endforelse
            </div>
        </div>
    </section>
</div>
@endsection
