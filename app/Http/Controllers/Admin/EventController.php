<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Event;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class EventController extends Controller
{
    public function index()
    {
        $events = Event::latest()->paginate(10);
        return view('admin.pages.events_index', compact('events'));
    }

    public function create()
    {
        return view('admin.pages.events_create');
    }

    public function store(Request $request)
    {
        $data = $request->validate([
            'nama_event' => 'required',
            'tanggal_event' => 'required|date',
            'lokasi' => 'required',
            'deskripsi' => 'nullable',
            'harga_tiket' => 'required|numeric',
            'status' => 'required',
            'gambar' => 'nullable|image|max:2048',
        ]);

        if ($request->hasFile('gambar')) {
            $data['gambar'] = $request->file('gambar')->store('events', 'public');
        }

        Event::create($data);
        return redirect()->route('admin.events.index')->with('success', 'Event berhasil ditambahkan!');
    }

    public function edit(Event $event)
    {
        return view('admin.pages.events_edit', compact('event'));
    }

    public function update(Request $request, Event $event)
    {
        $data = $request->validate([
            'nama_event' => 'required',
            'tanggal_event' => 'required|date',
            'lokasi' => 'required',
            'deskripsi' => 'nullable',
            'harga_tiket' => 'required|numeric',
            'status' => 'required',
            'gambar' => 'nullable|image|max:2048',
        ]);

        if ($request->hasFile('gambar')) {
            if ($event->gambar) {
                Storage::disk('public')->delete($event->gambar);
            }
            $data['gambar'] = $request->file('gambar')->store('events', 'public');
        }

        $event->update($data);
        return redirect()->route('admin.events.index')->with('success', 'Event berhasil diperbarui!');
    }

    public function destroy(Event $event)
    {
        if ($event->gambar) {
            Storage::disk('public')->delete($event->gambar);
        }
        $event->delete();
        return back()->with('success', 'Event berhasil dihapus!');
    }
}
