<?php

namespace App\Http\Controllers;

use App\Models\News;
use Illuminate\Http\Request;

class NewsController extends Controller
{
    public function index()
    {
        $latest = News::latest()->first(); // untuk banner
        $news = News::latest()->paginate(3); // daftar berita

        return view('pages.news', compact('latest', 'news'));
    }

    public function category($slug)
    {
        $latest = News::latest()->first();
        $news = News::where('category', $slug)->latest()->paginate(3);

        return view('pages.news', compact('latest', 'news'));
    }

    public function show($slug)
    {
        $item = News::where('slug', $slug)->firstOrFail();
        return view('news-detail', compact('item'));
    }
}
