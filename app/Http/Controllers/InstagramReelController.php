<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\InstagramReel;

class InstagramReelController extends Controller
{
    /**
     * Menampilkan daftar Instagram Reels di admin
     */
    public function index()
    {
        $reels = InstagramReel::orderBy('order')->latest()->get();
        return view('dashboard.berita-instagram', compact('reels'));
    }

    /**
     * Menampilkan form tambah Instagram Reel
     */
    public function create()
    {
        return view('dashboard.berita-instagram-create');
    }

    /**
     * Menyimpan Instagram Reel baru
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'url' => 'required|url|max:500',
            'order' => 'required|integer|min:0',
            'is_active' => 'boolean'
        ]);

        $validated['is_active'] = $request->boolean('is_active', true);

        InstagramReel::create($validated);

        return redirect()->route('admin.instagram')->with('success', 'Instagram Reel berhasil ditambahkan!');
    }

    /**
     * Menampilkan form edit Instagram Reel
     */
    public function edit(InstagramReel $reel)
    {
        return view('dashboard.berita-instagram-edit', compact('reel'));
    }

    /**
     * Mengupdate Instagram Reel
     */
    public function update(Request $request, InstagramReel $reel)
    {
        $validated = $request->validate([
            'url' => 'required|url|max:500',
            'order' => 'required|integer|min:0',
            'is_active' => 'boolean'
        ]);

        $validated['is_active'] = $request->boolean('is_active', false);

        $reel->update($validated);

        return redirect()->route('admin.instagram')->with('success', 'Instagram Reel berhasil diperbarui!');
    }

    /**
     * Menghapus Instagram Reel
     */
    public function destroy(InstagramReel $reel)
    {
        $reel->delete();

        return redirect()->route('admin.instagram')->with('success', 'Instagram Reel berhasil dihapus!');
    }
}

