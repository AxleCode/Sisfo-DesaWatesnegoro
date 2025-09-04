<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Slider;
use App\Models\AboutSlider;
use App\Models\Dusun;
use App\Models\File;
use App\Models\Setting;
// use Illuminate\Support\Facades\Cache;

class HomeController extends Controller
{
    public function index()
    {
        // Ambil slider yang aktif, urutkan berdasarkan order
        $sliders = Slider::where('is_active', true)
                        ->orderBy('order', 'asc')
                        ->get();

        // Ambil slider tentang desa yang aktif
        $aboutSliders = AboutSlider::where('is_active', true)
                            ->orderBy('order', 'asc')
                            ->get();

        // Ambil data dusun yang aktif
        $dusuns = Dusun::where('is_active', true)
                        ->orderBy('order', 'asc')
                        ->get();

        // Hitung total penduduk dan KK dari semua dusun
        $totalPenduduk = $dusuns->sum('population');
        $totalKK = $dusuns->sum('households');
        $jumlahDusun = $dusuns->count();

        // Ambil file yang aktif
        $files = File::where('is_active', true)
                        ->orderBy('order', 'asc')
                        ->get();

        return view('home', compact(
            'sliders', 
            'aboutSliders', 
            'dusuns',
            'totalPenduduk',
            'totalKK',
            'jumlahDusun',
            'files'
        ));
    }
}
