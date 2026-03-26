<?php

namespace App\Http\Controllers;

use App\Models\FotoBumdes;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class BumdesFotoController extends Controller
{
    public function index()
    {
        $slides = FotoBumdes::orderBy('order', 'asc')->get();

        $role = auth()->user()?->role;
        $view = in_array($role, ['admin', 'staff'], true)
            ? 'dashboard.bumdes.foto'
            : 'bumdes-dashboard.foto';

        return view($view, compact('slides'));
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'title' => 'required|string|max:255',
            'description' => 'nullable|string',
            'image' => 'required|image|mimes:jpeg,png,jpg,gif|max:2048',
            'order' => 'nullable|integer',
            'is_active' => 'nullable|integer',
        ]);

        $validated['is_active'] = $request->has('is_active') ? 1 : 0;

        if ($request->hasFile('image')) {
            $validated['image'] = $request->file('image')->store('bumdes-sliders', 'public');
        }

        FotoBumdes::create($validated);

        return redirect()->back()->with('success', 'Foto slider BUMDES berhasil ditambahkan!');
    }

    public function update(Request $request, $id)
    {
        $slide = FotoBumdes::findOrFail($id);

        $validated = $request->validate([
            'title' => 'required|string|max:255',
            'description' => 'nullable|string',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:5048',
            'order' => 'nullable|integer',
            'is_active' => 'nullable|integer',
        ]);

        $validated['is_active'] = $request->has('is_active') ? 1 : 0;

        if ($request->hasFile('image')) {
            if ($slide->image && Storage::disk('public')->exists($slide->image)) {
                Storage::disk('public')->delete($slide->image);
            }
            $validated['image'] = $request->file('image')->store('bumdes-sliders', 'public');
        }

        $slide->update($validated);

        return redirect()->back()->with('success', 'Foto slider BUMDES berhasil diperbarui!');
    }

    public function destroy($id)
    {
        $slide = FotoBumdes::findOrFail($id);

        if ($slide->image && Storage::disk('public')->exists($slide->image)) {
            Storage::disk('public')->delete($slide->image);
        }

        $slide->delete();

        return redirect()->back()->with('success', 'Foto slider BUMDES berhasil dihapus!');
    }
}

