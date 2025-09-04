<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Slider;
use App\Models\AboutSlider;
use App\Models\Dusun;
use Illuminate\Support\Facades\Storage;

class PengaturanController extends Controller
{
    /**
     * Menampilkan halaman informasi website dengan slider
     */
    public function informasi()
    {
        $sliders = Slider::orderBy('order', 'asc')->get();
        $aboutSliders = AboutSlider::orderBy('order', 'asc')->get();
        $dusuns = Dusun::orderBy('order', 'asc')->get();
        
        return view('dashboard.pengaturan.informasi', compact('sliders', 'aboutSliders', 'dusuns'));
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

    /* CRUD Methods untuk About Slider
    */
    public function simpanAboutSlider(Request $request)
    {
        $validated = $request->validate([
            'title' => 'required|string|max:255',
            'description' => 'nullable|string',
            'image' => 'required|image|mimes:jpeg,png,jpg,gif|max:2048',
            'order' => 'nullable|integer'
        ]);

        if ($request->hasFile('image')) {
            $imagePath = $request->file('image')->store('about-sliders', 'public');
            $validated['image'] = $imagePath;
        }

        AboutSlider::create($validated);

        return redirect()->back()->with('success', 'Slider tentang desa berhasil ditambahkan!');
    }

    public function updateAboutSlider(Request $request, $id)
    {
        $slider = AboutSlider::findOrFail($id);

        $validated = $request->validate([
            'title' => 'required|string|max:255',
            'description' => 'nullable|string',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
            'order' => 'nullable|integer'
        ]);

        if ($request->hasFile('image')) {
            if ($slider->image && Storage::disk('public')->exists($slider->image)) {
                Storage::disk('public')->delete($slider->image);
            }
            
            $imagePath = $request->file('image')->store('about-sliders', 'public');
            $validated['image'] = $imagePath;
        }

        $slider->update($validated);

        return redirect()->back()->with('success', 'Slider tentang desa berhasil diperbarui!');
    }

    public function hapusAboutSlider($id)
    {
        $slider = AboutSlider::findOrFail($id);

        if ($slider->image && Storage::disk('public')->exists($slider->image)) {
            Storage::disk('public')->delete($slider->image);
        }

        $slider->delete();

        return redirect()->back()->with('success', 'Slider tentang desa berhasil dihapus!');
    }

    /**
        * CRUD Methods untuk Dusun
        */
    public function simpanDusun(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'head_name' => 'nullable|string|max:255',
            'head_phone' => 'nullable|string|max:20',
            'population' => 'nullable|integer|min:0',
            'households' => 'nullable|integer|min:0',
            'description' => 'nullable|string',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
            'order' => 'nullable|integer'
        ]);

        if ($request->hasFile('image')) {
            $imagePath = $request->file('image')->store('dusuns', 'public');
            $validated['image'] = $imagePath;
        }

        Dusun::create($validated);

        return redirect()->back()->with('success', 'Data dusun berhasil ditambahkan!');
    }

    public function updateDusun(Request $request, $id)
    {
        $dusun = Dusun::findOrFail($id);

        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'head_name' => 'nullable|string|max:255',
            'head_phone' => 'nullable|string|max:20',
            'population' => 'nullable|integer|min:0',
            'households' => 'nullable|integer|min:0',
            'description' => 'nullable|string',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
            'order' => 'nullable|integer'
        ]);

        if ($request->hasFile('image')) {
            if ($dusun->image && Storage::disk('public')->exists($dusun->image)) {
                Storage::disk('public')->delete($dusun->image);
            }
            
            $imagePath = $request->file('image')->store('dusuns', 'public');
            $validated['image'] = $imagePath;
        }

        $dusun->update($validated);

        return redirect()->back()->with('success', 'Data dusun berhasil diperbarui!');
    }

    public function hapusDusun($id)
    {
        $dusun = Dusun::findOrFail($id);

        if ($dusun->image && Storage::disk('public')->exists($dusun->image)) {
            Storage::disk('public')->delete($dusun->image);
        }

        $dusun->delete();

        return redirect()->back()->with('success', 'Data dusun berhasil dihapus!');
    }
}