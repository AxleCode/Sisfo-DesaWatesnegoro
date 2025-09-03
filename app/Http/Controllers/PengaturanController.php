<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Slider;
use Illuminate\Support\Facades\Storage;

class PengaturanController extends Controller
{
    /**
     * Menampilkan halaman informasi website dengan slider
     */
    public function informasi()
    {
        $sliders = Slider::orderBy('order', 'asc')->get();
        return view('dashboard.pengaturan.informasi', compact('sliders'));
    }

    /**
     * Menyimpan slider baru
     */
    public function simpanSlider(Request $request)
    {
        $validated = $request->validate([
            'title' => 'required|string|max:255',
            'description' => 'nullable|string',
            'image' => 'required|image|mimes:jpeg,png,jpg,gif|max:2048',
            'order' => 'nullable|integer',
            'is_active' => 'nullable|integer'
        ]);

        $validated['is_active'] = $request->has('is_active') ? 1 : 0;

        // Upload gambar
        if ($request->hasFile('image')) {
            $imagePath = $request->file('image')->store('sliders', 'public');
            $validated['image'] = $imagePath;
        }

        Slider::create($validated);

        return redirect()->back()->with('success', 'Slider berhasil ditambahkan!');
    }

    /**
     * Mengupdate slider
     */
    public function updateSlider(Request $request, $id)
    {
        $slider = Slider::findOrFail($id);

        $validated = $request->validate([
            'title' => 'required|string|max:255',
            'description' => 'nullable|string',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:5048',
            'order' => 'nullable|integer',
            'is_active' => 'nullable|integer'
        ]);

        $validated['is_active'] = $request->has('is_active') ? 1 : 0;
        
        // Upload gambar baru jika ada
        if ($request->hasFile('image')) {
            // Hapus gambar lama
            if ($slider->image && Storage::disk('public')->exists($slider->image)) {
                Storage::disk('public')->delete($slider->image);
            }
            
            $imagePath = $request->file('image')->store('sliders', 'public');
            $validated['image'] = $imagePath;
        }

        $slider->update($validated);

        return redirect()->back()->with('success', 'Slider berhasil diperbarui!');
    }

    /**
     * Menghapus slider
     */
    public function hapusSlider($id)
    {
        $slider = Slider::findOrFail($id);

        // Hapus gambar
        if ($slider->image && Storage::disk('public')->exists($slider->image)) {
            Storage::disk('public')->delete($slider->image);
        }

        $slider->delete();

        return redirect()->back()->with('success', 'Slider berhasil dihapus!');
    }

    /**
     * Menyimpan informasi website
     */
    public function simpanInformasi(Request $request)
    {
        // ... kode sebelumnya ...
    }
}