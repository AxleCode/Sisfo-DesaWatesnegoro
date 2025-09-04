<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\File;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Cache;

class FileController extends Controller
{
    /**
     * Menampilkan halaman file management
     */
    public function index()
    {
        $files = File::orderBy('order', 'asc')->get();
        return view('dashboard.file', compact('files'));
    }

    /**
     * Menyimpan file baru
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'title' => 'required|string|max:255',
            'description' => 'nullable|string',
            'file' => 'required|file|mimes:pdf,doc,docx,xls,xlsx,zip,rar|max:10240',
            'order' => 'nullable|integer'
        ]);

        // Upload file
        if ($request->hasFile('file')) {
            $file = $request->file('file');
            $filePath = $file->store('files', 'public');
            $fileType = $file->getClientOriginalExtension();
            
            File::create([
                'title' => $validated['title'],
                'description' => $validated['description'],
                'file_path' => $filePath,
                'file_type' => $fileType,
                'order' => $validated['order'] ?? 0,
            ]);

            // Clear cache
            Cache::forget('active_files');
        }

        return redirect()->back()->with('success', 'File berhasil ditambahkan!');
    }

    /**
     * Mengupdate file
     */
    public function update(Request $request, $id)
    {
        $file = File::findOrFail($id);

        $validated = $request->validate([
            'title' => 'required|string|max:255',
            'description' => 'nullable|string',
            'file' => 'nullable|file|mimes:pdf,doc,docx,xls,xlsx,zip,rar|max:10240',
            'order' => 'nullable|integer'
        ]);

        // Upload file baru jika ada
        if ($request->hasFile('file')) {
            // Hapus file lama
            if ($file->file_path && Storage::disk('public')->exists($file->file_path)) {
                Storage::disk('public')->delete($file->file_path);
            }
            
            $newFile = $request->file('file');
            $filePath = $newFile->store('files', 'public');
            $fileType = $newFile->getClientOriginalExtension();
            
            $validated['file_path'] = $filePath;
            $validated['file_type'] = $fileType;
        }

        $file->update($validated);

        // Clear cache
        Cache::forget('active_files');

        return redirect()->back()->with('success', 'File berhasil diperbarui!');
    }

    /**
     * Menghapus file
     */
    public function destroy($id)
    {
        $file = File::findOrFail($id);

        // Hapus file dari storage
        if ($file->file_path && Storage::disk('public')->exists($file->file_path)) {
            Storage::disk('public')->delete($file->file_path);
        }

        $file->delete();

        // Clear cache
        Cache::forget('active_files');

        return redirect()->back()->with('success', 'File berhasil dihapus!');
    }

    /**
     * Download file
     */
    public function download($id)
    {
        $file = File::findOrFail($id);

        // Increment download count
        $file->increment('download_count');

        $filePath = storage_path('app/public/' . $file->file_path);
        
        return response()->download($filePath, $file->title . '.' . $file->file_type);
    }
}