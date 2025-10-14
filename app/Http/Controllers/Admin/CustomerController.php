<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class CustomerController extends Controller
{
    public function index()
    {
        $customers = User::where('role', 'pengguna')->get();
        return view('admin.pages.customers', compact('customers'));
    }

    public function create()
    {
        return view('admin.pages.customer_create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|unique:users,email',
            'password' => 'required|min:6'
        ]);

        User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password),
            'role' => 'pengguna',
        ]);

        return redirect()->route('admin.customers')->with('success', 'Customer berhasil ditambahkan.');
    }

    public function edit($id)
    {
        $customer = User::findOrFail($id);
        return view('admin.pages.customer_edit', compact('customer'));
    }

    public function update(Request $request, $id)
    {
        $customer = User::findOrFail($id);

        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|unique:users,email,' . $customer->id,
        ]);

        $customer->update([
            'name' => $request->name,
            'email' => $request->email,
            'password' => $request->filled('password') ? Hash::make($request->password) : $customer->password,
        ]);

        return redirect()->route('admin.customers')->with('success', 'Customer berhasil diperbarui.');
    }

    public function destroy($id)
    {
        User::findOrFail($id)->delete();
        return redirect()->route('admin.customers')->with('success', 'Customer berhasil dihapus.');
    }
}
