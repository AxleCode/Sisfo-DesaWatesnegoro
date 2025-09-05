<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\News;
use App\Models\File;
use App\Models\Map;
use App\Models\User;
use App\Models\ActivityLog;
use Illuminate\Support\Facades\DB;

class DashboardController extends Controller
{
    /**
     * Menampilkan dashboard admin dengan data statistik
     */
    public function index()
    {
        $user = auth()->user();
        
        // Data statistik
        $stats = [
            'total_news' => News::count(),
            'total_files' => File::count(),
            'total_maps' => Map::count(),
            'published_news' => News::where('is_published', true)->count(),
            'active_files' => File::where('is_active', true)->count(),
            'active_maps' => Map::where('is_active', true)->count(),
        ];

        // Aktivitas terbaru
        $recentActivities = ActivityLog::with('user')
            ->latest()
            ->take(10)
            ->get();

        // File download terbanyak
        $mostDownloadedFiles = File::orderBy('download_count', 'desc')
            ->take(5)
            ->get();

        // Berita terpopuler
        $popularNews = News::with('category')
            ->orderBy('views', 'desc')
            ->take(5)
            ->get();

        return view('dashboard.dashboard', compact(
            'stats', 
            'recentActivities', 
            'mostDownloadedFiles',
            'popularNews'
        ));
    }

    /**
     * Mendapatkan data chart untuk dashboard
     */
    public function getChartData()
    {
        // Data untuk chart berita per bulan
        $newsData = News::select(
            DB::raw('MONTH(created_at) as month'),
            DB::raw('COUNT(*) as count')
        )
        ->whereYear('created_at', date('Y'))
        ->groupBy('month')
        ->orderBy('month')
        ->get()
        ->pluck('count', 'month');

        // Data untuk chart file downloads
        $downloadData = File::select(
            DB::raw('MONTH(created_at) as month'),
            DB::raw('SUM(download_count) as downloads')
        )
        ->whereYear('created_at', date('Y'))
        ->groupBy('month')
        ->orderBy('month')
        ->get()
        ->pluck('downloads', 'month');

        return response()->json([
            'news' => $newsData,
            'downloads' => $downloadData
        ]);
    }
}