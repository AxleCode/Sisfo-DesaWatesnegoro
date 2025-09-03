<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PengaturanController extends Controller
{
    /**
     * Menampilkan halaman informasi website
     */
    public function informasi()
    {
        return view('dashboard.pengaturan.informasi');
    }

    /**
     * Menyimpan informasi website
     */
    public function simpanInformasi(Request $request)
    {
        // Validasi input
        $validated = $request->validate([
            'site_name' => 'required|string|max:255',
            'site_slogan' => 'nullable|string|max:255',
            'email' => 'nullable|email',
            'phone' => 'nullable|string|max:20',
            'address' => 'nullable|string',
            'description' => 'nullable|string',
            'keywords' => 'nullable|string',
        ]);

        // Simpan ke database atau config
        // Contoh: menggunakan setting helper atau database

        return redirect()->back()->with('success', 'Informasi website berhasil disimpan!');
    }

    /**
     * Menyimpan media sosial
     */
    public function simpanMediaSosial(Request $request)
    {
        $validated = $request->validate([
            'facebook' => 'nullable|url',
            'instagram' => 'nullable|url',
            'twitter' => 'nullable|url',
            'youtube' => 'nullable|url',
        ]);

        // Simpan ke database atau config

        return redirect()->back()->with('success', 'Media sosial berhasil disimpan!');
    }

    /**
     * Menyimpan pengaturan SEO
     */
    public function simpanSEO(Request $request)
    {
        $validated = $request->validate([
            'meta_title' => 'nullable|string|max:255',
            'meta_description' => 'nullable|string',
            'google_analytics' => 'nullable|string',
        ]);

        // Simpan ke database atau config

        return redirect()->back()->with('success', 'Pengaturan SEO berhasil disimpan!');
    }
}