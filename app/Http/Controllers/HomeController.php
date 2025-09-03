<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Slider;

class HomeController extends Controller
{
    public function index()
    {
        // Ambil slider yang aktif, urutkan berdasarkan order
        $sliders = Slider::where('is_active', true)
                        ->orderBy('order', 'asc')
                        ->get();

        return view('home', compact('sliders'));
    }
}
