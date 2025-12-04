<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;

class ProductController extends Controller
{
    public function index(Request $request)
    {
        $products = Product::all();

        // Logika: Jika di URL ada ?edit=1, ambil data produknya untuk form di atas tabel
        $product = null;
        if ($request->has('edit')) {
            $product = Product::find($request->edit);
        }

        return view("product", compact("products", "product"));
    }

    public function create()
    {
        return view("add-product", [
            'title' => 'Tambah',
            'action' => route('product.store'),
            'method' => 'POST',
            'product' => null // Kosong karena ini tambah data
        ]);
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required|min:4',
            'price' => 'required|integer|min:1000000',
        ]);

        Product::create($validated);
        return redirect()->route('product.index')->with('success', 'Produk berhasil ditambahkan');
    }

    // Function untuk membuka form EDIT
    public function edit($id)
    {
        $product = Product::findOrFail($id);

        return view("add-product", [
            'title' => 'Edit',
            'method' => 'PUT', // Ubah method jadi PUT
            'action' => route('product.update', $product->id), // Arahkan ke update
            'product' => $product // Kirim data produk untuk diisi ke form
        ]);
    }

    public function update(Request $request, $id)
    {
        $product = Product::findOrFail($id); // Cari produk berdasarkan ID

        $validated = $request->validate([
            'name' => 'required|min:4',
            'price' => 'required|integer|min:1000000',
        ]);

        $product->update($validated);
        return redirect()->route('product.index')->with('success', 'Produk berhasil diperbarui');
    }

    public function destroy($id)
    {
        $product = Product::findOrFail($id);
        $product->delete();
        return redirect()->route('product.index')->with('success', 'Produk berhasil dihapus');
    }

    // Di Controller
    public function show($id)
    {
        $product = Product::find($id);
        return view('product-detail', compact('product'));
    }
    public function getDetail()
    {
        return view('product-detail');
    }
}
