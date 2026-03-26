<?php

namespace App\Http\Controllers;

use App\Models\FotoBumdes;
use App\Models\LinkBumdes;

class BumdesPublicController extends Controller
{
    public function index()
    {
        $slides = FotoBumdes::where('is_active', true)
            ->orderBy('order', 'asc')
            ->get();

        $link = LinkBumdes::where('is_active', true)
            ->latest('id')
            ->first();

        return view('bumdes', [
            'slides' => $slides,
            'spreadsheetUrl' => $link?->url,
        ]);
    }
}

