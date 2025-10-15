<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class AdminSearchController extends Controller
{
    public function search(Request $request)
    {
        $query = $request->input('query');

        // sementara, tampilkan hasil dummy saja
        return response()->json([
            'message' => 'Fitur pencarian admin akan ditambahkan nanti',
            'query' => $query
        ]);
    }
}
