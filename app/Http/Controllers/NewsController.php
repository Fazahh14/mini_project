<?php

namespace App\Http\Controllers;

use App\Models\News;
use Illuminate\Http\Request;

class NewsController extends Controller
{
    // ========================
    // TAMPILKAN SEMUA BERITA
    // ========================
    public function index(Request $request)
    {
        $latest = News::latest()->first();

        // Pencarian berita
        $query = News::query();
        if ($request->has('q') && $request->q != '') {
            $query->where('title', 'like', '%' . $request->q . '%')
                ->orWhere('description', 'like', '%' . $request->q . '%');
        }

        $news = $query->latest()->paginate(3);

        return view('pages.news', compact('latest', 'news'));
    }

    // ========================
    // FILTER BERDASARKAN KATEGORI
    // ========================
    public function category($slug)
    {
        $latest = News::latest()->first();
        $news = News::where('category', $slug)->latest()->paginate(3);

        return view('pages.news', compact('latest', 'news'));
    }

    // ========================
    // DETAIL BERITA
    // ========================
    public function show($slug)
    {
        $item = News::where('slug', $slug)->firstOrFail();
        return view('pages.news-detail', compact('item'));
    }
}
