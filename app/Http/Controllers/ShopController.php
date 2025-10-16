<?php

namespace App\Http\Controllers;

use App\Models\Event;

class ShopController extends Controller
{
    public function index()
    {
        // Ambil event dengan status "aktif" saja agar hanya event yang sedang berjalan ditampilkan
        $events = Event::where('status', 'aktif')->latest()->get();

        return view('shop.index', compact('events'));
    }

    // (opsional) jika nanti mau buat halaman detail event
}
