<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Category;

class CategoryController extends Controller
{
    /**
     * Menampilkan daftar kategori
     */
    public function index()
    {
        $categories = Category::orderBy('order')->get();
        return view('dashboard.kategori', compact('categories'));
    }

    /**
     * Menyimpan kategori baru
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:255|unique:categories,name',
            'color' => 'required|string|max:50',
            'order' => 'nullable|integer'
        ]);

        $validated['slug'] = \Illuminate\Support\Str::slug($validated['name']);

        Category::create($validated);

        return redirect()->back()->with('success', 'Kategori berhasil ditambahkan!');
    }

    /**
     * Mengupdate kategori
     */
    public function update(Request $request, Category $category)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:255|unique:categories,name,' . $category->id,
            'color' => 'required|string|max:50',
            'order' => 'nullable|integer',
            'is_active' => 'boolean'
        ]);

        $validated['slug'] = \Illuminate\Support\Str::slug($validated['name']);

        $category->update($validated);

        return redirect()->back()->with('success', 'Kategori berhasil diperbarui!');
    }

    /**
     * Menghapus kategori
     */
    public function destroy(Category $category)
    {
        // Check if category has news
        if ($category->news()->count() > 0) {
            return redirect()->back()->with('error', 'Tidak dapat menghapus kategori yang memiliki berita!');
        }

        $category->delete();

        return redirect()->back()->with('success', 'Kategori berhasil dihapus!');
    }
}