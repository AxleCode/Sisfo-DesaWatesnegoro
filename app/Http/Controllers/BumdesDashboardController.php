<?php

namespace App\Http\Controllers;

use App\Models\FotoBumdes;
use App\Models\LinkBumdes;

class BumdesDashboardController extends Controller
{
    public function index()
    {
        $fotoCount = FotoBumdes::count();
        $activeFotoCount = FotoBumdes::where('is_active', true)->count();
        $link = LinkBumdes::where('is_active', true)->latest('id')->first();

        return view('bumdes-dashboard.dashboard', [
            'fotoCount' => $fotoCount,
            'activeFotoCount' => $activeFotoCount,
            'spreadsheetUrl' => $link?->url,
        ]);
    }
}

